@extends('back.layout.master')

@section('title') Blogs @endsection

@section('css')

@endsection

@section('content')
    <div class="page">
        @include('back.includes.menu')

        <div class="content m-3">
            <div class="mb-3 col-md-10 offset-md-1">
                <a href="{{ route('blog.index') }}" class="btn btn-primary w-100">All</a>
            <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data" class="mb-5">
            @csrf
            <div class="row">
                <div class="form-group mb-3 col-md-12">
                    <label class="form-label" for="src">Cover</label>
                    <input type="file" class="form-control @error('src') is-invalid  @enderror" name="src" id="src" value="{{ old('src') }}">
                    @error('src')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3 col-md-4">
                    <label class="form-label" for="title_az">Title(AZ)</label>
                    <input type="text" class="form-control @error('title_az') is-invalid  @enderror" name="title_az" id="title_az" value="{{ old('title_az') }}">
                    @error('title_az')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3 col-md-4">
                    <label class="form-label" for="title_en">Title(EN)</label>
                    <input type="text" class="form-control @error('title_en') is-invalid  @enderror" name="title_en" id="title_en" value="{{ old('title_en') }}">
                    @error('title_en')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3 col-md-4">
                    <label class="form-label" for="title_ru">Title(RU)</label>
                    <input type="text" class="form-control @error('title_ru') is-invalid  @enderror" name="title_ru" id="title_ru" value="{{ old('title_ru') }}">
                    @error('title_ru')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3 col-md-4">
                    <label class="form-label" for="intro_az">Intro(AZ)</label>
                    <textarea name="intro_az" id="intro_az" class="form-control @error('intro_az') is-invalid  @enderror" cols="30" rows="4">{{ old('intro_az') }}</textarea>
                    @error('intro_az')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3 col-md-4">
                    <label class="form-label" for="intro_en">Intro(EN)</label>
                    <textarea name="intro_en" id="intro_en" class="form-control @error('intro_en') is-invalid  @enderror" cols="30" rows="4">{{ old('intro_en') }}</textarea>
                    @error('intro_en')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3 col-md-4">
                    <label class="form-label" for="intro_ru">Intro(RU)</label>
                    <textarea name="intro_ru" id="intro_ru" class="form-control @error('intro_ru') is-invalid  @enderror" cols="30" rows="4">{{ old('intro_ru') }}</textarea>
                    @error('intro_ru')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3 col-md-4">
                    <label class="form-label" for="text_az">Text(AZ)</label>
                    <textarea name="text_az" id="text_az" class="form-control @error('text_az') is-invalid  @enderror" cols="30" rows="4">{{ old('text_az') }}</textarea>
                    @error('text_az')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3 col-md-4">
                    <label class="form-label" for="text_en">Text(EN)</label>
                    <textarea name="text_en" id="text_en" class="form-control @error('text_en') is-invalid  @enderror" cols="30" rows="4">{{ old('text_en') }}</textarea>
                    @error('text_en')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3 col-md-4">
                    <label class="form-label" for="text_ru">Text(RU)</label>
                    <textarea name="text_ru" id="text_ru" class="form-control @error('text_ru') is-invalid  @enderror" cols="30" rows="4">{{ old('text_ru') }}</textarea>
                    @error('text_ru')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group mb-3">
                <button class="btn btn-primary float-end">ADD</button>
            </div>
            </form>
            </div>
        </div>
        @include('back.includes.footer')
    </div>
@endsection

@section('js')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        $(document).ready(function () {
            CKEDITOR.replace('text_az',{
                language: '{{ app()->getLocale() }}',
                filebrowserImageBrowseUrl: $('#rootUrl').val()+'/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: $('#rootUrl').val()+'/laravel-filemanager/upload?type=Images&_token={!! csrf_token() !!}',
                filebrowserBrowseUrl: $('#rootUrl').val()+'/laravel-filemanager?type=Files',
                filebrowserUploadUrl: $('#rootUrl').val()+'/laravel-filemanager/upload?type=Files&_token={!! csrf_token() !!}',
                toolbarGroups :[
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
                    { name: 'insert' },
                    { name: 'forms' },
                    { name: 'styles' },
                    { name: 'colors' },
                    { name: 'tools'}
                ],
            });

            CKEDITOR.replace('text_en',{
                language: '{{ app()->getLocale() }}',
                filebrowserImageBrowseUrl: $('#rootUrl').val()+'/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: $('#rootUrl').val()+'/laravel-filemanager/upload?type=Images&_token={!! csrf_token() !!}',
                filebrowserBrowseUrl: $('#rootUrl').val()+'/laravel-filemanager?type=Files',
                filebrowserUploadUrl: $('#rootUrl').val()+'/laravel-filemanager/upload?type=Files&_token={!! csrf_token() !!}',
                toolbarGroups :[
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
                    { name: 'insert' },
                    { name: 'forms' },
                    { name: 'styles' },
                    { name: 'colors' },
                    { name: 'tools'}
                ],
            });

            CKEDITOR.replace('text_ru',{
                language: '{{ app()->getLocale() }}',
                filebrowserImageBrowseUrl: $('#rootUrl').val()+'/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: $('#rootUrl').val()+'/laravel-filemanager/upload?type=Images&_token={!! csrf_token() !!}',
                filebrowserBrowseUrl: $('#rootUrl').val()+'/laravel-filemanager?type=Files',
                filebrowserUploadUrl: $('#rootUrl').val()+'/laravel-filemanager/upload?type=Files&_token={!! csrf_token() !!}',
                toolbarGroups :[
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
                    { name: 'insert' },
                    { name: 'forms' },
                    { name: 'styles' },
                    { name: 'colors' },
                    { name: 'tools'}
                ],
            });
        });
    </script>
@endsection
