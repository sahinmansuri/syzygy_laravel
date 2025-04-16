<?php echo e($xxamount =  0, false); ?>

<?php if(!empty($sells) && $sells->count() > 0): ?>
    <?php $__currentLoopData = $sells; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sell): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($sell->type == 'opening_balance'): ?>
            <?php echo e($opblance =  (float) str_replace(',', '', number_format($sell->final_total,  2, session('currency')['decimal_separator'], session('currency')['thousand_separator'])), false); ?>

            <?php if($opblance < 0 ): ?>
                <?php echo e($xxamount =  $opblance, false); ?>

            <?php endif; ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<tr class="d-none">
    <td colspan="4"></td>
    <td><?php echo app('translator')->get('lang_v1.excess_amount'); ?></td>
    <td class="interest_selection_checkbox hide"></td>
    <td>
        <div class="row">
            <div class="col-md-1">
                <?php echo Form::checkbox('pay_all', 1, false, ['class' => 'input-icheck pay_all','style' => 'margin-top: 10px;transform: scale(2)']); ?>

            </div>
            <div class="col-md-4">
                <?php echo Form::number('excess_amount', abs($xxamount) , ['class' => 'form-control', 'id' => 'excess_amount', 'step'=>'0.01', 'style' => 'width: 150px !important']); ?>

            </div>
        </div>
    </td>
</tr>

