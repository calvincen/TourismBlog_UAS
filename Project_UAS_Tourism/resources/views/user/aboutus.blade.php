@extends('layout/master')

@section('title', 'About Us')

@section('content')
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{{ $message }}</strong>
    </div>
    @endif
    
    <div class="mx-auto" style="width: 45rem; padding: 50px;" >
        
        <h2 class="display-4">About Us</h2>
        <p class="lead text-justify">We are a recently established community-tourism blog which shares many interesting stories for various tourism destination in Indonesia. All of these stories are written to help all travelers accross the globe to find various interesting tourism destination in Indonesia.</p>
        <hr class="my-4">
        
    </div>

@endsection