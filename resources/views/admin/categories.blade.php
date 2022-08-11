@extends('layouts.admin')

@section('main')
    <div class="container-fluid py-4">
        <div class="row my-4">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <h6>بلاگ ها</h6>
                        <a href="/admin/categories/create" class="btn btn-primary">اضافه کردن دسته بندی</a>
                    </div>
                    <div class="p-4 pb-0 d-flex justify-content-between">
                        <form action="" class="">
                            <div class="d-flex">
                                <div class="form-group m-2">
                                    <label for="exampleInputEmail1"> شناسه </label>
                                    <input type="text" name="id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="شناسه">
                                </div>
                                <div class="form-group m-2">
                                    <label for="exampleInputEmail1"> نام </label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="نام">
                                </div>
                                <div class="form-group m-2">
                                    <label for="exampleInputEmail1"> ادرس </label>
                                    <input type="text" name="slug" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ادرس">
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
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">نام دسته بندی</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ادرس دسته بندی</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> تعداد مقاله</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $categoriy)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="http://127.0.0.1:8000/assets/img/category.jpg" class="avatar avatar-sm me-3" alt="user1">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $categoriy->id }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                <a href="/category/{{ $categoriy->slug }}" target="_blank">{{ $categoriy->name_fa }}</a>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{ $categoriy->slug }}
                                            </p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $categoriy->ArticleCount }}</span>
                                        </td>
                                        <td class="align-middle" style="text-align: end;">
                                            <a href="/admin/categories/{{ $categoriy->id }}/edit" class="btn btn-primary" data-toggle="tooltip" data-original-title="Edit user">
                                                ویرایش
                                            </a>
                                        </td>
                                        <td class="align-middle" style="text-align: start;">
                                            <form action="/admin/categories/{{ $categoriy->id }}" method="post">
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
                    <div class="d-flex justify-content-center">{{ $categories->withQueryString()->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
