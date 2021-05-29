<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'clients';
    protected $fillable = array(
        'name',
        'surname',
        'patronymic',
        'birthdate',
        'phone',
        'email',
        'country',
        'city',
        'address',
        'company',
        'contractSum',
        'photo',
        'status',
        'comment',
        'password',
        'remember_token',
        'created_at',
        'updated_at'
    );


    public function projects()
    {
        return $this->belongsToMany('App\Models\Project', 'client_project', 'client_id', 'project_id');
    }
}
