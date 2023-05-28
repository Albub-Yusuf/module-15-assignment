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
                    <form action="{{route('Product.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <label class="text-dark font-weight-medium" for="name">Name</label>
                        <div class="input-group mb-2">
                    
                            <input type="text" name="name" class="form-control" placeholder="Enter Product's Name Here" aria-label="name">
                        </div>

                    
                        <label class="text-dark font-weight-medium" for="price">Price</label>
                        <div class="input-group mb-2">
                            
                            <input type="number" name="price" placeholder="1.0" step="0.01" min="0" class="form-control" aria-label="price">
                        </div>


                        <label class="text-dark font-weight-medium" for="price">Product Details</label>
                        <div class="input-group mb-2">

                        <textarea type="text" class="form-control" id="description" name="description" placeholder="Enter product description here..."></textarea>


                        </div>


                        <div class="form-group">
                            <label class="">Product Image</label>
                            <div>
                                @if(isset($productInfo) && $productInfo->product_image!= null)

                                    <img src="{{asset($productInfo->product_image)}}" alt="product_image">
                                @endif
                                <input  input name="product_image" type="file" class="form-control-file">
                                <!--<input name="file" type="file" placeholder="Upload File" class="form-control form-control-file"  >-->
                            </div>
                        </div>


                        <div class="form-footer pt-5 border-top text-center">
                            <button type="submit" class="btn btn-primary btn-default">Add Product</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

        </div>
       </div>







    @endsection