<?php $__env->startSection('title', __('purchase.purchases')); ?>

<?php $__env->startSection('content'); ?>
<?php 
$business_id = request()->session()->get('user.business_id');
$add_purchase = \App\Utils\ModuleUtil::hasThePermissionInSubscription($business_id, 'add_purchase');
?>


<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">List <?php echo app('translator')->get('purchase.purchases'); ?></h4>
                <ul class="breadcrumbs pull-left" style="margin-top: 15px">
                    <li><a href="#"><?php echo app('translator')->get('purchase.purchases'); ?></a></li>
                    <li><span>List <?php echo app('translator')->get('purchase.purchases'); ?></span></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content main-content-inner no-print">
    <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('purchase_list_filter_location_id',  __('purchase.business_location') . ':'); ?>

                <?php echo Form::select('purchase_list_filter_location_id', $business_locations, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); ?>

            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('purchase_list_order_no',  __('purchase.purchase_order_no') . ':'); ?>

                <?php echo Form::select('purchase_list_order_no', array_combine($ordernos, $ordernos), null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); ?>


            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('purchase_list_filter_supplier_id',  __('purchase.supplier') . ':'); ?>

                <?php echo Form::select('purchase_list_filter_supplier_id', $suppliers, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); ?>

            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('purchase_list_filter_status',  __('purchase.purchase_status') . ':'); ?>

                <?php echo Form::select('purchase_list_filter_status', $orderStatuses, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); ?>

            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('purchase_list_filter_payment_status',  __('purchase.payment_status') . ':'); ?>

                <?php echo Form::select('purchase_list_filter_payment_status', ['paid' => __('lang_v1.paid'), 'due' => __('lang_v1.due'), 'partial' => __('lang_v1.partial'), 'overdue' => __('lang_v1.overdue')], null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); ?>

            </div>
        </div>
        
        <div class="col-md-3">
            <div class="form-group">
            <!-- D 81 Added some code here-->
                <?php echo Form::label('purchase_list_filter_date_range', __('report.date_range') . ':'); ?>

                <?php echo Form::text('purchase_list_filter_date_range',  \Carbon::createFromTimestamp(strtotime('first day of this month'))->format(session('business.date_format')) . ' ~ ' . \Carbon::createFromTimestamp(strtotime('last day of this month'))->format(session('business.date_format'))  , ['placeholder' => __('lang_v1.select_a_date_range'), 'class' => 'form-control', 'readonly']); ?>

            </div>
        </div>
    <?php echo $__env->renderComponent(); ?>

    <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __('purchase.all_purchases')]); ?>
        <?php if($add_purchase == 1): ?>
            <?php $__env->slot('tool'); ?>
                <div class="row">
                    <div class="box-tools pull-right">
                        <a class="btn btn-primary" href="<?php echo e(action('PurchaseController@create'), false); ?>">
                        <i class="fa fa-plus"></i> <?php echo app('translator')->get('messages.add'); ?></a>
                    </div>
                </div>
                <hr>
                
            <?php $__env->endSlot(); ?>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase.view')): ?>
            <?php echo $__env->make('purchase.partials.purchase_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="modal fade product_modal" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
    </div>

    <div class="modal fade payment_modal" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel">
    </div>

    <div class="modal fade edit_payment_modal" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel">
    </div>

    <?php echo $__env->make('purchase.partials.update_purchase_status_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</section>

<section id="receipt_section" class="print_section"></section>

<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script src="<?php echo e(asset('js/purchase.js?v=' . $asset_v), false); ?>"></script>
<script src="<?php echo e(asset('js/payment.js?v=' . $asset_v), false); ?>"></script>
<script>
        //Date range as a button
    $('#purchase_list_filter_date_range').daterangepicker(
        dateRangeSettings,
        function (start, end) {
            $('#purchase_list_filter_date_range').val(start.format(moment_date_format) + ' ~ ' + end.format(moment_date_format));
           purchase_table.ajax.reload();
        }
    );
    $('#purchase_list_filter_date_range').on('apply.daterangepicker', function(ev, picker) {
        if (picker.chosenLabel === 'Custom Date Range') {
            $('#target_custom_date_input').val('purchase_list_filter_date_range');
            $('.custom_date_typing_modal').modal('show');
        }
    });


    $('#custom_date_apply_button').on('click', function() {
        debugger;
        if($('#target_custom_date_input').val() == "purchase_list_filter_date_range"){
            let startDate = $('#custom_date_from_year1').val() + $('#custom_date_from_year2').val() + $('#custom_date_from_year3').val() + $('#custom_date_from_year4').val() + "-" + $('#custom_date_from_month1').val() + $('#custom_date_from_month2').val() + "-" + $('#custom_date_from_date1').val() + $('#custom_date_from_date2').val();
            let endDate = $('#custom_date_to_year1').val() + $('#custom_date_to_year2').val() + $('#custom_date_to_year3').val() + $('#custom_date_to_year4').val() + "-" + $('#custom_date_to_month1').val() + $('#custom_date_to_month2').val() + "-" + $('#custom_date_to_date1').val() + $('#custom_date_to_date2').val();

            if (startDate.length === 10 && endDate.length === 10) {
                let formattedStartDate = moment(startDate).format(moment_date_format);
                let formattedEndDate = moment(endDate).format(moment_date_format);

                $('#purchase_list_filter_date_range').val(
                    formattedStartDate + ' ~ ' + formattedEndDate
                );

                $('#purchase_list_filter_date_range').data('daterangepicker').setStartDate(moment(startDate));
                $('#purchase_list_filter_date_range').data('daterangepicker').setEndDate(moment(endDate));

                $('.custom_date_typing_modal').modal('hide');
            } else {
                alert("Please select both start and end dates.");
            }
        }
    });


    $('#purchase_list_filter_date_range').on('cancel.daterangepicker', function(ev, picker) {
        $('#purchase_list_filter_date_range').val('');
        purchase_table.ajax.reload();
    });
    //D 81 Added the following two line of code
	$('#purchase_list_filter_date_range').data('daterangepicker').setStartDate(moment().startOf('month'));
	$('#purchase_list_filter_date_range').data('daterangepicker').setEndDate(moment().endOf('month'));

    $(document).on('click', '.update_status', function(e){
        e.preventDefault();
        $('#update_purchase_status_form').find('#status').val($(this).data('status'));
        $('#update_purchase_status_form').find('#purchase_id').val($(this).data('purchase_id'));
        $('#update_purchase_status_modal').modal('show');
    });

    $(document).on('submit', '#update_purchase_status_form', function(e){
        e.preventDefault();
        $(this)
            .find('button[type="submit"]')
            .attr('disabled', true);
        var data = $(this).serialize();

        $.ajax({
            method: 'POST',
            url: $(this).attr('action'),
            dataType: 'json',
            data: data,
            success: function(result) {
                if (result.success == true) {
                    $('#update_purchase_status_modal').modal('hide');
                    toastr.success(result.msg);
                    purchase_table.ajax.reload();
                    $('#update_purchase_status_form')
                        .find('button[type="submit"]')
                        .attr('disabled', false);
                } else {
                    toastr.error(result.msg);
                }
            },
        });
    });
</script>
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vimi31/public_html/resources/views/purchase/index.blade.php ENDPATH**/ ?>