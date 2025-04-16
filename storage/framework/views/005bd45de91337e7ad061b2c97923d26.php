<li class="nav-item <?php echo e(in_array($request->segment(1), ['member-module', 'member']) ? 'active active-sub' : '', false); ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#membermodule-menu"
        aria-expanded="true" aria-controls="membermodule-menu">
        <i class="fa fa-child"></i>
        <span><?php echo app('translator')->get('member::lang.member_module'); ?></span>
    </a>
    <div id="membermodule-menu" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Member Module:</h6>
            <a class="collapse-item <?php echo e($request->segment(1) == 'member-module' && $request->segment(2) == 'members' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Member\Http\Controllers\MemberController@index'), false); ?>">List Member</a>
            
            <a class="collapse-item <?php echo e($request->segment(1) == 'member' && $request->segment(2) == 'suggestions' && $request->segment(3) == '' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Member\Http\Controllers\SuggestionController@index', 'en'), false); ?>">List Suggestions</a>
            
            <a class="collapse-item <?php echo e($request->segment(1) == 'member-module' && $request->segment(2) == 'member-settings' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Member\Http\Controllers\MemberSettingController@index'), false); ?>">Member Settings</a>
            
            <a class="collapse-item <?php echo e($request->segment(1) == 'member-module' && $request->segment(2) == 'users-activity' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Member\Http\Controllers\MemberController@memberUserActivity'), false); ?>"><?php echo app('translator')->get('member::lang.member_user_activity'); ?></a>
            
             <a class="collapse-item <?php echo e($request->segment(1) == 'member-module' && $request->segment(2) == 'member-sms-settings ' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Member\Http\Controllers\MemberController@smsSettings'), false); ?>"><?php echo app('translator')->get('member::lang.sms_settings'); ?></a>
            
        </div>
    </div>
</li><?php /**PATH /home/vimi31/public_html/Modules/Member/Providers/../Resources/views/layouts_v2/partials/sidebar.blade.php ENDPATH**/ ?>