<?php

namespace App\Models\Related;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project_Staff extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'project_staff';
    protected $fillable = array(
        'project_id',
        'staff_id'
    );
    public $timestamps = false;
}
