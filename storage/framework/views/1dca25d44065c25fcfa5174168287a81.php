<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __(
            'member::lang.all_districts')]); ?>
            <?php $__env->slot('tool'); ?>
            <div class="box-tools">
                <button type="button" class="btn btn-primary btn-modal pull-right mb-12" id="add_gramaseva_vasama_btn"
                    data-href="<?php echo e(action('\Modules\Member\Http\Controllers\DistrictController@create'), false); ?>"
                    data-container=".districts_model">
                    <i class="fa fa-plus"></i> <?php echo app('translator')->get( 'member::lang.add' ); ?></button>
            </div>
            <?php $__env->endSlot(); ?>

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-bordered" id="districts_table" style="width: 100%;">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get( 'member::lang.district' ); ?></th>
                                <th><?php echo app('translator')->get( 'member::lang.province' ); ?></th>
                                <th><?php echo app('translator')->get( 'member::lang.add_by' ); ?></th>
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
<!-- /.content --><?php /**PATH /home/vimi31/public_html/Modules/Member/Providers/../Resources/views/settings/district/index.blade.php ENDPATH**/ ?>