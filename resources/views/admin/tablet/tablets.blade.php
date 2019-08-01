@extends('../layouts.admin')

@section('content')
<div class="wrapper">
    <div class="product">
        <h1 class="title">All Tablets</h1>
        <a href='/tablets/create' class="btn btn-success create-button">Create Tablet</a>
            <?php
                $count = count($tablets);
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
                @foreach ($tablets as $tablet)
                        <tr>
                            <td><?= $tablet->title ?></td>
                            <td>
                                <?= round(($tablet->price)/485)?>$<br/>
                                <?= ($tablet->price)?>֏
                            </td>
                            <td><img id="img" src="{{ asset('/uploads/tablets') . '/' .$tablet->picture }}" alt="photo" width="200" height="200" /></td>
                            <td class="edit-product-td"><a href="/tablets/{{ $tablet->id }}/edit" class="edit-product link-push-left">Edit Tablet</a></td>
                            <td class="show-product-td"><a href="/tablets/{{ $tablet->id }}" class="show-product link-push-left">Show Tablet</a></td>
                            <td class="delete-product">
                                <form method="POST" action="/tablets/{{ $tablet->id }}">

                                    @method('DELETE')
                                    @csrf
                                    
                                    <div class="field">
                            
                                        <div class="control">
                                            <button type="submit" class="btn btn-danger">Delete Tablet</button>
                                        </div>
                                    
                                    
                                    </div>
                                </form>
                            </td>
                        </tr>
                @endforeach
            </table>
            @else
                <h2>Tablets will be added sooner</h2>
            @endif
            
    </div>
</div>
@endsection
