@extends('layout.app')
@section('content')
    <div class="container account">
        <div class="breadcrumb">
            <h4 class="title">@lang('index.account')</h4>
            <a href={{route('logout')}} class="btn-signout">@lang('index.sign_out')</a>
        </div>
        <div class="header-form-account">
            <h4 class="title">@lang('index.hello'), @lang('index.admin')</h4>
            <a type="submit" href="{{route('update-account')}}" class="btn-edit"><i class="icon-edit"></i>@lang('index.edit')</a>
        </div>

        <div class="account-tab">
            <div class="tab">
                <button class="tablinks" onclick="openCity(event, 'personal')" id="defaultOpen"><i class="icon-cog"></i>@lang('index.personal_info')</button>
                <button class="tablinks" onclick="openCity(event, 'history')"><i class="icon-time"></i>@lang('index.history')</button>
                <button class="tablinks" onclick="openCity(event, 'change_pass')"><i class="icon-key"></i>@lang('index.change_password')</button>
            </div>

            <div id="personal" class="tabcontent">
                <div class="row">
                    <div class="col-12 col-sm-12 col-xs-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 mb-20px">
                        <div class="blog-descript">
                            <h5 class="title">@lang('index.name')</h5>
                            <span class="sub-title">{{$profile->name}}</span>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-xs-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 mb-20px">
                        <div class="blog-descript">
                            <h5 class="title">@lang('index.phone')</h5>
                            <span class="sub-title">{{$profile->phone}}</span>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-xs-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 mb-20px">
                        <div class="blog-descript">
                            <h5 class="title">@lang('index.email')</h5>
                            <span class="sub-title">{{$profile->email}}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div id="history" class="tabcontent" style="display: none">
                <div class="main-header-history">
                    <div class="header" id="mainHeader">
                        <div class="btn-header-left">
                            <input type="text" placeholder="@lang('index.from_date')" onfocus="(this.type='date')" onblur="(this.type='text')" name="from_date" class="form-date-rang"/>
                            <input type="text" placeholder="@lang('index.to_date')" onfocus="(this.type='date')" onblur="(this.type='text')" name="to_date" class="form-date-rang"/>
                        </div>
                        <div class="btn-header-right">
                            <button class="btn btn-search"><i class="icon-search"></i> @lang('index.search')</button>
                        </div>
                    </div>
                    <div class="body-item">
                        <ul class="list-item">
                            <li class="item">
                                <a href="{{route('detail-history')}}">
                                    <span class="title">3 items</span>
                                    <div class="date-time">
                                        <h5 class="date">07 Mar 2023</h5>
                                        <span class="time">2:51 PM</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <ul class="pagination justify-content-end">
                            <li class="page-item disabled"><a class="page-link" href="#">Prev</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">10</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div id="change_pass" class="tabcontent" style="display: none">
                <form class="form-set">
                    <div class="mb-3">
                        <label for="cpwd" class="form-label">@lang('index.old_password')</label>
                        <input type="password" class="form-control" id="cpwd" placeholder="@lang('index.old_password')" name="confirm-pass">
                    </div>
                    <div class="mb-3">
                        <label for="cpwd" class="form-label">@lang('index.new_password')</label>
                        <input type="password" class="form-control" id="cpwd" placeholder="@lang('index.new_password')" name="confirm-pass">
                    </div>
                    <div class="mb-3">
                        <label for="cpwd" class="form-label">@lang('index.confirm_password')</label>
                        <input type="password" class="form-control" id="cpwd" placeholder="@lang('index.confirm_password')" name="confirm-pass">
                    </div>
                    <button type="submit" class="btn-save-change">@lang('index.save_change')</button>
                </form>
            </div>
        </div>
    </div>
@endsection