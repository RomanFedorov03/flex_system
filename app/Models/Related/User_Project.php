<?php

namespace App\Models\Related;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Project extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'user_project';
    protected $fillable = array(
        'user_id',
        'project_id'
    );
    public $timestamps = false;
}
