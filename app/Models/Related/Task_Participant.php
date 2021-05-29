<?php

namespace App\Models\Related;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task_Participant extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'task_participant';
    protected $fillable = array(
        'task_id',
        'staff_id',
        'rate'
    );
    public $timestamps = false;
}
