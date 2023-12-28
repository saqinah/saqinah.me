<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DepartmentModel;
use App\Models\EmployeeModel;
use DB;
use Illuminate\Contracts\Support\ValidatedData;

class AssesmentTeckguanController extends Controller
{
    public function DepartmentList (request $request){

        $departments = DepartmentModel::get();
        return view('assessment_teckguan.list_department', compact('departments'));
    }

    public function EmployeeList (request $request){

        $departments = DepartmentModel::get();
        $employees = EmployeeModel::get();
        return view('assessment_teckguan.list', compact('departments', 'employees'));
    }

    // public function destroyDepartment(DepartmentModel $department)
    // {
    //     $department->delete();
    //     return redirect()->route('DepartmentForm')->with('success', 'Department deleted successfully.');
    // }

    public function EmployeeForm (request $request){

        $departments = DepartmentModel::get();
        $positions = [
            'Project Manager',
            'Project Executive',
            'Finance Executive',
        ];

        return view('assessment_teckguan.form_employee', compact('departments','positions'));
    }

    public function StoreEmployee(Request $request)
    {
        // dd($request->all());

        DB::beginTransaction();

        try {
            $validatedData = $request->validate([
                'employee_name' => 'required|string',
                'employee_email' => 'required|string',
                'employee_position' => 'required|string',
                'department_id' => 'required|string',
            ]);

            $employee = new EmployeeModel();
            $employee->employee_name = $request->employee_name;
            $employee->employee_email = $request->employee_email;
            $employee->employee_position = $request->employee_position;
            $employee->department_id = $request->department_id;

            $employee->save();

            DB::commit();
            return redirect()->route('EmployeeList')->with('success', 'Berjaya Disimpan!');
            
        } catch (\Throwable $e) {
            DB::rollback();
            return redirect()->route('EmployeeList')->with('error', $e->getMessage());
        }
    }

    public function EditEmployee ($id){
        
        $employee = EmployeeModel::find($id);
        $departments = DepartmentModel::get();
        $positions = [
            'Project Manager',
            'Project Executive',
            'Finance Executive',
        ];

        if (!$employee) {
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => 'Employee not found'], 404);
        }
        return view('assessment_teckguan.edit_form', compact('employee','departments','positions'));
    }

    public function updateEmployee (Request $request, $id){

        DB::beginTransaction();

        try {
            $validatedData = $request->validate([
                'employee_name' => 'required|string',
                'employee_email' => 'required|string',
                'employee_position' => 'required|string',
                'department_id' => 'required|integer|exists:department,id',
            ]);

            $employee = EmployeeModel::find($id);

            if (!$employee) {
                return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => 'Employee not found'], 404);
            }

            $employee->employee_name = $validatedData['employee_name'];
            $employee->employee_email = $validatedData['employee_email'];
            $employee->employee_position = $validatedData['employee_position'];
            $employee->department_id = $validatedData['department_id'];

            $employee->save();

        } catch (\Throwable $e) {
            DB::rollback();
            return redirect()->route('EmployeeList')->with('error', $e->getMessage());
        }

        DB::commit();
        return redirect()->route('EmployeeList')->with('success', 'Berjaya Dikemaskini!');
        
    }

    public function DeleteEmployee ($id){
        if (!$id) {
            return redirect()->back()->withFailed('Can\'t find.');
        }
    
        $employee = EmployeeModel::find($id);
    
        if (!$employee) {
            return redirect()->back()->withFailed('Employee not found.');
        }
    
        $employee->delete();
        return redirect()->back()->withSuccess('Employee deleted successfully.');
    }
}
