@extends('layout.app')
@section('content')
    <div class="container main-contact">
        <div class="header-title breadcrumb">
            <h4 class="title">@lang('index.contact')</h4>
        </div>

        <div class="map">
            <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3908.350284486479!2d104.87345681533725!3d11.59835674665416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310953487bb0cf5d%3A0x684139999f2c3618!2sThe%20Green%20Community%20Mall!5e0!3m2!1sen!2skh!4v1678347803456!5m2!1sen!2skh" 
            width="100%" 
            height="350" 
            frameborder="0"  
            class="fade-animation"
            style="border:0;border-radius: 8px">
            </iframe>
            <div class="inform-info">
                <div class="row">
                    <div class="col-sm-2 col-xs-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                        <ul class="text-info">
                            <h4 class="title fade-animation">@lang('index.contact')</h4>
                            <li class="fade-animation"> 
                                <i class="icon-phone icon-footer"></i>  
                                <span class="text">{{setting('site.contact_number')}}</span>
                            </li>
                            <li class="fade-animation"> 
                                <i class="icon-envelope icon-footer"></i> 
                                <span class="text">{{setting('site.email')}}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-2 col-xs-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                        <ul class="text-info">
                            <h4 class="title fade-animation">@lang('index.address')</h4>
                            <li class="fade-animation"> 
                                <i class="icon-map-marker icon-footer"></i> 
                                <span class="text">{{setting('site.address')}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-title breadcrumb">
            <h4 class="title">@lang('index.sent_message')</h4>
        </div>

        <div class="form-message">
            <form action="#" class="form-set row">
                <div class="col-sm-2 col-xs-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 fade-animation">
                    <label for="name" class="form-label">@lang('index.name')</label>
                    <input type="text" class="form-control" id="name" placeholder="@lang('index.enter_name')" name="name">
                </div>
                <div class="col-sm-2 col-xs-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 fade-animation">
                    <label for="email" class="form-label">@lang('index.email')</label>
                    <input type="email" class="form-control" id="email" placeholder="@lang('index.enter_email')" name="email">
                </div>
                <div class="col-sm-2 col-xs-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 fade-animation">
                    <label for="message" class="form-label">@lang('index.message')</label>
                    <textarea  type="text" class="form-area" id="message" placeholder="@lang('index.enter_message')" name="message" ></textarea>
                </div>
                <p class="fade-animation">@lang('index.your_message_has_been_sent_successfully')</p>
                <button type="submit" class="send-message fade-animation">@lang('index.reset_password')<img src="/assets/images/victor/send.png" /></button>
            </form>
        </div>
    </div>

@endsection