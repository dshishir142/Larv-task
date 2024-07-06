<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;

class Employee extends Model
{
    use HasFactory;
    protected $guarded = [];

    function role(){
        return $this->belongsToMany(Role::class,'third');
    }
}
