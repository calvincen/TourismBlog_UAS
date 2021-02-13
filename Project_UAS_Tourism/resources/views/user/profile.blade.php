@extends('layout/master')

@section('title', 'Profile')

@section('content')

@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif
<div class="container w-50 mt-4 rounded-lg bg-light" style="padding: 0;">
    <div class="card text-center">
        <div class="card-header text-left">
          Update Profile
        </div>
        <form class="mx-auto mt-3" method="post" action="/profile">
            @csrf
            <div class="form-group row justify-content-md-center">
                <label for="UserName" class="pl-0 text-right col-sm-5 col-form-label pr-0">Name</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control @error('UserName') is-invalid @enderror" id="UserName" name="UserName">
                </div>
                @error('UserName')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group row justify-content-md-center">
                <label for="UserEmail" class="pl-0 text-right col-sm-5 col-form-label pr-0">E-Mail</label>
                <div class="col-sm-7">
                    <input type="email" class="form-control @error('UserEmail') is-invalid @enderror" id="UserEmail" name="UserEmail">
                </div>
                @error('UserEmail')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group row justify-content-md-center">
                <label for="PhoneNumber" class="pl-0 text-right col-sm-5 col-form-label pr-0">Phone</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control @error('PhoneNumber') is-invalid @enderror" id="PhoneNumber" name="PhoneNumber">
                </div>
                @error('PhoneNumber')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group row justify-content-md-center">
                <button type="submit" class="btn btn-dark w-auto">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection