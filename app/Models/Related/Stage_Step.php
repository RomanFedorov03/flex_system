<?php

namespace App\Models\Related;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage_Step extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'stage_step';
    protected $fillable = array(
        'stage_id',
        'step_id'
    );
    public $timestamps = false;
}
