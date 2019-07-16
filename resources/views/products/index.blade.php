@extends('layouts.app');

@section('content');

<section class="jumbotron text-center">
    <div class="container">
      <h2 class="jumbotron-heading">BROWSE OUR</h2>
      
      <h2 class="jumbotron-heading">PREMIUM PRODUCTS</h2>
      <p class="lead text-muted">Don't waste any time.</p>
      <p>
        <a href="#main" class="btn btn-primary my-2">Get Started</a>
        <a href="#" class="btn btn-secondary my-2">Contact Us</a>
      </p>
    </div>
  </section>
  <div class="album py-5 bg-light">
        <div class="container">
                <div class="row  text-center">
                        @if(count($products) > 0)
                        @foreach ($products as $product)

                        <div class="col-md-4 ">
                                <div class="card mb-4 shadow-sm">
                                    <div class="img-event">
                                        <img class="group list-group-image img-fluid" src="{{ asset('uploads/img/' . $product->image) }}" alt="" />
                                    </div>
                                  <div class="card-body">
                                    <p class="card-text">{{$product->description}}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                      <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">
                                         <a class="btn btn-success" href="/products/{{$product->id}}">View</a></button>
                                       
                                      </div>
                                      <small class="text-muted">views &nbsp; {{$product->views}}</small>
                                    </div>
                                  </div>
                                </div>
                              </div>
                                     
                                @endforeach

                                @else

                                    <p class="alert alert-warning text-center">No Products to Display!!!</p>

                                @endif

                </div>
        </div>
  </div>
    <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <a href="#">Back to top</a>
        </p>
        <p>Created by <a href="../../">Ntsakisi</a></p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
  


   
@endsection
