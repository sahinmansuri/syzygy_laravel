<div class="pos-tab-content">
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('default_sales_discount', __('business.default_sales_discount') . ':*'); ?>

                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-percent"></i>
                    </span>
                    <?php echo Form::text('default_sales_discount', number_format($business->default_sales_discount,  2, session('currency')['decimal_separator'], session('currency')['thousand_separator']), ['class' => 'form-control input_number']); ?>

                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('default_sales_tax', __('business.default_sales_tax') . ':'); ?>

                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-info"></i>
                    </span>
                    <?php echo Form::select('default_sales_tax', $tax_rates, $business->default_sales_tax, ['class' => 'form-control select2','placeholder' => __('business.default_sales_tax'), 'style' => 'width: 100%;']); ?>

                </div>
            </div>
        </div>
        <!-- <div class="clearfix"></div> -->

        
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('sales_cmsn_agnt', __('lang_v1.sales_commission_agent') . ':'); ?>

                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-info"></i>
                    </span>
                    <?php echo Form::select('sales_cmsn_agnt', $commission_agent_dropdown, $business->sales_cmsn_agnt, ['class' => 'form-control select2', 'style' => 'width: 100%;']); ?>

                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('item_addition_method', __('lang_v1.sales_item_addition_method') . ':'); ?>

                <?php echo Form::select('item_addition_method', [ 0 => __('lang_v1.add_item_in_new_row'), 1 =>  __('lang_v1.increase_item_qty')], $business->item_addition_method, ['class' => 'form-control select2', 'style' => 'width: 100%;']); ?>

            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('service_addition_method', __('lang_v1.service_item_addition_method') . ':'); ?>

                <?php echo Form::select('service_addition_method', [ 0 => __('lang_v1.add_service_in_new_row'), 1 =>  __('lang_v1.increase_item_qty')], $business->service_addition_method, ['class' => 'form-control select2', 'style' => 'width: 100%;']); ?>

            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <div class="checkbox">
                <br>
                  <label>
                    <?php echo Form::checkbox('pos_settings[enable_msp]', 1,  
                        !empty($pos_settings['enable_msp']) ? true : false , 
                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.sale_price_is_minimum_sale_price' ), false); ?> 
                  </label>
                  <?php if(!empty($help_explanations['sale_price_is_minimum_selling_price'])): ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . $help_explanations['sale_price_is_minimum_selling_price'] . '" data-html="true" data-trigger="hover"></i>';
                }
                ?> <?php endif; ?>
                </div>
            </div>
        </div>
        
        <div class="clearfix"></div>
        <div class="col-sm-4">
            <div class="form-group">
                <div class="checkbox">
                <br>
                  <label>
                    <?php echo Form::checkbox('pos_settings[price_later_sales]', 1,  
                        !empty($pos_settings['price_later_sales']) ? true : false , 
                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.price_later' ), false); ?> 
                  </label>
                  <?php if(!empty($help_explanations['price_later_sales'])): ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . $help_explanations['price_later_sales'] . '" data-html="true" data-trigger="hover"></i>';
                }
                ?> <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <div class="checkbox">
                <br>
                  <label>
                    <?php echo Form::checkbox('pos_settings[allow_overselling]', 1,  
                        !empty($pos_settings['allow_overselling']) ? true : false , 
                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.allow_overselling' ), false); ?> 
                  </label>
                  <?php if(!empty($help_explanations['allow_overselling'])): ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . $help_explanations['allow_overselling'] . '" data-html="true" data-trigger="hover"></i>';
                }
                ?> <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <div class="checkbox">
                <br>
                  <label>
                    <?php echo Form::checkbox('pos_settings[sold_product_list]', 1,  
                        !empty($pos_settings['sold_product_list']) ? true : false , 
                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.sold_product_list' ), false); ?> 
                  </label>
                  <?php if(!empty($help_explanations['sold_product_list_in_the_register_report'])): ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . $help_explanations['sold_product_list_in_the_register_report'] . '" data-html="true" data-trigger="hover"></i>';
                }
                ?> <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <div class="checkbox">
                <br>
                  <label>
                    <?php echo Form::checkbox('pos_settings[enable_line_discount]', 1,  
                        !empty($pos_settings['enable_line_discount']) ? true : false , 
                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.enable_line_discount' ), false); ?> 
                  </label>
                  <?php if(!empty($help_explanations['enable_line_discount'])): ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . $help_explanations['enable_line_discount'] . '" data-html="true" data-trigger="hover"></i>';
                }
                ?> <?php endif; ?>
                </div>
            </div>
        </div>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_product_price_below_purchase_price')): ?>
        <div class="col-sm-4">
            <div class="form-group">
                <div class="checkbox">
                <br>
                  <label>
                    <?php echo Form::checkbox('pos_settings[enable_below_cost_price]', 1,  
                        !empty($pos_settings['enable_below_cost_price']) ? true : false , 
                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.enable_below_cost_price' ), false); ?> 
                  </label>
                  <?php if(!empty($help_explanations['below_cost_price'])): ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . $help_explanations['below_cost_price'] . '" data-html="true" data-trigger="hover"></i>';
                }
                ?> <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <?php
        $tc_sale_and_pos = DB::table('site_settings')->where('id', 1)->select('tc_sale_and_pos')->first()->tc_sale_and_pos;
    ?>
    <?php if($tc_sale_and_pos == 1): ?>
    <div class="row">
        <div class="col-md-6" id="lp_title">
            <div class="form-group">
                <label>Terms & Condition for the Sales / POS invoice</label>
                <textarea id="tc_sale_and_pos_text" name="pos_settings[tc_sale_and_pos_text]"></textarea>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>
<?php /**PATH /home/vimi31/public_html/resources/views/business/partials/settings_sales.blade.php ENDPATH**/ ?>