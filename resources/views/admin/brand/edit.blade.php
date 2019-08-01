@extends('../layouts.admin')

@section('content')
<div class="wrapper">
    <h1 class="title">Edit brand</h1>
    <form method="POST" action="/brands/{{ $brand->id }}" enctype="multipart/form-data">

        @csrf
        @method('PATCH')
        


        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                    name="name" value="{{ $brand->name }}" autofocus>

                @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

            <div class="col-md-6">
                {{-- <input id="type" type="text" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}"
                    name="type" value="{{ $brand->type }}" autofocus> --}}
                    <input type="radio" name="type" value="1" {{ ($brand->type=="1")? "checked" : "" }} > Phone<br>
                    <input type="radio" name="type" value="2" {{ ($brand->type=="2")? "checked" : "" }}> Notebook<br>
                    <input type="radio" name="type" value="3" {{ ($brand->type=="3")? "checked" : "" }}> Tablet
                @if ($errors->has('type'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('type') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Update') }}
                </button>
            </div>
        </div>

    </form>

</div>
@endsection
