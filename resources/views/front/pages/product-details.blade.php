@extends('front.layout.master')

@section('title')  @endsection
@section('css')

@endsection

@section('content')
    <main>
        <div class="page-banner-section veb">
            <div class="container">
                <ul class="breadcrumb flex-column  align-content-center">
                    <li><a href="javascript:(0)">{{ $product->{'title_'.app()->getLocale()} }}</a></li>
                    <div class="center">
                        <li class="eye">
                            <p>{{ $product->hits }}</p>
                            <i class="fa-solid fa-eye"></i>
                        </li>
                    </div>
                </ul>
            </div>
        </div>
        <article class="article">
            <section class="project_detail_one">
                <div class="container">
                    <div class="row">
                        <div class="iframeContainer">
                            @foreach($product->images as $image)
                            <img src="{{ asset('files/products/images/'.$image->src) }}" alt="">
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        </article>
    </main>
@endsection

@section('js')

@endsection
