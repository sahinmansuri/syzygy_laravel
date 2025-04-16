<!-- Main content -->
<section class="content">
    <div class="row">
        <?php echo Form::open(['url' => '/interest-settings', 'method' => 'post', 'id' => 'interest_settings_form' ]); ?>

        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('date', __( 'lang_v1.date' ) ); ?>

                <?php echo Form::text('date', null, ['class' => 'form-control transaction_date', 'required', 'id' => 'transaction_date', 'readonly',
                'style' => 'width: 100%;', 'placeholder' => __('petro::lang.transaction_date' ) ]); ?>

            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('contact_group_id', __('lang_v1.customer_group').':'); ?>

                <?php echo Form::select('contact_group_id', $customer_groups, null, ['class' => 'form-control select2', 'style' => 'width: 100%;']); ?>

            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('account_id', __('lang_v1.income_account').':'); ?>

                <?php echo Form::select('account_id', $income_accounts, null, ['class' => 'form-control select2', 'style' => 'width: 100%;']); ?>

            </div>
        </div>
        <div class="col-md-1">
            <button type="submit" class="btn btn-primary btn_interest_settings"
                    style="margin-top: 23px;"><?php echo app('translator')->get('messages.save'); ?></button>
        </div>
        <?php echo Form::close(); ?>

    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.widget', ['class' => 'box-primary']); ?>
                <table class="table table-bordered table-striped" id="interest_settings_table" style="width: 100%;">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->get('lang_v1.date' ); ?></th>
                            <th><?php echo app('translator')->get('lang_v1.customer_group' ); ?></th>
                            <th><?php echo app('translator')->get('lang_v1.linked_account' ); ?></th>
                            <th><?php echo app('translator')->get('contact.user'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
</section>
<!-- /.content -->
<?php /**PATH /home/vimi31/public_html/resources/views/customer_payments/interest_settings.blade.php ENDPATH**/ ?>