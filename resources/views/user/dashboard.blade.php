@extends('layout/layout0')
@section('title','form')
@section('content')


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


<span class="box-001">

    <div class="containers">
        <div class="box">
            <img src="{{ asset('images\esith-logo.png') }}" alt="ESITH" style="width: 600px; height: 100px;">
                <div class="user-info">
                <p>Email: <b>{{ auth()->user()->email }}
                <form action="/logout" method="GET" class="ms-auto">
                <button class="btn btn-primary" type="submit">LOGOUT</button>
                </form>

                </div>

        </div>
    </div>

<div class="box-002">


    <div class="container">

<!-- 
        <div class="mt-5">
            @if($errors->any())
            <div class="col-12">
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div> 
                @endforeach
            </div>
            @endif
            
            @if(session()->has ('error'))
            <div class="alert alert-danger">{{session ('error')}}</div> 
            @endif

            @if(session()->has ('success'))
            <div class="alert alert-success">{{session('success')}}</div> 
            @endif
        </div>
-->


        <form action="{{ route('insertData') }}" method="POST"  class="ms-auto me-auto mt-auto" style="width: 500px">
            @csrf

            <fieldset enabled>


            <div class="mt-5">            
                @if(session()->has ('message'))
                <div class="alert alert-success">{{session ('message')}}</div> 
                @endif
                @if(session()->has ('success'))
                <div class="alert alert-danger">{{session('success')}}</div> 
                @endif
            </div>



                <legend>printing details </legend>
                
                <div class="mb-3">        
                    <label  class="form-label">User : </label>
                    <input type="text" class="form-control" name="user" value="{{ auth()->user()->name }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email </label>
                    <input type="text" class="form-control" name="email" value="{{auth()->user()->email}}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Paper Size: </label>
                    <select id="disabledSelect" class="form-select" name="paper_size">
                        <option>A4</option>
                        <option>A3</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Color Settings: </label>
                    <select id="disabledSelect" class="form-select" name="color_settings">
                        <option>BLACK/WHITE</option>
                        <option>COLORED</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="numberInput" class="form-label">Number of Copies:</label>
                    <input type="number" class="form-control" id="numberInput" name="number_copies" placeholder="Enter a number">
                </div>

                <div class="mb-3">
                    <label class="form-label">Print Quality:</label>
                    <select id="disabledSelect" class="form-select" name="print_quality">
                        <option>STANDARD</option>
                        <option>ECONOMIC</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label   class="form-label">PDF files :</label>
                    <input class="form-control" type="file"  name="file" multiple>
                </div>

                <button id="sub" type="submit" class="btn btn-primary" style="width: 500px;">Submit</button>

            </fieldset>
        </form>

    </div>
    </div>
</span>



@endsection







