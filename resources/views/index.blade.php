@extends('layouts.app')
@section('content')

 

<div class="mycarousel">
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
              aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
              aria-label="Slide 2"></button>
      </div>
      <div class="carousel-inner">
        @foreach ($sliders as $slid)
        <div class="carousel-item <?php if($loop->index == 0) echo 'active';?>">
            <img src="{{ asset('images/'.$slid->img) }}" class="d-block w-100" alt="{{ $slid->head }}">
            <div class="carousel-caption d-md-block">
                <h5 class="example{{$loop->index}}" data-word="{{$slid->head}}">&nbsp;</h5>
            </div>

        </div>
        @endforeach
      </div>

  </div>
</div>

<!-- //div of about us -->
<div class="aboutus">
  <div class="container">
      <div class="row">
          <div class="col-md-6">
              <div class="aboutside">
                  <h1 class="word">VALLEY</h1>
                  <h1 class="word2">QAHWAH</h1>
                  <img src="{{ asset('front/img/man.png') }}" alt="">
              </div>
          </div>
          <div class="col-md-6">
              <div class="rightabout">
                  <h2>{{ $set->about_head }}</h2>
                  <p>{{ $set->about_p1 }}
                  </p>
                  <p style="color:#9b9998">{{ $set->about_p2 }}
                  </p>
                  <button class="btn gbbtn">DISCOVER</button>
              </div>
          </div>
      </div>
  </div>
</div>

<div class="bestSeller wow bounceInUp+">
  <div class="container">
      <h1>Best<br />Sellers</h1>
      <div class="row">
        @foreach ($bestSellers as $seller)
            <div class="col-md-4 wow bounceInUp ">
                <div class="bestSell">
                    <img src="{{ asset('images/'.$seller->img) }}" alt="">
                    <h3>{{ $seller->name }}</h3>
                    <p>{{ $seller->desc }}</p>
                    <div class="addCart">
                        
                        <form action="{{route('AddToCart', $seller->id)}}" method="POST" style="display: inline-block">
                            @csrf
                            <button class="btn   addtocart" type="submit">
                                <img src="{{ asset('front/img/cart2.svg') }}" alt="" style="width: 27px;margin-right: 10px">
                                  </i> <span class="Price">{{ $seller->price }}$</span>
                            </button>
                        </form>

                    </div>
                </div>
            </div>            
        @endforeach

      </div>
  </div>
</div>

<div class="ourmenu">
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
                                                        <form action="{{route('AddToCart', $seller->id)}}" method="POST">
                                                            @csrf
                                                            <button class="btn   addtocart">
                                                                <img src="{{ asset('front/img/cart2.svg') }}" alt="" style="width: 27px;"> 
                                                            </button>
                                                        </form>
                                
                                                        <span>{{ $prod->price }}$</span></div>
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
                                                        <form action="{{route('AddToCart', $seller->id)}}" method="POST">
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
                      <a href="{{ route('menu') }}"><button class="btn mybtn">FULL MENU</button></a>

            </div>

              </div>
          </div>
      </div>
  </div>
</div>
 
 @push('scripts')
 <script>
    new WOW().init();

    $(document).ready(function () {

        var myWord = $('.example0').attr('data-word');
        $('.example0').html("");

        $(".example0").typewriter({
            text: myWord,
            waitingTime: 0,
            delay: 100,
            hide: 0,
            cursor: true,
        });
    });
    $(document).ready(function () {

        var myWord = $('.example1').attr('data-word');
        $('.example0').html("");

        $(".example1").typewriter({
            text: myWord,
            waitingTime: 0,
            delay: 100,
            hide: 0,
            cursor: true,
        });
    });
    $(document).ready(function () {
        
        var myWord = $('.example2').attr('data-word');
        $('.example0').html("");

        $(".example2").typewriter({
            text: myWord,
            waitingTime: 0,
            delay: 100,
            hide: 0,
            cursor: true,
        });
    });
    $(document).ready(function () {
        var myWord = $('.example3').attr('data-word');
        $(".example3").typewriter({
            text: myWord,
            waitingTime: 0,
            delay: 100,
            hide: 0,
            cursor: true,
        });
    });
    $(document).ready(function () {
        var myWord = $('.example4').attr('data-word');
        $(".example4").typewriter({
            text: myWord,
            waitingTime: 0,
            delay: 100,
            hide: 0,
            cursor: true,
        });
    });


    $(document).ready(function () {
        function moveWord() {
            $(".word").animate({
                top: "+=30px"
            }, 1000, "linear").delay(500).animate({
                top: "-=30px"
            }, 1000, "linear", moveWord);
        }
        moveWord();
    });

    $(document).ready(function () {
        function moveWord() {
            $(".word2").animate({
                top: "-=30px"
            }, 1000, "linear").delay(500).animate({
                top: "+=30px"
            }, 1000, "linear", moveWord);
        }
        moveWord();
    });
</script>

 @endpush
@endsection