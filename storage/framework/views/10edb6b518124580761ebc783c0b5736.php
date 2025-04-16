<?php
$settings = DB::table('site_settings')->where('id', 1)->select('*')->first();
$login_background_color = $settings->login_background_color;
$gramasevaka_areas = DB::table('gramaseva_vasamas')->pluck('gramaseva_vasama', 'id');
$bala_mandalaya_areas = DB::table('balamandalayas')->pluck('balamandalaya', 'id');
$member_groups = DB::table('member_groups')->pluck('member_group', 'id');
$member_count = DB::table('members')->count() + 1;
$member_username = 'MEM'.$member_count;
?>
<style>
    #patient_register {
        background: {
                {
                $login_background_color
            }
        }
         !important;
    }
    label {
        color: white !important;
    }
</style>
<fieldset>
    <div id="patient_register" style="border-radius: 5px;">
        <style>
            label {
                color: black;
                font-weight: 800;
            }
        </style>
    
    <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('username', __('business.member_code') . ':*'); ?>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i ></i>
                            </span>
                            <?php echo Form::text('username', $member_username, ['class' => 'form-control','placeholder' =>
                            __('business.member_code'),
                            'required', 'readonly', 'autocomplete' => 'on']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('member_name', __('business.name') . ':*'); ?>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i ></i>
                            </span>
                            <?php echo Form::text('member_name', null, ['class' => 'form-control','placeholder' =>
                            __('business.name'),
                            'required']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('member_address', __('business.address') . ':*'); ?>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i ></i>
                            </span>
                            <?php echo Form::text('member_address', null, ['class' => 'form-control','placeholder' =>
                            __('business.address'),
                            'required', 'autocomplete' => 'on']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('member_town', __('business.town') . ':*'); ?>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i ></i>
                            </span>
                            <?php echo Form::text('member_town', null, ['class' => 'form-control','placeholder' =>
                            __('business.town'),
                            'required']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('member_district', __('business.district') . ':*'); ?>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i ></i>
                            </span>
                            <?php echo Form::text('member_district', null, ['class' => 'form-control','placeholder' =>
                            __('business.district'),
                            'required']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('member_mobile_number_1', __('business.mobile_number_1') . ':*'); ?>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i ></i>
                            </span>
                            <?php echo Form::text('member_mobile_number_1', null, ['class' => 'form-control','placeholder' =>
                            __('business.mobile_number_1'),
                            'required']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('member_mobile_number_2', __('business.mobile_number_2') . ':*'); ?>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i ></i>
                            </span>
                            <?php echo Form::text('member_mobile_number_2', null, ['class' => 'form-control','placeholder' =>
                            __('business.mobile_number_2')
                            ]); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('member_mobile_number_3', __('business.mobile_number_3') . ':*'); ?>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i ></i>
                            </span>
                            <?php echo Form::text('member_mobile_number_3', null, ['class' => 'form-control','placeholder' =>
                            __('business.mobile_number_3')
                            ]); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('member_land_number', __('business.land_number') . ':*'); ?>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i ></i>
                            </span>
                            <?php echo Form::text('member_land_number', null, ['class' => 'form-control','placeholder' =>
                            __('business.land_number')
                            ]); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('member_gender', __('business.gender') . ':*'); ?>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i ></i>
                            </span>
                            <?php echo Form::select('member_gender', ['male' => 'Male', 'female' => 'Female'],null, ['class' =>
                            'form-control','placeholder' => __('lang_v1.please_select'), 'style' => 'margin:0px',
                            'required']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('date_of_birth', __('business.date_of_birth') . ':*'); ?>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i ></i>
                            </span>
                            <?php echo Form::text('member_date_of_birth', null, ['class' => 'form-control','placeholder' =>
                            __('business.date_of_birth'), 'id' => 'date_of_birth'
                            ]); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('gramasevaka_area', __('business.gramasevaka_area') . ':*'); ?>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i ></i>
                            </span>
                            <?php echo Form::select('gramasevaka_area', $gramasevaka_areas, null, ['class'
                            => 'form-control','placeholder' => __('lang_v1.please_select'), 'style' => 'margin:0px',
                            ]); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('bala_mandalaya_area', __('business.bala_mandalaya_area') . ':*'); ?>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i ></i>
                            </span>
                            <?php echo Form::select('bala_mandalaya_area', $bala_mandalaya_areas, null,
                            ['class' => 'form-control','placeholder' => __('lang_v1.please_select'), 'style' =>
                            'margin:0px',
                            ]); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('member_group', __('business.member_group') . ':*'); ?>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i ></i>
                            </span>
                            <?php echo Form::select('member_group', $member_groups, null,
                            ['class' => 'form-control','placeholder' => __('lang_v1.please_select'), 'style' =>
                            'margin:0px',
                            'required']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('member_password', __('business.password') . ':*'); ?>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-key"></i>
                            </span>
                            <?php echo Form::password('member_password', ['class' => 'form-control', 'id' => 'member_password',
                            'style' =>
                            'margin: 0px;','placeholder'
                            => __('business.password')]); ?>

                        </div>
                        <p class="help-block" style="color: white;">At least 6 character.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('member_confirm_password', __('business.confirm_password') . ':*'); ?>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-key"></i>,
                            </span>
                            <?php echo Form::password('member_confirm_password', ['class' => 'form-control', 'id' =>
                            'member_confirm_password', 'style' => 'margin: 0px;', 'placeholder' =>
                            __('business.confirm_password')]); ?>

                        </div>
                    </div>
                </div>
                <?php if(in_array('member', $show_referrals_in_register_page )): ?>
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
                <?php if(in_array('member', $show_give_away_gift_in_register_page )): ?>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('m_r_give_away_gifts', __('superadmin::lang.give_away_gifts') . ':'); ?>

                        <?php $__currentLoopData = $give_away_gifts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $give_away_gift): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="checkbox">
                            <label>
                                <?php echo Form::checkbox('give_away_gifts[]', $key, false, ['class' => '', 'id' => 'm_r_give_away_gifts']); ?> <?php echo e($give_away_gift, false); ?>

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
    </div>
</fieldset><?php /**PATH /home/vimi31/public_html/resources/views/business/partials/member_register.blade.php ENDPATH**/ ?>