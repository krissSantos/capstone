<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Http\Controllers\Student;

class UsersController extends Controller
{
    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $user = new User;
        $user->first_name = $request->input('fname');
        $user->last_name = $request->input('lname');
        $user->email = $request->input('email');
        $user->password =  Hash::make($request->input('pw'));
        $user->role = "user";
        $user->save();

        return redirect("/");
    }

    public function showLogin(){
        return view('/login');
    }

    public function userLogin(Request $request){
        $user = User::where("email", "=", $request->email)->first();
        if ($user){
            if (Hash::check($request->pw, $user -> password)){
                $request->session()->put('id', $user -> customer_ID);
                $request->session()->put('email', $user -> email);
                $request->session()->put('role', $user -> role);
                $request->session()->put('first_name', $user -> first_name);
                $request->session()->put('last_name', $user -> last_name);

                return redirect('/menu');
            }else{
                return "Wrong password!";
            }
        }else{
            return "No registered email!";
        }
    }

    public function showProfile(){
        if (Session::get("id")){
            return view('profile');
        }else{
            return "Not logged in!";
        }
    }

    public function logout(){
        if (Session::has('id')){
            Session::pull('id');
            Session::pull('email');
            Session::pull('role');
            Session::pull('first_name');
            Session::pull('last_name');
            Session::pull('customer_ID');
            return redirect('/');
        }
    }
}