@extends('layouts.app')

@section('content')
    <div class="container col-6">
        <div class="card">
            <div class="card-body">
                <table class=" table ">
                    <tr>
                        <td> File Title</td>
                        <td> Action </td>
                    </tr>
                    @foreach ($files as $item)
                        <tr>
                            <td> {{ $item->title }} </td>
                            <td>
                                <a class="btn btn-primary" href="{{route("file.show" , $item->id)}}"> SHOW </a>
                                <a class="btn btn-warning" href="{{route("file.edit" , $item->id)}}"> EDIT </a>
                                <a class="btn btn-danger" href="{{route("file.destroy" , $item->id)}}"> DELETE </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
