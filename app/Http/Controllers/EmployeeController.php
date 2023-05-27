<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::with('company')->simplePaginate(10);
        return view('employee.read', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        return view('employee.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        try {
            $employee = new Employee();
            $employee->first_name = $request->first_name;
            $employee->last_name = $request->last_name;
            $employee->company_id = $request->company;
            $employee->email = $request->email;
            $employee->phone = $request->phone;
            $employee->save();

            return redirect('/employees')->with('success', 'Employee created');
        } catch (\Exception $e) {
            return redirect('/employees')->with('error', 'Failed to create employee');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::with('company')->findOrFail($id);
        $companies = Company::all();
        return view('employee.edit', compact('employee', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(request $request, string $id)
    {
        try{
            $employee = Employee::findOrFail($id);
            $employee->first_name = $request->first_name;
            $employee->last_name = $request->last_name;
            $employee->company_id = $request->company;
            $employee->email = $request->email;
            $employee->phone = $request->phone;
            $employee->save();
    
            return redirect('/employees')->with('success', 'Employee updated');
        } catch (\Exception $e) {
            return redirect('/employees')->with('error', 'Failed to update employee');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            Employee::where('id', $id)->delete();

            return redirect('/employees')->with('success', 'Employee deleted');
        } catch (\Exception $e) {
            return redirect('/employees')->with('error', 'Failed to delete employee');
        }
    }
}
