<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function adminHomePage(){
        $auth = Auth::check();
        return view('admin/adminhome', compact('auth'));
    }

    public function articlesPage(){
        $auth = Auth::check();

        $article = Article::join('users','users.id','=','articles.user_id') 
        ->select('articles.*', 'users.*', 'users.id as user_id', 'articles.id as article_id', 'users.name as users_name')
        ->get();

        return view('admin/admin', compact('auth', 'article'));
    }

    public function articleDelete($id){
        $user = Article::where('id','=',$id)->first();
        $user->delete();

        return redirect('/admin/posts/')->with('success', 'Delete Success!');
    }

    public function userAdminPage(){
        $auth = Auth::check();
        $users = User::where('role','=', 'user')->get();

        return view('admin/user', compact('auth', 'users'));
    }

    public function userAdminDelete($id){
        $user = User::where('id','=',$id)->first();
        $user->delete();

        return redirect('/admin/users/')->with('success', 'Delete Success!');
    }
}
