@extends('front.layout.master')

@section('title') {{ __('menu.blog') }}  @endsection
@section('css')

@endsection

@section('content')
    <main>
        <div class="page-banner-section blog">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="single-post-2.html">Bloq</a></li>
                </ul>
            </div>
        </div>
        <article class="article article--news">
            <div class="post-sb-page__wrapper">
                <!-- Post-->
                <section class="post-sb ">

                    <div class="article__main container-fluid">
                        <div class="post-sb__wrapper">
                            <!-- post_all-->
                            <!-- BURDA POST_ALL DIVINDE BUTUN POSTLAR GORUNUR,ETRAFLI BUTTONUNA KLIKLEYENDE POST_ALL CLASSI DISPLAY-NONE OLUR,POST_ONE CLASSI AKTIV OLUR,SEHIFE DEYISMIR,
                            YENI BLOGLARIN HAMISI VE SINGLE BLOGDA TEK SEHIFEDEDIR HORMETLI RAHIM BEY  -->
                            <div class="col-xl-8 col-lg-12 col-md-12 post_all">

                                @foreach($blogs as $blog)
                                <div class="post-grid ">
                                    <div class="post-thumbnail">
                                        <img src="{{ asset('files/blogs/'.$blog->src) }}">
                                    </div>
                                    <div class="post-content">
                                        <div class="post-content-inner">
                                            <h3>{{ $blog->{'title_'.app()->getLocale()} }}</h3>
                                            <article class="article-blog">
                                                <p>{{ $blog->{'intro_'.app()->getLocale()} }}</p>
                                            </article>
                                            <ul class="meta-info">
                                                <div class="date">
                                                    <li><p>{{ \Carbon\Carbon::parse($blog->created_at)->format('Y') }}</p></li>
                                                </div>
                                                <div class="fas">
                                                    <li><a href="#"><i class="fa-solid fa-heart"></i></a></li>
                                                    <li><a href="#"><i class="fa-solid fa-eye"></i></a></li>
                                                </div>
                                            </ul>
                                        </div>
                                        <div class="post-footer-meta clearfix">
                                            <div class="read-more-wrapper">
                                                <a class="openMore1" href="{{ route('front.blog.single',['slug'=>$blog->{'slug_'.app()->getLocale()}]) }}">
                                                    <button class="cta ">
                                                        <span>{{ __('static.etrafli') }}</span>
                                                        <svg viewBox="0 0 13 10" height="10px" width="15px">
                                                            <path d="M1,5 L11,5"></path>
                                                            <polyline points="8 1 12 5 8 9"></polyline>
                                                        </svg>
                                                    </button>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <!-- post_one-->
                            <!-- Sidebar-->
                            @include('front.includes.blog-sidebar')
                        </div>
                    {{ $blogs->onEachSide(0)->links('vendor.pagination.bootstrap-4') }}
                    </div>
                    <!-- Related posts-->

                </section>
            </div>
        </article>
    </main>
@endsection

@section('js')

@endsection
