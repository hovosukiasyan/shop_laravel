@extends('../layouts.admin')

@section('content')
<div class="wrapper">
    <div class="product">
        <h1 class="title">All Products</h1>
            <?php
                $count = count($products);
            ?>
            @if ($count != 0)
                @foreach ($products as $product)
                <div class="post-wrapper">
                    <h2><b>Title</b> - <?= $product->title ?></h2>
                    <ul>
                        <li><b>Price</b> - <?= $product->price ?></li>
                        <div class="img-wrapper">
                            <p><b>Image</b> </p>
                            <img id="img" src="{{ asset('/uploads/files') . '/' .$product->picture }}" alt="photo" width="200" height="200" />
                        </div>
                    </ul>
                </div>
                @endforeach
            @else
                <h2>Products will be added sooner</h2>
            @endif
            
    </div>
</div>
@endsection