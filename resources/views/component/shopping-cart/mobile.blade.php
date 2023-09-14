<div class="offcanvas-header">
    <h4 class="title">@lang('index.shopping_cart')</h4>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
</div>
<div class="offcanvas-body">
    <div class="loading d-none" id="shopping-cart-loading">
        <div class="spinner-border text-muted"></div>
    </div>
    <ul class="list-item" id="shopping-cart-body-mobile"></ul>
    <div class="footer-cart">
        <div class="header">
            <span class="total">@lang('index.total')</span>
            <span class="total-price" id="total-mobile">0.00$</span>
        </div>
        <a href="{{route('checkout')}}" type="submit" class="btn-checkout">@lang('index.checkout')</a>
    </div>
</div>