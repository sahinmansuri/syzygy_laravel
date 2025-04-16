<section class="no-print">
    

<li class="nav-item <?php echo e(in_array(request()->segment(1), ['loan']) ? 'active active-sub' : '', false); ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#loan-menu"
        aria-expanded="true" aria-controls="loan-menu">
        <i class="ti-settings"></i>
        <span><?php echo e(__('loan::lang.loan'), false); ?></span>
    </a>
    <div id="loan-menu" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"><?php echo e(__('loan::lang.loan'), false); ?>:</h6>
            
                    <?php if(auth()->user()->can('job_sheet.view_all')): ?>
                        <a class="collapse-item" href="<?php echo e(url('contact_loan'), false); ?>"><?php echo app('translator')->get('loan::lang.view_loans'); ?></a>
                    <?php endif; ?>
                    
                    <a class="collapse-item" href="<?php echo e(url('contact_loan/create'), false); ?>"><?php echo app('translator')->get('loan::lang.create_loan'); ?></a>
                    
                    <a class="collapse-item" href="<?php echo e(url('contact_loan/repaymentbulk'), false); ?>"><?php echo app('translator')->get('loan::lang.bulk_repayments'); ?></a>
                    
                    <?php if(auth()->user()->can('edit_repair_settings')): ?>
                        <a class="collapse-item" href="<?php echo e(url('contact_loan/import'), false); ?>"><?php echo app('translator')->get('core.bulk'); ?> <?php echo app('translator')->get('loan::lang.import_loan'); ?></a>
                    <?php endif; ?>
                    
                    <a class="collapse-item" href="<?php echo e(url('contact_loan/calculator'), false); ?>"><?php echo e(trans_choice('loan::general.calculator', 1), false); ?></a>
'                   
                    <a class="collapse-item" href="<?php echo e(url('contact_loan/collateral_type'), false); ?>"><?php echo app('translator')->get('core.settings'); ?></a>

                    <a class="collapse-item" href="<?php echo e(url('report/contact_loan'), false); ?>"><?php echo e(trans_choice('core.report', 2), false); ?></a>

            
        </div>
    </div>
</li>
        

    
</section>
<?php /**PATH /home/vimi31/public_html/Modules/Loan/Providers/../Resources/views/layouts/nav.blade.php ENDPATH**/ ?>