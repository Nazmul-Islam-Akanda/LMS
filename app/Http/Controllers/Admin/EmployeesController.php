<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Departments;
use App\Models\Designations;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class EmployeesController extends Controller
{
    public function employeesList()
    {

        $key=null;
        if(request()->search){
            $key=request()->search;
            $employees=User::with('department','designation')->where('role','employee')
            ->whereLike(['department.name','designation.name','name','dob','contact','address','email','role'],$key)
            ->get();
            return view('admin.pages.employees-list',compact('employees','key'));
        }

        $employees=User::with('department','designation')->where('role','employee')->get();
        return view('admin.pages.employees-list',compact('employees','key'));
    }

    public function add()
    {
        $departments=Departments::all();
        $designations=Designations::all();
        return view('admin.pages.employees-add',compact('departments','designations'));
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $filename='';
        //Check Image or not
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $filename=date('Ymdhms').'.'.$file->getClientOriginalExtension();
            $file->storeAs('/uploads',$filename);
        }

        //server side validation start
        $request->validate([
            'email'=>'unique:users',
            'contact'=>'min:11|max:11'
        ]);



        User::Create([
            //db feild name || form field name
            'id'=>IdGenerator::generate(['table' => 'users', 'length' => 6, 'prefix' => date('y')]),
            'name'=>$request->name,
            'e_department'=>$request->depatment,
            'e_designation'=>$request->designation,
            'dob'=>$request->dob,
            'contact'=>$request->contact,
            'address'=>$request->address,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'image'=>$filename
        ]);
        return redirect()->route('admin.employees.list')->with('msg','Employee added successfully.');
    }

    public function edit($id){
        $employee=User::find($id);
        $departments=Departments::all();
        $designations=Designations::all();
        return view('admin.pages.employees-edit',compact('employee','departments','designations'));
    }

    public function update(Request $request, $id){
        $employee=User::find($id);

        $filename=$employee->image;
        //Check Image or not
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $filename=date('Ymdhms').'.'.$file->getClientOriginalExtension();
            $file->storeAs('/uploads',$filename);
        }


         //server side validation start
         $request->validate([
            'contact'=>'min:11|max:11'
        ]);



        $employee->update([

            //db feild name || form field name
            'name'=>$request->name,
            'e_department'=>$request->depatment,
            'e_designation'=>$request->designation,
            'dob'=>$request->dob,
            'contact'=>$request->contact,
            'address'=>$request->address,
            'email'=>$request->email,
            'image'=>$filename
        ]);

        return redirect()->route('admin.employees.list')->with('msg','Employee successfully updated.');
    }


    public function delete($id){
        User::find($id)->delete();
        return redirect()->route('admin.employees.list')->with('msg','Employee successfully deleted.');
    }


}
