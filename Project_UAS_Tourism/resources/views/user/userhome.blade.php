@extends('layout/master')

@section('title', 'Home')

@section('content')
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{{ $message }}</strong>
    </div>
    @endif
    
    <div class="mx-auto" style="width: 45rem; padding: 50px;" >
        
        <h2 class="display-4">Hello, {{Auth::user()->name}}!</h2>
        <p class="lead">Welcome back to the blog! Feel free to post your newest content.</p>
        <hr class="my-4">
        
    </div>

@endsection