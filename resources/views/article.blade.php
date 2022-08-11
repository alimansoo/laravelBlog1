@extends('layouts.master')

@section('main')
    <div id="main">

        <!-- Post -->
        <article class="post">
            <header>
                <div class="title">
                    <h2>{{ $article->title }}</h2>
                    <p>{{ $article->CategtoryName }}</p>
                </div>
                <div class="meta">
                    <time class="published" datetime="2015-11-01">{{ $article->jalaliCreatedAt }}</time>
                    <a href="#" class="author"><span class="name">{{ $article->writerFullName }}</span><img src="http://127.0.0.1:8000/images/avatar.jpg" alt="" /></a>
                </div>
            </header>
            <span class="image featured"><img src="http://127.0.0.1:8000/images/pic01.jpg" alt="" /></span>
            <p>{{ $article->body }}</p>
            <footer>
                <ul class="stats">
                    <li><a href="#">General</a></li>
                    <li><a href="#" class="icon solid fa-heart">28</a></li>
                    <li><a href="#" class="icon solid fa-comment">128</a></li>
                </ul>
            </footer>
        </article>

    </div>
@endsection
