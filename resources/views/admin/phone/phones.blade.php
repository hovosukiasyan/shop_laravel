@extends('../layouts.admin')

@section('content')
<div class="wrapper">
    <div class="product">
        <h1 class="title">All Phones</h1>
        <a href='/phones/create' class="btn btn-success create-button">Create Phone</a>
            <?php
                $count = count($phones);
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
                @foreach ($phones as $phone)
                        <tr>
                            <td><?= $phone->title ?></td>
                            <td><?= $phone->price ?>$</td>
                            <td><img id="img" src="{{ asset('/uploads/phones') . '/' .$phone->picture }}" alt="photo" width="200" height="200" /></td>
                            <td class="edit-product-td"><a href="/phones/{{ $phone->id }}/edit" class="edit-product link-push-left">Edit Phone</a></td>
                            <td class="show-product-td"><a href="/phones/{{ $phone->id }}" class="show-product link-push-left">Show Phone</a></td>
                            <td class="delete-product">
                                <form method="POST" action="/phones/{{ $phone->id }}">

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
                <h2>Phones will be added sooner</h2>
            @endif
            
    </div>
</div>
@endsection
