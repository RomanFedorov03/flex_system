<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'actions';
    protected $fillable = array(
        'user_id',
        'type',
        'text',
        'created_at',
        'updated_at',
    );
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
