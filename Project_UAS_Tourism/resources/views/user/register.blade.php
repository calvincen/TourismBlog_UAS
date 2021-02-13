@extends('layout/master')

@section('title', 'Register')

@section('content')
<div class="container w-50 mt-4 rounded-lg bg-light" style="padding: 0;">
    <div class="card text-center">
        <div class="card-header text-left">
          Register
        </div>
        <form class="mx-auto mt-3" method="post" action="/register">
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
                <label for="UserEmail" class="pl-0 text-right col-sm-5 col-form-label pr-0">E-Mail Address</label>
                <div class="col-sm-7">
                    <input type="email" class="form-control @error('UserEmail') is-invalid @enderror" id="UserEmail" name="UserEmail">
                </div>
                @error('UserEmail')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group row justify-content-md-center">
                <label for="PhoneNumber" class="pl-0 text-right col-sm-5 col-form-label pr-0">Phone Number</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control @error('PhoneNumber') is-invalid @enderror" id="PhoneNumber" name="PhoneNumber">
                </div>
                @error('PhoneNumber')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group row justify-content-md-center">
                <label for="UserPassword" class="pl-0 text-right col-sm-5 col-form-label pr-0">Password</label>
                <div class="col-sm-7">
                    <input type="password" class="form-control @error('UserPassword') is-invalid @enderror" id="UserPassword" name="UserPassword">
                </div>
                @error('UserPassword')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group row justify-content-md-center">
                <label for="ConfirmPassword" class="pl-0 text-right col-sm-5 col-form-label pr-0">Confirm Password</label>
                <div class="col-sm-7">
                    <input type="password" class="form-control @error('ConfirmPassword') is-invalid @enderror" id="ConfPassword" name="ConfirmPassword">
                </div>
                @error('ConfirmPassword')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group row justify-content-md-center">
                <button type="submit" class="btn btn-dark w-auto">Register</button>
            </div>
        </form>
    </div>
</div>
@endsection