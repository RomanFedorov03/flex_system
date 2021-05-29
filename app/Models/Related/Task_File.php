<?php

namespace App\Models\Related;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task_File extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'task_file';
    protected $fillable = array(
        'task_id',
        'file_id'
    );
    public $timestamps = false;
}
