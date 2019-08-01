@extends('../layouts.admin')

@section('content')
<div class="wrapper">
    <div class="product">
        <h1 class="title">All Brands</h1>
        <a href='/brands/create' class="btn btn-success create-button">Create Brand</a>
            <?php
                $count = count($brands);
            ?>
            @if ($count != 0)
            <table>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Edit</th>
                    <th>Show</th>
                    <th>Delete</th>
                </tr>
                @foreach ($brands as $brand)
                        <tr>
                            <td><h1><?= $brand->name ?></h1></td>
                            <td><h2><?= ($brand->type=="1") ? "Phone" : (($brand->type=="2") ? "Notebook" : "Tablet") ?></h2></td>
                            <td class="edit-product-td"><a href="/brands/{{ $brand->id }}/edit" class="edit-product link-push-left">Edit brand</a></td>
                            <td class="show-product-td"><a href="/brands/{{ $brand->id }}" class="show-product link-push-left">Show brand</a></td>
                            <td class="delete-product">
                                <form method="POST" action="/brands/{{ $brand->id }}">

                                    @method('DELETE')
                                    @csrf
                                    
                                    <div class="field">
                            
                                        <div class="control">
                                            <button type="submit" class="btn btn-danger">Delete brand</button>
                                        </div>
                                    
                                    
                                    </div>
                                </form>
                            </td>
                        </tr>
                @endforeach
            </table>
            @else
                <h2>Brands will be added sooner</h2>
            @endif
            
    </div>
</div>
@endsection
