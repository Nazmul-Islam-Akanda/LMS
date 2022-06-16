<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\LeavesController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\EmployeesController;
use App\Http\Controllers\Admin\DashboardsController;
use App\Http\Controllers\Admin\LeavesTypeController;
use App\Http\Controllers\Admin\DepartmentsController;
use App\Http\Controllers\Admin\WebsiteInfoController;
use App\Http\Controllers\Admin\DesignationsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return redirect()->route('login');
});




Route::get('/login',[LoginController::class,'login'])->name('login');
Route::post('/do/login',[LoginController::class,'doLogin'])->name('doLogin');





Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    
    Route::get('/logout',[LoginController::class,'doLogout'])->name('doLogout');
    
    //Dashboard
    Route::get('/dashboards',[DashboardsController::class,'dashboard'])->name('admin.dashboard');

    //profile
    Route::get('/profile/edit/{user_id}',[ProfileController::class,'edit'])->name('profile');
    Route::put('/profile/update/{user_id}',[ProfileController::class,'update'])->name('profile.update');
    
    //Employee Departments
    Route::get('/departments/list',[DepartmentsController::class,'departmentsList'])->name('admin.departments.list');
    Route::get('/departments/add',[DepartmentsController::class,'add'])->name('admin.departments.add');
    Route::post('/departments/store',[DepartmentsController::class,'store'])->name('admin.departments.store');
    Route::get('/departments/edit/{department_id}',[DepartmentsController::class,'edit'])->name('admin.departments.edit');
    Route::put('/departments/update/{department_id}',[DepartmentsController::class,'update'])->name('admin.departments.update');
    Route::get('/departments/delete/{department_id}',[DepartmentsController::class,'delete'])->name('admin.departments.delete');
    
    //Employee Designations
    Route::get('/designations/list',[DesignationsController::class,'designationsList'])->name('admin.designations.list');
    Route::get('/designations/add',[DesignationsController::class,'add'])->name('admin.designations.add');
    Route::post('/designations/store',[DesignationsController::class,'store'])->name('admin.designations.store');
    Route::get('/designations/edit/{designation_id}',[DesignationsController::class,'edit'])->name('admin.designations.edit');
    Route::put('/designations/update/{designation_id}',[DesignationsController::class,'update'])->name('admin.designations.update');
    Route::get('/designations/delete/{designation_id}',[DesignationsController::class,'delete'])->name('admin.designations.delete');
    
    //Employees
    Route::get('/employees/list',[EmployeesController::class,'employeesList'])->name('admin.employees.list');
    Route::get('/employees/add',[EmployeesController::class,'add'])->name('admin.employees.add');
    Route::post('/employees/store',[EmployeesController::class,'store'])->name('admin.employees.store');
    Route::get('/employees/edit/{employee_id}',[EmployeesController::class,'edit'])->name('admin.employees.edit');
    Route::put('/employees/update/{employee_id}',[EmployeesController::class,'update'])->name('admin.employees.update');
    Route::get('/employees/delete/{employee_id}',[EmployeesController::class,'delete'])->name('admin.employees.delete');
    
    
    //Leaves type list
    Route::get('/leaves-type/list',[LeavesTypeController::class,'leavesTypeList'])->name('admin.leaves-type.list');
    Route::get('/leaves-type/add',[LeavesTypeController::class,'add'])->name('admin.leaves-type.add');
    Route::post('/leaves-type/store',[LeavesTypeController::class,'store'])->name('admin.leaves-type.store');
    Route::get('/leaves-type/edit/{leave_type_id}',[LeavesTypeController::class,'edit'])->name('admin.leaves-type.edit');
    Route::put('/leaves-type/update/{leave_type_id}',[LeavesTypeController::class,'update'])->name('admin.leaves-type.update');
    Route::get('/leaves-type/delete/{leave_type_id}',[LeavesTypeController::class,'delete'])->name('admin.leaves-type.delete');
    
    
    //Leaves  list
    Route::get('/leaves/list',[LeavesController::class,'leavesList'])->name('admin.leaves.list');
    Route::get('/leaves/apply',[LeavesController::class,'apply'])->name('admin.leaves.apply');
    Route::post('/leaves/store',[LeavesController::class,'store'])->name('admin.leaves.store');
    Route::get('/leaves/approve',[LeavesController::class,'leavesApprove'])->name('admin.leaves.approve');
    Route::get('/leaves/approve/give/{leave_id}',[LeavesController::class,'leavesApproveGive'])->name('admin.leaves.aprrove.give');
    Route::put('/leaves/approve/store/{leave_id}',[LeavesController::class,'leavesApproveStore'])->name('admin.leaves.approve.store');
    Route::get('/leaves/report',[LeavesController::class,'leavesReport'])->name('admin.leaves.report');
    Route::get('/leaves/available/{leave_id}',[LeavesController::class,'employeeleavesAvailabe'])->name('admin.leaves.available');
    Route::get('/leaves/details/{leave_id}',[LeavesController::class,'leavesDetails'])->name('admin.leaves.details');
    Route::get('/leaves/edit/{leave_id}',[LeavesController::class,'leavesEdit'])->name('admin.leaves.edit');
    Route::put('/leaves/update/{leave_id}',[LeavesController::class,'leavesUpdate'])->name('admin.leaves.update');
    Route::get('/leaves/delete/{leave_id}',[LeavesController::class,'leavesDelete'])->name('admin.leaves.delete');
    
    
    //Website Information
    Route::get('/website/information',[WebsiteInfoController::class,'Info'])->name('admin.website-information');
    Route::get('/website/information/add',[WebsiteInfoController::class,'add'])->name('admin.website-information.add');
    Route::post('/website/information/store',[WebsiteInfoController::class,'store'])->name('admin.website-information.store');
    Route::get('/website/information/edit/{web_info_id}',[WebsiteInfoController::class,'edit'])->name('admin.website-information.edit');
    Route::put('/website/information/update/{web_info_id}',[WebsiteInfoController::class,'update'])->name('admin.website-information.update');
    Route::get('/website/information/delete/{web_info_id}',[WebsiteInfoController::class,'delete'])->name('admin.website-information.delete');
    


});

