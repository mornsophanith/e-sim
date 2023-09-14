@extends('layout.app')
@section('content')
<div class="container esim-support-list">
    <div class="header-title breadcrumb">
        <h4 class="title">@lang('index.esim_compatible_devices')</h4>
    </div>
    <div class="description">
        {!!$page->body!!}
    </div>
</div>
@endsection