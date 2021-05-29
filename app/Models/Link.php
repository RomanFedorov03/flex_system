<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'links';
    protected $fillable = array(
        'type',
        'source',
        'target',
        'created_at',
        'updated_at',
    );
}
