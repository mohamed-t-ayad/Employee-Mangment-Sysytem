<?php

namespace App\Http\Controllers\Api;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\ForignEmployeeResource;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $employees = Employee::all();
        if($request->search) {
            $employees = Employee::where('first_name',"like", "%{$request->search}%")
            ->orWhere('last_name',"like", "%{$request->search}%")->get();
        } elseif ($request->department_id) {
            $employees = Employee::where('department_id', $request->department_id)->get();
        }
        return EmployeeResource::collection($employees);
    }

    public function store(EmployeeStoreRequest $request)
    {
        $employee = Employee::create($request->validated());
        return response()->json($employee);
    }

    public function show(Employee $employee)
    {
        return new ForignEmployeeResource($employee);
    }

    public function update(EmployeeStoreRequest $request, Employee $employee)
    {
        $employee->update($request->validated());
        return response()->json('Employee updated successully');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json('Employee Deleted');
    }
}
