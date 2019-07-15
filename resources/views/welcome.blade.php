@extends('layouts.app');

<style>
 #intro {
    background-attachment: fixed;
  }

  #about {
    background-attachment: fixed;
  }

  #intro .intro-container {
    top: 70px;
  }

  #intro h1 {
    font-size: 34px;
  }

  #intro p {
    font-size: 16px;
  }
  
#intro {
  width: 100%;
  height: 100vh;
  background:url(images/abb.jpeg) top center;
  background-size: cover;
  overflow: hidden;
  position: relative;
}

#intro:before {
  content: "";
  background: rgba(6, 12, 34, 0.6);
  position: absolute;
  bottom: 0;
  top: 0;
  left: 0;
  right: 0;
}

#intro .intro-container {
  position: absolute;
  bottom: 0;
  left: 0;
  top: 90px;
  right: 0;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  text-align: center;
  padding: 0 15px;
}

#intro h1 {
  color: #fff;
  font-family: "Raleway", sans-serif;
  font-size: 56px;
  font-weight: 600;
  text-transform: uppercase;
}

#intro h1 span {
  color: #4dc26b;
}

#intro p {
  color: #ebebeb;
  font-weight: 700;
  font-size: 20px;
}

#intro .play-btn {
  width: 94px;
  height: 94px;
  background: radial-gradient(#4dc26b 50%, rgba(101, 111, 150, 0.15) 52%);
  border-radius: 50%;
  display: block;
  position: relative;
  overflow: hidden;
}

#intro .play-btn::after {
  content: '';
  position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translateX(-40%) translateY(-50%);
  transform: translateX(-40%) translateY(-50%);
  width: 0;
  height: 0;
  border-top: 10px solid transparent;
  border-bottom: 10px solid transparent;
  border-left: 15px solid #fff;
  z-index: 100;
  transition: all 400ms cubic-bezier(0.55, 0.055, 0.675, 0.19);
}

#intro .play-btn:before {
  content: '';
  position: absolute;
  width: 120px;
  height: 120px;
  -webkit-animation-delay: 0s;
  animation-delay: 0s;
  -webkit-animation: pulsate-btn 2s;
  animation: pulsate-btn 2s;
  -webkit-animation-direction: forwards;
  animation-direction: forwards;
  -webkit-animation-iteration-count: infinite;
  animation-iteration-count: infinite;
  -webkit-animation-timing-function: steps;
  animation-timing-function: steps;
  opacity: 1;
  border-radius: 50%;
  border: 2px solid rgba(163, 163, 163, 0.4);
  top: -15%;
  left: -15%;
  background: rgba(198, 16, 0, 0);
}

#intro .play-btn:hover::after {
  border-left: 15px solid #4dc26b;
  -webkit-transform: scale(20);
  transform: scale(20);
}

#intro .play-btn:hover::before {
  content: '';
  position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translateX(-40%) translateY(-50%);
  transform: translateX(-40%) translateY(-50%);
  width: 0;
  height: 0;
  border: none;
  border-top: 10px solid transparent;
  border-bottom: 10px solid transparent;
  border-left: 15px solid #fff;
  z-index: 200;
  -webkit-animation: none;
  animation: none;
  border-radius: 0;
}

#intro .about-btn {
  font-family: "Raleway", sans-serif;
  font-weight: 500;
  font-size: 14px;
  letter-spacing: 1px;
  display: inline-block;
  padding: 12px 32px;
  border-radius: 50px;
  transition: 0.5s;
  line-height: 1;
  margin: 10px;
  color: #fff;
  -webkit-animation-delay: 0.8s;
  animation-delay: 0.8s;
  border: 2px solid #4dc26b;
}

#intro .about-btn:hover {
  background: #4dc26b;
  color: #fff;
}

@-webkit-keyframes pulsate-btn {
  0% {
    -webkit-transform: scale(0.6, 0.6);
    transform: scale(0.6, 0.6);
    opacity: 1;
  }

  100% {
    -webkit-transform: scale(1, 1);
    transform: scale(1, 1);
    opacity: 0;
  }
}

@keyframes pulsate-btn {
  0% {
    -webkit-transform: scale(0.6, 0.6);
    transform: scale(0.6, 0.6);
    opacity: 1;
  }

  100% {
    -webkit-transform: scale(1, 1);
    transform: scale(1, 1);
    opacity: 0;
  }
}

</style>
@section('content');

<section id="intro">
    <div class="intro-container wow fadeIn">
      <h1 class="animated fadeInDown">Products <span>Management</span> System</h1>
        <p>Hey!!! Time is tiking, check out our products!!! </p>
    
        <a class="btn btn-success" href="/products">Go To Products</a>
        
    </div>
      
  </section>

{{-- 
<section class="jumbotron tetx-center">
        <h1>BROWSE OUR</h1>
        <h1>PREMIUM PRODUCTS</h1>
            <p>Don't waste any time</p>
         
         <p><a href="#main" class="btn btn-md btn-info">Get Started</a>
            <button class="btn btn-md btn-success" >Contact Us</button>
        </p>
           <br>
           <div>
               <p></p>
           </div>
        
</section> --}}{{-- <h2>Products</h2>
<!-- Check if there is a product in a database-->
@if(count($products) > 0)
    @foreach ($products as $product)
    <div id="products" class="row view-group products">
            <div class="item col-xs-4 col-lg-4" id="main">
                <p></p>
                <div class="thumbnail card">
                    <div class="img-event">
                        <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap">
                        <img class="group list-group-image img-fluid" src="http://placehold.it/400x250/000/fff" alt="" />
                    </div>
                    <div class="caption card-body">
                        <h4 class="group card-title inner list-group-item-heading">
                        {{$product->name}}</h4>
                        <p class="group inner list-group-item-text">
                        {{$product->description}}</p>
                        <p>{{$product->id}}</p>
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                            <a class="btn btn-success" href="/products/{{$product->id}}">View</a>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <a class="btn btn-success" href="#">Place A Bid</a>
                            </div>
                        </div>
                    </div>
                </div><p></p>
            </div>
        </div>
       
    @endforeach

        @else

            <p>No Products to Display!!!</p>

         @endif
 --}}
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
  </body>


   
@endsection
