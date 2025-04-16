<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __(
            'member::lang.all_balamandalaya')]); ?>
            <?php $__env->slot('tool'); ?>
            <div class="box-tools">
                <button type="button" class="btn btn-primary btn-modal pull-right" id="add_balamandalaya_btn"
                    data-href="<?php echo e(action('\Modules\Member\Http\Controllers\BalamandalayaController@create'), false); ?>"
                    data-container=".balamandalaya_model">
                    <i class="fa fa-plus"></i> <?php echo app('translator')->get( 'member::lang.add' ); ?></button>
            </div>
            <?php $__env->endSlot(); ?>

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-bordered" id="balamandalaya_table" style="width: 100%;">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get( 'member::lang.date' ); ?></th>
                                <th><?php echo app('translator')->get( 'member::lang.gramaseva_vasama' ); ?></th>
                                <th><?php echo app('translator')->get( 'member::lang.balamandalaya' ); ?></th>
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
<!-- /.content --><?php /**PATH /home/vimi31/public_html/Modules/Member/Providers/../Resources/views/settings/balamandalaya/index.blade.php ENDPATH**/ ?>