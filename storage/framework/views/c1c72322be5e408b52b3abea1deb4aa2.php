<!-- Main content -->
<section class="content">
    
        <div class="col-md-12">
            <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
            <div class="row">
                <div class="col-md-3 old_p_date_range ">
                    <div class="form-group">
                        <?php echo Form::label('old_post_dated_cheque_date_range', __('lang_v1.date_range').':'); ?>

                        <?php echo Form::text('old_post_dated_cheque_date_range', null, ['class' => 'form-control ', 'style' => 'width: 100%;']); ?>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('old_post_dated_cheque_type', __('lang_v1.cheque_type').'* :'); ?>

                        <?php echo Form::select('old_post_dated_cheque_type', ['customer_cheques' => "Customer Cheques",'company_old_post_dated_cheques' => 'Company Post dated Cheques'],null, ['class' => 'form-control  select2', 'style' => 'width: 100%;','placeholder' => __('lang_v1.all')]); ?>


                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('old_post_party_type', __('lang_v1.related_party_type').'* :'); ?>

                        <?php echo Form::select('old_post_party_type', ['customer' => __('contact.customer'),'supplier' => __('lang_v1.supplier'),'others' => __('account.others'),'expense_payments' => __('account.expense_payments')],null, ['class' => 'form-control  select2', 'style' => 'width: 100%;','placeholder' => __('lang_v1.all')]); ?>

        
                    </div>
                </div>
        
                <div class="col-md-3 old_p_customer_id ">
                    <div class="form-group">
                        <?php echo Form::label('old_post_dated_cheque_customer_id', __('lang_v1.related_party').'* :'); ?>

                        <?php echo Form::select('old_post_dated_cheque_customer_id', $customers, null, ['class' => 'form-control
                        select2', 'style' => 'width: 100%;', 'placeholder' => __('lang_v1.all')]); ?>

                    </div>
                </div>
                
            </div>     
            <div class="row">
                
                <div class="col-md-3 old_p_cheque_method ">
                    <div class="form-group">
                        <?php echo Form::label('old_post_dated_cheque_bank', __('lang_v1.bank').':'); ?>

                        <?php echo Form::select('old_post_dated_cheque_bank', $banks, null, ['class' => 'form-control
                        select2', 'style' => 'width: 100%;', 'placeholder' => __('lang_v1.all')]); ?>

                    </div>
                </div>

                <div class="col-md-3 old_p_cheque_amount ">
                    <div class="form-group">
                    <?php echo Form::label('old_post_dated_cheque_amount', __('lang_v1.amount').':'); ?>

                    <?php echo Form::select('old_post_dated_cheque_amount', [], null, ['class' => 'form-control
                    select2', 'style' => 'width: 100%;', 'placeholder' => __('lang_v1.all')]); ?>

                    </div>
                </div>

                <div class="col-md-3 old_p_cheque_no ">
                    <div class="form-group">
                    <?php echo Form::label('old_post_dated_cheque_no', __('lang_v1.cheque_no').':'); ?>

                    <?php echo Form::select('old_post_dated_cheque_no', [], null, ['class' => 'form-control
                    select2', 'style' => 'width: 100%;', 'placeholder' => __('lang_v1.all')]); ?>

                    </div>
                </div>
            </div>
            <?php echo $__env->renderComponent(); ?>
        </div>
    
    <br>
    <br>
    <div class="row">
        <div class="col-md-12 old_p_cheque_table ">
            <?php $__env->startComponent('components.widget', ['class' => 'box-primary']); ?>
                <table class="table table-bordered table-striped" id="old_post_dated_cheque_table" style="width: 100%;">
                    <thead>
                    <tr>
                        <th class="notexport"><?php echo app('translator')->get('messages.action'); ?></th>
                        <th><?php echo app('translator')->get('lang_v1.date' ); ?></th>
                        <th><?php echo app('translator')->get('lang_v1.payment_ref_no' ); ?></th>
                        <th><?php echo app('translator')->get('lang_v1.related_party_type' ); ?></th>
                        <th><?php echo app('translator')->get('lang_v1.related_party' ); ?></th>
                        <th><?php echo app('translator')->get('lang_v1.amount' ); ?></th>
                        <th><?php echo app('translator')->get('lang_v1.bank' ); ?></th>
                        <th><?php echo app('translator')->get('lang_v1.cheque_no' ); ?></th>
                        <th><?php echo app('translator')->get('lang_v1.note' ); ?></th>
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
<?php /**PATH /home/vimi31/public_html/resources/views/postdated_cheques/old_postdated_cheques.blade.php ENDPATH**/ ?>