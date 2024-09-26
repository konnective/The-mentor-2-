<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function index()
    {

        return view('admin.index');
    }
}