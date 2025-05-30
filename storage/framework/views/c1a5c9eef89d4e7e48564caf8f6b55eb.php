<div class="modal-dialog" role="document" style="width: 65%;">
  <div class="modal-content">

    <?php echo Form::open(['url' => action('MemberRegisterController@store'), 'method' =>
    'post', 'id' => 'member_form' ]); ?>

    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
          aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo app('translator')->get( 'member::lang.add_member' ); ?></h4>
    </div>

    <div class="modal-body">
      <div class="box box-widget">
        <div class="box-header with-border w-100">
           <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
    
      <!-- /.box-tools -->
      </div>
      <div class="box-body">
       <div class="col-md-12">
          <div class="col-md-4">
            <div class="form-group">
              <?php echo Form::label('username', __('business.member_code') . ':*'); ?>

              <div class="input-group">
                <span class="input-group-addon">
                  <i class="fa fa-user"></i>
                </span>
                <?php echo Form::text('username', $member_username, ['class' => 'form-control','placeholder' =>
                __('business.member_code'),
                'required', 'readonly']); ?>

              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <?php echo Form::label('member_name', __('business.name') . ':*'); ?>

              <div class="input-group">
                <span class="input-group-addon">
                  <i class="fa fa-user"></i>
                </span>
                <?php echo Form::text('member_name', null, ['class' => 'form-control','placeholder' =>
                __('business.name'),
                'required']); ?>

              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <?php echo Form::label('member_address', __('business.address') . ':*'); ?>

              <div class="input-group">
                <span class="input-group-addon">
                  <i class="fa fa-user"></i>
                </span>
                <?php echo Form::text('member_address', null, ['class' => 'form-control','placeholder' =>
                __('business.address'),
                'required']); ?>

              </div>
            </div>
          </div>
		  </div>
		   <div class="col-md-12">
          <div class="col-md-4">
            <div class="form-group">
              <?php echo Form::label('electrorate', __('member::lang.electrorate') . ':*'); ?>

              <div class="input-group">
                <span class="input-group-addon">
                  <i class="fa fa-user"></i>
                </span>
                <?php echo Form::select('electrorate',$electrorates, null, [
                    'class' => 'form-control select2',
                    'id' => 'electrorate_select',
                    'required',
                    'placeholder' => __('messages.please_select'),
                ]); ?>

              </div>
            </div>
    
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <?php echo Form::label('gramasevaka_area', __('business.gramasevaka_area') . ':*'); ?>

              <div class="input-group">
                <span class="input-group-addon">
                  <i class="fa fa-user"></i>
                </span>
                <?php echo Form::select('gramasevaka_area', $gramasevaka_areas, null, ['class'
                => 'form-control','placeholder' => __('lang_v1.please_select'), 'style' => 'margin:0px',
                ]); ?>

              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <?php echo Form::label('member_mobile_number_1', __('business.mobile_number_1') . ':*'); ?>

              <div class="input-group">
                <span class="input-group-addon">
                  <i class="fa fa-user"></i>
                </span>
                <?php echo Form::text('member_mobile_number_1', null, ['class' => 'form-control','placeholder' =>
                __('business.mobile_number_1'),
                'required']); ?>

              </div>
            </div>
          </div>
          </div>
		   <div class="col-md-12">
          <div class="col-md-4">
            <div class="form-group">
              <?php echo Form::label('member_mobile_number_2', __('business.mobile_number_2') . ':*'); ?>

              <div class="input-group">
                <span class="input-group-addon">
                  <i class="fa fa-user"></i>
                </span>
                <?php echo Form::text('member_mobile_number_2', null, ['class' => 'form-control','placeholder' =>
                __('business.mobile_number_2')
                ]); ?>

              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <?php echo Form::label('member_mobile_number_3', __('business.mobile_number_3') . ':*'); ?>

              <div class="input-group">
                <span class="input-group-addon">
                  <i class="fa fa-user"></i>
                </span>
                <?php echo Form::text('member_mobile_number_3', null, ['class' => 'form-control','placeholder' =>
                __('business.mobile_number_3')
                ]); ?>

              </div>
            </div>
          
          </div>
		  </div>
 
		
		
      </div>
      <!-- /.box-body -->
    </div>
    <div class="clearfix">
    </div>
    <hr>
      
      
      
      
      
    <?php
      $date_feild_name = 'date_of_birth';
    ?>
    <?php echo $__env->make('member::member.partials.account_feilds', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="clearfix"></div>
    <hr>
    <?php echo $__env->make('member::member.partials.member_family_feilds', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="clearfix"></div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
    
      <button type="submit" class="btn btn-primary" id="save_member_btn"><?php echo app('translator')->get( 'messages.save' ); ?></button>
    </div>

    <?php echo Form::close(); ?>


  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
 
<script>
  // $('#date_of_birth').datepicker({
  //       format: 'mm/dd/yyyy'
  //   });
 
    $('.date-field').autotab('number');
    $('#electrorate_select').select2({
        width: '100%'
    });
    
</script><?php /**PATH /home/vimi31/public_html/Modules/Member/Providers/../Resources/views/member/create.blade.php ENDPATH**/ ?>