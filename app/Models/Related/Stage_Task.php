<?php

namespace App\Models\Related;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage_Task extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'stage_task';
    protected $fillable = array(
        'stage_id',
        'task_id'
    );
    public $timestamps = false;
}
