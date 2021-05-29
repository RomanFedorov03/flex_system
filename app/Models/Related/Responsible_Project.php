<?php

namespace App\Models\Related;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsible_Project extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'responsible_project';
    protected $fillable = array(
        'staff_id',
        'project_id'
    );
    public $timestamps = false;
}
