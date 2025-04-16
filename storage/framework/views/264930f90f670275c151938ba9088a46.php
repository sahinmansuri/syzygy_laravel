
<!-- Main content -->
<section class="content">
    <?php $__env->startComponent('components.widget', ['class' => 'box-primary']); ?>
        <?php $__env->slot('tool'); ?>
            <div class="box-tools pull-right">
                <a class="btn btn-primary" href="<?php echo e(action('\Modules\Manufacturing\Http\Controllers\ProductionController@createNew'), false); ?>">
                    <i class="fa fa-plus"></i> <?php echo app('translator')->get( 'messages.add' ); ?></a>
            </div>
        <?php $__env->endSlot(); ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="productions_table" style="width: 100%;">
                 <thead>
                    <tr>
                        <th><?php echo app('translator')->get('messages.date'); ?></th>
                        <th><?php echo app('translator')->get('purchase.ref_no'); ?></th>
                        <th><?php echo app('translator')->get('manufacturing::lang.lot_numbers'); ?></th>
                        <th><?php echo app('translator')->get('purchase.location'); ?></th>
                        <th><?php echo app('translator')->get('sale.product'); ?></th>
                        <th><?php echo app('translator')->get('lang_v1.quantity'); ?></th>
                        <th><?php echo app('translator')->get('manufacturing::lang.total_cost'); ?></th>
                        <th><?php echo app('translator')->get('messages.action'); ?></th>
                    </tr>
                </thead>
            </table>
        </div>
    <?php echo $__env->renderComponent(); ?>
</section>

<?php /**PATH /home/vimi31/public_html/Modules/Manufacturing/Providers/../Resources/views/production/index.blade.php ENDPATH**/ ?>