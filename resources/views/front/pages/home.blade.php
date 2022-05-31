@extends('front.layout.master')

@section('title')  @endsection
@section('css')

@endsection

@section('content')
    <main>
        <!-- SLIDER -->
        <section class="slider-main-area">
            <div class="main-sliders an-si">
                <div class="bend niceties preview-2">
                    <div id="ensign-nivoslider-2" class="slides">
                        <img
                            src="https://corn.az/frontend/web/img/slider/1920x710/1569571716_87j3YO.jpg"
                            alt=""
                            title="#slider-direction-3"
                        />
                        <img
                            src="https://corn.az/frontend/web/img/slider/1920x710/1568714044_a1U94l.jpg"
                            alt=""
                            title="#slider-direction-1"
                        />
                        <img
                            src="https://corn.az/frontend/web/img/slider/1920x710/1568714165_GK-gKx.jpg"
                            alt=""
                            title="#slider-direction-1"
                        />
                        <img
                            src=" https://corn.az/frontend/web/img/slider/1920x710/1568714527_zNkDNW.jpg"
                            alt=""
                            title="#slider-direction-1"
                        />
                    </div>
                </div>
            </div>
        </section>
        <!-- SLIDER -->
        <!-- XIDMETLERIMIZ -->
        <section class="webpage__latest-projects latest-projects">
            <header class="latest-projects__header container" data-aos="fade">
                <h2 class="latest-projects__heading heading">{{ __('menu.xidmetlerimiz') }}</h2>
                <!-- Filter latest projects-->
                <div class="latest-projects__filter filter">
                    @foreach($services as $service)
                    <button
                        class="filter__item __js_latest-projects-filter-item"
                        type="button"
                        data-filter=".{{ $service->{'slug_'.app()->getLocale()} }}"
                        id="{{ $loop->first ? 'service_activator' : 'xnxx' }}"
                    >
                        {{ $service->{'name_'.app()->getLocale()} }}
                    </button>
                    @endforeach
                </div>
                <a class="latest-projects__more more" href="{{ route('front.services') }}"
                >Bütün xidmətlərimiz
                    <svg width="20" height="20">
                        <use xlink:href="#chevron-right"></use>
                    </svg>
                </a>
            </header>
            <div class="latest-projects__inner container" data-aos="fade">
                <div
                    class="latest-projects__carousel swiper-container __js_latest-projects-carousel"
                >
                    <div class="swiper-wrapper">
                        @foreach($zero as $z)
                        <a
                            class="card swiper-slide  {{ $z->service->{'slug_'.app()->getLocale()} }}"
                            href="projects-detail.html"
                        >
                            <div class="card__image">
                                <img
                                    src="{{ asset('files/products/covers/'.$z->src) }}"
                                    srcset="{{ asset('files/products/covers/'.$z->src) }}"
                                    width="430"
                                    height="573"
                                    alt=""
                                />
                            </div>
                            <div class="card__content">
                                <h3 class="card__heading">{{ $z->{'title_'.app()->getLocale()} }}</h3>
                                <div class="card__text">
                                    {{ $z->{'text_'.app()->getLocale()} }}
                                </div>

                                <div class="card__bottom">
              <span class="card__link"
              >{{ __('menu.see_project') }}
                <svg width="20" height="20">
                  <use xlink:href="#chevron-right"></use>
                </svg>
              </span>
                                </div>
                            </div>
                        </a>
                        @endforeach
                        @foreach($first as $z)
                            <a
                                class="card swiper-slide  {{ $z->service->{'slug_'.app()->getLocale()} }}"
                                href="projects-detail.html"
                            >
                                <div class="card__image">
                                    <img
                                        src="{{ asset('files/products/covers/'.$z->src) }}"
                                        srcset="{{ asset('files/products/covers/'.$z->src) }}"
                                        width="430"
                                        height="573"
                                        alt=""
                                    />
                                </div>
                                <div class="card__content">
                                    <h3 class="card__heading">{{ $z->{'title_'.app()->getLocale()} }}</h3>
                                    <div class="card__text">
                                        {{ $z->{'text_'.app()->getLocale()} }}
                                    </div>

                                    <div class="card__bottom">
          <span class="card__link"
          >{{ __('menu.see_project') }}
            <svg width="20" height="20">
              <use xlink:href="#chevron-right"></use>
            </svg>
          </span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                        @foreach($second as $z)
                            <a
                                class="card swiper-slide  {{ $z->service->{'slug_'.app()->getLocale()} }}"
                                href="projects-detail.html"
                            >
                                <div class="card__image">
                                    <img
                                        src="{{ asset('files/products/covers/'.$z->src) }}"
                                        srcset="{{ asset('files/products/covers/'.$z->src) }}"
                                        width="430"
                                        height="573"
                                        alt=""
                                    />
                                </div>
                                <div class="card__content">
                                    <h3 class="card__heading">{{ $z->{'title_'.app()->getLocale()} }}</h3>
                                    <div class="card__text">
                                        {{ $z->{'text_'.app()->getLocale()} }}
                                    </div>

                                    <div class="card__bottom">
      <span class="card__link"
      >{{ __('menu.see_project') }}
        <svg width="20" height="20">
          <use xlink:href="#chevron-right"></use>
        </svg>
      </span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                        @foreach($third as $z)
                            <a
                                class="card swiper-slide {{ $z->service->{'slug_'.app()->getLocale()} }}"
                                href="projects-detail.html"
                            >
                                <div class="card__image">
                                    <img
                                        src="{{ asset('files/products/covers/'.$z->src) }}"
                                        srcset="{{ asset('files/products/covers/'.$z->src) }}"
                                        width="430"
                                        height="573"
                                        alt=""
                                    />
                                </div>
                                <div class="card__content">
                                    <h3 class="card__heading">{{ $z->{'title_'.app()->getLocale()} }}</h3>
                                    <div class="card__text">
                                        {{ $z->{'text_'.app()->getLocale()} }}
                                    </div>

                                    <div class="card__bottom">
  <span class="card__link"
  >{{ __('menu.see_project') }}
    <svg width="20" height="20">
      <use xlink:href="#chevron-right"></use>
    </svg>
  </span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
        <!-- XIDMETLERIMIZ -->

    </main>
@endsection

@section('js')
    <script>
        $('document').ready(function () {
            $('#service_activator').click();
        });
    </script>
@endsection
