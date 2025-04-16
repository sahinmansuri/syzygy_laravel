<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('customer_payment_date_range', __('lang_v1.date_range').':'); ?>

                        <?php echo Form::text('customer_payment_date_range', null, ['class' => 'form-control ','id'=>'customer_interest_date_range', 'style' => 'width: 100%;']); ?>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('customer_payment_init_id', __('lang_v1.customer').':'); ?>

                        <?php echo Form::select('customer_payment_init_id', $customers, null, ['class' => 'form-control
                        select2', 'style' => 'width: 100%;', 'placeholder' => __('lang_v1.all')]); ?>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('customer_payment_location_id', __('lang_v1.location').':'); ?>

                        <?php echo Form::select('customer_payment_location_id', $business_locations, null, ['class' => 'form-control
                        select2', 'style' => 'width: 100%;', 'placeholder' => __('lang_v1.all')]); ?>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('customer_payment_method', __('lang_v1.payment_method').':'); ?>

                        <?php echo Form::select('customer_payment_method', $payment_types, null, ['class' => 'form-control
                        select2', 'style' => 'width: 100%;', 'placeholder' => __('lang_v1.all')]); ?>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('paid_in_type', __('lang_v1.paid_in_type').':'); ?>

                        <?php echo Form::select('paid_in_type', ['customer_bulk' => "Customer Bulk Page",'customer_page' => 'Customer Page', 'all_sale_page' => 'All Sale Page', 'settlement' => 'Settlement'], 'customer_bulk', ['class' => 'form-control select2', 'style' => 'width: 100%;', 'placeholder' => __('lang_v1.all')]); ?>


                    </div>
                </div>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.widget', ['class' => 'box-primary']); ?>
                <table class="table table-bordered table-striped" id="customer_interest_table" style="width: 100%;">
                    <thead>
                    <tr>
                        <th class="notexport"><?php echo app('translator')->get('messages.action'); ?></th>
                        <th><?php echo app('translator')->get('lang_v1.date' ); ?></th>
                        <th><?php echo app('translator')->get('lang_v1.location' ); ?></th>
                        <th><?php echo app('translator')->get('lang_v1.customer' ); ?></th>
                        <th><?php echo app('translator')->get('lang_v1.interest' ); ?></th>
                        <th><?php echo app('translator')->get('lang_v1.amount' ); ?></th>
                        <th><?php echo app('translator')->get('lang_v1.payment_method' ); ?></th>
                        <th><?php echo app('translator')->get('lang_v1.paid_in_type' ); ?></th>
                       <th><?php echo app('translator')->get('contact.user'); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
</section>
<!-- /.content -->
<?php /**PATH /home/vimi31/public_html/resources/views/customer_payments/customer_interest.blade.php ENDPATH**/ ?>