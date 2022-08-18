@extends('layouts.app')

@section('content')
    <main class="main-content  mt-0">
        <section class="min-vh-100 mb-8">
            <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('http://127.0.0.1:8000/assets/img/curved-images/curved10.jpg');">
                <span class="mask bg-gradient-dark opacity-6"></span>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 text-center mx-auto">
                            <h1 class="text-white mb-2 mt-5">تغییر رمز عبور</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container" style="text-align: end;">
                <div class="row mt-lg-n10 mt-md-n11 mt-n10">
                    <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                        <div class="card z-index-0">
                            <div class="card-header text-center">
                                <h5>تغییر رمز عبور.</h5>
                            </div>
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('password.confirm') }}">
                                    @csrf
                                    <label for="password" class="col-md-4 col-form-label text-md-end">رمز عبور</label>

                                    <div class="mb-3">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">تغییر رمز عبور</button>
                                    </div>
                                </form>
                                <div class="card-footer text-center">
                                    <p class=" text-sm mx-auto mb-0">
                                        <a href="{{ route('admin.dashbord') }}">بازگشت</a>
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
