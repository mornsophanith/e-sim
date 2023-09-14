@extends('layout.auth')
@section('loginSignin')
<div class="register">
    <div class="set-new-pass">
        <div class="thumb-img">
            <img src="../assets/images/photo_2023-03-02_11-46-55.jpg" alt="bg-img"/>
        </div>
        <div class="form-set-new">
            <img src="../assets/images/victor/Vector.png" alt="logo" class="logo"/>
            <div class="text-header">
                <h4 class="title">@lang('index.create_your_account')</h4>
            </div>
            <form action={{route('register')}} method="POST" class="form-set">
                @csrf
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">@lang('index.name')</label>
                    <input type="text" class="form-control" id="name" placeholder="@lang('index.enter_name')" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="number" class="form-label">@lang('index.phone_number')</label>
                    <div class="select-country">
                      
                        <div class="dropdown">
                            <button  type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                                <img src="{{asset('storage/' . $currentCountry->icon)}}"  alt="icon-lang" id="icon"/>
                                <span id="btn-country">{{$currentCountry->country_code}}</span>
                                <i class="icon-angle-down"></i> 
                            </button>
                            <ul class="dropdown-menu">
                                @foreach($countries as $key => $country)
                                    <li id="{{$country->id}}" onclick="onChangeCountryCode({{$country->id}})">
                                        <img src="{{asset('storage/' . $country->icon)}}" alt="icon-lang"/>
                                        <a class="dropdown-item" href="#">
                                            @if ($country->country_code)
                                                {{$country->country_code}}
                                            @endif
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <input type="number" class="form-control form-number" id="number" placeholder="@lang('index.enter_number')" name="phone">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">@lang('index.email')</label>
                    <input type="email" class="form-control" id="email" placeholder="@lang('index.enter_your_email')" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">@lang('index.password')</label>
                    <input type="password" class="form-control" id="password" placeholder="@lang('index.enter_your_password')" name="password" required>
                </div>
                <div class="link-page">
                    <span>@lang('index.already_registered') <a href="{{route('login')}}">@lang('index.Log_in_here')</span>
                </div>
                <button type="submit" class="btn-reset">@lang('index.create_account')</button>
            </form>
        </div>
    </div>
</div>
@endsection