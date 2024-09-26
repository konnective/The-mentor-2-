<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class DashboardController extends Controller
{
    //
    public function login(Request $req)
    {
        return view('admin.login');
    }
    public function loginCheck(Request $req)
    {

        $creds = $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($creds)) {
            return view('admin.index');
        }
    }
    public function register(Request $req)
    {

        return view('admin.register');

    }
    public function registration(Request $req)
    {
        $creds = $req->validate([
            'name' => 'required',
            'username' => 'required|email',
            'password' => 'required',
        ]);

        $input['name'] = $req->name;
        $input['email'] = $req->username;
        $input['password'] = Hash::make($req->password);



        User::create($input);
        return redirect()->route('admin.dash');
        

    }
    public function index()
    {

        return view('admin.index');
    }
}