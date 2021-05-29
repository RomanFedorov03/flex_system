<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'email',
        'phone',
        'photo',
        'birth_date',
        'grade',
        'rate',
        'contract',
        'contract_file',
        'passport',
        'password',
        'webwork_id',
        'api_key',
        'created_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function staff()
    {
        return $this->belongsToMany('App\Models\Staff', 'user_staff', 'user_id', 'staff_id');
    }
    public function professions()
    {
        return $this->hasMany('App\Models\Profession', 'user_id', );
    }
    public function clients()
    {
        return $this->belongsToMany('App\Models\Client', 'user_client', 'user_id', 'client_id');
    }
    public function projects()
    {
        return $this->belongsToMany('App\Models\Project', 'user_project', 'user_id', 'project_id');
    }
}
