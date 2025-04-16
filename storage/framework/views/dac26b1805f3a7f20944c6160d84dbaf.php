<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item treeview <?php echo e(in_array($request->segment(1), ['patient', 'medication']) ? 'active active-sub' : '', false); ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#patientmodule-menu" aria-expanded="true" aria-controls="patientmodule-menu">
        <i class="fa fa-medkit"></i>
        <span><?php echo app('translator')->get('patient.module_name'); ?></span>
    </a>
    <div id="patientmodule-menu" class="collapse" aria-labelledby="patientmodule-menu" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"><?php echo app('translator')->get('patient.module_name'); ?>:</h6>
            <a class="collapse-item <?php echo e($request->segment(1) == 'patient' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\MyHealth\Http\Controllers\PatientController@index'), false); ?>"><?php echo app('translator')->get('patient.home'); ?></a>
            <a class="collapse-item <?php echo e($request->segment(1) == 'medication' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\MyHealth\Http\Controllers\MedicationController@index'), false); ?>"><?php echo app('translator')->get('patient.medications'); ?></a>
        </div>
    </div>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item <?php echo e(in_array($request->segment(1), ['patient-test-records']) ? 'active active-sub' : '', false); ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#patienttest-menu" aria-expanded="true" aria-controls="patienttest-menu">
        <i class="fa fa-heartbeat"></i>
        <span><?php echo app('translator')->get('patient.test_records.module_name'); ?></span>
    </a>
    <div id="patienttest-menu" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"><?php echo app('translator')->get('patient.test_records.module_name'); ?>:</h6>
            <a class="collapse-item <?php echo e($request->segment(1) == 'patient' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\MyHealth\Http\Controllers\PatientController@index'), false); ?>"><?php echo app('translator')->get('patient.test_records.sugar_testing'); ?></a>
            <a class="collapse-item <?php echo e($request->segment(1) == 'patient' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\MyHealth\Http\Controllers\SugerReadingController@index'), false); ?>"><?php echo app('translator')->get('Sugar Reading'); ?></a>

            <a class="collapse-item <?php echo e($request->segment(1) == 'patient' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\MyHealth\Http\Controllers\PatientController@index'), false); ?>"><?php echo app('translator')->get('patient.test_records.pressure_testing'); ?></a>
        </div>
    </div>
</li><?php /**PATH /home/vimi31/public_html/Modules/MyHealth/Providers/../Resources/views/layouts_v2/partials/sidebar.blade.php ENDPATH**/ ?>