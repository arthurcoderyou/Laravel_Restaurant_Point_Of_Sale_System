<!-- HEADER DESKTOP-->
    <header class="header-desktop3 d-none d-lg-block">
        <div class="section__content section__content--p35">
            <div class="header-wrap">
                @auth
                  
                    @if(auth()->user()->role == 'admin')
                        <div class="header__logo">
                            <a href="#" >
                                <img src="{{ asset('theme/images/icon/logo-white.png') }}" alt="CoolAdmin" />
                            </a>
                        </div>
                    @else
                    
                    @endif
                
                @endauth
                @guest
               
                @endguest

                <div class="header__navbar">
                    <ul class="list-unstyled">
                        @auth
                            @if(auth()->user()->role == "admin")
                                <li >
                                    <a href="/">
                                        <i class="fas fa-tachometer-alt"></i>Dashboard
                                        <span class="bot-line"></span>
                                    </a>
                                    
                                </li>
                            @endif
                        @endauth
                        
                        <li class="has-sub">
                            <a href="#">
                                <i class="fas fa-shopping-basket"></i>
                                <span class="bot-line"></span>Menu</a>
                            <ul class="header3-sub-list list-unstyled">
                                @auth
                                    @if(auth()->user()->role == "admin")
                                        <li>
                                            <a href="/admin/menu/create">Add Menu</a>
                                        </li>
                                    @endif
                                @endauth
                                <li>
                                    <a href="/admin/menu/index">View All Menu</a>
                                </li>
                                
                            </ul>
                        </li>
                        
                        <li >
                            @php    
                                $link = "/admin/cart/index";
                            @endphp
                            <x-cart_link :cart_link="$link"/>
                            
                        </li>
                        {{--
                        <li>
                            <a href="#">
                                <i class="fas fa-group"></i>
                                <span class="bot-line"></span>Users</a> 
                        </li>
                          --}}
                        
                        @php
                            $orderLink = "/admin/order/orders";
                        @endphp
                        <li>
                            <x-order-link :order_link="$orderLink"></x-order-link>
                        
                        </li>
                        
                        
                        @auth 
                            
                            
                            
                            @if(auth()->user()->role == "admin")
                                <li class="has-sub">
                                    <a href="#">
                                        <i class="fas fa-credit-card"></i>
                                        <span class="bot-line"></span>Transactions</a>
                                    <ul class="header3-sub-list list-unstyled">
                                        <li>
                                            @php 
                                                $color = "info";
                                                $spanData = "pending";
                                            @endphp
                                            <a href="/admin/order/pending_orders">Pending <x-trans-badge :color='$color' :spanData='$spanData'> </x-trans-badge></a>
                                        </li>
                                        <li>
                                            @php 
                                                $color = "success";
                                                $spanData = "completed";
                                            @endphp
                                            <a href="/admin/order/completed_orders">Completed <x-trans-badge :color='$color' :spanData='$spanData'> </x-trans-badge></a>
                                        </li>
                                        <li>
                                            @php 
                                                $color = "danger";
                                                $spanData = "denied";
                                            @endphp
                                            <a href="/admin/order/denied_orders">Reject <x-trans-badge :color='$color' :spanData='$spanData'> </x-trans-badge></a>
                                        </li>
                                        
                                    </ul>
                                </li>

                                
                                <li>
                                    <a href="/admin/sales/sales_report">
                                        <i class="fas fa-bar-chart-o"></i>
                                        <span class="bot-line"></span>Sales Report</a>
                                </li>
                            @endif
                        @endauth
                                {{-- 
                        @guest
                            <li class="has-sub">
                                <a href="#">
                                    <i class="fas fa-copy"></i>
                                    <span class="bot-line"></span>Account</a>
                                <ul class="header3-sub-list list-unstyled">
                                    <li>
                                        <a href="/login">Login</a>
                                    </li>
                                    <li>
                                        <a href="/register">Register</a>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                         --}}

                        
                    </ul>{{-- end of list --}}
                </div>
                <div class="header__tool">
                
                @auth
                    <div class="account-wrap">
                        <div class="account-item account-item--style2 clearfix js-item-menu">
                            
                            <div class="content">
                                <a class="js-acc-btn" href="#">{{ auth()->user()->name }}</a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    {{--
                                    <div class="image">
                                        <a href="#">
                                            <img src="{{ asset('theme/images/icon/avatar-01.jpg') }}" alt="{{ auth()->user()->name }}" />
                                        </a>
                                    </div>
                                      --}}
                                    <div class="content">
                                        <h5 class="name">
                                            <a href="#">{{ auth()->user()->name }}</a>
                                        </h5>
                                        <span class="email">{{ auth()->user()->email }}</span>
                                    </div>
                                </div>
                                
                                <div class="account-dropdown__footer">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a onclick="event.preventDefault();this.closest('form').submit();">
                                            <i class="zmdi zmdi-power"></i>Logout</a>
                                    </form>
                                    
                                </div>
                            </div>

                        </div>
                    </div>
                @endauth


                </div>
            </div>
        </div>
    </header>
