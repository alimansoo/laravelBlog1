@extends('layouts.admin')

@section('main')
    <div class="container-fluid py-4">
        <div class="row my-4">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>ویرایش بلاگ</h6>
                    </div>

                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">

                            <form action="/admin/articles/{{ $article->slug }}" method="post" class="p-3">
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
                                    <label for="exampleInputEmail1">عنوان مقاله</label>
                                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="عنوان" value="{{ $article->title }}">
{{--                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ادرس مقاله</label>
                                    <input type="text" name="slug" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ایمیل کاربر" value="{{ $article->slug }}">
{{--                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">دسته بندی</label>
                                    <select class="form-select" name="category" aria-label="Default select example">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}"@if($category->id === $article->category) selected @endif>{{ $category->name_fa }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">متن مقاله</label>
                                    <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="10">{{ $article->body }}</textarea>
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
