<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    public function department()
    {
        return $this->belongsTo('App\Models\Department', 'department_id');
    }
    public function project_server(){
        return $this->hasMany('App\Models\Project_server');
    }

    
}