<!-- END HEADER DESKTOP-->

<!-- HEADER MOBILE-->
    <header class="header-mobile header-mobile-2 d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                @auth
                    @if(auth()->user()->role == 'admin')
                        <a class="logo" href="index.html">
                            <img src="{{ asset('theme/images/icon/logo-white.png') }}" alt="CoolAdmin" />
                        </a>
                    @endif
                @endauth
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            

            <ul class="navbar-mobile__list list-unstyled">
                @auth
                    @if(auth()->user()->role == "admin")
                        <li >
                            <a href="/">
                                <i class="fas fa-tachometer-alt"></i>Dashboard
                                <span class="bot-line"></span>
                            </a>
                            
                        </li>
                    @endif
                @endauth
                
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-shopping-basket"></i>Menu</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        @auth
                            @if(auth()->user()->role == "admin")
                                <li>
                                    <a href="/admin/menu/create">Add Menu</a>
                                </li>
                            @endif
                        @endauth
                        <li>
                            <a href="/admin/menu/index">View All Menu</a>
                        </li>
                    </ul>
                </li>

                <li >
                    @php    
                        $link = "/admin/cart/index";
                    @endphp
                    <x-cart_link :cart_link="$link"/>
                    
                </li>

                @php
                    $orderLink = "/admin/order/orders";
                @endphp
                <li>
                    <x-order-link :order_link="$orderLink"></x-order-link>
                </li>
                @auth 
                    
                    

                    

                    @if(auth()->user()->role == "admin")
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-credit-card"></i>
                                <span class="bot-line"></span>Transactions</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    @php 
                                        $color = "info";
                                        $spanData = "pending";
                                    @endphp
                                    <a href="/admin/order/pending_orders">Pending <x-trans-badge :color='$color' :spanData='$spanData'> </x-trans-badge></a>
                                </li>
                                <li>
                                    @php 
                                        $color = "success";
                                        $spanData = "completed";
                                    @endphp
                                    <a href="/admin/order/completed_orders">Completed <x-trans-badge :color='$color' :spanData='$spanData'> </x-trans-badge></a>
                                </li>
                                <li>
                                    @php 
                                        $color = "danger";
                                        $spanData = "denied";
                                    @endphp
                                    <a href="/admin/order/denied_orders">Reject <x-trans-badge :color='$color' :spanData='$spanData'> </x-trans-badge></a>
                                </li>
                                
                            </ul>
                        </li>

                        
                        <li>
                            <a href="/admin/sales/sales_report">
                                <i class="fas fa-bar-chart-o"></i>
                                <span class="bot-line"></span>Sales Report</a>
                        </li>
                    @endif
                @endauth
                    {{-- 
                @guest
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-copy"></i>
                            <span class="bot-line"></span>Account</a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                <a href="/login">Login</a>
                            </li>
                            <li>
                                <a href="/register">Register</a>
                            </li>
                        </ul>
                    </li>
                @endguest
                 --}}

            </ul>{{-- end of list style --}}
        </div>
    </nav>
    </header>
    <div class="sub-header-mobile-2 d-block d-lg-none">
    <div class="header__tool">
        @auth
        <div class="account-wrap">
            <div class="account-item account-item--style2 clearfix js-item-menu">

                <div class="content">
                    <a class="js-acc-btn" href="#">{{ auth()->user()->name }}</a>
                </div>
                <div class="account-dropdown js-dropdown">
                    <div class="info clearfix">
                        {{--
                            <div class="image">
                                <a href="#">
                                    <img src="{{ asset('theme/images/icon/avatar-01.jpg') }}" alt="{{ auth()->user()->name }}" />
                                </a>
                            </div>
                        --}}
                        <div class="content">
                            <h5 class="name">
                                <a href="#">{{ auth()->user()->name }}</a>
                            </h5>
                            <span class="email">{{ auth()->user()->email }}</span>
                        </div>
                    </div>
                    
                    <div class="account-dropdown__footer">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a onclick="event.preventDefault();this.closest('form').submit();">
                                <i class="zmdi zmdi-power"></i>Logout</a>
                        </form>
                        
                    </div>
                </div>

            </div>
        </div>
        @endauth
    </div>
    </div>
<!-- END HEADER MOBILE -->