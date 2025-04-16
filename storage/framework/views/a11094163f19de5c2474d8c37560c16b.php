<!-- Main content -->
<section class="content">
    <?php echo Form::open(['url' => action('\Modules\Manufacturing\Http\Controllers\SettingsController@store'), 'method' => 'post', 'id' => 'manufacturing_settings_form' ]); ?>

    <div class="row">
        <div class="col-xs-12">
           <!--  <pos-tab-container> -->
            <div class="col-xs-12 pos-tab-container">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 pos-tab-menu">
                    <div class="list-group">
                        <a href="#" class="list-group-item text-center active"><?php echo app('translator')->get('messages.settings'); ?></a>
                        <a href="#" class="list-group-item text-center"><?php echo app('translator')->get('manufacturing::lang.wastage'); ?></a>
                        <a href="#" class="list-group-item text-center"><?php echo app('translator')->get('manufacturing::lang.extra_cost'); ?></a>
                        <a href="#" class="list-group-item text-center"><?php echo app('translator')->get('manufacturing::lang.by_products'); ?></a>
                        <a href="#" class="list-group-item text-center"><?php echo app('translator')->get('manufacturing::lang.lot_numbers'); ?></a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 pos-tab">
                    <div class="pos-tab-content active">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo Form::label('ref_no_prefix', __('manufacturing::lang.mfg_ref_no_prefix') . ':' ); ?>

                                    <?php echo Form::text('ref_no_prefix', !empty($manufacturing_settings['ref_no_prefix']) ? $manufacturing_settings['ref_no_prefix'] : null, ['placeholder' => __('manufacturing::lang.mfg_ref_no_prefix'), 'class' => 'form-control']); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <br>
                                    <div class="checkbox">
                                        <label>
                                        <?php echo Form::checkbox('disable_editing_ingredient_qty', 1, !empty($manufacturing_settings['disable_editing_ingredient_qty']), ['class' => 'input-icheck', 'id' => 'disable_editing_ingredient_qty']); ?> <?php echo app('translator')->get('manufacturing::lang.disable_editing_ingredient_qty'); ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <br>
                                    <div class="checkbox">
                                        <label>
                                        <?php echo Form::checkbox('enable_updating_product_price', 1, !empty($manufacturing_settings['enable_updating_product_price']), ['class' => 'input-icheck', 'id' => 'enable_updating_product_price']); ?> <?php echo app('translator')->get('manufacturing::lang.enable_editing_product_price_after_production'); ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                   
                    <?php echo $__env->make('manufacturing::settings.partials.wastage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('manufacturing::settings.partials.extra_cost', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('manufacturing::settings.partials.by_products', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('manufacturing::settings.partials.lot_numbers', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                
                </div>
            </div>
            <!--  </pos-tab-container> -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary pull-right"><?php echo app('translator')->get('messages.update'); ?></button>
        </div>
    </div>

    
    <?php echo Form::close(); ?>

</section><?php /**PATH /home/vimi31/public_html/Modules/Manufacturing/Providers/../Resources/views/settings/index.blade.php ENDPATH**/ ?>