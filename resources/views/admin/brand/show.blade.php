@extends('../layouts.admin')

@section('content')
<div class="wrapper">
    <h1 class="title">Brand Details</h1>   

    <h2 class="title"><b>Title</b> - {{ $brand->title }}</h2>

    <div class="price">
        <h2><b>Type</b> - {{ $brand->type }}</h2>
        
    </div>

    <div class="edit-in-show-page">
        <a href="/brands/{{ $brand->id }}/edit" class="edit-product link_push_left">
            Edit brand
        </a>
    </div>
        
</div>

@endsection



