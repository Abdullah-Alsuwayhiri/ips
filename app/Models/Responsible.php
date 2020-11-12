<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsible extends Model
{
    protected $fillable = ['project_id', 'owner','product_manager','tech_manager'];
    use HasFactory;
}
