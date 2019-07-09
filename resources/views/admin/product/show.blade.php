@extends('../layouts.admin')

@section('content')
<div class="wrapper">
    <h1 class="title">Product Details</h1>   

    <h2 class="title"><b>Title</b> - {{ $product->title }}</h2>

    <div class="picture">
        <img id="img" src="{{ asset('/uploads/products') . '/' .$product->picture }}" alt="photo" width="300" height="300" />
    </div>

    <div class="price">
        <p><b>Price<b> - {{ $product->price }}$</p>
    </div>

    <div class="edit-in-show-page">
        <a href="/products/edit/{{ $product->id }}" class="edit-product link_push_left">
            Edit Product
        </a>
    </div>
        
</div>

@endsection



