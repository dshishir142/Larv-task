<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contact;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];

    function getContact(){
        return $this->hasOne(Contact::class);
    }
}
