<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-3 text-red">
            <b><?php echo app('translator')->get('mpcs::lang.date_and_time'); ?>: <span class="9c_from_date"><?php echo e($date, false); ?></span> </b>
        </div>
        <div class="col-md-3 text-red">
            <b><?php echo app('translator')->get('mpcs::lang.ref_previous_form_number'); ?>: <span class="9c_from_date"><?php echo e($form_number, false); ?></span> </b>
        </div>
        <div class="col-md-3">
            <div class="text-center">
                <h5 style="font-weight: bold;"><?php echo app('translator')->get('mpcs::lang.user_added'); ?>: <?php echo e($name, false); ?> <br>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="box-tools pull-right" style="margin: 14px 20px 14px 0;">
            <button type="button" class="btn btn-primary btn-modal" data-href="<?php echo e(action('\Modules\MPCS\Http\Controllers\Form9ASettingsController@create'), false); ?>" data-container=".form_9_a_settings_modal">
                <i class="fa fa-plus"></i> <?php echo app('translator')->get( 'mpcs::lang.add_form_9_a_settings' ); ?></button>
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
                            <table id="form_9a_settings_table" class="table table-striped table-bordered" cellspacing="0"
                                width="100%">
                                <thead>
                                    <tr>
                                        <th><?php echo app('translator')->get('mpcs::lang.action'); ?></th>
                                        <th><?php echo app('translator')->get('mpcs::lang.form_starting_number'); ?></th>
                                        <th><?php echo app('translator')->get('mpcs::lang.total_sale_up_to_previous_day'); ?></th>
                                        <th><?php echo app('translator')->get('mpcs::lang.previous_day_cash_sale'); ?></th>
                                        <th><?php echo app('translator')->get('mpcs::lang.previous_day_card_sale'); ?></th>
                                        <th><?php echo app('translator')->get('mpcs::lang.previous_day_credit_sale'); ?></th>
                                        <th><?php echo app('translator')->get('mpcs::lang.previous_day_cash'); ?></th>
                                        <th><?php echo app('translator')->get('mpcs::lang.previous_day_cheques_cards'); ?></th>
                                        <th><?php echo app('translator')->get('mpcs::lang.previous_day_total'); ?></th>
                                        <th><?php echo app('translator')->get('mpcs::lang.previous_day_balance_in_hand'); ?></th>
                                        <th><?php echo app('translator')->get('mpcs::lang.previous_day_grand_total'); ?></th>
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

</section>
<!-- /.content --><?php /**PATH /home/vimi31/public_html/Modules/MPCS/Providers/../Resources/views/forms/partials/9a_settings_form.blade.php ENDPATH**/ ?>