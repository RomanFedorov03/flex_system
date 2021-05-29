<?php

namespace App\Models\Related;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment_User extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'comment_user';
    protected $fillable = array(
        'comment_id',
        'user_id'
    );
    public $timestamps = false;
}
