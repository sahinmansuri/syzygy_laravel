<script src="<?php echo e(asset('plugins/mousetrap/mousetrap.min.js?v=' . $asset_v), false); ?>"></script>
<?php
$business_id = request()->session()->get('user.business_id');
$subscription = Modules\Superadmin\Entities\Subscription::active_subscription($business_id);
$enable_duplicate_invoice = 0;
if (!empty($subscription)) {
$package = DB::table('packages')->where('id', $subscription->package_id)->select('enable_duplicate_invoice')->first();
$enable_duplicate_invoice = $package->enable_duplicate_invoice;

}
?>
<script type="text/javascript">
	$(document).ready( function() {
		//shortcut for express checkout
		<?php if(!empty($shortcuts["pos"]["express_checkout"]) && ($pos_settings['disable_express_checkout'] == 0)): ?>
			Mousetrap.bind('<?php echo e($shortcuts["pos"]["express_checkout"], false); ?>', function(e) {
				e.preventDefault();
				$('button.pos-express-finalize[data-pay_method="cash"]').trigger('click');
			});
		<?php endif; ?>

		//shortcut for cancel checkout
		<?php if(!empty($shortcuts["pos"]["cancel"])): ?>
			Mousetrap.bind('<?php echo e($shortcuts["pos"]["cancel"], false); ?>', function(e) {
				e.preventDefault();
				$('#pos-cancel').trigger('click');
			});
		<?php endif; ?>

		//shortcut for draft checkout
		<?php if(!empty($shortcuts["pos"]["draft"]) && ($pos_settings['disable_draft'] == 0)): ?>
			Mousetrap.bind('<?php echo e($shortcuts["pos"]["draft"], false); ?>', function(e) {
				e.preventDefault();
				$('#pos-draft').trigger('click');
			});
		<?php endif; ?>


		//shortcut for duplicate_invoice
		<?php if($enable_duplicate_invoice ): ?>
		<?php if(!empty($shortcuts["pos"]["duplicate_invoice"]) && ($pos_settings['disable_duplicate_invoice'] == 0)): ?>
			Mousetrap.bind('<?php echo e($shortcuts["pos"]["duplicate_invoice"], false); ?>', function(e) {
				e.preventDefault();
				if(parseInt($('#is_duplicate').val()) == 1){
					$('#is_duplicate').val('0');
				}else{
					$('#is_duplicate').val('1');
				}
				$('#is_duplicate').trigger('change');
			});
		<?php endif; ?>
		<?php endif; ?>

		//shortcut for draft pay & checkout
		<?php if(!empty($shortcuts["pos"]["pay_n_ckeckout"]) && ($pos_settings['disable_pay_checkout'] == 0)): ?>
			Mousetrap.bind('<?php echo e($shortcuts["pos"]["pay_n_ckeckout"], false); ?>', function(e) {
				e.preventDefault();
				$('#pos-finalize').trigger('click');
			});
		<?php endif; ?>

		//shortcut for edit discount
		<?php if(!empty($shortcuts["pos"]["edit_discount"]) && ($pos_settings['disable_discount'] == 0)): ?>
			Mousetrap.bind('<?php echo e($shortcuts["pos"]["edit_discount"], false); ?>', function(e) {
				e.preventDefault();
				$('#pos-edit-discount').trigger('click');
			});
		<?php endif; ?>

		//shortcut for edit tax
		<?php if(!empty($shortcuts["pos"]["edit_order_tax"]) && ($pos_settings['disable_order_tax'] == 0)): ?>
			Mousetrap.bind('<?php echo e($shortcuts["pos"]["edit_order_tax"], false); ?>', function(e) {
				e.preventDefault();
				$('#pos-edit-tax').trigger('click');
			});
		<?php endif; ?>

		//shortcut for add payment row
		<?php if(!empty($shortcuts["pos"]["add_payment_row"]) && ($pos_settings['disable_pay_checkout'] == 0)): ?>
			var payment_modal = document.querySelector('#modal_payment');
			Mousetrap.bind('<?php echo e($shortcuts["pos"]["add_payment_row"], false); ?>', function(e, combo) {
				if($('#modal_payment').is(':visible')){
					e.preventDefault();
					$('#add-payment-row').trigger('click');
				}
			});
		<?php endif; ?>

		//shortcut for add finalize payment
		<?php if(!empty($shortcuts["pos"]["finalize_payment"]) && ($pos_settings['disable_pay_checkout'] == 0)): ?>
			var payment_modal = document.querySelector('#modal_payment');
			Mousetrap(payment_modal).bind('<?php echo e($shortcuts["pos"]["finalize_payment"], false); ?>', function(e, combo) {
				if($('#modal_payment').is(':visible')){
					e.preventDefault();
					$('#pos-save').trigger('click');
				}
			});
		<?php endif; ?>

		//Shortcuts to go recent product quantity
		<?php if(!empty($shortcuts["pos"]["recent_product_quantity"])): ?>
			shortcut_length_prev = 0;
			shortcut_position_now = null;

			Mousetrap.bind('<?php echo e($shortcuts["pos"]["recent_product_quantity"], false); ?>', function(e, combo) {
				var length_now = $('table#pos_table tr').length;

				if(length_now != shortcut_length_prev){
					shortcut_length_prev = length_now;
					shortcut_position_now = length_now;
				} else {
					shortcut_position_now = shortcut_position_now - 1;
				}

				var last_qty_field = $('table#pos_table tr').eq(shortcut_position_now - 1).contents().find('input.pos_quantity');
				if(last_qty_field.length >=1){
					last_qty_field.focus().select();
				} else {
					shortcut_position_now = length_now + 1;
					Mousetrap.trigger('<?php echo e($shortcuts["pos"]["recent_product_quantity"], false); ?>');
				}
			});

			//On focus of quantity field go back to search when stop typing
			var timeout = null;
			$('table#pos_table').on('focus', 'input.pos_quantity', function () {
			    var that = this;

			    $(this).on('keyup', function(e){

			    	if (timeout !== null) {
			        	clearTimeout(timeout);
			    	}

			    	var code = e.keyCode || e.which;
			    	if (code != '9') {
    					timeout = setTimeout(function () {
			        		$('input#search_product').focus().select();
			    		}, 5000);
    				}
			    });
			});
		<?php endif; ?>

		//shortcut to go to add new products
		<?php if(!empty($shortcuts["pos"]["add_new_product"])): ?>
			Mousetrap.bind('<?php echo e($shortcuts["pos"]["add_new_product"], false); ?>', function(e) {
				$('input#search_product').focus().select();
			});
		<?php endif; ?>
	});
</script><?php /**PATH /home/vimi31/public_html/resources/views/sale_pos/partials/keyboard_shortcuts.blade.php ENDPATH**/ ?>