<?php $__env->startSection('title', __('mpcs::lang.F20andF14b_form')); ?>

<?php $__env->startSection('content'); ?>
<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="settlement_tabs">
                <ul class="nav nav-tabs">
                    <?php if(auth()->user()->can('f20_form')): ?>
                    <li class="">
                        <a href="#20_form" class="20_form" data-toggle="tab">
                            <i class="fa fa-file-text-o"></i> <strong><?php echo app('translator')->get('mpcs::lang.f20_form'); ?></strong>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
                <div class="tab-content">
                    
                    <?php if(auth()->user()->can('f20_form')): ?>
                    <div class="tab-pane" id="20_form">
                        <?php echo $__env->make('mpcs::forms.F20andF14b.partials.20_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script>
    // form 14b
     $('#f14b_date').daterangepicker();
     if ($('#f14b_date').length == 1) {
         $('#f14b_date').daterangepicker(dateRangeSettings, function(start, end) {
             $('#f14b_date').val(
                 start.format(moment_date_format) + ' - ' + end.format(moment_date_format)
             );
         });
         $('#f14b_date').on('cancel.daterangepicker', function(ev, picker) {
             $('#product_sr_date_filter').val('');
         });
         $('#f14b_date')
             .data('daterangepicker')
             .setStartDate(moment().startOf('month'));
         $('#f14b_date')
             .data('daterangepicker')
             .setEndDate(moment().endOf('month'));
     }
     $(document).ready(function(){
        getForm14b();
        $('#f14b_date, #f14b_location_id').change(function(){
            getForm14b();
        })
     })
     function getForm14b(){
            var start_date = $('input#f14b_date')
                    .data('daterangepicker')
                .startDate.format('YYYY-MM-DD');
            var end_date = $('input#f14b_date')
                .data('daterangepicker')
                .endDate.format('YYYY-MM-DD');
            start_date = start_date;
            end_date = end_date;
            location_id = $('#f14b_location_id').val();

         $.ajax({
             method: 'get',
             url: '/mpcs/get-form-14b',
             data: {
                start_date,
                end_date,
                location_id
            },
            contentType: 'html',
            success: function(result) {
                $('#form14B_content').empty().append(result)
            },
         });
     }
     

     //form 20 
    $('#form_20_date_range').daterangepicker();
    if ($('#form_20_date_range').length == 1) {
        $('#form_20_date_range').daterangepicker(dateRangeSettings, function(start, end) {
            $('#form_20_date_range').val(
                start.format(moment_date_format) + ' - ' + end.format(moment_date_format)
            );
        });
        $('#form_20_date_range').on('cancel.daterangepicker', function(ev, picker) {
            $('#product_sr_date_filter').val('');
        });
        $('#form_20_date_range')
            .data('daterangepicker')
            .setStartDate(moment().startOf('month'));
        $('#form_20_date_range')
            .data('daterangepicker')
            .setEndDate(moment().endOf('month'));
    }

    let date = $('#form_20_date_range').val().split(' - ');

    $('.from_date').text(date[0]);
    $('.to_date').text(date[1]);
    
    $('#f14b_location_id option:eq(1)').attr('selected', true);
    $('#20_location_id option:eq(1)').attr('selected', true);
    $(document).ready(function(){


    //form_20_table 
    form_20_table = $('#form_20_table').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: '/mpcs/get-form-20',
        data: function(d) {
            var start_date = $('input#form_20_date_range')
                .data('daterangepicker')
                .startDate.format('YYYY-MM-DD');
            var end_date = $('input#form_20_date_range')
                .data('daterangepicker')
                .endDate.format('YYYY-MM-DD');
            d.start_date = start_date;
            d.end_date = end_date;
            d.location_id = $('#20_location_id').val();
        }
    },
    columns: [
        { data: 'DT_Row_Index', name: 'DT_Row_Index' , orderable: false, searchable: false},
        { data: 'sku', name: 'products.sku' },
        { data: 'product', name: 'products.name' },
        { data: 'sold_qty', name: 'transaction_sell_lines.quantity' },
        { data: 'unit_price', name: 'transaction_sell_lines.unit_price' },
        { data: 'total_amount', name: 'total_amount' },
    ],
    fnDrawCallback: function(oSettings) {
        var cash_sale = sum_table_col($('#form_20_table'), 'cash_sale');
        $('#cash_sale').text(__number_f(cash_sale , false, false, __currency_precision));
        var credit_sale =  sum_table_col($('#form_20_table'), 'credit_sale');
        $('#credit_sale').text(__number_f(credit_sale , false, false, __currency_precision));
        var grand_total = cash_sale + credit_sale;
        $('#grand_total').text(__number_f(grand_total , false, false, __currency_precision));
    },
    });

    $('#form_20_date_range, #20_location_id').change(function(){
    form_20_table.ajax.reload();
    setTimeout(() => {
        // get_previous_value_20();
    }, 1500);

    if($('#20_location_id').val() !== ''  && $('#20_location_id').val() !== undefined){
        $('.f20_location_name').text($('#20_location_id :selected').text())
    }else{
        $('.f20_location_name').text('All')
    }
    });

    setTimeout(() => {
    // get_previous_value_20();
    }, 1500);

});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vimi31/public_html/Modules/MPCS/Providers/../Resources/views/forms/F20andF14b/index.blade.php ENDPATH**/ ?>