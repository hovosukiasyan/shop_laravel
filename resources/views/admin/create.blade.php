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

        <div class="form-group ">
              <div class="row">
                <div class="col-md-4 text-center">
                <div id="upload-demo"></div>
                </div>
                <div class="col-md-4" style="padding:5%;">
                <strong>Choose image to crop:</strong>
                <input type="file" id="image_file">
                <button class="btn btn-primary btn-block upload-image" style="margin-top:2%">Upload Image</button>
                <div class="alert alert-success" id="upload-success" style="display: none;margin-top:10px;"></div>
                </div>
                <div class="col-md-4">
                <div id="preview-crop-image" style="background:#9d9d9d;width:300px;padding:50px 50px;height:300px;"></div>
                </div>
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