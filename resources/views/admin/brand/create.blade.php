@extends('../layouts.admin')

@section('content')
<div class="wrapper">
    <h1 class="title">Create Brand</h1>
    <form method="POST" action="/brands/" enctype="multipart/form-data">

        @csrf


        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                    name="name" value="" autofocus>

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
                    name="type" value="" autofocus> --}}
                <input type="radio" name="type" value="1"> Phone<br>
                <input type="radio" name="type" value="2"> Notebook<br>
                <input type="radio" name="type" value="3"> Tablet

                @if ($errors->has('type'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('POST') }}
                </button>
            </div>
        </div>

    </form>

</div>
@endsection
