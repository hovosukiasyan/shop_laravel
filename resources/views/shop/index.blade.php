@extends('layouts.shop')

@section('title', 'Shop')

@section('content')
 
    <div class="container products">
 
        <div class="row">
 
            @foreach($products as $product)
                <div class="col-xs-18 col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <img src="{{ asset('/uploads/products') . '/' .$product->picture }}" alt="{{$product->title }}" width="200" height="250">
                        <div class="caption">
                            <h4>{{ $product->name }}</h4>
                            <p><strong>Price: </strong> {{ $product->price }}$</p>
                            <p class="btn-holder"><a href="{{ url('add-to-cart/'.$product->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                        </div>
                    </div>
                </div>
            @endforeach
            {{ $products->links() }}
 
        </div><!-- End row -->
 
    </div>
 
@endsection
