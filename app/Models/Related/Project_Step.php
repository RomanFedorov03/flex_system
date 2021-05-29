<?php

namespace App\Models\Related;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project_Step extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'project_step';
    protected $fillable = array(
        'project_id',
        'step_id'
    );
    public $timestamps = false;
}
