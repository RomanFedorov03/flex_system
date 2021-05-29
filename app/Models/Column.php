<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Column extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'columns';
    protected $fillable = array(
        'name',
        'number',
    );

    public $timestamps = false;

    public function tasks()
    {
        return $this->belongsToMany('App\Models\Task', 'column_task', 'column_id', 'task_id');
    }
}
