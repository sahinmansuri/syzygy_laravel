<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>F16A</title>
    {{-- @include('layouts.partials.css') --}}
</head>
<style>

    table {
        border-collapse: collapse;
    }
    table tbody td {
        border: 1px solid black; 
    }
    table thead th {
        border: 1px solid black; 
    }
    th{
        font-size: 13px;
    }
    td{
        font-size: 13px;
    }
</style>
<body>
   <section class="content">
   
    <div class="row">
        <div class="col-md-12">
               <div class="row d-none">
                      <div class="col-md-3 text-right pull-right" style="margin-top: 1px;">
                    
                         <div class="form-group">
                         
                            {!! Form::text('form_16a_date_range', @format_date('first day of this month') . ' ~ ' .
                            @format_date('last
                            day of this month') , ['placeholder' => __('lang_v1.select_a_date_range'), 'class' =>
                            'form-control', 'id' => 'form_16a_date_range', 'readonly']); !!}
                             </div>
                        </div>
                   
                    </div>
            @component('components.widget', ['class' => 'box-primary'])
            <div class="col-md-12">
             <div class="text-center pull-center" style="margin-top: 1px;">
                
                    <h3> <span id="form-supplier">{{ $form_f16a['supplier']}}</span> </h3>
                    </div>
                      <div class="row">
                    <div class="col-md-4 text-red" style="margin-top: 1px;">
                          Invoice No: <span id="form-invoice">{{ $form_f16a['invoice_no']}}</span>
                    </div>
                </div>
                   <div class="row">
                    <div class="col-md-3 text-red" style="margin-top: 1px;">
                         Form No: <span id="form-number">{{ $form_f16a['form_no'] }}</span>
                    </div>
                  <div class="col-md-9 text-right pull-right" style="margin-top: 1px; font-size: 24px; font-weight: bold;">
                        <b>F 16 A  </b>
                    </div>
                </div>
              
                <div class="row">
                      <div class="col-md-3 text-right pull-right" style="margin-top: 1px;">
                   
                         <div class="form-group">
                          <label for="form_16a_date_ranges">{{ __('lang_v1.date') }}:</label>
                          
                             @if (!empty($form_f16a))
                            Date: <span id="form-number">{{ $form_f16a['created_at']}}</span>
                        
                  
                        @else
                                {!! Form::text('form_16a_date_range', @format_date('first day of this month') . ' ~ ' .
                            @format_date('last
                            day of this month') , ['placeholder' => __('lang_v1.select_a_date_range'), 'class' =>
                            'form-control', 'id' => 'form_16a_date_ranges', 'readonly']); !!}
                            
                        @endif
                         
                             </div>
                        </div>
                   
                    </div>
                         
                           
                   
                    <div class="row">
                    <div class="col-md-12 text-center pull-center" style="margin-top: 1px;">
                        <h3>Items Received Statement  -  Filling Station  -  Wholesale Store </h3>
                    </div>
                  
                </div>
             
              
               
                
                <div class="row" style="margin-top: 20px;">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="form_16a_table_listss" style="width:100%">
                               <thead>
                              <col />
                              <colgroup span="2"></colgroup>
                              <colgroup span="2"></colgroup>
                              <tr>
                                <th rowspan="3" class="align-middle text-center" style="vertical-align: bottom;"><b>@lang('mpcs::lang.index_no')</b></th>
                                 <th rowspan="3" class="align-middle text-center" style="vertical-align: bottom;"><b>@lang('mpcs::lang.description')</b></th>
                                  <th rowspan="3" class="align-middle text-center"style="vertical-align: bottom;"><b> @lang('mpcs::lang.received_qty')</b></th>
                                <th colspan="4" scope="colgroup">@lang('mpcs::lang.unit_purchase_price')</th>
                                <th colspan="4" scope="colgroup">@lang('mpcs::lang.total_sale_price')</th>
                                 <th   colspan="2" scope="colgroup">@lang('mpcs::lang.stock_book_no')</th>
                              </tr>
                              <tr>
                                <th scope="col" colspan="2">Unit</th>
                                <th scope="col" colspan="2">Invoice Amount.</th>
                                <th scope="col" colspan="2">One</th>
                                <th scope="col" colspan="2">Whole</th>
                                <th scope="col" rowspan="2"  style="vertical-align: bottom;">No.</th>
                                <th   scope="col" rowspan="2"  style="vertical-align: bottom;">Stock Book</th>
                              </tr>
                              <tr>
                                <th scope="col">Rs.</th>
                                <th scope="col">Cent</th>
                                <th scope="col">Rs.</th>
                                <th scope="col">Cent</th>
                                <th scope="col">Rs.</th>
                                <th scope="col">Cent</th>
                                <th scope="col">Rs.</th>
                                <th scope="col">Cent</th>
                            
                              </tr>
                         </thead>
                          <tbody>
                              @php
                            $totalUnitPurchasePrice = 0;
                            $counter = 0;
                            @endphp
                    
                    
                       <tr>
                                  <td scope="row" class="align-middle text-center"><span id="form-index">{{ $lastRecord['id']}}</span></td>
                                <td class="align-middle text-center">{{ $lastRecord['product'] }}</td>
                                <td class="align-middle text-center">{{  number_format($lastRecord['received_qty'], 0, '.', ',') }} </td>
                                <td class="align-middle text-center" id="unit_price_value">{{  number_format($lastRecord['unit_purchase_price'], 0, '.', ',') }} </td>
                                <td class="align-middle text-center" id="unit_price_decimal"> {{ number_format($lastRecord['unit_purchase_price'] - floor($lastRecord['unit_purchase_price']), 2, '.', '') }}</td>
                               <td class="align-middle text-center" id="unit_price_value1">{{ number_format($lastRecord['total_purchase_price'], 0, '.', ',') }} </td>
                            <td class="align-middle text-center" id="unit_price_decimal1">{{ number_format($lastRecord['total_purchase_price'] - floor($lastRecord['total_purchase_price']), 2, '.', '') }}</td>
                                
                                
                                
                                
                                <td colspan="1" class="align-middle text-center" id="unit_price_value1">{{  number_format($lastRecord['default_sell_price'], 0, '.', ',') }} </td>
                                <td colspan="1" class="align-middle text-center" id="unit_price_decimal1">{{  number_format($lastRecord['default_sell_price'] - floor($lastRecord['default_sell_price']), 2, '.', '')  }}</td>
                                
                                <td colspan="1" class="align-middle text-center" id="unit_price_value1">{{  number_format(($lastRecord['default_sell_price'])*$lastRecord['received_qty'], 0, '.', ',') }} </td>
                                <td colspan="1" class="align-middle text-center" id="unit_price_decimal1">{{  number_format(($lastRecord['default_sell_price'])*$lastRecord['received_qty'] - floor(($lastRecord['default_sell_price'])*$lastRecord['received_qty']) , 2, '.', '')  }}</td>
                                
                                
                                  
                                       @if (!empty($form_f16a))
                                          @if (!empty($edit) )
                                         
                                          
                                          <td><input type="text" class="form-control input_text new_price_value" id="new_price_value" value="{{ $form_f16a['book_no'] ?? '' }}"></td>
                                        <td><input type="text" class="form-control input_text new_price_value2" id="new_price_value2" value="{{ $form_f16a['book_stock'] ?? '' }}"></td>
                                          @else
                                          
                                          <td>{{ $form_f16a['book_no'] ?? '' }}</td>
                                          <td>{{ $form_f16a['book_stock'] ?? '' }}</td>
                                        @endif
                              
                                    @else
                                        <td><input type="text" class="form-control input_text new_price_value" id="new_price_value" value="{{ $form_f16a['book_no'] ?? '' }}"></td>
                                    <td><input type="text" class="form-control input_text new_price_value2" id="new_price_value2" value="{{ $form_f16a['book_stock'] ?? '' }}"></td>
                                        
                                    @endif
                                    
                                   
                                
                                
                              </tr>
                    
                     </tr>
              
                </tbody>
                     <tfoot class="bg-gray">
                                <tr>
                                    <td class="text-red text-bold" colspan="5">@lang('mpcs::lang.total_this_page')</td>
                                    <td class="text-red text-bold" id="footer_F16A_total_purchase_price">{{  number_format($lastRecord['total_purchase_price'] , 0, '.', ',') }}      </td>
                                     <td>{{  number_format($lastRecord['total_purchase_price']  - floor($lastRecord['total_purchase_price']), 2, '.', '')  }} </td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td class="text-red text-bold" id="footer_F16A_total_sale_price">
                                        
                                        
                                    </td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    @if (!empty($form_f16a))
                                        @if (!empty($edit))
                                         <td colspan="1" ><input type="text"   class="form-control input_text grand_book" id="this_book"  value="{{$form_f16a['this_book'] ?? ''}}"></td>
                                        @else
                                           <td> <span id="form-number">{{ $form_f16a['this_book']}}</span></td>
                                        
                                         @endif
                                    @else
                                         <td colspan="1" ><input type="text"   class="form-control input_text grand_book" id="this_book"  value="{{$form_f16a['this_book'] ?? ''}}"></td>
                                        
                                    @endif
                                   
                                </tr>
                                <tr>
                                    <td class="text-red text-bold" colspan="5">@lang('mpcs::lang.total_previous_page')
                                    </td>
                                    <td class="text-red text-bold" id="pre_F16A_total_purchase_price">
                                          @if (!empty($form_f16a))
                                        <span> {{ number_format($form_f16a['last_form_total'], 0, '.', ',') }}   </span>
                                        @endif
                                    </td>
                                     <td>{{  number_format($form_f16a['last_form_total'] - floor($form_f16a['last_form_total']) , 2, '.', '')  }} </td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td class="text-red text-bold" id="pre_F16A_total_sale_price"> </td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                   
                                     @if (!empty($form_f16a))
                                        @if (!empty($edit))
                                         <td colspan="1" ><input type="text"   class="form-control input_text grand_book" id="prev_book"  value="{{$form_f16a['prev_book'] ?? ''}}"></td>
                                        @else
                                           <td> <span id="form-number">{{ $form_f16a['prev_book']}}</span></td>
                                        
                                         @endif
                                    @else
                                          <td colspan="1" ><input type="text"   class="form-control input_text grand_book" id="prev_book"  value="{{$form_f16a['prev_book'] ?? ''}}"></td>
                                        
                                    @endif
                                </tr>
                                <tr>
                                    <td class="text-red text-bold" colspan="5">@lang('mpcs::lang.grand_total')</td>
                                    <td class="text-red text-bold" id="grand_F16A_total_purchase_price">  
                                        @if (!empty($form_f16a))
                                        <span>{{  number_format( $form_f16a['grand_total'] , 0, '.', ',') }}    </span>
                                        @endif
                                    </td>
                                    <td>{{  number_format( $form_f16a['grand_total'] - floor( $form_f16a['grand_total']),2, '.', '')  }}</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td class="text-red text-bold"  id="grand_F16A_total_sale_price"></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                 @if (!empty($form_f16a))
                                        @if (!empty($edit))
                                         <td colspan="1" ><input type="text"   class="form-control input_text grand_book" id="grand_book"  value="{{$form_f16a['grand_book'] ?? ''}}"></td>
                                        @else
                                           <td> <span id="form-number">{{ $form_f16a['grand_book']}}</span></td>
                                        
                                         @endif
                                    @else
                                          <td colspan="1" ><input type="text"   class="form-control input_text grand_book" id="grand_book"  value="{{$form_f16a['grand_book'] ?? ''}}"></td>
                                        
                                    @endif
                                   
                                </tr>
                                <input type="hidden" name="total_this_p" id="total_this_p" value="0">
                                <input type="hidden" name="total_this_s" id="total_this_s" value="0">
                            <input type="hidden" name="this_form" id="this_form_input" value="{{ $lastRecord['total_purchase_price'] }}">
                            @if (!empty($form_f16a))
                                        @if (!empty($edit))
                                         
                                          <input type="hidden" name="this_form_prev" id="this_form_prev" value="{{$form_f16a['last_form_total'] ?? ''}}">
                                     <input type="hidden" name="this_form_grand" id="this_form_grand" value="{{$form_f16a['grand_total'] ?? ''}}">
                                        
                                         @endif
                                    @else
                                          <input type="hidden" name="this_form_prev" id="this_form_prev" value="">
                                   <input type="hidden" name="this_form_grand" id="this_form_grand" value="">
                                        
                                    @endif
                                   
                                   
                            </tfoot>
                   
                            
                            </table>
                        <table class="table table-bordered table-striped" id="form_16a_table" style="width:100%; display:none">
                            
                         
                        </table>
                    </div>
                </div>
            </div>
            @endcomponent
        </div>
    </div>
   <div class="row">
                    <div class="col-md-12 text-center pull-center" style="margin-top: 1px;">
                        Filling Station Store Keeper 
                    </div>
                  
                </div>
                  <div class="row">
                    <div class="col-md-10 text-center pull-right" style="margin-top: 1px;">
                       …………………………………………
                       <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
      <label class="form-check-label" for="flexCheckDefault">  Confirm Correct Receipt of Stocks </label>
                    </div>
                  
                </div>
                  <div class="row">
                    <div class="col-md-4" style="margin-top: 1px;">
                       Entered Correctly: …………………………………………
                    </div>
                  
                </div>
                 <div class="row">
                    <div class="col-md-4" style="margin-top: 1px;">
                       Checked Correctly : …………………………………………
                    </div>
                  
                </div>
                 <div class="row">
                    <div class="col-md-4" style="margin-top: 1px;">
                      Entered balance stock: …………………………………………
                    </div>
                  <div class="col-md-4 text-right" style="margin-top: 1px;">
                     …………………………………………
                  </div>
                </div>
                 
                <div class="row">
                  <div class="col-md-4" style="margin-top: 1px;">
                    Entered Stock Book: …………………………………………
                  </div>
                  <div class="col-md-4 text-right" style="margin-top: 1px;">
                    Signature of the Store Keeper
                  </div>
                </div>
</section>


    {{-- @include('layouts.partials.javascripts') --}}
 
</body>

</html>