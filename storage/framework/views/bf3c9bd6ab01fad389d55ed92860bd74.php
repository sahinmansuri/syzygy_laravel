<?php $__env->startSection('title', __( 'sale.list_pos')); ?>

<?php $__env->startSection('css'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.2/pdfmake.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.2/vfs_fonts.js"></script> -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<section class="content-header no-print">
    <h1>POS</h1>
</section>

<!-- Main content -->
<section class="content main-content-inner no-print">
    <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
        <?php echo $__env->make('sell.partials.sell_list_filters', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->renderComponent(); ?>

    <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __( 'sale.list_pos'), 'date' => '']); ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sell.create')): ?>
            <?php $__env->slot('tool'); ?>
                <div class="box-tools pull-right">
                    <a class="btn btn-primary" href="<?php echo e(action('SellPosController@create'), false); ?>">
                    <i class="fa fa-plus"></i> <?php echo app('translator')->get('messages.add'); ?></a>
                </div>
            <?php $__env->endSlot(); ?>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sell.view')): ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped ajax_view" id="sell_table">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->get('messages.action'); ?></th>
                            <th><?php echo app('translator')->get('messages.date'); ?></th>
                            <th><?php echo app('translator')->get('sale.invoice_no'); ?></th>
                            <th><?php echo app('translator')->get('sale.customer_name'); ?></th>
                            <th><?php echo app('translator')->get('lang_v1.contact_no'); ?></th>
                            <th><?php echo app('translator')->get('sale.location'); ?></th>
                            <th><?php echo app('translator')->get('sale.payment_status'); ?></th>
                            <th><?php echo app('translator')->get('lang_v1.payment_method'); ?></th>
                            <th><?php echo app('translator')->get('sale.total_amount'); ?></th>
                            <th><?php echo app('translator')->get('sale.total_paid'); ?></th>
                            <th><?php echo app('translator')->get('lang_v1.sell_due'); ?></th>
                            <th><?php echo app('translator')->get('lang_v1.sell_return_due'); ?></th>
                            <th><?php echo app('translator')->get('lang_v1.shipping_status'); ?></th>
                            <th><?php echo app('translator')->get('lang_v1.total_items'); ?></th>
                            <th><?php echo app('translator')->get('lang_v1.types_of_service'); ?></th>
                            <th><?php echo app('translator')->get('lang_v1.third_party_order_id'); ?></th>
                            <th><?php echo app('translator')->get('lang_v1.added_by'); ?></th>
                            <th><?php echo app('translator')->get('sale.sell_note'); ?></th>
                            <th><?php echo app('translator')->get('sale.staff_note'); ?></th>
                            <th><?php echo app('translator')->get('sale.shipping_details'); ?></th>
                            <th><?php echo app('translator')->get('restaurant.table'); ?></th>
                            <th><?php echo app('translator')->get('restaurant.service_staff'); ?></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr class="bg-gray font-17 footer-total text-center">
                            <td colspan="6"><strong><?php echo app('translator')->get('sale.total'); ?>:</strong></td>
                            <td id="footer_payment_status_count"></td>
                            <td id="payment_method_count"></td>
                            <td><span class="display_currency" id="footer_sale_total" data-currency_symbol ="true"></span></td>
                            <td><span class="display_currency" id="footer_total_paid" data-currency_symbol ="true"></span></td>
                            <td><span class="display_currency" id="footer_total_remaining" data-currency_symbol ="true"></span></td>
                            <td><span class="display_currency" id="footer_total_sell_return_due" data-currency_symbol ="true"></span></td>
                            <td colspan="2"></td>
                            <td id="service_type_count"></td>
                            <td colspan="7"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        <?php endif; ?>
    <?php echo $__env->renderComponent(); ?>
</section>

<div class="modal fade edit_payment_modal" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>

<div class="modal fade register_details_modal" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>
<div class="modal fade close_register_modal" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>

<!-- /.content -->
<div class="modal fade payment_modal" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>

<!-- This will be printed -->
<!-- <section class="invoice print_section" id="receipt_section">
</section> -->


