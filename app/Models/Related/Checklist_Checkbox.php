<?php

namespace App\Models\Related;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checklist_Checkbox extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'checklist_checkbox';
    protected $fillable = array(
        'checklist_id',
        'checkbox_id'
    );
    public $timestamps = false;
}
