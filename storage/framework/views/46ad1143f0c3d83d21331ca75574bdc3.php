<a href="<?php echo e(action('TransactionPaymentController@show', [$id ?? 0]), false); ?>" class="view_payment_modal payment-status-label" data-orig-value="<?php echo e((!empty($payment_status)) ? $payment_status : 'Paid', false); ?>" data-status-name="<?php echo e((!empty($payment_status)) ? __('lang_v1.' . $payment_status) : 'Paid', false); ?>"><span class="label <?php echo e((!empty($payment_status)) ? '' : 'bg-light-green', false); ?> <?php if($payment_status == 'partial'){
                echo 'bg-aqua';
            }elseif($payment_status == 'due'){
                echo 'bg-yellow';
            }elseif ($payment_status == 'paid') {
                echo 'bg-light-green';
            }elseif ($payment_status == 'overdue') {
                echo 'bg-red';
            }elseif ($payment_status == 'partial-overdue') {
                echo 'bg-red';
            }elseif ($payment_status == 'pending') {
                echo 'bg-info';
            }elseif ($payment_status == 'over-payment') {
                echo 'bg-light-green';
            }elseif ($payment_status == 'price-later') {
                echo 'bg-orange';
            }?>"><?php echo e((!empty($payment_status)) ? __('lang_v1.' . $payment_status) : 'Paid', false); ?></span></a>
<?php if(isset($credit_transaction_ids) && count($credit_transaction_ids) > 0): ?>
    <br>
    <a href="<?php echo e(action('TransactionPaymentController@show_credit_sales'), false); ?>?show_shortage=1&credit_transaction_ids=<?php echo e(implode(',', ($credit_transaction_ids ?? [])), false); ?>" class="view_payment_modal payment-status-label" data-orig-value="due" data-status-name="<?php echo e(__('lang_v1.due'), false); ?>"><span class="label <?php if("due" == 'partial'){
                echo 'bg-aqua';
            }elseif("due" == 'due'){
                echo 'bg-yellow';
            }elseif ("due" == 'paid') {
                echo 'bg-light-green';
            }elseif ("due" == 'overdue') {
                echo 'bg-red';
            }elseif ("due" == 'partial-overdue') {
                echo 'bg-red';
            }elseif ("due" == 'pending') {
                echo 'bg-info';
            }elseif ("due" == 'over-payment') {
                echo 'bg-light-green';
            }elseif ("due" == 'price-later') {
                echo 'bg-orange';
            }?>">Credit Sales</span></a>
<?php endif; ?><?php /**PATH /home/vimi31/public_html/resources/views/sell/partials/payment_status.blade.php ENDPATH**/ ?>