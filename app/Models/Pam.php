<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pam extends Model
{
    use HasFactory;

    protected $fillable = ['ipslist_id'];

    public function ipslist(){
        return $this->belongsTo('App\Models\Ipslist');
    }
}
