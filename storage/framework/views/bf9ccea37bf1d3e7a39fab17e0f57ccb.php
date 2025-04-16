<section class="content">
    
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
                <?php if(empty($only_pumper)): ?>
                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo Form::label('meters_with_payments_pump_operators', __('petro::lang.pump_operator') . ':'); ?>

                            <?php echo Form::select('meters_with_payments_pump_operators', $pump_operators, null, ['class' => 'form-control
                            select2', 'placeholder'
                            => __('petro::lang.all'), 'id' => 'meters_with_payments_pump_operators', 'style' => 'width:100%']); ?>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo Form::label('meters_with_payments_pump_no', __('petro::lang.pumps') . ':'); ?>

                            <?php echo Form::select('meters_with_payments_pump_no', $pumps->pluck('pump_name', 'id'), null, ['class' => 'form-control
                            select2',
                            'placeholder'
                            => __('petro::lang.all'), 'id' => 'meters_with_payments_pump_no', 'style' => 'width:100%']); ?>

                        </div>
                    </div>
                <?php endif; ?>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('meters_with_payments_date_range', __('report.date_range') . ':'); ?>

                        <?php echo Form::text('meters_with_payments_date_range', \Carbon::createFromTimestamp(strtotime('first day of this month'))->format(session('business.date_format')) . ' ~ ' .
                        \Carbon::createFromTimestamp(strtotime('last day of this month'))->format(session('business.date_format')) , ['placeholder' => __('lang_v1.select_a_date_range'),
                        'class' =>
                        'form-control', 'id' => 'meters_with_payments_date_range', 'readonly']); ?>

                    </div>
                </div>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
    
    <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __('petro::lang.all_your_meters_with_payments')]); ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="pump_operators_meters_with_payments_table" style="width: 100%;">
                <thead>
                    <tr>
                        <th><?php echo app('translator')->get('petro::lang.date'); ?></th>
                        <th><?php echo app('translator')->get('petro::lang.time'); ?></th>
                        <th><?php echo app('translator')->get('petro::lang.pump_operator'); ?></th>
                        <th><?php echo app('translator')->get('petro::lang.collection_form_no'); ?></th>
                        <th>Pumps</th>
                        <th>Unit Price</th>
                        <th>Last Meter</th>
                        <th>New Meter</th>
                        <th>Qty Sold</th>
                        <th>Total Sold Amount</th>
                        <th><?php echo app('translator')->get('petro::lang.payment_type'); ?></th>
                        <th>Total Payment Entered</th>
                    </tr>
                </thead>
            </table>
        </div>
    <?php echo $__env->renderComponent(); ?>

</section><?php /**PATH /home/vimi31/public_html/Modules/Petro/Providers/../Resources/views/pump_operators/partials/meters_with_payments.blade.php ENDPATH**/ ?>