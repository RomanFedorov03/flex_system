<?php

namespace App\Models\Related;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Column_Task extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'column_task';
    protected $fillable = array(
        'column_id',
        'task_id'
    );
    public $timestamps = false;
}
