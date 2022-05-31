@extends('back.layout.master')

@section('title') Menus @endsection

@section('css')

@endsection

@section('content')
    <div class="page">
        @include('back.includes.menu')

        <div class="content">
            <div class="mb-3 col-md-8 offset-md-2">
                <a href="{{ route('about.create') }}" class="btn btn-primary w-100">Add</a>
                <table class="table table-vcenter table-mobile-md card-table">
                    <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Name(AZ)</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    @foreach($services as $item)
                        <tr>
                            <td data-label="Photo"><img src="{{ asset('files/about/'.$item->src) }}" style="width: 100px" alt=""></td>
                            <td data-label="Name(AZ)">{!! $item->text_az !!}</td>
                            <td data-label="Action">
                                <div class="btn-list flex-nowrap">
                                    <a href="{{ route('about.edit',$item->id) }}" class="btn btn-primary"><i class="fa fa-pen"></i></a>
                                    <form action="{{ route('about.destroy',$item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit" onclick="return confirm('You are sure you want to delete it?')"><i class="fa fa-times"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        @include('back.includes.footer')
    </div>
@endsection

@section('js')
{{--    <script type="text/javascript">--}}
{{--        var elems = document.getElementsByClassName('confirmation');--}}
{{--        var confirmIt = function (e) {--}}
{{--            if (!confirm('Are you sure?')) e.preventDefault();--}}
{{--        };--}}
{{--        for (var i = 0, l = elems.length; i < l; i++) {--}}
{{--            elems[i].addEventListener('click', confirmIt, false);--}}
{{--        }--}}
{{--    </script>--}}
@endsection
