<li class="nav-item <?php echo e(in_array($request->segment(1), ['Stocktaking']) ? 'active active-sub' : '', false); ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#stocktaking-menu"
        aria-expanded="true" aria-controls="stocktaking-menu">
        <i class="fa fa-calculator"></i>
        <span><?php echo app('translator')->get('Stocktaking::lang.Stocktaking'); ?></span>
    </a>
    <div id="stocktaking-menu" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Stock Taking:</h6>
            <?php if(auth()->user()->can('f22_stock_taking_form')): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'Stocktaking' && $request->segment(2) == 'F22_stock_taking' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Stocktaking\Http\Controllers\F22FormController@F22StockTaking'), false); ?>"><?php echo app('translator')->get('Stocktaking::lang.F22StockTaking_form'); ?></a>
            <?php endif; ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'Stocktaking' && $request->segment(2) == 'forms-setting' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Stocktaking\Http\Controllers\FormsSettingController@index'), false); ?>"><?php echo app('translator')->get('Stocktaking::lang.Stocktaking_forms_setting'); ?></a>
        </div>
    </div>
</li><?php /**PATH /home/vimi31/public_html/Modules/Stocktaking/Providers/../Resources/views/layouts_v2/partials/sidebar.blade.php ENDPATH**/ ?>