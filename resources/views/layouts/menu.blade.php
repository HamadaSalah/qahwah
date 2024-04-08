<nav class="navbar navbar-expand-lg bg-body-tertiary ">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}"><img
                src="{{ asset('front/img/logo.png') }}" style="width: 150px;" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">About
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('menu') }}">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('location') }}">Location</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contacts') }}">Contact Us</a>
                </li>
            </ul>
            <div class="rightIcons">
                @guest
                    <a href="{{ Route('login') }}">
                        <button class="btn loginbtn">Login</button></a>
                @else
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                           <img src="{{ asset('front/img/user.svg') }}" alt="" style="width: 27px;">
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li style="width: 100%"><a class="dropdown-item" href="{{ Route('orders') }}">My Orders</a>
                            </li>
                            <li  style="width: 100%">
                                <form action="{{ Route('logout') }}" method="POST">
                                    @csrf
                                    <button class=" " style="background: 0;border: 0;width: 100%;text-align: left;padding-left:15px"> Logout </button>
                                </form>
                                
                            </li>
                        </ul>
                    </div>



                @endguest

                <a href="{{ Route('cart') }}" style="float: right">
                    
                    <li style="position: relative">
                        <img src="{{ asset('front/img/cart.svg') }}" alt="" style="width: 27px;">
                        <span style="<?php if(CartCount() == 0) echo 'display:none'; ?>" class="number">{{CartCount()}}</span></li>
                </a>
                <a href="#" style="float: right;margin-right: 20px">
                    
                    <li style="position: relative">
                        <img src="{{ asset('front/img/search.svg') }}" class="searchSvg" alt="" style="width: 27px;">
                    </li>
                </a>

            </div>
        </div>
    </div>
</nav>
