@extends('back.layout.master')

@section('title') Menus @endsection

@section('css')

@endsection

@section('content')
    <div class="page">
        @include('back.includes.menu')

        <div class="content">
            <div class="mb-3 col-md-8 offset-md-2">
                <a href="{{ route('service.create') }}" class="btn btn-primary w-100">Add</a>
                <table class="table table-vcenter table-mobile-md card-table">
                    <thead>
                    <tr>
                        <th>Name(AZ)</th>
                        <th>Name(EN)</th>
                        <th>Name(RU)</th>
                        <th>On Home</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    @foreach($services as $item)
                        <tr>
                            <td data-label="Name(AZ)">{{ $item->name_az }}</td>
                            <td data-label="Name(EN)">{{ $item->name_en }}</td>
                            <td data-label="Name(RU)">{{ $item->name_ru }}</td>
                            <td data-label="On Home">{!! $item->on_home ? '<a href="'.route('service.changer',['id'=>$item->id]).'" class="btn btn-primary"><i class="fa fa-check"></i></a>' : '<a href="'.route('service.changer',['id'=>$item->id]).'" class="btn btn-danger"><i class="fa fa-times"></i></a>' !!}</td>
                            <td data-label="Action">
                                <div class="btn-list flex-nowrap">
                                    <a href="{{ route('service.edit',$item->id) }}" class="btn btn-primary"><i class="fa fa-pen"></i></a>
                                    <form action="{{ route('service.destroy',$item->id) }}" method="POST">
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
