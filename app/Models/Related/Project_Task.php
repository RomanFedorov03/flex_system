<?php

namespace App\Models\Related;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project_Task extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'project_task';
    protected $fillable = array(
        'project_id',
        'task_id'
    );
    public $timestamps = false;
}
