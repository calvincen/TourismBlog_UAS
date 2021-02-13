@extends('layout/master')

@section('title', 'All Articles')

@section('content')
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block" style="margin: 30px;">
      <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{{ $message }}</strong>
    </div>
    @endif
    
    <div class="container py-4 my-5 border-primary shadow rounded bg-light">
    <h3 class="text-center mb-5">Articles</h3>
    <table class="table">
        <thead>
        <tr>
            <th class="text-center" scope="col">Article Title</th>
            <th class="text-center" scope="col">Article Author</th>
            <th class="text-center" scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($article as $a)
                <tr>
                    <td class="text-center">{{$a->title}}</td>
                    <td class="text-center">{{$a->users_name}}</td>
                    <td class="text-center">
                        <form action="/admin/posts/delete/{{$a->article_id}}" method="post" class="d-inline">
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