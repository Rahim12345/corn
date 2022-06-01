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

                                <div class="col-lg-12 col-md-12" style="display: block;">
                                    <div class="imag">
                                        <img src="{{ asset('files/blogs/'.$blog->src) }}" alt="">
                                        <div class="mt-3">
                                        {!! $blog->{'text_'.app()->getLocale()} !!}
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- post_one-->
                            <!-- Sidebar-->
                            @include('front.includes.blog-sidebar')
                        </div>
                    </div>
                    <!-- Related posts-->

                </section>
            </div>
        </article>
    </main>
@endsection

@section('js')

@endsection
