<div class="payment_details_div <?php if( $payment_line->method !== 'card' ): ?> <?php echo e('hide', false); ?> <?php endif; ?>" data-type="card" >
	<div class="col-md-4">
		<div class="form-group">
			<?php echo Form::label("card_number", __('lang_v1.card_no')); ?>

			<?php echo Form::text("card_number", $payment_line->card_number, ['class' => 'form-control', 'placeholder' => __('lang_v1.card_no')]); ?>

		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<?php echo Form::label("card_holder_name", __('lang_v1.card_holder_name')); ?>

			<?php echo Form::text("card_holder_name", $payment_line->card_holder_name, ['class' => 'form-control', 'placeholder' => __('lang_v1.card_holder_name')]); ?>

		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<?php echo Form::label("card_transaction_number",__('lang_v1.card_transaction_no')); ?>

			<?php echo Form::text("card_transaction_number", $payment_line->card_transaction_number, ['class' => 'form-control', 'placeholder' => __('lang_v1.card_transaction_no')]); ?>

		</div>
	</div>
	<div class="clearfix"></div>
	<div class="col-md-3">
		<div class="form-group">
			<?php echo Form::label("card_type", __('lang_v1.card_type')); ?>

			<?php echo Form::select("card_type", ['credit' => 'Credit Card', 'debit' => 'Debit Card', 'visa' => 'Visa', 'master' => 'MasterCard'], $payment_line->card_type,['class' => 'form-control select2']); ?>

		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<?php echo Form::label("card_month", __('lang_v1.month')); ?>

			<select class="form-control" id="card_month" name="card_month">
			<?php for ($i=1; $i<=12; $i+=1) { ?>
				<option value="<?php echo e($i, false); ?>" <?php if($payment_line->card_month == $i): ?><?php echo e("selected", false); ?> <?php endif; ?> ><?php echo e($i, false); ?></option>
			<?php } ?>
			</select>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<?php echo Form::label("card_year", __('lang_v1.year')); ?>

			<select class="form-control" id="card_year" name="card_year">
			<?php for ($i=date('y'); $i<=date('y')+20; $i+=1) { ?>
				<option value="<?php echo e($i, false); ?>" <?php if($payment_line->card_year == $i): ?><?php echo e("selected", false); ?> <?php endif; ?> ><?php echo e($i, false); ?></option>
			<?php } ?>
			</select>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<?php echo Form::label("card_security",__('lang_v1.security_code')); ?>

			<?php echo Form::text("card_security", $payment_line->card_security, ['class' => 'form-control', 'placeholder' => __('lang_v1.security_code')]); ?>

		</div>
	</div>
	<div class="clearfix"></div>
</div>
<div class="payment_details_div <?php if( strtolower($payment_line->method) !== 'cheque' && strtolower($payment_line->method) !== 'bank_transfer' && strtolower($payment_line->method) !== 'bank'  && strtolower($payment_line->method) !== 'direct_bank_deposit' ): ?> <?php echo e('hide', false); ?> <?php endif; ?> add_payment_bank_details" data-type="cheque" >
	<div class="col-md-6">
		<div class="form-group">
			<?php echo Form::label("cheque_number",__('lang_v1.cheque_no')); ?>

			<?php echo Form::text("cheque_number", $payment_line->cheque_number, ['class' => 'form-control', 'placeholder' => __('lang_v1.cheque_no'),'disabled' => false]); ?>

		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group bankName">
			<?php echo Form::label("bank_name",'Bank Name'); ?>

			<?php echo Form::text("bank_name", $payment_line->bank_name, ['class' => 'form-control', 'placeholder' => 'Bank Name','disabled' => false]); ?>

		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<?php echo Form::label("cheque_date",__('lang_v1.cheque_date')); ?>

			<?php echo Form::text("cheque_date", $payment_line->cheque_date, ['class' => 'form-control cheque_date', 'placeholder' => __('lang_v1.cheque_date'),'disabled' => false]); ?>

		</div>
	</div>
</div>
<div class="payment_details_div <?php if( $payment_line->method !== 'custom_pay_1' ): ?> <?php echo e('hide', false); ?> <?php endif; ?>" data-type="custom_pay_1" >
	<div class="col-md-12">
		<div class="form-group">
			<?php echo Form::label("transaction_no_1", __('lang_v1.transaction_no')); ?>

			<?php echo Form::text("transaction_no_1", $payment_line->transaction_no, ['class' => 'form-control', 'placeholder' => __('lang_v1.transaction_no'),'disabled' => true]); ?>

		</div>
	</div>
</div>
<div class="payment_details_div <?php if( $payment_line->method !== 'custom_pay_2' ): ?> <?php echo e('hide', false); ?> <?php endif; ?>" data-type="custom_pay_2" >
	<div class="col-md-12">
		<div class="form-group">
			<?php echo Form::label("transaction_no_2", __('lang_v1.transaction_no')); ?>

			<?php echo Form::text("transaction_no_2", $payment_line->transaction_no, ['class' => 'form-control', 'placeholder' => __('lang_v1.transaction_no'),'disabled' => true]); ?>

		</div>
	</div>
</div>
<div class="payment_details_div <?php if( $payment_line->method !== 'custom_pay_3' ): ?> <?php echo e('hide', false); ?> <?php endif; ?>" data-type="custom_pay_3" >
	<div class="col-md-12">
		<div class="form-group">
			<?php echo Form::label("transaction_no_3", __('lang_v1.transaction_no')); ?>

			<?php echo Form::text("transaction_no_3", $payment_line->transaction_no, ['class' => 'form-control', 'placeholder' => __('lang_v1.transaction_no'),'disabled' => true]); ?>

		</div>
	</div>
</div><?php /**PATH /home/vimi31/public_html/resources/views/transaction_payment/payment_type_details.blade.php ENDPATH**/ ?>