<div class="footer section">
    <div class="container">
        <div class="row">
            <div class="col-sm-2 col-xs-12 col-md-12 col-lg-12 col-xl-2 col-xxl-2 align-logo mb-10px">
                <div class="logo">
                    <a href="{{route('home')}}">
                        <img src="{{asset('storage/' . setting('site.logo'))}}" alt="logo" />
                    </a>
                </div>
            </div>
            <div class="col-sm-4 col-xs-12 col-md-12 col-lg-12 col-xl-4 col-xxl-4 mb-10px">
                <div class="footer-info">
                    <h4 class="title">@lang('index.contact_info')</h4>
                    <ul>
                        <li> 
                            <i class="icon-map-marker icon-footer"></i> 
                            <span class="text">{{setting('site.address')}}</span>
                        </li>
                        <li> 
                            <i class="icon-phone icon-footer"></i>  
                            <span class="text">{{setting('site.contact_number')}}</span>
                        </li>
                        <li> 
                            <i class="icon-envelope icon-footer"></i> 
                            <span class="text">{{setting('site.email')}}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-3 col-xs-12 col-md-12 col-lg-12 col-xl-3 col-xxl-3 mb-10px">
                <div class="footer-info">
                    <h4 class="title">@lang('index.esim_tour')</h4>
                    <ul>
                        <li> 
                            <a href="/about">@lang('index.about')</a>
                        </li>
                        <li> 
                            <a href="/contact">@lang('index.contact')</a>
                        </li>
                    </ul>
                    
                </div>
            </div>
            <div class="col-sm-3 col-xs-12 col-md-12 col-lg-12 col-xl-3 col-xxl-3">
                <div class="footer-info">
                    <h4 class="title">@lang('index.support')</h4>
                    <ul>
                        <li> 
                            <a href="{{route('esim-support-list')}}">@lang('index.esim_compatible_devices')</a>
                        </li>
                        <li> 
                            <a href="{{route('setup-esim')">@lang('index.how_to_set_your_esim')</a>
                        </li>
                        <li> 
                            <a href="#faqs">@lang('index.faqs')</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copy-right row">
            <div class="col-12 col-sm-12 col-xs-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 left ">
                <span class="text">@lang('index.copyright') 2023 - @lang('index.esim_for_tour'). @lang('index.all_right_reserved')</span>
            </div>
            <div class="col-12 col-sm-3 col-xs-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 right">
                <img src="../assets/images/victor/facebook.png" class="icon-footer" alt="icon" />
                <img src="../assets/images/victor/telegram.png" class="icon-footer" alt="icon" />
                <i class="icon-instagram icon-footer"></i>
            </div>
        <div>
    </div>
</div>