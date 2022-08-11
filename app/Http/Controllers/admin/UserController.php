<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc');
        $users = $users->paginate(10)->withQueryString();
        foreach ($users as $key=>$user){
            $role =Role::findOrFail($user->role);
            $user['RoleName'] = $role->name;
            $user['jalaliCreatedAt'] = Jalalian::forge($user->created_at)->format('%B %d، %Y');
            $users[$key] = $user;
        }
        $roles = Role::all();
        return view(
            'admin.users',
            [
                'users'=>$users,
                'rols'=>$roles,
                'sidebar'=>'users'
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rols = Role::all();
        return view(
            'admin.createuser',
            [
                'rols'=>$rols,
                'sidebar'=>'users'
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'fname' => 'required|max:255',
                'lname' => 'required|max:255',
                'email' => 'required|email',
                'password'=>'required|min:8',
                'role'=>'required'
            ]
        );
        User::create([
            'fname'=>$request->fname,
            'lname'=>$request->lname,
            'email'=>$request->email,
            'password'=>$request->password,
            'role'=>$request->role,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        return redirect('admin/users');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $rols = Role::all();
        return view(
            'admin/updateUser',
            [
                'user'=>$user,
                'rols'=>$rols,
                'sidebar'=>'users'
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate(
            [
                'fname' => 'required|max:255',
                'lname' => 'required|max:255',
                'email' => 'required|email',
                'password'=>'required|min:8',
                'role'=>'required'
            ]
        );
        $user->update(
            [
                'fname'=>$request->fname,
                'lname'=>$request->lname,
                'email'=>$request->email,
                'role'=>$request->role,
            ]
        );
        return redirect('admin/users');
    }

    public function active(User $user)
    {
        if ($user->is_active == true) {
            $user->update(
                [
                    'is_active'=>false
                ]
            );
            return back();
        }

        $user->update(
            [
                'is_active'=>true
            ]
        );
        return back();
    }
}
