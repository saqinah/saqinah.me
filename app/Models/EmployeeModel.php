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
        'employee_department',
        'department_id'
    ];

    public function employee_dept(){
        return $this->hasOne('App\Models\DepartmentModel', 'id');
    }
}
