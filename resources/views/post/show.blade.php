@extends('Layout.master')

@section('content')

    <div class="container my-5 py-5" style="min-height:52vh;">    

        <div class="row">
            <div class="col-12">
            <section class="singlePost_section_page">
    <div class="text-center text-primary">
        <h2>{{$postInfo->title}}</h2>
        <hr>
    </div>
    <div class="text-center text-primary">
        <h6>Author: {{$postInfo->author}}</h6>
    </div>


    <div class="post_card1">
         
           <div class="post_banner" style="width: 500px; height:500px; margin: 0 auto;">
                <img src="{{asset($postInfo->featured_image)}}" alt="POST IMAGE" width="100%;"><br><br>
            </div>
            <div class="contents">
               <p>
                    {{$postInfo->description}}
               </p>
            </div>
 </section>
            </div>
        </div>

    </div>

@endsection