<?php

namespace App\Models\Related;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Client extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'user_client';
    protected $fillable = array(
        'user_id',
        'client_id'
    );
    public $timestamps = false;
}
