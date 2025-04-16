<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __(
            'member::lang.all_service_areas')]); ?>
            <?php $__env->slot('tool'); ?>
            <div class="box-tools">
                <button type="button" class="btn btn-primary btn-modal pull-right" id="add_service_areas_btn"
                    data-href="<?php echo e(action('\Modules\Member\Http\Controllers\ServiceAreasController@create'), false); ?>"
                    data-container=".service_areas_model">
                    <i class="fa fa-plus"></i> <?php echo app('translator')->get( 'member::lang.add' ); ?></button>
            </div>
            <?php $__env->endSlot(); ?>

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-bordered" id="service_areas_table"
                        style="width: 100%;">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get( 'member::lang.date' ); ?></th>
                                <th><?php echo app('translator')->get( 'member::lang.service_areas' ); ?></th>
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
<!-- /.content --><?php /**PATH /home/vimi31/public_html/Modules/Member/Providers/../Resources/views/settings/service_areas/index.blade.php ENDPATH**/ ?>