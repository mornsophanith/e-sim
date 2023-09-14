@extends('layout.app')
@section('content')
<section class="main-slider section" id="main-slider">
    <!-- slide banner  -->
    <div class="swiper mySwiper slide-banner" id="aviable-cabodia">
        <div class="swiper-wrapper">
            <?php foreach($banners as $key => $banner):?>
                <div data-hash="slide1" class="swiper-slide">
                    <div class="swiper-slide-opacity"></div>
                    <img src="{{asset('storage/' . $banner->image)}}" alt="slide" />
                    
                    <div class="text">
                        <p class="fade-animation description">{{$banner->description}}</p>
                        <h4 class="fade-animation title">{{$banner->title}}</h4>
                    </div>
                </div>
            <?php endforeach ?>

            @if(count($banners) == 3)
                @php $banner = $banners[0] @endphp
                <div data-hash="slide1" class="swiper-slide">
                    <div class="swiper-slide-opacity"></div>
                    <img src="{{asset('storage/' . $banner->image)}}" alt="slide" />
                    
                    <div class="text">
                        <p class="fade-animation description">{{$banner->description}}</p>
                        <h4 class="fade-animation title">{{$banner->title}}</h4>
                    </div>
                </div>
            @endif
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>

    <!-- slide relate  -->
    <div class="slide-related container" >
        <div class="swiper slideRelate">
            <div class="swiper-wrapper" style="justify-content: @if(count($countries) != 4) center @else flex-start @endif">
                <div data-hash="slide0" class="swiper-slide slide-country">
                    <a href="/?c={{$country->id}}" class="text-center">
                        <div data-hash="slide0" class="swiper-slide active-country">
                            <img src="{{asset('storage/' . $country->icon) }}" alt="slide" />
                        </div>
                        <div class="title-relate">
                            <h4 class="title fade-animation">{{$country->name}}</h4>
                        </div>
                    </a>
                </div>
                <?php foreach($countries as $key => $item): ?>
                    <div data-hash="slide{{$key + 1}}" class="swiper-slide slide-country">
                        <a href="/?c={{$item->id}}" class="text-center">
                            <div data-hash="slide{{$key + 1}}" class="swiper-slide">
                                <img src="{{asset('storage/'. $item->icon)}}" alt="slide" />
                            </div>
                            <div class="title-relate">
                                <h4 class="title fade-animation">{{$item->name}}</h4>
                            </div>
                        </a>
                        
                    </div>
                <?php endforeach ?>
            </div>
            @if(count($countries)  !== 4 )
            @else
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            @endif
        </div>
        
    </div>
</section>
<!-- slide best data plane  -->
<section class="best-data-plans section" id="best-data-plans">
    <div class="container">
        <div class="text-header">
            <h4 class="title fade-animation"> {!! str_replace('{country}', "<span class='special-letter'>" . $country->name . "</span>" , __('index.title_plans'))!!}</h4>
            <p class="sub-title fade-animation">{{str_replace('{country}', $country->name, __('index.sub_title_plans'))}}</p>
        </div>
        <div class="best-plans-slider">
            <div class="swiper bestPlansSlider">
                <div class="swiper-wrapper">
                    <?php foreach($plans as $key => $plan): ?>
                        <div data-hash="slide1" class="swiper-slide" key="{{$key}}">
                            <a href="{{route('plans.show', ['id' => $plan->id])}}">
                                <img src="{{asset('storage/' . $plan->image)}}" alt="slide" />
                                <div class="footer-info">
                                    <div class="descrip">
                                        <h4 class="title">{{$plan->name}}</h4>
                                        <div class="vareint">
                                            <span class="gb">{{$plan->size}}GB</span>
                                            <span class="days">{{$plan->validity}}days</span>
                                        </div>
                                    </div>
                                    <span class="price">{{number_format($plan->price, 2)}}$</span>
                                </div>
                            </a>
                        </div>
                    <?php endforeach ?>
                </div>
                @if(count($plans) !== 3 ) 
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div> 
                @endif
            </div>
        </div>
    </div>
</section>

