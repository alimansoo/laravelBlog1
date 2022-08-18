@extends('layouts.admin')

@section('main')
    <div class="container-fluid py-4">
        <div class="row my-4">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>ایجاد بلاگ</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <form action="/admin/articles/" method="post" class="p-3">
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
                                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="عنوان مقاله">
{{--                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">دسته بندی</label>
                                    <select class="form-select" name="category" aria-label="Default select example">
                                        <option value=" " selected>انتخاب کنید</option>
                                        @foreach(\App\Models\Category::all() as $category)
                                            <option value="{{ $category->id }}">{{ $category->name_fa }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> نشانه ها</label>
                                    <select class="form-select" name="tags[]" aria-label="Default select example" multiple>
                                        <option value=" " selected>انتخاب کنید</option>
                                        @foreach(\App\Models\Tag::all() as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">متن مقاله</label>
                                    <textarea class="form-control" id="editor"  name="body" id="exampleFormControlTextarea1" rows="10"  placeholder="متن مقاله"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary mb-0">ایجاد مقاله</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
