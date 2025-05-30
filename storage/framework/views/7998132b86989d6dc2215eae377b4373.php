<div class="pos-tab-content">
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('tax_label_1', __('business.tax_1_name') . ':'); ?>

                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-info"></i>
                    </span>
                    <?php echo Form::text('tax_label_1', $business->tax_label_1, ['class' => 'form-control','placeholder' => __('business.tax_1_placeholder')]); ?>

                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('tax_number_1', __('business.tax_1_no') . ':'); ?>

                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-info"></i>
                    </span>
                    <?php echo Form::text('tax_number_1', $business->tax_number_1, ['class' => 'form-control']); ?>

                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('tax_label_2', __('business.tax_2_name') . ':'); ?>

                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-info"></i>
                    </span>
                    <?php echo Form::text('tax_label_2', $business->tax_label_2, ['class' => 'form-control','placeholder' => __('business.tax_1_placeholder')]); ?>

                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('tax_number_2', __('business.tax_2_no') . ':'); ?>

                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-info"></i>
                    </span>
                    <?php echo Form::text('tax_number_2', $business->tax_number_2, ['class' => 'form-control']); ?>

                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="form-group">
                <div class="checkbox">
                <br>
                  <label>
                    <?php echo Form::checkbox('enable_inline_tax', 1, $business->enable_inline_tax , 
                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.enable_inline_tax' ), false); ?>

                  </label>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/vimi31/public_html/resources/views/business/partials/settings_tax.blade.php ENDPATH**/ ?>