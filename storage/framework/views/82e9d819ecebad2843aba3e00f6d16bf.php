<li class="nav-item <?php echo e(in_array($request->segment(1), ['tasks-management']) ? 'active active-sub' : '', false); ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#task-menu"
        aria-expanded="true" aria-controls="task-menu">
        <i class="fa fa-sticky-note"></i>
        <span><?php echo app('translator')->get('tasksmanagement::lang.tasks_management'); ?></span>
    </a>
    <div id="task-menu" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Tasks Management:</h6>
            <?php if($notes_page): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'tasks-management' && $request->segment(2) == 'notes' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\TasksManagement\Http\Controllers\NoteController@index'), false); ?>"><?php echo app('translator')->get('tasksmanagement::lang.notes'); ?></a>
            <?php endif; ?>
            
            <?php if($tasks_page): ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tasks_management.tasks')): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'tasks-management' && $request->segment(2) == 'tasks' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\TasksManagement\Http\Controllers\TaskController@index'), false); ?>"><?php echo app('translator')->get('tasksmanagement::lang.list_tasks'); ?></a>
            <?php endif; ?>
            <?php endif; ?>
            
            <?php if($reminder_page): ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tasks_management.reminder')): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'tasks-management' && $request->segment(2) == 'reminders' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\TasksManagement\Http\Controllers\ReminderController@index'), false); ?>"><?php echo app('translator')->get('tasksmanagement::lang.reminders'); ?></a>
            <?php endif; ?>
            <?php endif; ?>
            <a class="collapse-item <?php echo e($request->segment(1) == 'tasks-management' && $request->segment(2) == 'settings' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\TasksManagement\Http\Controllers\SettingsController@index'), false); ?>"><?php echo app('translator')->get('tasksmanagement::lang.settings'); ?></a>
        </div>
    </div>
</li><?php /**PATH /home/vimi31/public_html/Modules/TasksManagement/Providers/../Resources/views/layouts_v2/partials/sidebar.blade.php ENDPATH**/ ?>