<?php $__env->startSection('title', 'POS'); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.partials.header-pos', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $request = app('Illuminate\Http\Request'); ?>
    <script></script>
    <style>
        .btn-darkbrown{
            background-color: rgb(135 0 22) !important;
        }
        .box-header {
            padding-bottom: 0px !important;
            display: inline-block;
        }
        .w-100{
            width: 100% !important;
        }
        
        .box-body {
            padding-top: 5px !important;
            margin-left: 15px !important;
        }

        .select2>.select2-container>.select2-container--default {
            display: none !important;
        }
        .min-height-50hv {
            min-height: 50vh !important;
        }
    </style>
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <?php
        $enable_line_discount = !empty($pos_settings['enable_line_discount']) ? 1 : 0;
    ?>
    <section class="content no-print">
        <input type="hidden" name="enable_code" id="enable_code"
            value="<?php echo e(!empty($search_product_settings['enable_code']) ? 1 : '', false); ?>">
        <input type="hidden" name="enable_rack_number" id="enable_rack_number"
            value="<?php echo e(!empty($search_product_settings['enable_rack_number']) ? 1 : '', false); ?>">
        <input type="hidden" name="enable_qty" id="enable_qty"
            value="<?php echo e(!empty($search_product_settings['enable_qty']) ? 1 : '', false); ?>">
        <input type="hidden" name="enable_product_cost" id="enable_product_cost"
            value="<?php echo e(!empty($search_product_settings['enable_product_cost']) ? 1 : '', false); ?>">
        <input type="hidden" name="enable_product_supplier" id="enable_product_supplier"
            value="<?php echo e(!empty($search_product_settings['enable_product_supplier']) ? 1 : '', false); ?>">
        <input type="hidden" id="module" value="sales_pos">
        <?php if(!empty($pos_settings['allow_overselling']) || (isset($_GET['type']) && $_GET['type'] == "quotation")): ?>
            <input type="hidden" id="is_overselling_allowed">
        <?php endif; ?>
        <?php if(session('business.enable_rp') == 1): ?>
            <input type="hidden" id="reward_point_enabled">
        <?php endif; ?>
        <?php echo Form::open(['url' => action('SellPosController@store'), 'method' => 'post', 'id' => 'add_pos_sell_form']); ?>

                   
        <div class="row">
            <div class="left_div <?php if(!empty($pos_settings['hide_product_suggestion']) && !empty($pos_settings['hide_recent_trans'])): ?> col-md-10 col-md-offset-1 <?php else: ?> col-md-7 <?php endif; ?> col-sm-12">
                <?php $__env->startComponent('components.widget', ['class' => 'box-success']); ?>
                    <?php $__env->slot('header'); ?>
                        <div class="col-md-3">
                            <div class="col-md-12">
                                <p class="text-right  pull-left"><strong><?php echo app('translator')->get('sale.location'); ?>:</strong>
                                    <?php echo e($default_location->name, false); ?>

                                </p>
                            </div>
                            <div class="col-md-12">
                                <h4 class="invoice_no" style="margin: 0; width: 150px;"><?php echo e($creation_type == 'quotation' ? __('lang_v1.quotation_no') : __('lang_v1.invoice_no'), false); ?>: <span
                                        class="invoice_no_span"></span></h4>
                                <input type="hidden" name="invoice_no">
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="col-md-12"></div>
                            <div class="col-md-6 text-red" style="font-size: 16px;">
                                <b><?php echo app('translator')->get('lang_v1.customer'); ?>:</b> <span class="customer_name"></span>
                            </div>
                            <div class="col-md-6 text-red" style="font-size: 16px;">
                                <b><?php echo app('translator')->get('lang_v1.due_amount'); ?>:</b> <span class="customer_due_amount"> </span>
                            </div>
                        </div>
                        <input type="hidden" id="item_addition_method" value="<?php echo e($business_details->item_addition_method, false); ?>">
                        <input type="hidden" id="service_addition_method" value="<?php echo e($business_details->service_addition_method, false); ?>">
                    <?php $__env->endSlot(); ?>
                    <div class="clearfix"></div>
                    <input type="hidden" name="price_later" id="price_later" value="0">
                    <?php echo Form::hidden('location_id', $default_location->id, [
                        'id' => 'location_id',
                        'data-receipt_printer_type' => !empty($default_location->receipt_printer_type)
                            ? $default_location->receipt_printer_type
                            : 'browser',
                        'data-default_accounts' => $default_location->default_payment_accounts,
                    ]); ?>

                    <style>
                        .select2-drop-active {
                            margin-top: -25px;
                        }
                    </style>
                    <!-- /.box-header -->
                    <div class="box-body w-100">
                        <div class="row">
                            <?php 
                            $addRow = 0;
                            ?>
                            <?php if(!empty($pos_settings['enable_transaction_date'])): ?>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <?php echo Form::label('transaction_date', __('sale.sale_date') . ':*'); ?>

                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                            
                                            <input type="datetime-local" 
                                               value="<?php echo e(!empty($temp_data->transaction_date) ? \Carbon::parse($temp_data->transaction_date)->format('Y-m-d\TH:i:s') : \Carbon::parse($default_datetime)->format('Y-m-d\TH:i:s'), false); ?>" 
                                               name="transaction_date" 
                                               class="form-control" 
                                               id="datetimepicker_pos" 
                                               required>

                                        </div>
                                    </div>
                                </div>
                                <?php 
                                $addRow ++;
                                ?>
                            <?php endif; ?>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <?php echo Form::label('ref_no', __('lang_v1.ref_no') . ':*'); ?>

                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-link"></i>
                                        </span>
                                        <?php echo Form::text('ref_no', null, ['class' => 'form-control', 'id' => 'ref_no']); ?>

                                    </div>
                                </div>
                                <?php 
                                $addRow ++;
                                ?>
                            </div>
                            <?php if($addRow == 2): ?>
                            <?php
                               $addRow = 0; 
                            ?>
                            </div>
                            <div class="row">
                            <?php endif; ?>
                            <?php if(request()->session()->get('business.is_pharmacy') ||
                                    request()->session()->get('business.is_hospital')): ?>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <?php if(request()->session()->get('business.is_pharmacy')): ?>
                                            <?php echo Form::label('patients', __('patient.patients') . ':*'); ?>

                                        <?php endif; ?>
                                        <?php if(request()->session()->get('business.is_hospital')): ?>
                                            <?php echo Form::label('patients', __('patient.patient_cusotmer') . ':*'); ?>

                                        <?php endif; ?>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-frown-o"></i>
                                            </span>
                                            <?php echo Form::select('patient', [], null, [
                                                'placeholder' => 'Select patient',
                                                'class' => 'form-control
                                                                                        								select2',
                                                'id' => 'pos_patients',
                                            ]); ?>

                                        </div>
                                    </div>
                                </div>
                                <?php 
                                $addRow ++;
                                ?>
                            <?php endif; ?>
                            <?php if($addRow == 2): ?>
                            <?php
                               $addRow = 0; 
                            ?>
                            </div>
                            <div class="row">
                            <?php endif; ?>
                            <?php if(config('constants.enable_sell_in_diff_currency') == true): ?>
                                <div class="col-md-4 col-sm-6 pt--20">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-exchange"></i>
                                            </span>
                                            <?php echo Form::text(
                                                'exchange_rate',
                                                !empty($temp_data->exchange_rate) ? $temp_data->exchange_rate : config('constants.currency_exchange_rate'),
                                                [
                                                    'class' => 'form-control input-sm input_number',
                                                    'placeholder' => __('lang_v1.currency_exchange_rate'),
                                                    'id' => 'exchange_rate',
                                                ],
                                            ); ?>

                                        </div>
                                    </div>
                                </div>
                                <?php 
                                $addRow ++;
                                ?>
                            <?php endif; ?>
                            <?php if($addRow == 2): ?>
                            <?php
                               $addRow = 0; 
                            ?>
                            </div>
                            <div class="row">
                            <?php endif; ?>
                            <?php if(!empty($price_groups) && count($price_groups) > 1): ?>
                                <div class="col-md-4 col-sm-6 pt--20">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-money"></i>
                                            </span>
                                            <?php
                                                reset($price_groups);
                                                $selected_price_group = !empty($default_price_group_id) && array_key_exists($default_price_group_id, $price_groups) ? $default_price_group_id : null;
                                            ?>
                                            <?php echo Form::hidden(
                                                'hidden_price_group',
                                                !empty($temp_data->hidden_price_group) ? $temp_data->hidden_price_group : key($price_groups),
                                                ['id' => 'hidden_price_group'],
                                            ); ?>

                                            <?php echo Form::select(
                                                'price_group',
                                                $price_groups,
                                                !empty($temp_data->price_group) ? $temp_data->price_group : $selected_price_group,
                                                ['class' => 'form-control select2', 'id' => 'price_group', 'style' => 'width: 100%;'],
                                            ); ?>

                                            <span class="input-group-addon">
                                                <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.price_group_help_text') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                $addRow ++;
                                ?>
                            <?php else: ?>
                                <?php
                                    reset($price_groups);
                                ?>
                                <?php echo Form::hidden('price_group', !empty($temp_data->price_group) ? $temp_data->price_group : key($price_groups), [
                                    'id' => 'price_group',
                                ]); ?>

                            <?php endif; ?>
                            <?php if(!empty($default_price_group_id)): ?>
                                <?php echo Form::hidden(
                                    'default_price_group',
                                    !empty($temp_data->default_price_group) ? $temp_data->default_price_group : $default_price_group_id,
                                    ['id' => 'default_price_group'],
                                ); ?>

                            <?php endif; ?>
                            <?php if($addRow == 2): ?>
                            <?php
                               $addRow = 0; 
                            ?>
                            </div>
                            <div class="row">
                            <?php endif; ?>
                            <?php if(in_array('types_of_service', $enabled_modules) && !empty($types_of_service)): ?>
                                <div class="col-md-4 col-sm-6 pt--20">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-external-link text-primary service_modal_btn"></i>
                                            </span>
                                            <?php echo Form::select(
                                                'types_of_service_id',
                                                $types_of_service,
                                                !empty($temp_data->types_of_service_id) ? $temp_data->types_of_service_id : null,
                                                [
                                                    'class' => 'form-control',
                                                    'id' => 'types_of_service_id',
                                                    'style' => 'width: 100%;',
                                                    'placeholder' => __('lang_v1.select_types_of_service'),
                                                ],
                                            ); ?>

                                            <?php echo Form::hidden(
                                                'types_of_service_price_group',
                                                !empty($temp_data->types_of_service_price_group) ? $temp_data->types_of_service_price_group : null,
                                                ['id' => 'types_of_service_price_group'],
                                            ); ?>

                                            <span class="input-group-addon">
                                                <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.types_of_service_help') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                                            </span>
                                        </div>
                                        <small>
                                            <p class="help-block hide" id="price_group_text"><?php echo app('translator')->get('lang_v1.price_group'); ?>:
                                                <span></span>
                                            </p>
                                        </small>
                                    </div>
                                </div>
                                <?php 
                                $addRow ++;
                                ?>
                                <?php if($addRow == 2): ?>
                                <?php
                                   $addRow = 0; 
                                ?>
                                </div>
                                <div class="row">
                                <?php endif; ?>
                                <div class="modal fade types_of_service_modal" tabindex="-1" role="dialog"
                                    aria-labelledby="gridSystemModalLabel"></div>
                            <?php endif; ?>
                            <?php if(in_array('subscription', $enabled_modules)): ?>
                                <div class="col-md-4 pull-right col-sm-6">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('is_recurring', 1, false, ['class' => 'input-icheck', 'id' => 'is_recurring']); ?> <?php echo app('translator')->get('lang_v1.subscribe'); ?>?
                                        </label><button type="button" data-toggle="modal" data-target="#recurringInvoiceModal"
                                            class="btn btn-link"><i
                                                class="fa fa-external-link"></i></button><?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.recurring_invoice_help') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                                    </div>
                                </div>
                                <?php 
                                $addRow ++;
                                ?>
                            <?php endif; ?>
                            
                            <?php if($addRow == 2): ?>
                            <?php
                               $addRow = 0; 
                            ?>
                            </div>
                            <div class="row">
                            <?php endif; ?>
                            <div class="<?php if(!empty($commission_agent)): ?> col-sm-4 pt--20 <?php else: ?> col-sm-6 pt--20 <?php endif; ?>">
                                <?php 
                                $addRow ++;
                                ?>
                                <div class="form-group" style="width: 100% !important">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <input type="hidden" id="default_customer_id"
                                            value="<?php echo e(!empty($temp_data->default_customer_id) ? $temp_data->default_customer_id : $walk_in_customer['id'], false); ?>">
                                        <input type="hidden" id="default_customer_name"
                                            value="<?php echo e(!empty($temp_data->default_customer_name) ? $temp_data->default_customer_name : $walk_in_customer['name'], false); ?>">

                                       <!--  <input class="form-control" id="customer_id" name="customer_id" type="hidden"
                                            value="<?php echo e($job_sheet && $job_sheet->customer ? $job_sheet->customer->id : '', false); ?>"
                                            readonly />

                                        <input class="form-control" id="customer_name" name="customer_name" type="text"
                                            value="<?php echo e($job_sheet && $job_sheet->customer ? $job_sheet->customer->name : '', false); ?>"
                                            readonly /> -->

                                        <?php echo Form::select('contact_id', [], '40', [
                                            'class' => 'form-control mousetrap myNewCustomer',
                                            'id' => 'customer_id',
                                            'placeholder' => 'Enter Customer name / phone',
                                            'required',
                                            'style' => 'width: 100%;',
                                            $disabled,
                                        ]); ?>

                                        <span class="input-group-btn">
                                             <button type="button" class="btn btn-default bg-white btn-flat add_new_customer"
                                              data-name="" <?php if(!auth()->user()->can('customer.create')): ?> disabled <?php endif; ?>><i
                                               class="fa fa-plus-circle text-primary fa-lg"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <?php if($addRow == 2): ?>
                            <?php
                               $addRow = 0; 
                            ?>
                            </div>
                            <div class="row">
                            <?php endif; ?>
                            <input type="hidden" name="pay_term_number" id="pay_term_number"
                                value="<?php echo e(!empty($temp_data->pay_term_number) ? $temp_data->pay_term_number : $walk_in_customer['pay_term_number'], false); ?>">
                            <input type="hidden" name="pay_term_type" id="pay_term_type"
                                value="<?php echo e(!empty($temp_data->pay_term_type) ? $temp_data->pay_term_type : $walk_in_customer['pay_term_type'], false); ?>">
                            <?php if(!empty($commission_agent)): ?>
                                <div class="col-sm-4 pt--20">
                                    <?php 
                                $addRow ++;
                                ?>
                                    <div class="form-group">
                                        <?php echo Form::select(
                                            'commission_agent',
                                            $commission_agent,
                                            !empty($temp_data->commission_agent) ? $temp_data->commission_agent : null,
                                            ['class' => 'form-control select2', 'placeholder' => __('lang_v1.commission_agent')],
                                        ); ?>

                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if($addRow == 2): ?>
                            <?php
                               $addRow = 0; 
                            ?>
                            </div>
                            <div class="row">
                            <?php endif; ?>
                            <div class="<?php if(!empty($commission_agent)): ?> col-sm-4 pt--20 <?php else: ?> col-sm-6 pt--20 <?php endif; ?>">
                                <?php 
                                $addRow ++;
                                ?>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-default bg-white btn-flat"
                                                data-toggle="modal" data-target="#configure_search_modal"
                                                title="<?php echo e(__('lang_v1.configure_product_search'), false); ?>"><i
                                                    class="fa fa-barcode"></i></button>
                                        </div>
                                        <?php echo Form::text('search_product', null, [
                                            'class' => 'form-control mousetrap',
                                            'id' => 'search_product',
                                            'placeholder' => __('lang_v1.search_product_placeholder'),
                                            'disabled' => is_null($default_location) ? true : false,
                                            'autofocus' => is_null($default_location) ? false : true,
                                        ]); ?>

                                        <span class="input-group-btn">
                                            <button type="button"
                                                class="btn btn-default bg-white btn-flat pos_add_quick_product"
                                                data-href="<?php echo e(action('ProductController@quickAdd'), false); ?>"
                                                data-container=".quick_add_product_modal"><i
                                                    class="fa fa-plus-circle text-primary fa-lg"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Call restaurant module if defined -->
                            <?php if(in_array('tables', $enabled_modules) || in_array('service_staff', $enabled_modules)): ?>
                                <span id="restaurant_module_span">
                                    <div class="col-md-3"></div>
                                </span>
                            <?php endif; ?>
                            <?php if($addRow == 2): ?>
                            <?php
                               $addRow = 0; 
                            ?>
                            </div>
                            <div class="row">
                            <?php endif; ?>
                            <div class=" col-sm-6 pt--20">
                                <?php 
                                $addRow ++;
                                ?>
                                <div class="form-group" style="width: 100% !important">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-list-ol"></i>
                                        </span>
                                        <input class="form-control" id="job_sheet_id" name="job_sheet_id" type="hidden"
                                            value="<?php echo e($job_sheet ? $job_sheet->id : '', false); ?>" readonly>
                                        <input class="form-control valid" id="job_sheet_no" name="job_sheet_no"
                                            type="text" value="<?php echo e($job_sheet ? $job_sheet->job_sheet_no : '', false); ?>"
                                            readonly="" aria-invalid="false">
                                    </div>
                                </div>
                            </div>
                            <?php if($addRow == 2): ?>
                            <?php
                               $addRow = 0; 
                            ?>
                            </div>
                            <div class="row">
                            <?php endif; ?>
                            <?php if($job_sheet && $job_sheet->reportStatus == '1'): ?>
                                <div class=" col-sm-6 pt--20">
                                    <?php 
                                $addRow ++;
                                ?>
                                    <div class="form-group" style="width: 100% !important">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-car"></i>
                                            </span>
                                            <input class="form-control valid" id="vehicle_no" name="vehicle_no"
                                                type="text" value="<?php echo e($vehicle->vehicle_no, false); ?>" readonly=""
                                                aria-invalid="false">
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 pos_product_div">
                                <input type="hidden" name="sell_price_tax" id="sell_price_tax"
                                    value="<?php echo e(!empty($temp_data->sell_price_tax) ? $temp_data->sell_price_tax : $business_details->sell_price_tax, false); ?>">
                                <!-- Keeps count of product rows -->
                                <input type="hidden" id="product_row_count"
                                    value="<?php echo e(!empty($temp_data->product_row_count) ? $temp_data->product_row_count : 0, false); ?>">
                                <?php
                                    $hide_tax = '';
                                    if (session()->get('business.enable_inline_tax') == 0) {
                                        $hide_tax = 'hide';
                                    }
                                ?>
                                <table class="table table-condensed table-bordered table-striped table-responsive"
                                    id="pos_table">
                                    <thead>
            							<tr>
            								<th class="text-center">
            									<?php echo app('translator')->get('sale.product'); ?>
            								</th>
            								<th class="text-center" width="20%">
            									<?php echo app('translator')->get('sale.qty'); ?>
            								</th>
            								<?php if(!empty($pos_settings['inline_service_staff'])): ?>
            								<th class="text-center">
            									<?php echo app('translator')->get('restaurant.service_staff'); ?>
            								</th>
            								<?php endif; ?>
            								
            								<th class="text-center <?php echo e($hide_tax, false); ?>"  width="15%">
            									<?php echo app('translator')->get('sale.unit_price_inc_tax'); ?>
            								</th>
            								
            								<?php if(isset($is_sales_page) && $is_sales_page == '1'): ?>
                								<th><?php echo app('translator')->get('sale.unit_price'); ?></th>
                								<th><?php echo app('translator')->get('sale.discount_type'); ?></th>
                								<th><?php echo app('translator')->get('sale.discount'); ?></th>
            								<?php endif; ?>
            				
            								<th class="price_later_td <?php if(isset($price_later) && $price_later != 1): ?> hide <?php endif; ?>"  width="15%"><?php echo app('translator')->get('lang_v1.purchase_price'); ?></th>
            								<?php if(isset($is_sales_page) && $is_sales_page == '1'): ?>
            								<th><?php echo app('translator')->get('sale.tax'); ?></th>
            								<th class="text-center <?php echo e($hide_tax, false); ?>">
            									<?php echo app('translator')->get('sale.price_inc_tax'); ?>
            								</th>
            								<?php endif; ?>
            								
            								<th class="text-center">
            									<?php echo app('translator')->get('sale.subtotal'); ?>
            								</th>
            								<th class="text-center"><i class="fa fa-close" aria-hidden="true"></i></th>
            							</tr>
            						</thead>
                                    <?php
                                        $qty = $job_sheet
                                            ? DB::table('repair_job_sheets')
                                                ->where('id', $job_sheet->id)
                                                ->value('parts')
                                            : 0;
                                        $product_totals = 0;
                                        $product_item = 0;
                                    ?>
                                    <tbody id="saleBody">
                                        <?php if(!empty($parts)): ?>
                                            <?php $__currentLoopData = $parts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $part): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <th>
                                                        <?php echo e($part['variation_name'], false); ?>: &nbsp;
                                                    </th>
                                                    <?php
                                                        $product_item += $part['quantity'];
                                                    ?>
                                                    <th class="text-center col-md-3">
                                                        <?php echo e($part['quantity'], false); ?>

                                                    </th>
                                                    <?php if(!empty($pos_settings['inline_service_staff'])): ?>
                                                        <th class="text-center col-md-2">
                                                            <?php echo e($job_sheet->service_staff, false); ?>

                                                        </th>
                                                    <?php endif; ?>
                                                    <th class="text-center col-md-2 <?php echo e($hide_tax, false); ?>">

                                                    </th>
                                                    <th class="price_later_td hide">

                                                    </th>
                                                    <?php if($enable_line_discount): ?>
                                                        <th class="text-center col-md-2">

                                                        </th>
                                                    <?php endif; ?>
                                                    <?php
                                                        $product_totals +=
                                                            $part['quantity'] *
                                                            DB::table('variations')
                                                                ->where('product_id', $part['variation_id'])
                                                                ->value('default_sell_price');
                                                    ?>
                                                    <th class="text-center col-md-2">
                                                        <?php echo e($part['quantity'] *DB::table('variations')->where('product_id', $part['variation_id'])->value('default_sell_price'), false); ?>


                                                    </th>
                                                    <th class="text-center"><i class="fa fa-close" aria-hidden="true"></i>
                                                    </th>

                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                       
                    </div>
                    <!--  temp cat id and brand id if there is any temp data  -->
                    <input type="hidden" id="cat_id_suggestion" name="cat_id_suggestion"
                        value="<?php echo e(!empty($temp_data->cat_id_suggestion) ? $temp_data->cat_id_suggestion : 0, false); ?>">
                    <input type="hidden" id="brand_id_suggestion" name="brand_id_suggestion"
                        value="<?php echo e(!empty($temp_data->brand_id_suggestion) ? $temp_data->brand_id_suggestion : 0, false); ?>">
                    <input type="hidden" name="is_pos" value="1" id="is_pos">
                    <input type="hidden" name="is_duplicate" value="0" id="is_duplicate">
                    <input type="hidden" name="was_customer_wallet" id="was_customer_wallet" value=0>
                    <input type="hidden" name="in_customer_wallet" id="in_customer_wallet" value=0>

                <?php echo $__env->renderComponent(); ?>
            </div>
            <div class="col-md-5 col-sm-12 right_div">
                <?php echo $__env->make('sale_pos.partials.right_div', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        <?php echo $__env->make('sale_pos.partials.pos_details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('sale_pos.partials.payment_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php if(empty($pos_settings['disable_suspend'])): ?>
            <?php echo $__env->make('sale_pos.partials.suspend_note_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <?php if(empty($pos_settings['disable_recurring_invoice'])): ?>
            <?php echo $__env->make('sale_pos.partials.recurring_invoice_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <!-- /.box-body -->
        <?php echo Form::close(); ?>

    </section>
    
    <!-- This will be printed -->
    <section class="invoice print_section" id="receipt_section">
    </section>
    <div class="modal fade pos_recent_trans_model" tabindex="-1" role="dialog" aria-labelledby="modalTitle" ></div>
   
    <div class="modal fade register_details_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    </div>
    <div class="modal fade close_register_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    </div>
    <div class="modal fade quick_return_modal" id="quick_return_modal" role="dialog"></div>
    <!-- quick product modal -->
    <div class="modal fade quick_add_product_modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle"></div>
    <div class="modal fade patient_prescriptions_modal" role="dialog" aria-labelledby="modalTitle"></div>

    <div class="modal fade contact_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
        <?php echo $__env->make('contact.create', ['quick_add' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    
    
    <!-- /.content -->
    <?php echo $__env->make('sale_pos.partials.configure_search_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
    <script src="<?php echo e(asset('js/pos.js?v=' . $asset_v), false); ?>"></script>
    <script src="<?php echo e(asset('js/printer.js?v=' . $asset_v), false); ?>"></script>
    <script src="<?php echo e(asset('js/product.js?v=' . $asset_v), false); ?>"></script>
    <script src="<?php echo e(asset('js/opening_stock.js?v=' . $asset_v), false); ?>"></script>
    <?php echo $__env->make('sale_pos.partials.keyboard_shortcuts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Call restaurant module if defined -->
    <?php if(in_array('tables', $enabled_modules) ||
            in_array('modifiers', $enabled_modules) ||
            in_array('service_staff', $enabled_modules)): ?>
        <script src="<?php echo e(asset('js/restaurant.js?v=' . $asset_v), false); ?>"></script>
    <?php endif; ?>
    <script src="<?php echo e(asset('js/sell_return.js?v=' . $asset_v), false); ?>"></script>
    <script>
				$('#total_new').hide();

		    $(document).ready(function() {
				var show = $("#show").val();
				var total_new = $("#total_new").val();
	
	$('#show').hide();
			});
        $(document).ready(function() {
			
            setTimeout(() => {
                $(".payment_method").val($(".payment_method option:eq(1)").val());
                $(".payment_method").selectmenu().selectmenu("refresh");
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('is_service_staff')): ?>
                    $("#res_waiter_id").val("<?php echo e(auth()->user()->id, false); ?>");
                    $("#res_waiter_id").trigger('change.select2');
                <?php endif; ?>
            }, 2000);
        });
      
    </script>
    <script>
        $('#toggle_popup').click(function() {
            $.ajax({
                url: '/toggle_popup',
                type: 'get',
                dataType: 'json',
                success: function(result) {}
            });
        });
		var show = $("#show").val();
        $('#show').hide();
        if (show != null) {
            $('#show').show();
            $('#hide').hide();
        }
    </script>
    <script>
        $('.right_div').show();
        $('.left_div').show();
        $("#hide_show_products").click(function() {
            $(".right_div").toggle();
            $('.left_div').toggleClass('col-md-7');
            $('.left_div').toggleClass('col-md-12');
        });
        $('document').ready(function() {
            reset_pos_form();
            $('.payment_types_dropdown').val('cash');
            $('.payment_types_dropdown').trigger('change');
        });
        $(document).on('change', '.payment_types_dropdown', function(e) {
            var payment_type = $(this).val();
            if (payment_type == 'direct_bank_deposit' || payment_type == 'bank_transfer') {
                $('.account_module').removeClass('hide');
            } else {
                $('.account_module').addClass('hide');
            }
        });
    </script>
    <script>
        var product_row = $('input#product_row_count').val();
        var location_id = $('input#location_id').val();
        var customer_id = $('select#customer_id').val();
        var is_direct_sell = false;
        if (
            $('input[name="is_direct_sale"]').length > 0 &&
            $('input[name="is_direct_sale"]').val() == 1
        ) {
            is_direct_sell = true;
        }
        var price_group = '';
        if ($('#price_group').length > 0) {
            price_group = parseInt($('#price_group').val());
        }
        //If default price group present
        if ($('#default_price_group').length > 0 &&
            !price_group) {
            price_group = $('#default_price_group').val();
        }
        //If types of service selected give more priority
        if ($('#types_of_service_price_group').length > 0 &&
            $('#types_of_service_price_group').val()) {
            price_group = $('#types_of_service_price_group').val();
        }
    </script>
    <?php if(!empty($temp_data->products)): ?>
        <?php $i = -1; ?>
        <?php $__currentLoopData = $temp_data->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <script>
                $(document).ready(function() {
                    // base_url = '<?php echo e(URL::to('/'), false); ?>';
                    var qty = parseInt(<?php echo e($product->quantity, false); ?>);
                    var variation_id = parseInt(<?php echo e($product->variation_id, false); ?>);
                    add_pos_product_row(qty, variation_id, location_id);
                })
            </script>
            <?php $i++; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <script>
        $('#request_approval').click(function() {
            let customer_id = $('#customer_id').val();
            $.ajax({
                method: 'get',
                url: '/customer-limit-approval/send-reuqest-for-approval/' + customer_id,
                data: {},
                success: function(result) {
                    if (result.success === 1) {
                        toastr.success(result.msg)
                    }
                },
            });
        });
        //Update values for each row
        $('#is_duplicate').change(function() {
            getInvoice();
        });

        function getInvoice() {
            $.ajax({
                method: 'get',
                url: '<?php echo e(action('SellController@getInvoiveNo'), false); ?>',
                data: {
                    location_id: $('#location_id').val(),
                    <?php if($creation_type == 'quotation'): ?>
                        creation_type: 'quotation'
                    <?php endif; ?>
                },
                success: function(result) {
                    if (parseInt($('#is_duplicate').val()) == 1) {
                        $('.invoice_no_span').text(result.duplicate_invoice_no);
                        $('input[name="invoice_no"]').val(result.duplicate_invoice_no);
                    } else {
                        $('.invoice_no_span').text(result.orignal_invoice_no);
                        $('input[name="invoice_no"]').val(result.orignal_invoice_no);
                    }
                },
            });
        }
        getInvoice();
        <?php if(auth()->user()->can('unfinished_form.pos')): ?>
            setInterval(function() {
                $.ajax({
                    method: 'POST',
                    url: '<?php echo e(action('TempController@saveAddPosTemp'), false); ?>',
                    dataType: 'json',
                    data: $('#add_pos_sell_form').serialize(),
                    success: function(data) {},
                });
            }, 10000);
            <?php if(!empty($temp_data)): ?>
                swal({
                    title: "Do you want to load unsaved data?",
                    icon: "info",
                    buttons: {
                        confirm: {
                            text: "Yes",
                            value: false,
                            visible: true,
                            className: "",
                            closeModal: true
                        },
                        cancel: {
                            text: "No",
                            value: true,
                            visible: true,
                            className: "",
                            closeModal: true,
                        }
                    },
                    dangerMode: false,
                }).then((sure) => {
                    if (sure) {
                        window.location.href =
                            "<?php echo e(action('TempController@clearData', ['type' => 'add_pos_data']), false); ?>";
                    }
                });
            <?php endif; ?>
        <?php endif; ?>

        // $(".myNewCustomer").select2({
        // 	disabled:'readonly',
        // 	minimumResultsForSearch: Infinity
        // });
        // $(".select2-container").hide();

        $('#customer_id').change(function(){
        	$.ajax({
        		method: 'post',
        		url: '/get-customer-details',
        		data: { contact_id : $(this).val() },
        		success: function(result) {
        		    
        		    result = JSON.parse(result);
        		    
        		    $('.customer_name').text(result['name']);
        			$('.customer_due_amount').text(result['due']);
        		},
        	});
        });

        $('#add_to_customer_wallet').click(function() {
            var change_return = parseFloat($('input#change_return').val().replace(',', ''));
            let was_customer_wallet = parseFloat($('#was_customer_wallet').val());
            $('input#in_customer_wallet').val(parseFloat(was_customer_wallet + change_return));
            $('span.customer_wallet').text(__currency_trans_from_en(parseFloat(was_customer_wallet + change_return),
                true));
        })
        $(document).on('click', '#verify_password_btn', function() {
            $.ajax({
                method: 'post',
                url: '/check_user_password',
                data: {
                    password: $('#verify_password').val()
                },
                success: function(result) {
                    if (result.success == 1) {
                        $('#verify_password_modal').find('.modal-title').empty().text('Enter Invoice');
                        $('#verify_password_modal').find('.modal-body').empty().append(`
				<input type="text" id="return_invoice" name="return_invoice" placeholder="<?php echo app('translator')->get('lang_v1.enter_invoice'); ?>"
					style="margin-auto;" class="form-control">
				`);
                        $('#verify_password_modal').find('.modal-footer').empty().append(`
				<button type="button" id="return_invoice_btn" class="btn btn-primary">Submit</button>
        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				`);
                    } else {
                        toastr.error('Password does not match');
                    }
                },
            });
        });
        $(document).on('click', '#return_invoice_btn', function() {
            let return_invoice = $('#return_invoice').val();
            $.ajax({
                method: 'get',
                url: '/sell-return/add/' + return_invoice,
                data: {},
                success: function(result) {
                    if (result.success == 0) {
                        $('#verify_password_modal').modal('hide')
                        toastr.error(result.msg);
                        return false;
                    } else {
                        $('#verify_password_modal').modal('hide');
                        resetVerifyPasswordModal();
                        $('.quick_return_modal').empty().append(result);
                        $('.quick_return_modal').modal('show');
                        $('#pos_invoice_return').val($('.invoice_no_span').text());
                    }
                },
            });
        });

        function resetVerifyPasswordModal() {
            $('#verify_password_modal').find('.modal-title').empty().text('Enter Password');
            $('#verify_password_modal').find('.modal-body').empty().append(`
		<input type="password" id="verify_password" name="verify_password" placeholder="<?php echo app('translator')->get('lang_v1.enter_password'); ?>"
		style="margin-auto;" class="form-control">
		`);
            $('#verify_password_modal').find('.modal-footer').empty().append(`
		<button type="button" id="verify_password_btn" class="btn btn-primary"><?php echo app('translator')->get('lang_v1.verify'); ?></button>
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	`);
        }
        $(document).on('keyup', '.cash_denomination', function(e) {
            e.preventDefault();
            var subtotal_element  = $(this).closest('tr').find('.denomination_subtotal');
            var denomination = $(this).data('denomination');

            
            var subtotal = denomination * $(this).val();
            subtotal_element.data('total',subtotal);
            subtotal_element.html(__currency_trans_from_en(subtotal, true));
            var grand_total = 0;
            var row_denomination = $(this).closest('tbody').find('.cash_denomination');
            row_denomination.each(function(){
                grand_total += $(this).val() * $(this).data('denomination');
            })
            var total_element = $(this).closest('table').find('.denomination_total');
            total_element.data('total',grand_total);
            total_element.html(__currency_trans_from_en(grand_total, true));
           

        });    
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('form#sell_return_form').validate();
            update_sell_return_total();
        });
        $(document).on('click', '#sell_return_submit', function(e) {
            e.preventDefault();
            var data = $('form#sell_return_form').serialize();
            $.ajax({
                method: 'POST',
                url: "<?php echo e(action('SellReturnController@savePosReturn'), false); ?>",
                dataType: 'json',
                data: data,
                success: function(result) {
                    var location_id = $('input#location_id').val();
                    if (result.success == true) {
                        $('.quick_return_modal').modal('hide');
                        jQuery.each(result.returns, function(id, obj) {
                            id = Object.keys(obj);
                            qty = Object.values(obj);
                            add_pos_product_row(qty * -1, id, location_id);
                            $('input#product_row_count').val(parseInt($(
                                'input#product_row_count').val()) + 1);
                        })
                    } else {
                        toastr.error(result.msg);
                    }
                },
            });
        });
        $(document).on('change', 'input.return_qty, #discount_amount, #discount_type', function() {
            update_sell_return_total()
        });

        function update_sell_return_total() {
            var net_return = 0;
            $('table#sell_return_table tbody tr').each(function() {
                var quantity = __read_number($(this).find('input.return_qty'));
                var unit_price = __read_number($(this).find('input.unit_price'));
                var subtotal = quantity * unit_price;
                $(this).find('.return_subtotal').text(__currency_trans_from_en(subtotal, true));
                net_return += subtotal;
            });
            var discount = 0;
            if ($('#discount_type').val() == 'fixed') {
                discount = __read_number($("#discount_amount"));
            } else if ($('#discount_type').val() == 'percentage') {
                var discount_percent = __read_number($("#discount_amount"));
                discount = __calculate_amount('percentage', discount_percent, net_return);
            }
            discounted_net_return = net_return - discount;
            var tax_percent = $('input#tax_percent').val();
            var total_tax = __calculate_amount('percentage', tax_percent, discounted_net_return);
            var net_return_inc_tax = total_tax + discounted_net_return;
            $('input#tax_amount').val(total_tax);
            $('span#total_return_discount').text(__currency_trans_from_en(discount, true));
            $('span#total_return_tax').text(__currency_trans_from_en(total_tax, true));
            $('span#net_return').text(__currency_trans_from_en(net_return_inc_tax, true));
        }

        function add_pos_product_row(qty, variation_id, location_id) {
            $.ajax({
                method: 'GET',
                url: '/sells/pos/get_product_row_temp/' + variation_id + '/' + location_id + '/' + qty,
                data: {
                    product_row: $('input#product_row_count').val(),
                    customer_id: customer_id,
                    is_direct_sell: is_direct_sell,
                    price_group: price_group,
                    purchase_line_id: null
                },
                dataType: 'json',
                success: function(result) {
                    if (result.success) {
                        $('table#pos_table tbody')
                            .append(result.html_content)
                            .find('input.pos_quantity');
                        //increment row count
                        var this_row = $('table#pos_table tbody')
                            .find('tr')
                            .last();
                        pos_each_row(this_row);
                        //For initial discount if present
                        var line_total = __read_number(this_row.find('input.pos_line_total'));
                        this_row.find('span.pos_line_total_text').text(line_total);
                        pos_total_row();
                        //Check if multipler is present then multiply it when a new row is added.
                        if (__getUnitMultiplier(this_row) > 1) {
                            this_row.find('select.sub_unit').trigger('change');
                        }
                        if (result.enable_sr_no == '1') {
                            var new_row = $('table#pos_table tbody')
                                .find('tr')
                                .last();
                            new_row.find('.add-pos-row-description').trigger('click');
                        }
                        round_row_to_iraqi_dinnar(this_row);
                        __currency_convert_recursively(this_row);
                        $('input#search_product')
                            .focus()
                            .select();
                        //Used in restaurant module
                        if (result.html_modifier) {
                            $('table#pos_table tbody')
                                .find('tr')
                                .last()
                                .find('td:first')
                                .append(result.html_modifier);
                        }
                        //scroll bottom of items list
                        $(".pos_product_div").animate({
                            scrollTop: $('.pos_product_div').prop("scrollHeight")
                        }, 1000);
                    } else {
                        toastr.error(result.msg);
                        $('input#search_product')
                            .focus()
                            .select();
                    }
                }
            });
        }
        
		$('#show').hide();
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vimi31/public_html/resources/views/sale_pos/create.blade.php ENDPATH**/ ?>