<div class="tab-pane active" id="customer">
    <div class="row mt-15">
        <div class="col-md-2">
             <?php echo Form::label('location', __('lang_v1.location') . ':',['class'=>'mt-10 text-right w-100']); ?>

               
        </div>
        <div class="col-md-4">
            <div class="form-group" style="margin-left:32px;">
            <?php
                $location_id = (isset($business->contact_fields) && isset($business->contact_fields['location']) )?$business->contact_fields['location'] : 0;
            ?>    
            <?php echo Form::select('contact_fields[location]', $businessLocations->prepend('All Locations',0), $location_id, [
                    'id' => 'location',
                    'class' => 'form-control select2'
                ]); ?>

            </div>
        </div>
    </div>
    <h3><?php echo app('translator')->get('lang_v1.select_the_field_you_want_in_adding_contact'); ?></h3>
    <div class="row">
        
        <div class="col-md-12">
            
            <div class="col-sm-6 ">
                <div class="checkbox">
                    <label>
                        <?php echo Form::checkbox('contact_fields[customer_name]', 1,
                        1, ['class' =>
                        'input-icheck not_change', 'disabled', 'checked']); ?>

                        <?php echo e(__('lang_v1.name'), false); ?>

                    </label>
                </div>
            </div>
            <div class="col-sm-6 ">
                <div class="checkbox">
                    <label>
                        <?php echo Form::checkbox('contact_fields[need_to_send_sms]', 1,
                        array_key_exists('need_to_send_sms', $business->contact_fields ?? []),
                        ['class'
                        => 'input-icheck' , 'checked']); ?>

                        <?php echo e(__('lang_v1.need_to_send_sms'), false); ?>

                    </label>
                </div>
            </div>
            <div class="col-sm-6 ">
                <div class="checkbox">
                    <label>
                        <?php echo Form::checkbox('contact_fields[credit_notification_type]', 1,
                        array_key_exists('credit_notification_type', $business->contact_fields ?? []),
                        ['class'
                        => 'input-icheck', 'checked']); ?>

                        <?php echo e(__('lang_v1.credit_notification_type'), false); ?>

                    </label>
                </div>
            </div>
            <div class="col-sm-6 ">
                <div class="checkbox">
                    <label>
                        <?php echo Form::checkbox('contact_fields[vat_no]', 1,
                        array_key_exists('vat_no', $business->contact_fields ?? []),
                        ['class'
                        => 'input-icheck', 'checked']); ?>

                        <?php echo e(__('lang_v1.vat_no'), false); ?>

                    </label>
                </div>
            </div>
            <div class="col-sm-6 ">
                <div class="checkbox">
                    <label>
                        <?php echo Form::checkbox('contact_fields[customer_opening_balance]', 1,
                        1,
                        ['class' => 'input-icheck not_change', 'disabled', 'checked']); ?>

                        <?php echo e(__('lang_v1.opening_balance'), false); ?>

                    </label>
                </div>
            </div>
            <div class="col-sm-6 ">
                <div class="checkbox">
                    <label>
                        <?php echo Form::checkbox('contact_fields[customer_customer_group]', 1,
                        array_key_exists('customer_customer_group', $business->contact_fields ??
                        []),
                        ['class' => 'input-icheck', 'checked']); ?>

                        <?php echo e(__('lang_v1.customer_group'), false); ?>

                    </label>
                </div>
            </div>
            <div class="col-sm-6 ">
                <div class="checkbox">
                    <label>
                        <?php echo Form::checkbox('contact_fields[customer_credit_limit]', 1,
                        array_key_exists('customer_credit_limit', $business->contact_fields ??
                        []),
                        ['class' => 'input-icheck', 'checked']); ?>

                        <?php echo e(__('lang_v1.credit_limit'), false); ?>

                    </label>
                </div>
            </div>
            <div class="col-sm-6 ">
                <div class="checkbox">
                    <label>
                        <?php echo Form::checkbox('contact_fields[customer_transaction_date]', 1,
                        1,
                        ['class' => 'input-icheck not_change', 'disabled', 'checked']); ?>

                        <?php echo e(__('lang_v1.transaction_date'), false); ?>

                    </label>
                </div>
            </div>
            <div class="col-sm-6 ">
                <div class="checkbox">
                    <label>
                        <?php echo Form::checkbox('contact_fields[add_more_mobile]', 1,
                        array_key_exists('add_more_mobile', $business->contact_fields ?? []),
                        ['class'
                        => 'input-icheck', 'checked']); ?>

                        <?php echo e(__('lang_v1.add_more_mobile'), false); ?>

                    </label>
                </div>
            </div>
            <div class="col-sm-6 ">
                <div class="checkbox">
                    <label>
                        <?php echo Form::checkbox('contact_fields[customer_mobile]', 1,
                        array_key_exists('customer_mobile', $business->contact_fields ?? []),
                        ['class' =>
                        'input-icheck','checked']); ?>

                        <?php echo e(__('lang_v1.mobile'), false); ?>

                    </label>
                </div>
            </div>
            <div class="col-sm-6 ">
                <div class="checkbox">
                    <label>
                        <?php echo Form::checkbox('contact_fields[customer_landline]', 1,
                        array_key_exists('customer_landline', $business->contact_fields ?? []),
                        ['class' => 'input-icheck','checked']); ?>

                        <?php echo e(__('lang_v1.landline'), false); ?>

                    </label>
                </div>
            </div>
            <div class="col-sm-6 ">
                <div class="checkbox">
                    <label>
                        <?php echo Form::checkbox('contact_fields[assigned_to]', 1,
                        array_key_exists('assigned_to', $business->contact_fields ?? []),
                        ['class'
                        => 'input-icheck','checked']); ?>

                        <?php echo e(__('lang_v1.assigned_to'), false); ?>

                    </label>
                </div>
            </div>
            <div class="col-sm-6 ">
                <div class="checkbox">
                    <label>
                        <?php echo Form::checkbox('contact_fields[customer_address]', 1,
                        array_key_exists('customer_address', $business->contact_fields ?? []),
                        ['class' => 'input-icheck','checked']); ?>

                        <?php echo e(__('lang_v1.address'), false); ?>

                    </label>
                </div>
            </div>
            <div class="col-sm-6 ">
                <div class="checkbox">
                    <label>
                        <?php echo Form::checkbox('contact_fields[address_line_2]', 1,
                        array_key_exists('address_line_2', $business->contact_fields ?? []),
                        ['class'
                        => 'input-icheck', 'checked']); ?>

                        <?php echo e(__('lang_v1.address_line_2'), false); ?>

                    </label>
                </div>
            </div>
            <div class="col-sm-6 ">
                <div class="checkbox">
                    <label>
                        <?php echo Form::checkbox('contact_fields[customer_city]', 1,
                        array_key_exists('customer_city', $business->contact_fields ?? []), ['class'
                        =>
                        'input-icheck','checked']); ?>

                        <?php echo e(__('lang_v1.city'), false); ?>

                    </label>
                </div>
            </div>
            <div class="col-sm-6 ">
                <div class="checkbox">
                    <label>
                        <?php echo Form::checkbox('contact_fields[customer_state]', 1,
                        array_key_exists('customer_state', $business->contact_fields ?? []),
                        ['class' =>
                        'input-icheck','checked']); ?>

                        <?php echo e(__('lang_v1.state'), false); ?>

                    </label>
                </div>
            </div>
            <div class="col-sm-6 ">
                <div class="checkbox">
                    <label>
                        <?php echo Form::checkbox('contact_fields[customer_country]', 1,
                        array_key_exists('customer_country', $business->contact_fields ?? []),
                        ['class' =>
                        'input-icheck','checked']); ?>

                        <?php echo e(__('lang_v1.country'), false); ?>

                    </label>
                </div>
            </div>
            <div class="col-sm-6 ">
                <div class="checkbox">
                    <label>
                        <?php echo Form::checkbox('contact_fields[customer_landmark]', 1,
                        array_key_exists('customer_landmark', $business->contact_fields ?? []),
                        ['class'
                        => 'input-icheck','checked']); ?>

                        <?php echo e(__('lang_v1.landmark'), false); ?>

                    </label>
                </div>
            </div>
            
            
            <div class="col-sm-6 ">
                <div class="checkbox">
                    <label>
                        <?php echo Form::checkbox('contact_fields[customer_tax_number]', 1,
                        array_key_exists('customer_tax_number', $business->contact_fields ?? []),
                        ['class'
                        => 'input-icheck']); ?>

                        <?php echo e(__('lang_v1.tax_number'), false); ?>

                    </label>
                </div>
            </div>
            
            <div class="col-sm-6 ">
                <div class="checkbox">
                    <label>
                        <?php echo Form::checkbox('contact_fields[customer_pay_term]', 1,
                        array_key_exists('customer_pay_term', $business->contact_fields ?? []),
                        ['class'
                        => 'input-icheck']); ?>

                        <?php echo e(__('lang_v1.pay_term'), false); ?>

                    </label>
                </div>
            </div>
            
            
            <div class="col-sm-6 ">
                <div class="checkbox">
                    <label>
                        <?php echo Form::checkbox('contact_fields[customer_password]', 1,
                        array_key_exists('customer_password', $business->contact_fields ?? []),
                        ['class'
                        => 'input-icheck']); ?>

                        <?php echo e(__('lang_v1.password'), false); ?>

                    </label>
                </div>
            </div>
            <div class="col-sm-6 ">
                <div class="checkbox">
                    <label>
                        <?php echo Form::checkbox('contact_fields[customer_confirm_password]', 1,
                        array_key_exists('customer_confirm_password', $business->contact_fields ??
                        []),
                        ['class' => 'input-icheck']); ?>

                        <?php echo e(__('lang_v1.confirm_password'), false); ?>

                    </label>
                </div>
            </div>

            <div class="col-sm-6 ">
                <div class="checkbox">
                    <label>
                        <?php echo Form::checkbox('contact_fields[customer_email]', 1,
                        array_key_exists('customer_email', $business->contact_fields ?? []),
                        ['class' =>
                        'input-icheck']); ?>

                        <?php echo e(__('lang_v1.email'), false); ?>

                    </label>
                </div>
            </div>
            
            <div class="col-sm-6 ">
                <div class="checkbox">
                    <label>
                        <?php echo Form::checkbox('contact_fields[customer_alternate_contact_number]', 1,
                        array_key_exists('customer_alternate_contact_number',
                        $business->contact_fields ?? []),
                        ['class' => 'input-icheck']); ?>

                        <?php echo e(__('lang_v1.alternate_contact_number'), false); ?>

                    </label>
                </div>
            </div>
            
           
            
           
            
            <div class="col-sm-6 ">
                <div class="checkbox">
                    <label>
                        <?php echo Form::checkbox('contact_fields[sub_customer]', 1,
                        array_key_exists('sub_customer', $business->contact_fields ?? []),
                        ['class'
                        => 'input-icheck']); ?>

                        <?php echo e(__('lang_v1.sub_customer'), false); ?>

                    </label>
                </div>
            </div>
           
           
            
            <div class="col-sm-6 ">
                <div class="checkbox">
                    <label>
                        <?php echo Form::checkbox('contact_fields[vehicle_no]', 1,
                        array_key_exists('vehicle_no', $business->contact_fields ?? []),
                        ['class'
                        => 'input-icheck']); ?>

                        <?php echo e(__('lang_v1.vehicle_no'), false); ?>

                    </label>
                </div>
            </div>
            
            <div class="col-sm-6 ">
                <div class="checkbox">
                    <label>
                        <?php echo Form::checkbox('contact_fields[address_line_3]', 1,
                        array_key_exists('address_line_3', $business->contact_fields ?? []),
                        ['class'
                        => 'input-icheck']); ?>

                        <?php echo e(__('lang_v1.address_line_3'), false); ?>

                    </label>
                </div>
            </div>
            <div class="col-sm-6 ">
                <div class="checkbox">
                    <label>
                        <?php echo Form::checkbox('contact_fields[passport_nic_no]', 1,
                        array_key_exists('passport_nic_no', $business->contact_fields ?? []),
                        ['class'
                        => 'input-icheck']); ?>

                        <?php echo e(__('lang_v1.passport_nic_no'), false); ?>

                    </label>
                </div>
            </div>
            <div class="col-sm-6 ">
                <div class="checkbox">
                    <label>
                        <?php echo Form::checkbox('contact_fields[passport_nic_image]', 1,
                        array_key_exists('passport_nic_image', $business->contact_fields ?? []),
                        ['class'
                        => 'input-icheck']); ?>

                        <?php echo e(__('lang_v1.passport_nic_image'), false); ?>

                    </label>
                </div>
            </div>
            <div class="col-sm-6 ">
                <div class="checkbox">
                    <label>
                        <?php echo Form::checkbox('contact_fields[signature]', 1,
                        array_key_exists('signature', $business->contact_fields ?? []),
                        ['class'
                        => 'input-icheck']); ?>

                        <?php echo e(__('lang_v1.signature'), false); ?>

                    </label>
                </div>
            </div>
            <div class="col-sm-6 ">
                <div class="checkbox">
                    <label>
                        <?php echo Form::checkbox('contact_fields[property_customer_contact_type]', 1,
                        1,
                        ['class' => 'input-icheck not_change', 'disabled', 'checked']); ?>

                        <?php echo e(__('lang_v1.contact_type'), false); ?>

                    </label>
                </div>
            </div>
            
            
        </div>
    </div>
</div><?php /**PATH /home/vimi31/public_html/resources/views/business/fields/customer_form_fields_setting.blade.php ENDPATH**/ ?>