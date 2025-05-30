

<div class="modal-dialog" role="document">
  <div class="modal-content">

    {!! Form::open(['url' => action('\Modules\Fleet\Http\Controllers\VehicleCategoryController@store'), 'method' => 'post', 'id' => 'vehicle_category_category_add_form' ]) !!}

    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
          aria-hidden="true">&times;</span></button>
      <h4 class="modal-title">@lang( 'fleet::lang.vehicle_category' )</h4>
    </div>

    <div class="modal-body">
      <div class="row">
        
        {{-- <div class="form-group col-sm-12">
          {!! Form::label('date', __( 'fleet::lang.date' ) . ':*') !!}
          {!! Form::text('date', @format_date(date('Y-m-d')), ['class' => 'form-control', 'required', 'placeholder' => __(
          'fleet::lang.date' )]); !!}
        </div> --}}
        
        <div class="form-group col-sm-12">
          {!! Form::label('name', __( 'fleet::lang.vehicle_category_name' ) . ':*') !!}
          {!! Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => __( 'fleet::lang.vehicle_category_name'), 'id'
          => 'vehicle_category_name']); !!}
        </div>
    

    </div>
    

    <div class="modal-footer">
       <button class="btn btn-primary">@lang( 'messages.save' )</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">@lang( 'messages.close' )</button>
   </div>

    {!! Form::close() !!}

  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->

<script>
// $("#date").datepicker();

</script>