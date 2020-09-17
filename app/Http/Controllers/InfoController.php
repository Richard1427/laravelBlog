<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InfoController extends Controller
{
    public function info(){
        if (empty(Auth::user())){
            return view('auth/login');
        }else{
            $data = Auth::user();
            return view('info',[
                'data' => $data,
            ]);
        }
    }
}
