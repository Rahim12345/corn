<header class="navbar navbar-expand-md navbar-light d-print-none">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href="{{ route('back.dashboard') }}">
                <img src="{{ asset('back/logo/logo.jpg') }}" width="110" height="32" alt="{{ auth()->user()->name }}" class="navbar-brand-image">
            </a>
        </h1>
        <div class="navbar-nav flex-row order-md-last">
            <div class="nav-item dropdown d-none d-md-flex me-3"></div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                    <span class="avatar avatar-sm" id="nav-avatar" style="background-image: url({{ asset('avatars/'.auth()->user()->avatar) }})"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div id="top-name">{{ mb_substr(explode(' ',auth()->user()->name)[0],0,16) }}</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    @if(app()->getLocale() != 'az') <span style="margin-left: 12px"><a href="{{ route('lang.swithcher',['locale'=>'az']) }}">AZ</a></span> @endif
                    @if(app()->getLocale() != 'en') <span style="margin-left: 12px"><a href="{{ route('lang.swithcher',['locale'=>'en']) }}">EN</a></span> @endif
                    @if(app()->getLocale() != 'ru') <span style="margin-left: 12px"><a href="{{ route('lang.swithcher',['locale'=>'ru']) }}">RU</a></span> @endif
                    <a href="{{ route('back.profile') }}" class="dropdown-item">{{ __('static.profile') }}</a>
                    <a href="{{ route('logout') }}" class="dropdown-item">{{ __('static.logout') }}</a>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar navbar-light">
            <div class="container-xl">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('option.index') }}" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" /><circle cx="12" cy="12" r="3" /></svg>
                    </span>
                            <span class="nav-link-title">
                      {{ __('static.settings') }}
                    </span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" role="button" aria-expanded="false" >
                            <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="4" y1="6" x2="20" y2="6" /><line x1="4" y1="12" x2="20" y2="12" /><line x1="4" y1="18" x2="20" y2="18" /></svg>
                            </span>
                            <span class="nav-link-title">
                              {{ __('static.menus') }}
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="dropend">
                                <a class="dropdown-item dropdown-toggle" href="#sidebar-authentication" data-bs-toggle="dropdown" role="button" aria-expanded="false" >
                                    ??sas S??hif??
                                </a>
                                <div class="dropdown-menu">
                                    <a href="{{ route('home-banner.create') }}" class="dropdown-item">Banner</a>
                                </div>
                            </div>
                            <div class="dropend">
                                <a class="dropdown-item dropdown-toggle" href="#sidebar-authentication" data-bs-toggle="dropdown" role="button" aria-expanded="false" >
                                    Haqq??m??zda
                                </a>
                                <div class="dropdown-menu">
                                    <a href="{{ route('about.banner') }}" class="dropdown-item">Banner</a>
                                    <a href="{{ route('about.text') }}" class="dropdown-item">Text</a>
                                    <a href="{{ route('about.index') }}" class="dropdown-item">Services</a>
                                </div>
                            </div>
                            <div class="dropend">
                                <a class="dropdown-item dropdown-toggle" href="#sidebar-authentication" data-bs-toggle="dropdown" role="button" aria-expanded="false" >
                                    Servisl??r
                                </a>
                                <div class="dropdown-menu">
                                    <a href="{{ route('service.banner') }}" class="dropdown-item">Banner</a>
                                    <a href="{{ route('service.index') }}" class="dropdown-item">Servis &nbsp; <i class="fa fa-plus"></i></a>
                                    <a href="{{ route('product.index') }}" class="dropdown-item">M??hsul &nbsp; <i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                            <div class="dropend">
                                <a class="dropdown-item dropdown-toggle" href="#sidebar-authentication" data-bs-toggle="dropdown" role="button" aria-expanded="false" >
                                    T??qdimat
                                </a>
                                <div class="dropdown-menu">
                                    <a href="{{ route('presentation.banner') }}" class="dropdown-item">Banner</a>
                                    <a href="{{ route('presentation.index') }}" class="dropdown-item">T??qdimatlar</a>
                                </div>
                            </div>

                            <div class="dropend">
                                <a class="dropdown-item dropdown-toggle" href="#sidebar-authentication" data-bs-toggle="dropdown" role="button" aria-expanded="false" >
                                    Blog
                                </a>
                                <div class="dropdown-menu">
                                    <a href="{{ route('presentation.banner') }}" class="dropdown-item">Banner</a>
                                    <a href="{{ route('blog.index') }}" class="dropdown-item">Bloglar</a>
                                </div>
                            </div>

                        </div>
                    </li>
                </ul>
                <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last"></div>
            </div>
        </div>
    </div>
</div>
