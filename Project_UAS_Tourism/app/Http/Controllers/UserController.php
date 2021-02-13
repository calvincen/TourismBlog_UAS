<?php

namespace App\Http\Controllers;

use App\User;
use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    public function userHomePage(){
        $auth = Auth::check();
        return view('user/userhome', compact('auth'));
    }

    public function registerPage(){
        $auth = Auth::check();
        return view('user/register', compact('auth'));
    }

    public function registerCheck(Request $request){
        $request->validate([
            'UserName' => 'required',
            'UserEmail' => 'required|unique:users,email',
            'PhoneNumber' => 'required',
            'UserPassword' => 'required|same:ConfirmPassword|min:5',
            'ConfirmPassword' => 'required|same:UserPassword|min:5'
        ]);

       $user =  User::create([
            'name' => $request->UserName,
            'email' => $request->UserEmail,
            'password' => bcrypt($request->UserPassword),
            'phone' => $request->PhoneNumber,
            'role' => 'user'
        ]);

        return redirect('/login')->with('success', 'Register Complete!');
    }

    public function loginPage(){
        $auth = Auth::check();
        return view('user/login', compact('auth'));
    }

    public function loginCheck(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:5'
        ]);

        $credentials = $request->only('email', 'password');
        
        if(Auth::attempt($credentials)){
            $user = User::where('email', '=', $request->email)->first();

            if ($user->role != strtolower($request->loginAs)) {
                Auth::logout();
                return redirect('/login')->with('error', 'Login Failed, Please try again!');
            }
            if($user->role == "user"){
                return redirect('/home/users')->with('success', 'Login Success!');
            }else{
                return redirect('/home/admin')->with('success', 'Login Success!');;
            }

        }else{
            return redirect('/login')->with('error', 'Login Failed, Please try again!');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

    public function profilePage(){
        $auth = Auth::check();
        return view('user/profile', compact('auth'));
    } 

    public function updateProfile(Request $request){
        $request->validate([
            'UserName' => 'required',
            'UserEmail' => 'required',
            'PhoneNumber' => 'required'
        ]);

        $user = Auth::user();
        User::where('id','=',$user->id)->update([
            'name' => $request->UserName,
            'email' => $request->UserEmail,
            'phone' => $request->PhoneNumber
        ]);
       
        return redirect('/profile')->with('success', 'Profile Updated!');
    }

    public function blogPage(){
        $auth = Auth::check();
        $user = Auth::user();

        $article = Article::where('user_id', '=', $user->id)->get();

        return view('user/blog', compact('auth', 'article'));
    }

    public function blogDelete($id){
        $user = Article::where('id','=',$id)->first();
        $user->delete();

        return redirect('/blog')->with('success', 'Delete Success!');
    }

    public function createBlogPage(){
        $auth = Auth::check();

        return view('user/createblog', compact('auth'));
    }

    public function createNewBlog(Request $request){
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'image' => 'required|max:10000|mimes:jpeg,jpg,png',
            'description' => 'required'
        ]);

        $cate = $request->category;
        $category = Category::where('name','=',$cate)->first();
        $cate_id = $category->id;

        $imagepath = $request->file('image')->store('images', 'public');
        $user = Auth::user();

        $article = Article::create([
            'title' => $request->title,
            'user_id' => $user->id,
            'category_id' => $cate_id,
            'description' => $request->description,
            'image' => substr($imagepath, 7)
        ]);

        return redirect('/blog/create')->with('success', 'Create New Blog Success!');
    }

    public function aboutUsPage(){
        $auth = Auth::check();

        return view('user/aboutus', compact('auth'));
    }
}
