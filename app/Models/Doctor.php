<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = "doctors";
    protected $fillable = ['name','phone','address','created_at','update_at'];
    protected $hidden = ['created_at','updated_at'];
}
