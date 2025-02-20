<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Employees = Employee::orderBy('name','asc')->paginate(5);
        return view ('index', compact('Employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validate the incoming request data
         $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|unique:employees,email|email|max:255',
            'joining_date' => 'required|date',
            'salary' => 'required|numeric',
            'is_active' => 'sometimes|boolean',
        ]);

        // Convert 'is_active' field to a boolean value (1 or 0)
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        //mass assignment
       $data = $request->except('_token');

      

    // Create a new Employee record with the processed data
        Employee::create($data);

      

       //Insert single row 
    /*    $employee = new Employee;
       $employee->name = $data['name'];
       $employee->email = $data['email'];
       $employee->joining_date = $data['joining_date'];
       $employee->salary = $data['salary'];
       $data['is_active'] = $request->has('is_active') ? 1 : 0;
       $employee->save(); */
       
       return redirect()
    ->route('employees.index')
    ->with('message', 'Employee has been created successfully!');

      
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employees)
    {
        return view ('show', compact('employees') );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::find($id);
        return view ('edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employees)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|unique:employees,email,'.$employees->id.'|email|max:255',
            'joining_date' => 'required|date',
            'salary' => 'required|numeric',
            'is_active' => 'sometimes|boolean',
        ]);
    
        $data = $request->all();
        $employees->update($data);
    
        // Redirect with success message
        return redirect()->route('employees.edit', $employees->id)->with('success', 'Employee Details Updated Successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    //(Employee $employees) --> (Model $variable)
    public function destroy(Employee $employees)
    {
        $employees->delete();
        return redirect()->route('employees.index')
        ->withSuccess('success', 'Employee Details Deleted Successfully!');
    }
}
