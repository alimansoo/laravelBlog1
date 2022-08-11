@extends('layouts.admin')

@section('main')
    <div class="container-fluid py-4">
        <div class="row my-4">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>ویرایش دسته بندی</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <form action="/admin/categories/{{ $category->id }}" method="post" class="p-3">
                                @csrf
                                @method('put')

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
                                    <label for="exampleInputEmail1">عنوان دسته بندی</label>
                                    <input type="text" name="name_fa" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="عنوان" value="{{ $category->name_fa }}">
{{--                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ادرس دسته بندی</label>
                                    <input type="text" name="slug" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ایمیل کاربر" value="{{ $category->slug }}">
{{--                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
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
