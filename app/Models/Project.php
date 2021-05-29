<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'projects';
    protected $fillable = array(
        'name',
        'client',
        'responsible',
        'startDate',
        'endDate',
        'address',
        'figma',
        'projectUrl',
        'contact',
        'comment',
        'status',
        'created_at',
        'updated_at'
    );

    public function responsibless()
    {
        return $this->belongsToMany('App\Models\Staff', 'responsible_project', 'project_id', 'staff_id');
    }
    public function clients()
    {
        return $this->belongsToMany('App\Models\Client', 'client_project', 'project_id', 'client_id');
    }
    public function staff()
    {
        return $this->belongsToMany('App\Models\Staff', 'project_staff', 'project_id', 'staff_id');
    }
    public function stages()
    {
        return $this->belongsToMany('App\Models\Stage', 'project_stage', 'project_id', 'stage_id');
    }
    public function steps()
    {
        return $this->belongsToMany('App\Models\Step', 'project_step', 'project_id', 'step_id');
    }
    public function tasks()
    {
        return $this->belongsToMany('App\Models\Task', 'project_task', 'project_id', 'task_id');
    }
    public function columns()
    {
        return $this->belongsToMany('App\Models\Column', 'project_column', 'project_id', 'column_id');
    }
}
