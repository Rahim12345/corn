@extends('back.layout.master')

@section('title') Service @endsection

@section('css')

@endsection

@section('content')
    <div class="page">
        @include('back.includes.menu')

        <div class="content m-3">
            <div class="mb-3 col-md-10 offset-md-1">
                <a href="{{ route('service.index') }}" class="btn btn-primary w-100">All</a>
            <form action="{{ route('service.update',$service->id) }}" method="POST" enctype="multipart/form-data" class="mb-5">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="form-group mb-3 col-md-4">
                    <label class="form-label" for="name_az">Name(AZ)</label>
                    <input type="text" class="form-control @error('name_az') is-invalid  @enderror" name="name_az" id="menu_az" value="{{ old('name_az',$service->name_az) }}">
                    @error('name_az')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3 col-md-4">
                    <label class="form-label" for="name_en">Name(EN)</label>
                    <input type="text" class="form-control @error('name_en') is-invalid  @enderror" name="name_en" id="menu_en" value="{{ old('name_en',$service->name_en) }}">
                    @error('name_en')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3 col-md-4">
                    <label class="form-label" for="name_ru">Name(RU)</label>
                    <input type="text" class="form-control @error('name_ru') is-invalid  @enderror" name="name_ru" id="menu_en" value="{{ old('name_ru',$service->name_ru) }}">
                    @error('name_ru')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group mb-3">
                <button class="btn btn-primary float-end">EDIT</button>
            </div>
            </form>
            </div>
        </div>
        @include('back.includes.footer')
    </div>
@endsection

@section('js')

@endsection
