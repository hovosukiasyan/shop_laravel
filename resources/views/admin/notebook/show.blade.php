@extends('../layouts.admin')

@section('content')
<div class="wrapper">
    <h1 class="title">Notebook Details</h1>   

    <h2 class="title"><b>Title</b> - {{ $notebook->title }}</h2>

    <div class="picture">
        <img id="img" src="{{ asset('/uploads/notebooks') . '/' .$notebook->picture }}" alt="photo" width="300" height="300" />
    </div>

    <div class="price">
        <h2><b>Price</b> {!! round(($notebook->price)/485) !!}$</h2>
        
    </div>

    <div class="screen_size">
        <p><b>Screen Size<b> - {{ $notebook->screen_size }}</p>
    </div>

    <div class="screen_resolution">
        <p><b>Screen Resolution<b> - {{ $notebook->screen_resolution }}</p>
    </div>

    <div class="cpu">
        <p><b>CPU<b> - {{ $notebook->cpu }}</p>
    </div>

    <div class="ram">
        <p><b>RAM<b> - {{ $notebook->ram }}</p>
    </div>

    <div class="hard_drive">
        <p><b>Hard Drive<b> - {{ $notebook->hard_drive }}</p>
    </div>
    
    <div class="graphic_card">
        <p><b>Graphic Card<b> - {{ $notebook->graphic_card }}</p>
    </div>
    
    <div class="touch_screen">
        <p><b>Touch Screen<b> - {{ $notebook->touch_screen }}</p>
    </div>

    <div class="os">
        <p><b>OS<b> - {{ $notebook->os }}</p>
    </div>

    <div class="edit-in-show-page">
        <a href="/notebooks/{{ $notebook->id }}/edit" class="edit-product link_push_left">
            Edit Notebook
        </a>
    </div>
        
</div>

@endsection



