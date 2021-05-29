<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'professions';
    protected $fillable = array(
        'name',
        'photo'
    );
    public $timestamps = false;

    public function staff()
    {
        return $this->belongsToMany('App\Models\Staff', 'staff_profession', 'profession_id', 'staff_id');
    }
}
