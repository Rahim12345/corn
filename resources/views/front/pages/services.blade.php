@extends('front.layout.master')

@section('title')  @endsection
@section('css')

@endsection

@section('content')
    <main>
        <div class="page-banner-section veb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{ route('front.services') }}">{{ __('menu.xidmetlerimiz') }}</a></li>
                </ul>
            </div>
        </div>
        <article class="article buttons">
            <header class="article__header">
                <div class="container">

                    <div class="article__filter filter mt-5 mb-4">
                        @foreach($services as $service)
                        <a href="{{ route('front.services',['slug'=>$service->{'slug_'.app()->getLocale()}]) }}" class="filter__item __js_filter-btn active" type="button" data-filter=".veb">{{ $service->{'name_'.app()->getLocale()} }}</a>
                        @endforeach
                    </div>
                </div>
            </header>
            <div class="article__main container">
                <ul class="projects-masonry row __js_projects-grid">
                    @foreach($products as $product)
                    <li class="projects-masonry__item col-6 col-md-4 col-xl-3 __js_masonry-item veb">
                        <a class="card card--small card--masonry" href="projects-detail.html">
                            <div class="card__image">
                                <img src="{{ asset('files/products/covers/'.$product->src) }}"  width="350" height="550" alt="">
                            </div>
                            <div class="card__content">
                                <h3 class="card__heading">Villa
                                    <br>In
                                    <br>London
                                </h3>
                                <div class="card__text">Projects for many large domestic and foreign corporations, enterprises in many elds such as nance, banking, F&B, education, communication.</div>
                                <div class="card__bottom">
                <span class="card__link">See project
                  <svg width="20" height="20">
                    <use xlink:href="#chevron-right"></use>
                  </svg>
                </span>
                                </div>
                            </div>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </article>
    </main>
@endsection

@section('js')
    <script>
        $('document').ready(function () {
            $('#service_activator').click();
        });
    </script>
@endsection
