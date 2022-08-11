<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Morilog\Jalali\Jalalian;

class AdminController extends Controller
{
    public function index(){
        return view(
            'admin.index',
            [
                'sidebar'=>'dashboard'
            ]
        );
    }
    public function users(){
        $users = User::all();
        foreach ($users as $key=>$user){
            $role =Role::findOrFail($user->role);
            $user['RoleName'] = $role->name;
            $user['jalaliCreatedAt'] = Jalalian::forge($user->created_at)->format('%B %d، %Y');
            $users[$key] = $user;
        }
        return view(
            'admin.users',
            [
                'users'=>$users,
                'sidebar'=>'users'
            ]
        );
    }
}
