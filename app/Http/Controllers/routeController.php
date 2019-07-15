<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\sendMail;

class routeController extends Controller
{
    public function index(){
        return view('index');
    }

    public function sendMail(Request $request){
        sendMail::dispatch($request);
        
        return view('success');
    }
}
