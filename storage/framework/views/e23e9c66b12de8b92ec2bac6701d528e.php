

<li class="nav-item <?php echo e(in_array( $request->segment(1), ['hrm']) ? 'active active-sub' : '', false); ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#hrm-menu"
        aria-expanded="true" aria-controls="hrm-menu">
        <i class="fa fa-users"></i>
        <span><?php echo app('translator')->get('essentials::lang.hrm'); ?></span>
    </a>
	<div id="hrm-menu" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"><?php echo app('translator')->get('essentials::lang.hrm'); ?>:</h6>
			<a class="collapse-item <?php echo e(in_array( $request->segment(1), ['hrm']) && $request->segment(2) == 'employee' ? 'active' : '', false); ?>" href="<?php echo e(action([\Modules\Essentials\Http\Controllers\DashboardController::class, 'hrmDashboard']), false); ?>"><?php echo app('translator')->get('essentials::lang.hrm'); ?></a>
			<a class="collapse-item <?php echo e(in_array( $request->segment(1), ['hrm']) && $request->segment(2) == 'advances' ? 'active' : '', false); ?>" href="<?php echo e(action([\Modules\Essentials\Http\Controllers\AdvancesController::class, 'index']), false); ?>"><?php echo app('translator')->get('essentials::lang.hrm_advance'); ?></a>
		
		</div>
	</div>
</li><?php /**PATH /home/vimi31/public_html/Modules/Essentials/Providers/../Resources/views/layouts/partials/sidebar_hrm.blade.php ENDPATH**/ ?>