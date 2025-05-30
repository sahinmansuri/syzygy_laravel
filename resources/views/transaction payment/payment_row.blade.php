<div class="modal-dialog" role="document">
  <div class="modal-content">

    {!! Form::open(['url' => action('TransactionPaymentController@store'), 'method' => 'post', 'id' =>
    'transaction_payment_add_form', 'files' => true ]) !!}
    {!! Form::hidden('transaction_id', $transaction->id); !!}
    {!! Form::hidden("contact_id", $transaction->contact_id, ['id' => 'contact_id']); !!}

    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
          aria-hidden="true">&times;</span></button>
      <h4 class="modal-title">@lang( 'purchase.add_payment' )</h4>
    </div>
    
    <input type="hidden" id="location_id" value="{{$transaction->location_id}}">

    <div class="modal-body">
      <div class="row">
        @if(!empty($transaction->contact))
        <div class="col-md-4">
          <div class="well">
            <strong>
              @if(in_array($transaction->type, ['purchase', 'purchase_return']))
              @lang('purchase.supplier')
              @elseif(in_array($transaction->type, ['sell', 'sell_return']))
              @lang('contact.customer')
              @endif
            </strong>:{{ $transaction->contact->name }}<br>
            @if($transaction->type == 'purchase')
            <strong>@lang('business.business'): </strong>{{ $transaction->contact->supplier_business_name }}
            @endif
          </div>
        </div>
        @endif
        <div class="col-md-4">
          <div class="well">
            @if(in_array($transaction->type, ['sell', 'sell_return']))
            <strong>@lang('sale.invoice_no'): </strong>{{ $transaction->invoice_no }}
            @else
            <strong>@lang('purchase.ref_no'): </strong>{{ $transaction->ref_no }}
            @endif
            @if(!empty($transaction->location))
            <input type="hidden" id="location_id" name="{{$transaction->location->id}}">
            <br>
            <strong>@lang('purchase.location'): </strong>{{ $transaction->location->name }}
            @endif
          </div>
        </div>
        <div class="col-md-4">
          <div class="well">
            <strong>@lang('sale.total_amount'): </strong><span class="display_currency"
              data-currency_symbol="true">{{ $transaction->final_total }}</span><br>
            <strong>@lang('purchase.payment_note'): </strong>
            @if(!empty($transaction->additional_notes))
            {{ $transaction->additional_notes }}
            @else
            --
            @endif
          </div>
        </div>
      </div>
      <div class="row payment_row">
        <div class="col-md-4" style="display:none;">
          <div class="form-group">
            <label>Ref No :</label>
            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-money"></i>
              </span>
              <input class="form-control input_number" required="" placeholder="Ref No" name="refNo" type="text" value="{{$refNo}}" id="refNo" aria-required="true" readonly>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            {!! Form::label("amount" , __('sale.amount') . ':*') !!}
            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-money"></i>
              </span>
              {!! Form::text("amount", @num_format($payment_line->amount), ['class' => 'form-control input_number',
              'required', 'placeholder' => 'Amount']); !!}
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            {!! Form::label("paid_on" , __('lang_v1.paid_on') . ':*') !!}
            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </span>
              {!! Form::text('paid_on', @format_datetime($payment_line->paid_on), ['class' => 'form-control',
              'readonly', 'required']); !!}
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            {!! Form::label("method" , __('purchase.payment_method') . ':*') !!}
            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-money"></i>
              </span>
              {!! Form::select("method", $payment_types, $payment_line->method, ['class' => 'form-control select2
              payment_types_dropdown', 'required', 'style' => 'width:100%;']); !!}
            </div>
          </div>
        </div>
        <div class="col-md-4 account_module">
          <div class="form-group">
            {!! Form::label("account_id" , __('lang_v1.payment_account') . ':') !!}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-money"></i>
                </span>
                {!! Form::select(
                    "account_id",
                    $accounts,
                    !empty($payment_line->account_id) ? $payment_line->account_id : '',
                    [
                        'class' => 'form-control account_id select2',
                        'id' => 'account_id',
                        'style' => 'width:100%;',
                        'required' => 'required', // Set the required attribute
                        'onchange' => 'handleAccountChange()' // Move onchange here
                    ]
                ) !!}
            </div>

          </div>
        </div>
        
        <div class="col-md-6">
          <div class="form-group" style="display:none;">
            {!! Form::label("cheque_id", __('lang_v1.cheque_number') . ':') !!}
            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-money"></i>
              </span>
              {!! Form::select("cheque_id", [], null, 
                                ['class' => 'form-control select2', 'id' => 'cheque_id', 'style' => 'width:100%;']); !!}
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            {!! Form::label('document', __('purchase.attach_document') . ':') !!}
            {!! Form::file('document'); !!}
          </div>
        </div>
        <div class="clearfix"></div>
        @include('transaction_payment.payment_type_details')
        
        @php
                    
            $business_id = request()
                ->session()
                ->get('user.business_id');
            
            $pacakge_details = [];
                
            $subscription = Modules\Superadmin\Entities\Subscription::active_subscription($business_id);
            if (!empty($subscription)) {
                $pacakge_details = $subscription->package_details;
            }
        
        @endphp
        
        @if(!empty($pacakge_details['show_post_dated_cheque']))
          <div class="col-md-6 text-left" >
                <div class="checkbox">
                    <label>
                        {!! Form::checkbox('post_dated_cheque', '1', false,
                        [ 'class' => 'input-icheck','id' => 'post_dated_cheque']); !!} {{ __( 'account.post_dated_cheque' ) }}
                    </label>
                </div>
            </div>
            @if(!empty($pacakge_details['update_post_dated_cheque']))
            <div class="col-md-6 text-left" >
                <div class="checkbox">
                    <label>
                        {!! Form::checkbox('update_post_dated_cheque', '1', false,
                        [ 'class' => 'input-icheck','id' => 'update_post_dated_cheque']); !!} {{ __( 'account.update_post_dated_cheque' ) }}
                    </label>
                </div>
            </div>
            @endif
            
        @endif
        
        <div class="col-md-12">
          <div class="form-group">
            {!! Form::label("note", __('lang_v1.payment_note') . ':') !!}
            {!! Form::textarea("note", $payment_line->note, ['class' => 'form-control', 'rows' => 3]); !!}
          </div>
        </div>
      </div>
    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-primary submit_btn">@lang( 'messages.save' )</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">@lang( 'messages.close' )</button>
    </div>

    {!! Form::close() !!}

  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->

<script>
  $('.payment_types_dropdown').trigger('change');
  

  $('#amount').change(function(){
			paid = parseFloat($('#amount').val());

			var account_balance = parseFloat($('#account_id option:selected').data('account_balance'));
			if($('#account_id option:selected').data('check_insufficient_balance')){
				if(paid > account_balance){
          $('.submit_btn').prop('disabled', true);
					Insufficient_balance_swal();
				}else{
          $('.submit_btn').prop('disabled', false);
        }
			}
		});

    function handleAccountChange() {
        var selectElement = document.getElementById("account_id");
        var selectedName = selectElement.options[selectElement.selectedIndex].text;
        var contact_id = document.getElementById("contact_id").value;
    
        if (selectedName == "Pre Payments") {
            $.ajax({
                method: 'GET',
                url: '/payments/get-cheque-numbers/' + contact_id,
                success: function(result) {
                    populateChequeDropdown(result);
                }
            });
        }
    }
    
    function populateChequeDropdown(cheques) {
        var chequeSelect = document.getElementById("cheque_id");
        var chequeSelectContainer = chequeSelect.closest('.form-group');
    
        chequeSelectContainer.style.display = 'none';
        chequeSelect.innerHTML = '';
        if (Object.keys(cheques).length > 0) {
            for (var id in cheques) {
                if (cheques.hasOwnProperty(id)) {
                    var option = document.createElement("option");
                    option.value = id;
                    option.text = cheques[id];
                    chequeSelect.appendChild(option);
                }
            }
            chequeSelectContainer.style.display = 'block';
        }
         if ($(chequeSelect).hasClass('select2')) {
            $(chequeSelect).trigger('change');
        }
    }



</script>