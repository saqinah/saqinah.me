<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentModel extends Model
{
    use HasFactory;

    public $table = "department";

    protected $primaryKey = "id";

    protected $fillable = [
        'dept_name',
        'display_name',
    ];
}
