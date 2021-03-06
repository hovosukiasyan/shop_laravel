@extends('../layouts.admin')

@section('content')
<div class="wrapper">
    <h1 class="title">Create Notebook</h1>
    <form method="POST" action="/notebooks/" enctype="multipart/form-data">

        @csrf
        <input id="type" name="type" type="hidden" value="notebook">


        <div class="form-group row">
            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

            <div class="col-md-6">
                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                    name="title" value="" autofocus>

                @if ($errors->has('title'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="brand" class="col-md-4 col-form-label text-md-right">{{ __('Brand') }}</label>

            <div class="col-md-6">
                    @foreach ($brands as $brand)
                        <input type="radio" name="brand_id" value="{{ $brand->id }}">{{$brand->name}}<br>
                    @endforeach
                    
                @if ($errors->has('brand'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('brand') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

            <div class="col-md-6">
                <input id="price" type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}"
                    name="price" value="" autofocus>

                @if ($errors->has('price'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="screen_size" class="col-md-4 col-form-label text-md-right">{{ __('Screen Size') }}</label>

            <div class="col-md-6">
                <input id="screen_size" type="text" class="form-control{{ $errors->has('screen_size') ? ' is-invalid' : '' }}"
                    name="screen_size" value="" autofocus>

                @if ($errors->has('screen_size'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('screen_size') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="screen_resolution" class="col-md-4 col-form-label text-md-right">{{ __('Screen Resolution') }}</label>

            <div class="col-md-6">
                <input id="screen_resolution" type="text" class="form-control{{ $errors->has('screen_resolution') ? ' is-invalid' : '' }}"
                    name="screen_resolution" value="" autofocus>

                @if ($errors->has('screen_resolution'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('screen_resolution') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="cpu" class="col-md-4 col-form-label text-md-right">{{ __('CPU') }}</label>

            <div class="col-md-6">
                <input id="cpu" type="text" class="form-control{{ $errors->has('cpu') ? ' is-invalid' : '' }}"
                    name="cpu" value="" autofocus>

                @if ($errors->has('cpu'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('cpu') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="ram" class="col-md-4 col-form-label text-md-right">{{ __('Ram') }}</label>

            <div class="col-md-6">
                <input id="ram" type="text" class="form-control{{ $errors->has('ram') ? ' is-invalid' : '' }}"
                    name="ram" value="" autofocus>

                @if ($errors->has('ram'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('ram') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="hard_drive" class="col-md-4 col-form-label text-md-right">{{ __('Hard Drive') }}</label>

            <div class="col-md-6">
                <input id="hard_drive" type="text" class="form-control{{ $errors->has('hard_drive') ? ' is-invalid' : '' }}"
                    name="hard_drive" value="" autofocus>

                @if ($errors->has('hard_drive'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('memory') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="graphic_card" class="col-md-4 col-form-label text-md-right">{{ __('Graphic Card') }}</label>

            <div class="col-md-6">
                <input id="graphic_card" type="text" class="form-control{{ $errors->has('graphic_card') ? ' is-invalid' : '' }}"
                    name="graphic_card" value="" autofocus>

                @if ($errors->has('graphic_card'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('graphic_card') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="touch_screen" class="col-md-4 col-form-label text-md-right">{{ __('Touch Screen') }}</label>

            <div class="col-md-6">
                <input id="touch_screen" type="text" class="form-control{{ $errors->has('touch_screen') ? ' is-invalid' : '' }}"
                    name="touch_screen" value="" autofocus>

                @if ($errors->has('touch_screen'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('touch_screen') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="os" class="col-md-4 col-form-label text-md-right">{{ __('Operation System') }}</label>

            <div class="col-md-6">
                <input id="os" type="text" class="form-control{{ $errors->has('os') ? ' is-invalid' : '' }}"
                    name="os" value="" autofocus>

                @if ($errors->has('os'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('os') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="panel panel-info">
            <div class="panel-heading">Upload and Crop Image of Notebook</div>
            <div class="panel-body">

                <div class="row">
                    <div class="col-md-4 text-center">
                        <div id="upload-demo"></div>
                    </div>
                    <div class="col-md-4" style="padding:5%;">
                        <strong>Select image to crop:</strong>
                        <input type="file" id="picture">

                        <button class="btn btn-primary btn-block upload-image" style="margin-top:2%">
                            Upload Image
                        </button>
                    </div>

                    <div class="col-md-4">
                        <div id="preview-crop-image"
                            style="background:#9d9d9d;width:300px;padding:50px 50px;height:300px;"></div>
                    </div>
                    @if ($errors->has('picture'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('picture') }}</strong>
                        </span>
                    @endif
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
