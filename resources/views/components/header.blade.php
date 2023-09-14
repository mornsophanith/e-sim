@php
    use Illuminate\Support\Facades\Auth;
    $currentRoute = \Illuminate\Support\Facades\Route::currentRouteName();
@endphp

<div class="main-header web-menu section" id="fixScrollMenu">
    <div class="container row">
        <div class="col-xl-2">
            <a href="{{route('home')}}">
                <img src="{{asset('storage/' . setting('site.logo'))}}" alt="logo" style="width: 100px"/>
            </a>
        </div>
        <div class="col-xl-7">
            <div class="header-menu">
                <ul class="pull-center">
                    <li class="item-menu {{$currentRoute == 'home' ? 'active' : ''}}"><a href="{{route('home')}}">@lang('index.home')</a></li>
                    <li  class="item-menu {{$currentRoute == 'plans.show' ? 'active' : ''}}">
                        <div class="dropdown">
                            <a type="button" href="#" class="dropdown-toggle" data-bs-toggle="dropdown">@lang('index.eSim_plans') 
                                <i class="icon-chevron-down"></i>
                                <i class="icon-chevron-up"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <?php foreach($plans as $key => $plan): ?>
                                    <li key="{{$key}}"><a class="dropdown-item" href="{{route('plans.show', ['id' => $plan->id])}}"><i class="icon-angle-right"></i>{{$plan->name}}</a></li>
                                <?php endforeach?>
                            </ul>
                        </div>
                    </li>
                    <li  class="item-menu">
                        <div class="dropdown">
                            <a type="button" href="#" class="dropdown-toggle" data-bs-toggle="dropdown">@lang('index.get_start')
                                <i class="icon-chevron-down"></i>
                                <i class="icon-chevron-up"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('esim-support-list')}}"><i class="icon-angle-right"></i>@lang('index.esim_support_list')</a></li>
                                <li><a class="dropdown-item" href="{{route('setup-esim')}}"><i class="icon-angle-right"></i>@lang('index.how_to_setup')</a></li>
                                <li><a class="dropdown-item" href="{{$baseUrl}}/#faqs"><i class="icon-angle-right"></i>@lang('index.faqs')</a></li>
                            </ul>
                        </div>
                    </li>
                    <li  class="item-menu {{$currentRoute == 'about' ? 'active' : ''}}"><a href="{{route('about')}}">@lang('index.about')</i></a></li>
                    <li  class="item-menu {{$currentRoute == 'contact' ? 'active' : ''}}"><a href="{{route('contact')}}">@lang('index.contact')</i></a></li>
                </ul>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="header-card">
                <ul class="pull-right">
                    <li>
                        <div class="add-to-card">
                            <div class="cart" type="button" data-bs-toggle="offcanvas" data-bs-target="#addToCardMenuWeb" onclick="showCart()">
                                <img src="/assets/images/victor/cart.png" alt="icon-cart"/>
                                <span class="num-qty" id="cart-count">0</span>
                            </div>
                            
                            <div class="offcanvas offcanvas-end" id="addToCardMenuWeb">
                                @include('component.shopping-cart.index')
                            </div>
                        </div>
                    </li>
                    <li class="account">
                        @if (Auth::guard('web:customer')->check()) 
                            <a href="{{route('account')}}">@lang('index.account')</a>
                        @else 
                            <a href="{{route('account')}}">@lang('index.sign_in')</a>
                        @endif
                    </li>
                    <li class="langue">
                        <div class="dropdown">
                            <span type="button" class="title dropdown-toggle" data-bs-toggle="dropdown" id="titleLang"></span>
                            <ul class="dropdown-menu">
                                <li onclick="displayLang('English')">
                                    <a class="dropdown-item" href="{{url('lang/en')}}">
                                        English
                                        <img src="/assets/images/victor/english.png" alt="icon-lang" />
                                    </a>
                                </li>
                                <li onclick="displayLang('ភាសាខ្មែរ')">
                                    <a class="dropdown-item" href="{{url('lang/km')}}">
                                        ភាសាខ្មែរ
                                        <img src="/assets/images/victor/cambodia.png" alt="icon-lang" />
                                </a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>