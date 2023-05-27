<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class LoginCustomController extends Controller
{
    public function login()
    {
        return view('user.login-user');
    }   

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/')
                        ->withSuccess('Signed in');
                        //var_dump($credentials);
        }
        return redirect("login-user")->withSuccess('Login details are not valid');
    }

    public function registration()
    {
        return view('user.registration-user');
    }
      
    public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();

         $check = $this->create($data);
         
         return redirect("login-user")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'phone' => $data['phone'],
        'email' => $data['email'],
        'loaitk' => 2,
        'status' => 2,
        'password' => Hash::make($data['password'])
      ]);
    }    
    
    // public function dashboard()
    // {
    //     if(Auth::check()){
    //         //lấy thông tin user hiện đang đăng nhập
    //         $user = Auth::user();
    //         return view('/', ['data' =>$user]);

    //     }
  
    //     return redirect("login-user")->withSuccess('You are not allowed to access');
    // }
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('home');
    }
}
