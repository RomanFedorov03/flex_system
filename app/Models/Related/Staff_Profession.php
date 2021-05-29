<?php

namespace App\Models\Related;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff_Profession extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'staff_profession';
    protected $fillable = array(
        'staff_id',
        'profession_id'
    );
    public $timestamps = false;
}
