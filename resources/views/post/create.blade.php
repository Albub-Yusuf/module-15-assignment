@extends('Layout.master')


@section('content')


       <div class="container" style="min-height:82vh;">
        <div class="row py-5 my-5">
        <div class="col-lg-8 offset-2">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h3 class="text-center">{{$title}}</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('Post.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        @csrf
                                        
                        <label class="text-dark font-weight-medium" for="name">Title</label>
                        <div class="input-group mb-2">
                    
                            <input type="text" name="title" class="form-control" placeholder="Give a title" aria-label="title">
                        </div>

                    
                        <label class="text-dark font-weight-medium" for="price">Details</label>
                        <div class="input-group mb-2">

                        <textarea type="text" class="form-control" id="description" name="description" placeholder="Enter post description here..."></textarea>

                        </div>

                        <label class="text-dark font-weight-medium" for="author">Author</label>
                        <div class="input-group mb-2">
                    
                            <input type="text" name="author" class="form-control" placeholder="Enter author name" aria-label="author">
                        </div>


                        <div class="form-group">
                            <label class="">Featured Image</label>
                            <div>
                                @if(isset($postInfo) && $postInfo->featured_image!= null)

                                    <img src="{{asset($postInfo->featured_image)}}" alt="featured_image">
                                @endif
                                <input  input name="featured_image" type="file" class="form-control-file">
                                <!--<input name="file" type="file" placeholder="Upload File" class="form-control form-control-file"  >-->
                            </div>
                        </div>


                        <div class="form-footer pt-5 border-top text-center">
                            <button type="submit" class="btn btn-primary btn-default">Create Post</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

        </div>
       </div>







    @endsection