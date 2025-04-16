<!-- Main content -->
<section class="content">
    <?php $__env->startComponent('components.widget', ['class' => 'box-primary']); ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("manufacturing.add_recipe")): ?>
        <?php $__env->slot('tool'); ?>
            <div class="box-tools pull-right">
                <button class="btn btn-primary btn-modal" data-container="#recipe_modal" data-href="<?php echo e(action('\Modules\Manufacturing\Http\Controllers\RecipeController@create'), false); ?>">
                    <i class="fa fa-plus"></i> <?php echo app('translator')->get( 'messages.add' ); ?></button>
            </div>
        <?php $__env->endSlot(); ?>
        <?php endif; ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="recipe_table">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="select-all-row"></th>
                        <th><?php echo app('translator')->get( 'manufacturing::lang.recipe' ); ?></th>
                        <th><?php echo app('translator')->get( 'product.category' ); ?></th>
                        <th><?php echo app('translator')->get( 'product.sub_category' ); ?></th>
                        <th><?php echo app('translator')->get( 'lang_v1.quantity' ); ?></th>
                        <th><?php echo app('translator')->get( 'lang_v1.price' ); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('manufacturing::lang.price_updated_live') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></th>
                        <th><?php echo app('translator')->get( 'sale.unit_price' ); ?></th>
                        <th><?php echo app('translator')->get( 'messages.action' ); ?></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td colspan="8">
                            
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    <?php echo $__env->renderComponent(); ?>
</section>
<?php /**PATH /home/vimi31/public_html/Modules/Manufacturing/Providers/../Resources/views/recipe/index.blade.php ENDPATH**/ ?>