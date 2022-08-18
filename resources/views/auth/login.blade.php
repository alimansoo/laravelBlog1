@extends('layouts.app')
@section('title','ورود')
@section('content')
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto" style="direction: rtl">
              <div class="card card-plain mt-6">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-info text-gradient">ورود به حساب کاربری</h3>
                  <p class="mb-0">مشخصات خود را وارد کنید.</p>
                </div>
                <div class="card-body">
                  <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <label>ایمیل</label>
                    <div class="mb-3">
                      <input id="email" type="email" style="direction: ltr" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                      <br>
                    <label>رمز عبور</label>
                    <div class="mb-3">
                      <input id="password" style="direction: ltr" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                      <br>

                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">ورود</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    حساب کاربری دارید؟
                    <a href="{{ route('register') }}" class="text-info text-gradient font-weight-bold">ثبت نام</a>
                  </p>
                    <p class="mb-4 text-sm mx-auto">
                    <a href="{{ route('password.request') }}" class="text-info text-gradient font-weight-bold"> فراموشی رمز عبور</a>
                  </p>
                    <br>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('../assets/img/curved-images/curved6.jpg')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>
@endsection
