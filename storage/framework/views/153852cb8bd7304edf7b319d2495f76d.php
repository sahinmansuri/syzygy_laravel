 <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ezyinvoice-menu"
        aria-expanded="true" aria-controls="ezyinvoice-menu">
        <i class="fa fa-car"></i>
        <span><?php echo app('translator')->get('ezyinvoice::lang.ezy_invoice'); ?></span>
    </a>
    <div id="ezyinvoice-menu" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"><?php echo app('translator')->get('ezyinvoice::lang.ezy_invoice'); ?>:</h6>
            <a class="collapse-item <?php echo e($request->segment(2) == 'invoices' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\EzyInvoice\Http\Controllers\EzyInvoiceController@index'), false); ?>">
                <?php echo app('translator')->get('ezyinvoice::lang.invoices'); ?>
            </a>
        </div>
    </div>
</li>
<?php /**PATH /home/vimi31/public_html/Modules/EzyInvoice/Resources/views/layouts/nav.blade.php ENDPATH**/ ?>