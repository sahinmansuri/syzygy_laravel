<div class="modal-dialog" role="document">
  <div class="modal-content">

    {!! Form::open(['url' => action('\Modules\Repair\Http\Controllers\RepairBrandController@update', [$brand->id]), 'method' => 'PUT', 'id' => 'repair_brand_edit_form' ]) !!}

    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title">@lang( 'brand.edit_brand' )</h4>
    </div>

    <div class="modal-body">
      <div class="form-group">
        {!! Form::label('name', __( 'brand.brand_name' ) . ':*') !!}
          {!! Form::text('name', $brand->name, ['class' => 'form-control', 'required', 'placeholder' => __( 'brand.brand_name' )]); !!}
      </div>

      <div class="form-group">
        {!! Form::label('description', __( 'brand.short_description' ) . ':') !!}
          {!! Form::text('description', $brand->description, ['class' => 'form-control','placeholder' => __( 'brand.short_description' )]); !!}
      </div>

        
         <div class="form-group">
             <label>
                {!!Form::checkbox('use_for_repair', 1, $brand->use_for_repair, ['class' => 'input-icheck','disabled' => true]) !!}
                Use Repair?
            </label>
            @show_tooltip("If checked, brand will be displayed in dropdown used on <code>auto repair module</code>")
          </div>

    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-primary">@lang( 'messages.update' )</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">@lang( 'messages.close' )</button>
    </div>

    {!! Form::close() !!}

  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->