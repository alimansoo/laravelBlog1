@extends('layouts.admin')

@section('main')
    <div class="container-fluid py-4">
        <div class="row my-4">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>ویرایش کاربر</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <form action="/admin/users/{{ $user->id }}" method="post" class="p-3">
                                @method('put')
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
                                    <label for="exampleInputEmail1"> نام کوچک</label>
                                    <input type="text" name="fname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="نام کوچک" value="{{ $user->fname }}">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1"> نام بزرگ</label>
                                    <input type="text" name="lname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="نام بزرگ" value="{{ $user->lname }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ایمیل</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ایمیل کاربر" value="{{ $user->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">نقش کاربر</label>
                                    <select class="form-select" name="role" aria-label="Default select example">
                                        @foreach($rols as $role)
                                            <option value="{{ $role->id }}"@if($role->id === $user->role) selected @endif>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary mb-0">بروزرسانی</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
