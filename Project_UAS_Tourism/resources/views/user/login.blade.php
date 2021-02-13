@extends('layout/master')

@section('title', 'Login')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
<div class="container w-50 mt-4 rounded-lg bg-light" style="padding: 0;">
    <div class="card text-center">
        <div class="card-header text-left">Login</div>

        <form class="mx-auto mt-3"  method="post" action="/login">
            @csrf
            <div class="form-group row justify-content-md-center">
                <label for="loginAs" class="font-weight-bold">Login as:</label>
                <select class="form-control" id="loginAs" name="loginAs">
                    <option>User</option>
                    <option>Admin</option>
                </select>
            </div>

            <div class="form-group row justify-content-md-center">
                <label for="email" class="px-0 text-right col-sm-4 col-form-label">E-Mail</label>
                <div class="col-sm-7">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="User Email">
                </div>
                @error('useremail')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group row justify-content-md-center">
                <label for="password" class="px-0 text-right col-sm-4 col-form-label">Password</label>
                <div class="col-sm-7">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                </div>
                @error('password')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group row justify-content-md-center">
                <button type="submit" class="btn btn-dark w-auto">Login</button>
            </div>
        </form>
    </div>
</div>
@endsection