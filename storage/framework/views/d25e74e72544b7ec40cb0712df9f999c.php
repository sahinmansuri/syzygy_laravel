<li class="nav-item <?php echo e(in_array($request->segment(1), ['property']) ? 'active active-sub' : '', false); ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#projects-menu"
        aria-expanded="true" aria-controls="projects-menu">
        <i class="ti-layout-media-right-alt"></i>
        <span><?php echo app('translator')->get('property::lang.property'); ?></span>
    </a>
    <div id="projects-menu" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"><?php echo app('translator')->get('property::lang.property'); ?>:</h6>
            <a class="collapse-item <?php echo e($request->segment(2) == 'list-price-changes' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Property\Http\Controllers\PriceChangesController@index'), false); ?>"><?php echo app('translator')->get('property::lang.list_price_changes'); ?></a>
            
            <a class="collapse-item <?php echo e($request->segment(2) == 'sale-and-customer-payment' && $request->segment(3) == 'dashboard' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Property\Http\Controllers\SaleAndCustomerPaymentController@dashboard', ['type' => 'customer']), false); ?>"><?php echo app('translator')->get('property::lang.sales_dashboard'); ?></a>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('property.customer.view')): ?>
                <a class="collapse-item <?php echo e($request->segment(2) == 'contacts' && $request->input('type') == 'customer' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Property\Http\Controllers\ContactController@index', ['type' => 'customer']), false); ?>"><?php echo app('translator')->get('property::lang.property_customer'); ?></a>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('property.list.view')): ?>
                <a class="collapse-item <?php echo e($request->segment(2) == 'properties' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Property\Http\Controllers\PropertyController@index'), false); ?>"><?php echo app('translator')->get('property::lang.list_properties'); ?></a>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('property.purchase.view')): ?>
                <a class="collapse-item <?php echo e($request->segment(2) == 'purchases' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Property\Http\Controllers\PurchaseController@index'), false); ?>"><?php echo app('translator')->get('property::lang.property_purchase'); ?></a>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('property.purchase.view')): ?>
                <a class="collapse-item <?php echo e($request->segment(2) == 'reports' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Property\Http\Controllers\ReportController@index'), false); ?>"> <?php echo app('translator')->get('property::lang.reports'); ?></a>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('property.settings.access')): ?>
                <a class="collapse-item <?php echo e($request->segment(2) == 'settings' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Property\Http\Controllers\SettingController@index'), false); ?>"><?php echo app('translator')->get('property::lang.settings'); ?></a>
            <?php endif; ?>
        </div>
    </div>
</li>

<?php if($list_easy_payment): ?>
<?php if(auth()->user()->can('list_easy_payments.access')): ?>
    <li class="nav-item <?php echo e(in_array( $request->segment(2), ['easy-payments']) ? 'active active-sub' : '', false); ?>">
        <a class="nav-link" href="<?php echo e(action('\Modules\Property\Http\Controllers\EasyPaymentController@index'), false); ?>">
            <i class="fa fa-money"></i>
            <span><?php echo app('translator')->get('property::lang.list_easy_payments'); ?></span></a>
    </li>

<?php endif; ?>
<?php endif; ?>
<?php /**PATH /home/vimi31/public_html/Modules/Property/Resources/views/layouts_v2/partials/sidebar.blade.php ENDPATH**/ ?>