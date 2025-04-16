<tr class="product_row">
    <td>
        <?php echo e($product->product_name, false); ?>

        <br/>
        <?php echo e($product->sub_sku, false); ?>

    </td>
    <td><?php echo e($product->formatted_qty_available, false); ?></td> 
    <td><?php echo e($product->unit, false); ?></td>
    <td>
        
        <?php if(!empty($product->transaction_sell_lines_id)): ?>
            <input type="hidden" name="products[<?php echo e($row_index, false); ?>][transaction_sell_lines_id]" class="form-control" value="<?php echo e($product->transaction_sell_lines_id, false); ?>">
        <?php endif; ?>

        <input type="hidden" name="products[<?php echo e($row_index, false); ?>][product_id]" class="form-control product_id" value="<?php echo e($product->product_id, false); ?>">

        <input type="hidden" value="<?php echo e($product->variation_id, false); ?>" 
            name="products[<?php echo e($row_index, false); ?>][variation_id]">

        <input type="hidden" value="<?php echo e($product->enable_stock, false); ?>" 
            name="products[<?php echo e($row_index, false); ?>][enable_stock]">
        
        <?php if(empty($product->quantity_ordered)): ?>
            <?php
                $product->quantity_ordered = 1;
            ?>
        <?php endif; ?>

        <!--<input type="text" class="form-control product_quantity input_number input_quantity" value="<?php echo e(number_format($product->quantity_ordered, 2, session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?>" name="products[<?php echo e($row_index, false); ?>][quantity]" -->
        <!--<?php if($product->unit_allow_decimal == 1): ?> data-decimal=1 <?php else: ?> data-decimal=0 data-rule-abs_digit="true" data-msg-abs_digit="<?php echo app('translator')->get('lang_v1.decimal_value_not_allowed'); ?>" <?php endif; ?>-->
        <!--data-rule-required="true" data-msg-required="<?php echo app('translator')->get('validation.custom-messages.this_field_is_required'); ?>" <?php if($product->enable_stock): ?> data-rule-max-value="<?php echo e($product->current_stock, false); ?>" data-msg-max-value="<?php echo app('translator')->get('validation.custom-messages.quantity_not_available', ['qty'=> $product->formatted_qty_available, 'unit' => $product->unit  ]); ?>" <?php endif; ?> >-->
        
        <input type="text" class="form-control product_quantity input_number input_quantity" 
       value="<?php echo e(number_format($product->quantity_ordered, 2, session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?>" 
       name="products[<?php echo e($row_index, false); ?>][quantity]" 
       data-rule-required="true" 
       data-msg-required="<?php echo app('translator')->get('validation.custom-messages.this_field_is_required'); ?>"
       
           data-decimal="1" 
           data-rule-number="true" 
      
       
       <?php if($product->enable_stock): ?> 
           data-rule-max-value="<?php echo e($product->current_stock, false); ?>" 
           data-msg-max-value="<?php echo app('translator')->get('validation.custom-messages.quantity_not_available', ['qty'=> $product->formatted_qty_available, 'unit' => $product->unit  ]); ?>" 
       <?php endif; ?>>
        <?php echo e($product->unit, false); ?>

    </td>
    <td>
        <input type="text" name="products[<?php echo e($row_index, false); ?>][unit_price]" class="form-control product_unit_price input_number" value="<?php echo e(number_format($product->last_purchased_price,  2, session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?>">
    </td>
    <td>
        <input type="text" readonly name="products[<?php echo e($row_index, false); ?>][price]" class="form-control product_line_total" value="<?php echo e(number_format($product->quantity_ordered*$product->last_purchased_price,  2, session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?>">
    </td>
    <td class="text-center">
        <i class="fa fa-trash remove_product_row cursor-pointer" aria-hidden="true"></i>
    </td>
</tr><?php /**PATH /home/vimi31/public_html/resources/views/stock_transfer/partials/product_table_row.blade.php ENDPATH**/ ?>