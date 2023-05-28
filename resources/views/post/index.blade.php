@extends('Layout.master')


@section('content')

<div class="container py-5 my-5" style="min-height: 82vh;">

<div class="row">
        <div class="col-lg-12">
        <div class="notification text-center"><span class="text-center text-success">{{ session()->get('message') }}</span></div>
            <div class="container" style="display:flex; align-items:center; justify-content:space-between">
            <div class="text-center"><h3>{{$title}}</h3></div>
            <a href="{{route('Post.create')}}" class="btn btn-primary">+ Create Post</a>
            </div>
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <table class="table table-responsive">
                        <thead class="thead">
                        <tr>
                            <th>#</th>
                            <th>Featured Image</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $count = 0;
                        @endphp
                        @foreach($posts as $post)

                            @php
                                $count++;
                                if($post->featured_image == NULL){
                                    $image = 'assets/img/posts/placeholder.png';
                                }else{
                                    $image = $post->featured_image;
                                    }

                            @endphp
                            <tr>
                                <td>{{$count}}</td>
                                <td style="width:20%;"><a href="{{route('Post.show',$post->id)}}"><img  style="width: 50%;" src="{{asset($image)}}" alt="product image"></a></td>
                                <td><h5><a href="{{route('Post.show',$post->id)}}">{{$post->title}}</a></h5></td>
                                <td>{{$post->author}}</td>
                                <td><a  class="btn" href="{{route('Post.edit',$post->id)}}"><span style="color:cornflowerblue" class="mdi mdi-square-edit-outline">Edit</span></a>
                                    <form action="{{route('Post.destroy',$post->id)}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick="return confirm('Are you sure to delete this Post info?');" type="submit" class="btn" style=" display: inline-block;"><span style="color:red;" class="mdi mdi-delete">Delete</span></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>


@endsection