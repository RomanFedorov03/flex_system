<?php

namespace App\Models\Related;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task_Checklist extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'task_checklist';
    protected $fillable = array(
        'task_id',
        'action_id'
    );
    public $timestamps = false;
}
