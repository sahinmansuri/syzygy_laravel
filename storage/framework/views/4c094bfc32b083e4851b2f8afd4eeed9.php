<?php $__env->startSection('title', __('petro::lang.payment_summary')); ?>

<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    
    <div class="col-md-12">
        <h1 class="pull-left"><?php echo app('translator')->get('petro::lang.payment_summary'); ?></h1>
        <h2 style="color: red; text-align: center;">Shift_NO: <?php echo e($shift_number, false); ?></h2>
    </div>
    
    <a href="<?php echo e(action('Auth\PumpOperatorLoginController@logout'), false); ?>" class="btn btn-flat btn-lg pull-right"
    style=" background-color: orange; color: #fff; margin-left: 5px;"><?php echo app('translator')->get('petro::lang.logout'); ?></a>
    <a href="<?php echo e(action('\Modules\Petro\Http\Controllers\PumpOperatorController@dashboard'), false); ?>"
        class="btn btn-flat btn-lg pull-right"
        style="color: #fff; background-color:#810040;"><?php echo app('translator')->get('petro::lang.dashboard'); ?>
    </a>

</section>
<div class="clearfix"></div>
<?php echo $__env->make('petro::pump_operators.partials.payment_summary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
    var body = document.getElementsByTagName("body")[0];
    body.className += " sidebar-collapse";
    
if ($('#payment_summary_date_range').length == 1) {
    $('#payment_summary_date_range').daterangepicker(dateRangeSettings, function(start, end) {
        $('#payment_summary_date_range').val(
            start.format(moment_date_format) + ' - ' + end.format(moment_date_format)
        );
    });
    $('#payment_summary_date_range').on('cancel.daterangepicker', function(ev, picker) {
        $('#payment_summary_date_range').val('');
    });
    $('#payment_summary_date_range')
        .data('daterangepicker')
        .setStartDate(moment().startOf('month'));
    $('#payment_summary_date_range')
        .data('daterangepicker')
        .setEndDate(moment().endOf('month'));
}
$(document).ready( function(){
    pump_operators_payment_summary_table = $('#pump_operators_payment_summary_table').DataTable({
        processing: true,
        serverSide: true,
        aaSorting: [[0, 'desc']],
        ajax: {
            url: "<?php echo e(action('\Modules\Petro\Http\Controllers\PumpOperatorPaymentController@index', ['only_pumper' => true]), false); ?>",
            data: function(d) {
                d.shift_id = $("#payment_summary_shift_id").val();
            },
        },
        columnDefs: [ {
            "targets": 0,
            "orderable": false,
            "searchable": false
        }],
        columns: [
            { data: 'action', name: 'action' },
            { data: 'date', name: 'date' },
            { data: 'location_name', name: 'business_locations.name'},
            { data: 'time', name: 'time' },
            { data: 'pump_operator_name', name: 'pump_operators.name' },
            { data: 'shift_number', name: 'shift_number' },
            { data: 'collection_form_no', name: 'collection_form_no' },
            { data: 'payment_type', name: 'payment_type' },
            { data: 'amount', name: 'amount' }
        ],
        fnDrawCallback: function(oSettings) {
            var footer_payment_summary_amount = sum_table_col($('#pump_operators_payment_summary_table'), 'amount');
            $('#footer_payment_summary_amount').text(footer_payment_summary_amount);
          
            __currency_convert_recursively($('#pump_operators_payment_summary_table'));
        },
    });
    
     $(document).on('change', '#payment_summary_shift_id', function(){
        pump_operators_payment_summary_table.ajax.reload();
    });
});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.'.$layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vimi31/public_html/Modules/Petro/Providers/../Resources/views/pump_operators/payment_summary.blade.php ENDPATH**/ ?>