<!-- servic eSIM work  -->
<section class="service-work section" id="service-work"> 
    <div class="container">
        <div class="security row d-none">
            <div class="col-sm-2 col-xs-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3 text-center">
                <img src="assets/images/victor/security (2).png" alt="icon" />
                <h4 class="title">Security</h4>
                <p class="descrip">Get you covered whenever and wherever in Cambodian minutes</p>
            </div>
                    
            <div class="col-sm-2 col-xs-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3 text-center">
                <img src="assets/images/victor/wall-clock (1) (2).png" alt="icon" />
                <h4 class="title">Save Time</h4>
                <p class="descrip">Buy, get and configure your eSIM in just minutes</p>
            </div>
            <div class="col-sm-2 col-xs-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3 text-center">
                <img src="assets/images/victor/save-money (1) (2).png" alt="icon" />
                <h4 class="title">Save Money</h4>
                <p class="descrip">Save 100% on roaming charges when you travel to Cambodia</p>
            </div>
            <div class="col-sm-2 col-xs-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3 text-center">
                <img src="assets/images/victor/sim-card (2).png" alt="icon" />
                <h4 class="title">Easy</h4>
                <p class="descrip">Have a Cambodian phone number to receive calls and SMS</p>
            </div>
            </ul>
        </div>
        <div class="eSim-work row">
            <h4 class="title fade-letter fade-animation">{!!str_replace('{country}', $country->name , __('index.title_service_work'))!!}</h4>
            <?php foreach ($how_it_works as $key => $how_it_work): ?>
                <div class="col-sm-2 col-xs-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 box-card fade-animation">
                    <img src="{{asset('storage/' . $how_it_work->icon)}}" alt="icon" />
                    <h4 class="title">{{$how_it_work->title}}</h4>
                    <p class="descrip" title="{{$how_it_work->description}}">{{$how_it_work->description}}</p>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>

<!-- what's eSim  -->
<section class="what-esim section" id="what-esim">
    <div class="container">
        <div class="block-eSim row">
            <h4 class="title fade-animation">@lang('index.what_is_esim')</h4>
            <div class="col-sm-2 col-xs-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                <ul>
                    <?php foreach($whatEsims as $key => $whatEsim): ?>
                        <li class="fade-animation">
                            <img src="assets/images/victor/Vector (1).png" alt="icon" />
                            <div class="block-text">
                                <span class="title">{{$whatEsim->title}}</span>
                                <span class="sub-title">No need to insert a physical SIM card.</span>
                            </div>
                        </li>
                    <?php endforeach?>
                </ul>
            </div>
            <div class="col-sm-2 col-xs-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                <div class="swiper mySwiper2">
                    <div class="swiper-wrapper">
                        <?php foreach($whatEsims as $key => $whatEsim): ?>
                            <div class="swiper-slide"> <img src="{{asset('storage/' . $whatEsim->image)}}" alt="icon" class="fade-animation" id="rendom{{$key}}" /></div>
                        <?php endforeach?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- support device  -->
<section class="support-device section" id="spp-device-esim">
    <div class="container">
        <div class="header-title">
            <h4 class="title fade-animation">{!!str_replace('{country}', $country->name  , __('index.title_support_device'))!!}</h4>
            <p class="sub-title fade-animation">{{str_replace('{country}', $country->name, __('index.sub_title_support_device'))}}</p>
        </div>
        <div class="block-device row">
            <?php foreach($support_devices as $key => $support_device): ?>
                <div class="col-sm-2 col-xs-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3 box-card fade-animation">
                    <img src="{{asset('storage/' . $support_device->image )}}" alt="device" class="fade-animation"/>
                    <div class="descrip fade-animation">
                        <p title="{{strip_tags($support_device->description)}}">{{strip_tags($support_device->description)}}</p>
                    </div>
                </div>
        <?php endforeach?>
        </div>
        <div class="link-check fade-animation">
            @lang('index.check') <a href="{{route('esim-support-list')}}"> @lang('index.full_up_to_date_eSIM_support_device_list') </a>
        </div>
    </div>
</section>

