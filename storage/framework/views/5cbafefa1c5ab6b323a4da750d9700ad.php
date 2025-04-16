<?php if(empty($is_admin)): ?>
<h3><?php echo app('translator')->get('business.business'); ?></h3>
<?php endif; ?>
<?php
$business_or_entity = App\System::getProperty('business_or_entity');
?>
<?php echo Form::hidden('language', request()->lang); ?>

<style>
    .label_register {
        color: #000000 !important;
    }
    .select2-results__option[aria-selected="true"] {
        display: none;
    }
    .equal-column {
        min-height: 95px;
    }
</style>
<fieldset>
    <legend> <?php if($business_or_entity == 'business'): ?> <?php echo app('translator')->get('business.business_details'); ?>: <?php endif; ?> <?php if($business_or_entity
        == 'entity'): ?> <?php echo app('translator')->get('lang_v1.entity_details'); ?>: <?php endif; ?></legend>
    <input type="hidden" name="option_variables_selected" class="rm_option_variables_selected">
    <input type="hidden" name="module_selected" class="rm_module_selected">
    <input type="hidden" name="custom_price" class="rm_custom_price">
    <?php echo Form::hidden('package_id', null, ['class' => 'package_id']); ?>

    
    <div class="row">
        <div class="col-sm-4">
        <div class="form-group">
            <?php if($business_or_entity == 'business'): ?>
            <?php echo Form::label('b_name', __('business.business_name') . ':', ['class' => 'label_register'] ); ?>

            <?php elseif($business_or_entity == 'entity'): ?>
            <?php echo Form::label('b_name', __('lang_v1.entity_name') . ':' , ['class' => 'label_register']); ?>

            <?php else: ?>
            <?php echo Form::label('b_name', __('business.business_name') . ':' , ['class' => 'label_register']); ?>

            <?php endif; ?>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-suitcase"></i>
                </span>
                <?php if($business_or_entity == 'business'): ?>
                <?php echo Form::text('name', null, ['class' => 'form-control','placeholder' =>
                __('business.business_name'),'id' => 'b_name', 'required', 'autocomplete' => 'on']); ?>

                <?php elseif($business_or_entity == 'entity'): ?>
                <?php echo Form::text('name', null, ['class' => 'form-control','placeholder' =>
                __('lang_v1.entity_name'),'id' => 'b_name', 'required', 'autocomplete' => 'on']); ?>

                <?php else: ?>
                <?php echo Form::text('name', null, ['class' => 'form-control','placeholder' =>
                __('business.business_name'),'id' => 'b_name', 'required', 'autocomplete' => 'on']); ?>

                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo Form::label('start_date', __('business.start_date') . ':', ['class' => 'label_register']); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </span>
                <?php echo Form::text('start_date', null, ['class' => 'form-control start-date-picker','placeholder' =>
                __('business.start_date'), 'readonly']); ?>

            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo Form::label('currency_id', __('business.currency') . ':', ['class' => 'label_register']); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-money"></i>
                </span>
                <?php echo Form::select('currency_id', $currencies, '', ['class' => 'form-control','placeholder' => __('business.currency_placeholder'),'style' => 'width: 100%;', 'required']); ?>

            </div>
        </div>
    </div>
    </div>
    
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-sm-4">
        <div class="form-group">
            <?php echo Form::label('business_logo', __('business.upload_logo') . ':', ['class' => 'label_register']); ?>

            <?php echo Form::file('business_logo', ['accept' => 'image/*', 'id' => 'business_logo']); ?>

        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo Form::label('website', __('lang_v1.website') . ':', ['class' => 'label_register']); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-globe"></i>
                </span>
                <?php echo Form::text('website', null, ['class' => 'form-control','placeholder' => __('lang_v1.website')]); ?>

            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo Form::label('b_mobile', __('lang_v1.business_telephone') . ':*', ['class' => 'label_register']); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-phone"></i>
                </span>
                <?php echo Form::text('mobile', null, ['class' => 'form-control','placeholder' =>
                __('lang_v1.business_telephone'), 'id' => 'b_mobile','required'=>true]); ?>

            </div>
        </div>
    </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
        <div class="form-group">
            <?php echo Form::label('business_alternate_number', __('business.alternate_number') . ':', ['class' => 'label_register']); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-phone"></i>
                </span>
                <?php echo Form::text('alternate_number', null, ['class' => 'form-control','placeholder' =>
                __('business.alternate_number'), 'id' => 'business_alternate_number']); ?>

            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo Form::label('business_country', __('business.country') . ':', ['class' => 'label_register']); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-globe"></i>
                </span>
                <?php echo Form::text('country', null, ['class' => 'form-control','placeholder' => __('business.country'), 'id' => 'business_country',
                'required', 'autocomplete' => 'on']); ?>

            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo Form::label('b_state',__('business.state') . ':', ['class' => 'label_register']); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-map-marker"></i>
                </span>
                <?php echo Form::text('state', null, ['class' => 'form-control','placeholder' => __('business.state'), 'id' => 'b_state',
                'required']); ?>

            </div>
        </div>
    </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-sm-4">
        <div class="form-group">
            <?php echo Form::label('business_city',__('business.city'). ':', ['class' => 'label_register']); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-map-marker"></i>
                </span>
                <?php echo Form::text('city', null, ['class' => 'form-control','placeholder' => __('business.city'), 'id' => 'business_city',
                'required']); ?>

            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo Form::label('b_zip_code', __('business.zip_code') . ':', ['class' => 'label_register']); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-map-marker"></i>
                </span>
                <?php echo Form::text('zip_code', null, ['class' => 'form-control','placeholder' =>
                __('business.zip_code_placeholder'), 'id' => 'b_zip_code', 'required']); ?>

            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo Form::label('b_landmark', __('business.landmark') . ':', ['class' => 'label_register']); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-map-marker"></i>
                </span>
                <?php echo Form::text('landmark', null, ['class' => 'form-control','placeholder' => __('business.landmark'),
                'required', 'id' => 'b_landmark']); ?>

            </div>
        </div>
    </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
        <div class="form-group">
            <?php echo Form::label('time_zone', __('business.time_zone') . ':', ['class' => 'label_register']); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                </span>
                <?php echo Form::select('time_zone', $timezone_list, config('app.timezone'), ['class' => 'form-control','placeholder' => __('business.time_zone'), 'style' => 'width: 100%; margin:0px;',
                'required']); ?>

            </div>
        </div>
    </div>
    <?php if(in_array('company', $show_referrals_in_register_page )): ?>
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo Form::label('referral_code', __('superadmin::lang.referral_code') . ':', ['class' => 'label_register']); ?> <small><?php echo app('translator')->get('lang_v1.please_enter_referral_code_if_any'); ?></small>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-link"></i>
                </span>
                <?php echo Form::text('referral_code', 0, ['class' => 'form-control','placeholder' =>
                __('superadmin::lang.referral_code'), 'style' => 'width: 100%;',
                ]); ?>

            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="col-sm-4">
        <div class="form-group" style="margin-top: 32px;">
            <?php if(request()->segment(1) == 'superadmin'): ?>
            <label style="color: black !important;" class="label_register" for="show_for_customers">
                <?php echo Form::checkbox('show_for_customers', 1, false, ['class' => '', 'id' =>
                'show_for_customers']); ?> <?php echo app('translator')->get('business.show_for_customers'); ?></label>
            <?php else: ?>
            <label  class="label_register" for="show_for_customers">
                <?php echo Form::checkbox('show_for_customers', 1, false, ['class' => '', 'id' =>
                'show_for_customers']); ?> <?php echo app('translator')->get('business.show_for_customers'); ?></label>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-sm-4 business_categories_div hide">
        <div class="form-group">
            <?php echo Form::label('business_categories', __('business.business_categories') . ':', ['class' => 'label_register']); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-bars"></i>
                </span>
                <?php echo Form::select('business_categories[]', $business_categories, null, ['class' => 'form-control select2
                business_categories', 'id' => 'business_categories', 'multiple', 'style' => 'width: 100%;
                margin:0px;']); ?>

            </div>
        </div>
    </div>
    </div>
    
    
    
    
</fieldset>
<!-- tax details -->
<?php if(empty($is_admin)): ?>
<?php if($business_or_entity == 'business'): ?>
<h3><?php echo app('translator')->get('business.business_settings'); ?></h3>
<?php elseif($business_or_entity == 'entity'): ?>
<h3><?php echo app('translator')->get('lang_v1.entity_settings'); ?></h3>
<?php else: ?>
<h3><?php echo app('translator')->get('business.business_settings'); ?></h3>
<?php endif; ?>
<fieldset>
    <?php if($business_or_entity == 'business'): ?>
    <legend><?php echo app('translator')->get('business.business_settings'); ?>:</legend>
    <?php endif; ?>
    <?php if($business_or_entity == 'entity'): ?>
    <legend><?php echo app('translator')->get('lang_v1.entity_settings'); ?>:</legend>
    <?php endif; ?>
    
    <div class="row">
        <div class="col-sm-4">
        <div class="form-group">
            <?php echo Form::label('tax_label_1', __('business.tax_1_name') . ':', ['class' => 'label_register']); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-info"></i>
                </span>
                <?php echo Form::text('tax_label_1', null, ['class' => 'form-control','placeholder' =>
                __('business.tax_1_placeholder')]); ?>

            </div>
        </div>
    </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('tax_number_1', __('business.tax_1_no') . ':', ['class' => 'label_register']); ?>

                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-info"></i>
                    </span>
                    <?php echo Form::text('tax_number_1', null, ['class' => 'form-control']); ?>

                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('tax_label_2',__('business.tax_2_name') . ':', ['class' => 'label_register']); ?>

                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-info"></i>
                    </span>
                    <?php echo Form::text('tax_label_2', null, ['class' => 'form-control','placeholder' =>
                    __('business.tax_1_placeholder')]); ?>

                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-4">
        <div class="form-group">
            <?php echo Form::label('tax_number_2',__('business.tax_2_no') . ':', ['class' => 'label_register']); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-info"></i>
                </span>
                <?php echo Form::text('tax_number_2', null, ['class' => 'form-control',]); ?>

            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo Form::label('fy_start_month', __('business.fy_start_month') . ':', ['class' => 'label_register']); ?>

            <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.fy_start_month') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </span>
                <?php echo Form::select('fy_start_month', $months, null, ['class' => 'form-control select2',
                'required', 'style' => 'width:100%; margin: 0px;']); ?>

            </div>
        </div>
    </div>
    </div>
    
    
    <div class="row">
        <div class="col-sm-6">
        <div class="form-group">
            <?php echo Form::label('accounting_method', __('business.accounting_method') . ':', ['class' => 'label_register']); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-calculator"></i>
                </span>
                <?php echo Form::select('accounting_method', $accounting_methods, null, ['class' => 'form-control
                select2', 'required', 'style' => 'width:100%; margin:0px;']); ?>

            </div>
        </div>
    </div>
    </div>
    <?php if(in_array('company', $show_give_away_gift_in_register_page )): ?>
    <div class="col-sm-4">
        <div class="form-group">
            <?php echo Form::label('r3_give_away_gifts', __('superadmin::lang.give_away_gifts') . ':', ['class' => 'label_register']); ?>

            <?php $__currentLoopData = $give_away_gifts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $give_away_gift): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="checkbox">
                <label>
                    <?php echo Form::checkbox('give_away_gifts[]', $key, false, ['class' => '', 'id' => 'r3_give_away_gifts']); ?> <?php echo e($give_away_gift, false); ?>

                </label>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <?php endif; ?>
</fieldset>
<?php endif; ?>
<!-- Owner Information -->
<?php if(empty($is_admin)): ?>
<h3><?php echo app('translator')->get('business.owner'); ?></h3>
<?php endif; ?>
<fieldset>
    <legend><?php echo app('translator')->get('business.owner_info'); ?></legend>
    <div class="row">
        <div class="col-md-4">
        <div class="form-group">
            <?php echo Form::label('surname', __('business.prefix') . ':', ['class' => 'label_register']); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-info"></i>
                </span>
                <?php echo Form::text('surname', null, ['class' => 'form-control','placeholder' =>
                __('business.prefix_placeholder'), 'id' => 'b_surname']); ?>

            </div>
        </div>
    </div>
        <div class="col-md-4">
            <div class="form-group">
                <?php echo Form::label('b_first_name', __('business.first_name') . ':', ['class' => 'label_register']); ?>

                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-info"></i>
                    </span>
                    <?php echo Form::text('first_name', null, ['class' => 'form-control','placeholder' =>
                    __('business.first_name'), 'required', 'id' => 'b_first_name', 'autocomplete' => 'on']); ?>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <?php echo Form::label('b_last_name', __('business.last_name') . ':', ['class' => 'label_register']); ?>

                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-info"></i>
                    </span>
                    <?php echo Form::text('last_name', null, ['class' => 'form-control','placeholder' =>
                    __('business.last_name'), 'id' => 'b_last_name']); ?>

                </div>
            </div>
        </div>
    </div>
    
    
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-sm-4">
        <div class="form-group">
            <?php echo Form::label('b_username', __('business.username') . ':', ['class' => 'label_register']); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-user"></i>
                </span>
                <?php echo Form::text('username', null, ['class' => 'form-control','placeholder' => __('business.username'), 'id' => 'b_username',
                'required', 'autocomplete' => 'on']); ?>

            </div>
        </div>
    </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('b_email', __('business.email') . ':', ['class' => 'label_register']); ?>

                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-envelope"></i>
                    </span>
                    <?php echo Form::text('email', null, ['class' => 'form-control','placeholder' => __('business.email'), 'id' => 'b_email', 'autocomplete' => 'on']); ?>

                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('b_password', __('business.password') . ':', ['class' => 'label_register']); ?>

                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-lock"></i>
                    </span>
                    <?php echo Form::password('password', ['class' => 'form-control','placeholder' => __('business.password'), 'id' => 'b_password',
                    'style' => 'margin:0px;', 'required']); ?>

                </div>
            </div>
        </div>
    </div>
    
    
    <div class="row">
        <div class="col-sm-4">
        <div class="form-group">
            <?php echo Form::label('b_confirm_password', __('business.confirm_password') . ':', ['class' => 'label_register']); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-lock"></i>
                </span>
                <?php echo Form::password('confirm_password', ['class' => 'form-control','placeholder' =>
                __('business.confirm_password'), 'style' => 'margin:0px;', 'required', 'id' => 'b_confirm_password']); ?>

            </div>
        </div>
    </div>
        <div class="clearfix"></div>
        <div class="col-sm-4">
            <?php if(!empty($system_settings['superadmin_enable_register_tc'])): ?>
            <div class="checkbox">
                <?php echo Form::checkbox('accept_tc', 0, false, ['required']); ?>

                <label>
                    <a class="terms_condition" data-toggle="modal" data-target="#tc_modal">
                        <?php echo app('translator')->get('lang_v1.accept_terms_and_conditions'); ?>
                    </a>
                </label>
            </div>
            <?php echo $__env->make('business.partials.terms_conditions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        </div>
        <div class="clearfix"></div>
    </div>
    
    
	<?php if(!empty($business_settings->captch_site_key)): ?>
	<div class="col-md-12">
    <div class="form-group" style="padding:auto; margin-top:10px;margin-bottom:10px;">
    <div class="g-recaptcha" data-sitekey="<?php echo e($business_settings->captch_site_key, false); ?>"></div>
    </div>
    </div>
	<?php endif; ?>
</fieldset>
<div class="modal-footer" style="padding-top: 15px; padding-bottom: 0px;">
        <div class="row">
            <div class="col-sm-4" style="text-align: left;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            <div class="col-sm-4" style="text-align: right;">
                <button class="btn btn-primary pull-right" type="submit">Submit</button>
            </div>
        </div>
    </div><?php /**PATH /home/vimi31/public_html/resources/views/business/partials/register_form.blade.php ENDPATH**/ ?>