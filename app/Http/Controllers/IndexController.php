<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Employee;
use App\Models\Group;
use App\Models\Member;
use App\Models\Student;
use PhpParser\Node\Stmt\Return_;

class IndexController extends Controller
{
    function index(){
        $data = Student::with('getContact')->find(1); 
        return $data->getContact->phone . $data->name;
    }

    function testAdd(){
        $data = Student::create([
            'name' => 'Dhan Bahadur'
        ]);

        $data -> getContact()->create([
            'phone' => '9876543210'
        ]);

        $data->save();
    }

    function testOneToMany(){
        // return Member::with('getGroup')->get();
        return Group::with('getMembers')->get();
    }


    function manyToMany(){
        return Employee::with('role')->find(2);
    }

    function addRoleToUser(){
        $employee = Employee::find(3);
        $employee->role()->attach(2);
    }

    function removeRoleToUser(){
        $employee = Employee::find(1);
        $employee->role()->detach(5);
    }
}
