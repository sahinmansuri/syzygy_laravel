<li class="nav-item <?php if( in_array($request->segment(1), ['family-members', 'superadmin', 'pay-online'])): ?> <?php echo e('active active-sub', false); ?> <?php endif; ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#autorepair-menu"
        aria-expanded="true" aria-controls="autorepair-menu">
       <i class="fa fa-cog"></i>
        <span><?php echo e(__('autorepairservices::lang.auto_repair_services'), false); ?></span>
    </a>
    <div id="autorepair-menu" class="collapse" aria-labelledby="autorepair-menu"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"><?php echo e(__('autorepairservices::lang.auto_repair_services'), false); ?>:</h6>
            
            <a class="collapse-item" href="<?php echo e(action('\Modules\AutoRepairServices\Http\Controllers\DashboardController@index'), false); ?>"><?php echo e(__('autorepairservices::lang.auto_repair_services'), false); ?></a>
            <?php if(auth()->user()->can('job_sheet.create') || auth()->user()->can('job_sheet.view_assigned') || auth()->user()->can('job_sheet.view_all')): ?>
            
                <a class="collapse-item <?php echo e(request()->segment(2) == 'job-sheet' && empty(request()->segment(3)) ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\AutoRepairServices\Http\Controllers\JobSheetController@index'), false); ?>"><?php echo app('translator')->get('autorepairservices::lang.job_sheets'); ?></a>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('job_sheet.create')): ?>
            
                <a class="collapse-item <?php echo e(request()->segment(2) == 'job-sheet' && request()->segment(3) == 'create' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\AutoRepairServices\Http\Controllers\JobSheetController@create'), false); ?>"><?php echo app('translator')->get('autorepairservices::lang.add_job_sheet'); ?></a>
            <?php endif; ?>

            <?php if(auth()->user()->can('repair.view') || auth()->user()->can('repair.view_own')): ?>
                 <a class="collapse-item <?php echo e(request()->segment(2) == 'repair' && empty(request()->segment(3)) ? 'active active-sub' : '', false); ?>" href="<?php echo e(action('\Modules\AutoRepairServices\Http\Controllers\RepairController@index'), false); ?>"><?php echo app('translator')->get('autorepairservices::lang.list_invoices'); ?></a>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('repair.create')): ?>
            
                <a class="collapse-item <?php echo e(request()->segment(2) == 'repair' && request()->segment(3) == 'create' ? 'active active-sub' : '', false); ?>" href="<?php echo e(action('SellPosController@create'). '?sub_type=repair', false); ?>"><?php echo app('translator')->get('autorepairservices::lang.add_invoice'); ?></a>
            
            <?php endif; ?>
            <?php if(auth()->user()->can('brand.view') || auth()->user()->can('brand.create')): ?>
            
                <a class="collapse-item <?php echo e(request()->segment(1) == 'brands' ? 'active active-sub' : '', false); ?>" href="<?php echo e(action('\Modules\AutoRepairServices\Http\Controllers\AutorepairBrandController@index'), false); ?>"><?php echo app('translator')->get('brand.brands'); ?></a>
            <?php endif; ?>
            <?php if(auth()->user()->can('edit_repair_settings')): ?>
                
                <a class="collapse-item <?php echo e(request()->segment(1) == 'repair' && request()->segment(2) == 'repair-settings' ? 'active active-sub' : '', false); ?>" href="<?php echo e(action('\Modules\AutoRepairServices\Http\Controllers\RepairSettingsController@index'), false); ?>"><?php echo app('translator')->get('messages.settings'); ?></a>
                
            <?php endif; ?>
                    
        </div>
    </div>
</li><?php /**PATH /home/vimi31/public_html/Modules/AutoRepairServices/Providers/../Resources/views/layouts/sidebar.blade.php ENDPATH**/ ?>