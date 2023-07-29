<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DepartmentModel;
use App\Models\EmployeeModel;
use DB;
use Illuminate\Contracts\Support\ValidatedData;

class AssesmentTeckguanController extends Controller
{
    public function DepartmentForm (request $request){

        $departments = DepartmentModel::get();
        return view('assessment_teckguan.form_department', compact('departments'));
    }

    public function storeDepartment(Request $request)
    {

        DB::beginTransaction();

        try {
            $validatedData = $request->validate([
                'dept_name' => 'required|string',
                'display_name' => 'required|string',
            ]);

            $department = new DepartmentModel;
            $department->dept_name = $request->dept_name;
            $department->display_name = $request->display_name;

            $department->save();

            DB::commit();
            return response()->json([
                'title' => 'Berjaya',
                'status' => 'success',
                'detail' => 'Berjaya Disimpan!',
            ]);
        } catch (\Throwable $e) {
            DB::rollback();
            return response()->json([
                'title' => 'Gagal',
                'status' => 'error',
                'detail' => $e->getMessage()
            ], 404);
        }
    }

    public function EmployeeForm (request $request){
        return view('assessment_teckguan.form_employee');
    }
}
