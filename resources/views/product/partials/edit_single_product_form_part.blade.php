@if(!session('business.enable_price_tax')) 
  @php
    $default = 0;
    $class = 'hide';
  @endphp
@else
  @php
    $default = null;
    $class = '';
  @endphp
@endif
@php
    $common_settings = session()->get('business.common_settings');
@endphp

<div class="col-sm-12"><br>
    <div class="table-responsive">
    <table class="table table-bordered add-product-price-table table-condensed {{$class}}">
        <tr>
          <th>@lang('product.default_purchase_price')</th>
          <th>@lang('product.profit_percent') @show_tooltip(__('tooltip.profit_percent'))</th>
          <th>@lang('product.default_selling_price')</th>
          <th>@lang('lang_v1.product_image')</th>
        </tr>
        @foreach($product_deatails->variations as $variation )
            @php
                $is_image_required = !empty($common_settings['is_product_image_required']) && count($variation->media) == 0;
            @endphp
            @if($loop->first)
                <tr>
                    <td>
                        <input type="hidden" name="single_variation_id" value="{{$variation->id}}">

                        <div class="col-sm-6">
                          {!! Form::label('single_dpp', trans('product.exc_of_tax') . ':*') !!}

                          {!! Form::text('single_dpp', number_format($variation->default_purchase_price, 6), ['class' => 'form-control input-sm dpp input_number', 'placeholder' => __('product.exc_of_tax'), 'required']); !!}
                        </div>

                        <div class="col-sm-6">
                          {!! Form::label('single_dpp_inc_tax', trans('product.inc_of_tax') . ':*') !!}
                        
                          {!! Form::text('single_dpp_inc_tax', number_format($variation->dpp_inc_tax, 6), ['class' => 'form-control input-sm dpp_inc_tax input_number', 'placeholder' => __('product.inc_of_tax'), 'required']); !!}
                        </div>
                    </td>

                    <td>
                        <br/>
                        {!! Form::text('profit_percent', number_format($variation->profit_percent, 6), ['class' => 'form-control input-sm input_number', 'id' => 'profit_percent', 'required']); !!}
                    </td>

                    <td>
                        <div class="col-sm-6">
                          <label><span class="dsp_label2">@lang('product.exc_of_sales_tax')</span></label>
                          {!! Form::text('single_dsp', number_format($variation->default_sell_price, 6), ['class' => 'form-control input-sm dsp input_number', 'placeholder' => __('product.exc_of_sales_tax'), 'id' => 'single_dsp', 'required']); !!}
                      </div>
                      <div class="col-sm-6">
                          <label><span class="dsp_inc_label2">@lang('product.inc_of_sales_tax')</span></label>
                        {!! Form::text('single_dsp_inc_tax', number_format($variation->sell_price_inc_tax, 6), ['class' => 'form-control input-sm input_number', 'placeholder' => __('product.inc_of_sales_tax'), 'id' => 'single_dsp_inc_tax', 'required']); !!}
                      </div>
    
                    </td>
                    <td>
                        @php 
                            $action = !empty($action) ? $action : '';
                        @endphp
                        @if($action !== 'duplicate')
                            @foreach($variation->media as $media)
                                <div class="img-thumbnail">
                                    <span class="badge bg-red delete-media" data-href="{{ action([\App\Http\Controllers\ProductController::class, 'deleteMedia'], ['media_id' => $media->id])}}"><i class="fas fa-times"></i></span>
                                    {!! $media->thumbnail() !!}
                                </div>
                            @endforeach
                        @endif
                        <div class="form-group">
                            {!! Form::label('variation_images', __('lang_v1.product_image') . ':') !!}
                            {!! Form::file('variation_images[]', ['class' => 'variation_images', 
                                'accept' => 'image/*', 'multiple', 'required' => $is_image_required]); !!}
                            <small><p class="help-block">@lang('purchase.max_file_size', ['size' => (config('constants.document_size_limit') / 1000000)]) <br> @lang('lang_v1.aspect_ratio_should_be_1_1')</p></small>
                        </div>
                    </td>
                </tr>
            @endif
        @endforeach
    </table>
    </div>
</div>