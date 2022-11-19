<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Models\User;


class AdminController extends Controller
{
    public function showLogin(){
        return view('/adminlogin');
    }

    public function login(Request $request){
        $user = User::where("email", "=", $request->email)->first();
        if ($user){
            if (Hash::check($request->pw, $user -> password)){
                if ($user -> role == "admin"){
                    $request->session()->put('id', $user -> customer_ID);
                    $request->session()->put('email', $user -> email);
                    $request->session()->put('role', $user -> role);
                    $request->session()->put('first_name', $user -> first_name);
                    $request->session()->put('last_name', $user -> last_name);

                    return redirect('admin/statistics');
                }else{
                    return redirect("/login/admin")->with('fail', 'Not an admin account!');
                }
            }else{
                return redirect("/login/admin")->with('fail', 'Incorrect password!');
            }
        }else{
            return redirect("/login/admin")->with('fail', 'No account is registered to the email!');
        }

    }
    public function logout(){
        if (Session::has('id')){
            Session::pull('id');
            Session::pull('email');
            Session::pull('role');
            Session::pull('first_name');
            Session::pull('last_name');
            return redirect('/login/admin');
        }
    }
}
