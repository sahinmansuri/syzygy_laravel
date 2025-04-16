<!-- Main content -->
<section class="content">
    

    <div class="row">
        <div class="box-tools pull-right" style="margin: 14px 20px 14px 0;">
            <button type="button" class="btn btn-primary btn-modal" data-href="<?php echo e(action('\Modules\MPCS\Http\Controllers\Form9CCRSettingsController@create'), false); ?>" data-container=".form_9_ccr_settings_modal">
                <i class="fa fa-plus"></i> <?php echo app('translator')->get( 'mpcs::lang.add_form_9_ccr_settings' ); ?></button>
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
                                         <th><?php echo app('translator')->get('mpcs::lang.date_and_time'); ?></th>
                                        <th><?php echo app('translator')->get('mpcs::lang.form_starting_number'); ?></th>
                                        <th><?php echo app('translator')->get('mpcs::lang.previous_note'); ?></th>
                                        <th><?php echo app('translator')->get('mpcs::lang.user_added'); ?></th>
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
<!-- /.content --><?php /**PATH /home/vimi31/public_html/Modules/MPCS/Providers/../Resources/views/forms/partials/9ccr_settings_form.blade.php ENDPATH**/ ?>