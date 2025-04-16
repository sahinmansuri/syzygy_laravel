<?php echo Form::open(['url' => action('\Modules\Petro\Http\Controllers\PumpOperatorPaymentController@saveChequePayment'), 'method' =>'post']); ?>

<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('customer_id', __('petro::lang.customer').':'); ?>

                    <?php echo Form::select('customer_id', $customers, null, ['class' => 'form-control select2',
                    'style' => 'width: 100%;', 'required' ]); ?>

                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('cheque_bank', __('petro::lang.bank').':'); ?>

                    <?php echo Form::select('cheque_bank', $bank_accounts, null, ['class' => 'form-control select2',
                    'style' => 'width: 100%;', 'required' ]); ?>

                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('cheque_number', __( 'petro::lang.cheque_number' ) ); ?>

                    <?php echo Form::text('cheque_number', null, ['class' => 'form-control cheque_number',
                    'placeholder' => __(
                    'petro::lang.cheque_number' ) , 'required' ]); ?>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('cheque_date', __( 'petro::lang.cheque_date' ) ); ?>

                    <?php echo Form::date('cheque_date', null, ['class' => 'form-control
                    cheque_date', 'placeholder' => __('petro::lang.cheque_date' ), 'required' ]); ?>

                </div>
            </div>
            
             <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('amount', __( 'petro::lang.amount' ) ); ?>

                    <?php echo Form::text('amount', null, ['class' => 'form-control amount',
                    'placeholder' => __(
                    'petro::lang.amount' ) , 'required' ]); ?>

                </div>
            </div>

            <?php
                $collection_form_no = "";
            ?>
            <?php if(session('status')): ?>
                <?php
                    $output = session('status');
                    if($output['success']){
                        $collection_form_no = $output['collection_form_no'] ?? "";
                    }
                ?>
            <?php endif; ?>
            <input type="hidden" class="collection_form_no" name="collection_form_no" value="<?php echo e($collection_form_no, false); ?>">
            
        </div>
    </div>
</div>

<div class="row">
     <div class="col-md-2 pull-right">
       <button type="submit" class="btn btn-danger pull-right other_sale_finalize"
            style="margin-top: 23px;"><?php echo app('translator')->get('petro::lang.finalize'); ?></button>
    </div>
</div>
<?php echo Form::close(); ?>

<?php /**PATH /home/vimi31/public_html/Modules/Petro/Providers/../Resources/views/pump_operators/cheque_payment.blade.php ENDPATH**/ ?>