@extends('back.layout.master')

@section('title') Banner  @endsection
@section('css')

@endsection

@section('content')
    <div class="page">
        @include('back.includes.menu')

        <div class="content m-3">
            <div class="mb-3 col-md-8 offset-md-2">
                <form action="{{ route('home-banner.store') }}" method="POST" enctype="multipart/form-data" class="mb-5">
                    @csrf
                    <div class="row">
                        <div class="form-group mb-3 col-md-12">
                            <label class="form-label" for="src">Photo</label>
                            <input type="file" class="form-control @error('src') is-invalid  @enderror" id="src" name="src[]" multiple="multiple">
                            @error('src')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <button class="btn btn-primary float-end">ADD</button>
                    </div>
                </form>

                <hr>
                <div class="row">
                    @foreach($banners as $banner)
                        <div class="col-md-4 mb-2">
                            <img src="{{ asset('files/home/banners/'.$banner->src) }}" style="width: 300px; height: 150px" alt="">
                            <a href="{{ route('home.banner.deleter',['id'=>$banner->id]) }}" class="btn btn-danger float-end" style="position: absolute"><i class="fa fa-times"></i></a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @include('back.includes.footer')
    </div>
@endsection

@section('js')

@endsection
