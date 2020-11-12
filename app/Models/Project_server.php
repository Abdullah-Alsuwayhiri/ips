<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project_server extends Model
{
    use HasFactory;

    public function project(){
        return $this->belongsTo('App\Models\Project');
    }
    public function ipslist(){
        return $this->belongsTo('App\Models\Ipslist');
    }
}
