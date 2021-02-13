@extends('layout/master')

@section('title', 'Admin Home')

@section('content')
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{{ $message }}</strong>
    </div>
    @endif
    
    <div class="mx-auto" style="width: 45rem; padding: 50px;" >
        
        <h1 class="display-4">Welcome, Admin!</h1>
        <p class="lead">Hello {{Auth::user()->name}}, This is the admin's homepage. Use it wisely.</p>
        <hr class="my-4">
        
    </div>

@endsection