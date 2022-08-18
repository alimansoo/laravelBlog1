
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="http://127.0.0.1:8000/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="http://127.0.0.1:8000/assets/img/favicon.png">
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>

    <title>
        پنل ادمین
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="http://127.0.0.1:8000/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="http://127.0.0.1:8000/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        rel="stylesheet"
    />

    <link href="http://127.0.0.1:8000/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="http://127.0.0.1:8000/assets/css/soft-ui-dashboard.css?v=1.0.6" rel="stylesheet" />
</head>

<body class="g-sidenav-show rtl bg-gray-100">
@include('layouts.adminsidebar')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg overflow-x-hidden">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl top-6" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
{{--            <nav aria-label="breadcrumb">--}}
{{--                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 ">--}}
{{--                    <li class="breadcrumb-item text-sm ps-2"><a class="opacity-5 text-dark" href="javascript:;">لوحات القيادة</a></li>--}}
{{--                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">RTL</li>--}}
{{--                </ol>--}}
{{--                <h6 class="font-weight-bolder mb-0">RTL</h6>--}}
{{--            </nav>--}}
            <div class="collapse navbar-collapse mt-sm-0 mt-2 px-0" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="جستجو...">
                    </div>
                </div>
                <ul class="navbar-nav me-auto ms-0 justify-content-end">
                    <li class="nav-item d-flex align-items-center">
                        <a class="btn btn-outline-dark btn-sm mb-0 ms-3" href="{{ route('password.confirm') }}">تغییر رمز عبور</a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="btn btn-outline-primary btn-sm mb-0 ms-3">خروج</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    @yield('main')
</main>

<!--   Core JS Files   -->
<script src="http://127.0.0.1:8000/assets/js/core/popper.min.js"></script>
<script src="http://127.0.0.1:8000/assets/js/core/bootstrap.min.js"></script>
<script src="http://127.0.0.1:8000/assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="http://127.0.0.1:8000/assets/js/plugins/smooth-scrollbar.min.js"></script>
<script src="http://127.0.0.1:8000/assets/js/plugins/fullcalendar.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/decoupled-document/ckeditor.js"></script>

<script src="http://127.0.0.1:8000/assets/js/plugins/choices.min.js"></script>
<script src="http://127.0.0.1:8000/assets/js/plugins/chartjs.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>

<script>
    DecoupledEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>


<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="http://127.0.0.1:8000/assets/js/soft-ui-dashboard.min.js?v=1.0.6"></script>
<script src="https://kit.fontawesome.com/864251d15b.js" crossorigin="anonymous"></script>
</body>

</html>
