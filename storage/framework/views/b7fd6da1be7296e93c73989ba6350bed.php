<?php if(empty($is_ajax)): ?>
    <!-- Main content -->

    <section class="content">
<?php endif; ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token(), false); ?>">
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
         
             <div class="col-md-3" id="location_filter">
                <div class="form-group">
                    <?php echo Form::label('f21c_location_id', __('purchase.business_location') . ':'); ?>

                    <?php echo Form::select('f21c_location_id', $business_locations, null, ['class' => 'form-control select2',
                    'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); ?>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('form_date_range', __('report.date_range') . ':'); ?>

                    <?php echo Form::text('form_21c_date_range', \Carbon::createFromTimestamp(strtotime('first day of this month'))->format(session('business.date_format')) . ' ~ ' . \Carbon::createFromTimestamp(strtotime('last
                    day of this month'))->format(session('business.date_format')) , ['placeholder' => __('lang_v1.select_a_date_range'), 'class' =>
                    'form-control', 'id' => 'form_21c_date_range', 'readonly']); ?>

                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('type', __('mpcs::lang.F21c_from_no') . ':'); ?>

                    <?php echo Form::text('F21c_from_no', $F21c_from_no, ['class' => 'form-control', 'readonly']); ?>

                </div>
            </div>
             
        
          
         
             <div class="col-md-3" id="location_filter">
                <div class="form-group">
                    <?php echo Form::label('f21c_location_id', __('purchase.business_location') . ':'); ?>

                    <?php echo Form::select('f21c_location_id', $business_locations, null, ['class' => 'form-control select2',
                    'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); ?>

                </div>
            </div>
           
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('type', __('mpcs::lang.F21c_from_no') . ':'); ?>

                    <?php echo Form::text('F21c_from_no', $F21c_from_no, ['class' => 'form-control', 'readonly']); ?>

                </div>
            </div>
         
           
          
  
           
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.widget', ['class' => 'box-primary']); ?>
            <?php $__env->slot('tool'); ?>
            <div class="box-tools">
                <!-- Standard Print button -->
                <button class="btn btn-primary print_report pull-right" onclick="printDiv()">
                    <i class="fa fa-print"></i> <?php echo app('translator')->get('messages.print'); ?></button>
            </div>
            <?php $__env->endSlot(); ?>
            <div class="col-md-12" id="print_content">
                <style>
                    @media print {
                        .col-print-1 {
                            width: 8%;
                            float: left;
                        }

                        .col-print-2 {
                            width: 16%;
                            float: left;
                        }

                        .col-print-3 {
                            width: 25%;
                            float: left;
                        }

                        .col-print-4 {
                            width: 33%;
                            float: left;
                        }

                        .col-print-5 {
                            width: 42%;
                            float: left;
                        }

                        .col-print-6 {
                            width: 50%;
                            float: left;
                        }

                        .col-print-7 {
                            width: 58%;
                            float: left;
                        }

                        .col-print-8 {
                            width: 66%;
                            float: left;
                        }

                        .col-print-9 {
                            width: 75%;
                            float: left;
                        }

                        .col-print-10 {
                            width: 83%;
                            float: left;
                        }

                        .col-print-11 {
                            width: 92%;
                            float: left;
                        }

                        .col-print-12 {
                            width: 100%;
                            float: left;
                        }

                    }
                </style>
                <div class="row">
                    <div class="col-md-4 text-red" style="margin-top: 14px;">
                        <b><?php echo app('translator')->get('petro::lang.date_range'); ?>: <span class="21c_from_date"></span> <?php echo app('translator')->get('petro::lang.to'); ?> <span class="21c_to_date"></span> </b>
                    </div>
                    <div class="col-md-5">
                        <div class="text-center">
                            <h5 style="font-weight: bold;"><?php echo e(request()->session()->get('business.name'), false); ?> <br>
                                <span class="f21c_location_name"><?php echo app('translator')->get('petro::lang.all'); ?></span></h5>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="text-center pull-left">
                            <h5 style="font-weight: bold;" class="text-red"><?php echo app('translator')->get('mpcs::lang.21c_form'); ?> <?php echo app('translator')->get('mpcs::lang.form_no'); ?> : <?php echo e($F21c_from_no, false); ?></h5>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 20px;">
                    <div class="table-responsive">
                        <table class="table table-responsive table-bordered 21c_table" style="width: 100%;">
                  
                            <thead>
                                <tr>
                                    <th class="text-center" rowspan="2"><?php echo app('translator')->get('mpcs::lang.description'); ?></th>
                                    <th class="text-center" rowspan="2"><?php echo app('translator')->get('mpcs::lang.no'); ?></th>
                                    <?php $__currentLoopData = $merged_sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $merged): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <!--<th class="text-center" colspan="2"><?php echo e($merged->merged_sub_category_name, false); ?></th>-->
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <th class="text-center"><?php echo app('translator')->get('mpcs::lang.total'); ?></th>
                                </tr>
                                <tr>
                                    <?php $__currentLoopData = $merged_sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $merged): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <!--<th class="text-center"><?php echo app('translator')->get('mpcs::lang.balance_qty'); ?></th>
                                    <th class="text-center"><?php echo app('translator')->get('mpcs::lang.value'); ?></th>-->
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <th class="text-center"><?php echo app('translator')->get('mpcs::lang.value'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <!-- Brown background color -->
                                    <td colspan="11" class="text-warning bg-warning bg-gradient"><b><?php echo app('translator')->get('mpcs::lang.receipts'); ?></b></td>
                                </tr>
                                <tr>
                                    <td><b><?php echo app('translator')->get('mpcs::lang._today'); ?></b></td>
                                    <td></td>
                                    <td>
                                        <input type="text" name="" id="_today" class="form-control total_today_receipt" style="width: 100%;">
                                    </td>
                                <tr>
                                <tr>
                                    <td><b><?php echo app('translator')->get('mpcs::lang._previous_day'); ?></b></td>
                                    <td></td>
                                    <td>
                                        <input type="text" name="" id="_previous_day" class="form-control total_today_receipt" style="width: 100%;">
                                    </td>
                                <tr>
                                <tr>
                                    <td><b><?php echo app('translator')->get('mpcs::lang._total_receipts'); ?></b></td>
                                    <td></td>
                                    <td>
                                        <input type="text" name="" id="_total_receipts" class="form-control total_today_receipt" style="width: 100%;">
                                    </td>
                                <tr>
                                <tr>
                                    <td><b><?php echo app('translator')->get('mpcs::lang._opening_stock'); ?></b></td>
                                    <td></td>
                                    <td>
                                        <input type="text" name="" id="_opening_stock" class="form-control total_today_receipt" style="width: 100%;">
                                    </td>
                                <tr>
                                <tr>
                                    <td><b><?php echo app('translator')->get('mpcs::lang._price_increment_today'); ?></b></td>
                                    <td></td>
                                    <td>
                                        <input type="text" name="" id="_price_increment_today" class="form-control total_today_receipt" style="width: 100%;">
                                    </td>
                                <tr>
                                <tr>
                                    <td><b><?php echo app('translator')->get('mpcs::lang._price_increment_pre_date'); ?></b></td>
                                    <td></td>
                                    <td>
                                        <input type="text" name="" id="_price_increment_pre_date" class="form-control total_today_receipt" style="width: 100%;">
                                    </td>
                                <tr>
                                <tr>
                                    <td><b><?php echo app('translator')->get('mpcs::lang._price_increment_total'); ?></b></td>
                                    <td></td>
                                    <td>
                                        <input type="text" name="" id="_price_increment_total" class="form-control total_today_receipt" style="width: 100%;">
                                    </td>
                                <tr>
                                <tr>
                                    <td><b><?php echo app('translator')->get('mpcs::lang._total_receipt_to_date'); ?></b></td>
                                    <td></td>
                                    <td>
                                        <input type="text" name="" id="_total_receipt_to_date" class="form-control total_today_receipt" style="width: 100%;">
                                    </td>
                                <tr>
                                    <tr>
                                    <!-- Brown background color -->
                                    <td colspan="11" class="text-warning bg-warning bg-gradient"><b><?php echo app('translator')->get('mpcs::lang._issues_section'); ?></b></td>
                                </tr>
                                <tr>
                                    <td><b><?php echo app('translator')->get('mpcs::lang._cash_sales_today'); ?></b></td>
                                    <td></td>
                                    <td>
                                        <input type="text" name="" id="_cash_sales_today" class="form-control total_today_receipt" style="width: 100%;">
                                    </td>
                                <tr>
                                    <tr>
                                    <td><b><?php echo app('translator')->get('mpcs::lang._credit_sales_today'); ?></b></td>
                                    <td></td>
                                    <td>
                                        <input type="text" name="" id="_credit_sales_today" class="form-control total_today_receipt" style="width: 100%;">
                                    </td>
                                <tr>
                                <tr>
                                    <tr>
                                    <td><b><?php echo app('translator')->get('mpcs::lang._own_usage_sales_today'); ?></b></td>
                                    <td></td>
                                    <td>
                                        <input type="text" name="" id="_own_usage_sales_today" class="form-control total_today_receipt" style="width: 100%;">
                                    </td>
                                <tr>
                                <tr>
                                    <tr>
                                    <td><b><?php echo app('translator')->get('mpcs::lang._price_reduction_today'); ?></b></td>
                                    <td></td>
                                    <td>
                                        <input type="text" name="" id="_price_reduction_today" class="form-control total_today_receipt" style="width: 100%;">
                                    </td>
                                <tr>
                                <tr>
                                    <tr>
                                    <td><b><?php echo app('translator')->get('mpcs::lang._price_reduction_predate'); ?></b></td>
                                    <td></td>
                                    <td>
                                        <input type="text" name="" id="_price_reduction_predate" class="form-control total_today_receipt" style="width: 100%;">
                                    </td>
                                <tr>
                                <tr>
                                    <tr>
                                    <td><b><?php echo app('translator')->get('mpcs::lang._price_reduction_total'); ?></b></td>
                                    <td></td>
                                    <td>
                                        <input type="text" name="" id="_price_reduction_total" class="form-control total_today_receipt" style="width: 100%;">
                                    </td>
                                <tr>
                                <tr>
                                    <tr>
                                    <td><b><?php echo app('translator')->get('mpcs::lang._total_issued_today'); ?></b></td>
                                    <td></td>
                                    <td>
                                        <input type="text" name="" id="_total_issued_today" class="form-control total_today_receipt" style="width: 100%;">
                                    </td>
                                <tr>
                                <!--<tr>
                                    <td><b><?php echo app('translator')->get('mpcs::lang.today'); ?></b></td>
                                    <td></td>
                                    <?php $__currentLoopData = $merged_sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $merged): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                                    <td>
                                        <input type="text" name="" id="today_receipt_qty" class="form-control" style="width: 80%;">
                                    </td>
                                    <td>
                                        <input type="text" name="" id="today_receipt_value" class="form-control" style="width: 80%;">
                                    </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <input type="text" name="" class="form-control total_today_receipt" style="width: 80%;">
                                    </td>
                                <tr>
                                <tr>
                                    <td><b><?php echo app('translator')->get('mpcs::lang.previous_day'); ?></b></td>
                                    <td></td>
                                    <?php $__currentLoopData = $merged_sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $merged): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <input type="text" name="" id="total_previous_1" class="form-control" style="width: 80%;">
                                    </td>
                                    <td>
                                        <input type="text" name="" id="total_previous_2" class="form-control" style="width: 80%;">
                                    </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <input type="text" name=""  class="form-control total_today_receipt" style="width: 80%;">
                                    </td>
                                <tr>
                                <tr>
                                    <td><b><?php echo app('translator')->get('mpcs::lang.total_receipts'); ?></b></td>
                                    <td></td>
                                    <?php $__currentLoopData = $merged_sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $merged): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <input type="text" name="" id="total_qty" class="form-control" style="width: 80%;">
                                    </td>
                                    <td>
                                        <input type="text" name="" id="total_value" class="form-control" style="width: 80%;">
                                    </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <input type="text" name="" class="form-control total_today_receipt" style="width: 80%;">
                                    </td>
                                <tr>
                                    <td><b><?php echo app('translator')->get('mpcs::lang.opening_stock'); ?></b></td>
                                    <td></td>
                                    <?php $__currentLoopData = $sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $merged): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <td>
                                        <input type="text" name="" id="open_stock_qty" class="form-control" style="width: 80%;">
                                    </td>
                                    <td>
                                        <input type="text" name=""  id="open_stock_value" class="form-control" style="width: 80%;">
                                    </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <input type="text" name="" class="form-control total_today_receipt" style="width: 80%;">
                                    </td>
                                </tr>
                                <tr>
                                    <td><b><?php echo app('translator')->get('mpcs::lang.price_increment_today'); ?></b></td>
                                    <td></td>
                                    <?php $__currentLoopData = $merged_sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $merged): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <input type="text" name="" id="price_increment_qty" class="form-control" style="width: 80%;">
                                    </td>
                                    <td>
                                        <input type="text" name="" id="price_increment_value" class="form-control" style="width: 80%;">
                                    </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <input type="text" name="" class="form-control" style="width: 80%;">
                                    </td>
                                </tr>
                                <tr>
                                    <td><b><?php echo app('translator')->get('mpcs::lang.price_increment_pre_date'); ?></b></td>
                                    <td></td>
                                    <?php $__currentLoopData = $merged_sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $merged): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <input type="text" name="" id="price_increment_pre_qty" class="form-control" style="width: 80%;">
                                    </td>
                                    <td>
                                        <input type="text" name="" id="price_increment_pre_value" class="form-control" style="width: 80%;">
                                    </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <input type="text" name="" class="form-control" style="width: 80%;">
                                    </td>
                                </tr>
                                <tr>
                                    <td><b><?php echo app('translator')->get('mpcs::lang.price_increment_total'); ?></b></td>
                                    <td></td>
                                    <?php $__currentLoopData = $merged_sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $merged): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <input type="text" name="" id="price_increment_total_qty" class="form-control" style="width: 80%;">
                                    </td>
                                    <td>
                                        <input type="text" name="" id="price_increment_total_value" class="form-control" style="width: 80%;">
                                    </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <input type="text" name="" class="form-control" style="width: 80%;">
                                    </td>
                                </tr>
                                <tr>
                                    <td><b><?php echo app('translator')->get('mpcs::lang.total_receipts_to_date'); ?></b></td>
                                    <td></td>
                                    <?php $__currentLoopData = $merged_sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $merged): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <input type="text" name="" id="total_receipt_to_date_qty" class="form-control" style="width: 80%;">
                                    </td>
                                    <td>
                                        <input type="text" name="" id="total_receipt_to_date_value" class="form-control" style="width: 80%;">
                                    </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <input type="text" name="" class="form-control" style="width: 80%;">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="11" class="text-red"><b><?php echo app('translator')->get('mpcs::lang.issues'); ?></b></td>
                                </tr>
                                <tr>
                                    <td><b><?php echo app('translator')->get('mpcs::lang.cash_today'); ?></b></td>
                                    <td></td>
                                    <?php $__currentLoopData = $merged_sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $merged): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <input type="text" name="" id="cash_today_qty" class="form-control" style="width: 80%;">
                                    </td>
                                    <td>
                                        <input type="text" name="" id="cash_today_value" class="form-control" style="width: 80%;">
                                    </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <input type="text" name="" class="form-control" style="width: 80%;">
                                    </td>
                                </tr>
                                <tr>
                                    <td><b><?php echo app('translator')->get('mpcs::lang.credit_today'); ?></b></td>
                                    <td></td>
                                    <?php $__currentLoopData = $merged_sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $merged): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <input type="text" name="" id="credit_today_qty" class="form-control" style="width: 80%;">
                                    </td>
                                    <td>
                                        <input type="text" name="" id="credit_today_value" class="form-control" style="width: 80%;">
                                    </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <input type="text" name="" class="form-control" style="width: 80%;">
                                    </td>
                                </tr>
                                <tr>
                                    <td><b><?php echo app('translator')->get('mpcs::lang.own_usage_today'); ?></b></td>
                                    <td></td>
                                    <?php $__currentLoopData = $merged_sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $merged): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <input type="text" name="" id="own_today_qty" class="form-control" style="width: 80%;">
                                    </td>
                                    <td>
                                        <input type="text" name="" id="own_today_value" class="form-control" style="width: 80%;">
                                    </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <input type="text" name="" class="form-control" style="width: 80%;">
                                    </td>
                                </tr>
                                <tr>
                                    <td><b><?php echo app('translator')->get('mpcs::lang.total_today'); ?></b></td>
                                    <td></td>
                                    <?php $__currentLoopData = $merged_sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $merged): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <input type="text" name="" id="total_today_qty" class="form-control" style="width: 80%;">
                                    </td>
                                    <td>
                                        <input type="text" name="" id="total_today_value" class="form-control" style="width: 80%;">
                                    </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <input type="text" name="" class="form-control" style="width: 80%;">
                                    </td>
                                </tr>
                                <tr>
                                    <td><b><?php echo app('translator')->get('mpcs::lang.previous_day'); ?></b></td>
                                    <td></td>
                                    <?php $__currentLoopData = $merged_sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $merged): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   
                                    <td>
                                        <input type="text" name="" class="form-control" style="width: 80%;">
                                    </td>
                                    <td>
                                        <input type="text" name="" class="form-control" style="width: 80%;">
                                    </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <input type="text" name="" id="total_previous_value"  class="form-control" style="width: 100%;">
                                    </td>
                                </tr>
                                <tr>
                                    <td><b><?php echo app('translator')->get('mpcs::lang.total_1'); ?></b></td>
                                    <td></td>
                                    <?php $__currentLoopData = $merged_sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $merged): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <input type="text" name="" id="total_1_qty" class="form-control" style="width: 80%;">
                                    </td>
                                    <td>
                                        <input type="text" name="" id="total_1_value" class="form-control" style="width: 80%;">
                                    </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <input type="text" name="" class="form-control" style="width: 80%;">
                                    </td>
                                </tr>
                                <tr>
                                    <td><b><?php echo app('translator')->get('mpcs::lang.price_reduction_today'); ?></b></td>
                                    <td></td>
                                    <?php $__currentLoopData = $merged_sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $merged): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <input type="text" name="" id="price_reduction_today_qty" class="form-control" style="width: 80%;">
                                    </td>
                                    <td>
                                        <input type="text" name="" id="price_reduction_today_value" class="form-control" style="width: 80%;">
                                    </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <input type="text" name="" class="form-control" style="width: 80%;">
                                    </td>
                                </tr>
                                <tr>
                                    <td><b><?php echo app('translator')->get('mpcs::lang.price_reduction_pre_day'); ?></b></td>
                                    <td></td>
                                    <?php $__currentLoopData = $merged_sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $merged): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <input type="text" name="" id="price_reduction_pre_day_qty" class="form-control" style="width: 80%;">
                                    </td>
                                    <td>
                                        <input type="text" name="" id="price_reduction_pre_day_value" class="form-control" style="width: 80%;">
                                    </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <input type="text" name="" class="form-control" style="width: 80%;">
                                    </td>
                                </tr>
                                <tr>
                                    <td><b><?php echo app('translator')->get('mpcs::lang.total_2'); ?></b></td>
                                    <td></td>
                                    <?php $__currentLoopData = $merged_sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $merged): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <input type="text" name="" id="total_2_qty" class="form-control" style="width: 80%;">
                                    </td>
                                    <td>
                                        <input type="text" name="" id="total_2_value" class="form-control" style="width: 80%;">
                                    </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <input type="text" name="" class="form-control" style="width: 80%;">
                                    </td>
                                </tr>
                                <tr>
                                    <td><b><?php echo app('translator')->get('mpcs::lang.total_as_of_today'); ?></b></td>
                                    <td></td>
                                    <?php $__currentLoopData = $merged_sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $merged): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <input type="text" name="" id="total_as_of_today" class="form-control" style="width: 80%;">
                                    </td>
                                    <td>
                                        <input type="text" name="" id="total_as_of_today_value" class="form-control" style="width: 80%;">
                                    </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <input type="text" name="" class="form-control" style="width: 80%;">
                                    </td>
                                </tr>
                                <tr>
                                    <td><b><?php echo app('translator')->get('mpcs::lang.final_balance'); ?></b></td>
                                    <td></td>
                                    <?php $__currentLoopData = $merged_sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $merged): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <input type="text" name="" id="final_balance_qty" class="form-control" style="width: 80%;">
                                    </td>
                                    <td>
                                        <input type="text" name="" id="final_balance_value" class="form-control" style="width: 80%;">
                                    </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <input type="text" name="" class="form-control" style="width: 80%;">
                                    </td>
                                </tr>
                                <tr>
                                    <td><b><?php echo app('translator')->get('mpcs::lang.total_receipts_todate'); ?></b></td>
                                    <td></td>
                                    <?php $__currentLoopData = $merged_sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $merged): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <input type="text" name="" id="total_receipts_todate_qty" class="form-control" style="width: 80%;">
                                    </td>
                                    <td>
                                        <input type="text" name="" id="total_receipts_todate_value" class="form-control" style="width: 80%;">
                                    </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <input type="text" name="" class="form-control" style="width: 80%;">
                                    </td>
                                </tr>-->
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="checkbox">
                            <label>
                                <?php echo Form::checkbox('finalize', 1, false, ['class' => 'input-icheck', 'id' => 'finalize']); ?>

                                <?php echo app('translator')->get('mpcs::lang.f21c_acknowledge'); ?>
                            </label>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <p><?php echo app('translator')->get('mpcs::lang.checked_by'); ?>____________</p>  <br>
                            <p><?php echo app('translator')->get('mpcs::lang.date'); ?>____________</p> 
                        </div>
                        <div class="col-md-6 text-right">
                            <p><?php echo app('translator')->get('mpcs::lang.manage_signature'); ?>____________</p>  <br>
                            <p><?php echo app('translator')->get('mpcs::lang.date'); ?>____________</p> 
                        </div>
                    </div>
                </div>
            </div>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
<?php if(empty($is_ajax)): ?>
    </section>
    <!-- /.content -->
<?php endif; ?>
<script>
     function printDiv() {
		var w = window.open('', '_self');
		var html ='<html><body class="col-print-12">'  +document.getElementById("print_content").innerHTML + '</body></html>'  ;
		$(w.document.body).html(html);
		w.print();
		w.close();
		window.location.href = "<?php echo e(URL::to('/'), false); ?>/mpcs/F21";
	}
</script><?php /**PATH /home/vimi31/public_html/Modules/MPCS/Providers/../Resources/views/forms/partials/21c_form.blade.php ENDPATH**/ ?>