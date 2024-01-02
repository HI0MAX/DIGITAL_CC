@extends('layout/layout0')
@section('title','login')
@section('content')


<span class="box-001">
<div class="box-002">
    <div class="container">

        <form action="{{ route('login') }}" method="POST" class="ms-auto me-auto mt-auto" style="width: 500px">
        <img src="{{ asset('images\esith-logo.png') }}" alt="ESITH" style="width: 600px; height: 100px;">


        <div class="mt-5">

            
            @if(session()->has ('error'))
            <div class="alert alert-danger">{{session ('error')}}</div> 
            @endif

            @if(session()->has ('success'))
            <div class="alert alert-success">{{session('success')}}</div> 
            @endif
        </div>

            @csrf
            
            <div class="mb-3">
                <label class="form-label"><b>Email </label>
                <input type="email" class="form-control" name="email" placeholder="email@esith.net" >
            </div>

            <div class="mb-3">
                <label class="form-label"><b>Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input " id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" value="Login" class="btn btn-primary" style="width: 500px;">Submit</button>
        </form>

    </div>
</div>
</span>
@endsection