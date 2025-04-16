<?php
$settings = DB::table('site_settings')->where('id', 1)->select('*')->first();
$login_background_color = $settings->login_background_color;
?>
<style>
   
</style>
<fieldset>
    <div id="patient_register" style="border-radius: 5px; ">
        <style>
            label {
                color: black;
                font-weight: 800;
            }
        </style>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('c_first_name', __('customer.first_name') . ':*'); ?>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php echo Form::text('first_name', null, ['class' => 'form-control','placeholder' =>
                            __('customer.first_name'), 'id' => 'c_first_name',
                            'required', 'autocomplete' => 'on']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('c_last_name', __('customer.last_name') . ':*'); ?>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php echo Form::text('last_name', null, ['class' => 'form-control','placeholder' =>
                            __('customer.last_name'), 'id' => 'c_last_name',
                            'required']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('c_username', __('customer.username') . ':*'); ?>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php echo Form::text('username', null, ['class' => 'form-control','placeholder' =>
                            __('customer.username'), 'id' => 'c_username', 
                            'required', 'autocomplete' => 'on']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('c_email', __('business.email') . ':'); ?>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <?php echo Form::email('email', null, ['class' => 'form-control','placeholder' =>
                            __('business.email'), 'id' => 'c_email', 'autocomplete' => 'on']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('c_password', __('business.password') . ':*'); ?>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-key"></i>
                            </span>
                            <?php echo Form::password('password', ['class' => 'form-control', 'id' => 'c_password', 'style' =>
                            'margin: 0px;','placeholder'
                            => __('business.password')]); ?>

                        </div>
                        <p class="help-block" style="color: white;">At least 6 character.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('c_confirm_password', __('business.confirm_password') . ':*'); ?>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-key"></i>,
                            </span>
                            <?php echo Form::password('confirm_password', ['class' => 'form-control', 'id' =>
                            'c_confirm_password', 'style' => 'margin: 0px;', 'placeholder' =>
                            __('business.confirm_password')]); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <hr>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('c_mobile', __('contact.mobile') . ':*'); ?>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-mobile"></i>
                            </span>
                            <?php echo Form::text('mobile', null, ['class' => 'form-control', 'required', 'placeholder' =>
                            __('contact.mobile'), 'id' => 'c_mobile']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('customer_alternate_number', __('contact.alternate_contact_number') . ':'); ?>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-phone"></i>
                            </span>
                            <?php echo Form::text('contact_number', null, ['class' => 'form-control', 'placeholder' =>
                            __('contact.alternate_contact_number'), 'alternate_number' => 'customer_alternate_number', 'id' => 'customer_alternate_number']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('landline', __('contact.landline') . ':'); ?>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-phone"></i>
                            </span>
                            <?php echo Form::text('landline', null, ['class' => 'form-control', 'placeholder' =>
                            __('contact.landline')]); ?>

                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('geo_location', __('customer.geo_location') . ':'); ?>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-map-marker"></i>
                            </span>
                            <?php echo Form::text('geo_location', null, ['class' => 'form-control', 'placeholder' =>
                            __('contact.geo_location')]); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('customer_address', __('business.address') . ':'); ?>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-map-marker"></i>
                            </span>
                            <?php echo Form::text('address', null, ['class' => 'form-control', 'required', 'placeholder' =>
                            __('business.address'), 'id' => 'customer_address', 'autocomplete' => 'on']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('town', __('customer.town') . ':'); ?>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-map-marker"></i>
                            </span>
                            <?php echo Form::text('town', null, ['class' => 'form-control', 'required', 'placeholder' =>
                            __('customer.town')]); ?>

                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('district', __('customer.district') . ':'); ?>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-map-marker"></i>
                            </span>
                            <?php echo Form::text('district', null, ['class' => 'form-control', 'required', 'placeholder' =>
                            __('customer.district')]); ?>

                        </div>
                    </div>
                </div>
                <?php if(in_array('customer', $show_referrals_in_register_page )): ?>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('referral_code', __('superadmin::lang.referral_code') . ':'); ?> <small><?php echo app('translator')->get('lang_v1.please_enter_referral_code_if_any'); ?></small>
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
                <?php if(in_array('customer', $show_give_away_gift_in_register_page )): ?>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('r2_give_away_gifts', __('superadmin::lang.give_away_gifts') . ':'); ?>

                        <?php $__currentLoopData = $give_away_gifts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $give_away_gift): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="checkbox">
                            <label>
                                <?php echo Form::checkbox('give_away_gifts[]', $key, false, ['class' => '', 'id' => 'r2_give_away_gifts']); ?> <?php echo e($give_away_gift, false); ?>

                            </label>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <?php endif; ?>
				<?php if(!empty($business_settings->captch_site_key)): ?>
					<div class="col-md-12">
                        <div class="form-group" style="padding:auto; margin-top:10px;margin-bottom:10px;">
                        <div class="g-recaptcha" data-sitekey="<?php echo e($business_settings->captch_site_key, false); ?>"></div>
                    </div>
				<?php endif; ?>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="modal-footer" style="padding-top: 15px; padding-bottom: 0px;">
        <div class="row">
            <div class="col-md-6" style="text-align: left;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            <div class="col-md-6" style="text-align: right;">
                <button class="btn btn-primary pull-right" type="submit">Submit</button>
            </div>
        </div>
    </div>
</fieldset><?php /**PATH /home/vimi31/public_html/resources/views/business/partials/customer_register.blade.php ENDPATH**/ ?>