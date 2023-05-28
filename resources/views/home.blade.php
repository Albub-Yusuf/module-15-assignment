@extends('Layout.master')
    
@section('content')
   <div class="container" style="min-height:82vh">
        <div class="form-container py-5 my-5">
            <div class="panel">
            <h3>User Information: </h3>
            </div>    
        <br>
            <form action="/check" method="POST" class="form-control">
                @csrf
                <div class="form-group">
                      @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                 @foreach ($errors->all() as $error)
                                     <li>{{ $error }}</li>
                                 @endforeach
                            </ul>
                                </div>
                     @endif
                <label for="name">Enter User Name</label>
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
                <label for="password">Enter User Password</label>
                <br>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password here..."  />
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
   </div>
@endsection
