<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmployeeController extends Controller
{

    public function index()
    {
        $employees = Employee::all();
        return response()->json($employees);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'department_id' => 'required|exists:departments,id',
        ]);

        $employee = Employee::create($request->all());
        return response()->json($employee);
    }


    public function show(Employee $employee)
    {
        return response()->json($employee);
    }


    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:employees,email,' . $employee->id,
            'department_id' => 'sometimes|required|exists:departments,id',

        ]);

        $employee->update($request->all());
        return response()->json($employee);
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json(['message' => 'Employee deleted successfully']);
    }
}
