@extends('front.layout.master')

@section('title') {{ __('menu.about') }}  @endsection
@section('css')

@endsection

@section('content')
    <div class="page-banner-section about">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('front.about') }}">{{ __('menu.about') }}</a></li>
            </ul>
        </div>
    </div>

    <main>
        <section class="webpage__about-block about-block about-block--columns">
            <div class="about-block__inner container" >
                <header class="about-block__header" data-aos="fade">
                    <h2 class="about-block__heading heading">{{ __('menu.biz_kimik') }}</h2>
                </header>
                <div class="about-block__main">
                    <div class="about-block__text" data-aos="fade">
                        <p>{!! \App\Helpers\Options::getOption('kimik_text_'.app()->getLocale()) !!}</p>
                    </div>
                </div>
            </div>
            <div class="about-block__inner container" >
                <header class="about-block__header" data-aos="fade">
                    <h2 class="about-block__heading heading">{{ __('menu.niye_biz') }}</h2>
                </header>
                <div class="about-block__main">
                    <div class="about-block__text" data-aos="fade">
                        <p>{!! \App\Helpers\Options::getOption('niye_text_'.app()->getLocale()) !!}</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="service-section-about">
            <div class="container">
                <div class="service-wrap">
                    <div class="service-content-wrap">
                        <div class="row">
                            @foreach($services as $item)
                            <div class="col-lg-4 col-md-6">
                                <!-- Single Item Start -->
                                <a href="javascript: void(0)" class="single-item">
                                    <div class="shape-1"></div>
                                    <div class="service-content">
                                        <h3 class="title">{!! $item->{'text_'.app()->getLocale()} !!}</h3>
                                        <img class="icon-link" src="https://raistheme.com/html/corpix/corpix/assets/images/btn-icon-pri.png" alt="">
                                    </div>
                                    <div class="service-icon">
                                        <img src="{{ asset('files/about/'.$item->src) }}" alt="">
                                    </div>
                                </a>
                                <!-- Single Item End -->
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('js')

@endsection
