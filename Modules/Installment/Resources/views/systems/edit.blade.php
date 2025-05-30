<div class="modal-dialog" role="document">
    <div class="modal-content">

        {!! Form::open(['url' => action('\Modules\Installment\Http\Controllers\InstallmentSystemController@update',['system'=>$data->id]), 'method' => 'put','id'=>'edit_installment_system' ]) !!}

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"> Edit Installment </h4>
        </div>

        <div class="modal-body">
            <div class="form-group">
                {!! Form::label('name','System Name :*') !!}
                {!! Form::text('name',$data->name, ['class' => 'form-control', 'required', 'placeholder' =>'Name' ]); !!}
            </div>

            <div class="form-group">
                {!! Form::label('number',' Number of Installments:*') !!}
                <div class="row">
                    <div class="col-lg-4">
                {!! Form::text('number', $data->number, ['class' => 'form-control integr', 'required' ]); !!}
                    </div>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('period',' Period to charge Interest:') !!}
                <div class="row">
                    <div class="col-lg-4">
                        {!! Form::text('period', $data->period, ['class' => 'form-control integr', 'required' ]); !!}
                    </div>
                    <div class="col-lg-6">
                        <select class="form-control" name="type">
                            <option value="day" @if($data->type =='day') selected @endif> @lang('installment::lang.day')</option>
                            <option value="month" @if($data->type =='month') selected @endif >@lang('installment::lang.month')</option>
                            <option value="year" @if($data->type =='year') selected @endif >@lang('installment::lang.year')</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
               <div class="row">
                    <div class="col-lg-4">
                        {!! Form::label('benefit','Interest Rate %:') !!}
                        {!! Form::text('benefit', $data->benefit, ['class' => 'form-control decimal', 'required' ]); !!}
                    </div>
                    <div class="col-lg-4">
                        {!! Form::label('benefit_type','Interest Type:') !!}
                           <select class="form-control" name="benefit_type">
                               <option value="simple" @if($data->benefit_type =='simple') selected @endif  >@lang('installment::lang.simple')</option>
                               <option value="complex" @if($data->benefit_type =='complex') selected @endif >@lang('installment::lang.complex')</option>

                           </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('latfines','Late Payment Fine % :') !!}
                <div class="row">
                    <div class="col-lg-4">
                        {!! Form::text('latfines', $data->latfines, ['class' => 'form-control decimal', 'required' ]); !!}
                    </div>
                    <div class="col-lg-6">
                        <select class="form-control"  name="latfinestype">
                            <option value="day" @if($data->latfinestype =='day') selected @endif> @lang('installment::lang.day')</option>
                            <option value="month" @if($data->latfinestype =='month') selected @endif >@lang('installment::lang.month')</option>
                            <option value="year" @if($data->latfinestype =='year') selected @endif >@lang('installment::lang.year')</option>

                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('description','Description :') !!}
                {!! Form::text('description', $data->description, ['class' => 'form-control'  ]); !!}
            </div>

     </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" >@lang( 'messages.save' )</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">@lang( 'messages.close' )</button>
        </div>

        {!! Form::close() !!}

    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->

<script>

</script>