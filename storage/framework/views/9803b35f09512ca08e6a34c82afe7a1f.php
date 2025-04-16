<style>
    input[type="checkbox"][readonly] {
        pointer-events: none;
    }
</style>
<div class="pos-tab-content">
    <div class="row">
        <div class="col-sm-12">
            <div class="settlement_tabs">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#customer" data-toggle="tab">
                            <i class="fa fa-address-book"></i> <strong><?php echo app('translator')->get('lang_v1.customer'); ?></strong>
                        </a>
                    </li>

                    <li class="disabled">
                        <a href="" data-toggle="tab">
                            <i class="fa fa-address-book"></i> <strong>
                                <?php echo app('translator')->get('lang_v1.supplier'); ?> </strong>
                        </a>
                    </li>
                    <?php if(hasSubscriptionAccess('property_module')): ?>
    
                    <li class="">
                        <a href="#property_customer" data-toggle="tab">
                            <i class="fa fa-address-book"></i> <strong>
                                <?php echo app('translator')->get('lang_v1.property_customer'); ?> </strong>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
                <div class="tab-content">
                    <?php echo $__env->make('business.fields.customer_form_fields_setting', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    

                    <div class="tab-pane" id="supplier">
                        <h3><?php echo app('translator')->get('lang_v1.select_the_field_you_want_in_adding_contact'); ?></h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-sm-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('contact_fields[supplier_type]', 1,
                                            1, ['class' =>
                                            'input-icheck not_change', 'disabled', 'checked']); ?>

                                            <?php echo e(__('lang_v1.type'), false); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('contact_fields[supplier_name]', 1,
                                            1, ['class' =>
                                            'input-icheck not_change', 'disabled', 'checked']); ?>

                                            <?php echo e(__('lang_v1.name'), false); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('contact_fields[supplier_contact_id]', 1,
                                            1, ['class'
                                            => 'input-icheck not_change', 'disabled', 'checked']); ?>

                                            <?php echo e(__('lang_v1.contact_id'), false); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('contact_fields[supplier_tax_number]', 1,
                                            array_key_exists('supplier_tax_number', $business->contact_fields ?? []),
                                            ['class'
                                            => 'input-icheck']); ?>

                                            <?php echo e(__('lang_v1.tax_number'), false); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('contact_fields[supplier_opening_balance]', 1,
                                            1,
                                            ['class' => 'input-icheck not_change', 'disabled', 'checked']); ?>

                                            <?php echo e(__('lang_v1.opening_balance'), false); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('contact_fields[supplier_pay_term]', 1,
                                            array_key_exists('supplier_pay_term', $business->contact_fields ?? []),
                                            ['class'
                                            => 'input-icheck']); ?>

                                            <?php echo e(__('lang_v1.pay_term'), false); ?>

                                        </label>
                                    </div>
                                </div>

                                <div class="col-sm-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('contact_fields[supplier_transaction_date]', 1,
                                            1,
                                            ['class' => 'input-icheck not_change', 'disabled', 'checked']); ?>

                                            <?php echo e(__('lang_v1.transaction_date'), false); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('contact_fields[supplier_supplier_group]', 1,
                                            array_key_exists('supplier_supplier_group', $business->contact_fields ??
                                            []),
                                            ['class' => 'input-icheck']); ?>

                                            <?php echo e(__('lang_v1.supplier_group'), false); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('contact_fields[supplier_email]', 1,
                                            array_key_exists('supplier_email', $business->contact_fields ?? []),
                                            ['class' =>
                                            'input-icheck']); ?>

                                            <?php echo e(__('lang_v1.email'), false); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('contact_fields[supplier_mobile]', 1,
                                            array_key_exists('supplier_mobile', $business->contact_fields ?? []),
                                            ['class' =>
                                            'input-icheck']); ?>

                                            <?php echo e(__('lang_v1.mobile'), false); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('contact_fields[supplier_alternate_contact_number]', 1,
                                            array_key_exists('supplier_alternate_contact_number',
                                            $business->contact_fields ?? []),
                                            ['class' => 'input-icheck']); ?>

                                            <?php echo e(__('lang_v1.alternate_contact_number'), false); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('contact_fields[supplier_landline]', 1,
                                            array_key_exists('supplier_landline', $business->contact_fields ?? []),
                                            ['class' => 'input-icheck']); ?>

                                            <?php echo e(__('lang_v1.landline'), false); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('contact_fields[supplier_address]', 1,
                                            array_key_exists('supplier_address', $business->contact_fields ?? []),
                                            ['class' => 'input-icheck']); ?>

                                            <?php echo e(__('lang_v1.address'), false); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('contact_fields[supplier_city]', 1,
                                            array_key_exists('supplier_city', $business->contact_fields ?? []), ['class'
                                            =>
                                            'input-icheck']); ?>

                                            <?php echo e(__('lang_v1.city'), false); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('contact_fields[supplier_state]', 1,
                                            array_key_exists('supplier_state', $business->contact_fields ?? []),
                                            ['class' =>
                                            'input-icheck']); ?>

                                            <?php echo e(__('lang_v1.state'), false); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('contact_fields[supplier_country]', 1,
                                            array_key_exists('supplier_country', $business->contact_fields ?? []),
                                            ['class' =>
                                            'input-icheck']); ?>

                                            <?php echo e(__('lang_v1.country'), false); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('contact_fields[supplier_landmark]', 1,
                                            array_key_exists('supplier_landmark', $business->contact_fields ?? []),
                                            ['class'
                                            => 'input-icheck']); ?>

                                            <?php echo e(__('lang_v1.landmark'), false); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('contact_fields[supplier_custom_field_1]', 1,
                                            array_key_exists('supplier_custom_field_1', $business->contact_fields ??
                                            []),
                                            ['class' => 'input-icheck']); ?>

                                            <?php echo e(__('lang_v1.custom_field_1'), false); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('contact_fields[supplier_custom_field_2]', 1,
                                            array_key_exists('supplier_custom_field_2', $business->contact_fields ??
                                            []),
                                            ['class' => 'input-icheck']); ?>

                                            <?php echo e(__('lang_v1.custom_field_2'), false); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('contact_fields[supplier_custom_field_3]', 1,
                                            array_key_exists('supplier_custom_field_3', $business->contact_fields ??
                                            []),
                                            ['class' => 'input-icheck']); ?>

                                            <?php echo e(__('lang_v1.custom_field_3'), false); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('contact_fields[supplier_custom_field_4]', 1,
                                            array_key_exists('supplier_custom_field_4', $business->contact_fields ??
                                            []),
                                            ['class' => 'input-icheck']); ?>

                                            <?php echo e(__('lang_v1.custom_field_4'), false); ?>

                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane " id="property_customer">
                        <h3><?php echo app('translator')->get('lang_v1.select_the_field_you_want_in_adding_contact'); ?></h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-sm-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('contact_fields[property_customer_type]', 1,
                                            1, ['class' =>
                                            'input-icheck not_change', 'disabled', 'checked']); ?>

                                            <?php echo e(__('lang_v1.type'), false); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('contact_fields[property_customer_name]', 1,
                                            1, ['class' =>
                                            'input-icheck not_change', 'disabled', 'checked']); ?>

                                            <?php echo e(__('lang_v1.name'), false); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('contact_fields[property_customer_contact_id]', 1,
                                            1, ['class'
                                            => 'input-icheck not_change', 'disabled', 'checked']); ?>

                                            <?php echo e(__('lang_v1.contact_id'), false); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('contact_fields[property_customer_tax_number]', 1,
                                            array_key_exists('property_customer_tax_number', $business->contact_fields ?? []),
                                            ['class'
                                            => 'input-icheck']); ?>

                                            <?php echo e(__('lang_v1.tax_nic_passport_number'), false); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('contact_fields[property_customer_opening_balance]', 1,
                                            1,
                                            ['class' => 'input-icheck not_change', 'disabled', 'checked']); ?>

                                            <?php echo e(__('lang_v1.opening_balance'), false); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('contact_fields[property_customer_pay_term]', 1,
                                            array_key_exists('property_customer_pay_term', $business->contact_fields ?? []),
                                            ['class'
                                            => 'input-icheck']); ?>

                                            <?php echo e(__('lang_v1.pay_term'), false); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('contact_fields[property_customer_transaction_date]', 1,
                                            1,
                                            ['class' => 'input-icheck not_change', 'disabled', 'checked']); ?>

                                            <?php echo e(__('lang_v1.transaction_date'), false); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('contact_fields[property_customer_customer_group]', 1,
                                            array_key_exists('property_customer_customer_group', $business->contact_fields ??
                                            []),
                                            ['class' => 'input-icheck']); ?>

                                            <?php echo e(__('lang_v1.customer_group'), false); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('contact_fields[property_customer_password]', 1,
                                            1,
                                            ['class'
                                            => 'input-icheck', 'disabled', 'checked']); ?>

                                            <?php echo e(__('lang_v1.password'), false); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('contact_fields[property_customer_confirm_password]', 1,
                                            1,
                                            ['class' => 'input-icheck', 'disabled', 'checked']); ?>

                                            <?php echo e(__('lang_v1.confirm_password'), false); ?>

                                        </label>
                                    </div>
                                </div>

                                <div class="col-sm-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('contact_fields[property_customer_email]', 1,
                                            1,
                                            ['class' =>
                                            'input-icheck', 'disabled', 'checked']); ?>

                                            <?php echo e(__('lang_v1.email'), false); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('contact_fields[property_customer_mobile]', 1,
                                            1,
                                            ['class' =>
                                            'input-icheck', 'disabled', 'checked']); ?>

                                            <?php echo e(__('lang_v1.mobile'), false); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('contact_fields[property_customer_alternate_contact_number]', 1,
                                            1,
                                            ['class' => 'input-icheck', 'disabled', 'checked']); ?>

                                            <?php echo e(__('lang_v1.alternate_contact_number'), false); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('contact_fields[property_customer_landline]', 1,
                                            1,
                                            ['class' => 'input-icheck', 'disabled', 'checked']); ?>

                                            <?php echo e(__('lang_v1.landline'), false); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('contact_fields[property_customer_address]', 1,
                                            1,
                                            ['class' => 'input-icheck', 'disabled', 'checked']); ?>

                                            <?php echo e(__('lang_v1.address'), false); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('contact_fields[property_customer_city]', 1,
                                            1, ['class'
                                            =>
                                            'input-icheck', 'disabled', 'checked']); ?>

                                            <?php echo e(__('lang_v1.city'), false); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('contact_fields[property_customer_state]', 1,
                                            1,
                                            ['class' =>
                                            'input-icheck', 'disabled', 'checked']); ?>

                                            <?php echo e(__('lang_v1.state'), false); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('contact_fields[property_customer_country]', 1,
                                            1,
                                            ['class' =>
                                            'input-icheck', 'disabled', 'checked']); ?>

                                            <?php echo e(__('lang_v1.country'), false); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('contact_fields[property_customer_landmark]', 1,
                                            array_key_exists('property_customer_landmark', $business->contact_fields ?? []),
                                            ['class'
                                            => 'input-icheck']); ?>

                                            <?php echo e(__('lang_v1.landmark'), false); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('contact_fields[property_customer_custom_field_1]', 1,
                                            array_key_exists('property_customer_custom_field_1', $business->contact_fields ??
                                            []),
                                            ['class' => 'input-icheck']); ?>

                                            <?php echo e(__('lang_v1.custom_field_1'), false); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('contact_fields[property_customer_custom_field_2]', 1,
                                            array_key_exists('property_customer_custom_field_2', $business->contact_fields ??
                                            []),
                                            ['class' => 'input-icheck']); ?>

                                            <?php echo e(__('lang_v1.custom_field_2'), false); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('contact_fields[property_customer_custom_field_3]', 1,
                                            array_key_exists('property_customer_custom_field_3', $business->contact_fields ??
                                            []),
                                            ['class' => 'input-icheck']); ?>

                                            <?php echo e(__('lang_v1.custom_field_3'), false); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('contact_fields[property_customer_custom_field_4]', 1,
                                            array_key_exists('property_customer_custom_field_4', $business->contact_fields ??
                                            []),
                                            ['class' => 'input-icheck']); ?>

                                            <?php echo e(__('lang_v1.custom_field_4'), false); ?>

                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php if(!empty($business_settings->captch_site_key)): ?>
						<div class="col-md-12">
                            <div class="form-group" style="padding:auto; margin-top:10px;margin-bottom:10px;">
                                <div class="g-recaptcha" data-sitekey="<?php echo e($business_settings->captch_site_key, false); ?>"></div>
                            </div>
						<?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/vimi31/public_html/resources/views/business/partials/customer_and_supplier.blade.php ENDPATH**/ ?>