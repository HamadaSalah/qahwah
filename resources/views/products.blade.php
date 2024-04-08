@extends('layouts.app')
@section('content')
 
<div class="ourmenu mt-5 mb-5">
  <div class="container">
      <div class="row">

          <div class="col-md-12">
              <div class="mymenu wow pulse ">
                  <p>OUR MENU</p>
                  <h1>Discover Menu</h1>

                  <nav>
                      <div class="nav nav-tabs" id="nav-tab" role="tablist">

                        @foreach ($categories as $key => $category)
                            <button class="nav-link <?php if($loop->index == 0) echo 'active'; ?>" id="nav-{{ $category->name }}-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-{{ $category->name }}" type="button" role="tab" aria-controls="nav-{{ $category->name }}"
                                aria-selected="true">
                                <img src="{{ asset('images/'.$category->img) }}" alt="">
                                <h5>{{ $category->name }}</h5>
                            </button>                            
                        @endforeach

                      </div>
                  </nav>

                   <div class="tab-content" id="nav-tabContent">
                    @foreach ($categories as $key => $category)
                        <div class="tab-pane fade show <?php if($loop->index == 0) echo 'active'; ?>" id="nav-{{ $category->name }}" role="tabpanel" aria-labelledby="nav-{{ $category->name }}-tab">
                            <div class="row">
                                    <div class="col-md-6">
                                        <div class="menus">
                                            <div class="row">
                                                @foreach ($category->products->slice(0, ceil($category->products->count()/2)) as $prod)
                                                    <div class="oneMenu">
                                                        <img src="{{ asset('images/'.$prod->img) }}">
                                                        <div class="headandp">
                                                            <h3>{{ $prod->name }}</h3>
                                                            <p>{{$prod->desc}}</p>
                                                        </div>
                                                        <div class="myprice">
                                                            <form action="{{route('AddToCart', $prod->id)}}" method="POST">
                                                                @csrf
                                                                <button class="btn   addtocart">
                                                                    <img src="{{ asset('front/img/cart2.svg') }}" alt="" style="width: 27px;"> 
                                                                </button>
                                                            </form>
    
                                                            <span>{{ $prod->price }}$</span>
                                                        </div>
                                                    </div>                                                
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="col-md-6">
                                        <div class="menus">
                                            <div class="row">
                                                @foreach ($category->products->slice(ceil($category->products->count()/2), ceil($category->products->count())) as $prod)
                                                    <div class="oneMenu">
                                                        <img src="{{ asset('images/'.$prod->img) }}">
                                                        <div class="headandp">
                                                            <h3>{{ $prod->name }}</h3>
                                                            <p>{{$prod->desc}}</p>
                                                        </div>
                                                        <div class="myprice">
                                                            <form action="{{route('AddToCart', $prod->id)}}" method="POST">
                                                                @csrf
                                                                <button class="btn   addtocart">
                                                                    <img src="{{ asset('front/img/cart2.svg') }}" alt="" style="width: 27px;"> 
                                                                </button>
                                                            </form>
    
                                                            <span>{{ $prod->price }}$</span>
                                                        
                                                        </div>
                                                    </div>                                                
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    @endforeach
                </div>
 
            </div>

              </div>
          </div>
      </div>
  </div>
</div>
 
 @push('scripts')
 

 @endpush
@endsection