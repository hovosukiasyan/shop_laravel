@extends('../layouts.admin')

@section('content')
<div class="wrapper">
    <h1 class="title">Create Phone</h1>
    <form method="POST" action="/phones/" enctype="multipart/form-data">

        @csrf
        <input id="type" name="type" type="hidden" value="phone">

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
            <label for="launch_status" class="col-md-4 col-form-label text-md-right">{{ __('Launch Status') }}</label>

            <div class="col-md-6">
                <input id="launch_status" type="text" class="form-control{{ $errors->has('launch_status') ? ' is-invalid' : '' }}"
                    name="launch_status" value="" autofocus>

                @if ($errors->has('launch_status'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('launch_status') }}</strong>
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
            <label for="memory" class="col-md-4 col-form-label text-md-right">{{ __('Memory') }}</label>

            <div class="col-md-6">
                <input id="memory" type="text" class="form-control{{ $errors->has('memory') ? ' is-invalid' : '' }}"
                    name="memory" value="" autofocus>

                @if ($errors->has('memory'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('memory') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="main_camera" class="col-md-4 col-form-label text-md-right">{{ __('Main Camera') }}</label>

            <div class="col-md-6">
                <input id="main_camera" type="text" class="form-control{{ $errors->has('main_camera') ? ' is-invalid' : '' }}"
                    name="main_camera" value="" autofocus>

                @if ($errors->has('main_camera'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('main_camera') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="front_camera" class="col-md-4 col-form-label text-md-right">{{ __('Front Camera') }}</label>

            <div class="col-md-6">
                <input id="front_camera" type="text" class="form-control{{ $errors->has('front_camera') ? ' is-invalid' : '' }}"
                    name="front_camera" value="" autofocus>

                @if ($errors->has('front_camera'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('front_camera') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="battery" class="col-md-4 col-form-label text-md-right">{{ __('Battery') }}</label>

            <div class="col-md-6">
                <input id="battery" type="text" class="form-control{{ $errors->has('battery') ? ' is-invalid' : '' }}"
                    name="battery" value="" autofocus>

                @if ($errors->has('battery'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('battery') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="sim_card_quantity" class="col-md-4 col-form-label text-md-right">{{ __('Sim Card Quantity') }}</label>

            <div class="col-md-6">
                <input id="sim_card_quantity" type="text" class="form-control{{ $errors->has('sim_card_quantity') ? ' is-invalid' : '' }}"
                    name="sim_card_quantity" value="" autofocus>

                @if ($errors->has('sim_card_quantity'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('sim_card_quantity') }}</strong>
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
            <div class="panel-heading">Upload and Crop Image of Phone</div>
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
