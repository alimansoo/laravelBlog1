@extends('layouts.admin')

@section('main')
    <div class="container-fluid py-4">
        <div class="row my-4">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>کاربر جدید</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <form action="/admin/users" method="post" class="p-3">
                                @csrf
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="exampleInputEmail1">نام کاربر</label>
                                    <input type="text" name="fname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="نام کاربر">
{{--                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">فاميل کاربر</label>
                                    <input type="text"  name="lname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="نام کاربر">
{{--                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ایمیل کاربر</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ایمیل کاربر">
{{--                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">رمز عبور</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="رمز عبور">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">نقش کاربر</label>
                                    <select class="form-select" name="role" aria-label="Default select example">
                                        <option value=" " selected>انتخاب کنید</option>
                                        @foreach(\App\Models\Role::all() as $role)
                                            <option value="1">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary mb-0">ساخت کاربر</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
