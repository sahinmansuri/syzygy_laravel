@extends('layouts.app')
@section('title', __('fleet::lang.view_fleet'))

@section('content')
<style>
    .select2 {
        width: 60% !important;
    }
</style>
<!-- Content Header (Page header) -->
<section class="content-header no-print">
    <h1>{{ __('fleet::lang.view_fleet') }}
    <span class="text-danger" id="selected_feel_display"></span></h1>
</section>

<!-- Main content -->
<section class="content no-print">
    <div class="row">
        <div class="col-md-4 col-xs-12">
            {!! Form::select('fleet_id', $fleet_dropdown, $fleet->id , ['class' => 'form-control select2', 'id' =>
            'fleet_id']); !!}
        </div>
        <div class="col-md-2 col-xs-12"></div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs nav-justified">
                    <li class="
                        @if(!empty($view_type) &&  $view_type == 'info')
                            active
                        @else
                            ''
                        @endif">
                        <a href="#info" data-toggle="tab" aria-expanded="true"><i class="fa fa-info-circle"
                                aria-hidden="true"></i> @lang( 'fleet::lang.info')</a>
                    </li>
                    <li class="
                            @if(!empty($view_type) &&  $view_type == 'ledger')
                                active
                            @else
                                ''
                            @endif">
                        <a href="#ledger_tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-anchor"
                                aria-hidden="true"></i> @lang('lang_v1.ledger')</a>
                    </li>
                    <li class="
                            @if(!empty($view_type) &&  $view_type == 'income')
                                active
                            @else
                                ''
                            @endif">
                        <a href="#income_tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-anchor"
                                aria-hidden="true"></i> @lang('fleet::lang.income')</a>
                    </li>
                    <li class="
                            @if(!empty($view_type) &&  $view_type == 'expenses')
                                active
                            @else
                                ''
                            @endif">
                        <a href="#expenses_tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-anchor"
                                aria-hidden="true"></i> @lang('fleet::lang.expenses')</a>
                    </li>
                </ul>

                <div class="tab-content" style="background: #fbfcfc;">
                    <div class="tab-pane
                            @if(!empty($view_type) &&  $view_type == 'info')
                                active
                            @else
                                ''
                            @endif" id="info">
                        @include('fleet::fleet.partials.info')
                    </div>
                    <div class="tab-pane
                                @if(!empty($view_type) &&  $view_type == 'ledger')
                                    active
                                @else
                                    ''
                                @endif" id="ledger_tab">
                        <div class="row">
                            <div class="col-md-12">
                                @include('fleet::fleet.partials.ledger_tab')
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane
                                @if(!empty($view_type) &&  $view_type == 'income')
                                    active
                                @else
                                    ''
                                @endif" id="income_tab">
                        <div class="row">
                            <div class="col-md-12">
                                @include('fleet::fleet.partials.income_tab')
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane
                                @if(!empty($view_type) &&  $view_type == 'expenses')
                                    active
                                @else
                                    ''
                                @endif" id="expenses_tab">
                        <div class="row">
                            <div class="col-md-12">
                                @include('fleet::fleet.partials.expenses_tab')
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade fleet_model" role="dialog" aria-labelledby="gridSystemModalLabel">
    </div>
</section>

@endsection

