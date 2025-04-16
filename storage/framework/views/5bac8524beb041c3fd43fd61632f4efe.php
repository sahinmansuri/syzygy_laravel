<div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('date_range_filter', __('report.date_range') . ':'); ?>

                    <?php echo Form::text('date_range_filter', \Carbon::createFromTimestamp(strtotime('first day of this month'))->format(session('business.date_format')) . ' ~ ' .
                    \Carbon::createFromTimestamp(strtotime('last
                    day of this month'))->format(session('business.date_format')) , ['placeholder' => __('lang_v1.select_a_date_range'), 'class' =>
                    'form-control date_range', 'id' => 'date_range_filter', 'readonly']); ?>

                </div>
            </div>
            


            
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __(
            'sms::lang.all_sms')]); ?>
            <?php $__env->slot('tool'); ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sms.create')): ?>
            <div class="box-tools">
                <button type="button" class="btn btn-primary btn-modal pull-right" id="add_sms_btn"
                    data-href="<?php echo e(action('\Modules\SMS\Http\Controllers\SMSController@create'), false); ?>"
                    data-container=".sms_model">
                    <i class="fa fa-plus"></i> <?php echo app('translator')->get( 'sms::lang.add' ); ?></button>
            </div>
            <?php endif; ?>
            <?php $__env->endSlot(); ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="sms_table" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get( 'sms::lang.action' ); ?></th>
                                    <th><?php echo app('translator')->get( 'sms::lang.date_and_time' ); ?></th>
                                    <th><?php echo app('translator')->get( 'sms::lang.message_id' ); ?></th>
                                    <th><?php echo app('translator')->get( 'sms::lang.message_count' ); ?></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div><?php /**PATH /home/vimi31/public_html/Modules/SMS/Providers/../Resources/views/list_sms/list_sms.blade.php ENDPATH**/ ?>