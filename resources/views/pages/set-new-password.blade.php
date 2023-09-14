@extends('layout.auth')
@section('loginSignin')
<div class="set-password">
    <div class="set-new-pass">
        <div class="thumb-img">
            <img src="/assets/images/photo_2023-03-02_11-46-55.jpg" alt="bg-img"/>
        </div>
        <div class="form-set-new">
            <img src="/assets/images/victor/Vector.png" alt="logo" class="logo"/>
            <div class="text-header">
                <h4 class="title">@lang('index.set_new_password')</h4>
                <p class="sub-title">@lang('index.your_new_password')</p>
            </div>
            <form action="/action_page.php" class="form-set">
                <div class="mb-3 mt-3">
                    <label for="password" class="form-label">@lang('index.password')</label>
                    <input type="password" class="form-control" id="password" placeholder="@lang('index.enter_password')" name="password">
                </div>
                <div class="mb-3">
                    <label for="cpwd" class="form-label">@lang('index.confirm_password')</label>
                    <input type="password" class="form-control" id="cpwd" placeholder="@lang('index.confirm_your_password')" name="confirm-pass">
                </div>
                <button type="submit" class="btn-reset">@lang('index.reset_password')</button>
            </form>
        </div>
    </div>
</div>
@endsection