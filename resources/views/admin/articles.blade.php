@extends('layouts.admin')

@section('main')
    <div class="container-fluid py-4">
        <div class="row my-4">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <h6>بلاگ ها</h6>
                        <a href="/admin/articles/create" class="btn btn-primary">اضافه کردن بلاگ</a>
                    </div>
                    <div class="p-4 pb-0 d-flex justify-content-between">
                        <form action="" class="">
                            <div class="d-flex">
                                <div class="form-group m-2">
                                    <label for="exampleInputEmail1"> شناسه </label>
                                    <input type="text" name="id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="شناسه">
                                </div>
                                <div class="form-group m-2">
                                    <label for="exampleInputEmail1"> عنوان </label>
                                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="عنوان">
                                </div>
                                <div class="form-group m-2">
                                    <label for="exampleInputEmail1"> نویسنده </label>
                                    <input type="text" name="writer" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="نویسنده">
                                </div>
                                <div class="form-group m-2">
                                    <label for="exampleInputEmail1"> دسته بندی</label>
                                    <select class="form-select" name="category" aria-label="Default select example">
                                        <option value="">انتخاب کنید</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name_fa }}</option>
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
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">شناسه</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"> عنوان مقاله</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">دسته بندی</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">  نویسنده</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">تاریخ ساخت</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($articles as $article)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="../assets/img/article.jpg" class="avatar avatar-sm me-3" alt="user1">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $article->id }}</h6>
                                                    <p class="text-xs text-secondary mb-0"></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="/article/{{ $article->slug }}" target="_blank">{{ $article->title }}</a>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $article->CategtoryName }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $article->writerFullName }}</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $article->jalaliCreatedAt }}</span>
                                        </td>
                                        <td class="align-middle">
                                            <a href="/admin/articles/{{ $article->slug }}/edit" class="btn btn-primary" data-toggle="tooltip" data-original-title="Edit user">
                                                ویرایش
                                            </a>
                                        </td>
                                        <td class="align-middle">
                                            <form action="/admin/articles/{{ $article->slug }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger">حذف</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="d-flex justify-content-center">{{ $articles->withQueryString()->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
