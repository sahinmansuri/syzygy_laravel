<div class="pos-tab-content ">
     <div class="row">
        <div class="col-sm-12">
            <strong><?php echo app('translator')->get('lang_v1.labels_for_custom_payments'); ?>:</strong><br>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('custom_payment_1_label', __('lang_v1.custom_payment_1')); ?>

                <?php echo Form::text('custom_labels[payments][custom_pay_1]', !empty($custom_labels['payments']['custom_pay_1']) ? $custom_labels['payments']['custom_pay_1'] : null, 
                    ['class' => 'form-control', 'id' => 'custom_payment_1']); ?>

            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('custom_payment_2_label', __('lang_v1.custom_payment_2')); ?>

                <?php echo Form::text('custom_labels[payments][custom_pay_2]', !empty($custom_labels['payments']['custom_pay_2']) ? $custom_labels['payments']['custom_pay_2'] : null, 
                    ['class' => 'form-control', 'id' => 'custom_payment_2']); ?>

            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('custom_payment_3_label', __('lang_v1.custom_payment_3')); ?>

                <?php echo Form::text('custom_labels[payments][custom_pay_3]', !empty($custom_labels['payments']['custom_pay_3']) ? $custom_labels['payments']['custom_pay_3'] : null, 
                    ['class' => 'form-control', 'id' => 'custom_payment_3']); ?>

            </div>
        </div>
    </div>
     <div class="row">
        <div class="col-sm-12">
            <strong><?php echo app('translator')->get('lang_v1.labels_for_custom_fields'); ?>:</strong><br>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-3">
            <div class="form-group">
                <?php echo Form::label('custom_field_1_label', __('lang_v1.custom_field_1')); ?>

                <?php echo Form::text('custom_labels[custom_field][custom_field_1]', !empty($custom_labels['custom_field']['custom_field_1']) ? $custom_labels['custom_field']['custom_field_1'] : null, 
                    ['class' => 'form-control', 'id' => 'custom_field_1']); ?>

            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <?php echo Form::label('custom_field_2_label', __('lang_v1.custom_field_2')); ?>

                <?php echo Form::text('custom_labels[custom_field][custom_field_2]', !empty($custom_labels['custom_field']['custom_field_2']) ? $custom_labels['custom_field']['custom_field_2'] : null, 
                    ['class' => 'form-control', 'id' => 'custom_field_2']); ?>

            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <?php echo Form::label('custom_field_3_label', __('lang_v1.custom_field_3')); ?>

                <?php echo Form::text('custom_labels[custom_field][custom_field_3]', !empty($custom_labels['custom_field']['custom_field_3']) ? $custom_labels['custom_field']['custom_field_3'] : null, 
                    ['class' => 'form-control', 'id' => 'custom_field_3']); ?>

            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <?php echo Form::label('custom_field_4_label', __('lang_v1.custom_field_4')); ?>

                <?php echo Form::text('custom_labels[custom_field][custom_field_4]', !empty($custom_labels['custom_field']['custom_field_4']) ? $custom_labels['custom_field']['custom_field_4'] : null, 
                    ['class' => 'form-control', 'id' => 'custom_field_4']); ?>

            </div>
        </div>
    </div>
</div><?php /**PATH /home/vimi31/public_html/resources/views/business/partials/settings_custom_labels.blade.php ENDPATH**/ ?>