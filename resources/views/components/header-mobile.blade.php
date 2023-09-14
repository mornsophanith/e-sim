<div class="mobile-menu section" id="menuMobile">
    <div class="container row">
        <div class="col-6 col-sm-6 col-xs-6 col-md-6">
            <a href="{{route('home')}}">
                <img src="{{asset('storage/' . setting('site.logo'))}}" alt="logo"/>
            </a>
        </div>
        <div class="col-6 col-sm-6 col-xs-6 col-md-6 menu-right">
            <div class="add-to-card">
                <div class="cart" type="button" data-bs-toggle="offcanvas" data-bs-target="#addToCardMobile" onclick="showCartMobile()">
                    <img src="/assets/images/victor/cart.png" alt="icon-cart" class="cart-mobile"/>
                    <span class="num-qty" id="cart-count-mobile">0</span>
                </div>
              
                <div class="offcanvas offcanvas-end" id="addToCardMobile">
                    @include('component.shopping-cart.mobile')
                </div>
            </div>
            <i class="icon-reorder meun-off" type="button" data-bs-toggle="offcanvas" data-bs-target="#menuoff"></i> 
            <div class="offcanvas offcanvas-end" id="menuoff">
                <div class="offcanvas-header">
                    <a href="{{route('home')}}">
                        <img src="../assets/images/victor/Vector.png" alt="logo" />
                    </a>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body">
                   
                    <ul class="list-item">
                        <li class="item"><a href="{{route('home')}}">@lang('index.home')</a></li>
                        
                        <li class="item">
                            <div class="frequently">
                                <button class="accordion">@lang('index.eSim_plans') 
                                    <i class="fa fa-angle-up icon"></i>
                                    <i class="fa fa-angle-down icon"></i>
                                </button>
                                <div class="panel">
                                    <ul>
                                        <?php foreach($plans as $key => $plan): ?>
                                            <li key="{{$key}}"><a class="dropdown-item" href="{{route('plans.show', ['id' => $plan->id])}}"><i class="icon-angle-right"></i>{{$plan->name}}</a></li>
                                        <?php endforeach?>
                                    </ul>
                                </div>
                            </div> 
                        </li>
                        <li class="item">
                            <div class="frequently">
                                <button class="accordion">@lang('index.get_start') 
                                    <i class="fa fa-angle-up icon"></i>
                                    <i class="fa fa-angle-down icon"></i>
                                </button>
                                <div class="panel">
                                    <ul>
                                        <li><a class="dropdown-item" href="{{route('esim-support-list')}}"><i class="icon-angle-right"></i>@lang('index.esim_support_list')</a></li>
                                        <li><a class="dropdown-item" href="{{route('setup-esim')}}"><i class="icon-angle-right"></i>@lang('index.how_to_setup')</a></li>
                                        <li><a class="dropdown-item" href="{{$baseUrl}}/#faqs"><i class="icon-angle-right"></i>@lang('index.faqs')</a></li>
                                    </ul>
                                </div>
                            </div> 
                        </li>
                        <li class="item"><a href="{{route('about')}}" >@lang('index.about')</a></li>
                        <li class="item"><a href="{{route('contact')}}" >@lang('index.contact')</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>