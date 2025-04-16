
<li class="nav-item <?php echo e(in_array( $request->segment(1), ['essentials']) ? 'active active-sub' : '', false); ?>">
    <a class="nav-link" href="<?php echo e(action([\Modules\Essentials\Http\Controllers\ToDoController::class, 'index']), false); ?>">
        <i class="fas fa-check-circle"></i>
        <span><?php echo app('translator')->get('essentials::lang.essentials'); ?></span></a>
</li>
<?php /**PATH /home/vimi31/public_html/Modules/Essentials/Providers/../Resources/views/layouts/partials/sidebar.blade.php ENDPATH**/ ?>