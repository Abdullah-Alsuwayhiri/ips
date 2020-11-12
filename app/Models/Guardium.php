<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardium extends Model
{
    protected $table = 'guardiums';
    protected $fillable = ['ipslist_id'];

    use HasFactory;
    public function ipslist(){
        return $this->belongsTo('App\Models\Ipslist');
    }
}
