<?php

namespace App\Models\Related;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project_Column extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'project_column';
    protected $fillable = array(
        'project_id',
        'column_id'
    );
    public $timestamps = false;
}
