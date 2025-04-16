<?php if($cheque_lists->count() > 0): ?>
<?php
$currency_precision = !empty($business_details->currency_precision) ? $business_details->currency_precision : 2;
?>
<?php $__currentLoopData = $cheque_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td>
            <?php echo Form::checkbox('select_cheques[]', $item->id, false, ['class' => 'input-icheck select_cheques']); ?>

        </td>
        <td>
            <?php echo e($item->customer_name, false); ?>

        </td>
        <td>
            <?php echo Form::date('paid_on_' . $item->id, \Carbon\Carbon::parse($item->paid_on)->format('Y-m-d'), ['class' => 'form-control', 'placeholder' => __('account.realize_date' ) ]); ?>

        </td>
        <td>
            <?php echo e($item->cheque_number, false); ?>

        </td>
        <td>
            <?php if(!empty($item->cheque_date) && $item->cheque_date != '0000-00-00'): ?>
            <?php echo e(\Carbon::createFromTimestamp(strtotime($item->cheque_date))->format(session('business.date_format')), false); ?>

            <?php endif; ?>
        </td>
        <td>
        <?php
    $bankName = DB::table('cheque_deposit_bank')
        ->join('accounts', 'cheque_deposit_bank.bank_id', '=', 'accounts.id')
        ->where('cheque_deposit_bank.account_trans_id', $item->account_trans_id ?? '')
        ->select('accounts.name')
        ->first();
?>

<?php echo e($bankName->name ?? '', false); ?>

        </td>
        <td class="one_cheque_amount" data-string="<?php echo e($item->amount, false); ?>">
            <?php echo e(number_format($item->amount,$currency_precision), false); ?>

        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
<tr>
    <td colspan="5" class="text-center">
        <p><?php echo app('translator')->get('account.no_item_found'); ?></p>
    </td>

</tr>
<?php endif; ?>

<script>
    $('.select_cheques').change(function() {
        var $tr = $(this).closest('tr');
        var cheque_value = parseFloat($tr.find('.one_cheque_amount').data('string'));
        var cheque_id = $(this).val();
        var $pmt = $(this).closest('.payment-row');
        var $pmtAmt = $pmt.find('.payment-amount');
        
        
        totalChequeValue = 0;
        $('.select_cheques:checked').each(function() {
            var $tr = $(this).closest('tr');
            var cheque_value = parseFloat($tr.find('.one_cheque_amount').data('string'));
        
            totalChequeValue += cheque_value; // Sum up the cheque_value
          });
          $pmtAmt.val(totalChequeValue)
        
    });
         
</script><?php /**PATH /home/vimi31/public_html/resources/views/account/partials/realized_cheque_list.blade.php ENDPATH**/ ?>