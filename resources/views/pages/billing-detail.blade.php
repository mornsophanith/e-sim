@extends('layout.app')
@section('content')
<div class="container">
    <div class="header-title breadcrumb">
        <h4 class="title">@lang('index.billing_detail')</h4>
    </div>
    <form method="post" class="form-set">
        @csrf
        <div class="row">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="col-sm-2 col-xs-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                <div class="first-block">
                    <form class="form-set">
                        <div class="mb-3 fade-animation">
                            <label for="fullName" class="form-label fade-animation">@lang('index.full_name')</label>
                            <input type="text" class="form-control fade-animation" id="fullName" placeholder="@lang('index.full_name')" name="name" value="{{$profile->name}}" required>
                            <div class="invalid-feedback">Full Name is required</div>
                        </div>
                        <div class="mb-3 fade-animation">
                            <label for="country" class="form-label fade-animation">@lang('index.country_region')</label>
                            <select class="form-select fade-animation" id="country" name="countryId">
                                @foreach ($countries as $country)
                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 fade-animation">
                            <label for="state" class="form-label fade-animation">@lang('index.state_country')</label>
                            <input type="text" class="form-control fade-animation" id="state" placeholder="@lang('index.state_country')" name="state">
                        </div>
                        <div class="mb-3 fade-animation">
                            <label for="email" class="form-label fade-animation">@lang('index.email')</label>
                            <input type="email" class="form-control fade-animation" id="email" placeholder="@lang('index.email')" name="email" value="{{$profile->email}}" required>
                        </div>
                        <div class="mb-3 fade-animation">
                            <label for="number" class="form-label fade-animation">@lang('index.phone')</label>
                            <input type="number" class="form-control fade-animation" id="number" placeholder="@lang('index.phone')" name="phone" value="{{$profile->phone}}" required>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-2 col-xs-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                <div class="second-blog">
                    <h4 class="title fade-animation">@lang('index.your_order')</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="title-header fade-animation">@lang('index.product')</th>
                                <th class="title-header text-align-right fade-animation">@lang('index.sub_total')</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($cart->order_entries as $order_entry): ?>
                            <tr>
                                <td class="title-product fade-animation"> 
                                    {{$order_entry["name"]}}
                                    * <span> {{$order_entry["quantity"]}}</span>
                                </td>
                                <td class="price fade-animation">${{number_format($order_entry["price"], 2)}}</td>
                            </tr>
                            <?php endforeach?>
                            <tr class="blog-total-price fade-animation">
                                <td class="sub-total fade-animation">
                                    <span> @lang('index.sub_total')</span>
                                    <span> @lang('index.discount')</span>
                                </td>
                                <td class="price fade-animation">
                                    <div>${{number_format($cart->total, 2)}}</div>
                                    <div>${{number_format($cart->discount, 2)}}</div>
                                </td>
                            </tr>
                            <tr class="fade-animation">
                                <td class="total fade-animation">@lang('index.total')</td>
                                <td class="total-price fade-animation">${{number_format($cart->total - $cart->discount, 2)}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="btn-submit">
                        <button type="submit" class="btn-submit-Order fade-animation">@lang('index.submit_my_order')</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection