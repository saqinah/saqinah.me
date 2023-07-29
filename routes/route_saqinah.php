<?php

use App\Http\Controllers\AssesmentTeckguanController;

Route::controller(AssesmentTeckguanController::class)->group(function () {
  Route::prefix('assesment-teckguan')->group(function () {
      Route::get('EmployeeForm', 'EmployeeForm')->name('EmployeeForm');
      Route::get('DepartmentForm', 'DepartmentForm')->name('DepartmentForm');
      Route::post('StoreDepartment', 'StoreDepartment')->name('StoreDepartment');
      // Route::get('employee', 'SenaraiEmployee')->name('senarai_employee');
      // Route::get('department', 'SenaraiDepartment')->name('senarai_department');
  });
});