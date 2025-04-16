<?php $__env->startSection('title', __( 'sale.drafts')); ?>
<?php $__env->startSection('content'); ?>


<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left"><?php echo app('translator')->get('sale.drafts'); ?></h4>
                <ul class="breadcrumbs pull-left" style="margin-top: 15px">
                    <li><a href="#">Sales</a></li>
                    <li><span><?php echo app('translator')->get('sale.drafts'); ?></span></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content main-content-inner no-print">
    <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'date'=> '']); ?>
        <?php $__env->slot('tool'); ?>
            <div class="box-tools pull-right">
                <a class="btn btn-primary" href="<?php echo e(action('SellPosController@create'), false); ?>">
                <i class="fa fa-plus"></i> <?php echo app('translator')->get('messages.add'); ?></a>
            </div>
        <?php $__env->endSlot(); ?>
        <div class="form-group">
            <div class="input-group">
              <button type="button" class="btn btn-primary" id="daterange-btn">
                <span>
                  <i class="fa fa-calendar"></i> Filter By Date
                </span>
                <i class="fa fa-caret-down"></i>
              </button>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped ajax_view" id="sell_table">
                <thead>
                    <tr>
                        <th><?php echo app('translator')->get('messages.date'); ?></th>
                        <th><?php echo app('translator')->get('purchase.ref_no'); ?></th>
                        <th><?php echo app('translator')->get('sale.customer_name'); ?></th>
                        <th><?php echo app('translator')->get('sale.location'); ?></th>
                        <th><?php echo app('translator')->get('messages.action'); ?></th>
                    </tr>
                </thead>
            </table>
        </div>
    <?php echo $__env->renderComponent(); ?>
</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
$(document).ready( function(){
    sell_table = $('#sell_table').DataTable({
        processing: true,
        serverSide: true,
        aaSorting: [[0, 'desc']],
        ajax: '/sells/draft-dt?is_quotation=0',
        columnDefs: [ {
            "targets": 4,
            "orderable": false,
            "searchable": false
        } ],
        columns: [
            { data: 'transaction_date', name: 'transaction_date'  },
            { data: 'invoice_no', name: 'invoice_no'},
            { data: 'name', name: 'contacts.name'},
            { data: 'business_location', name: 'bl.name'},
            { data: 'action', name: 'action'}
        ],
        "fnDrawCallback": function (oSettings) {
            __currency_convert_recursively($('#purchase_table'));
        }
    });
    $("#report_date_range").text("Date Range: "+ $('#daterange-btn span').text()); 
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        dateRangeSettings,
        function (start, end) {
            $('#daterange-btn span').html(start.format(moment_date_format) + ' ~ ' + end.format(moment_date_format));
            sell_table.ajax.url( '/sells/draft-dt?is_quotation=0&start_date=' + start.format('YYYY-MM-DD') +
                '&end_date=' + end.format('YYYY-MM-DD') ).load();
            $("#report_date_range").text("Date Range: "+ $("#daterange-btn span").text()); 
        }
    );
    $('#daterange-btn').on('cancel.daterangepicker', function(ev, picker) {
        sell_table.ajax.url( '/sells/draft-dt?is_quotation=0').load();
        $('#daterange-btn span').html('<i class="fa fa-calendar"></i> Filter By Date');
        $("#report_date_range").text("Date Range: Filter By Date  ");
    });
    $('#daterange-btn').on('apply.daterangepicker', function(ev, picker) {
        if (picker.chosenLabel === 'Custom Date Range') {
            $('#target_custom_date_input').val('daterange-btn');
            $('.custom_date_typing_modal').modal('show');
        }
    });
    $('#custom_date_apply_button').on('click', function() {
        debugger;
        if($('#target_custom_date_input').val() == "daterange-btn"){
            let startDate = $('#custom_date_from_year1').val() + $('#custom_date_from_year2').val() + $('#custom_date_from_year3').val() + $('#custom_date_from_year4').val() + "-" + $('#custom_date_from_month1').val() + $('#custom_date_from_month2').val() + "-" + $('#custom_date_from_date1').val() + $('#custom_date_from_date2').val();
            let endDate = $('#custom_date_to_year1').val() + $('#custom_date_to_year2').val() + $('#custom_date_to_year3').val() + $('#custom_date_to_year4').val() + "-" + $('#custom_date_to_month1').val() + $('#custom_date_to_month2').val() + "-" + $('#custom_date_to_date1').val() + $('#custom_date_to_date2').val();

            if (startDate.length === 10 && endDate.length === 10) {
                let formattedStartDate = moment(startDate).format(moment_date_format);
                let formattedEndDate = moment(endDate).format(moment_date_format);

                $('#daterange-btn').val(
                    formattedStartDate + ' ~ ' + formattedEndDate
                );

                $('#daterange-btn').data('daterangepicker').setStartDate(moment(startDate));
                $('#daterange-btn').data('daterangepicker').setEndDate(moment(endDate));

                $('.custom_date_typing_modal').modal('hide');
            } else {
                alert("Please select both start and end dates.");
            }
        }
    });
});
</script>
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vimi31/public_html/resources/views/sale_pos/draft.blade.php ENDPATH**/ ?>