@section('javascript')
<script>
    $('#fleet_id').change( function() {
        if ($(this).val()) {
            window.location = "{{url('/fleet-management/fleet')}}/" + $(this).val()+"?tab={{$view_type}}";
        }
    });
    
    function updateSummary(){
        var start_date = $('#income_date_range')
            .data('daterangepicker')
            .startDate.format('YYYY-MM-DD');
        var end_date = $('#income_date_range')
            .data('daterangepicker')
            .endDate.format('YYYY-MM-DD');
                        
        $.ajax({
                method: 'get',
                contentType: 'json',
                url: '{{action('\Modules\Fleet\Http\Controllers\FleetController@fetchLedgerSummarised')}}',
                data: {
                    id : "{{$fleet->id}}",
                    start_date : start_date,
                    end_date : end_date
                },
                success: function(result) {
                    $("#total_income").html(result.final_total);
                    $("#total_paid").html(result.payment_received);
                    $("#balance_due").html(result.balance);
                },
            });
    }
    

    //income tab script
    if ($('#income_date_range').length == 1) {
        $('#income_date_range').daterangepicker(dateRangeSettings, function(start, end) {
            $('#income_date_range').val(
               start.format(moment_date_format) + ' - ' +  end.format(moment_date_format)
            );
        });
        $('#income_date_range').on('cancel.daterangepicker', function(ev, picker) {
            $('#product_sr_date_filter').val('');
        });
        $('#income_date_range')
            .data('daterangepicker')
            .setStartDate(moment().startOf('month'));
        $('#income_date_range')
            .data('daterangepicker')
            .setEndDate(moment().endOf('month'));
    }
    if ($('#ledger_date_range').length == 1) {
        $('#ledger_date_range').daterangepicker(dateRangeSettings, function(start, end) {
            $('#ledger_date_range').val(
               start.format(moment_date_format) + ' - ' +  end.format(moment_date_format)
            );
            
            ledger_table.ajax.reload();
        });
        $('#ledger_date_range').on('cancel.daterangepicker', function(ev, picker) {
            $('#product_sr_date_filter').val('');
        });
        $('#ledger_date_range')
            .data('daterangepicker')
            .setStartDate(moment().startOf('month'));
        $('#ledger_date_range')
            .data('daterangepicker')
            .setEndDate(moment().endOf('month'));
    }

    $(document).ready(function () {
        updateSummary();
        $('#selected_feel_display').html(`: `+$('#fleet_id option:selected').html());
        ledger_table = $('#ledger_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{action('\Modules\Fleet\Http\Controllers\FleetController@getLedger', $fleet->id)}}",
                data: function (d) {
                    var start_date = $('input#ledger_date_range')
                        .data('daterangepicker')
                        .startDate.format('YYYY-MM-DD');
                    var end_date = $('input#ledger_date_range')
                        .data('daterangepicker')
                        .endDate.format('YYYY-MM-DD');
                    d.start_date = start_date;
                    d.end_date = end_date;
                }
            },
            @include('layouts.partials.datatable_export_button')
            columns: [
                { data: 'transaction_date', name: 'transaction_date' },
                { data: 'description', name: 'description' },
                { data: 'orignal_location', name: 'orignal_location' },
                { data: 'destination', name: 'destination' },
                { data: 'distance', name: 'distance' },
                { data: 'invoice_no', name: 'invoice_no' },
                { data: 'final_total', name: 'final_total' },
                { data: 'payment_received', name: 'payment_received' },
                { data: 'balance', name: 'balance' },
                { data: 'method', name: 'method' },
            ],
            fnDrawCallback: function(oSettings) {
                __currency_convert_recursively($('#ledger_table'));
            },
        });

        $('#ledger_date_range').change(function () {
            ledger_table.ajax.reload();
        }).
        
        income_table = $('#income_table').DataTable({
            processing: true,
            serverSide: true,
            aaSorting: [[0, 'desc']],
            ajax: {
                url: "{{action('\Modules\Fleet\Http\Controllers\IncomeController@index')}}",
                data: function (d) {
                    d.route_id = $('#income_route_id').val();
                    d.payment_type = $('#income_payment_type').val();
                    d.fleet_id = '{{$fleet->id}}';
                    var start_date = $('input#income_date_range')
                        .data('daterangepicker')
                        .startDate.format('YYYY-MM-DD');
                    var end_date = $('input#income_date_range')
                        .data('daterangepicker')
                        .endDate.format('YYYY-MM-DD');
                    d.start_date = start_date;
                    d.end_date = end_date;
                }
            },
            @include('layouts.partials.datatable_export_button')
            columns: [
                { data: 'date_of_operation', name: 'date_of_operation' },
                { data: 'invoice_no', name: 'invoice_no' },
                { data: 'route_name', name: 'route_name' },
                { data: 'invoice_no', name: 'invoice_no' },
                { data: 'debit', name: 'debit' },
                { data: 'credit', name: 'credit' },
                { data: 'balance', name: 'balance' },
            ],
            fnDrawCallback: function(oSettings) {
                __currency_convert_recursively($('#income_table'));
            },
        });
        $('#income_date_range, #income_route_id, #income_payment_type').change(function () {
            income_table.ajax.reload();
        })
    })


    //expense tab script
    if ($('#expense_date_range').length == 1) {
        $('#expense_date_range').daterangepicker(dateRangeSettings, function(start, end) {
            $('#expense_date_range').val(
               start.format(moment_date_format) + ' - ' +  end.format(moment_date_format)
            );
        });
        $('#expense_date_range').on('cancel.daterangepicker', function(ev, picker) {
            $('#product_sr_date_filter').val('');
        });
        $('#expense_date_range')
            .data('daterangepicker')
            .setStartDate(moment().startOf('month'));
        $('#expense_date_range')
            .data('daterangepicker')
            .setEndDate(moment().endOf('month'));
    }

    $(document).ready(function () {
        fleet_expense_table = $('#fleet_expense_table').DataTable({
            processing: true,
            serverSide: true,
            aaSorting: [[0, 'desc']],
            ajax: {
                url: "{{action('ExpenseController@index')}}",
                data: function (d) {
                    d.expense_category_id = $('#expense_category_id').val();
                    d.payment_status = $('#expense_payment_status').val();
                    d.method = $('#expense_payment_method').val();
                    d.fleet_id = '{{$fleet->id}}';
                    var start_date = $('input#expense_date_range')
                        .data('daterangepicker')
                        .startDate.format('YYYY-MM-DD');
                    var end_date = $('input#expense_date_range')
                        .data('daterangepicker')
                        .endDate.format('YYYY-MM-DD');
                    d.start_date = start_date;
                    d.end_date = end_date;
                }
            },
            @include('layouts.partials.datatable_export_button')
            columns: [
                { data: 'transaction_date', name: 'transaction_date' },
                { data: 'ref_no', name: 'ref_no' },
                { data: 'category', name: 'category' },
                { data: 'notes', name: 'notes' },
                { data: 'final_total', name: 'final_total' },
                { data: 'payment_status', name: 'payment_status' },
                { data: 'payment_method', name: 'payment_method' },
            ],
            fnDrawCallback: function(oSettings) {
                __currency_convert_recursively($('#fleet_expense_table'));
            },
        });
        $('#expense_date_range, #expense_category_id, #expense_payment_method, #expense_payment_status').change(function () {
            fleet_expense_table.ajax.reload();
        })
        
    })
    
    $(document).on('click', '.add_expense_btn', function(){
            $('.fleet_model').modal({
                backdrop: 'static',
                keyboard: false
            })
        })

</script>

@endsection