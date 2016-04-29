@extends('layouts.master')

@section('title')
    <h1>Our Farm Fresh Products</h1>
@stop

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-5">
                <h3>This Week's Basket &amp; Free Range Eggs</h3>
            </div>
            <div class="col-lg-3 col-lg-offset-3">
                <h3>Order Summary</h3>
            </div>
        </div>

        <div class="row">
            <!-- Produce Icons -->
            <div class="col-lg-3">
                @for($i = 0; $i < 9; $i++)
                    <img src="http://fillmurray.com/80/80" alt="Produce Image" />
                @endfor
            </div>
            <!-- Selection Dropdowns -->
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="size">Size*</label>
                    <select id="size" name="size" class="form-control">
                        <option value="0" selected>Select Size</option>

                        @foreach($products as $product)
                            @if($product->visible)
                                <option id="{{{ str_replace(" ", "-", $product->name) }}}" value="{{{ $product->id }}}" data-amount="{{{ $product->amount }}}">{{{ $product->name }}} - ${{{ $product->price }}}</option>
                            @endif
                        @endforeach
                    </select>

                    @foreach($products as $product)
                        @if($product->name == "Eggs")
                            <!-- Hidden Attribute For Eggs -->
                            <input id="Eggs" type="hidden" data-amount="{{{ $product->amount }}}"></input>
                        @endif
                    @endforeach

                    <label for="quantity">Quantity*</label>
                    <div class="input-group form-group-options quantity-wrapper">
                        <span id="basket-sub" class="input-group-addon input-group-addon-remove quantity-remove btn">
                            <span class="glyphicon glyphicon-minus"></span>
                        </span>

                        <input id="quantity-baskets" type="text" name="quantity" class="form-control quantity-count" placeholder="1">

                        <span id="basket-add" class="input-group-addon input-group-addon-remove quantity-add btn">
                            <span class="glyphicon glyphicon-plus"></span>
                        </span>
                    </div>

                    <label for="eggs">Eggs (By Dozen)</label>
                    <div class="input-group form-group-options quantity-wrapper">
                        <span id="egg-sub" class="input-group-addon input-group-addon-remove quantity-remove btn">
                            <span class="glyphicon glyphicon-minus"></span>
                        </span>

                        <input id="quantity-eggs" type="text" name="quantity" class="form-control quantity-count" placeholder="0">

                        <span id="egg-add" class="input-group-addon input-group-addon-remove quantity-add btn">
                            <span class="glyphicon glyphicon-plus"></span>
                        </span>
                    </div>

                    <label for="delivery">Delivery Method*</label>
                    <select class="form-control">
                        <option value="0" selected>Select Method</option>
                        <option value="1">Pickup</option>
                        <option value="2">Home Delivery</option> <!-- Add note to summary with Paypal disclaimer -->
                    </select>
                </div>
            </div>
            <div class="col-lg-3 col-lg-offset-2">
                <div class="well">
                    <ul class="order-summary">
                        <li class="summary-item">
                            <span class="item-desc">Basket:</span>
                            <span id="basket-type" class="item-amount"></span>
                        </li>
                        <li class="summary-item">
                            <span class="item-desc">Quantity:</span>
                            <span id="basket-sum" class="item-amount"></span>
                        </li>
                        <li class="summary-item">
                            <span class="item-desc">Eggs:</span>
                            <span id="egg-sum" class="item-amount"></span><br>
                            <span class="item-disclaimer">*By the dozen</span>
                        </li>
                        <li class="summary-item">
                            <span class="item-desc">Delivery Method:</span>
                            <span id="delivery-method" class="item-amount"></span><br>
                            <span class="item-disclaimer text-hide">*This delivery method requires Paypal</span>
                        </li>
                        <li class="summary-item">
                            <span class="item-desc">Order Total:</span>
                            <span id="order-sum" class="item-amount"></span><br>
                            <span class="item-disclaimer">*Taxes may apply</span>
                        </li>
                    </ul>
                </div>

                <button type="submit" name="checkout" class="btn btn-success col-lg-12">Proceed To Checkout</button>
            </div>
        </div>

    </div>
@stop

@section('bottom-script')
    <script type="text/javascript" src="assets/js/products.js"></script>
@stop
