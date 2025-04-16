<li class="nav-item <?php echo e(in_array($request->segment(1), ['mpcs']) ? 'active active-sub' : '', false); ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#mpcs-menu"
        aria-expanded="true" aria-controls="mpcs-menu">
        <i class="fa fa-calculator"></i>
        <span><?php echo app('translator')->get('mpcs::lang.mpcs'); ?></span>
    </a>
    <div id="mpcs-menu" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"><?php echo app('translator')->get('mpcs::lang.mpcs'); ?>:</h6>
            <?php if(auth()->user()->can('f16a_form') || auth()->user()->can('f15a9abc_form') || auth()->user()->can('f16a_form') || auth()->user()->can('f21c_form')): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'mpcs' && $request->segment(2) == 'form-set-1' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\MPCS\Http\Controllers\MPCSController@FromSet1'), false); ?>"><?php echo app('translator')->get('mpcs::lang.form_set_1'); ?></a>
            <?php endif; ?>
            <?php if(auth()->user()->can('f9a_form') || auth()->user()->can('f9a_settings_form')): ?>
          
            <a class="collapse-item <?php echo e($request->segment(1) == 'mpcs' && $request->segment(2) == 'form-9a' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\MPCS\Http\Controllers\MPCSController@From9A'), false); ?>"><?php echo app('translator')->get('mpcs::lang.form_9_a'); ?></a>
            <?php endif; ?>
            
             
            
<?php
    $canF9CForm = auth()->user()->can('f9c_form');
    $canF9CSettingsForm = auth()->user()->can('f9c_settings_form');
?>

 
<?php if($canF9CForm || $canF9CSettingsForm): ?>
    <a class="collapse-item <?php echo e(request()->segment(1) == 'mpcs' && request()->segment(2) == 'form-9c' ? 'active' : '', false); ?>" 
       href="<?php echo e(action('\Modules\MPCS\Http\Controllers\MPCSController@From9C'), false); ?>">
       <?php echo app('translator')->get('mpcs::lang.9c_cash_form'); ?>
    </a>
<?php else: ?>
    <p>Access Denied</p>
<?php endif; ?>
<?php
    $canF9CcrForm = auth()->user()->can('f9c_form');
    $canF9CcrSettingsForm = auth()->user()->can('f9c_settings_form');
?>

 
<?php if($canF9CcrForm || $canF9CcrSettingsForm): ?>
    <a class="collapse-item <?php echo e(request()->segment(1) == 'mpcs' && request()->segment(2) == 'form-9ccr' ? 'active' : '', false); ?>" 
       href="<?php echo e(action('\Modules\MPCS\Http\Controllers\MPCSController@From9CCR'), false); ?>">
       <?php echo app('translator')->get('mpcs::lang.9c_credit_form'); ?>
    </a>
<?php else: ?>
    <p>Access Denied</p>
<?php endif; ?>
            
            <!--By Zamaluddin : Time 04:20 PM : 28 January 2025-->
            
          
            
            <?php if(auth()->user()->can('f15_form')): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'mpcs' && $request->segment(2) == 'F15' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\MPCS\Http\Controllers\F15FormController@index'), false); ?>"><?php echo app('translator')->get('mpcs::lang.F15_form'); ?></a>
            
            <?php endif; ?>
            
            <!--End-->
            
            <?php if(auth()->user()->can('f14_form')): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'mpcs' && $request->segment(2) == 'F14' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\MPCS\Http\Controllers\NewF14FormController@index'), false); ?>"><?php echo app('translator')->get('mpcs::lang.F14_form'); ?></a>
            
            <?php endif; ?>
            
            
            
            <?php if(auth()->user()->can('f16_form')): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'mpcs' && $request->segment(2) == 'F116A' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\MPCS\Http\Controllers\F16AFormController@index'), false); ?>"><?php echo app('translator')->get('mpcs::lang.F16A_form'); ?></a>
            
            <?php endif; ?>
            
               
            
            <?php if(auth()->user()->can('f17_form')): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'mpcs' && $request->segment(2) == 'F17' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\MPCS\Http\Controllers\F17FormController@index'), false); ?>"><?php echo app('translator')->get('mpcs::lang.F17_form'); ?></a>
            <?php endif; ?>
            <?php if(auth()->user()->can('f14b_form') || auth()->user()->can('f20_form')): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'mpcs' && $request->segment(2) == 'F14B_F20_Forms' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\MPCS\Http\Controllers\F20F14bFormController@index'), false); ?>"><?php echo app('translator')->get('mpcs::lang.F20andF14b_form'); ?></a>
            <?php endif; ?>
           
            <?php if(auth()->user()->can('f21_form')): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'mpcs' && $request->segment(2) == '21Form' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\MPCS\Http\Controllers\F21FormController@get21Form'), false); ?>"><?php echo app('translator')->get('mpcs::lang.f21_form'); ?></a>
            <?php endif; ?>
           
            <?php if(auth()->user()->can('f21_form')): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'mpcs' && $request->segment(2) == 'F21Form' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\MPCS\Http\Controllers\F21FormController@index'), false); ?>"><?php echo app('translator')->get('mpcs::lang.F21C_form'); ?></a>
            <?php endif; ?>
           
            <?php if(auth()->user()->can('f22_stock_taking_form')): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'mpcs' && $request->segment(2) == 'F22_stock_taking' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\MPCS\Http\Controllers\F22FormController@F22StockTaking'), false); ?>"><?php echo app('translator')->get('mpcs::lang.F22StockTaking_form'); ?></a>
            <?php endif; ?>
            <a class="collapse-item <?php echo e($request->segment(1) == 'mpcs' && $request->segment(2) == 'forms-setting' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\MPCS\Http\Controllers\FormsSettingController@index'), false); ?>"><?php echo app('translator')->get('mpcs::lang.mpcs_forms_setting'); ?></a>
        </div>
    </div>
</li>

<?php /**PATH /home/vimi31/public_html/Modules/MPCS/Providers/../Resources/views/layouts_v2/partials/sidebar.blade.php ENDPATH**/ ?>