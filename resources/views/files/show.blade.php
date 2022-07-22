@extends('layouts.app')

@section('content')
    <div class="container col-6">
        <div class="card">
            File Title : {{ $file->title }}
            <div class="card-body">
                File Description : {{ $file->description }}
                File Name : {{ $file->file }}
            </div>
            <a href="{{route("file.download",$file->id)}}" class="btn btn-success"> DOWNLOAD </a>
        </div>
    </div>
@endsection
