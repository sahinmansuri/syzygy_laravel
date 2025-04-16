<li class="nav-item <?php echo e(in_array($request->segment(1), ['pricechanges']) ? 'active active-sub' : '', false); ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pricechanges-menu"
        aria-expanded="true" aria-controls="pricechanges-menu">
        <i class="fa fa-calculator"></i>
        <span><?php echo app('translator')->get('pricechanges::lang.mpcs'); ?></span>
    </a>
    <div id="pricechanges-menu" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"><?php echo app('translator')->get('pricechanges::lang.mpcs'); ?>:</h6>
            
            <?php if(auth()->user()->can('f17_form')): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'pricechanges' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\PriceChanges\Http\Controllers\F17FormController@index'), false); ?>"><?php echo app('translator')->get('pricechanges::lang.F17_form'); ?></a>
            <?php endif; ?>
        </div>
    </div>
</li>

<?php /**PATH /home/vimi31/public_html/Modules/PriceChanges/Providers/../Resources/views/layouts_v2/partials/sidebar.blade.php ENDPATH**/ ?>