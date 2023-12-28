<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeModel extends Model
{
    use HasFactory;

    public $table = "employee";

    protected $primaryKey = "id";

    protected $fillable = [
        'employee_name',
        'employee_email',
        'employee_position',
        'department_id'
    ];

    public function employee_dept()
    {
        return $this->belongsTo('App\Models\DepartmentModel', 'department_id');
    }

    public function getDisplayName()
    {
        return $this->employee_dept->dept_name ?? 'Unknown Department';
    }
}
