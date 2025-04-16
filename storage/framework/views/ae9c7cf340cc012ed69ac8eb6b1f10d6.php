<div class="pos-tab-content active">
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('name',__('business.business_name') . ':*'); ?>

                <?php echo Form::text('name', $business->name, ['class' => 'form-control', 'required', 'readonly',
                'placeholder' => __('business.business_name')]); ?>

            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('start_date', __('business.start_date') . ':'); ?>

                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </span>
                    
                    <?php echo Form::text('start_date', \Carbon::createFromTimestamp(strtotime($business->start_date))->format(session('business.date_format')), ['class' => 'form-control start-date-picker','placeholder' => __('business.start_date'), 'readonly']); ?>

                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('default_profit_percent', __('business.default_profit_percent') . ':*'); ?> <?php if(!empty($help_explanations['default_profit_percent'])): ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . $help_explanations['default_profit_percent'] . '" data-html="true" data-trigger="hover"></i>';
                }
                ?> <?php endif; ?>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-plus-circle"></i>
                    </span>
                    <?php echo Form::text('default_profit_percent', number_format($business->default_profit_percent,  2, session('currency')['decimal_separator'], session('currency')['thousand_separator']), ['class' => 'form-control input_number']); ?>

                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('currency_id', __('business.currency') . ':'); ?>

                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-money"></i>
                    </span>
                    <?php echo Form::select('currency_id', $currencies, $business->currency_id, ['class' => 'form-control select2','placeholder' => __('business.currency'), 'required']); ?>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <?php echo Form::label('currency_symbol_placement', __('lang_v1.currency_symbol_placement') . ':'); ?>

                <?php echo Form::select('currency_symbol_placement', ['before' => __('lang_v1.before_amount'), 'after' => __('lang_v1.after_amount')], $business->currency_symbol_placement, ['class' => 'form-control select2', 'required']); ?>

            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <?php echo Form::label('time_zone', __('business.time_zone') . ':'); ?>

                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                    </span>
                    <?php echo Form::select('time_zone', $timezone_list, $business->time_zone, ['class' => 'form-control select2', 'required']); ?>

                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('business_logo', __('business.upload_logo') . ':'); ?>

                    <?php echo Form::file('business_logo', ['accept' => 'image/*']); ?>

                    <p class="help-block"><i> <?php echo app('translator')->get('business.logo_help'); ?></i></p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <?php echo Form::label('fy_start_month', __('business.fy_start_month') . ':'); ?><?php if(!empty($help_explanations['financial_year_start_month'])): ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . $help_explanations['financial_year_start_month'] . '" data-html="true" data-trigger="hover"></i>';
                }
                ?> <?php endif; ?>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </span>
                    <?php echo Form::select('fy_start_month', $months, $business->fy_start_month, ['class' => 'form-control select2', 'required']); ?>

                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('accounting_method', __('business.accounting_method') . ':*'); ?>

                <?php if(!empty($help_explanations['stock_accounting_method'])): ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . $help_explanations['stock_accounting_method'] . '" data-html="true" data-trigger="hover"></i>';
                }
                ?> <?php endif; ?>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-calculator"></i>
                    </span>
                    <?php echo Form::select('accounting_method', $accounting_methods, $business->accounting_method, ['class' => 'form-control select2', 'required']); ?>

                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('transaction_edit_days', __('business.transaction_edit_days') . ':*'); ?>

                <?php if(!empty($help_explanations['transaction_edit_days'])): ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . $help_explanations['transaction_edit_days'] . '" data-html="true" data-trigger="hover"></i>';
                }
                ?> <?php endif; ?>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-edit"></i>
                    </span>
                    <?php echo Form::number('transaction_edit_days', $business->transaction_edit_days, ['class' => 'form-control','placeholder' => __('business.transaction_edit_days'), 'required']); ?>

                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('date_format', __('lang_v1.date_format') . ':*'); ?>

                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </span>
                    <?php echo Form::select('date_format', $date_formats, $business->date_format, ['class' => 'form-control select2', 'required']); ?>

                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('time_format', __('lang_v1.time_format') . ':*'); ?>

                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                    </span>
                    <?php echo Form::select('time_format', [12 => __('lang_v1.12_hour'), 24 => __('lang_v1.24_hour')], $business->time_format, ['class' => 'form-control select2', 'required']); ?>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('currency_precision',__('business.currency_precision') . ':*'); ?>

                <?php echo Form::number('currency_precision', !empty($business->currency_precision) ? $business->currency_precision : 2, ['class' => 'form-control',
                'placeholder' => __('business.currency_precision')]); ?>

            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('quantity_precision',__('business.quantity_precision') . ':*'); ?>

                <?php echo Form::number('quantity_precision', !empty($business->quantity_precision) ? $business->quantity_precision : 0, ['class' => 'form-control',
                'placeholder' => __('business.quantity_precision')]); ?>

            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('font_style',__('business.font_style') ); ?>

                <?php echo Form::number('font_style', !empty($business->font_style) ? $business->font_style : null, ['class' => 'form-control',
                'placeholder' => __('business.font_style')]); ?>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('font_size',__('business.font_size') ); ?>

                <?php echo Form::number('font_size', !empty($business->font_size) ? $business->font_size : null, ['class' => 'form-control',
                'placeholder' => __('business.font_size')]); ?>

            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('reg_no',__('lang_v1.reg_no') . ':*'); ?>

                <?php echo Form::text('reg_no', !empty($business->reg_no) ? $business->reg_no : null, ['class' => 'form-control',
                'placeholder' => __('lang_v1.reg_no')]); ?>

            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <div class="checkbox">
                    <br>
                    <label>
                        <?php echo Form::checkbox('popup_load_save_data', 1, $business->popup_load_save_data ,
                        [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.popup_load_save_data' ), false); ?> </label> <?php if(!empty($help_explanations['popup_load_auto_save_data'])): ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . $help_explanations['popup_load_auto_save_data'] . '" data-html="true" data-trigger="hover"></i>';
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
                        <?php echo Form::checkbox('day_end_enable', 1, $business->day_end_enable ,
                        [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.day_end' ), false); ?> </label>  <?php if(!empty($help_explanations['day_end'])): ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . $help_explanations['day_end'] . '" data-html="true" data-trigger="hover"></i>';
                }
                ?> <?php endif; ?>
                    </label>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <div class="checkbox">
                    <br>
                    <label>
                        <?php echo Form::checkbox('enable_line_discount', 1, $business->enable_line_discount ,
                        [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.enable_line_discount' ), false); ?>  </label> <?php if(!empty($help_explanations['enable_line_discount'])): ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . $help_explanations['enable_line_discount'] . '" data-html="true" data-trigger="hover"></i>';
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
                        <?php echo Form::checkbox('duplicate_orders_allowed', 1, $business->duplicate_orders_allowed ,
                        [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.duplicate_orders_allowed' ), false); ?>  </label> <?php if(!empty($help_explanations['duplicate_orders_allowed'])): ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . $help_explanations['duplicate_orders_allowed'] . '" data-html="true" data-trigger="hover"></i>';
                }
                ?> <?php endif; ?>
                   
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="form-group" style="margin-top: 32px;">
            <label>
                <?php echo Form::checkbox('show_for_customers', 1, $business->show_for_customers, ['class' => 'input-icheck', 'id' =>
                'show_for_customers']); ?> <?php echo app('translator')->get('business.show_for_customers'); ?>  </label> <?php if(!empty($help_explanations['need_to_show_for_the_customer'])): ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . $help_explanations['need_to_show_for_the_customer'] . '" data-html="true" data-trigger="hover"></i>';
                }
                ?> <?php endif; ?>
               
            
            </div>
        </div>
        
        <div class="col-md-4 business_categories_div <?php if($business->show_for_customers == 0): ?> hide <?php endif; ?>">
            <div class="form-group">
                <?php echo Form::label('business_categories', __('business.business_categories') . ':'); ?>

                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-bars"></i>
                    </span>
                    <?php echo Form::select('business_categories[]', $business_categories, !empty($business->business_categories) ? json_decode($business->business_categories) : null, ['class' => 'form-control select2
                    business_categories', 'id' => 'business_categories', 'multiple', 'style' => 'width: 100%; margin:0px;']); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/vimi31/public_html/resources/views/business/partials/settings_business.blade.php ENDPATH**/ ?>