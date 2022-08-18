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
                        <a href="/writer/{{ $article->user->id }}" class="author"><span class="name">{{ $article->user_fullname() }}</span><img src="images/avatar.jpg" alt="" /></a>
                    </div>
                </header>
                <a href="/article/{{ $article->slug }}" class="image featured"><img src="/images/pic01.jpg" alt="" /></a>
                <p>{{ $article->body_limited() }}</p>
                <footer>
                    <ul class="actions">
                        <li><a href="/article/{{ $article->slug }}" class="button large">ادامه خواندن</a></li>
                    </ul>
                    <ul class="stats">
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

    <section id="sidebar">

        <!-- Intro -->
        <section id="intro">
            <a href="#" class="logo"><img src="images/logo.jpg" alt="" /></a>
            <header>
                <h2>وبلاگ شخصی</h2>
            </header>
        </section>

        <!-- Mini Posts -->
        <section>
            <div class="mini-posts">

                <!-- Mini Post -->
                <article class="mini-post">
                    <header>
                        <h3><a href="#">لورم ایپسوم متن ساختگی با تولید سادگی </a></h3>
                        <time class="published" datetime="2015-10-20">October 20, 2015</time>
                        <a href="#" class="author"><img src="images/avatar.jpg" alt="" /></a>
                    </header>
                    <a href="single.html" class="image"><img src="images/pic04.jpg" alt="" /></a>
                </article>

                <!-- Mini Post -->
                <article class="mini-post">
                    <header>
                        <h3><a href="#">لورم ایپسوم متن ساختگی با تولید سادگی </a></h3>
                        <time class="published" datetime="2015-10-19">October 19, 2015</time>
                        <a href="#" class="author"><img src="images/avatar.jpg" alt="" /></a>
                    </header>
                    <a href="single.html" class="image"><img src="images/pic05.jpg" alt="" /></a>
                </article>

                <!-- Mini Post -->
                <article class="mini-post">
                    <header>
                        <h3><a href="#">لورم ایپسوم متن ساختگی با تولید سادگی </a></h3>
                        <time class="published" datetime="2015-10-18">October 18, 2015</time>
                        <a href="#" class="author"><img src="images/avatar.jpg" alt="" /></a>
                    </header>
                    <a href="single.html" class="image"><img src="images/pic06.jpg" alt="" /></a>
                </article>

                <!-- Mini Post -->
                <article class="mini-post">
                    <header>
                        <h3><a href="#">لورم ایپسوم متن ساختگی با تولید سادگی </a></h3>
                        <time class="published" datetime="2015-10-17">October 17, 2015</time>
                        <a href="#" class="author"><img src="images/avatar.jpg" alt="" /></a>
                    </header>
                    <a href="single.html" class="image"><img src="images/pic07.jpg" alt="" /></a>
                </article>

            </div>
        </section>

        <!-- Posts List -->
        <section>
            <ul class="posts">
                <li>
                    <article>
                        <header>
                            <h3><a href="#">لورم ایپسوم متن ساختگی با تولید سادگی </a></h3>
                            <time class="published" datetime="2015-10-20">October 20, 2015</time>
                        </header>
                        <a href="single.html" class="image"><img src="images/pic08.jpg" alt="" /></a>
                    </article>
                </li>
                <li>
                    <article>
                        <header>
                            <h3><a href="#">لورم ایپسوم متن ساختگی با تولید سادگی </a></h3>
                            <time class="published" datetime="2015-10-15">October 15, 2015</time>
                        </header>
                        <a href="single.html" class="image"><img src="images/pic09.jpg" alt="" /></a>
                    </article>
                </li>
                <li>
                    <article>
                        <header>
                            <h3><a href="#">لورم ایپسوم متن ساختگی با تولید سادگی </a></h3>
                            <time class="published" datetime="2015-10-10">October 10, 2015</time>
                        </header>
                        <a href="single.html" class="image"><img src="images/pic10.jpg" alt="" /></a>
                    </article>
                </li>
                <li>
                    <article>
                        <header>
                            <h3><a href="#">لورم ایپسوم متن ساختگی با تولید سادگی </a></h3>
                            <time class="published" datetime="2015-10-08">October 8, 2015</time>
                        </header>
                        <a href="single.html" class="image"><img src="images/pic11.jpg" alt="" /></a>
                    </article>
                </li>
                <li>
                    <article>
                        <header>
                            <h3><a href="#">لورم ایپسوم متن ساختگی با تولید سادگی </a></h3>
                            <time class="published" datetime="2015-10-06">October 7, 2015</time>
                        </header>
                        <a href="single.html" class="image"><img src="images/pic12.jpg" alt="" /></a>
                    </article>
                </li>
            </ul>
        </section>

        <!-- About -->
        <section class="blurb">
            <h3>درباره ما</h3>
            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
            <ul class="actions">
                <li><a href="#" class="button">بیشتر بخوانید</a></li>
            </ul>
        </section>

        <!-- Footer -->
        <section id="footer">
            <ul class="icons">
                <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
                <li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
                <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
                <li><a href="#" class="icon solid fa-rss"><span class="label">RSS</span></a></li>
                <li><a href="#" class="icon solid fa-envelope"><span class="label">Email</span></a></li>
            </ul>
            <p class="copyright">&copy; Untitled. Design: <a href="http://html5up.net">HTML5 UP</a>. Images: <a href="http://unsplash.com">Unsplash</a>.</p>
        </section>

    </section>
@endsection
