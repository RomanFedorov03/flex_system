<?php

namespace App\Models\Related;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Staff extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'user_staff';
    protected $fillable = array(
        'user_id',
        'staff_id'
    );
    public $timestamps = false;
}
