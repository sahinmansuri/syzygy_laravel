<!-- Main content -->
<section class="content">
    <div class="row">
      <div class="col-md-12">
          <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
          <div class="row">
          <div class="col-md-3">
              <div class="form-group">
                  <?php echo Form::label('district_id', __( 'member::lang.district' )); ?>

                  <?php echo Form::select('district_id',$districts, null, ['class' => 'form-control select2',
                  'required',
                  'placeholder' => __(
                  'shipping::lang.please_select' ), 'id' => 'district_id']); ?>

              </div>
          </div>
          </div>
          <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
  
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __(
            'member::lang.all_electrorates')]); ?>
            <?php $__env->slot('tool'); ?>
            <div class="box-tools">
                <button type="button" class="btn btn-primary btn-modal pull-right mb-12" id="add_electrorate_btn"
                    data-href="<?php echo e(action('\Modules\Member\Http\Controllers\ElectrorateController@create'), false); ?>"
                    data-container=".electrorate_model">
                    <i class="fa fa-plus"></i> <?php echo app('translator')->get( 'member::lang.add' ); ?></button>
            </div>
            <?php $__env->endSlot(); ?>

            <div class="row">
                <div class="col-md-12 table-responsive">
                    <table class="table table-striped table-bordered" id="electrorate_table" style="width: 100%;">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get( 'messages.action' ); ?></th>
                                <th><?php echo app('translator')->get( 'member::lang.province' ); ?></th>
                                <th><?php echo app('translator')->get( 'member::lang.district' ); ?></th>
                                <th><?php echo app('translator')->get( 'member::lang.electrorate' ); ?></th>
                                <th><?php echo app('translator')->get( 'member::lang.add_by' ); ?></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>

</section>
<!-- /.content --><?php /**PATH /home/vimi31/public_html/Modules/Member/Providers/../Resources/views/settings/electrorate/index.blade.php ENDPATH**/ ?>