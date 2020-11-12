<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qradar extends Model
{
    protected $fillable = ['ipslist_id'];

    use HasFactory;
    public function ipslist(){
        return $this->belongsTo('App\Models\Ipslist');
    }
}
