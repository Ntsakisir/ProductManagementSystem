@extends('layouts.app')

@section('content')

   
    <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <h2 style="text-align:center">{{$products->name}}</h2>
                  <div class="row">
                    <div class="col-md-7">
                        <p> <img src="http://placehold.it/400x250/000/fff" alt="product"/> </p>       
                    </div>
                    <div class="col-md-4">     
                  
                  <p><span>SKU: </span>{{$products->SKU}}</p>
                  <p><span>Price: </span>{{$products->price}}</p>
                  <p><span>Description: </span>{{$products->description}}</p>
                    <p><span>Highest Bid:</span>{{$price}}</p>
                    <p><span>Average:</span>{{$avg}}</p>
                    <p><span>Your Bid:</span>{{$avg}}</p>
                    <p><span>Views:</span> {{$products->views}}</p>
                  <hr>
                    </div>
                  </div>
              {{--     @if(count($pbids) > 0)

                    @foreach ($pbids as $bid)
                    
                    <p> {{$bid->price}}</p>
                    
                    @endforeach
                    
                    
                    @else
                    
                    <p>No Products to Display!!!</p>
                    
                    
                    @endif --}}
                
                  <h3 style="text-align:center;" class="card-header">{{ __('Place A Bid') }}</h3>
                  <div class="card-body">
                  <form method="POST" action="{{url('/create')}}" aria-label="{{ __('Register') }}">
                          @csrf
  
                          <div class="form-group row">
                              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
  
                              <div class="col-md-6">
                                  <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
  
                                  @if ($errors->has('email'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('email') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Bid Price') }}</label>
  
                              <div class="col-md-6">
                                  <input id="price" type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price') }}" required autofocus>
  
                                  @if ($errors->has('price'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('price') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group row">
    
                                <div class="col-md-6">
                                    <input hidden id="product_id" type="text" class="form-control{{ $errors->has('product_id') ? ' is-invalid' : '' }}" name="product_id" value="{{$products->id}}" required autofocus>
    
                                    @if ($errors->has('price'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('price') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
  
  
                          <div class="form-group row mb-0">
                              <div class="col-md-6 offset-md-4">
                                  <button type="submit" class="btn btn-success">
                                      {{ __('Place Bid') }}
                                  </button>
                                  
                                      <a href="/products" class="btn btn-warning">Go Back</a>
                                    
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
  
   

@endsection