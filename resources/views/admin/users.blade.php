@extends('layouts.admin')

@section('main')
    <div class="container-fluid py-4">
        <div class="row my-4">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <h6>کاربران</h6>
                        <a href="/admin/users/create" class="btn btn-primary">اضافه کردن کاربر</a>
                    </div>
                    <div class="p-4 pb-0 d-flex justify-content-between">
                        <form action="" class="">
                            <div class="d-flex">
                                <div class="form-group m-2">
                                    <label for="exampleInputEmail1"> شناسه </label>
                                    <input type="text" name="id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="شناسه" value="@if(\request('id')) {{ \request('id') }} @endif">
                                </div>
                                <div class="form-group m-2">
                                    <label for="exampleInputEmail1"> اسم </label>
                                    <input type="text" name="firstname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="اسم" value="@if(\request('firstname')) {{ \request('firstname') }} @endif">
                                </div>
                                <div class="form-group m-2">
                                    <label for="exampleInputEmail1"> فامیل </label>
                                    <input type="text" name="lastname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="فامیل" value="@if(\request('lastname')) {{ \request('lastname') }} @endif">
                                </div>
                                <div class="form-group m-2">
                                    <label for="exampleInputEmail1"> ایمیل </label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ایمیل" value="@if(\request('email')) {{ \request('email') }} @endif">
                                </div>
                                <div class="form-group m-2">
                                    <label for="exampleInputEmail1">نقش کاربر</label>
                                    <select class="form-select" name="role" aria-label="Default select example">
                                        <option value="">انتخاب کنید</option>
                                        @foreach(\App\Models\Role::all() as $role)
                                            <option @if(\request('role')==$role->id) selected @endif value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-primary">فیلتر</button>
                        </form>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">

                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">نام کاربر</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">نقش کاربر</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">   وضعیت</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">تاریخ ثبت نام</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="../assets/img/avatar.png" class="avatar avatar-sm me-3" alt="user1">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $user->fname.' '.$user->lname }}</h6>
                                                    <p class="text-xs text-secondary mb-0">{{ $user->email }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-xs font-weight-bold mb-0">{{ $user->role->name }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <form action="users/{{ $user->id }}/active" method="post">
                                                @method('put')
                                                @csrf
                                                @if($user->is_active === 1)
                                                    <button class="badge badge-sm bg-gradient-success border-0">فعال</button>
                                                @else
                                                    <button class="badge badge-sm bg-gradient-danger border-0">غیر فعال</button>
                                                @endif
                                            </form>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $user->jalali_date() }}</span>
                                        </td>
                                        <td class="align-middle">
                                            <a href="/admin/users/{{ $user->id }}/edit" class="btn btn-primary" data-toggle="tooltip" data-original-title="Edit user">
                                                ویرایش
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="d-flex justify-content-center">{{ $users->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
