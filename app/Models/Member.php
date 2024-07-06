<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Group;

class Member extends Model
{
    use HasFactory;

    protected $guarded = [];

    function getGroup() {
        return $this->hasMany(Group::class, 'id');
    }
}
