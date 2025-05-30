<!-- Main content -->
<section class="content">
    {!! Form::open(['action' => '\Modules\Stocktaking\Http\Controllers\F22FormController@saveF22Form', 'method' =>
    'post', 'id' =>
    'f22_form']) !!}
    <div class="row">
        <div class="col-md-12">
            @component('components.filters', ['title' => __('report.filters')])

            <div class="col-md-3" id="location_filter">
                <div class="form-group">
                    {!! Form::label('f22_location_id', __('purchase.business_location') . ':') !!}
                    {!! Form::select('f22_location_id', $business_locations, null, ['class' => 'form-control select2',
                    'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); !!}
                </div>
            </div>
            <div class="col-md-3" id="location_filter">
                <div class="form-group">
                    {!! Form::label('f22_product_id', __('Stocktaking::lang.product') . ':') !!}
                    {!! Form::select('f22_product_id', $products, null, ['class' => 'form-control select2',
                    'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); !!}
                </div>
            </div>


            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('type', __('Stocktaking::lang.form_no') . ':') !!}
                    {!! Form::text('F22_from_no', $F22_from_no, ['class' => 'form-control', 'readonly']) !!}
                </div>
            </div>


            @endcomponent
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @component('components.widget', ['class' => 'box-primary'])
            <div class="row">
                <div class="col-md-3">
                    {!! Form::label('manager_name', __('Stocktaking::lang.manager_name'), ['']) !!}
                    {!! Form::text('manager_name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-3 pull-right">
                    <button type="submit" name="submit_type" id="f22_save_and_print" value="save_and_print"
                        class="btn btn-primary pull-right"
                        style="margin-left: 20px">@lang('Stocktaking::lang.save_and_print')</button>
                    <button type="submit" name="submit_type" id="f22_print" value="print"
                        class="btn btn-primary pull-right">@lang('Stocktaking::lang.print')</button>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-5">
                        <div class="text-center">
                            <h5 style="font-weight: bold;">{{request()->session()->get('business.name')}} <br>
                                <span class="f22_location_name">@lang('petro::lang.all')</span></h5>
                                <input type="hidden" name="f22_location_name" id="f22_location_name" value="All">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="text-center pull-left">
                            <h5 style="font-weight: bold;" class="text-red">@lang('Stocktaking::lang.f22_form')
                                @lang('Stocktaking::lang.form_no') : {{$F22_from_no}}</h5>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
                <div class="row" style="margin-top: 20px;">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="form_22_table">
                            <thead>
                                <tr>
                                    <th>@lang('Stocktaking::lang.index_no')</th>
                                    <th>@lang('Stocktaking::lang.code')</th>
                                    <th>@lang('Stocktaking::lang.book_no')</th>
                                    <th>@lang('Stocktaking::lang.product')</th>
                                    <th>@lang('Stocktaking::lang.current_stock')</th>
                                    <th>@lang('Stocktaking::lang.stock_count')</th>
                                    <th>@lang('Stocktaking::lang.unit_purchase_price')</th>
                                    <th>@lang('Stocktaking::lang.total_purchase_price')</th>
                                    <th>@lang('Stocktaking::lang.unit_sale_price')</th>
                                    <th>@lang('Stocktaking::lang.total_sale_price')</th>
                                    <th>@lang('Stocktaking::lang.qty_difference')</th>
                                    <th>@lang('Stocktaking::lang.difference_value')</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr class="bg-gray">
                                    <td class="text-red text-bold" colspan="7">@lang('Stocktaking::lang.total_this_page')</td>
                                    <td class="text-red text-bold" id="footer_total_purchase_price"></td>
                                    <td>&nbsp;</td>
                                    <td class="text-red text-bold" colspan="3" id="footer_total_sale_price"></td>
                                </tr>
                                <tr class="bg-gray">
                                    <td class="text-red text-bold" colspan="7">@lang('Stocktaking::lang.total_previous_page')
                                    </td>
                                    <td class="text-red text-bold" id="pre_total_purchase_price"></td>
                                    <td>&nbsp;</td>
                                    <td class="text-red text-bold" colspan="3" id="pre_total_sale_price"></td>
                                </tr>
                                <tr class="bg-gray">
                                    <td class="text-red text-bold" colspan="7">@lang('Stocktaking::lang.grand_total')</td>
                                    <td class="text-red text-bold" id="grand_total_purchase_price"></td>
                                    <td>&nbsp;</td>
                                    <td class="text-red text-bold" colspan="3" id="grand_total_sale_price"></td>
                                </tr>
                                <tr>
                                    <td colspan="12"> @lang('Stocktaking::lang.confirm_f22')</td>
                                </tr>
                                <tr>
                                    <td colspan="7"><h5 style="font-weight: bold; margin-bottom: 0px; ">
                                        @lang('Stocktaking::lang.checked_by'): ____________</h5></td>
                                        <td colspan="5"><h5 style="font-weight: bold; margin-bottom: 0px; ">
                                            @lang('Stocktaking::lang.received_by'): ____________</h5> <br></td>
                                </tr>
                                <tr>
                                    <td colspan="7"> <h5 style="font-weight: bold; margin-bottom: 0px; ">
                                        @lang('Stocktaking::lang.signature_of_manager'): ____________</h5></td>
                                        <td colspan="5">
                                            <h5 style="font-weight: bold; margin-bottom: 0px; ">
                                                @lang('Stocktaking::lang.handed_over_by'): ____________</h5>
                                        </td>
                                </tr>
                                <tr>
                                    <td colspan="12"> <h5 style="font-weight: bold; margin-top: 10px; ">@lang('Stocktaking::lang.user'):
                                        {{auth()->user()->username }}</h5></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <input type="hidden" name="purchase_price1" id="purchase_price1" value="">
                <input type="hidden" name="sales_price1" id="sales_price1" value="">
                <input type="hidden" name="purchase_price2" id="purchase_price2" value="">
                <input type="hidden" name="sales_price2" id="sales_price2" value="">
                <input type="hidden" name="purchase_price3" id="purchase_price3" value="">
                <input type="hidden" name="sales_price3" id="sales_price3" value="">
            </div>

            @endcomponent
        </div>
    </div>
    
</section>
<!-- /.content -->