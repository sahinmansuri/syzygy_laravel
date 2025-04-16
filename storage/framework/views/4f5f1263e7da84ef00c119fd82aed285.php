<li <?php if(request()->segment(2) == 'assets'): ?> class="nav-item active active-sub" <?php else: ?> class="nav-item" <?php endif; ?>>
    <a 
        class="nav-link collapsed" 
        href="<?php echo e(action([\Modules\AssetManagement\Http\Controllers\AssetController::class, 'dashboard']), false); ?>"
        data-toggle="collapse"
        data-target="#assetmanagement-menu"
        aria-expanded="true"
        aria-controls="assetmanagement-menu"
    >
    	<i class="fas fa fa-boxes"></i>
    	<span><?php echo app('translator')->get('assetmanagement::lang.asset_management'); ?></span>
    </a>

    <div id="assetmanagement-menu" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"><?php echo app('translator')->get('assetmanagement::lang.asset_management'); ?>:</h6>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('asset.view')): ?>
                    <a <?php if(request()->segment(2) == 'assets'): ?> class="collapse-item active" <?php else: ?> class="collapse-item" <?php endif; ?>  href="<?php echo e(action([\Modules\AssetManagement\Http\Controllers\AssetController::class, 'index']), false); ?>">
                        <?php echo app('translator')->get('assetmanagement::lang.assets'); ?>
                    </a>
                    <a <?php if(request()->segment(2) == 'allocation'): ?> class="collapse-item active" <?php else: ?> class="collapse-item" <?php endif; ?> href="<?php echo e(action([\Modules\AssetManagement\Http\Controllers\AssetAllocationController::class, 'index']), false); ?>">
                        <?php echo app('translator')->get('assetmanagement::lang.asset_allocated'); ?>
                    </a>
                    <a <?php if(request()->segment(2) == 'revocation'): ?> class="collapse-item active" <?php else: ?> class="collapse-item" <?php endif; ?> href="<?php echo e(action([\Modules\AssetManagement\Http\Controllers\RevokeAllocatedAssetController::class, 'index']), false); ?>">
                        <?php echo app('translator')->get('assetmanagement::lang.revoked_asset'); ?>
                    </a>
                <?php endif; ?>
                <?php if(auth()->user()->can('asset.view_all_maintenance') || auth()->user()->can('asset.view_own_maintenance')): ?>
                    <a  <?php if(request()->segment(2) == 'maintenance'): ?> class="collapse-item active" <?php else: ?> class="collapse-item" <?php endif; ?> href="<?php echo e(action([\Modules\AssetManagement\Http\Controllers\AssetMaitenanceController::class, 'index']), false); ?>">
                        <?php echo app('translator')->get('assetmanagement::lang.asset_maintenance'); ?>
                    </a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('only_admin')): ?>
                	<a <?php if(request()->get('type') == 'asset'): ?> class="collapse-item active" <?php else: ?> class="collapse-item" <?php endif; ?> href="<?php echo e(action([\App\Http\Controllers\TaxonomyController::class, 'index']) . '?type=asset', false); ?>">
                		<?php echo app('translator')->get('assetmanagement::lang.asset_categories'); ?>
                	</a>
                    <a <?php if(request()->segment(2) == 'settings'): ?> class="collapse-item active' <?php else: ?> class="collapse-item" <?php endif; ?> href="<?php echo e(action([\Modules\AssetManagement\Http\Controllers\AssetSettingsController::class, 'index']), false); ?>">
                        <?php echo app('translator')->get('role.settings'); ?>
                    </a>
                <?php endif; ?>

        </div>
    </div>
</li>
<?php /**PATH /home/vimi31/public_html/Modules/AssetManagement/Providers/../Resources/views/layouts/nav.blade.php ENDPATH**/ ?>