@extends('layouts.app')
@section('content')
<div class="site-wrap">
    <div class="site-section">
        <div class="container">
            <div class="bg-light py-3">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <a
                        href="shop.html">Store</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">{{$product->name}}</strong></div>
                  </div>
                </div>
              </div>
          
              <div class="site-section">
                <div class="container">
                  <div class="row">
                    <div class="col-md-5 mr-auto">
                      <div class="border text-center">
                        <img src="{{asset('images/'.$product->img)}}" alt="Image" class="img-fluid p-5">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <h2 class="text-black">{{$product->name}}</h2>
                      <p>{{$product->desc}}</p>
                      {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, vitae, explicabo? Incidunt facere, natus
                        soluta dolores iusto! Molestiae expedita veritatis nesciunt doloremque sint asperiores fuga voluptas,
                        distinctio, aperiam, ratione dolore.</p> --}}
                      
                        @if (productStatus())
                      <p><del>{{$product->price}}</del>  <strong class="text-primary h4">{{(float)$product->price - (float)$product->discount}}</strong></p>
                        @endif
                      
                      
                      <div class="mb-5">
                        <div class="input-group mb-3" style="max-width: 220px;">
                          <div class="input-group-prepend">
                            <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                          </div>
                          <input type="text" class="form-control text-center" value="1" placeholder=""
                            aria-label="Example text with button addon" aria-describedby="button-addon1">
                          <div class="input-group-append">
                            <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                          </div>
                        </div>
              
                      </div>
                      <form action="{{route('AddToCart', $product->id)}}" method="POST">
                        @csrf
                        <button class="btn btn-primary addtocart"  > Add To Cart</button>
                        </form>
          
                     
          
              
                    </div>
                  </div>
                </div>
              </div>
          
        </div>
      </div>
  
      
      <div class="site-section bg-secondary bg-image" style="background-image: url('images/bg_2.jpg');">
        <div class="container">
          <div class="row align-items-stretch">
            <div class="col-lg-6 mb-5 mb-lg-0">
              <a href="#" class="banner-1 h-100 d-flex" style="background-image: url('images/bg_1.jpg');">
                <div class="banner-1-inner align-self-center">
                  <h2>Pharma Products</h2>
                  <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestiae ex ad minus rem odio voluptatem.
                  </p>
                </div>
              </a>
            </div>
            <div class="col-lg-6 mb-5 mb-lg-0">
              <a href="#" class="banner-1 h-100 d-flex" style="background-image: url('images/bg_2.jpg');">
                <div class="banner-1-inner ml-auto  align-self-center">
                  <h2>Rated by Experts</h2>
                  <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestiae ex ad minus rem odio voluptatem.
                  </p>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
  

@endsection