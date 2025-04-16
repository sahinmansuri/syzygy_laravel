<li class="nav-item <?php echo e(in_array($request->segment(1), ['hms']) ? 'active active-sub' : '', false); ?>">
    <a 
        class="nav-link collapsed" 
        href="<?php echo e(action([\Modules\Hms\Http\Controllers\HmsController::class, 'index']), false); ?>"
        data-toggle="collapse"
        data-target="#hmsmanagement-menu"
        aria-expanded="true"
        aria-controls="hmsmanagement-menu"
    >
        <i class="fas fa-hotel"></i>
        <span><?php echo app('translator')->get('hms::lang.hms'); ?></span>
    </a>
    <div id="hmsmanagement-menu" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"><?php echo app('translator')->get('hms'); ?>:</h6>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('hms.manage_rooms')): ?>
            <a class="collapse-item <?php echo e($request->segment(1) == 'hms' && $request->segment(2) == 'rooms' ? 'active' : '', false); ?>" href="<?php echo e(action([Modules\Hms\Http\Controllers\RoomController::class, 'index']), false); ?>"><?php echo app('translator')->get('hms::lang.rooms'); ?></a>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('hms.manage_price')): ?>
            <a class="collapse-item <?php echo e($request->segment(1) == 'hms' && $request->segment(2) == 'room' && $request->segment(3) == 'pricing' ? 'active' : '', false); ?>" href="<?php echo e(action([Modules\Hms\Http\Controllers\RoomController::class, 'pricing']), false); ?>"><?php echo app('translator')->get('hms::lang.prices'); ?></a>
            <?php endif; ?>
            <a class="collapse-item <?php echo e($request->segment(1) == 'hms' && $request->segment(2) == 'bookings' ? 'active' : '', false); ?>" href="<?php echo e(action([Modules\Hms\Http\Controllers\HmsBookingController::class, 'index']), false); ?>"><?php echo app('translator')->get('hms::lang.bookings'); ?></a>
            <a class="collapse-item <?php echo e($request->segment(1) == 'hms' && $request->segment(2) == 'calendar' ? 'active' : '', false); ?>" href="<?php echo e(action([Modules\Hms\Http\Controllers\HmsBookingController::class, 'calendar']), false); ?>"><?php echo app('translator')->get('hms::lang.calendar'); ?></a>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('hms.manage_extra')): ?>
            <a class="collapse-item <?php echo e($request->segment(1) == 'hms' && $request->segment(2) == 'extras' ? 'active' : '', false); ?>" href="<?php echo e(action([Modules\Hms\Http\Controllers\ExtraController::class, 'index']), false); ?>"><?php echo app('translator')->get('hms::lang.extras'); ?></a>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('hms.manage_unavailable')): ?>
            <a class="collapse-item <?php echo e($request->segment(1) == 'hms' && $request->segment(2) == 'unavailables' ? 'active' : '', false); ?>" href="<?php echo e(action([Modules\Hms\Http\Controllers\UnavailableController::class, 'index']), false); ?>"><?php echo app('translator')->get('hms::lang.unavailable'); ?></a>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('hms.manage_coupon')): ?>
            <a class="collapse-item <?php echo e($request->segment(1) == 'hms' && $request->segment(2) == 'coupons' ? 'active' : '', false); ?>" href="<?php echo e(action([Modules\Hms\Http\Controllers\HmsCouponController::class, 'index']), false); ?>"><?php echo app('translator')->get('hms::lang.coupons'); ?></a>
            <?php endif; ?>
            <a class="collapse-item <?php echo e($request->segment(1) == 'hms' && $request->segment(2) == 'reports' ? 'active' : '', false); ?>" href="<?php echo e(action([Modules\Hms\Http\Controllers\HmsReportController::class, 'index']), false); ?>"><?php echo app('translator')->get('hms::lang.reports'); ?></a>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('hms.manage_amenities')): ?>
            <a class="collapse-item <?php echo e($request->segment(1) == 'hms' && $request->segment(2) == 'amenities' ? 'active' : '', false); ?>" href="<?php echo e(action([\App\Http\Controllers\TaxonomyController::class, 'index']) . '?type=amenities', false); ?>"><?php echo app('translator')->get('hms::lang.amenities'); ?></a>
            <?php endif; ?>
            <a class="collapse-item <?php echo e($request->segment(1) == 'hms' && $request->segment(2) == 'settings' ? 'active' : '', false); ?>" href="<?php echo e(action([Modules\Hms\Http\Controllers\HmsSettingController::class, 'index']), false); ?>"><?php echo app('translator')->get('messages.settings'); ?></a>
        </div>
    </div>
</li><?php /**PATH /home/vimi31/public_html/Modules/Hms/Resources/views/layouts/nav.blade.php ENDPATH**/ ?>