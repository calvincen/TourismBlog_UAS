@extends('layout/master')

@section('title', 'Article Details')

@section('content')

    <div class="container pt-4 py-3">
        <Button class="btn btn-light"><a href="/">Back</a></Button>
    </div>

    <div class="container pt-4 py-3">
        <h4 class="font-weight-bold text-center">Article Detail</h1>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{{ $message }}</strong>
    </div>
    @endif

    <div class="card mx-auto" style="width: 45rem;">
        
        <img class="card-img-top" src="{{ asset('storage/images/'.$article->image) }}" alt="image">
        <div class="card-body">
            <h5 class="card-title">{{$article->title}}</h5>
            <p class="card-text text-justify">{{$article->description}}</p>
        </div>
        
        
    </div>
 
    </div>
@endsection