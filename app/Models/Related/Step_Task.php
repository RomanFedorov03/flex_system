<?php

namespace App\Models\Related;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Step_Task extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'step_task';
    protected $fillable = array(
        'step_id',
        'task_id'
    );
    public $timestamps = false;
}
