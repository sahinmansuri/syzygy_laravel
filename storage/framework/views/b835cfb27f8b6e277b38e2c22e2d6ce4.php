<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_dsr')): ?>
<li class="nav-item <?php echo e(in_array($request->segment(1), ['dsr']) ? 'active active-sub' : '', false); ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dsr-menu"
        aria-expanded="true" aria-controls="dsr-menu">
        <i class="fa fa-users"></i>
        <span><?php echo app('translator')->get('dsr::lang.dsr_management'); ?></span>
    </a>
    <div id="dsr-menu" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Dsr Management:</h6>
                <?php if(!auth()->user()->hasRole('dsr_officer')): ?>
                    <a class="collapse-item <?php echo e($request->segment(1) == 'dsr' && $request->segment(2) == 'Settings' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Dsr\Http\Controllers\DsrController@settings'), false); ?>"><?php echo app('translator')->get('dsr::lang.settings'); ?></a>
                <?php endif; ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'dsr' && $request->segment(2) == 'report' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Dsr\Http\Controllers\DsrController@report'), false); ?>"><?php echo app('translator')->get('dsr::lang.report'); ?></a>
                
                <?php if(!auth()->user()->hasRole('dsr_officer')): ?>
                    <a class="collapse-item <?php echo e($request->segment(1) == 'dsr' && $request->segment(2) == 'locations' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Dsr\Http\Controllers\LocationsController@index'), false); ?>"><?php echo app('translator')->get('dsr::lang.locations'); ?></a>
                <?php endif; ?>
        </div>
    </div>
</li>
<?php endif; ?>
<?php /**PATH /home/vimi31/public_html/Modules/Dsr/Resources/views/layouts_v2/partials/sidebar.blade.php ENDPATH**/ ?>