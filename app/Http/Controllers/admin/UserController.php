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
    public function index(Request $request)
    {
        $where = [];
        if (\request('id')){
            $where[] = ['id','=',\request('id')];
        }
        if (\request('firstname')){
            $where[] = ['fname','Like','%'.\request('firstname').'%'];
        }
        if (\request('lastname')){
            $where[] = ['lname','Like','%'.\request('lastname').'%'];
        }
        if (\request('email')){
            $where[] = ['email','=',\request('email')];
        }
        if (\request('role')){
            $where[] = ['role_id','=',\request('role')];
        }

        if (count($where) > 0)
            $users = User::where($where)->orderBy('id', 'desc')->paginate(10)->withQueryString();
        else
            $users = User::orderBy('id', 'desc')->paginate(10)->withQueryString();
        return view(
            'admin.users',
            [
                'users'=>$users,
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
        return view(
            'admin.createuser',
            [
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
        return view(
            'admin/updateUser',
            [
                'user'=>$user,
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
