<?php

namespace App\Models\Related;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task_Comment extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'task_comment';
    protected $fillable = array(
        'task_id',
        'comment_id',
    );
    public $timestamps = false;
}
