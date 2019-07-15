@extends('layouts.layout')
@section('content')
    <div class="jumbotron ">
    <h1>Online converter</h1>
    <form action="sendMail" method="post">
        <div class="input-group mb-3">
        <input type="text" class="form-control" id="url" placeholder="url: ">
        <input type="text" class="form-control" id="email" placeholder="email: ">
            <div class="input-group-append">
                <button class="btn btn-outline-success" onClick="sendInfo()">START</button> 
            </div>
        </div>
        </form>
    </div>
@endsection


