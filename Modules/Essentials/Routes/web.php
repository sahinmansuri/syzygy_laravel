<?php

// use App\Http\Controllers\Modules;
// use Illuminate\Support\Facades\Route;

Route::middleware('web', 'authh', 'auth', 'SetSessionData', 'language', 'timezone','tenant.context')->group(function () {
    Route::prefix('essentials')->group(function () {
        Route::get('/dashboard', [Modules\Essentials\Http\Controllers\DashboardController::class, 'essentialsDashboard']);
        Route::get('/install', [Modules\Essentials\Http\Controllers\InstallController::class, 'index']);
        Route::get('/install/update', [Modules\Essentials\Http\Controllers\InstallController::class, 'update']);
        Route::get('/install/uninstall', [Modules\Essentials\Http\Controllers\InstallController::class, 'uninstall']);

        Route::get('/', [Modules\Essentials\Http\Controllers\EssentialsController::class, 'index']);

        //document controller
        Route::resource('document', 'Modules\Essentials\Http\Controllers\DocumentController')->only(['index', 'store', 'destroy', 'show']);
        Route::get('document/download/{id}', [Modules\Essentials\Http\Controllers\DocumentController::class, 'download']);

        //document share controller
        Route::resource('document-share', 'Modules\Essentials\Http\Controllers\DocumentShareController')->only(['edit', 'update']);

        //todo controller
        Route::resource('todo', 'ToDoController');

        Route::post('todo/add-comment', [Modules\Essentials\Http\Controllers\ToDoController::class, 'addComment']);
        Route::get('todo/delete-comment/{id}', [Modules\Essentials\Http\Controllers\ToDoController::class, 'deleteComment']);
        Route::get('todo/delete-document/{id}', [Modules\Essentials\Http\Controllers\ToDoController::class, 'deleteDocument']);
        Route::post('todo/upload-document', [Modules\Essentials\Http\Controllers\ToDoController::class, 'uploadDocument']);
        Route::get('view-todo-{id}-share-docs', [Modules\Essentials\Http\Controllers\ToDoController::class, 'viewSharedDocs']);

        //reminder controller
        Route::resource('reminder', 'Modules\Essentials\Http\Controllers\ReminderController')->only(['index', 'store', 'edit', 'update', 'destroy', 'show']);

        //message controller
        Route::get('get-new-messages', [Modules\Essentials\Http\Controllers\EssentialsMessageController::class, 'getNewMessages']);
        Route::resource('messages', 'Modules\Essentials\Http\Controllers\EssentialsMessageController')->only(['index', 'store', 'destroy']);

        //Allowance and deduction controller
        Route::resource('allowance-deduction', 'Modules\Essentials\Http\Controllers\EssentialsAllowanceAndDeductionController');

        Route::resource('knowledge-base', 'Modules\Essentials\Http\Controllers\KnowledgeBaseController');

        Route::get('user-sales-targets', [Modules\Essentials\Http\Controllers\DashboardController::class, 'getUserSalesTargets']);
    });

    Route::prefix('hrm')->group(function () {
        Route::get('/dashboard', [Modules\Essentials\Http\Controllers\DashboardController::class, 'hrmDashboard'])->name('hrmDashboard');
        Route::resource('/leave-type', 'Modules\Essentials\Http\Controllers\EssentialsLeaveTypeController');
        Route::resource('/leave', 'Modules\Essentials\Http\Controllers\EssentialsLeaveController');
        Route::post('/change-status', [Modules\Essentials\Http\Controllers\EssentialsLeaveController::class, 'changeStatus']);
        Route::get('/leave/activity/{id}', [Modules\Essentials\Http\Controllers\EssentialsLeaveController::class, 'activity']);
        Route::get('/user-leave-summary', [Modules\Essentials\Http\Controllers\EssentialsLeaveController::class, 'getUserLeaveSummary']);

        Route::get('/settings', [Modules\Essentials\Http\Controllers\EssentialsSettingsController::class, 'edit']);
        Route::get('/essential-settings', [Modules\Essentials\Http\Controllers\EssentialsSettingsController::class, 'editEssential']);
        
        Route::post('/settings', [Modules\Essentials\Http\Controllers\EssentialsSettingsController::class, 'update']);

        Route::post('/import-attendance', [Modules\Essentials\Http\Controllers\AttendanceController::class, 'importAttendance']);
        Route::resource('/attendance', 'Modules\Essentials\Http\Controllers\AttendanceController');
        Route::post('/clock-in-clock-out', [Modules\Essentials\Http\Controllers\AttendanceController::class, 'clockInClockOut']);

        Route::post('/validate-clock-in-clock-out', [Modules\Essentials\Http\Controllers\AttendanceController::class, 'validateClockInClockOut']);

        Route::get('/get-attendance-by-shift', [Modules\Essentials\Http\Controllers\AttendanceController::class, 'getAttendanceByShift']);
        Route::get('/get-attendance-by-date', [Modules\Essentials\Http\Controllers\AttendanceController::class, 'getAttendanceByDate']);
        Route::get('/get-attendance-row/{user_id}', [Modules\Essentials\Http\Controllers\AttendanceController::class, 'getAttendanceRow']);

        Route::get(
            '/user-attendance-summary',
            [Modules\Essentials\Http\Controllers\AttendanceController::class, 'getUserAttendanceSummary']
        );

        Route::get('/advances', [Modules\Essentials\Http\Controllers\AdvancesController::class, 'index']);
        Route::post('/advances/save-advance-payments', [Modules\Essentials\Http\Controllers\AdvancesController::class, 'saveAdvancePayments']);
        Route::post('/advances/save-advance', [Modules\Essentials\Http\Controllers\AdvancesController::class, 'saveAdvance']);
        Route::get('/location-employees', [Modules\Essentials\Http\Controllers\PayrollController::class, 'getEmployeesBasedOnLocation']);
        Route::get('/my-payrolls', [Modules\Essentials\Http\Controllers\PayrollController::class, 'getMyPayrolls']);
        Route::get('/get-allowance-deduction-row', [Modules\Essentials\Http\Controllers\PayrollController::class, 'getAllowanceAndDeductionRow']);
        Route::get('/payroll-group-datatable', [Modules\Essentials\Http\Controllers\PayrollController::class, 'payrollGroupDatatable']);
        Route::get('/view/{id}/payroll-group', [Modules\Essentials\Http\Controllers\PayrollController::class, 'viewPayrollGroup']);
        Route::get('/edit/{id}/payroll-group', [Modules\Essentials\Http\Controllers\PayrollController::class, 'getEditPayrollGroup']);
        Route::post('/update-payroll-group', [Modules\Essentials\Http\Controllers\PayrollController::class, 'getUpdatePayrollGroup']);
        Route::get('/payroll-group/{id}/add-payment', [Modules\Essentials\Http\Controllers\PayrollController::class, 'addPayment']);
        Route::post('/post-payment-payroll-group', [Modules\Essentials\Http\Controllers\PayrollController::class, 'postAddPayment']);
        Route::resource('/payroll', 'Modules\Essentials\Http\Controllers\PayrollController');
        Route::resource('/holiday', 'EssentialsHolidayController');
        
		
		
        Route::delete('delete_salary_details/{id}', [Modules\Essentials\Http\Controllers\EssentialsEmployeesController::class, 'destroy_details']);
        Route::get('salary_details/{id}', [Modules\Essentials\Http\Controllers\EssentialsEmployeesController::class, 'salary_details']);
        Route::post('salary_details/{id}', [Modules\Essentials\Http\Controllers\EssentialsEmployeesController::class, 'post_salary_details']);
        
        Route::get('ledger/{id}', [Modules\Essentials\Http\Controllers\EssentialsEmployeesController::class, 'showLedger']);
        Route::get('employee-ledger/{id}', [Modules\Essentials\Http\Controllers\EssentialsEmployeesController::class, 'showEmployeeLedger']);
        Route::get('add-earning/{id}', [Modules\Essentials\Http\Controllers\EssentialsEmployeesController::class, 'addEarning']);
        Route::post('store-earning', [Modules\Essentials\Http\Controllers\EssentialsEmployeesController::class, 'storeEarning']);
        Route::get('fetch-employee-ledger', [Modules\Essentials\Http\Controllers\EssentialsEmployeesController::class, 'fetchEmployeeLedger']);
        Route::get('view-note/{id}', [Modules\Essentials\Http\Controllers\EssentialsEmployeesController::class, 'viewNote']);
        
        
        Route::get('summarised-ledger', [Modules\Essentials\Http\Controllers\EssentialsEmployeesController::class, 'fetchLedgerSummarised']);
        Route::get('detailed-ledger', [Modules\Essentials\Http\Controllers\EssentialsEmployeesController::class, 'fetchLedger']);
        
        Route::post('designation-employees', [Modules\Essentials\Http\Controllers\EssentialsEmployeesController::class, 'getemployeesbyDesignation']);
        
        Route::get('list_salary_details/{id}', [Modules\Essentials\Http\Controllers\EssentialsEmployeesController::class, 'list_salary_history']);
        Route::resource('/employees', 'EssentialsEmployeesController');
        Route::resource('/workshifts', 'WorkShiftController');

        Route::get('/shift/assign-users/{shift_id}', [Modules\Essentials\Http\Controllers\ShiftController::class, 'getAssignUsers']);
        Route::post('/shift/assign-users', [Modules\Essentials\Http\Controllers\ShiftController::class, 'postAssignUsers']);
        Route::resource('/shift', 'Modules\Essentials\Http\Controllers\ShiftController');
        Route::get('/sales-target', [Modules\Essentials\Http\Controllers\SalesTargetController::class, 'index']);
        Route::get('/set-sales-target/{id}', [Modules\Essentials\Http\Controllers\SalesTargetController::class, 'setSalesTarget']);
        Route::post('/save-sales-target', [Modules\Essentials\Http\Controllers\SalesTargetController::class, 'saveSalesTarget']);
        Route::post('settings/store-probation-period', [Modules\Essentials\Http\Controllers\EssentialsSettingsController::class, 'store_probation_period'])
            ->name('essentials.store_probation_period');
            
            Route::get('settings/get-probation-data', [Modules\Essentials\Http\Controllers\EssentialsSettingsController::class, 'get_period_probation'])
            ->name('probation.get_data');

        Route::get('settings/edit-probation-data/{id}', [Modules\Essentials\Http\Controllers\EssentialsSettingsController::class, 'edit_probation'])
            ->name('probation.edit_data');

        Route::get('settings/edit-probation-data/{id}', [Modules\Essentials\Http\Controllers\EssentialsSettingsController::class, 'delete_probation'])
            ->name('probation.destroy_data');
            
             Route::post('settings/update-probation-data', [Modules\Essentials\Http\Controllers\EssentialsSettingsController::class, 'update_probation_status'])
            ->name('probation.update_status');

             Route::resource('/probation', 'Modules\Essentials\Http\Controllers\EssentialsProbationController');

        Route::post('/get-designations', [Modules\Essentials\Http\Controllers\EssentialsSettingsController::class, 'get_desig_by_department'])->name('hrm.get.designations');
        Route::post('/get-probation-duration', [Modules\Essentials\Http\Controllers\EssentialsProbationController::class, 'get_probation_duration'])->name('hrm.get.probation_duration');


//             //routes for departments
//
        Route::resource('/department','\Modules\Essentials\Http\Controllers\EssentialsDepartmentController');
        Route::resource('/designation','\Modules\Essentials\Http\Controllers\EssentialsDesignationController');

//        Route::get('/hrm_department/data',[\Modules\Essentials\Http\Controllers\EssentialsDepartmentController::class,'getDepartmentData'])->name('departments.get');
//        Route::get('/hrm_department/update', [\Modules\Essentials\Http\Controllers\EssentialsDepartmentController::class,'update'])->name('department.update');
//         Route::get('/shift',[\Modules\Essentials\Http\Controllers\ShiftController::class, 'index']);
            
    });
});
