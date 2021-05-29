<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkbox extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'checkboxes';
    protected $fillable = array(
        'name',
        'status',
        'created_at',
        'updated_at',
    );

}
