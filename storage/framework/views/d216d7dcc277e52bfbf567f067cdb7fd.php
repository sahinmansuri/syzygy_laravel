<li class="nav-item <?php echo e(in_array($request->segment(1), ['leads']) ? 'active active-sub' : '', false); ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#leads-menu"
        aria-expanded="true" aria-controls="leads-menu">
        <i class="fa fa-filter"></i>
        <span><?php echo app('translator')->get('leads::lang.leads'); ?></span>
    </a>
    <div id="leads-menu" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"><?php echo app('translator')->get('leads::lang.leads'); ?>:</h6>
            
            <?php if($leads): ?>
            <?php if(auth()->user()->can('leads.view') || auth()->user()->can('leads.edit') ||
            auth()->user()->can('leads.destory')|| auth()->user()->can('leads.create')): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'leads' && $request->segment(2) == 'leads'? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Leads\Http\Controllers\LeadsController@index'), false); ?>"><?php echo app('translator')->get('leads::lang.leads'); ?></a>
            <?php endif; ?>
            <?php endif; ?>
            <?php if($leads_import): ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('leads.import')): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'leads' && $request->segment(2) == 'import'? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Leads\Http\Controllers\ImportLeadsController@index'), false); ?>"><?php echo app('translator')->get('leads::lang.import_data'); ?></a>
            <?php endif; ?>
            <?php endif; ?>
            <?php if($day_count): ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('day_count')): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'leads' && $request->segment(2) == 'day-count'? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Leads\Http\Controllers\DayCountController@index'), false); ?>"><?php echo app('translator')->get('leads::lang.day_count'); ?></a>
            <?php endif; ?>
            <?php endif; ?>
            
            <?php if($leads_settings): ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('leads.settings')): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'leads' && $request->segment(2) == 'settings'? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Leads\Http\Controllers\SettingController@index'), false); ?>"><?php echo app('translator')->get('leads::lang.settings'); ?></a>
            <?php endif; ?>
            <?php endif; ?>
                
        </div>
    </div>
</li><?php /**PATH /home/vimi31/public_html/Modules/Leads/Providers/../Resources/views/layouts_v2/partials/sidebar.blade.php ENDPATH**/ ?>