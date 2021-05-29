<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'checklists';
    protected $fillable = array(
        'name',
        'created_at',
        'updated_at',
    );
    public function checkboxes()
    {
        return $this->belongsToMany('App\Models\Checkbox', 'checklist_checkbox', 'checklist_id', 'checkbox_id');
    }
}
