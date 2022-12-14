@extends('layouts.master')

@section('main')
    <div id="main">

        <!-- Post -->
        @foreach($articles as $article)
            <article class="post">
                <header>
                    <div class="title">
                        <h2><a href="/article/{{ $article->slug }}">{{ $article->title }}</a></h2>
                        <p>{{ $article->category->name_fa }}</p>
                    </div>
                    <div class="meta">
                        <time class="published" datetime="2015-11-01">{{ $article->jalali_date() }}</time>
                        <a href="/writer/{{ $article->user->id }}" class="author"><span class="name">{{ $article->user_fullname() }}</span><img src="http://127.0.0.1:8000/images/avatar.jpg" alt="" /></a>
                    </div>
                </header>
                <a href="/article/{{ $article->slug }}" class="image featured"><img src="/images/pic01.jpg" alt="" /></a>
                <p>{{ $article->body_limited() }}</p>
                <footer>
                    <ul class="actions">
                        <li><a href="/article/{{ $article->slug }}" class="button large">ادامه خواندن</a></li>
                    </ul>
                    <ul class="stats">
                        <li><a href="#">General</a></li>
                        <li><a href="#" class="icon solid fa-heart">28</a></li>
                        <li><a href="#" class="icon solid fa-comment">128</a></li>
                    </ul>
                </footer>
            </article>
    @endforeach

    <!-- Pagination -->
        <ul class="actions pagination">
            {{ $articles->links() }}
        </ul>

    </div>
@endsection
