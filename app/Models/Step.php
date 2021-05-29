<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'steps';
    protected $fillable = array(
        'name',
        'date_start',
        'date_end',
        'comment',
    );
    public $timestamps = false;


    public function tasks()
    {
        return $this->belongsToMany('App\Models\Task', 'step_task', 'step_id', 'task_id');
    }
}
