<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'tasks';
    protected $fillable = array(
        'stage_id',
        'name',
        'date_start',
        'date_end',
        'priority',
        'status',
        'time',
        'task',
        'number',
        'duration',
        'progress',
        'start_date',
        'parent',
        'created_at',
        'updated_at',
    );

    public function participants()
    {
        return $this->belongsToMany('App\Models\Staff', 'task_participant', 'task_id', 'staff_id');
    }
    public function files()
    {
        return $this->belongsToMany('App\Models\File', 'task_file', 'task_id', 'file_id');
    }
    public function checklists()
    {
        return $this->belongsToMany('App\Models\Checklist', 'task_checklist', 'task_id', 'checklist_id');
    }
    public function actions()
    {
        return $this->belongsToMany('App\Models\Action', 'task_action', 'task_id', 'action_id');
    }
    public function comments()
    {
        return $this->belongsToMany('App\Models\Comment', 'task_comment', 'task_id', 'comment_id');
    }
}
