@extends('layout/master')

@section('title', 'Create Blog')

@section('content')

@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

<div class="container w-50 mt-4 rounded-lg bg-light" style="padding: 0;">
    <div class="card text-center">
        <div class="card-header text-left">New Blog</div>

        <form class="mx-auto mt-3" method="post" action="/blog/create" enctype="multipart/form-data">
            @csrf
            <div class="form-group row justify-content-md-center">
                <label for="title" class="">Title:</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Enter article title">
                @error('title')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group row justify-content-md-center">
                <label for="category">Category:</label>
                <select class="form-control" id="category" name="category">
                    <option>Beach</option>
                    <option>Mountain</option>
                    <option>City</option>
                </select>
                @error('category')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group row justify-content-md-center">
                <label for="image" class="">Image:</label>
                <input type="file" class="form-control-file" id="image" name="image">
                @error('image')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group row justify-content-md-center">
                <label for="description">Story:</label>
                <textarea class="form-control" rows="8" id="description" name="description" placeholder="Enter story description"></textarea>
                @error('description')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group row justify-content-md-center">
                <button type="submit" class="btn btn-dark w-auto">Create</button>
            </div>
        </form>
    </div>
</div>
@endsection