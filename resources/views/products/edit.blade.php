@extends('layouts.app')

@section('content')

<h3 style="text-align:center;" class="card-header">{{ __('Update Product') }}</h3>
<div class="card-body">
<form method="POST" action="{{route('products.update',['id'=>$products->id])}}" aria-label="{{ __('Register') }}">
    @method('PUT')
        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Product Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{$products->name}}" required autofocus>

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="SKU" class="col-md-4 col-form-label text-md-right">{{ __('SKU') }}</label>

            <div class="col-md-6">
                <input id="SKU" type="text" class="form-control{{ $errors->has('SKU') ? ' is-invalid' : '' }}" name="SKU" value="{{ $products->SKU}}" required autofocus>

                @if ($errors->has('SKU'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('SKU') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

            <div class="col-md-6">
                <input id="price" type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{$products->price}}" required autofocus>

                @if ($errors->has('price'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('price') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('description') }}</label>

            <div class="col-md-6">
                <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ $products->description }}" required autofocus>

                @if ($errors->has('description'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
    
            <div class="col-md-6">
                <input hidden id="id" type="text" class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="id" value="{{$products->id}}" required autofocus>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-success">
                    {{ __('Update Product') }}
                </button>
                
                    <a href="/home" class="btn btn-warning">Go Back</a>
                  
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div>

@endsection