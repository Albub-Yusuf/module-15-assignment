@extends('Layout.master')
    
@section('content')
   <div class="container" style="min-height:82vh">
        <div class="form-container py-5 my-5">
            <div class="panel">
            <h3>Contact Us </h3>
            </div>    
        <br>
            <form action="/contact" method="POST" class="form-control">
                @csrf
                <div class="form-group">
                <label for="name">Enter Your Name</label>
                <br>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name here..." />
                </div>
                <br>
                <div class="form-group">
                <label for="email">Enter your Email</label>
                <br>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email here..." />
                </div>
                <br>
                <div class="form-group">
                <label for="message">Share your thougts</label>
                <br>
                <textarea type="text" class="form-control" id="message" name="message" placeholder="Enter your message here..."></textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
   </div>
@endsection
