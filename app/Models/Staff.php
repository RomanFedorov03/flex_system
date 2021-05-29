<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'users';
    protected $fillable = array(
        'name',
        'surname',
        'patronymic',
        'email',
        'phone',
        'photo',
        'birth_date',
        'type',
        'grade',
        'rate',
        'contract',
        'contract_file',
        'passport',
        'password',
        'profession',
        'webwork_id',
        'access_dashboard',
        'access_project',
        'access_task',
        'access_template',
        'access_staff',
        'access_client',
        'access_report',
        'access_finance',
        'status',
        'created_at'
    );

    public function admin()
    {
        return $this->belongsToMany('App\Models\User', 'user_staff', 'staff_id', 'user_id');
    }
    public function responsibleProjects()
    {
        return $this->belongsToMany('App\Models\Project', 'responsible_project', 'staff_id', 'project_id');
    }
    public function professions()
    {
        return $this->belongsToMany('App\Models\Profession', 'staff_profession', 'staff_id', 'profession_id');
    }
}
