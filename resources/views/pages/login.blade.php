@extends('layout.auth')
@section('loginSignin')
<div class="login">
    <div class="set-new-pass">
        <div class="thumb-img">
            <img src="/assets/images/photo_2023-03-02_11-46-55.jpg" alt="bg-img"/>
        </div>
        <div class="form-set-new">
            <img src="/assets/images/victor/Vector.png" alt="logo" class="logo"/>
            <div class="text-header">
                <h4 class="title">@lang('index.create_partner_login')</h4>
            </div>
            <form action={{route('login')}} method="post" class="form-set">
                @csrf
                @error('invalid_account')
                    <p class="message-feedback">{{$errors->first('invalid_account')}}</p>
                @enderror
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">@lang('index.email_addrees')</label>
                    <input type="email" class="form-control" id="email" placeholder="@lang('index.enter_email')" name="email">
                    @error('email')
                        <p class="message-feedback">{{$errors->first('email')}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">@lang('index.password')</label>
                    <input type="password" class="form-control" id="password" placeholder="@lang('index.enter_your_password')" name="password">
                    @error('password')
                    <p class="message-feedback">{{$errors->first('password')}}</p>
                    @enderror
                </div>
                <div class="link-page">
                    <a href="{{route('forget-password')}}">@lang('index.forget_your_password')</a>
                    <span>@lang('index.do_you_have_account') <a href="{{route('register')}}">@lang('index.sign_up')</span>
                </div>
                <button type="submit" class="btn-reset">@lang('index.login_now')</button>
            
            </form>
        </div>
    </div>
</div>
@endsection