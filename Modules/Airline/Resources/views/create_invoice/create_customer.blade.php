<div class="modal-dialog modal-lg" role="document">

  <div class="modal-content">

    @php

    $form_id = 'contact_add_form_plugin';

    if(isset($quick_add)){

    $form_id = 'quick_add_contact';

    }

    $custom_labels = !empty(session('business.custom_labels')) ? json_decode(session('business.custom_labels'), true) :

    [];

    $contact_fields = !empty(session('business.contact_fields')) ? session('business.contact_fields') : [];

    $business_id = request()->session()->get('user.business_id');

    $type_a = !empty($type) ? $type : 'customer';

    $type = !empty($type) ? $type : 'customer';

    $supplier_groups = App\ContactGroup::where('business_id',$business_id)

                        ->where(function ($query) use ($type) {

                            $query->where('contact_groups.type', 'supplier')

                                ->orWhere('contact_groups.type', 'both');

                        })->pluck('name','id');

                        

    $customer_groups = App\ContactGroup::where('business_id',$business_id)

                        ->where(function ($query) use ($type) {

                            $query->where('contact_groups.type', 'customer')

                                ->orWhere('contact_groups.type', 'both');

                        })->pluck('name','id');

                        

    $both_groups = App\ContactGroup::where('business_id',$business_id)

                        ->where(function ($query) use ($type) {

                            $query->where('contact_groups.type', 'both');

                        })->pluck('name','id');

    

    $is_property = false;

    if(isset($is_property_customer)){

    $is_property = true;

    }



    @endphp

    <form url="{{action('ContactController@store')}}" id="contact_add_form_plugin" accept-charset="UTF-8"  enctype="multipart/form-data">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span

            aria-hidden="true">&times;</span></button>

        <h4 class="modal-title">@lang('contact.add_contact')</h4>

      </div>



      <div class="modal-body">

        <div class="row">



          <div class="col-md-6 contact_type_div">

            <div class="form-group">

              {!! Form::label('type', __('contact.contact_type') . ':*' ) !!}

              <div class="input-group">

                <span class="input-group-addon">

                  <i class="fa fa-user"></i>

                </span>

                {!! Form::select('type', $types, !empty($type) ? $type : null , ['class' => 'form-control', 'id' =>

                'contact_type','placeholder'

                => __('messages.please_select'), 'required']); !!}

              </div>

            </div>

          </div>

          @php

          $type = 'property_customer';

          @endphp

          <div class="col-md-6   ">

            <div class="form-group">

              {!! Form::label('name', __('contact.name') . ':*') !!}

              <div class="input-group">

                <span class="input-group-addon">

                  <i class="fa fa-user"></i>

                </span>

                {!! Form::text('name', null, ['class' => 'form-control','placeholder' => __('contact.name'), 'required']);

                !!}

              </div>

            </div>

          </div>







          <div class="col-md-4 ">

            <div class="form-group">

              {!! Form::label('contact_id', __('lang_v1.contact_id') . ':') !!}

              <div class="input-group">

                <span class="input-group-addon">

                  <i class="fa fa-id-badge"></i>

                </span>

                {!! Form::text('contact_id', $contact_id, ['class' => 'form-control','placeholder' =>

                __('lang_v1.contact_id'), 'readonly']); !!}

              </div>

            </div>

          </div>



          <div

            class="col-md-4 @if($is_property && !array_key_exists('property_customer_tax_number', $contact_fields)) hide @endif  @if($type=='customer' && !array_key_exists('customer_tax_number', $contact_fields)) hide @endif @if($type=='supplier' && !array_key_exists('supplier_tax_number', $contact_fields)) hide @endif">

            <div class="form-group">

              {!! Form::label('tax_number', __('contact.tax_no') . ':') !!}

              <div class="input-group">

                <span class="input-group-addon">

                  <i class="fa fa-info"></i>

                </span>

                {!! Form::text('tax_number', null, ['class' => 'form-control', 'placeholder' => __('contact.tax_no')]);

                !!}

              </div>

            </div>

          </div>



          <div class="col-md-4 ">

            <div class="form-group">

              {!! Form::label('opening_balance', __('lang_v1.opening_balance') . ':') !!}

              <div class="input-group">

                <span class="input-group-addon">

                  <i class="fa fa-money"></i>

                </span>

                {!! Form::text('opening_balance', 0, ['class' => 'form-control input_number']); !!}

              </div>

            </div>

          </div>



          <div

            class="col-md-4  @if($is_property && !array_key_exists('property_customer_pay_term', $contact_fields)) hide @endif   @if($type=='customer' && !array_key_exists('customer_pay_term', $contact_fields)) hide @endif @if($type=='supplier' && !array_key_exists('supplier_pay_term', $contact_fields)) hide @endif">

            <div class="form-group">

              <div class="multi-input">

                {!! Form::label('pay_term_number', __('contact.pay_term') . ':') !!} @show_tooltip(__('tooltip.pay_term'))

                <br />

                {!! Form::number('pay_term_number', null, ['class' => 'form-control width-40 pull-left input_number',

                'placeholder' =>

                __('contact.pay_term')]); !!}



                {!! Form::select('pay_term_type', ['months' => __('lang_v1.months'), 'days' => __('lang_v1.days')], '',

                ['class' => 'form-control width-60 pull-left','placeholder' => __('messages.please_select')]); !!}

              </div>

            </div>

          </div>



          <div

            class="col-md-4 customer_fields  @if($is_property && !array_key_exists('property_customer_customer_group', $contact_fields)) hide @endif  @if($type=='customer' && !array_key_exists('customer_customer_group', $contact_fields)) hide backend_hide @endif">

            <div class="form-group">

              {!! Form::label('customer_group_id', __('lang_v1.customer_group') . ':') !!}

              <div class="input-group">

                <span class="input-group-addon">

                  <i class="fa fa-users"></i>

                </span>

                {!! Form::select('customer_group_id', $customer_groups, '', ['class' => 'form-control']); !!}

              </div>

            </div>

          </div>

          

          <div

            class="col-md-4 supplier_fields">

            <div class="form-group">

              {!! Form::label('supplier_group_id', __('lang_v1.supplier_group') . ':') !!}

              <div class="input-group">

                <span class="input-group-addon">

                  <i class="fa fa-users"></i>

                </span>

                {!! Form::select('supplier_group_id', ($type_a == 'supplier') ? $supplier_groups : $customer_groups, '', ['class' => 'form-control']); !!}

              </div>

            </div>

          </div>

          

          <div

            class="col-md-4 customer_fields  @if($type=='customer' && !array_key_exists('customer_credit_limit', $contact_fields)) hide backend_hide @endif @if($type=='supplier' && !array_key_exists('supplier_credit_limit', $contact_fields)) hide backend_hide @endif">

            <div class="form-group">

              {!! Form::label('credit_limit', __('lang_v1.credit_limit') . ':') !!}

              <div class="input-group">

                <span class="input-group-addon">

                  <i class="fa fa-money"></i>

                </span>

                {!! Form::text('credit_limit', null, ['class' => 'form-control input_number']); !!}

              </div>

              <p class="help-block">@lang('lang_v1.credit_limit_help')</p>

            </div>

          </div>



          <div

            class="col-md-4 customer_fields  @if($type=='customer' && !array_key_exists('customer_password', $contact_fields)) hide backend_hide @endif ">

            <div class="form-group">

              {!! Form::label('password', __('business.password') . ':*') !!}

              <div class="input-group">

                <span class="input-group-addon">

                  <i class="fa fa-key"></i>

                </span>



                {!! Form::password('password', ['class' => 'form-control', 'id' => 'password','placeholder' =>

                __('business.password')]); !!}

              </div>

              <p class="help-block">At least 6 character.</p>

            </div>

          </div>

          <div

            class="col-md-4 customer_fields  @if($type=='customer' && !array_key_exists('customer_confirm_password', $contact_fields)) hide backend_hide @endif ">

            <div class="form-group">

              {!! Form::label('confirm_password', __('business.confirm_password') . ':*') !!}

              <div class="input-group">

                <span class="input-group-addon">

                  <i class="fa fa-key"></i>,

                </span>

                {!! Form::password('confirm_password', ['class' => 'form-control', 'id' => 'confirm_password',

                'placeholder' => __('business.confirm_password')]); !!}

              </div>

              <p class="help-block">At least 6 character.</p>

            </div>

          </div>



          <div class="col-md-4 ">

            <div class="form-group">

              {!! Form::label('transaction_date', __('lang_v1.transaction_date') . ':') !!}

              <div class="input-group">

                <span class="input-group-addon">

                  <i class="fa fa-calendar"></i>

                </span>

                {!! Form::text('transaction_date', null, ['class' => 'form-control input_number', 'id' =>

                'transaction_date_contact']); !!}

              </div>



            </div>

          </div>

          <input type="hidden" name="property_id_value"  value="<?php

                                                                    if(isset($_GET['property_id']))

                                                                    {

                                                                      echo $_GET['property_id'];

                                                                    } else {

                                                                          echo 1;

                                                                    }

                                                                      ?>

                                                          ">

          <div class="col-md-12">

            <hr />

          </div>

          <div

            class="col-md-3  @if($type=='customer' && !array_key_exists('customer_email', $contact_fields)) hide @endif @if($type=='supplier' && !array_key_exists('supplier_email', $contact_fields)) hide @endif">

            <div class="form-group">

              {!! Form::label('email', __('business.email') . ':') !!}

              <div class="input-group">

                <span class="input-group-addon">

                  <i class="fa fa-envelope"></i>

                </span>

                {!! Form::email('email', null, ['class' => 'form-control','placeholder' => __('business.email')]); !!}

              </div>

            </div>

          </div>

          <div

            class="col-md-3  @if($type=='customer' && !array_key_exists('customer_mobile', $contact_fields)) hide @endif @if($type=='supplier' && !array_key_exists('supplier_mobile', $contact_fields)) hide @endif">

            <div class="form-group">

              {!! Form::label('mobile', __('contact.mobile') . ':*') !!}

              <div class="input-group">

                <span class="input-group-addon">

                  <i class="fa fa-mobile"></i>

                </span>

                {!! Form::text('mobile', null, ['class' => 'form-control input_number', 'required', 'placeholder' =>

                __('contact.mobile')]); !!}

              </div>

            </div>

          </div>

          <div

            class="col-md-3  @if($type=='customer' && !array_key_exists('customer_alternate_contact_number', $contact_fields)) hide @endif @if($type=='supplier' && !array_key_exists('supplier_alternate_contact_number', $contact_fields)) hide @endif">

            <div class="form-group">

              {!! Form::label('alternate_number', __('contact.alternate_contact_number') . ':') !!}

              <div class="input-group">

                <span class="input-group-addon">

                  <i class="fa fa-phone"></i>

                </span>

                {!! Form::text('alternate_number', null, ['class' => 'form-control input_number', 'placeholder' =>

                __('contact.alternate_contact_number')]); !!}

              </div>

            </div>

          </div>

          <div

            class="col-md-3  @if($type=='customer' && !array_key_exists('customer_landline', $contact_fields)) hide @endif @if($type=='supplier' && !array_key_exists('supplier_landline', $contact_fields)) hide @endif">

            <div class="form-group">

              {!! Form::label('landline', __('contact.landline') . ':') !!}

              <div class="input-group">

                <span class="input-group-addon">

                  <i class="fa fa-phone"></i>

                </span>

                {!! Form::text('landline', null, ['class' => 'form-control input_number', 'placeholder' =>

                __('contact.landline')]);

                !!}

              </div>

            </div>

          </div>

          <div class="col-md-6">

            <div class="form-group">

              {!! Form::label('assigned_to', __('lang_v1.assigned_to')) !!}

              <div class="input-group">

                <span class="input-group-addon">

                  <i class="fa fa-user"></i>

                </span>

                {!! Form::select('assigned_to', $user_groups??[], null, ['class' => 'form-control select2']); !!}

              </div>

            </div>

          </div>

          <div class="col-md-6">

            <div class="form-group">

              {!! Form::label('vehicle_no','Vehicle No') !!}

              <div class="input-group">

                <span class="input-group-addon">

                  <i class="fa fa-user"></i>

                </span>

                {!! Form::text('vehicle_no', null, ['class' => 'form-control', 'placeholder' =>'Enter Vehicle Number']); !!}

              </div>

            </div>

          </div>

        <div

            class="col-md-12  @if($type=='customer' && !array_key_exists('customer_address', $contact_fields)) hide @endif @if($type=='supplier' && !array_key_exists('supplier_address', $contact_fields)) hide @endif">

            <div class="form-group">

              {!! Form::label('address', __('contact.address') . ':') !!}

              <div class="input-group">

                <span class="input-group-addon">

                  <i class="fa fa-phone"></i>

                </span>

                {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' =>

                __('contact.address')]);

                !!}

              </div>

            </div>

          </div>



          <div

            class="col-md-3  @if($type=='customer' && !array_key_exists('customer_city', $contact_fields)) hide @endif @if($type=='supplier' && !array_key_exists('supplier_city', $contact_fields)) hide @endif">

            <div class="form-group">

              {!! Form::label('city', __('business.city') . ':') !!}

              <div class="input-group">

                <span class="input-group-addon">

                  <i class="fa fa-map-marker"></i>

                </span>

                {!! Form::text('city', null, ['class' => 'form-control', 'placeholder' => __('business.city')]); !!}

              </div>

            </div>

          </div>

          <div

            class="col-md-3  @if($type=='customer' && !array_key_exists('customer_state', $contact_fields)) hide @endif @if($type=='supplier' && !array_key_exists('supplier_state', $contact_fields)) hide @endif">

            <div class="form-group">

              {!! Form::label('state', __('business.state') . ':') !!}

              <div class="input-group">

                <span class="input-group-addon">

                  <i class="fa fa-map-marker"></i>

                </span>

                {!! Form::text('state', null, ['class' => 'form-control', 'placeholder' => __('business.state')]); !!}

              </div>

            </div>

          </div>

          <div

            class="col-md-3  @if($type=='customer' && !array_key_exists('customer_country', $contact_fields)) hide @endif @if($type=='supplier' && !array_key_exists('supplier_country', $contact_fields)) hide @endif">

            <div class="form-group">

              {!! Form::label('country', __('business.country') . ':') !!}

              <div class="input-group">

                <span class="input-group-addon">

                  <i class="fa fa-globe"></i>

                </span>

                {!! Form::text('country', null, ['class' => 'form-control', 'placeholder' => __('business.country')]); !!}

              </div>

            </div>

          </div>

          <div

            class="col-md-3  @if($type=='customer' && !array_key_exists('customer_landmark', $contact_fields)) hide @endif @if($type=='supplier' && !array_key_exists('supplier_landmark', $contact_fields)) hide @endif">

            <div class="form-group">

              {!! Form::label('landmark', __('business.landmark') . ':') !!}

              <div class="input-group">

                <span class="input-group-addon">

                  <i class="fa fa-map-marker"></i>

                </span>

                {!! Form::text('landmark', null, ['class' => 'form-control',

                'placeholder' => __('business.landmark')]); !!}

              </div>

            </div>

          </div>

          <div>

              

          <div class="col-md-12 customer_fields">

              <div class="col-md-4">

                <div class="form-group">

                  {!! Form::label('nic_number',__('contact.passport_no')) !!}

                  <div class="input-group">

                    <span class="input-group-addon">

                      <i class="fa fa-user"></i>

                    </span>

                    {!! Form::text('nic_number', null, ['class' => 'form-control', 'placeholder' =>__('contact.passport_no')]); !!}

                  </div>

                </div>

              </div>

          

              <div class="col-md-4">

                <div class="form-group">

                  {!! Form::label('image',__('contact.passport_image')) !!}

                  {!! Form::file('image', ['id' => 'image','accept' => 'image/*']); !!}

                </div>

              </div>

      

              <div  class="col-md-4 ">

                <div class="form-group">

                  {!! Form::label('signature', __('contact.signature')) !!}

                  {!! Form::file('signature', ['id' => 'signature','accept' => 'image/*']); !!}

                </div>

              </div>

          </div>



            <div class="col-md-12">

              <hr />

            </div>

            <div class="customer_custom_fields">

              <div

                class="col-md-3 customer_fields  @if($is_property && !array_key_exists('property_customer_custom_field_1', $contact_fields)) hide @endif  @if($type=='customer' && !array_key_exists('customer_custom_field_1', $contact_fields)) hide @endif @if($type=='supplier' && !array_key_exists('supplier_custom_field_1', $contact_fields)) hide @endif">

                <div class="form-group">

                  {!! Form::label('custom_field1', !empty($custom_labels['custom_field']['custom_field_1']) ?

                  $custom_labels['custom_field']['custom_field_1'] : 'Customer Field 1' . ':') !!}

                  {!! Form::text('custom_field1', null, ['class' => 'form-control',

                  'placeholder' => !empty($custom_labels['custom_field']['custom_field_1']) ?

                  $custom_labels['custom_field']['custom_field_1'] : 'Customer Field 1']); !!}

                </div>

              </div>

              <div

                class="col-md-3 customer_fields  @if($is_property && !array_key_exists('property_customer_custom_field_2', $contact_fields)) hide @endif  @if($type=='customer' && !array_key_exists('customer_custom_field_2', $contact_fields)) hide @endif @if($type=='supplier' && !array_key_exists('supplier_custom_field_2', $contact_fields)) hide @endif">

                <div class="form-group">

                  {!! Form::label('custom_field2', !empty($custom_labels['custom_field']['custom_field_2']) ?

                  $custom_labels['custom_field']['custom_field_2'] : 'Customer Field 2' . ':') !!}

                  {!! Form::text('custom_field2', null, ['class' => 'form-control',

                  'placeholder' =>!empty($custom_labels['custom_field']['custom_field_2']) ?

                  $custom_labels['custom_field']['custom_field_2'] : 'Customer Field 2']); !!}

                </div>

              </div>

              <div

                class="col-md-3 customer_fields  @if($is_property && !array_key_exists('property_customer_custom_field_3', $contact_fields)) hide @endif  @if($type=='customer' && !array_key_exists('customer_custom_field_3', $contact_fields)) hide @endif @if($type=='supplier' && !array_key_exists('supplier_custom_field_3', $contact_fields)) hide @endif">

                <div class="form-group">

                  {!! Form::label('custom_field3', !empty($custom_labels['custom_field']['custom_field_3']) ?

                  $custom_labels['custom_field']['custom_field_3'] : 'Customer Field 3' . ':') !!}

                  {!! Form::text('custom_field3', null, ['class' => 'form-control',

                  'placeholder' => !empty($custom_labels['custom_field']['custom_field_3']) ?

                  $custom_labels['custom_field']['custom_field_3'] : 'Customer Field 3']); !!}

                </div>

              </div>

              <div

                class="col-md-3 customer_fields  @if($is_property && !array_key_exists('property_customer_custom_field_4', $contact_fields)) hide @endif  @if($type=='customer' && !array_key_exists('customer_custom_field_4', $contact_fields)) hide @endif @if($type=='supplier' && !array_key_exists('supplier_custom_field_4', $contact_fields)) hide @endif">

                <div class="form-group">

                  {!! Form::label('custom_field4', !empty($custom_labels['custom_field']['custom_field_4']) ?

                  $custom_labels['custom_field']['custom_field_4'] : 'Customer Field 4' . ':') !!}

                  {!! Form::text('custom_field4', null, ['class' => 'form-control',

                  'placeholder' => !empty($custom_labels['custom_field']['custom_field_4']) ?

                  $custom_labels['custom_field']['custom_field_4'] : 'Customer Field 4']); !!}

                </div>

              </div>

            </div>

          </div>



        

      </div>

      <div class="modal-footer">

        <button type="submit" class="btn btn-primary">@lang( 'messages.save' )</button>

        <button type="button" class="btn btn-default" data-dismiss="modal">@lang( 'messages.close' )</button>

      </div>



    </form>



  </div><!-- /.modal-content -->

