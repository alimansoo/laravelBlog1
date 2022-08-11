<header id="header">
    <h1><a href="http://127.0.0.1:8000/">وبلاگ شخصی</a></h1>
    <nav class="links">
        <ul>
            @foreach($categories as $category)
                <li><a href="/category/{{ $category->slug }}">{{ $category->name_fa }}</a></li>
            @endforeach
        </ul>
    </nav>
    <nav class="main">
        <ul>
            <li class="search">
                <a class="fa-search" href="#search">Search</a>
                <form id="search" method="get" action="#">
                    <input type="text" name="query" placeholder="جستجو..." />
                </form>
            </li>
            <li class="menu">
                <a class="fa-bars" href="#menu">Menu</a>
            </li>
        </ul>
    </nav>
</header>