<!-- staff slider  -->
<section class="employee-slider d-none">
    <div class="container">
        <div class="row">
            <div class="col-sm-2 col-xs-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 block-center">
                <div class="first-block">
                    <a href="{{route('home')}}">
                        <img src="{{asset('storage/' . setting('site.logo'))}}" alt="logo" class="logo fade-animation"/>
                    </a>
                    <div class="block-text">
                        <h4 class="title fade-animation">@lang('index.esim_tour')</h4>
                        <div class="star fade-animation">
                            <span>5</span>
                            <img src="/assets/images/victor/Vector (2).png" alt="star" class="logo-star"/>
                            <img src="/assets/images/victor/Vector (2).png" alt="star" class="logo-star"/>
                            <img src="/assets/images/victor/Vector (2).png" alt="star" class="logo-star"/>
                            <img src="/assets/images/victor/Vector (2).png" alt="star" class="logo-star"/>
                            <img src="/assets/images/victor/Vector (2).png" alt="star" class="logo-star"/>
                        </div>
                        <span class="sub-title fade-animation">Based on 3 reviews</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-2 col-xs-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8">
                <div class="second-block">
                    <div class="swiper sliderEmployee">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="header-box">
                                    <div class="logo fade-animation">
                                        <span>RT</span>
                                    </div>
                                    <div class="name fade-animation">
                                        <h4 class="title fade-animation">Rous Sothea</h4>
                                    <span class="time fade-animation">a month ago</span>
                                    </div>
                                </div>
                                <div class="star fade-animation">
                                    <img src="assets/images/victor/Vector (2).png" alt="star" class="logo-star"/>
                                    <img src="assets/images/victor/Vector (2).png" alt="star" class="logo-star"/>
                                    <img src="assets/images/victor/Vector (2).png" alt="star" class="logo-star"/>
                                    <img src="assets/images/victor/Vector (2).png" alt="star" class="logo-star"/>
                                    <img src="assets/images/victor/Vector (2).png" alt="star" class="logo-star"/>
                                </div>
                                <div class="descrip fade-animation">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="header-box">
                                    <div class="logo fade-animation">
                                        <span>RT</span>
                                    </div>
                                    <div class="name fade-animation">
                                        <h4 class="title fade-animation">Tuy Dina</h4>
                                    <span class="time fade-animation">a month ago</span>
                                    </div>
                                </div>
                                <div class="star fade-animation">
                                    <img src="assets/images/victor/Vector (2).png" alt="star" class="logo-star"/>
                                    <img src="assets/images/victor/Vector (2).png" alt="star" class="logo-star"/>
                                    <img src="assets/images/victor/Vector (2).png" alt="star" class="logo-star"/>
                                    <img src="assets/images/victor/Vector (2).png" alt="star" class="logo-star"/>
                                    <img src="assets/images/victor/Vector (2).png" alt="star" class="logo-star"/>
                                </div>
                                <div class="descrip fade-animation">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="header-box">
                                    <div class="logo fade-animation">
                                        <span>RT</span>
                                    </div>
                                    <div class="name fade-animation">
                                        <h4 class="title fade-animation">Sok Sopha</h4>
                                    <span class="time fade-animation">a month ago</span>
                                    </div>
                                </div>
                                <div class="star fade-animation">
                                    <img src="assets/images/victor/Vector (2).png" alt="star" class="logo-star"/>
                                    <img src="assets/images/victor/Vector (2).png" alt="star" class="logo-star"/>
                                    <img src="assets/images/victor/Vector (2).png" alt="star" class="logo-star"/>
                                    <img src="assets/images/victor/Vector (2).png" alt="star" class="logo-star"/>
                                    <img src="assets/images/victor/Vector (2).png" alt="star" class="logo-star"/>
                                </div>
                                <div class="descrip fade-animation">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="header-box">
                                    <div class="logo fade-animation">
                                        <span>RT</span>
                                    </div>
                                    <div class="name fade-animation">
                                        <h4 class="title fade-animation">Morn Sophanith</h4>
                                    <span class="time fade-animation">a month ago</span>
                                    </div>
                                </div>
                                <div class="star fade-animation">
                                    <img src="assets/images/victor/Vector (2).png" alt="star" class="logo-star"/>
                                    <img src="assets/images/victor/Vector (2).png" alt="star" class="logo-star"/>
                                    <img src="assets/images/victor/Vector (2).png" alt="star" class="logo-star"/>
                                    <img src="assets/images/victor/Vector (2).png" alt="star" class="logo-star"/>
                                    <img src="assets/images/victor/Vector (2).png" alt="star" class="logo-star"/>
                                </div>
                                <div class="descrip fade-animation">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                </div>
                            </div>

                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection



