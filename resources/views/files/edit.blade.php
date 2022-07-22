@extends('layouts.app')

@section('content')
    <div class="container col-6">
        <div class="card">
            <div class="card-body">
                @if (Session::has('done'))
                    <div class="alert alert-success">
                        {{ Session::get('done') }}
                    </div>
                @endif
                <form action="{{ route('file.update', $file->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for=""> File Title </label>
                        <input type="text" value="{{$file->title}}" class="form-control @error('title') is-invalid @enderror" name="title">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for=""> File Description </label>
                        <input type="text" value="{{$file->description}}" class="form-control @error('description') is-invalid @enderror"
                            name="description">
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for=""> File </label>
                        <input type="file" value="{{$file->file}}" class="form-control @error('file') is-invalid @enderror" name="fileInput">
                        @error('fileInput')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-success"> UPLOAD </button>
                </form>
            </div>
        </div>
    </div>
@endsection
