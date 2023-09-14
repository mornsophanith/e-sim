@extends('layout.app')
@section('content')
    <div class="container account">
        <div class="breadcrumb">
            <h4 class="title">Account</h4>
            <a href="{{route('login')}}" type="button" class="btn-signout">Sign Out</button>
        </div>
        <div class="header-form-account">
            <h4 class="title">Hello, Admin</h4>
            <!-- <button class="btn-edit"><i class="icon-edit"></i> Sign Out</button> -->
        </div>

        <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'personal')" id="defaultOpen"><i class="icon-cog"></i>  Personal Info</button>
            <button class="tablinks" onclick="openCity(event, 'Paris')"><i class="icon-time"></i> History</button>
            <button class="tablinks" onclick="openCity(event, 'Tokyo')"><i class="icon-key"></i> Change Password</button>
        </div>

        <div id="personal" class="tabcontent">
            <form action="/action_page.php" class="form-set">
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">@lang('index.name')</label>
                    <input type="text" class="form-control" id="name" placeholder="@lang('index.enter_name')" name="name">
                </div>
                <div class="mb-3">
                    <label for="cpwd" class="form-label">@lang('index.phone')</label>
                    <input type="number" class="form-control" id="number" placeholder="Enter number" name="number">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">@lang('index.email')</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
                <div class="btn-form">
                    <button type="submit" class="btn btn-cancel">@lang('index.cancel')</button>
                    <button type="submit" class="btn btn-update">@lang('index.update')</button>
                </div>            
            </form>
        </div>

        <div id="Paris" class="tabcontent" style="display: none">
            <h3>Paris</h3>
            <p>Paris is the capital of France.</p> 
        </div>

        <div id="Tokyo" class="tabcontent" style="display: none">
            <h3>Tokyo</h3>
            <p>Tokyo is the capital of Japan.</p>
        </div>
    </div>
@endsection