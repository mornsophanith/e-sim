@extends('layout.app')
@section('title')
    | {{$planDetail->name}}
@endsection
@section('content')
    <div class="container main-detail">
        <div class="row">
            <div class="col-12 col-sm-12 col-xs-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 blog-detail" style="padding: 30px; padding-top: 0">
                
                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiperDetail2">
                    
                        <div class="swiper-wrapper">
                            <div class="swiper-slide fade-animation">
                                <img src="{{asset('storage/' . $planDetail->image)}}" alt="detail-image" />
                            </div>
                            @if ($planDetail->thumbnail_1 != null)
                                <div class="swiper-slide">
                                    <img src="{{asset('storage/' . $planDetail->thumbnail_1)}}" alt="detail-image" />
                                </div>
                            @endif
                            @if ($planDetail->thumbnail_2 != null)
                                <div class="swiper-slide">
                                    <img src="{{asset('storage/' . $planDetail->thumbnail_2)}}" alt="detail-image" />
                                </div>
                            @endif
                            @if ($planDetail->thumbnail_3 != null)
                                <div class="swiper-slide">
                                    <img src="{{asset('storage/' . $planDetail->thumbnail_3)}}" alt="detail-image" />
                                </div>
                            @endif
                            @if ($planDetail->thumbnail_4 != null)
                                <div class="swiper-slide">
                                    <img src="{{asset('storage/' . $planDetail->thumbnail_4)}}" alt="detail-image" />
                                </div>
                            @endif
                            @if ($planDetail->thumbnail_5 != null)
                                <div class="swiper-slide">
                                    <img src="{{asset('storage/' . $planDetail->thumbnail_5)}}" alt="detail-image" />
                                </div>
                            @endif
                        </div>
                  
                </div>
                <div thumbsSlider="" class="swiper mySwiperDetail">
                    @if (($planDetail->thumbnail_1 && $planDetail->thumbnail_2 && $planDetail->thumbnail_3 && $planDetail->thumbnail_4 && $planDetail->thumbnail_5) != null)
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{asset('storage/' . $planDetail->image)}}" alt="detail-image" />
                            </div>
                            <div class="swiper-slide">
                                @if ($planDetail->thumbnail_1 != null)
                                    <img src="{{asset('storage/' . $planDetail->thumbnail_1)}}" alt="detail-image" />
                                @endif
                            </div>
                            <div class="swiper-slide">
                                @if ($planDetail->thumbnail_2 != null)
                                    <img src="{{asset('storage/' . $planDetail->thumbnail_2)}}" alt="detail-image" />
                                @endif
                            </div>
                            <div class="swiper-slide">
                                @if ($planDetail->thumbnail_3 != null)
                                    <img src="{{asset('storage/' . $planDetail->thumbnail_3)}}" alt="detail-image" />
                                @endif

                            </div>
                            <div class="swiper-slide">
                                @if ($planDetail->thumbnail_4 != null)
                                    <img src="{{asset('storage/' . $planDetail->thumbnail_4)}}" alt="detail-image" />
                                @endif
                            </div>
                            <div class="swiper-slide">
                                @if ($planDetail->thumbnail_4 != null)
                                    <img src="{{asset('storage/' . $planDetail->thumbnail_4)}}" alt="detail-image" />
                                @endif
                            </div>
                        </div>
                    @endif
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-xs-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                <div class="detail-description">
                    <div class="header-description">
                        <h4 class="title fade-animation">{{$planDetail->name}}</h4>
                        <div class="sub-header-title">
                            <span class="price fade-animation">{{number_format($planDetail->price, 2)}}$</span>
                            <div class="header-right fade-animation">
                                <span class="quantity">
                                    <button class="distract qtyminus minus" type='button' field='quantity'>-</button>
                                    <input type='number' name='quantity' value='1' class='qty' id='quantity' />
                                    <button class="subtract qtyplus plus" type='button' field='quantity'>+</button>
                                </span>
                                <button type="button" class="btn-add-to-cart fade-animation" onclick="addToCart({{$planDetail->id}}, document.getElementById('quantity').value)">@lang('index.add_to_cart')</button>
                            </div>
                        </div>
                        <button type="button" class="btn-add-to-cart-2 fade-animation" onclick="addToCart({{$planDetail->id}}, document.getElementById('quantity').value)">@lang('index.add_to_cart')</button>
                    </div>
                    <div class="body-detail">
                        <ul class="list-detail">
                            <li class="item fade-animation">
                                <span class="title text">@lang('index.data')</span>
                                <span class="value-detail text">{{$planDetail->size}}GB</span>
                            </li>
                            <li class="item fade-animation">
                                <span class="title text">@lang('index.validity')</span>
                                <span class="value-detail text">{{$planDetail->validity}}days</span>
                            </li>
                            <?php
                                $specifications = [];
                                if ($planDetail->specification) {
                                    $specifications = json_decode($planDetail->specification, true);
                                }
                            ?>
                            @foreach ($specifications as $key => $specification)
                                <li class="item fade-animation">
                                    <span class="title text">{{$key}}</span>
                                    <span class="value-detail text">{{$specification}}</span>
                                </li>
                            @endforeach
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="relate-datail">
            <div class="row">
                @foreach ($realTimeSolutions as $key =>  $realTimeSolution)
                    <div class="col-12 col-sm-12 col-xs-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 fade-animation fade-animation">
                        <div class="box-cart fade-animation">
                            <img src="{{asset('storage/' . $realTimeSolution->icon)}}" alt="icon" class="icon"/>
                            <h4 class="title fade-animation">{{$realTimeSolution->title}}</h4>
                            <p class="description fade-animation" title="{{$realTimeSolution->description}}">{{$realTimeSolution->description}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="container section-2">
        <div class="row">
            @if($planDetail->description)
                <div class="header-title">
                    <h4 class="title fade-animation">@lang('index.description')</h4>
                </div>
                <p class="description fade-animation">
                    {!!$planDetail->description!!}
                </p>
            @endif
        
            <!-- collaps frequently  -->
            @include('component.frequently.index')

            
        </div>
        <div class="relate-product">
            <div class="header-title breadcrumb">
                <h4 class="title">@lang('index.relate_products')</h4>
            </div>
            <div class="grid-product row">
                @foreach($relatedPlans as $key => $relatedPlan)
                    <div class="col-12 col-sm-12 col-xs-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 margin-bottom fade-animation">
                        <div class="box-card">
                            <img src="{{asset('storage/' . $relatedPlan->image)}}" alt="product" />
                            <div class="text-info">
                                <p class="descript">{{$relatedPlan->name}}</p>
                                <span class="price">{{number_format($relatedPlan->price, 2)}}$</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection