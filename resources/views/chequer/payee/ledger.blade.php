@extends('layouts.app')
@section('title', __('contact.view_contact'))
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header no-print">
    <h1>{{ __('lang_v1.View Payee ledger') }}</h1>
</section>
<style>
	.bg_color {
		background: #357ca5;
		font-size: 20px;
		color: #fff;
	}
	.text-center {
		text-align: center;
	}
	#ledger_table th {
		background: #357ca5;
		color: #fff;
	}
	#ledger_table > tbody > tr:nth-child(2n+1) > td,
	#ledger_table > tbody > tr:nth-child(2n+1) > th {
		background-color: rgba(89, 129, 255, 0.3);
	}
</style>
@php
	$currency_precision = !empty($business_details->currency_precision) ? $business_details->currency_precision : 2;
	$total_debit = 0;
	$opening_total = 0;
	$opening_type = '';
	$opening_bal = !empty($opening_balance_new[0]) ?$opening_balance_new[0]->opening_balance:$opening_balance;
@endphp
<section class="content no-print">
    <div class="box box-primary">
        <div class="box-header">
            {!! Form::open(['method' => 'post', 'id' => 'ledger_form' ]) !!}
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('ledger_date_range', __('report.date_range') . ':') !!}
                        {!! Form::text('ledger_date_range', $ledger_date_range, ['placeholder' => __('lang_v1.select_a_date_range'), 'class' => 'form-control refresh-data', 'readonly', 'id' => 'ledger_date_range']); !!}
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('ledger_transaction_type', __('lang_v1.transaction_type') . ':') !!}
                        {!! Form::select('ledger_transaction_type', ['debit' => 'Debit', 'credit' => 'Credit'], null, ['placeholder' => __('lang_v1.please_select'), 'style' => 'width: 100%', 'class' => 'form-control select2 refresh-data', 'readonly', 'id' => 'ledger_transaction_type']); !!}
                    </div>
                </div>
               
                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('ledger_transaction_amount', __('lang_v1.transaction_amount') . ':') !!}
                        {!! Form::select('ledger_transaction_amount', $transaction_amounts ,null, ['placeholder' => __('lang_v1.please_select'), 'style' => 'width: 100%', 'class' => 'form-control select2 refresh-data', 'readonly', 'id' => 'ledger_transaction_amount']); !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('ledger_general_search', __('lang_v1.search') . ':') !!}
                        {!! Form::text('ledger_general_search', null, ['placeholder' => __('lang_v1.search'), 'class' =>
                        'form-control refresh-data', 'id' => 'ledger_general_search']); !!}
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-12 col-sm-12 @if(!empty($for_pdf)) width-100 text-center @endif">
                    <p class="text-center"><strong>{{$contact->business->name}}</strong><br>{{$location_details->city}}
                        , {{$location_details->state}}<br>{!!
                        $location_details->mobile !!}</p>
                    <hr>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 @if(!empty($for_pdf)) width-50 f-left @endif">
                    <p class="bg_color" style="width: 40%">@lang('lang_v1.to'):</p>
                    <p><strong>{{$contact->name}}</strong><br> {!! $contact->contact_address !!} @if(!empty($contact->email))
                            <br>@lang('business.email'): {{$contact->email}} @endif
                        <br>@lang('contact.mobile'): {{$contact->mobile}}
                        @if(!empty($contact->tax_number)) <br>@lang('contact.tax_no'): {{$contact->tax_number}} @endif
                    </p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 text-right align-right @if(!empty($for_pdf)) width-50 f-left @endif">
                    <p class=" bg_color" style="margin-top: @if(!empty($for_pdf)) 20px @else 0px @endif; font-weight: 500;">
                        @lang('lang_v1.account_summary')</p>
                        <hr>
                    <table class="table table-condensed text-left align-left no-border @if(!empty($for_pdf)) table-pdf @endif">
                        <tr>
                            <td>@lang('lang_v1.opening_balance')</td>
                            <td id="opening_balance">{{number_format($opening_bal,  $currency_precision, session('currency')['decimal_separator'], session('currency')['thousand_separator'])}}
                            </td>
                        </tr>
                        <tr>
                            <td>@lang('lang_v1.beginning_balance')</td>
                            <td>
                            {{number_format($ledger_details['beginning_balance'],  $currency_precision, session('currency')['decimal_separator'], session('currency')['thousand_separator'])}}
                            </td>
                        </tr>
                        @if( $contact->type == 'supplier' || $contact->type == 'both')
                            <tr>
                                <td>@lang('report.total_purchase')</td>
                                <td>
                                {{number_format($ledger_details['total_purchase'],  $currency_precision, session('currency')['decimal_separator'], session('currency')['thousand_separator'])}}
                                </td>
                            </tr>
                        @endif
                        @if( $contact->type == 'customer' || $contact->type == 'both')
                            <tr>
                                <td>@lang('lang_v1.total_sales')</td>
                                <td id="total_invoice">
                                {{number_format($ledger_details['total_invoice'],  $currency_precision, session('currency')['decimal_separator'], session('currency')['thousand_separator'])}}
                                </td>
                            </tr>
                        @endif
                        <tr>
                            <td>@lang('sale.total_paid')</td>
                            <td id="total_paid">
                            {{number_format($ledger_details['total_paid'],  $currency_precision, session('currency')['decimal_separator'], session('currency')['thousand_separator'])}}
                            </td>
                        </tr>
                        <tr>
                            <td><strong>@lang('lang_v1.balance_due')</strong></td>
                            <td id="total_due">
                            {{number_format(($ledger_details['balance_due']),  $currency_precision, session('currency')['decimal_separator'], session('currency')['thousand_separator'])}}
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-12 col-sm-12 @if(!empty($for_pdf)) width-100 @endif">
                    <p style="text-align: center !important; float: left; width: 100%;">
                        <strong>
                            @lang('lang_v1.ledger_table_heading',['start_date' =>$ledger_details['start_date'], 'end_date' => $ledger_details['end_date']])
                        </strong>
                    </p>
                    <table class="table table-striped @if(!empty($for_pdf)) table-pdf td-border @endif" id="ledger_table">
                        <thead>
                        <tr class="row-border">
                                <th>@lang('lang_v1.date')</th>
                                <th>@lang('purchase.ref_no')</th>
                                <th>@lang('lang_v1.type')</th>
                                <th>@lang('sale.location')</th>
                                <th>@lang('sale.payment_status')</th>
                                <th>@lang('account.debit')</th>
                                <th>@lang('account.credit')</th>
                                <th>@lang('lang_v1.balance')</th>
                                <th>@lang('lang_v1.payment_method')</th>
                
                        </tr>
                
                
                        </thead>
                        <tbody>
                        @php
                            $balance = $ledger_details['balance']??$ledger_details['beginning_balance'];
                            $balance = $ledger_details['bf_balance'];
                        @endphp

                        
                        @foreach($ledger_transactions as $data)
                            <tr>
                                <td class="row-border">{{ date('d-m-Y', strtotime($data->transaction_date)) }}</td>
                                <td class="row-border">{{ $data->reference_no }}</td>
                                <td class="row-border">{{ $data->type }}</td>
                                <td class="row-border">{{ $data->location }}</td>
                                <td class="row-border">{{ $data->payment_status }}</td>
                                <td class="row-border">
                                    <!-- Debit column should be empty for customers -->
                                </td>
                                <td class="row-border">
                                    {{ number_format($data->amount, 2) }} <!-- Amount for credit -->
                                </td>
                                <td class="row-border">
                                    {{ number_format($ledger_details['bf_balance'], $currency_precision, session('currency')['decimal_separator'], session('currency')['thousand_separator']) }}
                                </td>
                                <td class="row-border">
                                    @php
                                        // Get payment details
                                        $bank_name = $data->bank_name ?? '';
                                        $cheque_no = $data->cheque_number ?? '';
                                        $cheque_date = isset($data->cheque_date) ? \Carbon\Carbon::parse($data->cheque_date)->format('d-m-Y') : '';
                        
                                        // Concatenate values with proper formatting
                                        $payment_details = trim($bank_name . (!empty($bank_name) ? ', ' : '') . $cheque_no . (!empty($cheque_no) ? ', ' : '') . $cheque_date);
                                    @endphp
                                    {{ $payment_details }}
                                </td>
                            </tr>
                        @endforeach

                        @foreach($ledger_transactions as $data)
                            <?php
                
                                $transaction_payment = null;
                                if(!empty($data->transaction_payment_id)){
                                    $transaction_payment = App\TransactionPayment::where('id', $data->transaction_payment_id)->withTrashed()->first();
                                }
                                $amount = 0;
                                $interestAmount = 0;
                                if(!empty($transaction_payment)){
                                    $interest = App\AccountTransaction::where('transaction_payment_id',$transaction_payment->id)->first();
                                    if($interest)
                                        $interestAmount=$interest->interest;
                                    if(empty($transaction_payment->transaction_id)){ // if empty then it will be parent payment
                                        $amount = $transaction_payment->amount;  // show parent transaction payment amount
                                    }else{
                                        $amount = $data->amount; // get the amount from contact ledger if not a payment
                                    }
                                }else{
                                    $amount = $data->amount;
                                }
                                 if ($contact->type == 'supplier' ){
                                    if($data->acc_transaction_type == 'debit') {
                                        $balance = $balance - $amount;
                                    }
                                    if($data->acc_transaction_type == 'credit') {
                                        $balance = $balance + $amount;
                                    }
                                }
                                if ($contact->type == 'customer'){
                                    if($data->acc_transaction_type == 'debit' ) {
                                        // if($data->transaction_type == 'cheque_return' && $data->sub_type == null){
                                        //     $balance = $balance + $data->cheque_return_amount;
                                        // }else{
                                            $balance = $balance + $amount;
                                        // }
                                    }
                                    if($data->acc_transaction_type == 'credit' ) {
                                        $balance = $balance - $amount;
                                    }
                                    $balance+=$interestAmount;
                                }
                                if($data->transaction_type == 'opening_balance' && $data->final_total < 0){
                                    $payment_status = 'over-payment';
                                }else{
                                    $payment_status = App\Transaction::getPaymentStatus($data);
                                }
                            ?>
                
                            <tr>
                                @if(!empty($transaction_payment))
                                    <td class="row-border">{{@format_date($transaction_payment->paid_on)}}</td>
                                @else
                                    <td class="row-border">{{@format_date($data->transaction_date)}}</td>
                                @endif
                                <td>
                                    <span><label>PO Number:</label>{{$data->ref_no}}</span>
                                    <span><label>Bill Number:</label>{{$data->invoice_no}}</span>
                                </td>
                                <td>
                                    @if($data->payment_type=="balance_payment")
                                        Balance Payment
                                    @else
                                        New Payment
                                    @endif
                                </td>
                                <td>{{$data->location_name}}</td>
                                <td>
                                    <span class="label @payment_status($payment_status)">@lang('lang_v1.' . $payment_status) </span>
                                </td>
                                <td class="ws-nowrap">
                                    @if($data->acc_transaction_type == 'debit')
                                        @php if($data->transaction_type == 'opening_balance') { $opening_total += $amount;$opening_type = 'debit';} @endphp
                
                
                
                                        <!--@php if($data->transaction_type == 'cheque_return' && $data->sub_type == null) { $amount = $data->cheque_return_amount ; } @endphp-->
                                        <!--@php if($data->sub_type == 'cheque_return_charges' && $data->transaction_type == null ) { $amount = $amount ; } @endphp-->
                
                                        {{number_format($amount,  $currency_precision, session('currency')['decimal_separator'], session('currency')['thousand_separator'])}}
                                    @else
                                        @php $total_debit += $interestAmount;  @endphp
                                        <span class="dasdasasd">{{$interestAmount == 0 ? '' :number_format($interestAmount ,  $currency_precision, session('currency')['decimal_separator'], session('currency')['thousand_separator']) }}</span>
                                    @endif
                                </td>
                                <td class="ws-nowrap">@if($data->acc_transaction_type == 'credit')
                
                                        {{number_format($amount ,  $currency_precision, session('currency')['decimal_separator'], session('currency')['thousand_separator'])}}
                                    @endif</td>
                                <td class="ws-nowrap">
                                    {{number_format($balance,  $currency_precision, session('currency')['decimal_separator'], session('currency')['thousand_separator'])}}
                                </td>
                                @if($data->transaction_type == 'purchase')
                                    @if($data->type == 'credit')
                                        <td>@lang('contact.credit_purchase')</td>
                                    @else
                                        @if(!empty($transaction_payment->deleted_at))
                                            <td>{{ucfirst($transaction_payment->method)}}</td>
                                        @else
                                            <td>
                                                @if(!empty($transaction_payment))
                                                    @if($transaction_payment->method == 'bank_transfer')
                                                        @php
                                                            $bank_account = App\Account::find($transaction_payment->account_id);
                                                        @endphp
                                                        <b>@lang('lang_v1.bank_name')
                                                            :</b> @if(!empty($bank_account)) {{$bank_account->name}} @endif <br>
                                                        <b>@lang('lang_v1.cheque_number'):</b> {{$transaction_payment->cheque_number}}
                                                        <br>
                                                        <b>@lang('lang_v1.cheque_date')
                                                            :</b> @if(!empty($data->operation_date)){{@format_date($data->operation_date)}} @endif
                                                        <br>
                                                        <b>@lang('lang_v1.account_number')
                                                            :</b> @if(!empty($bank_account)){{$bank_account->account_number}} @endif
                                                        <br>
                                                    @elseif($transaction_payment->method == 'cheque')
                                                        {{ucfirst($transaction_payment->method)}} <br>
                                                        <b>@lang('lang_v1.cheque_number'):</b> {{$data->cheque_number}} <br>
                                                        <b>@lang('lang_v1.cheque_date')
                                                            :</b> @if(!empty($data->operation_date)){{@format_date($data->operation_date)}} @endif
                                                        <br>
                                                    @else
                                                        {{ucfirst($transaction_payment->method)}}
                                                    @endif
                                                @endif
                                            </td>
                                        @endif
                                    @endif
                                @elseif($data->is_credit_sale == '1' && empty($data->transaction_payment_id))
                                    <td>@lang('contact.credit_sale')</td>
                                @else
                                    <td>
                                        @if ($contact->type == 'customer')
                                            @if(!empty($transaction_payment))
                                                @if($transaction_payment->method == 'bank_transfer')
                                                    @php
                                                        $bank_account = App\Account::find($transaction_payment->account_id);
                                                    @endphp
                                                    <b>@lang('lang_v1.bank_name')
                                                        :</b> @if(!empty($bank_account)) {{$bank_account->name}} @endif <br>
                                                    <b>@lang('lang_v1.cheque_number'):</b> {{$transaction_payment->cheque_number}} <br>
                                                    <b>@lang('lang_v1.cheque_date')
                                                        :</b> @if(!empty($data->operation_date)){{@format_date($data->operation_date)}} @endif
                                                    <br>
                                                    <b>@lang('lang_v1.account_number')
                                                        :</b> @if(!empty($bank_account)){{$bank_account->account_number}} @endif <br>
                                                @elseif($transaction_payment->method == 'direct_bank_deposit' )
                                                    @php
                                                        $bank_account = App\Account::find($transaction_payment->account_id);
                                                    @endphp
                                                    <b>@lang('lang_v1.direct_bank_deposit')</b><br>
                                                    <b>@lang('lang_v1.bank_name')
                                                        :</b> @if(!empty($bank_account)) {{$bank_account->name}} @endif <br>
                                                @elseif($transaction_payment->method == 'cheque')
                                                    {{ucfirst($transaction_payment->method)}} <br>
                                                    <b>@lang('lang_v1.cheque_number'):</b> {{$data->cheque_number}} <br>
                                                    <b>@lang('lang_v1.cheque_date')
                                                        :</b> @if(!empty($data->operation_date)){{@format_date($data->operation_date)}} @endif
                                                    <br>
                                                @elseif($transaction_payment->method == 'card')
                                                   {{ucfirst($transaction_payment->method)}} <br>
                                                    @if($data->card_number)
                                                         <b>@lang('lang_v1.card_number'):</b> {{$data->card_number}}
                                                    @endif
                                                @else
                                                    {{ucfirst($transaction_payment->method)}}
                                                @endif
                                            @endif
                                        @endif
                                        @if ($contact->type == 'supplier')
                                            @if(!empty($transaction_payment))
                                                @if($transaction_payment->method == 'bank_transfer')
                                                    @php
                                                        $bank_account = App\Account::find($transaction_payment->account_id);
                                                    @endphp
                                                    <b>@lang('lang_v1.bank_name')
                                                        :</b> @if(!empty($bank_account)) {{$bank_account->name}} @endif <br>
                                                    <b>@lang('lang_v1.cheque_number'):</b> {{$data->cheque_number}} <br>
                                                    <b>@lang('lang_v1.cheque_date')
                                                        :</b> @if(!empty($data->operation_date)){{@format_date($data->operation_date)}} @endif
                                                    <br>
                                                    <b>@lang('lang_v1.account_number')
                                                        :</b> @if(!empty($bank_account)){{$bank_account->account_number}} @endif <br>
                                                @elseif($transaction_payment->method == 'direct_bank_deposit' )
                                                    @php
                                                        $bank_account = App\Account::find($transaction_payment->account_id);
                                                    @endphp
                                                    <b>@lang('lang_v1.direct_bank_deposit')</b><br>
                                                    <b>@lang('lang_v1.bank_name')
                                                        :</b> @if(!empty($bank_account)) {{$bank_account->name}} @endif <br>
                                                @elseif($transaction_payment->method == 'cheque')
                                                    <b>@lang('lang_v1.cheque_number'):</b> {{$data->cheque_number}} <br>
                                                    <b>@lang('lang_v1.cheque_date')
                                                        :</b> @if(!empty($data->operation_date)){{@format_date($data->operation_date)}} @endif
                                                    <br>
                                                @elseif($transaction_payment->method == 'card')
                                                   {{ucfirst($transaction_payment->method)}} <br>
                                                    @if($data->card_number)
                                                         <b>@lang('lang_v1.card_number'):</b> {{$data->card_number}}
                                                    @endif
                                                @else
                                                    {{ucfirst($transaction_payment->method)}}
                                                @endif
                                            @endif
                                        @endif
                                    </td>
                                @endif
                            </tr>
                            @if($data->interest>0)
                            <tr>
                                @if(!empty($transaction_payment))
                                    <td class="row-border">100</td>
                                @else
                                    <td class="row-border">{{@format_date($data->transaction_date)}}</td>
                                @endif
                                <td colspan="3">
                                    @if($data->is_settlement == 1)
                                        <b>Settlment No: </b> {{$data->invoice_no}} <br>
                                        @if($data->transaction_type == 'settlement' && $data->acc_transaction_type == 'debit' && $data->t_sub_type == 'cash_payment')
                                            {{$data->ref_no}} Cash Sale
                                        @elseif($data->transaction_type == 'settlement' && $data->acc_transaction_type == 'credit' && $data->t_sub_type == 'cash_payment')
                                            {{$data->ref_no}} Cash Payment
                                        @elseif($data->transaction_type == 'settlement' && $data->acc_transaction_type == 'debit' && $data->t_sub_type == 'card_payment')
                                            {{$data->ref_no}} Card Sale
                                        @elseif($data->transaction_type == 'settlement' && $data->acc_transaction_type == 'credit' && $data->t_sub_type == 'card_payment')
                                            {{$data->ref_no}} Card Payment
                                        @elseif($data->transaction_type == 'settlement' && $data->acc_transaction_type == 'debit' && $data->t_sub_type == 'cheque_payment')
                                            {{$data->ref_no}} Cheque Sale
                                        @elseif($data->transaction_type == 'settlement' && $data->acc_transaction_type == 'credit' && $data->t_sub_type == 'cheque_payment')
                                            {{$data->ref_no}} <br> <b>@lang('lang_v1.bank_name'):</b> {{$data->bank_name}}
                                            <b>@lang('lang_v1.cheque_no'):</b> {{$data->cheque_number}} <b>@lang('lang_v1.cheque_date')
                                                :</b> {{$data->cheque_date}}
                                        @elseif($data->transaction_type == 'sell' && $data->acc_transaction_type == 'debit' && $data->t_sub_type == 'credit_sale')
                                            {{$data->ref_no}} Credit Sale
                                            @php
                                                $settlement_expense = \Modules\Petro\Entities\SettlementCreditSalePayment::where('transaction_id', $data->transaction_id)->first();
                                            @endphp
                                            <br>
                                            @if(!empty($settlement_expense))
                                                <b>Order No:</b> {{ $settlement_expense->order_number}}<br>
                                                <b>Order Date:</b> {{ $settlement_expense->order_date}}
                                                <b>Reason: </b> Interest <br>
                                            @endif
                                        @endif
                                        @if(!empty($data->deleted_by))
                                            <b>@lang('lang_v1.deleted')</b>
                                        @endif
                                    @else
                                        @if($data->is_direct_sale)
                                            @lang('lang_v1.invoice_sale'): {{$data->invoice_no}}
                                        @elseif($data->transaction_type == 'sell' && $data->t_sub_type == 'settlement')
                                            @lang('lang_v1.settlement'): {{$data->ref_no}}
                                        @elseif($data->transaction_type == 'sell' && $data->type == 'debit')
                                            @lang('lang_v1.pos_sale'): {{$data->invoice_no}}
                                        @elseif($data->transaction_type == 'sell' && $data->type == 'credit')
                                            @lang('lang_v1.payment'): {{$data->invoice_no}}
                                        @elseif($data->transaction_type == 'sell_return')
                                            @lang('lang_v1.sell_return'): {{$data->invoice_no}}
                                        @elseif($data->transaction_type == 'purchase')
                                            @lang('lang_v1.purchase'): {{$data->ref_no}}
                                        @elseif($data->transaction_type == 'purchase_return')
                                            @lang('lang_v1.purchase_return'): {{$data->ref_no}}
                                        @elseif($data->transaction_type == 'advance_payment')
                                            @lang('lang_v1.advance_payment'): {{$data->ref_no}}
                                        @elseif($data->transaction_type == 'refund')
                                            @lang('lang_v1.refund'): {{$data->ref_no}} <br> <b>@lang('lang_v1.invoice_no')
                                                : </b>{{ $data->invoice_no}}
                                        @elseif($data->transaction_type == 'cheque_return')
                                            @if($data->sub_type == 'cheque_return_charges')
                                                @lang('lang_v1.cheque_return_charges')<br>
                                            @else
                                                @lang('lang_v1.cheque_return')<br>
                                            @endif
                                            <b>@lang('lang_v1.invoice_no'): </b>{{ $data->invoice_no}}
                                            <br> <b>@lang('lang_v1.bank_name'):</b> {{$data->bank_name}} <b>@lang('lang_v1.cheque_no')
                                                :</b> {{$data->cheque_number}} <b>@lang('lang_v1.cheque_date')
                                                :</b> {{$data->cheque_date}}
                                        @endif
                                        @if(!empty($data->deleted_by))
                                            <br><b>@lang('lang_v1.deleted')</b>
                                        @endif
                
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($data->interest))
                                        <span class="label @payment_status($payment_status)">@lang('lang_v1.' . $payment_status) </span>
                                    @endif
                                </td>
                                <td>
                                    {{$data->interest}}
                                </td>
                                <td></td>
                                <td class="ws-nowrap">
                                    {{number_format($balance,  $currency_precision, session('currency')['decimal_separator'], session('currency')['thousand_separator'])}}
                                </td>
                                @if($data->transaction_type == 'purchase')
                                    @if($data->type == 'credit')
                                        <td>@lang('contact.credit_purchase')</td>
                                    @else
                                        @if(!empty($transaction_payment->deleted_at))
                                            <td>{{ucfirst($transaction_payment->method)}}</td>
                                        @else
                                            <td>
                                                @if(!empty($transaction_payment))
                                                    @if($transaction_payment->method == 'bank_transfer')
                                                        @php
                                                            $bank_account = App\Account::find($transaction_payment->account_id);
                                                        @endphp
                                                        <b>@lang('lang_v1.bank_name')
                                                            :</b> @if(!empty($bank_account)) {{$bank_account->name}} @endif <br>
                                                        <b>@lang('lang_v1.cheque_number'):</b> {{$transaction_payment->cheque_number}}
                                                        <br>
                                                        <b>@lang('lang_v1.cheque_date')
                                                            :</b> @if(!empty($data->cheque_date)){{@format_date($data->cheque_date)}} @endif
                                                        <br>
                                                        <b>@lang('lang_v1.account_number')
                                                            :</b> @if(!empty($bank_account)){{$bank_account->account_number}} @endif
                                                        <br>
                                                    @elseif($transaction_payment->method == 'cheque')
                                                        {{ucfirst($transaction_payment->method)}} <br>
                                                        <b>@lang('lang_v1.cheque_number'):</b> {{$data->cheque_number}} <br>
                                                        <b>@lang('lang_v1.cheque_date')
                                                            :</b> @if(!empty($data->cheque_date)){{@format_date($data->cheque_date)}} @endif
                                                        <br>
                                                    @else
                                                        {{ucfirst($transaction_payment->method)}}
                                                    @endif
                                                @endif
                                            </td>
                                        @endif
                                    @endif
                                @elseif($data->is_credit_sale == '1' && empty($data->transaction_payment_id))
                                    <td>@lang('contact.credit_sale')</td>
                                @else
                                    <td>
                                        @if ($contact->type == 'customer')
                                            @if(!empty($transaction_payment))
                                                @if($transaction_payment->method == 'bank_transfer')
                                                    @php
                                                        $bank_account = App\Account::find($transaction_payment->account_id);
                                                    @endphp
                                                    <b>@lang('lang_v1.bank_name')
                                                        :</b> @if(!empty($bank_account)) {{$bank_account->name}} @endif <br>
                                                    <b>@lang('lang_v1.cheque_number'):</b> {{$transaction_payment->cheque_number}} <br>
                                                    <b>@lang('lang_v1.cheque_date')
                                                        :</b> @if(!empty($data->cheque_date)){{@format_date($data->cheque_date)}} @endif
                                                    <br>
                                                    <b>@lang('lang_v1.account_number')
                                                        :</b> @if(!empty($bank_account)){{$bank_account->account_number}} @endif <br>
                                                @elseif($transaction_payment->method == 'direct_bank_deposit' )
                                                    @php
                                                        $bank_account = App\Account::find($transaction_payment->account_id);
                                                    @endphp
                                                    <b>@lang('lang_v1.direct_bank_deposit')</b><br>
                                                    <b>@lang('lang_v1.bank_name')
                                                        :</b> @if(!empty($bank_account)) {{$bank_account->name}} @endif <br>
                                                @elseif($transaction_payment->method == 'cheque')
                                                    {{ucfirst($transaction_payment->method)}} <br>
                                                    <b>@lang('lang_v1.cheque_number'):</b> {{$data->cheque_number}} <br>
                                                    <b>@lang('lang_v1.cheque_date')
                                                        :</b> @if(!empty($data->cheque_date)){{@format_date($data->cheque_date)}} @endif
                                                    <br>
                                                @else
                                                    {{ucfirst($transaction_payment->method)}}
                                                @endif
                                            @endif
                                        @endif
                                        @if ($contact->type == 'supplier')
                                            @if(!empty($transaction_payment))
                                                @if($transaction_payment->method == 'bank_transfer')
                                                    @php
                                                        $bank_account = App\Account::find($transaction_payment->account_id);
                                                    @endphp
                                                    <b>@lang('lang_v1.bank_name')
                                                        :</b> @if(!empty($bank_account)) {{$bank_account->name}} @endif <br>
                                                    <b>@lang('lang_v1.cheque_number'):</b> {{$data->cheque_number}} <br>
                                                    <b>@lang('lang_v1.cheque_date')
                                                        :</b> @if(!empty($data->cheque_date)){{@format_date($data->cheque_date)}} @endif
                                                    <br>
                                                    <b>@lang('lang_v1.account_number')
                                                        :</b> @if(!empty($bank_account)){{$bank_account->account_number}} @endif <br>
                                                @elseif($transaction_payment->method == 'direct_bank_deposit' )
                                                    @php
                                                        $bank_account = App\Account::find($transaction_payment->account_id);
                                                    @endphp
                                                    <b>@lang('lang_v1.direct_bank_deposit')</b><br>
                                                    <b>@lang('lang_v1.bank_name')
                                                        :</b> @if(!empty($bank_account)) {{$bank_account->name}} @endif <br>
                                                @elseif($transaction_payment->method == 'cheque')
                                                    <b>@lang('lang_v1.cheque_number'):</b> {{$data->cheque_number}} <br>
                                                    <b>@lang('lang_v1.cheque_date')
                                                        :</b> @if(!empty($data->cheque_date)){{@format_date($data->cheque_date)}} @endif
                                                    <br>
                                                @else
                                                    {{ucfirst($transaction_payment->method)}}
                                                @endif
                                            @endif
                                        @endif
                                    </td>
                                @endif
                            </tr>
                            @endif
                        @endforeach
                
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
$(document).ready( function(){
    $('#ledger_date_range').daterangepicker(dateRangeSettings);
    $('.refresh-data').on('change',function(){
        $('#ledger_form').submit();
    });
    
});
</script>
@endsection