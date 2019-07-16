@extends('layouts.layout')
@section('content')
    <div class="jumbotron ">
    <h1>Online converter</h1>
    <form action="sendMail" method="post">
        @csrf
        <div class="input-group mb-3">
        <input type="text" class="form-control" name="url" id="url" placeholder="url: ">
        <input type="text" class="form-control" name="email" id="email" placeholder="email: ">
            <div class="input-group-append">
                <button class="btn btn-outline-success">START</button> 
            </div>
        </div>
        </form>
    </div>
@endsection


