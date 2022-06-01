@extends('back.layout.master')

@section('title') Presentations @endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
@endsection

@section('content')
    <div class="page">
        @include('back.includes.menu')

        <div class="content">
            <div class="col-10 offset-md-1">
                <div class="card">
                    <a href="{{ route('presentation.create') }}" class="btn btn-primary">ADD</a>
                    <div class="table-responsive">
                        <table
                            class="table table-vcenter table-mobile-md card-table" id="mehsullar">
                            <thead>
                            <tr>
                                <th>Cover</th>
                                <th>Name(AZ)</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($presentations as $item)
                                <tr>
                                    <td><img src="{{ asset('files/presentations/covers/'.$item->src) }}" style="width: 100px" alt=""></td>
                                    <td>{!! $item->name_az !!}</td>
                                    <td>
                                        <div class="btn-list flex-nowrap">
                                            <a href="{{ route('presentation.edit',$item->id) }}" class="btn btn-primary"><i class="fa fa-pen"></i></a>
                                            <form action="{{ route('presentation.destroy',$item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit" onclick="return confirm('You are sure you want to delete it?')"><i class="fa fa-times"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        @include('back.includes.footer')
    </div>
@endsection

@section('js')

@endsection
