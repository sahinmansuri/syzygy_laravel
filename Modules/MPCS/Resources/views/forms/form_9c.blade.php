@extends('layouts.app')
@section('title', __('mpcs::lang.9c_cash_form'))

@section('content')
<!-- Main content -->
<section class="content">

   <div class="row">
        <div class="col-md-12">
            <div class="settlement_tabs">
                <ul class="nav nav-tabs">
                    @if(auth()->user()->can('f9a_form'))
                    <li class="active">
                        <a href="#9a_form_tab" class="9a_form_tab" data-toggle="tab">
                            <i class="fa fa-file-text-o"></i> <strong>@lang('mpcs::lang.form_9_c')</strong>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->can(abilities: 'f9a_settings_form'))
                    <li class="">
                        <a href="#9a_form_settings_tab" class="9a_form_settings_tab" data-toggle="tab">
                            <i class="fa fa-file-text-o"></i> <strong>@lang('mpcs::lang.form_9_c_settings')</strong>
                        </a>
                    </li>
                    @endif
                </ul>
                <div class="tab-content">
                    @if(auth()->user()->can('f9a_form'))
                    <div class="tab-pane active" id="9a_form_tab">
                        @include('mpcs::forms.partials.9c_form')
                    </div>
                    @endif
                    @if(auth()->user()->can('f9a_settings_form'))
                    <div class="tab-pane" id="9a_form_settings_tab">
                        @include('mpcs::forms.partials.9c_settings_form')
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade form_9_c_settings_modal" id="form_9_c_settings_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel"></div>
    <div class="modal fade update_form_9_c_settings_modal" id="update_form_9_c_settings_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel"></div>
</section>
<!-- /.content -->

@endsection
@section('javascript')
<script type="text/javascript">
    $(document).ready(function(){
        
        get9CForm();

        function get9CForm(){
            var selected_date = $('#form_9a_date').val();

            $.ajax({
                method: 'get',
                url: '/mpcs/get-9c-form',
                data: {
                    selected_date
                },
                contentType: 'html',
                success: function(result) {
                    if (result) {
                        $('#cash_sales').text(Number(result.cash_sale));
                        $('#card_sales').text(Number(result.card_sale));
                        $('#total_cash_sale').text(Number(result.card_sale) + Number(result.cash_sale));
                        $('#total_credit_sale').text(Number(result.credit_sale));
                        $('#total_sale').text(Number(result.card_sale) + Number(result.cash_sale) + Number(result.credit_sale));
                        $('#total_sale_pre_day').text(Number(result.total_sale_pre_day));
                        $('#total_sale_today').text(Number(result.card_sale) + Number(result.cash_sale) + Number(result.credit_sale) + Number(result.total_sale_pre_day));
                    } else {
                        $('#cash_sales').text("");
                        $('#card_sales').text("");
                        $('#total_cash_sale').text("");
                        $('#total_credit_sale').text("");
                        $('#total_sale').text("");
                        $('#total_sale_pre_day').text("");
                        $('#total_sale_today').text("");
                    }
                },
            });
        }

        $('#form_9a_date').change(function(){
            get9AForm();
        });

        //form 9a list
        form_9a_settings_table = $('#form_9a_settings_table').DataTable({
            processing: true,
            serverSide: true,
            paging: false, 
            ajax: {
                "type": "get",
                "url": "/mpcs/get-form-9c-settings",
            },
            columns: [
                { data: 'action', name: 'action', searchable: false, orderable: false },
                 { data: 'date_time', name: 'date_time' },
                { data: 'starting_number', name: 'starting_number' },
                { data: 'ref_pre_form_number', name: 'ref_pre_form_number'},
              { data: 'added_user', name: 'added_user'},
             
               
            ]
        });

        //form 9a section
        $(document).on('submit', 'form#add_9a_form_settings', function(e) {
        
            e.preventDefault();
            $(this).find('button[type="submit"]').attr('disabled', true);
            var data = $(this).serialize();
            
            $.ajax({
                method: $(this).attr('method'),
                url: $(this).attr('action'),
                dataType: 'json',
                data: data,
                success: function(result) {
                    if (result.success == true) {
                        
                        toastr.success(result.msg);
                        form_9a_settings_table.ajax.reload();
                        $('div#form_9_a_settings_modal').modal('hide');
                        
                        if ($('#form_9a_settings_table').length > 0) {
                            $(this).find('button[type="submit"]').attr('disabled', false);
                        }
                        
                    } else {
                        toastr.error(result.msg);
                    }
                },
            });
        });

        //update form 9a section
        $(document).on('submit', 'form#update_9a_form_settings', function(e) {

            e.preventDefault();
            $(this).find('button[type="submit"]').attr('disabled', true);
            var data = $(this).serialize();
            
            $.ajax({
                method: $(this).attr('method'),
                url: $(this).attr('action'),
                dataType: 'json',
                data: data,
                success: function(result) {
                    if (result.success == true) {
                        
                        toastr.success(result.msg);
                        form_9a_settings_table.ajax.reload();
                        $('div#update_form_9_a_settings_modal').modal('hide');
                        
                        if ($('#form_9a_settings_table').length > 0) {
                            $(this).find('button[type="submit"]').attr('disabled', false);
                        }
                        
                    } else {
                        toastr.error(result.msg);
                    }
                },
            });
        });
        
        $("#print_div").click(function(){
            printDiv();
        });

        function printDiv() {
            var w = window.open('', '_self');
            var html = `
                <html>
                    <head>
                        <style>
                            @page {
                                size: landscape;
                            }
                            body {
                                width: 100%;
                                margin: 0;
                                padding: 0;
                            }
                            @media print {
                                html, body {
                                    width: 100%;
                                    overflow: visible !important;
                                }
                                * {
                                    font-size: 8pt;
                                }
                            }
                        </style>
                    </head>
                    <body>
                        ${document.getElementById("print_content").innerHTML}
                    </body>
                </html>
            `;
            $(w.document.body).html(html);
            w.print();
            w.close();
            window.location.href = "{{URL::to('/')}}/mpcs/form-9c";
        }
 function printDivs() {
            var w = window.open('', '_self');
            var html = `
                <html>
                    <head>
                        <style>
                            @page {
                                size: landscape;
                            }
                            body {
                                width: 100%;
                                margin: 0;
                                padding: 0;
                            }
                            @media print {
                                html, body {
                                    width: 100%;
                                    overflow: visible !important;
                                }
                                * {
                                    font-size: 8pt;
                                }
                            }
                        </style>
                    </head>
                    <body>
                        ${document.getElementById("print_content").innerHTML}
                    </body>
                </html>
            `;
            $(w.document.body).html(html);
            w.print();
            w.close();
            window.location.href = "{{URL::to('/')}}/mpcs/form-9c";
        }
    });
    
</script>
@endsection