@extends('layouts.app')

@section('title', __('distribution::lang.route_operations'))

@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            @component('components.filters', ['title' => __('report.filters')])
            <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('date_range_filter', __('report.date_range') . ':') !!}
                    {!! Form::text('date_range_filter', @format_date('first day of this month') . ' ~ ' .
                    @format_date('last
                    day of this month') , ['placeholder' => __('lang_v1.select_a_date_range'), 'class' =>
                    'form-control date_range', 'id' => 'date_range_filter', 'readonly']); !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('location_id', __( 'distribution::lang.location' )) !!}
                    {!! Form::select('location_id', $business_locations, null, ['class' => 'form-control select2',
                    'required',
                    'placeholder' => __(
                    'distribution::lang.please_select' ), 'id' => 'location_id']);
                    !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('contact_id', __( 'distribution::lang.customer' )) !!}
                    {!! Form::select('contact_id', $contacts, null, ['class' => 'form-control select2',
                    'required',
                    'placeholder' => __(
                    'distribution::lang.please_select' ), 'id' => 'contact_id']);
                    !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('route_id', __( 'distribution::lang.route' )) !!}<br>
                    {!! Form::select('route_id', $routes, null, ['class' => 'form-control select2',
                    'required',
                    'placeholder' => __(
                    'distribution::lang.please_select' ), 'id' => 'route_id']);
                    !!}
                </div>
            </div>
            </div><div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('vehicle_no', __( 'distribution::lang.vehicle_no' )) !!}
                    {!! Form::select('vehicle_no', $vehicle_numbers, null, ['class' => 'form-control select2',
                    'required',
                    'placeholder' => __(
                    'distribution::lang.please_select' ), 'id' => 'vehicle_no']);
                    !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('driver_id', __( 'distribution::lang.driver' )) !!}<br>
                    {!! Form::select('driver_id', $drivers, null, ['class' => 'form-control select2',
                    'required',
                    'placeholder' => __(
                    'distribution::lang.please_select' ), 'id' => 'driver_id']);
                    !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('helper_id', __( 'distribution::lang.helper' )) !!}<br>
                    {!! Form::select('helper_id', $helpers, null, ['class' => 'form-control select2',
                    'required',
                    'placeholder' => __(
                    'distribution::lang.please_select' ), 'id' => 'helper_id']);
                    !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('payment_status', __( 'distribution::lang.payment_status' )) !!}
                    {!! Form::select('payment_status', $payment_status, null, ['class' => 'form-control select2',
                    'required',
                    'placeholder' => __(
                    'distribution::lang.please_select' ), 'id' => 'payment_status']);
                    !!}
                </div>
            </div>
            </div><div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('payment_method', __( 'distribution::lang.payment_methods' )) !!}
                    {!! Form::select('payment_method', $payment_methods, null, ['class' => 'form-control select2',
                    'required',
                    'placeholder' => __(
                    'distribution::lang.please_select' ), 'id' => 'payment_method']);
                    !!}
                </div>
            </div>
            </div>
            @endcomponent
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @component('components.widget', ['class' => 'box-primary', 'title' => __(
            'distribution::lang.all_your_route_operations')])
            @slot('tool')
            <div class="box-tools">
                <a class="btn btn-primary pull-right" id="add_route_operation_btn"
                    href="{{action('\Modules\Distribution\Http\Controllers\RouteOperationController@create')}}"
                   >
                    <i class="fa fa-plus"></i> @lang( 'distribution::lang.add' )</a>
            </div>
            @endslot

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="route_operation_table" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>@lang( 'messages.action' )</th>
                                     <th>@lang( 'distribution::lang.id' )</th>
                                    <th>@lang( 'distribution::lang.date' )</th>
                                    <th>@lang( 'distribution::lang.location' )</th>
                                    <th>@lang( 'distribution::lang.customer' )</th>
                                    <th>@lang( 'distribution::lang.order_number' )</th>
                                    <th>@lang( 'distribution::lang.route' )</th>
                                    <th>@lang( 'distribution::lang.vehicle_no' )</th>
                                    <th>@lang( 'distribution::lang.invoice_no' )</th>
                                    <th>@lang( 'distribution::lang.amount' )</th>
                                    <th>@lang( 'distribution::lang.payment_method' )</th>
                                     <th>@lang( 'distribution::lang.payment_status' )</th>
                                    <th>@lang( 'distribution::lang.balance_due' )</th>
                                    <th>@lang( 'distribution::lang.product' )</th>
                                    <th>@lang( 'distribution::lang.qty' )</th>
                                    <th>@lang( 'distribution::lang.driver' )</th>
                                    <th>@lang( 'distribution::lang.helper' )</th>
                                    <th>@lang( 'distribution::lang.distance_km' )</th>
                                    <th>@lang( 'distribution::lang.driver_incentive' )</th>
                                    <th>@lang( 'distribution::lang.helper_incentive' )</th>
                                   
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endcomponent
        </div>
    </div>
    <div class="modal fade fleet_model" role="dialog" aria-labelledby="gridSystemModalLabel">
    </div>
    <div class="modal fade payment_modal" role="dialog" aria-labelledby="gridSystemModalLabel">
    </div>
