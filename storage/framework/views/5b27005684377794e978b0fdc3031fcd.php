
<div class="payment_details_div <?php if( $payment_line['method'] !== 'card' ): ?> <?php echo e('hide', false); ?> <?php endif; ?>" data-type="card" >

	
	<div class="col-md-4">
		<div class="form-group">			
			<?php echo Form::label("card_transaction_number_$row_index",__('lang_v1.card_transaction_no')); ?>


			<?php if(isset($view_page) || isset($edit_page)): ?>
				<?php echo Form::text("payment[$row_index][card_transaction_number]",$data[0]->t_card_transaction_number ?? null, ['class' => 'form-control', 'placeholder' => __('lang_v1.card_transaction_no'), 'id' => "card_transaction_number_$row_index", !empty($edit) ? 'disabled' : '',isset($view_page) ? "disabled" : '']); ?>

			<?php else: ?>
				<?php echo Form::text("payment[$row_index][card_transaction_number]",$payment_line['card_transaction_number'] ?? null, ['class' => 'form-control', 'placeholder' => __('lang_v1.card_transaction_no'), 'id' => "card_transaction_number_$row_index", !empty($edit) ? 'disabled' : '']); ?>

			<?php endif; ?>
		</div>
	</div>
</div>

<div class="payment_details_div cheque_payment_details  <?php if( $payment_line['method'] !== 'cheque' ): ?> <?php echo e('hide', false); ?> <?php endif; ?>" data-type="cheque">
	<?php if(!empty($payment->cheque_date) && !empty($payment->method) && ($payment->method == 'bank_transfer' || $payment->method == 'cheque')): ?>
	<input type="hidden" name="payment_edit_cheque" id="payment_edit_cheque" value="<?php echo e(\Carbon::createFromTimestamp(strtotime($payment->cheque_date))->format(session('business.date_format')), false); ?>" , <?php if(!empty($edit)): ?> <?php echo e('disabled', false); ?> <?php endif; ?> > <!-- used for set cheque date to current date if empty in app.js line 1533 -->
	<?php endif; ?>
	
	<div class="col-md-3">
    		<div class="form-group">
    			<?php echo Form::label("bank_name_$row_index",__('lang_v1.bank_name')); ?>

    			<?php if(isset($view_page) || isset($edit_page)): ?>
    				<?php echo Form::text("payment[$row_index][bank_name]",!empty($data[0]->t_bank_name)?$data[0]->t_bank_name: '', ['class' => 'form-control bank_name', 'placeholder' => __('lang_v1.bank_name'),isset($view_page) ? "disabled" : '']); ?>

    			<?php else: ?>
					<?php echo Form::text("payment[$row_index][bank_name]",!empty($payment->bank_name)?$payment->bank_name: '', ['class' => 'form-control bank_name', 'placeholder' => __('lang_v1.bank_name')]); ?>

    			<?php endif; ?>
    		</div>
    	</div>
	
</div>

<div class="payment_details_div <?php if( $payment_line['method'] !== 'custom_pay_1' ): ?> <?php echo e('hide', false); ?> <?php endif; ?>" data-type="custom_pay_1" >
	<div class="col-md-12">
		<div class="form-group">
			<?php echo Form::label("transaction_no_1_$row_index", __('lang_v1.transaction_no')); ?>

			<?php echo Form::text("payment[$row_index][transaction_no_1]",!empty($payment->transaction_no_1)?$payment->transaction_no_1: $payment_line['transaction_no'] ?? null, ['class' => 'form-control', 'placeholder' => __('lang_v1.transaction_no'), 'id' => "transaction_no_1_$row_index", !empty($edit) ? 'disabled' : '']); ?>

		</div>
	</div>
</div>
<div class="payment_details_div <?php if( $payment_line['method'] !== 'custom_pay_2' ): ?> <?php echo e('hide', false); ?> <?php endif; ?>" data-type="custom_pay_2" >
	<div class="col-md-12">
		<div class="form-group">
			<?php echo Form::label("transaction_no_2_$row_index", __('lang_v1.transaction_no')); ?>

			<?php echo Form::text("payment[$row_index][transaction_no_2]", !empty($payment->transaction_no_2)?$payment->transaction_no_2:$payment_line['transaction_no'] ?? null, ['class' => 'form-control', 'placeholder' => __('lang_v1.transaction_no'), 'id' => "transaction_no_2_$row_index", !empty($edit) ? 'disabled' : '']); ?>

		</div>
	</div>
</div>
<div class="payment_details_div <?php if( $payment_line['method'] !== 'custom_pay_3' ): ?> <?php echo e('hide', false); ?> <?php endif; ?>" data-type="custom_pay_3" >
	<div class="col-md-12">
		<div class="form-group">
			<?php echo Form::label("transaction_no_3_$row_index", __('lang_v1.transaction_no')); ?>

			<?php echo Form::text("payment[$row_index][transaction_no_3]", !empty($payment->transaction_no_3)?$payment->transaction_no_3:$payment_line['transaction_no'] ?? null, ['class' => 'form-control', 'placeholder' => __('lang_v1.transaction_no'), 'id' => "transaction_no_3_$row_index", !empty($edit) ? 'disabled' : '']); ?>

		</div>
	</div>
</div>

<script>
       
</script>
<?php /**PATH /home/vimi31/public_html/resources/views/sale_pos/partials/payment_type_details.blade.php ENDPATH**/ ?>