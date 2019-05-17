@extends('../layouts.admin')

@section('content')
<div class="wrapper">
    <div class="product">
        <h1 class="title">All Products</h1>
            <?php
                $count = count($products);
            ?>
            @if ($count != 0)
            <table>
                <tr>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Show</th>
                    <th>Delete</th>
                </tr>
                @foreach ($products as $product)
                        <tr>
                            <td><?= $product->title ?></td>
                            <td><?= $product->price ?>$</td>
                            <td><img id="img" src="{{ asset('/uploads/files') . '/' .$product->picture }}" alt="photo" width="200" height="200" /></td>
                            <td class="edit-product-td"><a href="/products/edit/{{ $product->id }}" class="edit-product link-push-left">Edit Product</a></td>
                            <td class="show-product-td"><a href="/products/show/{{ $product->id }}" class="show-product link-push-left">Show Product</a></td>
                            <td class="delete-product">
                                <form method="POST" action="/products/{{ $product->id }}">

                                    @method('DELETE')
                                    @csrf
                                    
                                    <div class="field">
                            
                                        <div class="control">
                                            <button type="submit" class="btn btn-danger">Delete Product</button>
                                        </div>
                                    
                                    
                                    </div>
                                </form>
                            </td>
                        </tr>
                @endforeach
            </table>
            @else
                <h2>Products will be added sooner</h2>
            @endif
            
    </div>
</div>
@endsection
