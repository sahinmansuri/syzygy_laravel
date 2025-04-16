<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('visitor.registration.create')): ?>
<li class="nav-item <?php echo e(in_array($request->segment(1), ['visitor-module', 'visitor']) ? 'active active-sub' : '', false); ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#visitors-menu"
        aria-expanded="true" aria-controls="visitors-menu">
        <i class="fa fa-group"></i>
        <span><?php echo app('translator')->get('visitor::lang.visitor_module'); ?></span>
    </a>
    <div id="visitors-menu" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"><?php echo app('translator')->get('visitor::lang.visitor_module'); ?>:</h6>
            <?php if($visitors): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'visitor-module' && $request->segment(2) == 'visitor' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Visitor\Http\Controllers\VisitorController@index'), false); ?>"><?php echo app('translator')->get('visitor::lang.list_visitors'); ?></a>
            <?php endif; ?>
            <?php if($visitors_registration): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'visitor-module' && $request->segment(2) == 'registration' && $request->segment(3) == '' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Visitor\Http\Controllers\VisitorRegistrationController@create'), false); ?>"><?php echo app('translator')->get('visitor::lang.visitor_registration'); ?></a>
            <?php endif; ?>
            <?php if($visitors_registration_setting): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'visitor-module' && $request->segment(2) == 'settings' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Visitor\Http\Controllers\VisitorSettingController@index'), false); ?>"><?php echo app('translator')->get('visitor::lang.visitor_registration_settings'); ?>.</a>
            <?php endif; ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'visitor-module' && $request->segment(2) == 'qr-visitor-reg' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Visitor\Http\Controllers\VisitorController@generateQr'), false); ?>"><?php echo app('translator')->get('visitor::lang.qr_visitor_reg'); ?>.</a>
        </div>
    </div>
</li>
<?php endif; ?><?php /**PATH /home/vimi31/public_html/Modules/Visitor/Providers/../Resources/views/layouts_v2/partials/sidebar.blade.php ENDPATH**/ ?>