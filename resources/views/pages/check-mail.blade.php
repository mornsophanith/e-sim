@extends('layout.auth')
@section('loginSignin')
<div class="check-mail">
    <div class="set-new-pass">
        
        <div class="thumb-img">
            <img src="../assets/images/photo_2023-03-02_11-46-55.jpg" alt="bg-img"/>
        </div>
        <div class="form-set-new">
            <img src="../assets/images/victor/Vector.png" alt="logo" class="logo"/>
            <div class="text-header">
                <h4 class="title">@lang('index.reset_password')</h4>
                <p class="sub-title">@lang('index.message_success'), @lang('index.try_again')</p>
            </div>
            <form action="/action_page.php" class="form-set">
                <button type="submit" class="btn btn-back-login">@lang('index.back_to_login')</button>
            </form>
        </div>
    </div>
</div>
@endsection