@extends('layout/master')

@section('title', 'Categories')

@section('content')

    <div class="container pt-4 py-3">
        <Button class="btn btn-light"><a href="/">Back</a></Button>
    </div>

    <div class="container pt-4 py-3">
        <h4 class="font-weight-bold text-center">Category : {{$category->name}} </h1>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{{ $message }}</strong>
    </div>
    @endif

    <div class="wrapper pb-5">
        <div class="row justify-content-md-center mx-auto" >
            @foreach($article as $a)   
                <div class="col-lg-3 text-center p-0 mt-4 ml-4" id="border">
                    <div class="p-2 mx-auto">
                        <img class="img p-0 m-0mx-auto" style="width:290px; height: 200px;" src="{{ asset('storage/images/'.$a->image) }}" alt="image">
                        <h5 class="card-title">{{$a->title}}</h5>
                        <span>
                            <p class="text-left">{{substr($a->description, 0,70) }}
                                <a href="/article/{{$a->article_id}}" class="card-link">full story</a>
                            </p>
                        </span>
                        <p class="text-left">Category : 
                            <a href="/article/category/{{$a->cate_name}}">{{$a->name}}</a>
                        </p> 
                    </div>
                </div>
            @endforeach
        </div>
        <div class="paginate mx-auto">
            {{$article->withQueryString()->links()}}
        </div>  
 
    </div>
@endsection