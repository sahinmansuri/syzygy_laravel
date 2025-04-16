<!-- Main content -->
<section class="content">
    
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
            <?php if(empty($only_pumper)): ?>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('payment_summary_location_id', __('purchase.business_location') . ':'); ?>

                    <?php echo Form::select('payment_summary_location_id', $business_locations, null, ['class' => 'form-control
                    select2',
                    'placeholder' => __('petro::lang.all'), 'id' => 'payment_summary_location_id', 'style' => 'width:100%']); ?>

                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('payment_summary_pump_operators', __('petro::lang.pump_operator') . ':'); ?>

                    <?php echo Form::select('payment_summary_pump_operators', $pump_operators, null, ['class' => 'form-control
                    select2', 'placeholder'
                    => __('petro::lang.all'), 'id' => 'payment_summary_pump_operators', 'style' => 'width:100%']); ?>

                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('payment_summary_payment_method', __('petro::lang.payment_method') . ':'); ?>

                    <?php echo Form::select('payment_summary_payment_method', $payment_types, null, ['class' => 'form-control
                    select2',
                    'placeholder'
                    => __('petro::lang.all'), 'id' => 'payment_summary_payment_method', 'style' => 'width:100%']); ?>

                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('payment_summary_date_range', __('report.date_range') . ':'); ?>

                    <?php echo Form::text('payment_summary_date_range', \Carbon::createFromTimestamp(strtotime('first day of this month'))->format(session('business.date_format')) . ' ~ ' .
                    \Carbon::createFromTimestamp(strtotime('last day of this month'))->format(session('business.date_format')) , ['placeholder' => __('lang_v1.select_a_date_range'),
                    'class' =>
                    'form-control', 'id' => 'payment_summary_date_range', 'readonly']); ?>

                </div>
            </div>
            <?php endif; ?>
            
            <div class="<?php if(empty($only_pumper)): ?> col-md-3 <?php else: ?> col-md-6 <?php endif; ?> px-4" >
                <div class="form-group">
                    <?php echo Form::label('shift_id',  __('petro::lang.shift') . ':'); ?>

                    <select class="form-control select2" style = 'width:100%' id="payment_summary_shift_id">
                        <?php if(empty($only_pumper)): ?>
                            <option value=""><?php echo app('translator')->get('lang_v1.all'); ?></option>
                        <?php endif; ?>
                        
                        <?php $__currentLoopData = $shifts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shift): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($shift->id, false); ?>"><?php echo e($shift->name." (".\Carbon::createFromTimestamp(strtotime($shift->shift_date))->format(session('business.date_format')), false); ?> to <?php echo e(!empty($shift->closed_time) ? \Carbon::createFromTimestamp(strtotime($shift->closed_time))->format(session('business.date_format') . ' ' . 'H:i') : 'Open', false); ?> )</option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
                            
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
    

    <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' =>
    __('petro::lang.all_your_payments')]); ?>
    <div class="table-responsive">
        <table class="table table-bordered table-striped" id="pump_operators_payment_summary_table"
            style="width: 100%;">
            <thead>
                <tr>
                    <th><?php echo app('translator')->get('petro::lang.action'); ?></th>
                    <th><?php echo app('translator')->get('petro::lang.date'); ?></th>
                    <th><?php echo app('translator')->get('petro::lang.location'); ?></th>
                    <th><?php echo app('translator')->get('petro::lang.time'); ?></th>
                    <th><?php echo app('translator')->get('petro::lang.pump_operator'); ?></th>
                    <th><?php echo app('translator')->get('petro::lang.shift_number'); ?></th>
                    <th><?php echo app('translator')->get('petro::lang.collection_form_no'); ?></th>
                    <th><?php echo app('translator')->get('petro::lang.payment_type'); ?></th>
                    <th><?php echo app('translator')->get('petro::lang.amount'); ?></th>
                    <?php if(empty($only_pumper)): ?>
                    <th><?php echo app('translator')->get('petro::lang.note'); ?></th>
                    <th><?php echo app('translator')->get('petro::lang.edited_by'); ?></th>
                    <?php endif; ?>
                </tr>
            </thead>

            <tfoot>
                <tr class="bg-gray font-17 footer-total">
                    <td colspan="<?php if(empty($only_pumper)): ?> 5 <?php else: ?> 4 <?php endif; ?>" class="text-right" style="color:brown">
                        <strong><?php echo app('translator')->get('sale.total'); ?>:</strong></td>
                    <td style="color:brown"><span class="display_currency" id="footer_payment_summary_amount"
                            data-currency_symbol="true"></span>
                    <?php if(empty($only_pumper)): ?>
                    <td></td>
                    <td></td>
                    <?php endif; ?>
                </tr>
            </tfoot>
        </table>
    </div>
    <?php echo $__env->renderComponent(); ?>

</section>
<!-- /.content --><?php /**PATH /home/vimi31/public_html/Modules/Petro/Providers/../Resources/views/pump_operators/partials/payment_summary.blade.php ENDPATH**/ ?>