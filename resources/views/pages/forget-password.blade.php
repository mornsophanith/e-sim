@extends('layout.auth')
@section('loginSignin')
<div class="reset-password">
    <div class="set-new-pass">
        
        <div class="thumb-img">
            <img src="../assets/images/photo_2023-03-02_11-46-55.jpg" alt="bg-img"/>
        </div>
        <div class="form-set-new">
            <div class="back"> 
               <img src="/assets/images/victor/back.svg" alt="icon-back" />
               <span> @lang('index.back')
            </div>
            <img src="../assets/images/victor/Vector.png" alt="logo" class="logo"/>
            <div class="text-header">
                <h4 class="title">@lang('index.forget_password')</h4>
                <p class="sub-title message-feedback">@lang('index.invalid_email'), @lang('index.try_again')</p>
            </div>
            <form action="/action_page.php" class="form-set">

                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">@lang('index.email_addrees')</label>
                    <input type="email" class="form-control" id="email" placeholder="@lang('index.enter_email')" name="email">
                </div>
                <button type="submit" class="btn-reset">@lang('index.reset_password')</button>
            </form>
        </div>
    </div>
</div>
@endsection