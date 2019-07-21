@extends('../layouts.admin')

@section('content')
<div class="wrapper">
    <div class="product">
        <h1 class="title">All Phones</h1>
        <a href='/notebooks/create' class="btn btn-success create-button">Create Notebook</a>
            <?php
                // $url = explode('/',url()->current());
                // if ($url[3] == "notebooks") {
                //     dd(1);
                // }else{
                //     dd(2);
                // }
                $count = count($notebooks);
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
                @foreach ($notebooks as $notebook)
                        <tr>
                            <td><?= $notebook->title ?></td>
                            <td>
                                <?= round(($notebook->price)/485)?>$<br/>
                                <?= ($notebook->price)?>֏
                            </td>
                            <td><img id="img" src="{{ asset('/uploads/notebooks') . '/' .$notebook->picture }}" alt="photo" width="200" height="200" /></td>
                            <td class="edit-product-td"><a href="/notebooks/{{ $notebook->id }}/edit" class="edit-product link-push-left">Edit Notebook</a></td>
                            <td class="show-product-td"><a href="/notebooks/{{ $notebook->id }}" class="show-product link-push-left">Show Notebook</a></td>
                            <td class="delete-product">
                                <form method="POST" action="/notebooks/{{ $notebook->id }}">

                                    @method('DELETE')
                                    @csrf
                                    
                                    <div class="field">
                            
                                        <div class="control">
                                            <button type="submit" class="btn btn-danger">Delete Notebook</button>
                                        </div>
                                    
                                    
                                    </div>
                                </form>
                            </td>
                        </tr>
                @endforeach
            </table>
            @else
                <h2>Notebook will be added sooner</h2>
            @endif
            
    </div>
</div>
@endsection
