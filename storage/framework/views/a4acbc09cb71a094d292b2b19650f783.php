<!-- Main content -->
<section class="content">
   
<!-- <div class="row">
        <div class="col-md-3 text-red">
            <b><?php echo app('translator')->get('mpcs::lang.date_and_time'); ?>: <span class="9c_from_date"><?php echo e($date, false); ?></span> </b>
        </div>
        <div class="col-md-3 text-red">
            <b><?php echo app('translator')->get('mpcs::lang.ref_previous_form_number'); ?>: <span class="9c_from_date"><?php echo e($form_number, false); ?></span> </b>
        </div>
        <div class="col-md-3">
            <div class="text-center">
                <h5 style="font-weight: bold;"><?php echo app('translator')->get('mpcs::lang.user_added'); ?>: <?php echo e($userAdded, false); ?> <br>
            </div>
        </div>
    </div> -->


<div class="row">
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-primary btn-modal" data-href="<?php echo e(action('\Modules\MPCS\Http\Controllers\F21FormController@get21CFormSettings'), false); ?>" data-container=".form_16_a_settings_modal" <?php if($settings): ?>  disabled <?php endif; ?>>
                <i class="fa fa-plus"></i> <?php echo app('translator')->get( 'mpcs::lang.add_21_c_form_settings' ); ?></button>
        </div>
    </div>


<div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.widget', ['class' => 'box-primary']); ?>
            <div class="col-md-12">
                <div class="box-body" style="margin-top: 20px;">
                    <div class="row">
                        <div class="col-md-12">
                            
                            <div id="msg"></div>

                            <table id="form_21c_settings_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><?php echo app('translator')->get('mpcs::lang.action'); ?></th>
                                        <th><?php echo app('translator')->get('mpcs::lang.date_and_time'); ?></th>
                                        <th><?php echo app('translator')->get('mpcs::lang.form_starting_number'); ?></th>
                                        <th><?php echo app('translator')->get('mpcs::lang.ref_previous_form_number'); ?></th>
                                        <th><?php echo app('translator')->get('mpcs::lang.receipt_section_previous_day_amount'); ?></th>
                                        <th><?php echo app('translator')->get('mpcs::lang.receipt_section_opening_stock_amount'); ?></th>
                                        <th><?php echo app('translator')->get('mpcs::lang.issue_section_previous_day_amount'); ?></th>
                                        <th><?php echo app('translator')->get('mpcs::lang.pump_name'); ?></th>
                                        <th><?php echo app('translator')->get('mpcs::lang.last_meter_value'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>

  
    <div class="modal fade form_16_a_settings_modal" id="form_16_a_settings_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel"></div>
    <div class="modal fade update_form_16_a_settings_modal" id="update_form_16_a_settings_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel"></div>


</section>
<!-- /.content -->

<script type="text/javascript">

 $(document).ready(function(){

 form_21c_settings_table = $('#form_21c_settings_table').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: '/mpcs/21cformsettings',
        type: 'GET',
        dataSrc: function(json) {
            var newData = [];

            json.data.forEach(function(item) {
                // First row (General details, empty Pump columns)
                newData.push({
                    action: item.action,
                    date: item.date,
                    starting_number: item.starting_number,
                    ref_pre_form_number: item.ref_pre_form_number,
                    rec_sec_prev_day_amt: item.rec_sec_prev_day_amt,
                    rec_sec_opn_stock_amt: item.rec_sec_opn_stock_amt,
                    issue_section_previous_day_amount: item.issue_section_previous_day_amount,
                    pump_name: "",  // Empty for first row
                    last_meter_value: "" // Empty for first row
                });

                // Additional rows for each pump
                if (item.pumps_data && item.pumps_data.length > 0) {
                    item.pumps_data.forEach(function(pump) {
                        newData.push({
                            action: "",  // Empty for pump rows
                            date: "",
                            starting_number: "",
                            ref_pre_form_number: "",
                            rec_sec_prev_day_amt: "",
                            rec_sec_opn_stock_amt: "",
                            issue_section_previous_day_amount: "",
                            pump_name: pump.pump_name,
                            last_meter_value: pump.last_meter_value
                        });
                    });
                }
            });

            return newData;
        }
    },
    columns: [
        { data: 'action', name: 'action', orderable: false, searchable: false, defaultContent: '' },
        { data: 'date', name: 'date' },
        { data: 'starting_number', name: 'starting_number' },
        { data: 'ref_pre_form_number', name: 'ref_pre_form_number' },
        { data: 'rec_sec_prev_day_amt', name: 'rec_sec_prev_day_amt' },
        { data: 'rec_sec_opn_stock_amt', name: 'rec_sec_opn_stock_amt' },
        { data: 'issue_section_previous_day_amount', name: 'issue_section_previous_day_amount' },
        { data: 'pump_name', name: 'pump_name', defaultContent: '' },
        { data: 'last_meter_value', name: 'last_meter_value', defaultContent: '' }
    ]
    });

    
    });

</script>
<?php /**PATH /home/vimi31/public_html/Modules/MPCS/Providers/../Resources/views/forms/21CForm/list_f21c.blade.php ENDPATH**/ ?>