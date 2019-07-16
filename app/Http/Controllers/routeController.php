<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\sendMail;
include '../vendor/autoload.php';
use YoutubeDl\YoutubeDl;

class routeController extends Controller
{
    public function index(){
        return view('index');
    }

    public function sendMail(Request $request){
       $email=$request->get('email');
       $link=$request->get('url');
      
       sendMail::dispatch($email,$link);
        
        return redirect()->route('success');
    }
    
    public function success(){
        return view('success');
    }

    public function download($filename){
    $file = 'public/converted'.$filename;
    return Response::download($file);
    }
}
