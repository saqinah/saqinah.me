<?php

use App\Http\Controllers\AssesmentTeckguanController;

Route::controller(AssesmentTeckguanController::class)->group(function () {
  Route::prefix('assesment-teckguan')->group(function () {
    Route::get('DepartmentList', 'DepartmentList')->name('DepartmentList');
    Route::get('EmployeeList', 'EmployeeList')->name('EmployeeList');

      Route::get('EmployeeForm', 'EmployeeForm')->name('EmployeeForm');
      Route::post('StoreEmployee', 'StoreEmployee')->name('StoreEmployee');

      Route::get('EditEmployee/{id}', 'EditEmployee')->name('EditEmployee');
      Route::post('UpdateEmployee/{id}', 'updateEmployee')->name('UpdateEmployee');

      Route::post('DeleteEmployee/{id}', 'DeleteEmployee')->name('DeleteEmployee');

    });
  });