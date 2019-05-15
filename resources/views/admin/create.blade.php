@extends('../layouts.admin')

@section('content')
<div class="wrapper">
    <h1 class="title">Create Product</h1>   
    <?php
    //    dd( $user); 
    ?>
    <form method="POST" action="/product/" enctype="multipart/form-data">

        @csrf

        <div class="form-group row">
            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

            <div class="col-md-6">
                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="" autofocus>

                @if ($errors->has('title'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

            <div class="col-md-6">
                <input id="price" type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="" autofocus>

                @if ($errors->has('price'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('price') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="picture" class="col-md-4 col-form-label text-md-right">{{ __('Post Picture') }}</label>

            <div class="col-md-6 picture_upload" class="form-group{{ $errors->has('picture') ? ' has-error' : '' }}">
                <input id="picture" type="file" class="form-control" name="picture" value="">
                <img id="img" src="#" alt="photo" width="100" height="100" />
        
                @if ($errors->has('picture'))
                    <span class="help-block">
                        <strong>{{ $errors->first('picture') }}</strong>
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