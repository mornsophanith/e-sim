@extends('layout.app')
@section('title')
| Checkout
@endsection
@section('content')
<div class="container main-checkout">
    <div class="header-title breadcrumb">
        <h4 class="title">@lang('index.shopping_cart')</h4>
    </div>
    <form method="post">
        @csrf
        @if ($order->order_entries)
            <div class="row row-checkout">
                <div class="col-sm-12 col-xs-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8 padding-0px">
                    <?php foreach($order->order_entries as $key1 => $order_entry): ?>
                        <div class="blog-item" id="item{{$order_entry['planId']}}">
                            <div class="remove-cart" onclick="removeItemCart({{$order_entry['planId']}}, true)">
                                <img src="/assets/images/victor/remove.png" alt="remove-icon" />
                            </div>
                            <div class="header-cart">
                                <div class="header-left">
                                    <img src="{{asset('storage/' . $order_entry['image']  )}}" class="product-image fade-animation"/>
                                    <div class="text-info">
                                        <h4 class="title fade-animation">{{$order_entry['name']}}</h4>
                                        <span class="price fade-animation">{{number_format($order_entry['price'], 2)}}$</span>
                                        <input type="hidden" name="order[discount]" value="{{$order->discount}}" />
                                        <input type="hidden" name="order[total]" value="{{$order->total}}" />
                                        <input type="hidden" name="order[order_entries][{{$key1}}][planId]" value="{{$order_entry['planId']}}" />
                                        <input type="hidden" name="order[order_entries][{{$key1}}][name]" value="{{$order_entry['name']}}" />
                                        <input type="hidden" name="order[order_entries][{{$key1}}][image]" value="{{$order_entry['image']}}" />
                                        <input type="number" name="order[order_entries][{{$key1}}][quantity]" value="{{$order_entry['quantity']}}" class="d-none" />
                                        <input type="number" name="order[order_entries][{{$key1}}][price]" value="{{$order_entry['price']}}" class="d-none" />
                                    </div>
                                </div>
                                <div class="header-right fade-animation">
                                    <span class="quantity">
                                        @if(isset($order_entry['order_detail']))
                                            <button class="btn-qty qtyminus minus" type='button' field='quantity'>-</button>
                                        @else
                                            <i class="icon-remove"></i>
                                        @endif
                                        <input type='number' name='quantity' value="{{$order_entry['quantity']}}" class='qty' id='quantity' disabled />
                                        <button class="btn-qty qtyplus plus" type='button' field='quantity'>+</button>
                                    </span>
                                </div>
                            </div>
                            @if (isset($order_entry['order_details']))
                                <?php foreach($order_entry['order_details'] as $key2 => $order_detail):?>
                                    <div class="body-form" id="{{$order_detail['unique_id']}}">
                                        <div class="remove-form fade-animation" onclick="removeOrderDetail({{$order_entry['planId']}}, '{{$order_detail['unique_id']}}')">
                                            <i class="icon-minus"></i>
                                        </div>
                                        <div class="form-set row fade-animation">
                                            <div class="col-sm-2 col-xs-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 fade-animation">
                                                <label for="name{{$key2}}{{$key1}}" class="form-label fade-animation">@lang('index.name')</label>
                                                <input type="text" class="form-control fade-animation" id="name{{$key2}}{{$key1}}" placeholder="@lang('index.enter_name')" name="order[order_entries][{{$key1}}][order_details][{{$key2}}][name]" value="{{$order_detail['name']}}" required>
                                            </div>
                                            <div class="col-sm-2 col-xs-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 fade-animation">
                                                <label for="passport_no{{$key2}}{{$key1}}" class="form-label fade-animation">@lang('index.passport_no')</label>
                                                <input type="text" class="form-control fade-animation" id="passport_no{{$key2}}{{$key1}}" placeholder="@lang('index.enter_passport_no')" name="order[order_entries][{{$key1}}][order_details][{{$key2}}][passport_no]" value="{{$order_detail['passport_no']}}" required>
                                            </div>
                                            <div class="col-sm-2 col-xs-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 fade-animation">
                                                <label for="visa_no{{$key2}}{{$key1}}" class="form-label fade-animation">@lang('index.visa_no')</label>
                                                <input type="text" class="form-control fade-animation" id="visa_no{{$key2}}{{$key1}}" placeholder="@lang('index.enter_visa_no')" name="order[order_entries][{{$key1}}][order_details][{{$key2}}][visa_no]" value="{{$order_detail['visa_no']}}">
                                            </div>
                                            <div class="col-sm-2 col-xs-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 fade-animation">
                                                <label for="air_ticket_no{{$key2}}{{$key1}}" class="form-label fade-animation">@lang('index.air_ticket_no')</label>
                                                <input type="text" class="form-control fade-animation" id="air_ticket_no{{$key2}}{{$key1}}" placeholder="@lang('index.enter_air_ticket_no')" name="order[order_entries][{{$key1}}][order_details][{{$key2}}][air_ticket_no]" value="{{$order_detail['air_ticket_no']}}">
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach?>
                            @elseif (isset($order_entry['order_detail']))
                                <div class="body-form">
                                    <div class="remove-form fade-animation">
                                        <i class="icon-minus"></i>
                                    </div>
                                    <div class="form-set row fade-animation">
                                        <div class="col-sm-2 col-xs-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 fade-animation">
                                            <label for="name" class="form-label fade-animation">@lang('index.name')</label>
                                            <input type="text" class="form-control fade-animation" id="name" placeholder="@lang('index.enter_name')" name="order[order_entries][{{$key1}}][order_detail][name]" value="{{$order_entry['order_detail']['name']}}">
                                        </div>
                                        <div class="col-sm-2 col-xs-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 fade-animation">
                                            <label for="passport_no" class="form-label fade-animation">@lang('index.passport_no')</label>
                                            <input type="text" class="form-control fade-animation" id="passport_no" placeholder="@lang('index.passport_no')" name="order[order_entries][{{$key1}}][order_detail][passport_no]" value="{{$order_entry['order_detail']['passport_no']}}">
                                        </div>
                                        <div class="col-sm-2 col-xs-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 fade-animation">
                                            <label for="visa_no" class="form-label fade-animation">@lang('index.visa_no')</label>
                                            <input type="text" class="form-control fade-animation" id="visa_no" placeholder="@lang('index.visa_no')" name="order[order_entries][{{$key1}}][order_detail][visa_no]" value="{{$order_entry['order_detail']['visa_no']}}">
                                        </div>
                                        <div class="col-sm-2 col-xs-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 fade-animation">
                                            <label for="air_ticket_no" class="form-label fade-animation">@lang('index.air_ticket_no')</label>
                                            <input type="text" class="form-control fade-animation" id="air_ticket_no" placeholder="@lang('index.air_ticket_no')" name="order[order_entries][{{$key1}}][order_detail][air_ticket_no]" value="{{$order_entry['order_detail']['air_ticket_no']}}">
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    <?php endforeach ?>

                    <div class="coupon-code">
                        <h4 class="title fade-animation">@lang('index.coupon_code')</h4>
                        <div class="form-control fade-animation">
                            <input type="text" placeholder="@lang('index.coupon_code')" />
                            <button type="button">@lang('index.apply')</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-xs-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 padding-0px">
                    <div class="cart-total fade-animation">
                        <h4 class="title fade-animation">@lang('index.cart_total')</h4>
                        <div class="sub-total fade-animation">
                            <span class="sub-total-text">@lang('index.sub_total')</span>
                            <span class="sub-total-price">${{number_format($order->total - $order->discount, 2)}}</span>
                        </div>
                        <div class="total fade-animation">
                            <span class="total-text fade-animation">@lang('index.total')</span>
                            <span class="total-price fade-animation">${{number_format($order->total, 2)}}</span>
                        </div>

                        <button type="submit" class="btn-cart-total fade-animation">@lang('index.proceed_to_checkout')</button>
                    </div>
                </div>
            </div>
        @endif
    </form>
</div>
@endsection