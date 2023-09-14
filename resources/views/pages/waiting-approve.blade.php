@extends('layout.auth')
@section('loginSignin')
<div class="waiting-approve">
    <div class="set-new-pass">
        <div class="thumb-img">
            <img src="../assets/images/photo_2023-03-02_11-46-55.jpg" alt="bg-img"/>
        </div>
        <div class="form-set-new">
            <img src="../assets/images/victor/Vector.png" alt="logo" class="logo"/>
            <div class="sand-clock">
                <img src="../assets/images/victor/sand-clock 1.png" alt="sand-clock" class="sand-clock"/>
            <div>
            <div class="text-header">
                <h4 class="title">@lang('index.waiting_for_Approval')</h4>
                <p class="sub-title">Thank you for registering for the partnership with our site. We will review it and send you an email letting you know!</p>
            </div>
            <form action="/" class="form-set">
                <button type="submit" class="btn btn-back-login">@lang('index.back_to_home')</button>
            </form>
        </div>
    </div>
</div>
@endsection