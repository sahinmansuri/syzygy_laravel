@extends('layouts.app')
@section('title', __('lang_v1.payment_accounts'))

@section('content')


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

<link rel="stylesheet"
    href="{{ asset('plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css?v='.$asset_v) }}">

<!-- Content Header (Page header) -->

<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">@lang('account.manage_your_account')</h4>
                <ul class="breadcrumbs pull-left" style="margin-top: 15px">
                    <li><a href="#">@lang('lang_v1.payment_accounts')</a></li>
                    <li><span>@lang('account.manage_your_account')</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content main-content-inner">
    @can('account.access')
    <div class="row">
        <div class="col-sm-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="@if(empty(session('status.tab'))) active @endif">
                        <a href="#other_accounts" data-toggle="tab">
                            <i class="fa fa-book"></i> <strong>@lang('account.list_accounts')</strong>
                        </a>
                    </li>

                    <li>
                        <a href="#account_types" data-toggle="tab">
                            <i class="fa fa-list"></i> <strong>
                                @lang('lang_v1.account_types') </strong>
                        </a>
                    </li>

                    <li>
                        <a href="#account_groups" data-toggle="tab">
                            <i class="fa fa-object-group"></i> <strong>
                                @lang('lang_v1.account_groups') </strong>
                        </a>
                    </li>
                    @can('account.settings')
                    <li>
                        <a href="#account_settings" data-toggle="tab">
                            <i class="fa fa-cogs"></i> <strong>
                                @lang('lang_v1.account_settings') </strong>
                        </a>
                    </li>
                    @endcan
                    <li class="@if(session('status.tab') == 'list_deposit_transfer') active @endif">
                        <a href="#list_deposit_transfer" data-toggle="tab">
                            <i class="fa fa-list"></i> <strong>
                                @lang('lang_v1.list_deposit_transfer') </strong>
                        </a>
                    </li>
                    
                    <li class="@if(session('status.tab') == 'cheques_ob_details') active @endif">
                        <a href="#cheques_ob_details" data-toggle="tab">
                            <i class="fa fa-list"></i> <strong>
                                @lang('lang_v1.cheques_ob_details') </strong>
                        </a>
                    </li>
                    
                </ul>
                <div class="tab-content">
                    <div class="tab-pane @if(empty(session('status.tab'))) active @endif" id="other_accounts">
                        <div class="row">
                          
                            <div class="col-md-12">
                                <div class="row">
                                    <button style="margin-right: 25px;" type="button" id="add_button"
                                        class="btn btn-sm btn-primary btn-modal pull-right"
                                        data-container=".account_model"
                                        data-href="{{action('AccountController@create')}}">
                                        <i class="fa fa-plus"></i> @lang( 'messages.add' )</button>
                                    <button style="margin-right: 25px;"
                                        data-href="{{action('AccountController@getDeposit', ['card'])}}"
                                        class="btn btn-sm btn-warning btn-modal  pull-right deposit_btn"
                                        data-container=".account_model"><i class="fa fa-money"></i>
                                        @lang("account.card_deposit")</button>

                                    <button style="margin-right: 25px;"
                                        data-href="{{action('AccountController@getChequeDeposit')}}"
                                        class="btn btn-sm btn-info btn-modal  pull-right deposit_btn"
                                        data-container=".account_model"><i class="fa fa-address-card-o"></i>
                                        @lang("account.cheque_deposit")</button>
                                    
                                   @if(!empty($pacakge_details['realize_cheque']))
                                        @can('deposits.realize_cheque')    
                                            <button style="margin-right: 25px;"
                                                data-href="{{action('AccountController@getRealizeChequeDeposit')}}"
                                                class="btn btn-sm btn-danger btn-modal  pull-right deposit_btn"
                                                data-container=".account_model"><i class="fa fa-address-card-o"></i>
                                                @lang("account.realize_cheque")</button>
                                        @endcan
                                    @endif
                                        
                                        
                                    <button style="margin-right: 25px;"
                                        data-href="{{action('AccountController@getDeposit', ['cash'])}}"
                                        class="btn btn-sm btn-success btn-modal  pull-right deposit_btn"
                                        data-container=".account_model"><i class="fa fa-money"></i>
                                        @lang("account.cash_deposit")</button>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                            @component('components.filters', ['title' => __('report.filters')])
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::label('account_type',  __('Account Type') . ':') !!}
                                        {!! Form::select('account_type', $account_types_opts, null, ['id'=>'account_type','class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); !!}
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::label('account_sub_type',  __('Account Sub Type') . ':') !!}
                                        {!! Form::select('account_sub_type', $sub_acn_arr, null, ['id'=>'account_sub_type','class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); !!}
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::label('account_group',  __('Account Group') . ':') !!}
                                        {!! Form::select('account_group', $account_groups, null, ['id'=>'account_group','class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); !!}
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::label('account_name',  __('Account Name') . ':') !!}
                                        {!! Form::select('account_name', $accounts, null, ['id'=>'account_name','class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); !!}
                                    </div>
                                </div>
                                
                                <div class="clearfix"></div>
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::label('location_id',  __('lang_v1.location') . ':') !!}
                                        {!! Form::select('location_id', $_business_locations, null, ['id'=>'list_accounts_location_id','class' => 'form-control select2', 'style' => 'width:100%']); !!}
                                    </div>
                                </div>

                            @endcomponent
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <br>
                                <table class="table table-bordered table-striped" id="other_account_table"
                                    style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>@lang( 'lang_v1.name' )</th>
                                            <th>@lang( 'lang_v1.location' )</th>
                                            <th>@lang( 'lang_v1.account_type' ) / @lang( 'lang_v1.account_sub_type' )</th>
                                            <th>@lang( 'account.account_group' )</th>
                                            <th>@lang( 'account.parent_account' )</th>
                                            <th>@lang('account.account_number')</th>
                                            <th>@lang('lang_v1.balance')</th>
                                       
                                            <th class="notexport">@lang( 'messages.action' )</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="account_types">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary btn-modal pull-right" @if(!$account_access)
                                    disabled @endif data-href="{{action('AccountTypeController@create')}}"
                                    data-container="#account_type_modal">
                                    <i class="fa fa-plus"></i> @lang( 'messages.add' )</button>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered" id="account_types_table"
                                    style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>@lang( 'lang_v1.name' )</th>
                                            <th>@lang( 'messages.action' )</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($account_types as $account_type)
                                        <tr class="account_type_{{$account_type->id}}">
                                            <th>{{$account_type->name}}</th>
                                            <td>

                                                {!! Form::open(['url' => action('AccountTypeController@destroy',
                                                $account_type->id), 'method' => 'delete' ]) !!}
                                                <button type="button" class="btn btn-primary btn-modal btn-xs"
                                                    data-href="{{action('AccountTypeController@edit', $account_type->id)}}"
                                                    data-container="#account_type_modal">
                                                    <i class="fa fa-edit"></i> @lang( 'messages.edit' )</button>

                                                <button type="button" class="btn btn-danger btn-xs delete_account_type">
                                                    <i class="fa fa-trash"></i> @lang( 'messages.delete' )</button>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                        @foreach($account_type->sub_types as $sub_type)
                                        <tr>
                                            <td>&nbsp;&nbsp;-- {{$sub_type->name}}</td>
                                            <td>


                                                {!! Form::open(['url' => action('AccountTypeController@destroy',
                                                $sub_type->id), 'method' => 'delete' ]) !!}
                                                <button type="button" class="btn btn-primary btn-modal btn-xs"
                                                    data-href="{{action('AccountTypeController@edit', $sub_type->id)}}"
                                                    data-container="#account_type_modal">
                                                    <i class="fa fa-edit"></i> @lang( 'messages.edit' )</button>
                                                <button type="button" class="btn btn-danger btn-xs delete_account_type">
                                                    <i class="fa fa-trash"></i> @lang( 'messages.delete' )</button>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="account_groups">
                        <div class="row">
                            <!--<div class="col-md-12">-->
                            <!--    <button type="button" class="btn btn-primary btn-modal pull-right" @if(!$account_access)-->
                            <!--        disabled @endif id="add_acount_group_btn"-->
                            <!--        data-href="{{action('AccountGroupController@create')}}"-->
                            <!--        data-container="#account_groups_modal">-->
                            <!--        <i class="fa fa-plus"></i> @lang( 'messages.add' )</button>-->
                            <!--</div>-->
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered" id="account_groups_table"
                                    style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>@lang( 'lang_v1.name' )</th>
                                            <th>@lang( 'lang_v1.account_type_name' )</th>
                                            <th>@lang( 'lang_v1.note' )</th>
                                            <th>@lang( 'messages.action' )</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @can('account.settings')
                    <div class="tab-pane" id="account_settings">
                        @include('account_settings.index')
                    </div>
                    @endcan
                    <div class="tab-pane @if(session('status.tab') == 'list_deposit_transfer') active @endif" id="list_deposit_transfer">
                        @include('account.list_deposit_transfer')
                    </div>
                    
                    <div class="tab-pane @if(session('status.tab') == 'cheques_ob_details') active @endif" id="cheques_ob_details">
                        @include('account.cheques_opening_balance_details')
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcan

    <div class="modal fade account_model"  role="dialog" aria-labelledby="gridSystemModalLabel">
    </div>

    <div class="modal fade"  role="dialog" aria-labelledby="gridSystemModalLabel" id="account_type_modal">
    </div>
    <div class="modal fade"  role="dialog" aria-labelledby="gridSystemModalLabel"
        id="account_groups_modal">
    </div>
</section>
<!-- /.content -->

@endsection

@section('javascript')
<script src="{{ asset('plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js?v=' . $asset_v) }}"></script>
<script>
    
    $(document).on('click','#add_amount',function(){
      var item_element = `
        <div class="form-group col-sm-4 added-amount">
            <div class="input-group">
              {!! Form::number('amount[]', null, ['class' => 'form-control input_amount', 'required','placeholder' => __(
                'sale.amount'),'step' => 'any']); !!}
              <span  class="input-group-addon bg-danger remove_amount"> - </span>
            </div>
          </div>
      `;
      
      $("#amounts_row").append(item_element);
  });
  
    $(document).ready(function(){
        var body = document.getElementsByTagName("body")[0];
        
        body.className += " sidebar-collapse";
        
            $(document).on('click', 'button.close_account', function(){
                var rowData = other_account_table.row($(this).closest('tr')).data(); 
                var accountName = rowData.name; 
                swal({
                    title: "You are going to Close this " + accountName + " Account",
                    text: "This cannot be reversed again. Are you sure to close this account?",
                    icon: "warning",
                    buttons: {
                        cancel: {
                            text: "No",
                            value: false,
                            visible: true,
                            className: "btn btn-primary"
                        },
                        confirm: {
                            text: "Yes",
                            value: true,
                            visible: true,
                            className: "btn btn-danger"
                        }
                    },
                    dangerMode: true,
                }).then((willDelete)=>{
                    if(willDelete){
                        var url = $(this).data('url');
                        $.ajax({
                            method: "get",
                            url: url,
                            dataType: "json",
                            success: function(result){
                                if(result.success == true){
                                    toastr.success(result.msg);
                                    other_account_table.ajax.reload();
                                }else{
                                    toastr.error(result.msg);
                                }
                            }
                        });
                    }
                });
            });

        $(document).on('click', 'button.disable_status_account', function(){
            swal({
                title: LANG.sure,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete)=>{
                if(willDelete){
                     var url = $(this).data('url');

                     $.ajax({
                         method: "get",
                         url: url,
                         dataType: "json",
                         success: function(result){
                             if(result.success == true){
                                toastr.success(result.msg);
                                
                                other_account_table.ajax.reload();
                             }else{
                                toastr.error(result.msg);
                            }

                        }
                    });
                }
            });
        });

        $(document).on('submit', 'form#edit_payment_account_form', function(e){
            e.preventDefault();
            var data = $(this).serialize();
            $.ajax({
                method: "POST",
                url: $(this).attr("action"),
                dataType: "json",
                data: data,
                success:function(result){
                    if(result.success == true){
                        $('div.account_model').modal('hide');
                        toastr.success(result.msg);
                        other_account_table.ajax.reload();
                    }else{
                        toastr.error(result.msg);
                    }
                }
            });
        });
        
        $(document).on('submit', 'form#edit_cheque_ob_form', function(e){
            e.preventDefault();
            var data = $(this).serialize();
            $.ajax({
                method: "POST",
                url: $(this).attr("action"),
                dataType: "json",
                data: data,
                success:function(result){
                    if(result.success == true){
                        $('#account_type_modal').modal('hide');
                        toastr.success(result.msg);
                        cheques_ob_details_table.ajax.reload();
                    }else{
                        toastr.error(result.msg);
                    }
                }
            });
        });

        var editIcon = function ( data, type, row ) {
        if ( type === 'display' ) {
        return data + '<i class="fa fa-plus-square" aria-hidden="true"></i>';
        }
        return data;
        };

        $(document).on('submit', 'form#payment_account_form', function(e){
            e.preventDefault();
            var data = $(this).serialize();
            $.ajax({
                method: "post",
                url: $(this).attr("action"),
                dataType: "json",
                data: data,
                success:function(result){
                    if(result.success == true){
                        $('div.account_model').modal('hide');
                        toastr.success(result.msg);
                        
                        other_account_table.ajax.reload();
                    }else{
                        toastr.error(result.msg);
                    }
                }
            });
        });
        var icon ='<i class="fa fa-plus-square" aria-hidden="true"></i>';
        // other_account_table
        other_account_table = $('#other_account_table').DataTable({
            'processing': true,
            'serverSide': false,
            'ajax': {
                url: '/accounting-module/account?account_type=other',
                data: function(d){
                    d.location_id = $('#list_accounts_location_id').val();
                    d.account_type_s = $('#account_type').val();
                    d.account_sub_type = $('#account_sub_type').val();
                    d.account_group = $('#account_group').val();
                    d.account_name = $('#account_name').val();

                }
            },
            columnDefs:[{
                    
                    "orderable": false,
                    "searchable": false,
                    "width" : "30%",
                }],
            columns: [

                // {data: null, render: editIcon,className: 'remove_name', },
                //     {
                //     data: null,
                //     defaultContent: '<i class="fa fa-plus-square" aria-hidden="true"></i>',
                //     className: 'edit_icon',
                    
                //     orderable: false
                // },
                {
                    data: 'id',
                    "sortable": false,
                    className: 'edit_icon',
                     "render": function (data) {
                                return '<i class="fa fa-plus-square plus_singh" style="font-size: 18px;" id=' + data + '></i>';
               }
                },
                    // {data: 'id', name: 'accounts.id'},
                {data: 'name', name: 'accounts.name'},                
                {data: 'account_location', name: 'account_location',searchable: false},
                {data: 'account_type', name: 'ats.name'},
                {data: 'account_group', name: 'account_group'},
                {data: 'parent_account_id', name: 'parent_account_id'},
                {data: 'account_number', name: 'accounts.account_number'},
                {data: 'balance', name: 'balance', searchable: false},
                // {data: 'added_by', name: 'u.first_name'},
                {data: 'action', name: 'action'},
               
            ],
            @include('layouts.partials.datatable_export_button')
            "fnDrawCallback": function (oSettings) {
                __currency_convert_recursively($('#other_account_table'));
            },
            "rowCallback": function( row, data, index ) {
            
            }
           
        });
        $(".remove_name").remove();

        $('#other_account_table tbody').on('click', '.plus_singh' , function(){
            
            var id=$(this).attr('id');

            if($("#table_" +id).length == 0)
            {
                $.ajax({
                method: "POST",
                url: "/account_details",
                data: {id:id},
                dataType: 'json',
                success:function(result){
                   
                    if(result){

                        var acount_type="";
                        var acount_text="";
                        var show_in_balance_sheet="";
                         var is_need_cheque="";

                        if(result['is_main_account'] == 1)
                        {
                            acount_type="Yes";
                            acount_text="Main Account";
                        }
                        else
                        {
                            acount_type="Yes";
                            acount_text="Sub Account";
                        }
                        if(result['show_in_balance_sheet'] == 1)
                        {
                            show_in_balance_sheet="Yes";
                        }
                        else{
                            show_in_balance_sheet="No";
                        }
                        if(result['is_need_cheque'] == "N")
                        {
                            is_need_cheque="No";
                        }
                        else{
                            is_need_cheque="Yes";
                        }
                        
                        var html = "<div class='card' style='width: 200px !important;font-size: 14px !important;line-height: 25px !important; color: black !important;background-color: #FFC6FA;padding: 10px;font-weight: normal' id=table_"+id+"><strong>Added By: </strong><span class='badge btn-danger' style='background-color: #d9534f;'>"+result['first_name']+"</span><br><strong>"+acount_text+": </strong><span class='badge bg-danger' style='background-color: #5cb85c;'>"+acount_type+"</span><br> <strong>Balance Sheet: </strong><span class='badge bg-danger' style='background-color: #4336FB'>"+show_in_balance_sheet+"</span><br> <strong>Cheque Module: </strong><span class='badge bg-danger' style='background-color: #f0ad4e;'>"+is_need_cheque+"</span></div>"


                        $("#" +id).html(html);
                      


                       
                    }

                }
                });
            }
            else{
                $("#table_" +id).remove();
            }
            

        });


        // filter Data

        var filter = JSON.parse(`<?php echo json_encode($filterdata) ?>`);
        
        $('#list_accounts_location_id').change(function(){
            other_account_table.ajax.reload();
        })

        $('#account_type').change(function(){
            
            let change_val ='subType_'+ $('#account_type').val();
            

            // $('#account_type').empty().trigger("change");
            $('#account_sub_type').select2('destroy').empty().select2(filter[change_val]).change();
            loadNamesOtion();

            // $("#account_sub_type").val("").change();
            other_account_table.ajax.reload();
        })

        $('#account_sub_type').change(function(){
            // console.log(filter,$('#account_sub_type').val());
            let change_val ='groupType_'+ $('#account_sub_type').val();
           
            if(change_val == 'groupType_All'){
                change_val = 'groupType_';
            }
            if(change_val=="groupType_"){
                data = [{'id':'','text':'All'}];
                $('#account_sub_type option').each(function(){
                    if($(this).attr('value') != ''){
                        let newChangeVal ='groupType_'+ $(this).val();
                        if(filter[newChangeVal] && filter[newChangeVal]['data']){

                            for(var i in filter[newChangeVal]['data']) {
                                data.push(filter[newChangeVal]['data'][i]);
                            }

                        }
                    }
                    $('#account_group').select2('destroy').empty().select2({'data':data}).change();

                })

            }else{
               $('#account_group').select2('destroy').empty().select2(filter[change_val]).change();
            }
            loadNamesOtion();
            other_account_table.ajax.reload();

        
        })

        $('#account_group').change(function(){
            loadNamesOtion();
            other_account_table.ajax.reload();
        })

        $('#account_name').change(function(){
            other_account_table.ajax.reload();
        })
       

        // account_groups_table
        account_groups_table = $('#account_groups_table').DataTable({
            processing: true,
            serverSide: false,
            ajax: '/account-groups',
            // columnDefs:[{
            //         "targets": 4,
            //         "orderable": false,
            //         "searchable": false,
            //         "width" : "30%",
            //     }],
                
            columns: [
                
                {data: 'name', name: 'account_groups.name'},
                {data: 'account_type_name', name: 'ats.name'},
                {data: 'note', name: 'note'},
                {data: 'action', name: 'action'},
                
            ],
            "fnDrawCallback": function (oSettings) {
            }
        });


        $(document).on('click', '#save_account_group_btn', function(e){
            e.preventDefault();
            let name = $('#account_group_name_group').val();
            let account_type_id = $('#account_type_id_group').val();
            let note = $('#note_group').val();

            $.ajax({
                method: 'post',
                url: '/account-groups',
                data: { 
                    name,
                    account_type_id,
                    note,
                },
                success: function(result) {
                    if(result.success == 1){
                        toastr.success(result.msg);
                    }else{
                        toastr.error(result.msg);
                    }
                    $('#account_groups_modal').modal('hide');
                    account_groups_table.ajax.reload();
                },
            });

        });
        $(document).on('click', '#update_account_group_btn', function(e){
            e.preventDefault();
            let name = $('#account_group_name_group').val();
            let account_type_id = $('#account_type_id_group').val();
            let note = $('#note_group').val();
            let url = $('#account_group_form').attr('action');
            $.ajax({
                method: 'put',
                url: url,
                data: { 
                    name,
                    account_type_id,
                    note,
                },
                success: function(result) {
                    if(result.success == 1){
                        toastr.success(result.msg);
                    }else{
                        toastr.error(result.msg);
                    }
                    $('.account_model').modal('hide');
                    account_groups_table.ajax.reload();
                },
            });

        });

        $(document).on('click', 'button.account_group_delete', function(){
            swal({
                title: LANG.sure,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete)=>{
                if(willDelete){
                    let href = $(this).data('href');

                    $.ajax({
                        method: 'delete',
                        url: href,
                        data: {  },
                        success: function(result) {
                            if(result.success == 1){
                                toastr.success(result.msg);
                            }else{
                                toastr.error(result.msg);
                            }
                            account_groups_table.ajax.reload();
                        },
                    });
                }
            });
        })
        
        $(document).on('click', '.cheque_ob_delete', function(){
            swal({
                title: LANG.sure,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete)=>{
                if(willDelete){
                    let href = $(this).data('href');

                    $.ajax({
                        method: 'delete',
                        url: href,
                        data: {  },
                        success: function(result) {
                            if(result.success == 1){
                                toastr.success(result.msg);
                            }else{
                                toastr.error(result.msg);
                            }
                            cheques_ob_details_table.ajax.reload();
                        },
                    });
                }
            });
        })

        function loadNamesOtion(){
            postData ={"account_type_s" : $('#account_type').val(),
                "account_sub_type": $('#account_sub_type').val(),
                 "account_group" : $('#account_group').val(),
                 "_token": "{{ csrf_token() }}"
                 }

            //      postData = "account_type_s =" + $('#account_type').val();
            // postData +=    "&account_sub_type =" + $('#account_sub_type').val();
            // postData +=    "&account_group_type =" + $('#account_group').val(),
            // postData +=    "&_token = {{ csrf_token() }}";
            $.ajax({
                method: "post",
                url: '/accounting-module/check_account_names',
                dataType: "json",
                data: postData,
                success:function(result){
                   
                    if(result.data){
                        $('#account_name').select2('destroy').empty().select2(result).change();
                    }
                }
            });
        }
        
    });

    $('.account_model').on('show.bs.modal', function(e) {
        get_cheques_list();
        get_realize_cheques_list();
    });

    $('#add_button').click(function(){
        $('.account_model').modal({
            backdrop: 'static',
            keyboard: false
        })
    });
    $('#add_acount_group_btn').click(function(){
        $('#account_groups_modal').modal({
            backdrop: 'static',
            keyboard: false
        })
    });
    $(document).on('click', '.edit_btn, .deposit_btn, .transfer_btn', function(){
        $('.account_model').modal({
            backdrop: 'static',
            keyboard: false
        })
    });
    $(document).on('click', 'button.delete_account_type', function(){
        swal({
            title: LANG.sure,
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete)=>{
            if(willDelete){
                $(this).closest('form').submit();
            }
        });
    })

    $(document).on('change', '#account_number', function(){
        $.ajax({
            method: 'get',
            url: '/accounting-module/check_account_number',
            data: { account_number: $(this).val() },
            success: function(result) {
                if(!result.success){
                    $("#account_number").val('');
                    toastr.error(result.msg);
                }
            },
        });
    })
    
    

    function get_cheques_list(){
        if($('#transaction_date_range_cheque_deposit').val()){
            start_date = $('input#transaction_date_range_cheque_deposit').data('daterangepicker').startDate.format('YYYY-MM-DD');
            end_date = $('input#transaction_date_range_cheque_deposit').data('daterangepicker').endDate.format('YYYY-MM-DD');
            
            start_date_created = $('input#transaction_date_range_cheque_deposit_created').data('daterangepicker').startDate.format('YYYY-MM-DD');
            end_date_created = $('input#transaction_date_range_cheque_deposit_created').data('daterangepicker').endDate.format('YYYY-MM-DD');
            
            cheque_no= $('#cheque_customer_cheque_no').val();
            amount = $('#cheque_customer_amount').val();
            
            $.ajax({
                method: 'get',
                url: '{{action("AccountController@getChequeList")}}',
                data: { start_date, end_date, cheque_no,amount,start_date_created,end_date_created },
                contentType: 'html',
                success: function(result) {
                    $('.account_model').find('#cheque_list_table tbody').empty().append(result);
                },
            });
        }
       
    }
    
    function get_realize_cheques_list(){
        
        if($('#realize_cheque_date').val()){
            start_date = $('input#realize_cheque_date').data('daterangepicker').startDate.format('YYYY-MM-DD');
            end_date = $('input#realize_cheque_date').data('daterangepicker').endDate.format('YYYY-MM-DD');
            
            // start_date_created = $('input#realize_date').data('daterangepicker').startDate.format('YYYY-MM-DD');
            // end_date_created = $('input#realize_date').data('daterangepicker').endDate.format('YYYY-MM-DD');
            
            cheque_no= $('#cheque_customer_cheque_no').val();
            amount = $('#cheque_customer_amount').val();
            realize_cheque_bank = $('#realize_cheque_bank').val();
            
            $.ajax({
                method: 'get',
                url: '{{action("AccountController@getRealizeChequeList")}}',
                data: { start_date, end_date, cheque_no,amount,realize_cheque_bank },
                contentType: 'html',
                success: function(result) {
                    $('.account_model').find('#realize_cheque_list_table tbody').empty().append(result);
                },
            });
        }
       
    }

    //account settings tab script
    $(document).ready(function () {
        account_setting_table = $('#account_setting_table').DataTable({
            processing: true,
            serverSide: false,
            ajax: {
                url: "{{action('AccountSettingController@index')}}",
                data: function(d){
                    d.date = $('#date1').val();
                    d.account_type = $('#account_type1').val();
                    d.account_sub_type = $('#account_sub_type1').val();
                    d.account_id = $('#account_id2').val();
                    d.group_id = $('#group_id2').val();
                }
            },
            columns: [
                {data: 'date', name: 'date'},
                {data: 'parent_account_type_name', name: 'pat.name'},
                {data: 'account_type_name', name: 'account_types.name'},
                {data: 'account_group', name: 'account_groups.name'},
                {data: 'name', name: 'accounts.name'},
                {data: 'amount', name: 'amount'},
                {data: 'created_by', name: 'users.username'},
                @if(!empty($can_edit_ob))
                    {data: 'action', name: 'action'},
                @endif
                
               
            ],
            @include('layouts.partials.datatable_export_button')
            "fnDrawCallback": function (oSettings) {
                __currency_convert_recursively($('#account_setting_table'));
            },
            "rowCallback": function( row, data, index ) {
                
            }
        });

        
    })

    
    $('#group_id').change(function () {
        group_id = $(this).val();
        
        $.ajax({
            method: 'get',
            url: '/accounting-module/get-account-by-group-id/'+group_id,
            data: {  },
            contentType: 'html',
            success: function(result) {
                $('#account_id').empty().append(result);
            },
        });
    })
    
    
    $('#date1').change(function () {
        account_setting_table.ajax.reload();
    })

    $('#account_id2').change(function () {
        account_setting_table.ajax.reload();
    })

    $('#account_type1').change(function () {
        account_setting_table.ajax.reload();
    })

    $('#account_sub_type1').change(function () {
        account_setting_table.ajax.reload();
    })

    


    $('#group_id2').change(function () {
        account_setting_table.ajax.reload();
        group_id = $(this).val();
        $.ajax({
            method: 'get',
            url: '/accounting-module/get-account-by-group-id/'+group_id,
            data: {  },
            contentType: 'html',
            success: function(result) {
                $('#account_id2').empty().append(result);
            },
        });
    })
    $('#date').datepicker('setDate', new Date());
    $('#date1').datepicker('setDate');


    // list deposit and transfer account
    if($('#list_deposit_transfer_date_range').length) {
        $('#list_deposit_transfer_date_range').daterangepicker(
            dateRangeSettings,
            function (start, end) {
                $('#list_deposit_transfer_date_range').val(start.format(moment_date_format) + ' ~ ' + end.format(moment_date_format));
                list_deposit_transfer_table.ajax.reload();
            }
        );
        $('#list_deposit_transfer_date_range').on('cancel.daterangepicker', function(ev, picker) {
            $('#list_deposit_transfer_date_range').val('');
            list_deposit_transfer_table.ajax.reload();
        });
    }
    
    if($('#cheques_ob_details_date_range').length) {
        $('#cheques_ob_details_date_range').daterangepicker(
            dateRangeSettings,
            function (start, end) {
                $('#cheques_ob_details_date_range').val(start.format(moment_date_format) + ' ~ ' + end.format(moment_date_format));
                cheques_ob_details_table.ajax.reload();
            }
        );
        $('#cheques_ob_details_date_range').on('cancel.daterangepicker', function(ev, picker) {
            $('#cheques_ob_details_date_range').val('');
            cheques_ob_details_table.ajax.reload();
        });
    }
    
    
    $(document).ready(function () {
        list_deposit_transfer_table = $('#list_deposit_transfer_table').DataTable({
            processing: true,
            serverSide: false,
            ajax: {
                url: '/accounting-module/list-deposit-transfer',
                data: function(d){
                    if($('#list_deposit_transfer_date_range').val()) {
                        var start = $('#list_deposit_transfer_date_range').data('daterangepicker').startDate.format('YYYY-MM-DD');
                        var end = $('#list_deposit_transfer_date_range').data('daterangepicker').endDate.format('YYYY-MM-DD');
                        d.start_date = start;
                        d.end_date = end;
                    }
                    d.sub_type = $('#list_deposit_transfer_type').val();
                    d.from_account_id = $('#from_account_id').val();
                    d.to_account_id = $('#to_account_id').val();
                    d.user_id = $('#user_id').val();
                }
            },
            columnDefs:[{
                    "targets": 8,
                    "orderable": false,
                    "searchable": false,
                    "width" : "30%",
                }],
            columns: [
                {data: 'action', name: 'action'},
                {data: 'operation_date', name: 'operation_date'},
                {data: 'customer_name', name: 'customer_name'},
                {data: 'sub_type', name: 'sub_type'},
                {data: 'amount', name: 'amount'},
                {data: 'from_account', name: 'from_account'},
                {data: 'to_account', name: 'to_account'},
                {data: 'cheque_number', name: 'cheque_number'},
                {data: 'username', name: 'users.username'},
            
               
            ],
            @include('layouts.partials.datatable_export_button')
            "fnDrawCallback": function (oSettings) {
                __currency_convert_recursively($('#list_deposit_transfer_table'));
            },
            "rowCallback": function( row, data, index ) {
                
            }
        });
        
        cheques_ob_details_table = $('#cheques_ob_details_table').DataTable({
            processing: true,
            serverSide: false,
            ajax: {
                url: "/accounting-module/cheques-ob-details",
                data: function(d){
                    if($('#cheques_ob_details_date_range').val()) {
                        var start = $('#cheques_ob_details_date_range').data('daterangepicker').startDate.format('YYYY-MM-DD');
                        var end = $('#cheques_ob_details_date_range').data('daterangepicker').endDate.format('YYYY-MM-DD');
                        d.start_date = start;
                        d.end_date = end;
                    }
                    d.amount = $('#cheques_ob_details_amount').val();
                    d.cheque_number = $('#cheques_ob_details_cheque_no').val();
                    d.bank_name = $('#cheques_ob_details_bank').val();
                    d.user_id = $('#cheques_ob_details_user_id').val();
                    
                    
                    
                }
            },
            columnDefs:[{
                    "targets": 5,
                    "orderable": false,
                    "searchable": false,
                    "width" : "30%",
                }],
            columns: [
                {data: 'transaction_date', name: 'transaction_date'},
                {data: 'customer', name: 'customer'},
                {data: 'cheque_number', name: 'cheque_number'},
                {data: 'amount', name: 'amount'},
                {data: 'cheque_date', name: 'cheque_date'},
                {data: 'bank_name', name: 'bank_name'},
                {data: 'action', name: 'action'}
            
               
            ],
            @include('layouts.partials.datatable_export_button')
            "fnDrawCallback": function (oSettings) {
                
                __currency_convert_recursively($('#cheques_ob_details_table'));
            },
            "rowCallback": function( row, data, index ) {
                
            }
        });
        
       
        

        $('#list_deposit_transfer_date_range, #list_deposit_transfer_type, #from_account_id, #to_account_id, #user_id').change(function(){
            list_deposit_transfer_table.ajax.reload();
        })
        
        $('#cheques_ob_details_date_range, #cheques_ob_details_amount, #cheques_ob_details_cheque_no, #cheques_ob_details_bank, #cheques_ob_details_user_id').on('change', function() {
        
            cheques_ob_details_table.ajax.reload();
            
        });

    })
</script>
@endsection