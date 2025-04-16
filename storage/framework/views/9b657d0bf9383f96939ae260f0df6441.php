<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __(
            'member::lang.all_member_group')]); ?>
            <?php $__env->slot('tool'); ?>
            <div class="box-tools">
                <button type="button" class="btn btn-primary btn-modal pull-right" id="add_member_group_btn"
                    data-href="<?php echo e(action('\Modules\Member\Http\Controllers\MemberGroupController@create'), false); ?>"
                    data-container=".member_group_model">
                    <i class="fa fa-plus"></i> <?php echo app('translator')->get( 'member::lang.add' ); ?></button>
            </div>
            <?php $__env->endSlot(); ?>

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-bordered" id="member_group_table"
                        style="width: 100%;">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get( 'member::lang.date' ); ?></th>
                                <th><?php echo app('translator')->get( 'member::lang.member_group' ); ?></th>
                                <th><?php echo app('translator')->get( 'messages.action' ); ?></th>
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
<!-- /.content --><?php /**PATH /home/vimi31/public_html/Modules/Member/Providers/../Resources/views/settings/member_group/index.blade.php ENDPATH**/ ?>