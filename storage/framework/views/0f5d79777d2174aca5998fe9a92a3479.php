<!-- Main content -->
<section class="content">
    
  
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __(
            'member::lang.all_staff_members')]); ?>
            <?php $__env->slot('tool'); ?>
            <div class="box-tools">
                <button type="button" class="btn btn-primary btn-modal pull-right mb-12" id="add_electrorate_btn"
                    data-href="<?php echo e(action('\Modules\Member\Http\Controllers\MemberStaffController@create'), false); ?>"
                    data-container=".common_model">
                    <i class="fa fa-plus"></i> <?php echo app('translator')->get( 'member::lang.add' ); ?></button>
            </div>
            <?php $__env->endSlot(); ?>

            <div class="row">
                <div class="col-md-12 table-responsive">
                    <table class="table table-striped table-bordered" id="staff_assign_table" style="width: 100%;">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get( 'messages.action' ); ?></th>
                                <th><?php echo app('translator')->get( 'member::lang.date' ); ?></th>
                                <th><?php echo app('translator')->get( 'member::lang.staff_name' ); ?></th>
                                <th><?php echo app('translator')->get( 'member::lang.designation' ); ?></th>
                                <th><?php echo app('translator')->get( 'member::lang.status' ); ?></th>
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
<!-- /.content --><?php /**PATH /home/vimi31/public_html/Modules/Member/Providers/../Resources/views/settings/staff/index.blade.php ENDPATH**/ ?>