<style>
	.py-3{
		padding-top:1rem;
		padding-bottom:1rem;
	}
	.pr-5{
		padding-right:5rem;
	}
	.pr-4{
		padding-right:4rem;
	}
</style>
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close no-print" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">@lang( 'manufacturing::lang.production_details' ) (<b>@lang('purchase.ref_no'):</b> #{{ $production_purchase->ref_no }})</h4>
        </div>

        <div class="modal-body">
            <div class="row">
                <div class="col-sm-12">
                    <p class="pull-right"><b>@lang('messages.date'):</b> {{ @format_date($production_purchase->transaction_date) }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 invoice-col">
                    @lang('business.business'):
                    <address>
                        <strong>{{ $production_purchase->business->name }}</strong>
                        {{ $production_purchase->location->name }}
                        @if(!empty($production_purchase->location->landmark))
                          <br>{{$production_purchase->location->landmark}}
                        @endif
                        @if(!empty($production_purchase->location->city) || !empty($production_purchase->location->state) || !empty($production_purchase->location->country))
                          <br>{{implode(',', array_filter([$production_purchase->location->city, $production_purchase->location->state, $production_purchase->location->country]))}}
                        @endif
                        
                        @if(!empty($production_purchase->business->tax_number_1))
                          <br>{{$production_purchase->business->tax_label_1}}: {{$production_purchase->business->tax_number_1}}
                        @endif

                        @if(!empty($production_purchase->business->tax_number_2))
                          <br>{{$production_purchase->business->tax_label_2}}: {{$production_purchase->business->tax_number_2}}
                        @endif

                        @if(!empty($production_purchase->location->mobile))
                          <br>@lang('contact.mobile'): {{$production_purchase->location->mobile}}
                        @endif
                        @if(!empty($production_purchase->location->email))
                          <br>@lang('business.email'): {{$production_purchase->location->email}}
                        @endif
                    </address>
                </div>
                <div class="col-sm-6 invoice-col">
                    <b>@lang('purchase.ref_no'):</b> #{{ $production_purchase->ref_no }}<br/>
                    <b>@lang('messages.date'):</b> {{ @format_date($production_purchase->transaction_date) }}<br/>
                    <b>@lang('purchase.purchase_status'):</b> {{ ucfirst( $production_purchase->status ) }}<br>
                    <b>@lang('purchase.payment_status'):</b> {{ ucfirst( $production_purchase->payment_status ) }}<br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h4>@lang('manufacturing::lang.product_details')</h4>
                </div>
                <div class="col-md-6">
                    <strong>@lang('sale.product'):</strong>
                    {{$purchase_line->variations->full_name}}
                    @if(request()->session()->get('business.enable_lot_number') == 1)
                        <br><strong>@lang('lang_v1.lot_number'):</strong>
                        {{$purchase_line->lot_number}}
                    @endif
                    @if(session('business.enable_product_expiry'))
                        <br><strong>@lang('product.exp_date'):</strong>
                        @if(!empty($purchase_line->exp_date))       
                            {{@format_date($purchase_line->exp_date)}} 
                        @endif
                    @endif
                </div>
                <div class="col-md-6">
                    <strong>@lang('lang_v1.quantity'):</strong>
                    {{@format_quantity($quantity)}} {{$unit_name}}<br>
                    <strong>@lang('manufacturing::lang.waste_units'):</strong>
                    {{@format_quantity($quantity_wasted)}} {{$unit_name}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>@lang('manufacturing::lang.ingredient')</th>
                                <th>@lang('manufacturing::lang.input_quantity')</th>
                                <th>@lang('manufacturing::lang.waste_percent')</th>
                                <th>@lang('manufacturing::lang.final_quantity')</th>
                                <th>@lang('manufacturing::lang.total_price')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total_ingredient_unit_price = 0;
                                $total_ingredient_price = 0;
                            @endphp
                            @foreach($ingredients as $ingredient)
                                <tr>
                                    <td>{{$ingredient['full_name']}}</td>
                                    <td>{{@format_quantity($ingredient['quantity'])}} {{$ingredient['unit']}}</td>
                                    <td>{{@format_quantity($ingredient['waste_percent'])}} %</td>
                                    <td>{{@format_quantity($ingredient['final_quantity'])}} {{$ingredient['unit']}}</td>
                                    @php
                                        $price = $ingredient['total_price'];

                                        $total_ingredient_price += $price;
                                    @endphp
                                    <td>
                                         <span class="display_currency" data-currency_symbol="true">{{$price}}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="text-right"><strong>@lang('manufacturing::lang.ingredients_cost')</strong></td>
                                <td><span class="display_currency" data-currency_symbol="true">{{$total_ingredient_price}}</span></td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-right"><strong>{{__('manufacturing::lang.production_cost')}}:</strong></td>
                                <td><span class="display_currency" data-currency_symbol="true">{{$total_production_cost}}</span> ({{$production_purchase->mfg_production_cost}}%)</td>
                            </tr>
                            <tr><td colspan="4" class="text-right"><strong>{{__('manufacturing::lang.total_cost')}}:</strong></td>
                                <td><span class="display_currency" data-currency_symbol="true">{{$production_purchase->final_total}}</span></td></tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            @if(count($costs)>0)
            <div class="row">
				<div class="col-md-12">
				  <table class="table">
						<thead>
							<tr>
								<th>@lang('manufacturing::lang.type')</th>
								<th>@lang('manufacturing::lang.name')</th>
								<th>@lang('manufacturing::lang.fixed_percentage')</th>
								<th>@lang('manufacturing::lang.value')</th>
								<th>@lang('manufacturing::lang.total')</th>
							</tr>
						</thead>
						<tbody>
						@foreach($costs as $cost)
						<tr>
							<td>{{ucfirst($cost->type)}}</td>
							<td>{{ucfirst($cost->name)}}</td>
							<td>{{ucfirst($cost->cost_type)}}</td>
							<td>{{$cost->cost_value}}</td>
							<td><span class="display_currency" data-currency_symbol="true">{{$cost->cost_total}}</td>
						</tr>
						@endforeach
						</tbody>
						
					</table>
				</div>
			</div>
            @endif
            <div class="row">
      			<div class="col-md-6 py-3">
      				<!-- <strong>@lang('manufacturing::lang.wastage'):</strong>
      				{{$recipe->waste_percent ?? 0}} % <br> -->
      				<strong>@lang('manufacturing::lang.byproducts_available'):</strong>
      				@if(!empty($recipe->by_product_available)){{ucfirst($recipe->by_product_available)}} @endif
      			</div>
				@if($recipe->by_product_available=='yes')
      			<div class="col-md-12">
				  <table class="table">
						<thead>
							<tr>
								<th>@lang('manufacturing::lang.by_products')</th>
								<th>@lang('lang_v1.quantity')</th>
							</tr>
						</thead>
						<tbody>
						@foreach($by_products as $prod)
						<tr>
							<td>{{$prod->name}}</td>
							<td>{{$prod->output_qty}} {{$prod->unit}}</td>
						</tr>
						@endforeach
						</tbody>
						
					</table>
				</div>
				@endif
      		</div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-primary no-print" aria-label="Print" 
      onclick="$(this).closest('div.modal-content').printThis();"><i class="fa fa-print"></i> @lang( 'messages.print' )
      </button>
            <button type="button" class="btn btn-default no-print" data-dismiss="modal">@lang( 'messages.close' )</button>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->