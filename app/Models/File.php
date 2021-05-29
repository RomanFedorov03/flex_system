<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'files';
    protected $fillable = array(
        'name',
        'serv_name',
        'created_at',
        'updated_at',
    );

//    public function participants()
//    {
//        return $this->belongsToMany('App\Models\Staff', 'task_participant', 'task_id', 'staff_id');
//    }
}