<?php if(!empty($sells) && $sells->count() > 0): ?>
    <?php $__currentLoopData = $sells; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sell): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <?php
            $outstandingRow = 0;
            if($sell->cheque_number != null){
                $outstandingRow = abs($sell->final_total + $sell->cheque_return_charges - $sell->total_paid);
                //if($sell->type == "cheque_return"){
                   // $outstandingRow = abs($sell->final_total);
                //}else{
                    //$outstandingRow = abs($sell->final_total + $sell->cheque_return_charges - $sell->total_paid);
                //}
                
            }else{
                $outstandingRow = abs($sell->final_total - $sell->total_paid);
            }
        ?>

    <?php echo e($sell->type, false); ?>

    
    <?php if($sell->type == 'opening_balance'): ?>
        <?php if($xxamount >= 0 and $outstandingRow >= 1): ?>
        <!-- Show the row only if there is outstanding amount is greater than 0-->
            <tr>
                <td><?php echo e(\Carbon::createFromTimestamp(strtotime($sell->transaction_date))->format(session('business.date_format')), false); ?></td>
                <td><?php echo e($sell->invoice_no, false); ?></td>
                <td><?php echo e($sell->type == 'opening_balance' ?
                    'Opening Balance' : $sell->order_no, false); ?>

                </td>
                <td><?php echo e(number_format(abs($sell->final_total),  2, session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?></td>
                <td><?php echo e(number_format(abs($outstandingRow),  2, session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?>

                    <?php echo Form::hidden('outstanding['.$sell->transaction_id.']', $outstandingRow, ['id' => 'outstanding_amount_'.$sell->transaction_id, 'class' => 'form-control outstanding_'.$sell->transaction_id , 'data-id' => $sell->transaction_id ]); ?>

                </td>
                <td class="interest_selection_checkbox hide">
                    <div class="row">
                        <div class="col-md-6 ">
                            <?php echo Form::number('interest['.$sell->transaction_id.']', null, ['id' => 'interest_amount_'.$sell->transaction_id , 'class' => 'form-control interest_column_total interest_selection_checkbox hide interest_'.$sell->transaction_id ,'step'=>'0.01', 'data-id' => $sell->transaction_id ]); ?>

                        </div>
                    </div>
                </td>
                <td>
                    <div class="row">
                        <div class="col-md-1">
                            <?php echo Form::checkbox('paying['.$sell->transaction_id.']', 1, false, ['class' => 'input-icheck paying_checkbox paying_'.$sell->transaction_id, 'data-id' => $sell->transaction_id ,'style' => 'margin-top: 10px;transform: scale(2)']); ?>

                        </div>
                        <div class="col-md-4">
                            <?php echo Form::number('amount['.$sell->transaction_id.']', null, ['id' => 'total_amount_'.$sell->transaction_id, 'class' => 'form-control amount_column_total amount_selection_box amount_'.$sell->transaction_id ,'step'=>'any', 'data-id' => $sell->transaction_id, 'style' => 'width: 150px !important' ]); ?>

                        </div>
                    </div>
                </td>
            </tr>
        <?php endif; ?>
    <?php elseif($outstandingRow >= 1): ?>
         <!-- Show the row only if there is outstanding amount is greater than 0-->
            <tr>
                <?php if($sell->type == "cheque_return"): ?>
                    <?php if(!empty($sell->cheque_date)): ?>
                        <td><?php echo e(\Carbon::createFromTimestamp(strtotime($sell->cheque_date))->format(session('business.date_format')), false); ?></td>
                    <?php else: ?>
                        <td><?php echo e(\Carbon::createFromTimestamp(strtotime($sell->transaction_date))->format(session('business.date_format')), false); ?></td>
                    <?php endif; ?>
                    
                <?php else: ?>
                    <td><?php echo e(\Carbon::createFromTimestamp(strtotime($sell->transaction_date))->format(session('business.date_format')), false); ?></td>
                <?php endif; ?>
            
            <td><?php echo e($sell->invoice_no, false); ?></td>
            <td>
                <?php if($sell->is_return and $sell->cheque_number != null): ?>
                <p>
                    <span class="text-danger">
                        Return Cheque Number:
                    </span>
                    <span class="font-weight-bold">
                        <?php echo e($sell->cheque_number, false); ?>

                    </span>
                </p>
                <p>
                    <span class="text-danger">
                        Bank Name:
                    </span>
                    <span class="font-weight-bold">
                        <?php echo e($sell->bank_name, false); ?>

                    </span>
                </p>
                <?php else: ?>
                <?php echo e($sell->order_no, false); ?>

                <?php endif; ?>
            </td>
            <td>
                <?php if($sell->is_return and $sell->cheque_number != null): ?>
                <p>
                    <span class="text-danger">
                        Cheque Return Amount:
                    </span>
                    <span class="font-weight-bold">
                        <?php echo e(number_format(abs($sell->final_total),  2, session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?>

                    </span>
                </p>
                <p>
                    <span class="text-danger">
                        Cheque Return Charge:
                    </span>
                    <span class="font-weight-bold">
                        <?php echo e(number_format(abs($sell->cheque_return_charges ),  2, session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?>

                    </span>

                </p>
                <?php else: ?>
                    <?php echo e(number_format(abs($sell->final_total),  2, session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?>

                <?php endif; ?>
            </td>
            <td>
                <?php echo e(number_format(abs($outstandingRow),  2, session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?>

                <?php echo Form::hidden('outstanding['.$sell->transaction_id.']',$sell->cheque_number != null ? abs($outstandingRow) : abs($outstandingRow), ['id' => 'outstanding_amount_'.$sell->transaction_id, 'class' => 'form-control outstanding_'.$sell->transaction_id , 'data-id' => $sell->transaction_id ]); ?>

            </td>
            <td class="interest_selection_checkbox hide">
                <div class="row">
                    <div class="col-md-6 ">
                        <?php echo Form::number('interest['.$sell->transaction_id.']', null, ['id' => 'interest_amount_'.$sell->transaction_id ,'step'=>'0.01', 'class' => 'form-control interest_column_total interest_selection_checkbox hide interest_'.$sell->transaction_id , 'data-id' => $sell->transaction_id ]); ?>

                    </div>
                </div>
            </td>
            <td>
                <div class="row">
                    <div class="col-md-1">
                        <?php echo Form::checkbox('paying['.$sell->transaction_id.']', 1, false, ['class' => 'input-icheck paying_checkbox paying_'.$sell->transaction_id, 'data-id' => $sell->transaction_id ,'style' => 'margin-top: 10px;transform: scale(2)']); ?>

                    </div>
                    <div class="col-md-4">
                        <?php echo Form::number('amount['.$sell->transaction_id.']', null, ['id' => 'total_amount_'.$sell->transaction_id, 'class' => 'form-control amount_column_total amount_selection_box amount_'.$sell->transaction_id ,'step'=>'any', 'data-id' => $sell->transaction_id, 'style' => 'width: 150px !important' ]); ?>

                    </div>
                </div>
            </td>
        </tr>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <tr class="text-center">
        <td colspan="6"><?php echo app('translator')->get('lang_v1.no_data_available_in_table'); ?></td>
    </tr>
<?php endif; ?>
<?php /**PATH /home/vimi31/public_html/resources/views/customer_payments/partials/bulk_payment_table.blade.php ENDPATH**/ ?>