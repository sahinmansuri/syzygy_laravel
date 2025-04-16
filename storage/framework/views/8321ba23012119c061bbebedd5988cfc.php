<?php
$settings = DB::table('site_settings')->where('id', 1)->select('*')->first();
$login_background_color = $settings->login_background_color;
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
        <div class="modal-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('name', __('business.name') . ':*'); ?>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php echo Form::text('name', null, ['class' => 'form-control','placeholder' =>
                            __('business.name'),
                            'required', 'autocomplete' => 'on']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('mobile_number', __('lang_v1.mobile_number') . ':*'); ?>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-mobile"></i>
                            </span>
                            <?php echo Form::text('mobile_number', null, ['class' => 'form-control','placeholder' =>
                            __('business.mobile_number'),
                            'required']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('land_number', __('business.land_number') . ':*'); ?>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-phone"></i>
                            </span>
                            <?php echo Form::text('land_number', null, ['class' => 'form-control','placeholder' =>
                            __('business.land_number')
                            ]); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('s_r_address', __('business.address') . ':*'); ?>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-map-marker"></i>
                            </span>
                            <?php echo Form::text('address', null, ['class' => 'form-control','placeholder' =>
                            __('business.address'), 'id'=>'s_r_address',
                            'required', 'autocomplete' => 'on']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('s_r_district_id', __('business.district')); ?>

                        <?php echo Form::select('district_id', $districts, null, ['class'
                        => 'form-control select2','placeholder' => __('lang_v1.please_select'), 'style' => 'margin:0px;
                        width: 100%;','id'=>'s_r_district_id'
                        ]); ?>

                        <div class="">
                            <a id="add_button_district" class="btn-modal pull-right" data-container=".view_modal"
                                data-href="<?php echo e(action('DefaultDistrictController@create'), false); ?>" style="cursor: pointer">
                                <i class="fa fa-plus"></i> <?php echo app('translator')->get( 'messages.add' ); ?></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('town_id', __('business.town')); ?>

                        <?php echo Form::select('town_id', $towns, null, ['class'
                        => 'form-control select2','placeholder' => __('lang_v1.please_select'), 'style' => 'margin:0px ;
                        width: 100%;',
                        'id'=>'town_id'
                        ]); ?>

                        <div class="">
                            <a class="btn-modal pull-right" id="add_button_towns"
                                data-href="<?php echo e(action('DefaultTownController@create'), false); ?>" data-container=".view_modal"
                                style="cursor: pointer">
                                <i class="fa fa-plus"></i> <?php echo app('translator')->get( 'messages.add' ); ?></a>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('s_r_gender', __('business.gender') . ':'); ?>

                        <select name="gender" id="s_r_gender" class="form-control" required>
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('self_email', __('business.email') . ':*'); ?>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-user-o"></i>
                            </span>
                            <?php echo Form::text('email', null, ['class' => 'form-control','placeholder' =>
                            __('business.email'), 'id' => 'self_email',
                            'required', 'autocomplete' => 'on']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('self_username', __('business.username') . ':*'); ?>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-user-o"></i>
                            </span>
                            <?php echo Form::text('username', null, ['class' => 'form-control','placeholder' =>
                            __('business.username'), 'id' => 'self_username',
                            'required', 'autocomplete' => 'on']); ?>

                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('self_password', __('business.password') . ':*'); ?>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-key"></i>
                            </span>
                            <?php echo Form::password('password', ['class' => 'form-control', 'id' => 'self_password', 'style'
                            =>
                            'margin: 0px;','placeholder'
                            => __('business.password')]); ?>

                        </div>
                        <p class="help-block" style="color: white;">At least 6 character.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('self_confirm_password', __('business.confirm_password') . ':*'); ?>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-key"></i>,
                            </span>
                            <?php echo Form::password('confirm_password', ['class' => 'form-control', 'id' =>
                            'self_confirm_password', 'style' => 'margin: 0px;', 'placeholder' =>
                            __('business.confirm_password')]); ?>

                        </div>
                    </div>
                </div>


            </div>

        </div>
        <div class="clearfix"></div>
    </div>
    <div class="modal-footer" style="padding-top: 15px; padding-bottom: 0px;">
        <div class="row">
            <div class="col-md-6" style="text-align: left;">
            </div>
            <div class="col-md-6" style="text-align: right;">
                <button class="btn btn-primary pull-right" type="submit">Submit</button>
            </div>
        </div>
    </div>
</fieldset><?php /**PATH /home/vimi31/public_html/Modules/Visitor/Providers/../Resources/views/visitor_registration/self_registration.blade.php ENDPATH**/ ?>