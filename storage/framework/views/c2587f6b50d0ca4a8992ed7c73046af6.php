<div class="modal-dialog" role="document">
    <div class="modal-content">

        <?php echo Form::open(['url' => action('StoreController@storeUserPermission'), 'method' => 'post', 'id' => 'store_add_form' ]); ?>


        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><?php echo app('translator')->get( 'store.add_store_permission' ); ?></h4>
        </div>

        <div class="modal-body">
            <div class="row">
                <div class="form-group col-sm-12">
                    <?php echo Form::label('store_id', __( 'store.store' ) . ':*'); ?>

                    <select class="form-control select2" name="store_id" id="store_id" style="width: 100%" required>
                        <?php $__currentLoopData = $stores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key, false); ?>"><?php echo e($value, false); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                
                <div class="form-group col-sm-12">
                    <?php echo Form::label('user_id', __( 'store.user' ) . ':*'); ?>

                    <select class="form-control select2" name="user_id" id="user_id" style="width: 100%" required>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key, false); ?>"><?php echo e($value, false); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                

                <div class="col-md-6">
                    <div class="checkbox">
                      <label>
                        <?php echo Form::checkbox('sell', 1, false, 
                        [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'store.sell' ), false); ?>

                      </label>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="checkbox">
                      <label>
                        <?php echo Form::checkbox('purchase', 1, false, 
                        [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'store.purchase' ), false); ?>

                      </label>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="checkbox">
                      <label>
                        <?php echo Form::checkbox('stores_transfer', 1, false, 
                        [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'store.stores_transfer' ), false); ?>

                      </label>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="checkbox">
                      <label>
                        <?php echo Form::checkbox('stock_adjustment', 1, false, 
                        [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'store.stock_adjustment' ), false); ?>

                      </label>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="checkbox">
                      <label>
                        <?php echo Form::checkbox('sell_return', 1, false, 
                        [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'store.sell_return' ), false); ?>

                      </label>
                    </div>
                </div>
                
                
                
            </div>

        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary"><?php echo app('translator')->get( 'messages.save' ); ?></button>
            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
        </div>

        <?php echo Form::close(); ?>


    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->

<script>
    $(".select2").select2();
</script><?php /**PATH /home/vimi31/public_html/resources/views/store_permissions/create.blade.php ENDPATH**/ ?>