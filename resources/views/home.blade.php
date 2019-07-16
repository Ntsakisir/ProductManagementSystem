@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="container-fluid">
        <div class="row">
          <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a class="nav-link active" href="#">
                    <span data-feather="home"></span>
                    Dashboard <span class="sr-only">(current)</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/products">
                    <span data-feather="list"></span>
                    Products
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/products/create">
                    <span data-feather="file-plus"></span>
                    Add Products
                  </a>
                </li>
              </ul>
             
            </div>
          </nav>
  
          <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    
            <h2>Products Info</h2>
            <div class="table-responsive">
              <table class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th>image</th>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>SKU</th>
                    <th>PRICE</th>
                    <th>DESCRIPTION</th>
                    <th>VIEWS</th>
                    <th>Tot BIDS</th>
                    <th>AVG BID</th>
                    <th>HIGHEST BID</th>
                    <th>LOWEST BID</th>
                    
                    <th colspan="4">ACTION</th>
                  </tr>
                </thead>
                <tbody>
                     @if(count($products) > 0)
                        @foreach ($products as $product)
                          <tr>
                          <td><img src="{{ asset('uploads/img/' . $product->image) }}" width="100px;" height="100px;" alt="hello"></td>
                          <td>{{$product->id}}</td>
                          <td>{{$product->name}}</td>
                          <td>{{$product->SKU}}</td>
                          <td>{{$product->price}}</td>
                          <td>{{$product->description}}</td>
                          <td>{{$product->views}}</td>
                  @foreach (json_decode($total ,true) as $item)
                    <td>{{$item['tot_bid']}}</td>
                  @endforeach
                  
                  @foreach (json_decode($average ,true) as $item)
                  <td>{{$item['avg_bid']}}</td>
                      
                  @endforeach
                
                  @foreach (json_decode($results , true) as $item)
                  <td>{{$item['max_bid']}}</td>
                  @endforeach
                  
                  @foreach (json_decode($minimum ,true) as $item)
                  <td>{{$item['min_bid']}}</td>
                      
                  @endforeach
                              <td><a href="/products/create" class="btn btn-success"> <span data-feather="file-plus"></span>Add</a></td>
                              <td><a href="/products/{{$product->id}}" class="btn btn-info"> <span data-feather="image"></span>View</a></td>
                              <td><a href="/products/{{$product->id}}/edit" class="btn btn-warning">Edit</a></td>
                                      <td>  <form  method="POST" action="{{route('products.destroy',['id'=>$product->id])}}">
                        @method('delete')
                        @csrf
                            <div>
                                        <input hidden id="{{$product->id}}" type="text" name="{{$product->id}}" value="{{$product->id}}" required autofocus>
                                    </div>
                        <button type="submit" class="btn btn-danger"><span data-feather="trash"></span>
                                {{ __('Delete') }}
                            </button>
                    </form></td>
                            </tr>
               @endforeach
                   @else
                      <p class="alert alert-warning">No PRODUCTS TO DISPLAY!!!</p>
                   @endif
            
                </tbody>
              </table>
            </div>
          </main>
        </div>
      </div>
@endsection
