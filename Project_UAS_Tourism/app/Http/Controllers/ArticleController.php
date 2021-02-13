<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ArticleController extends Controller
{
    public function index(){
        $auth = Auth::check();
        
        $article = Article::join('categories','categories.id','=','articles.category_id') 
        ->where('articles.id','!=','0')
        ->select('articles.*', 'categories.*', 'categories.id as cate_id', 'articles.id as article_id', 'categories.name as cate_name')
        ->paginate(6);
        
        return view('user/home',compact('article', 'auth'));
    }

    public function showDetail($id){
        $auth = Auth::check();
        
        $article = Article::where('id', '=', $id)->first();
       
        return view('user/article', compact('article', 'auth'));
    }

    public function showCategory($name){
        $auth = Auth::check();

        $article = Article::join('categories','categories.id','=','articles.category_id') 
        ->where('categories.name','=', $name)
        ->select('articles.*', 'categories.*', 'categories.id as cate_id', 'articles.id as article_id', 'categories.name as cate_name')
        ->paginate(6);

        $category = Category::where('name', '=', $name)->first();
        
        return view('user/category', compact('article', 'category', 'auth'));
    }

}