</div><!-- /.modal-dialog -->

<script>

  $('#contact_add_form_plugin').submit(function(e) {

      e.preventDefault();

  }).validate({

      rules: {

          contact_id: {

              remote: {

                  url: '/contacts/check-contact-id',

                  type: 'post',

                  data: {

                      contact_id: function() {

                          return $('#contact_id').val();



                      },



                      hidden_id: function() {

                          if ($('#hidden_id').length) {

                              return $('#hidden_id').val();

                          } else {

                              return '';



                          }



                      },



                  },



              },



          },



      },



      messages: { contact_id: { remote: LANG.contact_id_already_exists } },



      submitHandler: function(form) {

          $.ajax({

              method: 'POST',

              url: base_path + '/check-mobile',

              dataType: 'json',

              data: {

                  contact_id: function() {

                      return $('#hidden_id').val();

                  },

                  mobile_number: function() {

                      return $('#mobile').val();

                  },

              },

              beforeSend: function(xhr) {

                  __disable_submit_button($(form).find('button[type="submit"]'));

              },

              success: function(result) {



                  if (result.is_mobile_exists == true) {

                      swal({

                          title: LANG.sure,

                          text: result.msg,

                          icon: 'warning',

                          buttons: true,

                          dangerMode: true,

                      }).then(willContinue => {

                          if (willContinue) {

                              submitAddContactFormCustomer(form);

                          } else {

                              $('#mobile').select();

                          }

                      });



                  } else {

                      submitAddContactFormCustomer(form);

                  }

              },

          });

      },



  });

  function submitAddContactFormCustomer(form) {

    var data = $(form).serialize();

    // console.log($(form).attr('action'));

    

    // $(form).find('button[type="submit"]').attr('disabled', true);



    $.ajax({

          method: 'POST',

          url: $(form).attr('url'),

          dataType: 'json',

          contentType: false,

          processData: false,

          cache:false,

          encode: true,

          data:  new FormData(form),

          success: function(result) {



              if (result.success == true) {



                  $('div.contact_modal').modal('hide');



                  toastr.success(result.msg);



                  if(!isNaN(parseInt($('#customer_group_select').val()))) {

                    $('#customer_select').append($('<option>').text(result.data.name).val(result.data.id))

                    $('#customer_select').val(result.data.id).trigger('change');

                  }

              } else {



                  toastr.error(result.msg);



              }



          },



    });

  }

// $('select#contact_type').change(function() {

//     console.log("{{json_encode($supplier_groups)}}");

// });



  $('#transaction_date_contact').datepicker({

      autoclose: true,

      format: datepicker_date_format,

  });



</script>