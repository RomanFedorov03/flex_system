<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'stages';
    protected $fillable = array(
        'name'
    );
    public $timestamps = false;

    public function steps()
    {
        return $this->belongsToMany('App\Models\Step', 'stage_step', 'stage_id', 'step_id');
    }
    public function tasks()
    {
        return $this->belongsToMany('App\Models\Task', 'stage_task', 'stage_id', 'task_id');
    }
}
