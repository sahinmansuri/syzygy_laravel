<div class="modal-dialog" role="document">
    <div class="modal-content">
  
      <?php echo Form::open(['url' => action('DefaultTownController@store'), 'method' => 'post', 'id' => 'town_form' ]); ?>

  
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?php echo app('translator')->get( 'visitors.add_town' ); ?></h4>
      </div>
  
      <div class="modal-body">
              <div class="form-group">
                  <?php echo Form::label('name', __( 'lang_v1.name' ) .":*", ['style' => 'color: black !important']); ?>

                  <?php echo Form::text('name', null, ['class' => 'form-control', 'required','placeholder' => __( 'lang_v1.name' ) ]); ?>

              </div>
               <div class="form-group">
                  <?php echo Form::label('district_id', __( 'visitors.district' ) .":", ['style' => 'color: black !important']); ?>

                  <select name="district_id" class="form-control select2" id="district_id">\
                      <option><?php echo app('translator')->get('messages.please_select'); ?></option>
                      <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          
                              <option value="<?php echo e($district->id, false); ?>"><?php echo e($district->name, false); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
              </div>
      </div>
  
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-submit"><?php echo app('translator')->get( 'messages.save' ); ?></button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
      </div>
  
      <?php echo Form::close(); ?>

  
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
  
<?php /**PATH /home/vimi31/public_html/resources/views/default_town/create.blade.php ENDPATH**/ ?>