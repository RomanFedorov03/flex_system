<?php

namespace App\Models\Related;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client_Project extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'client_project';
    protected $fillable = array(
        'client_id',
        'project_id'
    );
    public $timestamps = false;
}
