@extends('back.layout.master')

@section('title') Products @endsection

@section('css')

@endsection

@section('content')
    <div class="page">
        @include('back.includes.menu')

        <div class="content m-3">
            <div class="mb-3 col-md-10 offset-md-1">
                <a href="{{ route('product.index') }}" class="btn btn-primary w-100">All</a>
            <form action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data" class="mb-5">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="form-group mb-3 col-md-8">
                    @if($product->src)
                        <img src="{{ asset('files/products/covers/'.$product->src) }}" style="width: 100px" alt="">
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="form-group mb-3 col-md-8">
                    <label class="form-label" for="src">Cover</label>
                    <input type="file" class="form-control @error('src') is-invalid  @enderror" name="src" id="src" value="{{ old('src') }}">
                    @error('src')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3 col-md-4">
                    <label class="form-label" for="service_id">Servis</label>
                    <select name="service_id" id="service_id" class="form-control @error('title_az') is-invalid  @enderror">
                        @foreach($services as $service)
                            <option value="{{ $service->id }}" {{ $service->id == old('service_id',$product->service_id) ? 'selected' : '' }}>{{ $service->name_az }}</option>
                        @endforeach
                    </select>
                    @error('service_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3 col-md-4">
                    <label class="form-label" for="title_az">Title(AZ)</label>
                    <input type="text" class="form-control @error('title_az') is-invalid  @enderror" name="title_az" id="title_az" value="{{ old('title_az',$product->title_az) }}">
                    @error('title_az')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3 col-md-4">
                    <label class="form-label" for="title_en">Title(EN)</label>
                    <input type="text" class="form-control @error('title_en') is-invalid  @enderror" name="title_en" id="title_en" value="{{ old('title_en',$product->title_en) }}">
                    @error('title_en')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3 col-md-4">
                    <label class="form-label" for="title_ru">Title(RU)</label>
                    <input type="text" class="form-control @error('title_ru') is-invalid  @enderror" name="title_ru" id="title_ru" value="{{ old('title_ru',$product->title_ru) }}">
                    @error('title_ru')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3 col-md-4">
                    <label class="form-label" for="text_az">Text(AZ)</label>
                    <textarea name="text_az" id="text_az" class="form-control @error('text_az') is-invalid  @enderror" cols="30" rows="4">{{ old('text_az',$product->text_az) }}</textarea>
                    @error('text_az')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3 col-md-4">
                    <label class="form-label" for="text_en">Text(EN)</label>
                    <textarea name="text_en" id="text_en" class="form-control @error('text_en') is-invalid  @enderror" cols="30" rows="4">{{ old('text_en',$product->text_en) }}</textarea>
                    @error('text_en')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3 col-md-4">
                    <label class="form-label" for="text_ru">Text(RU)</label>
                    <textarea name="text_ru" id="text_ru" class="form-control @error('text_ru') is-invalid  @enderror" cols="30" rows="4">{{ old('text_ru',$product->text_ru) }}</textarea>
                    @error('text_ru')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3 col-md-12">
                    <label class="form-label" for="images">Images</label>
                    <input type="file" class="form-control @error('images') is-invalid  @enderror" name="images[]" id="images" value="{{ old('images') }}" multiple="multiple" accept="image/*">
                    @error('images')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <hr>
                <div class="row">
                @foreach($product->images as $image)
                        <div class="form-group mb-3 col-md-2" style="border: 2px solid black">
                            <img src="{{ asset('files/products/images/'.$image->src) }}" alt="" style="width: 100px">
                            <a href="{{ route('image.deleter',['id'=>$image->id]) }}" onclick="if (confirm('Delete selected item?')){return true;}else{event.stopPropagation(); event.preventDefault();};" class="btn btn-danger float-end" title="Delete">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                @endforeach
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
