
@php

    $enable_below_cost_price = !empty($pos_settings['enable_below_cost_price'])?1:0;
    if(!auth()->user()->can('pos.edit_shipping')){
        $hide_tax = 'hide';
    }
@endphp

<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<div class="col-md-4">
				<h4 class="modal-title" id="myModalLabel">{{$product->product_name}} - {{$product->sub_sku}}</h4>
			</div>
			 <div class="col-md-4">
				<span style="color: red; font-weight: bold;">Qty: {{@format_quantity($product['qty_available'])}}</span> 
			</div>
			<div class="col-md-3">
				<span style="color: red; font-weight: bold;">P.Price: {{@num_format($product['purchase_price'])}}</span> 
			</div>
			<div class="col-md-4">
				<span style="color: red; font-weight: bold;">Supplier: {{$product['supplier_name']}}</span> 
			</div>
			<div class="col-md-4">
				<span style="color: red; font-weight: bold;">Rack: {{$product['rack_number']}}</span> 
			</div>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="form-group col-xs-12 @if(!auth()->user()->can('edit_product_price_from_sale_screen')) hide @endif">
					<label>@lang('sale.unit_price')</label>
						<input type="text" name="products[{{$row_count}}][unit_price]" class="form-control pos_unit_price input_number mousetrap" value="{{!empty($product->unit_price_before_discount) ? $product->unit_price_before_discount : $product->default_sell_price}}">
						@if (!$enable_below_cost_price)
						<span style="color: red; font-size: 14px;text-align:left; font-weight: bold;" class="error_price"></span>
						@endif
						<input type="hidden" name="products[{{$row_count}}][default_purchase_price]" class="products_default_purchase_price_{{$row_count}} form-control input_number mousetrap" value="{{@num_format(!empty($product->default_purchase_price) ? $product->default_purchase_price : $product->default_sell_price)}}">
				</div>
				@php
					$discount_type = !empty($product->line_discount_type) ? $product->line_discount_type : 'fixed';
					$discount_amount = !empty($product->line_discount_amount) ? $product->line_discount_amount : 0;
					
					if(!empty($discount)) {
						$discount_type = $discount->discount_type;
						$discount_amount = $discount->discount_amount;
					}
				@endphp

				@if(!empty($discount))
					{!! Form::hidden("products[$row_count][discount_id]", $discount->id); !!}
				@endif
				<div class="form-group col-xs-12 col-sm-6 @if(!$edit_discount) hide @endif">
					<label>@lang('sale.discount_type')</label>
						{!! Form::select("products[$row_count][line_discount_type]", ['fixed' => __('lang_v1.fixed'), 'percentage' => __('lang_v1.percentage')], $discount_type , ['class' => 'form-control row_discount_type']); !!}
					@if(!empty($discount))
						<p class="help-block">{!! __('lang_v1.applied_discount_text', ['discount_name' => $discount->name, 'starts_at' => $discount->formated_starts_at, 'ends_at' => $discount->formated_ends_at]) !!}</p>
					@endif
				</div>
				<div class="form-group col-xs-12 col-sm-6 @if(!$edit_discount) hide @endif">
					<label>@lang('sale.discount_amount')</label>
						{!! Form::text("products[$row_count][line_discount_amount]", @num_format($discount_amount), ['class' => 'form-control input_number row_discount_amount']); !!}
				</div>
				<div class="form-group col-xs-12 {{$hide_tax}}">
					<label>@lang('sale.tax')</label>

					{!! Form::hidden("products[$row_count][item_tax]", @num_format($item_tax), ['class' => 'item_tax']); !!}
		
					{!! Form::select("products[$row_count][tax_id]", $tax_dropdown['tax_rates'], $tax_id, ['placeholder' => 'Select', 'class' => 'form-control tax_id'], $tax_dropdown['attributes']); !!}
				</div>
				@php
					$warranty_id = !empty($action) && $action == 'edit' && !empty($product->warranties->first())  ? $product->warranties->first()->id : $product->warranty_id;
				@endphp
				@if(!empty($warranties))
					<div class="form-group col-xs-12">
						<label>@lang('lang_v1.warranty')</label>
						{!! Form::select("products[$row_count][warranty_id]", $warranties, $warranty_id, ['placeholder' => __('messages.please_select'), 'class' => 'form-control']); !!}
					</div>
				@endif
				<div class="form-group col-xs-12">
		      		<label>@lang('lang_v1.description')</label>
		      		@php
		      			$sell_line_note = '';
		      			if(!empty($product->sell_line_note)){
		      				$sell_line_note = $product->sell_line_note;
		      			}
		      		@endphp
		      		<textarea class="form-control" name="products[{{$row_count}}][sell_line_note]" rows="3">{{$sell_line_note}}</textarea>
		      		<p class="help-block">@lang('lang_v1.sell_line_description_help')</p>
		      	</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">@lang('messages.close')</button>
		</div>
	</div>
</div>

<script>
@if(!$enable_below_cost_price)
$('.pos_unit_price').keyup(function(){
	
	var purchase_price = $('.products_default_purchase_price_{{$row_count}}').val();
	if(parseInt($(this).val()) < parseInt(purchase_price)){
		// $('.error_price').show();
		$('.error_price').text('Price should greater then purchase price');
		toastr.error('Price should greater then purchase price');
	}else{
		// $('.error_price').hide();
		$('.error_price').text('');
	}
});

@endif
</script>