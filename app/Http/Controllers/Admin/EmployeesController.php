<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function employeesList()
    {
        
        return view('admin.pages.employees-list');
    }
}