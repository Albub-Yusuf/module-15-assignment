@extends('Layout.master')


@section('content')

<div class="container py-5 my-5" style="min-height: 82vh;">

<div class="row">
        <div class="col-lg-12">
        <div class="notification text-center"><span class="text-center text-success">{{ session()->get('message') }}</span></div>

            <div class="container" style="display:flex; align-items:center; justify-content:space-between">
            <div class="text-center"><h3>{{$title}}</h3></div>
            <a href="{{route('Product.create')}}" class="btn btn-primary">+ Add Product</a>
            </div>
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <table class="table table-responsive">
                        <thead class="thead">
                        <tr>
                            <th>#</th>
                            <th>Picture</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $count = 0;
                        @endphp
                        @foreach($products as $product)

                            @php
                                $count++;
                                if($product->product_image == NULL){
                                    $image = 'assets/img/products/placeholder.png';
                                }else{
                                    $image = $product->product_image;
                                    }

                            @endphp
                            <tr>
                                <td>{{$count}}</td>
                                <td style="width:20%;"><a href="{{route('Product.show',$product->id)}}"><img  style="width: 50%;" src="{{asset($image)}}" alt="product image"></a></td>
                                <td><h5>{{$product->name}}</h5></td>
                                <td>{{$product->price}} /-</td>
                                <td><a  class="btn" href="{{route('Product.edit',$product->id)}}"><span style="color:cornflowerblue;">Edit</span></a>
                                    <form action="{{route('Product.destroy',$product->id)}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick="return confirm('Are you sure to delete this Product info?');" type="submit" class="btn" style=" display: inline-block;"><span style="color:red;">Delete</span></button>
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