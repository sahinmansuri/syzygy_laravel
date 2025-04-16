<?php

	$product_name = $product->product_name . '<br />' . $product->sub_sku ;

	if(!empty($product->brand)){ $product_name .= ' ' . $product->brand ;}

?>


<tr class="product_row" data-row_index="<?php echo e($row_count, false); ?>">

	<td>
		<?php if($edit_price || $edit_discount ): ?>

		<div data-toggle="tooltip" data-placement="bottom" title="<?php echo app('translator')->get('lang_v1.pos_edit_product_price_help'); ?>">

			<?php if(isset($price_later) && $price_later == 1): ?>

			<span class="text-info cursor-pointer">

				<?php echo $product_name; ?>


				&nbsp;<i class="fa fa-info-circle"></i>

			</span>

			<?php else: ?>

			<span class="text-link text-info cursor-pointer row_edit_product_price_btn" data-toggle="modal"

				data-target="#row_edit_product_price_modal_<?php echo e($row_count, false); ?>" disabled>

				<?php echo $product_name; ?>


				&nbsp;<i class="fa fa-info-circle"></i>
			</span>

			<?php endif; ?>

		</div>

		<?php else: ?>

		<?php echo $product_name; ?>


		<?php endif; ?>

		<input type="hidden" class="enable_sr_no" value="<?php echo e($product->enable_sr_no, false); ?>">

		<input type="hidden" class="product_type" name="products[<?php echo e($row_count, false); ?>][product_type]"

			value="<?php echo e($product->product_type, false); ?>">

		<div data-toggle="tooltip" data-placement="bottom" title="<?php echo app('translator')->get('lang_v1.add_description'); ?>">

			<i class="fa fa-commenting cursor-pointer text-primary add-pos-row-description" data-toggle="modal"

				data-target="#row_description_modal_<?php echo e($row_count, false); ?>"></i>

		</div>



		<?php

		$hide_tax = 'hide';

		if(session()->get('business.enable_inline_tax') == 1){

		$hide_tax = '';

		}



		$tax_id = $product->tax_id;

		$item_tax = !empty($product->item_tax) ? $product->item_tax : 0;

		$unit_price_inc_tax = $product->sell_price_inc_tax;

		if($hide_tax == 'hide'){

		$tax_id = null;

		$unit_price_inc_tax = $product->default_sell_price;

		}

		?>



		<div class="modal fade row_edit_product_price_model in" id="row_edit_product_price_modal_<?php echo e($row_count, false); ?>"

			tabindex="-1" role="dialog">

			<?php echo $__env->make('sale_pos.partials.row_edit_product_price_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		</div>



		<!-- Description modal start -->

		<?php if($toggle_popup == 0): ?>

		<div class="modal fade row_description_modal in" id="row_description_modal_<?php echo e($row_count, false); ?>" tabindex="-1"

			role="dialog">

			<div class="modal-dialog" role="document">

				<div class="modal-content">

					<div class="modal-header">

						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span

								aria-hidden="true">&times;</span></button>

						<h4 class="modal-title" id="myModalLabel"><?php echo e($product->product_name, false); ?> - <?php echo e($product->sub_sku, false); ?>


						</h4>

					</div>

					<div class="modal-body">

						<div class="form-group">

							<label><?php echo app('translator')->get('lang_v1.description'); ?></label>

							<?php

							$sell_line_note = '';

							if(!empty($product->sell_line_note)){

							$sell_line_note = $product->sell_line_note;

							}

							?>

							<textarea class="form-control" name="products[<?php echo e($row_count, false); ?>][sell_line_note]"

								rows="3"><?php echo e($sell_line_note, false); ?></textarea>

							<p class="help-block"><?php echo app('translator')->get('lang_v1.sell_line_description_help'); ?></p>

						</div>

					</div>

					<div class="modal-footer">

						<button type="button" class="btn btn-default"

							data-dismiss="modal"><?php echo app('translator')->get('messages.close'); ?></button>

					</div>

				</div>

			</div>

		</div>

		<?php endif; ?>

		<!-- Description modal end -->

		<?php if(in_array('modifiers' , $enabled_modules)): ?>

		<div class="modifiers_html">

			<?php if(!empty($product->product_ms)): ?>

			<?php echo $__env->make('restaurant.product_modifier_set.modifier_for_product', array('edit_modifiers' => true, 'row_count'

			=> $loop->index, 'product_ms' => $product->product_ms ) , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

			<?php endif; ?>

		</div>

		<?php endif; ?>



		<?php
		
		if(empty($product->current_stock)){
		    $product->current_stock = $product->qty_available;
		}

		$max_qty_rule = $product->current_stock;
		
		$max_qty_msg = __('validation.custom-messages.quantity_not_available', ['qty'=>

		$product->formatted_qty_available, 'unit' => $product->unit ]);

		?>



		<?php if( session()->get('business.enable_lot_number') == 1 || session()->get('business.enable_product_expiry') == 1): ?>

		<?php

		$lot_enabled = session()->get('business.enable_lot_number');

		$exp_enabled = session()->get('business.enable_product_expiry');

		$lot_no_line_id = '';

		if(!empty($product->lot_no_line_id)){

		$lot_no_line_id = $product->lot_no_line_id;

		}

		?>

		<?php if(!empty($product->lot_numbers)): ?>

		<select class="form-control lot_number input-sm" name="products[<?php echo e($row_count, false); ?>][lot_no_line_id]"

			<?php if(!empty($product->transaction_sell_lines_id)): ?> disabled <?php endif; ?>>

			<option value=""><?php echo app('translator')->get('lang_v1.lot_n_expiry'); ?></option>

			<?php $__currentLoopData = $product->lot_numbers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lot_number): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

			<?php

			$selected = "";

			if($lot_number->purchase_line_id == $lot_no_line_id){

			$selected = "selected";



			$max_qty_rule = $lot_number->qty_available;

			$max_qty_msg = __('lang_v1.quantity_error_msg_in_lot', ['qty'=> $lot_number->qty_formated, 'unit' =>

			$product->unit ]);

			}



			$expiry_text = '';

			if($exp_enabled == 1 && !empty($lot_number->exp_date)){

			if( \Carbon::now()->gt(\Carbon::createFromFormat('Y-m-d', $lot_number->exp_date)) ){

			$expiry_text = '(' . __('report.expired') . ')';

			}

			}



			//preselected lot number if product searched by lot number

			if(!empty($purchase_line_id) && $purchase_line_id == $lot_number->purchase_line_id) {

			$selected = "selected";



			$max_qty_rule = $lot_number->qty_available;

			$max_qty_msg = __('lang_v1.quantity_error_msg_in_lot', ['qty'=> $lot_number->qty_formated, 'unit' =>

			$product->unit ]);

			}

			?>

			<option value="<?php echo e($lot_number->purchase_line_id, false); ?>" data-qty_available="<?php echo e($lot_number->qty_available, false); ?>"

				data-msg-max="<?php echo app('translator')->get('lang_v1.quantity_error_msg_in_lot', ['qty'=> $lot_number->qty_formated, 'unit' => $product->unit  ]); ?>"

				<?php echo e($selected, false); ?>><?php if(!empty($lot_number->lot_number) && $lot_enabled == 1): ?><?php echo e($lot_number->lot_number, false); ?>


				<?php endif; ?> <?php if($lot_enabled == 1 && $exp_enabled == 1): ?> - <?php endif; ?> <?php if($exp_enabled == 1 &&

				!empty($lot_number->exp_date)): ?> <?php echo app('translator')->get('product.exp_date'); ?>: <?php echo e(\Carbon::createFromTimestamp(strtotime($lot_number->exp_date))->format(session('business.date_format')), false); ?> <?php endif; ?>

				<?php echo e($expiry_text, false); ?></option>

			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

		</select>

		<?php endif; ?>

		<?php endif; ?>



	</td>
	<td>

		

		<?php if(!empty($product->transaction_sell_lines_id)): ?>

		<input type="hidden" name="products[<?php echo e($row_count, false); ?>][transaction_sell_lines_id]" class="form-control"

			value="<?php echo e($product->transaction_sell_lines_id, false); ?>">

		<?php endif; ?>



		<input type="hidden" name="products[<?php echo e($row_count, false); ?>][product_id]" class="form-control product_id"

			value="<?php echo e($product->product_id, false); ?>">



		<input type="hidden" value="<?php echo e($product->variation_id, false); ?>" name="products[<?php echo e($row_count, false); ?>][variation_id]"

			class="row_variation_id">



		<input type="hidden" value="<?php echo e($product->enable_stock, false); ?>" name="products[<?php echo e($row_count, false); ?>][enable_stock]">



		<?php if(empty($product->quantity_ordered)): ?>

		<?php

		$product->quantity_ordered = 1;

		?>

		<?php endif; ?>

		<?php if(isset($temp_qty)): ?>

		<?php if(!empty($temp_qty)): ?>

		<?php

		$product->quantity_ordered = $temp_qty;

		?>



		<?php endif; ?>



		<?php endif; ?>



		<?php

		$multiplier = 1;

		$allow_decimal = true;

		if($product->unit_allow_decimal != 1) {

		$allow_decimal = false;

		}

		?>

		<?php $__currentLoopData = $sub_units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

		<?php if(!empty($product->sub_unit_id) && $product->sub_unit_id == $key): ?>

		<?php

		$multiplier = $value['multiplier'];

		$max_qty_rule = $max_qty_rule / $multiplier;

		$unit_name = $value['name'];

		$max_qty_msg = __('validation.custom-messages.quantity_not_available', ['qty'=> $max_qty_rule, 'unit' =>

		$unit_name ]);



		if(!empty($product->lot_no_line_id)){

		$max_qty_msg = __('lang_v1.quantity_error_msg_in_lot', ['qty'=> $max_qty_rule, 'unit' => $unit_name ]);

		}



		if($value['allow_decimal']) {

		$allow_decimal = true;

		}

		?>

		<?php endif; ?>

		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

		<div class="input-group input-number">

			<span class="input-group-btn"><button type="button" class="btn btn-default btn-flat quantity-down"><i

						class="fa fa-minus text-danger"></i></button></span>

			<input type="text" data-min="1" class="form-control pos_quantity input_number mousetrap input_quantity"

				value="<?php echo e(number_format($product->quantity_ordered, 2, session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?>" name="products[<?php echo e($row_count, false); ?>][quantity]"

				data-allow-overselling="<?php if(empty($pos_settings['allow_overselling'])): ?><?php echo e('false', false); ?><?php else: ?><?php echo e('true', false); ?><?php endif; ?>"

				<?php if($allow_decimal): ?> data-decimal=1 <?php else: ?> data-decimal=0 data-rule-abs_digit="true"

				data-msg-abs_digit="<?php echo app('translator')->get('lang_v1.decimal_value_not_allowed'); ?>" <?php endif; ?> data-rule-required="true"

				data-msg-required="<?php echo app('translator')->get('validation.custom-messages.this_field_is_required'); ?>"
			
			
				<?php if($product->enable_stock && empty($pos_settings['allow_overselling']) && empty($is_sales_order) ): ?>
				
				data-rule-max-value="<?php echo e($max_qty_rule, false); ?>" data-qty_available="<?php echo e($product->current_stock, false); ?>" data-msg-max-value="<?php echo e($max_qty_msg, false); ?>" 
				
				data-msg_max_default="<?php echo app('translator')->get('validation.custom-messages.quantity_not_available', ['qty'=> $product->formatted_qty_available, 'unit' => $product->unit  ]); ?>" 
			<?php endif; ?> >

			<span class="input-group-btn"><button type="button" class="btn btn-default btn-flat quantity-up"><i

						class="fa fa-plus text-success"></i></button></span>

		</div>



		<input type="hidden" name="products[<?php echo e($row_count, false); ?>][product_unit_id]" value="<?php echo e($product->unit_id, false); ?>">

		<?php if(count($sub_units) > 0): ?>

		<br>

		<select name="products[<?php echo e($row_count, false); ?>][sub_unit_id]" class="form-control input-sm sub_unit">

			<?php $__currentLoopData = $sub_units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

			<option value="<?php echo e($key, false); ?>" data-multiplier="<?php echo e($value['multiplier'], false); ?>"

				data-unit_price="<?php if(array_key_exists($key,$default_multiple_unit_price)): ?><?php echo e($default_multiple_unit_price[$key], false); ?><?php endif; ?>"

				data-unit_name="<?php echo e($value['name'], false); ?>" data-allow_decimal="<?php echo e($value['allow_decimal'], false); ?>"

				<?php if(!empty($product->sub_unit_id) && $product->sub_unit_id == $key): ?> selected <?php endif; ?>>

				<?php echo e($value['name'], false); ?>


			</option>

			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

		</select>

		<?php else: ?>

		<?php echo e($product->unit, false); ?>


		<?php endif; ?>



		<input type="hidden" class="base_unit_multiplier" name="products[<?php echo e($row_count, false); ?>][base_unit_multiplier]"

			value="<?php echo e($multiplier, false); ?>">



		<input type="hidden" class="hidden_base_unit_sell_price" value="<?php echo e($product->default_sell_price / $multiplier, false); ?>">



		

		<?php if($product->product_type == 'combo'): ?>



		<?php $__currentLoopData = $product->combo_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $combo_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



		<?php if(isset($action) && $action == 'edit'): ?>

		<?php

		$combo_product['qty_required'] = $combo_product['quantity'] / $product->quantity_ordered;



		$qty_total = $combo_product['quantity'];

		?>

		<?php else: ?>

		<?php

		$qty_total = $combo_product['qty_required'];

		?>

		<?php endif; ?>



		<input type="hidden" name="products[<?php echo e($row_count, false); ?>][combo][<?php echo e($k, false); ?>][product_id]"

			value="<?php echo e($combo_product['product_id'], false); ?>">



		<input type="hidden" name="products[<?php echo e($row_count, false); ?>][combo][<?php echo e($k, false); ?>][variation_id]"

			value="<?php echo e($combo_product['variation_id'], false); ?>">



		<input type="hidden" class="combo_product_qty" name="products[<?php echo e($row_count, false); ?>][combo][<?php echo e($k, false); ?>][quantity]"

			data-unit_quantity="<?php echo e($combo_product['qty_required'], false); ?>" value="<?php echo e($qty_total, false); ?>">



		<?php if(isset($action) && $action == 'edit'): ?>

		<input type="hidden" name="products[<?php echo e($row_count, false); ?>][combo][<?php echo e($k, false); ?>][transaction_sell_lines_id]"

			value="<?php echo e($combo_product['id'], false); ?>">

		<?php endif; ?>



		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

		<?php endif; ?>

	</td>
	
	<?php if(!empty($pos_settings['inline_service_staff'])): ?>
	<td>

		<div class="form-group">

			<div class="input-group">

				<?php echo Form::select("products[" . $row_count . "][res_service_staff_id]", $waiters,

				!empty($product->res_service_staff_id) ? $product->res_service_staff_id : null, ['class' =>

				'form-control select2 order_line_service_staff', 'placeholder' => __('restaurant.select_service_staff'),

				'required' => (!empty($pos_settings['is_service_staff_required']) &&

				$pos_settings['is_service_staff_required'] == 1) ? true : false ]); ?>


			</div>

		</div>

	</td>
	<?php endif; ?>

	<td class="<?php echo e($hide_tax, false); ?>">

		<input type="text" name="products[<?php echo e($row_count, false); ?>][unit_price_inc_tax]"

			class="form-control pos_unit_price_inc_tax input_number" value="<?php echo e(number_format($unit_price_inc_tax,  2, session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?>"

		 readonly  <?php if(!empty($pos_settings['enable_msp'])): ?>

			data-rule-min-value="<?php echo e($unit_price_inc_tax, false); ?>"

			data-msg-min-value="<?php echo e(__('lang_v1.minimum_selling_price_error_msg', ['price' => number_format($unit_price_inc_tax,  2, session('currency')['decimal_separator'], session('currency')['thousand_separator'])]), false); ?>"

			<?php endif; ?>>
			
			<input type="hidden" name="products[<?php echo e($row_count, false); ?>][discount_value]" class="form-control pos_discount_value input_number" value="0">
			<input type="hidden" name="products[<?php echo e($row_count, false); ?>][original_pos_unit_price_inc_tax]" class="form-control original_pos_unit_price_inc_tax input_number" value="<?php echo e(number_format($unit_price_inc_tax,  2, session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?>">
			

	</td>



	<?php if(isset($is_sales_page) && $is_sales_page == '1'): ?>

	<td>

		<input type="text" name="products[<?php echo e($row_count, false); ?>][default_sell_price]" <?php if(isset($price_later) && $price_later=='1' ): ?> disabled <?php endif; ?>

			class="products_default_sell_price_<?php echo e($row_count, false); ?> default_sell_price form-control input_number mousetrap"

			value="<?php echo e(number_format(!empty($product->default_sell_price) ? $product->default_sell_price : $product->default_purchase_price,  2, session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?>">

	</td>

	<td>

		<?php echo Form::select("products[$row_count][line_discount_type]", ['fixed' => __('lang_v1.fixed'), 'percentage' =>

		__('lang_v1.percentage')], 'fixed', ['class' => 'form-control row_discount_type', 'disabled' => isset($price_later) && $price_later ==

		1 ? true : false]); ?>


	</td>

	<td>

		<?php echo Form::text("products[$row_count][line_discount_amount]", 0, ['class' => 'form-control input_number

		row_discount_amount', 'disabled' => isset($price_later) && $price_later == 1 ? true : false]); ?>


	</td>

	<?php endif; ?>



	<td class="price_later_td  <?php if(isset($price_later) && $price_later != 1): ?> hide <?php endif; ?>">

		<input type="text" name="products[<?php echo e($row_count, false); ?>][last_purchased_price]"

			class="products_last_purchased_price_<?php echo e($row_count, false); ?> last_purchased_price form-control input_number mousetrap"
			<?php if(empty($pos_settings['is_pos_subtotal_editable'])): ?> readonly <?php endif; ?>
			value="<?php echo e(number_format(!empty($product->last_purchased_price) ? $product->last_purchased_price : $product->dpp_inc_tax,  2, session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?>">

	</td>



	<?php

	$enable_line_discount = !empty($pos_settings['enable_line_discount'])? 1: 0;

	?>

	<?php if($enable_line_discount): ?>

	<?php if(isset($is_sales_page) && $is_sales_page != '1'): ?>

	<td class="text-center">

		<input type="text" name="products[<?php echo e($row_count, false); ?>][line_discount_val]" class="form-control line_discount_val"

			value="">

		<input type="hidden" name="products[<?php echo e($row_count, false); ?>][line_discount]" class="form-control pos_line_discount"

			value="">

		<div class="clearfix"></div>

		<?php if($product->weight_excess_loss_applicable): ?>

		<?php echo Form::label('weight_loss', __('lang_v1.weight_loss')); ?>


		<?php echo Form::text('products['.$row_count.'][weight_loss]', !empty($product->weight_loss) ?

		number_format($product->weight_loss,  2, session('currency')['decimal_separator'], session('currency')['thousand_separator']) : null,

		['class' => 'form-control', 'id'=>'weight_loss']); ?>


		<?php endif; ?>

	</td>

	<?php endif; ?>

	<?php else: ?>
	
	<?php if($product->weight_excess_loss_applicable): ?>

	<td>

		<?php echo Form::label('weight_loss', __('lang_v1.weight_loss')); ?>


		<?php echo Form::text('products['.$row_count.'][weight_loss]', !empty($product->weight_loss) ?

		number_format($product->weight_loss,  2, session('currency')['decimal_separator'], session('currency')['thousand_separator']) : null,

		['class' => 'form-control', 'id'=>'weight_loss']); ?>


	</td>
	
	<?php endif; ?>

	<?php endif; ?>



	<?php if(isset($is_sales_page) && $is_sales_page == '1'): ?>

	<td>

		<input type="text" name="products[<?php echo e($row_count, false); ?>][tax]" <?php if(isset($price_later) && $price_later=='1' ): ?> disabled <?php endif; ?>

			class="products_tax_<?php echo e($row_count, false); ?> tax form-control input_number mousetrap"

			value="<?php echo e(number_format(!empty($product->tax) ? $product->tax : 0,  2, session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?>">

	</td>

	<td>

		<input type="text" name="products[<?php echo e($row_count, false); ?>][sell_price_inc_tax]" <?php if(isset($price_later) && $price_later=='1' ): ?> disabled <?php endif; ?>

			class="products_sell_price_inc_tax_<?php echo e($row_count, false); ?> sell_price_inc_tax form-control input_number mousetrap"

			value="<?php echo e(number_format(!empty($product->sell_price_inc_tax) ? $product->sell_price_inc_tax : $product->default_purchase_price,  2, session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?>">

	</td>

	<?php endif; ?>

    
    <!--sub total-->

	<td class="text-center v-center">

		<?php

		$subtotal_type = !empty($pos_settings['is_pos_subtotal_editable']) ? 'text' : 'hidden';

		?>

		<input type="<?php echo e($subtotal_type, false); ?>"

			class="form-control pos_line_total <?php if(!empty($pos_settings['is_pos_subtotal_editable'])): ?> input_number <?php endif; ?>"

			value="<?php echo e(number_format($product->quantity_ordered*$unit_price_inc_tax,  2, session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?>">

		<span

			class="display_currency pos_line_total_text <?php if(!empty($pos_settings['is_pos_subtotal_editable'])): ?> hide <?php endif; ?>"

			data-currency_symbol="true"><?php echo e($product->quantity_ordered*$unit_price_inc_tax, false); ?></span>



		<div class="clearfix"></div>

		<?php if($product->weight_excess_loss_applicable): ?>

		<?php echo Form::label('weight_excess', __('lang_v1.weight_excess'), ['style' => 'padding-top: 14px;'] ); ?>


		<?php echo Form::text('products['.$row_count.'][weight_excess]', !empty($product->weight_excess) ?

		number_format($product->weight_excess,  2, session('currency')['decimal_separator'], session('currency')['thousand_separator']) : null,

		['class' => 'form-control', 'id'=>'weight_excess']); ?>


		<?php endif; ?>

	</td>

	<td class="text-center">

		<i class="fa fa-close text-danger pos_remove_row cursor-pointer" aria-hidden="true"></i>

	</td>

</tr><?php /**PATH /home/vimi31/public_html/resources/views/sale_pos/product_row.blade.php ENDPATH**/ ?>