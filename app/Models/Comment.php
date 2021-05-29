<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'comments';
    protected $fillable = array(
        'text',
        'type',
        'created_at',
        'updated_at',
    );
    public function commentators()
    {
        return $this->belongsToMany('App\Models\User', 'comment_user', 'comment_id', 'user_id');
    }
}
