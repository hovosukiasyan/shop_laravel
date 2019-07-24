@extends('../layouts.admin')

@section('content')
<div class="wrapper">
    <h1 class="title">Edit Product</h1>   

    <form method="POST" action="/products/{{ $product->id }}">

        @method('PATCH')
        @csrf
        <input id="type" name="type" type="hidden" value="product">


        <div class="field">
        
            <label class="label" for="title">Title</label>

            <div class="control">
                <input type="text" name="title" placeholder="Title" class="input" value="{{ $product->title }}">
            </div>
            @if ($errors->has('title'))
            <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
        
        </div>
    
        <div class="field">
        
            <label class="label" for="price">Price</label>
            
            <div class="control">
                <textarea name="price" class="textarea">{{ $product->price }}</textarea>
            </div>
            @if ($errors->has('price'))
                <span class="help-block">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
            @endif
        </div>

        
        <div class="field">
            <label class="label"">Current Image</label>
            <div class="control">
                <img src="{{ asset('/uploads/products') . '/' .$product->picture }}" alt="product">
            </div>
        </div>

        <div class="panel panel-info">
            <div class="panel-heading">Upload and Update Product Image with Crop</div>
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


        <div class="field">
        
            <div class="control">
                <button type="submit" class="button is-link">Update Product</button>
            </div>
        
        </div>

        

    </form>

</div>

@endsection