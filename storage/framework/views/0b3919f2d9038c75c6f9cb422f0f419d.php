<li class="nav-item">
    <a class="nav-link collapsed <?php echo e(in_array($request->segment(1), ['crm']) && $request->segment(2) != 'issue-customer-bill'? 'active active-sub' : '', false); ?>" href="#" data-toggle="collapse" data-target="#crm-menu-module"
        aria-expanded="true" aria-controls="crm-menu-module">
        <i class="fa fa-tint fa-lg"></i>
        <span><?php echo app('translator')->get('superadmin::lang.crm_module'); ?></span>
    </a>
    <div id="crm-menu-module" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"><?php echo app('translator')->get('superadmin::lang.crm_module'); ?> popua:</h6>
            <?php if(auth()->user()->can('crm.access_all_leads') || auth()->user()->can('crm.access_own_leads')): ?>
                <a class="collapse-item <?php if(request()->segment(2) == 'leads'): ?> active <?php endif; ?>" href="<?php echo e(action([\Modules\Crm\Http\Controllers\LeadController::class, 'index']). '?lead_view=list_view', false); ?>"><?php echo app('translator')->get('crm::lang.leads'); ?></a>
            <?php endif; ?>
            <a class="collapse-item <?php if(request()->segment(2) == 'crm-dashboard'): ?> active <?php endif; ?>" href="<?php echo e(action([\Modules\Crm\Http\Controllers\CrmDashboardController::class, 'index']), false); ?>">
      <?php echo app('translator')->get('crm::lang.crm_dashboard'); ?>
       </a>
 
            <?php if(auth()->user()->can('crm.access_all_schedule') || auth()->user()->can('crm.access_own_schedule')): ?>
                <a class="collapse-item <?php if(request()->segment(2) == 'follow-ups'): ?> active <?php endif; ?>" href="<?php echo e(action([\Modules\Crm\Http\Controllers\ScheduleController::class, 'index']), false); ?>"><?php echo app('translator')->get('crm::lang.follow_ups'); ?></a>
            <?php endif; ?>
            
            <?php if(auth()->user()->can('crm.access_all_campaigns') || auth()->user()->can('crm.access_own_campaigns')): ?>
                <a class="collapse-item <?php if(request()->segment(2) == 'campaigns'): ?> active <?php endif; ?>" href="<?php echo e(action([\Modules\Crm\Http\Controllers\CampaignController::class, 'index']), false); ?>"><?php echo app('translator')->get('crm::lang.campaigns'); ?></a>
            <?php endif; ?> 
            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crm.access_contact_login')): ?>
                <a class="collapse-item" href="<?php echo e(action([\Modules\Crm\Http\Controllers\ContactLoginController::class, 'allContactsLoginList']), false); ?>"> <?php echo app('translator')->get('crm::lang.contacts_login'); ?></a>
                <a class="collapse-item" href="<?php echo e(action([\Modules\Crm\Http\Controllers\ContactLoginController::class, 'commissions']), false); ?>"><?php echo app('translator')->get('crm::lang.commissions'); ?></a>
            <?php endif; ?>
            
            <?php if((auth()->user()->can('crm.view_all_call_log') || auth()->user()->can('crm.view_own_call_log')) && config('constants.enable_crm_call_log')): ?>
                <a class="collapse-item <?php if(request()->segment(2) == 'call-log'): ?> active <?php endif; ?>" href="<?php echo e(action([\Modules\Crm\Http\Controllers\CallLogController::class, 'index']), false); ?>"><?php echo app('translator')->get('crm::lang.call_log'); ?></a>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crm.view_reports')): ?>
                <a class="collapse-item  <?php if(request()->segment(2) == 'reports'): ?> active <?php endif; ?>" href="<?php echo e(action([\Modules\Crm\Http\Controllers\ReportController::class, 'index']), false); ?>"><?php echo app('translator')->get('report.reports'); ?></a>
            <?php endif; ?>
            
            <a class="collapse-item <?php if(request()->segment(2) == 'proposal-template'): ?> active <?php endif; ?>" href="<?php echo e(action([\Modules\Crm\Http\Controllers\ProposalTemplateController::class, 'index']), false); ?>">
                    <?php echo app('translator')->get('crm::lang.proposal_template'); ?>
                </a>
            
            <a class="collapse-item <?php if(request()->segment(2) == 'proposals'): ?> active <?php endif; ?>" href="<?php echo e(action([\Modules\Crm\Http\Controllers\ProposalController::class, 'index']), false); ?>">
                    <?php echo app('translator')->get('crm::lang.proposals'); ?>
                </a>
            
            <?php if(auth()->user()->can('crm.access_b2b_marketplace') && config('constants.enable_b2b_marketplace')): ?>
            <a class="collapse-item <?php if(request()->segment(2) == 'b2b-marketplace'): ?> active <?php endif; ?>" href="<?php echo e(action([\Modules\Crm\Http\Controllers\CrmMarketplaceController::class, 'index']), false); ?>">
                    <?php echo app('translator')->get('crm::lang.b2b_marketplace'); ?>
                </a>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crm.access_sources')): ?>
                <a class="collapse-item <?php if(request()->get('type') == 'source'): ?> active <?php endif; ?>" href="<?php echo e(action([\App\Http\Controllers\TaxonomyController::class, 'index']) . '?type=source', false); ?>"><?php echo app('translator')->get('crm::lang.sources'); ?></a>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crm.access_life_stage')): ?>
                <a class="collapse-item <?php if(request()->get('type') == 'life_stage'): ?> active <?php endif; ?>" href="<?php echo e(action([\App\Http\Controllers\TaxonomyController::class, 'index']) . '?type=life_stage', false); ?>"><?php echo app('translator')->get('crm::lang.life_stage'); ?></a>

                <a class="collapse-item <?php if(request()->get('type') == 'followup_category'): ?> active <?php endif; ?>" href="<?php echo e(action([\App\Http\Controllers\TaxonomyController::class, 'index']) . '?type=followup_category', false); ?>"><?php echo app('translator')->get('crm::lang.followup_category'); ?></a>
            <?php endif; ?>
            
            <a class="collapse-item <?php if(request()->segment(2) == 'settings'): ?> active <?php endif; ?>" href="<?php echo e(action([\Modules\Crm\Http\Controllers\CrmSettingsController::class, 'index']), false); ?>">
                <?php echo app('translator')->get('business.settings'); ?>
            </a>
        
        </div>
    </div>
</li>
<?php /**PATH /home/vimi31/public_html/Modules/Crm/Providers/../Resources/views/layouts/sidebar.blade.php ENDPATH**/ ?>