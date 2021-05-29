<?php

namespace App\Models\Related;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project_Stage extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'project_stage';
    protected $fillable = array(
        'project_id',
        'stage_id'
    );
    public $timestamps = false;
}
