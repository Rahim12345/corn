@extends('front.layout.master')

@section('title') {{ __('menu.teqdimat') }}  @endsection
@section('css')

@endsection

@section('content')
    <main>
        <div class="page-banner-section brif" style="background-image: url({{ asset('files/presentation_banner/'.\App\Helpers\Options::getOption('presentation_banner')) }})">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="single-post-2.html">{{ __('menu.teqdimat') }}</a></li>
                </ul>
            </div>
        </div>
        <article class="article">

            <section class="presentation">
                <div class="container">
                    <div class="row">
                        @foreach($presentations as $presentation)
                        <div class="card" >
                            <a href="{{ asset('files/presentations/pdf/'.$presentation->pdf) }}" target="_blank">
                                <img data-src="{{ asset('files/presentations/covers/'.$presentation->src) }}" class="card-img-top lozad" alt="..." src="https://fenstar.az//storage/app/public/storage/partners/tLj11yIcdSRkPB9NZ3AKJFA568DqtIzFqLopP0yo.jpeg" data-loaded="true">
                            </a><div class="card-body"><a href="{{ asset('files/presentations/covers/'.$presentation->src) }}">
                                </a><a href="{{ asset('files/presentations/pdf/'.$presentation->pdf) }}" class="btn btn-primary">
                                    <h5 class="card-title" style="font-size: 1rem!important; margin-bottom: 0!important;">{!! $presentation->{'name_'.app()->getLocale()} !!}</h5></a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>



        </article>
    </main>
@endsection

@section('js')

@endsection
