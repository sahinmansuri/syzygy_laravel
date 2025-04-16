
	<li class="nav-item <?php echo e(in_array($request->segment(1), ['manufacturing']) ? 'active active-sub' : '', false); ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#manufacturing-menu"
            aria-expanded="true" aria-controls="manufacturing-menu">
            <i class="fa fa-industry"></i>
            <span><?php echo app('translator')->get('manufacturing::lang.manufacturing'); ?></span>
        </a>
        <div id="manufacturing-menu" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"><?php echo app('translator')->get('manufacturing::lang.manufacturing'); ?>:</h6>
                <a class="collapse-item <?php echo e($request->segment(1) == 'manufacturing'? 'active active-sub' : '', false); ?>" href="<?php echo e(action('\Modules\Manufacturing\Http\Controllers\ManufacturingController@index'), false); ?>"><?php echo app('translator')->get('manufacturing::lang.manufacturing'); ?></a>
            </div>
        </div>
    </li>
<?php /**PATH /home/vimi31/public_html/Modules/Manufacturing/Providers/../Resources/views/layouts_v2/partials/sidebar.blade.php ENDPATH**/ ?>