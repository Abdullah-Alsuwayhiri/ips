<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ipslist extends Model
{

    use HasFactory;

  
    public function envs(){
        return $this->belongsTo('App\Models\Environment');
    }

    public function project_server(){
        return $this->hasMany('App\Models\Project_server');
        
    }

    public function pams(){
        return $this->hasOne('App\Models\Pam');
    }

    public function guradiums(){
        return $this->hasOne('App\Models\Guardium');
    }

    public function sysmons(){
        return $this->hasOne('App\Models\Sysmon');
    }
    public function qradars(){
        return $this->hasOne('App\Models\Qradar');
    }
}
