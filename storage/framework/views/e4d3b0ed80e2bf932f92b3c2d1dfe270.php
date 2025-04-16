

<?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('history_date_range', __('report.date_range') . ':'); ?>

                <?php echo Form::text('history_date_range', null, ['placeholder' => __('lang_v1.select_a_date_range'), 'class'
                => 'form-control', 'readonly']); ?>

            </div>
        </div>
        
       
        
        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('username', __('superadmin::lang.username') . ':'); ?>

                <?php echo Form::select('username', $usernames, null, ['class' => 'form-control
                select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); ?>

            </div>
        </div>
        
        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('sender_name', __('superadmin::lang.sender_name') . ':'); ?>

                <?php echo Form::select('sender_name', $sender_names, null, ['class' => 'form-control
                select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); ?>

            </div>
        </div>
        
        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('sms_type_', __('superadmin::lang.sms_type') . ':'); ?>

                <?php echo Form::select('sms_type_', $sms_type, null, ['class' => 'form-control
                select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); ?>

            </div>
        </div>
        
        <div class="clearfix"></div>
        
        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('sms_status', __('superadmin::lang.sms_status') . ':'); ?>

                <?php echo Form::select('sms_status', $sms_status, null, ['class' => 'form-control
                select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); ?>

            </div>
        </div>
        
       
        
    </div>
<?php echo $__env->renderComponent(); ?>


<?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __( 'superadmin::lang.sms_history' )]); ?>

<div class="table-responsive">
    <table class="table table-bordered table-striped" id="sms_history_table" style="width: 100%;">
        <thead>
            <tr>
                <th><?php echo app('translator')->get( 'superadmin::lang.date' ); ?></th>
                <th><?php echo app('translator')->get( 'superadmin::lang.id_no' ); ?></th>
                <th><?php echo app('translator')->get( 'superadmin::lang.username' ); ?></th>
                <th><?php echo app('translator')->get( 'superadmin::lang.sender_name' ); ?></th>
                <th><?php echo app('translator')->get( 'superadmin::lang.phone_no' ); ?></th>
                <th><?php echo app('translator')->get( 'superadmin::lang.message' ); ?></th>
                <th><?php echo app('translator')->get( 'superadmin::lang.sms_type' ); ?></th>
                <th><?php echo app('translator')->get( 'superadmin::lang.no_of_sms' ); ?></th>
                <th><?php echo app('translator')->get( 'superadmin::lang.sms_status' ); ?></th
            </tr>
        </thead>
    </table>
</div>

<?php echo $__env->renderComponent(); ?><?php /**PATH /home/vimi31/public_html/Modules/SMS/Providers/../Resources/views/list_sms/sms_history.blade.php ENDPATH**/ ?>