</section>
<!-- /.content -->

@endsection

@section('javascript')
<script src="{{ asset('js/payment.js?v=' . $asset_v) }}"></script>
<script>
    $('#location_id option:eq(1)').attr('selected', true);
    var body = document.getElementsByTagName("body")[0];
    body.className += " sidebar-collapse";
    if ($('#date_range_filter').length == 1) {
        $('#date_range_filter').daterangepicker(dateRangeSettings, function(start, end) {
            $('#date_range_filter').val(
               start.format(moment_date_format) + ' - ' +  end.format(moment_date_format)
            );
        });
        $('#date_range_filter').on('cancel.daterangepicker', function(ev, picker) {
            $('#product_sr_date_filter').val('');
        });
        $('#date_range_filter')
            .data('daterangepicker')
            .setStartDate(moment().startOf('month'));
        $('#date_range_filter')
            .data('daterangepicker')
            .setEndDate(moment().endOf('month'));
    }

    // route_operation_table
    $(document).ready(function(){
        route_operation_table = $('#route_operation_table').DataTable({
                processing: true,
                serverSide: false,
                ajax: {
                    url : "{{action('\Modules\Distribution\Http\Controllers\RouteOperationController@index')}}",
                    data: function(d){
                        d.location_id = $('#location_id').val();
                        d.contact_id = $('#contact_id').val();
                        d.route_id = $('#route_id').val();
                        d.vehicle_no = $('#vehicle_no').val();
                        d.driver_id = $('#driver_id').val();
                        d.helper_id = $('#helper_id').val();
                        d.payment_status = $('#payment_status').val();
                        d.payment_method = $('#payment_method').val();
                        d.start_date = $('#date_range_filter')
                            .data('daterangepicker')
                            .startDate.format('YYYY-MM-DD');
                        d.end_date = $('#date_range_filter')
                            .data('daterangepicker')
                            .endDate.format('YYYY-MM-DD');
                    }
                },
                columnDefs:[{
                        "targets": 1,
                        "orderable": false,
                        "searchable": false
                    }],
                columns: [
                    {data: 'action', name: 'action'},
                    {data: 'id', name: 'id'},
                    {data: 'date_of_operation', name: 'date_of_operation'},
                    {data: 'location_name', name: 'business_locations.name'},
                    {data: 'contact_name', name: 'contacts.name'},
                    {data: 'order_number', name: 'order_number'},
                    {data: 'route_name', name: 'route_name'},
                    {data: 'vehicle_number', name: 'vehicle_number'},
                    {data: 'invoice_no', name: 'invoice_no'},
                    {data: 'amount', name: 'amount'},
                    {data: 'method', name: 'method'},
                     {data: 'payment_status', name: 'payment_status'},
                    {data: 'balance_due', name: 'balance_due'},
                    {data: 'product_name', name: 'route_products.name'},
                    {data: 'qty', name: 'qty'},
                    {data: 'driver_name', name: 'driver_name'},
                    {data: 'helper_name', name: 'helper_name'},
                    {data: 'distance', name: 'distance'},
                    {data: 'driver_incentive', name: 'driver_incentive'},
                    {data: 'helper_incentive', name: 'helper_incentive'},
                  
                ],
                createdRow: function( row, data, dataIndex ) {
                }
            });
        });

        $('#date_range_filter, #location_id, #contact_id, #route_id, #vehicle_no, #driver_id, #helper_id, #payment_status, #payment_method').change(function () {
            route_operation_table.ajax.reload();
        })
        $(document).on('click', 'a.delete-fleet', function(){
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
                            route_operation_table.ajax.reload();
                        },
                    });
                }
            });
        })
</script>
@endsection