<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use File;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::latest()->paginate(10);
        return view('Employees.index')->with('employees' , $employees);
    }

    public function create()
    {
        return view('Employees.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'position' => 'required',
            'image' => 'required',
        ]);

        $image_name = $request->image->getClientOriginalName();
        $image_name = time().$image_name;
        $path = 'images/main/employees'; 
        $request->image->move($path , $image_name);
        
        
        Employee::create([
            'name'=> $request->name,
            'position'=> $request->position,
            'image'=> $path.'/'.$image_name,
        ]);
        return redirect()->route('Employees.index');
    }

    public function edit($id)
    {
        $employee = Employee::find($id)->first();
        return view('Employees.edit',compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required'
        ]);
        $employee = Employee::find($id)->first();
        
        if($request->image != null)
        {
            $image_path = public_path('images/main/employees/'.$employee->image);
            if(File::exists($image_path))
                unlink($image_path);

            $image_name = $request->image->getClientOriginalName();
            $image_name = time().$image_name;
            $path = 'images/main/employees';
            $request->image->move($path , $image_name);
            
            $employee->image = $path.'/'.$image_name;
        }
        
        
        $employee->name = $request->name;
        $employee->position = $request->position;
        
 
        $employee->save();
        
        return redirect()->route('Employees.index');
    }

    public function destroy($id)
    {
        $employee = Employee::find($id)->first();
        
        $image_path = public_path($employee->image);
        if(File::exists($image_path)) 
            unlink($image_path);
        
        $employee->forceDelete();
        return redirect()->route('Employees.index');
    }
}
