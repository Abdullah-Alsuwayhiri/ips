<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Environment extends Model
{
    use HasFactory;
 
    public function ips(){
        return $this->hasMany('App\Models\Ipslist');

       
    }
}