<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
$(document).ready( function(){
    //Date range as a button
    $('#sell_list_filter_date_range').daterangepicker(
        dateRangeSettings,
        function (start, end) {
            $('#sell_list_filter_date_range').val(start.format(moment_date_format) + ' ~ ' + end.format(moment_date_format));
            $("#report_date_range").text("Date Range: "+ $("#sell_list_filter_date_range").val());
            sell_table.ajax.reload();
        }
    );
    $('#sell_list_filter_date_range').on('cancel.daterangepicker', function(ev, picker) {
        $('#sell_list_filter_date_range').val('');
        $("#report_date_range").text("Date Range: - ");
        sell_table.ajax.reload();
    });
    $('#sell_list_filter_date_range').on('apply.daterangepicker', function(ev, picker) {
        if (picker.chosenLabel === 'Custom Date Range') {
            $('#target_custom_date_input').val('sell_list_filter_date_range');
            $('.custom_date_typing_modal').modal('show');
        }
    });
    $('#custom_date_apply_button').on('click', function() {
        debugger;
        if($('#target_custom_date_input').val() == "sell_list_filter_date_range"){
            let startDate = $('#custom_date_from_year1').val() + $('#custom_date_from_year2').val() + $('#custom_date_from_year3').val() + $('#custom_date_from_year4').val() + "-" + $('#custom_date_from_month1').val() + $('#custom_date_from_month2').val() + "-" + $('#custom_date_from_date1').val() + $('#custom_date_from_date2').val();
            let endDate = $('#custom_date_to_year1').val() + $('#custom_date_to_year2').val() + $('#custom_date_to_year3').val() + $('#custom_date_to_year4').val() + "-" + $('#custom_date_to_month1').val() + $('#custom_date_to_month2').val() + "-" + $('#custom_date_to_date1').val() + $('#custom_date_to_date2').val();

            if (startDate.length === 10 && endDate.length === 10) {
                let formattedStartDate = moment(startDate).format(moment_date_format);
                let formattedEndDate = moment(endDate).format(moment_date_format);

                $('#sell_list_filter_date_range').val(
                    formattedStartDate + ' ~ ' + formattedEndDate
                );

                $('#sell_list_filter_date_range').data('daterangepicker').setStartDate(moment(startDate));
                $('#sell_list_filter_date_range').data('daterangepicker').setEndDate(moment(endDate));

                $('.custom_date_typing_modal').modal('hide');
            } else {
                alert("Please select both start and end dates.");
            }
        }
    });
    $('#sell_list_filter_date_range').data('daterangepicker').setStartDate(moment().startOf('month'));

    $('#sell_list_filter_date_range').data('daterangepicker').setEndDate(moment().endOf('month'));
    
    sell_table = $('#sell_table').DataTable({
        processing: true,
        serverSide: true,
        // aaSorting: [[1, 'desc']],
        "ajax": {
            "url": "/sales",
            "data": function ( d ) {
                if($('#sell_list_filter_date_range').val()) {
                    var start = $('#sell_list_filter_date_range').data('daterangepicker').startDate.format('YYYY-MM-DD');
                    var end = $('#sell_list_filter_date_range').data('daterangepicker').endDate.format('YYYY-MM-DD');
                    d.start_date = start;
                    d.end_date = end;
                }
                d.is_direct_sale = 0;

                d.location_id = $('#sell_list_filter_location_id').val();
                d.customer_id = $('#sell_list_filter_customer_id').val();
                d.payment_status = $('#sell_list_filter_payment_status').val();
                d.created_by = $('#created_by').val();
                d.sales_cmsn_agnt = $('#sales_cmsn_agnt').val();
                d.service_staffs = $('#service_staffs').val();
            }
        },
        columns: [
            { data: 'action', name: 'action', orderable: false, "searchable": false},
            { data: 'transaction_date', name: 'transaction_date'  },
            { data: 'invoice_no', name: 'invoice_no'},
            { data: 'name', name: 'contacts.name'},
            { data: 'mobile', name: 'contacts.mobile'},
            { data: 'business_location', name: 'bl.name'},
            { data: 'payment_status', name: 'payment_status'},
            { data: 'payment_methods', orderable: false, "searchable": false},
            { data: 'final_total', name: 'final_total'},
            { data: 'total_paid', name: 'total_paid', "searchable": false},
            { data: 'total_remaining', name: 'total_remaining'},
            { data: 'return_due', orderable: false, "searchable": false},
            { data: 'shipping_status', name: 'shipping_status'},
            { data: 'total_items', name: 'total_items', "searchable": false},
            { data: 'types_of_service_name', name: 'tos.name'},
            { data: 'service_custom_field_1', name: 'service_custom_field_1'},
            { data: 'added_by', name: 'u.first_name'},
            { data: 'additional_notes', name: 'additional_notes'},
            { data: 'staff_note', name: 'staff_note'},
            { data: 'shipping_details', name: 'shipping_details'},
            { data: 'table_name', name: 'tables.name', <?php if(empty($is_tables_enabled)): ?> visible: false <?php endif; ?> },
            { data: 'waiter', name: 'ss.first_name', <?php if(empty($is_service_staff_enabled)): ?> visible: false <?php endif; ?> }
        ],
        "fnDrawCallback": function (oSettings) {
            
            $('#footer_sale_total').text(sum_table_col($('#sell_table'), 'final-total'));

            $('#footer_total_paid').text(sum_table_col($('#sell_table'), 'total-paid'));

            $('#footer_total_remaining').text(sum_table_col($('#sell_table'), 'payment_due'));
            $('#footer_total_sell_return_due').text(sum_table_col($('#sell_table'), 'sell_return_due'));

            $('#footer_payment_status_count ').html(__sum_status_html($('#sell_table'), 'payment-status-label'));
            $('#service_type_count').html(__sum_status_html($('#sell_table'), 'service-type-label'));
            $('#payment_method_count').html(__sum_status_html($('#sell_table'), 'payment-method'));

            __currency_convert_recursively($('#sell_table'));
        },
        createdRow: function( row, data, dataIndex ) {
            $( row ).find('td:eq(6)').attr('class', 'clickable_td');
        }
    });

    $(document).on('change', '#sell_list_filter_location_id, #sell_list_filter_customer_id, #sell_list_filter_payment_status, #created_by, #sales_cmsn_agnt, #service_staffs',  function() {
        sell_table.ajax.reload();
    });
});

</script>
<script src="<?php echo e(asset('js/payment.js?v=' . $asset_v), false); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vimi31/public_html/resources/views/sale_pos/index.blade.php ENDPATH**/ ?>