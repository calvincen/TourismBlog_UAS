@extends('layout/master')

@section('title', 'Users')

@section('content')
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block" style="margin: 30px;">
      <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{{ $message }}</strong>
    </div>
    @endif
    
    <div class="container py-4 my-5 border-primary shadow rounded bg-light">
    <h3 class="text-center mb-5">Users</h3>
    <table class="table">
        <thead>
        <tr>
            <th class="text-center" scope="col">Name</th>
            <th class="text-center" scope="col">Email</th>
            <th class="text-center" scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($users as $i)
                <tr>
                    <td class="text-center">{{$i->name}}</td>
                    <td class="text-center">{{$i->email}}</td>
                    <td class="text-center">
                        <form action="/admin/user/delete/{{$i->id}}" method="post" class="d-inline">
                            {{method_field('delete')}}
                            @csrf
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection