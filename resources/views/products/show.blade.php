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
                    <p><span>Views:</span> {{$products->views}}</p>
                    <p><span>Your Bid:</span>{{$products->userb}}</p>
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
                  <form method="POST" action="{{url('/create')}}" aria-label="{{ __('Bid') }}">
                          @csrf
  
                          <div class="form-group row">
                              <label for="u_email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
  
                              <div class="col-md-6">
                                  <input id="u_email" type="u_email" class="form-control{{ $errors->has('u_email') ? ' is-invalid' : '' }}" name="u_email" value="{{ old('u_email') }}" required>
  
                                  @if ($errors->has('u_email'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('u_email') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="bid_price" class="col-md-4 col-form-label text-md-right">{{ __('Bid bid_price') }}</label>
  
                              <div class="col-md-6">
                                  <input id="bid_price" type="text" class="form-control{{ $errors->has('bid_price') ? ' is-invalid' : '' }}" name="bid_price" value="{{ old('bid_price') }}" required autofocus>
  
                                  @if ($errors->has('bid_price'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('bid_price') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group row">
    
                                <div class="col-md-6">
                                    <input hidden id="product_id" type="text" class="form-control{{ $errors->has('product_id') ? ' is-invalid' : '' }}" name="product_id" value="{{$products->id}}" required autofocus>
    
                                    @if ($errors->has('bid_price'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('bid_price') }}</strong>
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