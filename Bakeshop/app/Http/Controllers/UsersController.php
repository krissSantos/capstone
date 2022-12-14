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


class UsersController extends Controller
{
    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|unique:users,email',
            'pw' => 'required|min:6',
            'conpw' => 'required|same:pw',
            'fname' => 'required|min:2'
        ], [],
        [
            'pw' => "Password",
            "conpw" => "Confirm Password",
            'fname' => "First Name",
            'lname' => "Last Name",
        ]);
        $this->validate($request, [
            'email' => 'required|unique:users,email',
            'pw' => 'required|min:6',
            'conpw' => 'required|same:pw'
        ]);


        $user = new User;
        $user->first_name = $request->input('fname');
        $user->last_name = $request->input('lname');
        $user->email = $request->input('email');
        $user->password =  Hash::make($request->input('pw'));
        $user->role = "user";
        $user->save();

        return redirect("/login/user");
    }

    public function showLogin(){
        return view('/login');
    }

    public function userLogin(Request $request){
        $user = User::where("email", "=", $request->email)->first();
        if ($user){
            if (Hash::check($request->pw, $user -> password)){
                if ($user -> role == "user"){
                $request->session()->put('id', $user -> customer_ID);
                $request->session()->put('email', $user -> email);
                $request->session()->put('role', $user -> role);
                $request->session()->put('first_name', $user -> first_name);
                $request->session()->put('last_name', $user -> last_name);

                return redirect('/');
            }else{
                return redirect("/login/user")->with('fail', 'Not an user account!');
            }
        }else{
            return redirect("/login/user")->with('fail', 'Incorrect password!');
        }
        }else{
        return redirect("/login/user")->with('fail', 'No account is registered to the email!');
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