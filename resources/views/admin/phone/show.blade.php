@extends('../layouts.admin')

@section('content')
<div class="wrapper">
    <h1 class="title">Phone Details</h1>   

    <h2 class="title"><b>Title</b> - {{ $phone->title }}</h2>

    <div class="picture">
        <img id="img" src="{{ asset('/uploads/phones') . '/' .$phone->picture }}" alt="photo" width="300" height="300" />
    </div>

    <div class="price">
        <h2><b>Price</b> {!! round(($phone->price)/485) !!}$</h2>
    </div>

    <div class="launch_status">
        <p><b>Launch Status<b> - {{ $phone->launch_status }}</p>
    </div>

    <div class="screen_size">
        <p><b>Screen Size<b> - {{ $phone->screen_size }}</p>
    </div>

    <div class="screen_resolution">
        <p><b>Screen Resolution<b> - {{ $phone->screen_resolution }}</p>
    </div>

    <div class="ram">
        <p><b>Ram<b> - {{ $phone->ram }}</p>
    </div>

    <div class="memory">
        <p><b>Memory<b> - {{ $phone->memory }}</p>
    </div>

    <div class="main_camera">
        <p><b>Main Camera<b> - {{ $phone->main_camera }}</p>
    </div>

    <div class="front_camera">
        <p><b>Front Camera<b> - {{ $phone->front_camera }}</p>
    </div>

    <div class="battery">
        <p><b>Battery<b> - {{ $phone->battery }}</p>
    </div>

    <div class="sim_card_quantity">
        <p><b>Sim Card Quantity<b> - {{ $phone->sim_card_quantity }}</p>
    </div>

    <div class="os">
        <p><b>OS<b> - {{ $phone->os }}</p>
    </div>

    <div class="edit-in-show-page">
        <a href="/phones/{{ $phone->id }}/edit" class="edit-product link_push_left">
            Edit Product
        </a>
    </div>
        
</div>

@endsection



