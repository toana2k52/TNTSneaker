<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class="anyflexbox boxshadow display-table">
<head>
	<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="TNT Sneaker - Thanh toán đơn hàng" />

    <title>TNT Sneaker - Thanh toán đơn hàng</title>

    
    <link rel="icon" href="{{url('/')}}/public/images/logo_icon.png?1524451884518" type="image/x-icon" />
    
    <!-- <script src="{{url('/')}}/public/home_user/css/jquery-2.1.3.min.js?4" type='text/javascript'></script>
    <link href="{{url('/')}}/public/home_user/order_style/css/bootstrap.min.css?20171025" rel='stylesheet' type='text/css' />
    <link href="{{url('/')}}/public/home_user/order_style/css/nprogress.css?20171025" rel='stylesheet' type='text/css' />
    <link href="{{url('/')}}/public/home_user/order_style/css/font-awesome.min.css?20171025" rel='stylesheet' type='text/css' />
    <link href="{{url('/')}}/public/home_user/order_style/css/checkout.css?20181105" rel='stylesheet' type='text/css' /> -->

    <script src='//bizweb.dktcdn.net/assets/themes_support/jquery-2.1.3.min.js?4' type='text/javascript'></script>
    <link href='//bizweb.dktcdn.net/assets/themes_support/bootstrap.min.css?20171025' rel='stylesheet' type='text/css' />
    <link href='//bizweb.dktcdn.net/assets/themes_support/nprogress.css?20171025' rel='stylesheet' type='text/css' />
    <link href='//bizweb.dktcdn.net/assets/themes_support/font-awesome.min.css?20171025' rel='stylesheet' type='text/css' />
    <link href='//bizweb.dktcdn.net/assets/themes_support/checkout.css?20181105' rel='stylesheet' type='text/css' />
    
    
    
    <script>
        var Bizweb = Bizweb || {};
        Bizweb.store = 'TNTSneaker.vn';
        Bizweb.theme = {"id":704696,"role":"main","name":"TNTSNeaker --- guide"};
        Bizweb.template = '';
    </script>



    <script type="text/javascript">if (typeof Bizweb == 'undefined') { Bizweb = {}; }
    Bizweb.Checkout = {};
    Bizweb.Checkout.token = "b7691fc4b84d447e8ff2887ea50334b4";
    Bizweb.Checkout.apiHost = "TNTSneaker.vn";
</script>



</head>

<body class="body--custom-background-color ">
    <div class="banner" data-header="">
        <div class="wrap">
            <div class="shop logo logo--left ">

                <h1 class="shop__name">
                    <a href="{{route('user')}}">
                        TNT Sneaker
                    </a>
                </h1>

            </div>
        </div>
    </div>

    <div context="paymentStatus" define='{ paymentStatus: new Bizweb.PaymentStatus(this,{payment_processing:"",payment_provider_id:"",payment_info:{} }) }'>

    </div>
    @if(Auth::guard('customer')->check())
     <span></span>
    @endif
    @if(Auth::guard('customer')->check())
        <div class="wrap" context="checkout">
            <div class='sidebar '>
                <div class="sidebar_header">
                    <h2>
                        <label class="control-label">Đơn hàng</label>
                        <label class="control-label">({{$cart_sum}})</label>
                    </h2>
                    <hr class="full_width"/>
                </div>
                <div class="sidebar__content">
                    <div class="order-summary order-summary--product-list order-summary--is-collapsed">
                        <div class="summary-body summary-section summary-product" >
                            <div class="summary-product-list">
                                <table class="product-table">
                                    <tbody>
                                        @foreach($cart_of_cus as $cart_of_c)
                                        <tr class="product product-has-image clearfix">
                                            <td>
                                                <div class="product-thumbnail">
                                                    <div class="product-thumbnail__wrapper">

                                                        <img src="{{url('/')}}/resources/views/admin/product/uploads/{{$cart_of_c->pro_cart_detail->image}}" style="width: 90%; padding: 5%;" />

                                                    </div>
                                                    <span class="product-thumbnail__quantity" aria-hidden="true">{{$cart_of_c->quantity}}</span>
                                                </div>
                                            </td>
                                            <td class="product-info">
                                                <span class="product-info-name">

                                                    {{$cart_of_c->pro_cart->name}} / {{$cart_of_c->pro_cart_detail->color}}
                                                </span>

                                                <span class="product-info-description">
                                                    Size:  {{$cart_of_c->pro_cart_detail->size}}
                                                </span>


                                            </td>
                                            <?php $price_of_pro = $cart_of_c->price*$cart_of_c->quantity ?>
                                            <td class="product-price text-right">
                                                {{number_format($price_of_pro)}} VND
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="order-summary__scroll-indicator">
                                    Cuộn chuột để xem thêm
                                    <i class="fa fa-long-arrow-down" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <hr class="m0"/>
                    </div>
                    <div class="order-summary order-summary--total-lines">
                        <div class="summary-section border-top-none--mobile">
                            <div class="total-line total-line-subtotal clearfix">
                                <span class="total-line-name pull-left">
                                    Tạm tính
                                </span>
                                <span class="total-line-subprice pull-right">
                                    {{number_format($cart_price_all)}} VND
                                </span>
                            </div>
                            <div class="total-line total-line-shipping clearfix" bind-show="requiresShipping">
                                <span class="total-line-name pull-left">
                                    Phí vận chuyển
                                </span>
                                <span class="total-line-shipping pull-right"  bind-show="ShippingProvinceId || BillingProvinceId && !otherAddress || (requiresShipping && shippingMethods.length > 0)" >

                                    Miễn phí
                                    
                                </span>
                            </div>
                            <div class="total-line total-line-total clearfix">
                                <span class="total-line-name pull-left">
                                    Tổng cộng
                                </span>
                                <span  class="total-line-price pull-right">
                                    {{number_format($cart_price_all)}} VND
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group clearfix hidden-sm hidden-xs">
                        <div class="field__input-btn-wrapper mt10">
                            <a class="previous-link" href="{{route('user.cart')}}">
                                <i class="fa fa-angle-left fa-lg" aria-hidden="true"></i>
                                <span>Quay về giỏ hàng</span>
                            </a>
                            @if(Auth::guard('customer')->check())
                                @if($customer_add == null)
                                <a class="btn btn-primary" href="" style="pointer-events: none;">Vui lòng thêm địa chỉ nhận hàng</a>
                                @else
                                <a class="btn btn-primary" href="{{route('user.order_detail',['customer_address_id' => $customer_add->id])}}">ĐẶT HÀNG</a>
                                @endif
                            @else
                            <a class="btn btn-primary" type="submit">ĐẶT HÀNG</a>
                            @endif
                        </div>
                    </div>
                    <div class="form-group has-error">
                        <div class="help-block ">
                            <ul class="list-unstyled">

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @else
        <div class="wrap" context="checkout">
            <div class='sidebar '>
                <div class="sidebar_header">
                    <h2>
                        <label class="control-label">Đơn hàng</label>
                    </h2>
                    <hr class="full_width"/>
                </div>
                <div class="sidebar__content">
                    <div class="order-summary order-summary--product-list order-summary--is-collapsed">
                        <div class="summary-body summary-section summary-product" >
                            <div class="summary-product-list">
                                <table class="product-table">
                                    <tbody>
                                        @foreach(session('cart_user') as $cart_of_c)
                                        <tr class="product product-has-image clearfix">
                                            <td>
                                                <div class="product-thumbnail">
                                                    <div class="product-thumbnail__wrapper">

                                                        <img src="{{url('/')}}/resources/views/admin/product/uploads/{{$cart_of_c['image']}}" style="width: 90%; padding: 5%;" />

                                                    </div>
                                                    <span class="product-thumbnail__quantity" aria-hidden="true">{{$cart_of_c['quantity']}}</span>
                                                </div>
                                            </td>
                                            <td class="product-info">
                                                <span class="product-info-name">

                                                    {{$cart_of_c['name']}} / {{$cart_of_c['color']}}
                                                </span>

                                                <span class="product-info-description">
                                                    Size:  {{$cart_of_c['size']}}
                                                </span>


                                            </td>
                                            <td class="product-price text-right">
                                                {{number_format($cart_of_c['price']*$cart_of_c['quantity'])}} VND
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="order-summary__scroll-indicator">
                                    Cuộn chuột để xem thêm
                                    <i class="fa fa-long-arrow-down" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <hr class="m0"/>
                    </div>
                    <div class="order-summary order-summary--total-lines">
                        <div class="summary-section border-top-none--mobile">
                            <div class="total-line total-line-subtotal clearfix">
                                <span class="total-line-name pull-left">
                                    Tạm tính
                                </span>
                                <?php 
                                    $tt = 0;
                                    foreach (session('cart_user') as $item) {
                                        $tt = $tt + ($item['quantity']*$item['price']);
                                    }
                                ?>
                                <span class="total-line-subprice pull-right">
                                    {{number_format($tt)}} VND
                                </span>
                            </div>
                            <div class="total-line total-line-shipping clearfix" bind-show="requiresShipping">
                                <span class="total-line-name pull-left">
                                    Phí vận chuyển
                                </span>
                                <span class="total-line-shipping pull-right"  bind-show="ShippingProvinceId || BillingProvinceId && !otherAddress || (requiresShipping && shippingMethods.length > 0)" >

                                    Miễn phí
                                    
                                </span>
                            </div>
                            <div class="total-line total-line-total clearfix">
                                <span class="total-line-name pull-left">
                                    Tổng cộng
                                </span>
                                <span  class="total-line-price pull-right">
                                    {{number_format($tt)}} VND
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group clearfix hidden-sm hidden-xs">
                        <div class="field__input-btn-wrapper mt10">
                            <a class="previous-link" href="{{route('user.cart')}}">
                                <i class="fa fa-angle-left fa-lg" aria-hidden="true"></i>
                                <span>Quay về giỏ hàng</span>
                            </a>
                        </div>
                    </div>
                    <div class="form-group has-error">
                        <div class="help-block ">
                            <ul class="list-unstyled">

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif

            <div class="main" role="main">
                <div class="main_header">
                    <div class="shop logo logo--left ">

                        <h1 class="shop__name">
                            <a href="/">
                                TNT Sneaker
                            </a>
                        </h1>

                    </div>
                </div>
                <div class="main_content">
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="section" define="{billing_address: {}}">
                                <div class="section__header">
                                    <div class="layout-flex layout-flex--wrap">
                                        <h2 class="section__title layout-flex__item layout-flex__item--stretch">
                                            <i class="fa fa-id-card-o fa-lg section__title--icon hidden-md hidden-lg" aria-hidden="true"></i>
                                            <label class="control-label">Thông tin mua hàng</label>
                                        </h2>
                                        
                                        @if(Auth::guard('customer')->check())
                                        <span></span>
                                        @else
                                        <a class="layout-flex__item section__title--link" href="{{route('user.login')}}">
                                            <i class="fa fa-user-circle-o fa-lg" aria-hidden="true"></i>
                                            Đăng nhập 
                                        </a>
                                        @endif
                                        
                                    </div>
                                </div>
                                @if(Auth::guard('customer')->check())
                                <div class="section__content" style="padding: 5px; font-size: 16px;">
                                    <div class="form-group" bind-class="{'has-error' : invalidEmail}">
                                        <div>
                                            <p class="">Họ tên: </p>
                                            <div class="text-center">
                                                <b style=" padding-top: 5px;font-size: 26px;">{{Auth::guard('customer')->user()->name}}</b>
                                            </div>
                                            
                                        </div>
                                        <div class="help-block with-errors">
                                        </div>
                                    </div>
                                    
                                    <div class="billing">
                                        <div>
                                            <div class="form-group">
                                                <p class="">Email: </p>
                                                <div class="text-center">
                                                    <b style=" padding-top: 5px;font-size: 18px;">{{Auth::guard('customer')->user()->email}}</b>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <p class="">SDT: </p>
                                                <div class="text-center">
                                                    <b style=" padding-top: 5px;font-size: 18px;">{{Auth::guard('customer')->user()->phone}}</b>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <p class="">Địa chỉ: </p>
                                                <div class="text-center">
                                                    <b style=" padding-top: 5px;font-size: 18px;">{{Auth::guard('customer')->user()->address}}</b>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <form action="{{route('user.add_order_detail_user')}}" method="POST" role="form">
                                    <div class="section pt10" bind-show="otherAddress">
                                        <div class="section__content">
                                            <div bind-show="otherAddress" define="{shipping_address: {}, shipping_expand:true,show_district:  true ,show_country:  true }" class="shipping ">
                                                <div bind-show="shipping_expand || !otherAddress">
                                                    <div class="form-group">
                                                        <div class="field__input-wrapper" bind-class="{ 'js-is-filled': shipping_address.full_name }">
                                                            <input name="name" bind-event-change="saveAbandoned()" type="text" bind-event-focus="handleFocus(this)" bind-event-blur="handleFieldBlur(this)" class="field__input form-control" id="_shipping_address_last_name" data-error="Vui lòng nhập họ tên" bind="shipping_address.full_name"  placeholder="Họ tên" />
                                                        </div>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <div class="field__input-wrapper" bind-class="{ 'js-is-filled': shipping_address.phone }">
                                                            <input name="phone" bind-event-change="saveAbandoned()" type="tel" bind-event-focus="handleFocus(this)" bind-event-blur="handleFieldBlur(this)" class="field__input form-control" id="_shipping_address_phone"  data-error="Số điện thoại không hợp lệ!" pattern="^([0-9,\+,\-,\(,\),\.]{8,20})$" bind="shipping_address.phone" placeholder="SDT"/>
                                                        </div>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="field__input-wrapper" bind-class="{ 'js-is-filled': shipping_address.phone }">
                                                            <input name="email" type="email" bind-event-change="changeEmail()" bind-event-focus="handleFocus(this)" bind-event-blur="handleFieldBlur(this)" class="field__input form-control" id="_email" data-error="Vui lòng nhập email đúng định dạng"  required  name="Email"  value=""  pattern="^([a-zA-Z0-9_\-\.\+]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$" bind="email" placeholder="Email" />
                                                        </div>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="section__content">
                                                            <div class="form-group m0">
                                                                <textarea name="address" class="field__input form-control m0" placeholder="Địa chỉ"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @csrf
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary" style="padding: 10px 30px;margin-right: 5px;">Đặt hàng</button>
                                </div>
                            </form>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            @if(Auth::guard('customer')->check())
                            <div class="section shipping-method" >
                                <div class="section__header">
                                    <h2 class="section__title">
                                        <i class="fa fa-truck fa-lg section__title--icon hidden-md hidden-lg" aria-hidden="true"></i>
                                        <label class="control-label">Địa chỉ nhận hàng</label>
                                    </h2>
                                </div>
                                <div class="section__content">
                                    @if(Session::has('success'))
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        {{Session::get('success')}}
                                    </div>
                                    @endif
                                    @if(Session::has('error'))
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        {{Session::get('error')}}
                                    </div>
                                    @endif
                                    @if($customer_add == null)
                                    <div class="content-box">
                                        <div class="clearfix" style="padding: 10px;">
                                            Chưa có địa chỉ nhận hàng, vui lòng thêm mới địa chỉ!
                                        </div>
                                        <div class="text-right" style="padding: 5px;">
                                            <a class="btn btn-primary btn-sm" data-toggle="modal" href='#modal-new-add'>Thêm địa chỉ mới</a>
                                            <a class="btn btn-success btn-sm" data-toggle="modal" href='#modal-select-add'>Chọn địa chỉ có sẵn</a>
                                        </div>
                                    </div>
                                    @else
                                    <div class="content-box">
                                        <div class="clearfix" style="padding: 10px;">
                                            <p><span style="font-weight: bold;">Họ tên: </span>{{$customer_add->name}}</p>
                                            <p><span style="font-weight: bold;">Email: </span>{{$customer_add->email}}</p>
                                            <p><span style="font-weight: bold;">SDT : </span>{{$customer_add->phone}}</p>
                                            <p><span style="font-weight: bold;">Địa chỉ: </span>{{$customer_add->address}}</p>
                                        </div>
                                        <div class="text-right" style="padding: 5px;">
                                            <a class="btn btn-primary btn-sm" data-toggle="modal" href='#modal-new-add'>Thêm địa chỉ mới</a>
                                            <a class="btn btn-success btn-sm" data-toggle="modal" href='#modal-select-add'>Chọn địa chỉ có sẵn</a>
                                        </div>
                                    </div>
                                    @endif
                                        <div class="content-box">
                                            <div class="clearfix" style="padding: 10px;">
                                                Chưa có địa chỉ nhận hàng, vui lòng thêm mới địa chỉ!
                                            </div>
                                        </div>
                                </div>
                            </div>
                            @endif
                            <div class="section payment-methods" bind-class="{'p0--desktop': shippingMethods.length == 0}">
                                <div class="section__header">
                                    <h2 class="section__title">
                                        <i class="fa fa-credit-card fa-lg section__title--icon hidden-md hidden-lg" aria-hidden="true"></i>
                                        <label class="control-label">Thanh toán</label>
                                    </h2>
                                </div>
                                <div class="section__content">
                                    <div class="content-box">

                                        <div class="content-box__row">
                                            <div class="radio-wrapper">
                                                <div class="radio__input">
                                                    <input class="input-radio" type="radio" value="284579" name="PaymentMethodId" id="payment_method_284579" data-check-id="4" bind="payment_method_id" checked>
                                                </div>
                                                <label class="radio__label" for="payment_method_284579">
                                                    <span class="radio__label__primary">Thanh toán khi giao hàng (COD)</span>
                                                    <span class="radio__label__accessory">
                                                        <ul>
                                                            <li class="payment-icon-v2 payment-icon--4">

                                                                <i class="fa fa-money payment-icon-fa" aria-hidden="true"></i>

                                                            </li>
                                                        </ul>
                                                    </span>
                                                </label> 
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="main_footer footer unprint">
                                <div class="mt10"></div>
                            </div>
                        </div>
                    </div>
                @if(Auth::guard('customer')->check())
                    <span></span>
                @endif
                

                <div class="modal fade" id="modal-select-add">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Chọn địa chỉ nhận hàng</h4>
                            </div>
                            <div class="modal-body">
                                <div class="clearfix">
                                    @if(Auth::guard('customer')->check())
                                    @foreach($customer_add_all as $customer_add_a)
                                    <div class="col-md-6" style="padding: 5px;">
                                      <div class="clearfix">
                                          <div class="col-md-12" style="padding: 0;">
                                              <div class="alert alert-success alert-dismissible" role="alert" style=" height: 230px; margin-bottom: 0;border-bottom-width: 0px;border-radius: 5px 5px 0 0;" >
                                                <strong>{{$customer_add_a->name}}</strong>
                                                <p><strong>Điện thoại: </strong>{{$customer_add_a->phone}}</p>
                                                <p><strong>Email: </strong>{{$customer_add_a->email}}</p>
                                                <div style="height: 60px;">
                                                  <p><strong>Địa chỉ: </strong>{{$customer_add_a->address}}</p>
                                              </div>
                                              
                                          </div>
                                      </div> 
                                      <div class="col-md-12" style="padding: 0;">
                                          <div class="text-right alert alert-success alert-dismissible" style="margin-top: 0; border-top-width: 0px;border-radius: 0 0 5px 5px;padding-right: 7.5px;">
                                            <a href="{{route('user.order',['customer_add_id' =>$customer_add_a->id])}}" class="btn btn-default btn-xs btn-danger">Sử dụng</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-new-add">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Thêm mới địa chỉ nhận hàng</h4>
                    </div>
                    @if(Auth::guard('customer')->check())
                    <form action="{{route('user.customer_address_add',['id'=>Auth::guard('customer')->user()->id,'check' => 1])}}" method="POST" role="form">
                        <div class="modal-body">
                            <div class="section pt10" bind-show="otherAddress">
                                <div class="section__content">
                                    <div bind-show="otherAddress" define="{shipping_address: {}, shipping_expand:true,show_district:  true ,show_country:  true }" class="shipping ">
                                        <div bind-show="shipping_expand || !otherAddress">
                                            <div class="form-group">
                                                <div class="field__input-wrapper" bind-class="{ 'js-is-filled': shipping_address.full_name }">
                                                    <input name="name" bind-event-change="saveAbandoned()" type="text" bind-event-focus="handleFocus(this)" bind-event-blur="handleFieldBlur(this)" class="field__input form-control" id="_shipping_address_last_name" data-error="Vui lòng nhập họ tên" bind="shipping_address.full_name"  placeholder="Họ tên" />
                                                </div>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="field__input-wrapper" bind-class="{ 'js-is-filled': shipping_address.phone }">
                                                    <input name="phone" bind-event-change="saveAbandoned()" type="tel" bind-event-focus="handleFocus(this)" bind-event-blur="handleFieldBlur(this)" class="field__input form-control" id="_shipping_address_phone"  data-error="Số điện thoại không hợp lệ!" pattern="^([0-9,\+,\-,\(,\),\.]{8,20})$" bind="shipping_address.phone" placeholder="SDT"/>
                                                </div>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group">
                                                <div class="field__input-wrapper" bind-class="{ 'js-is-filled': shipping_address.phone }">
                                                    <input name="email" type="email" bind-event-change="changeEmail()" bind-event-focus="handleFocus(this)" bind-event-blur="handleFieldBlur(this)" class="field__input form-control" id="_email" data-error="Vui lòng nhập email đúng định dạng"  required  name="Email"  value=""  pattern="^([a-zA-Z0-9_\-\.\+]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$" bind="email" placeholder="Email" />
                                                </div>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group">
                                                <div class="section__content">
                                                    <div class="form-group m0">
                                                        <textarea name="address" class="field__input form-control m0" placeholder="Địa chỉ"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            @csrf
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
	<!-- <script src="{{url('/')}}/public/home_user/order_style/js/jquery-2.1.3.min.js?20171025" type='text/javascript'></script>
<script src="{{url('/')}}/public/home_user/order_style/js/bootstrap.min.js?20171025" type='text/javascript'></script>
<script src="{{url('/')}}/public/home_user/order_style/js/twine.min.js?20171025" type='text/javascript'></script>
<script src="{{url('/')}}/public/home_user/order_style/js/validator.min.js?20171025" type='text/javascript'></script>
<script src="{{url('/')}}/public/home_user/order_style/js/nprogress.js?20171025" type='text/javascript'></script>
<script src="{{url('/')}}/public/home_user/order_style/js/money-helper.js?20171025" type='text/javascript'></script>

<script src="{{url('/')}}/public/home_user/order_style/js/ua-parser.pack.js?20180611" type='text/javascript'></script>
<script src="{{url('/')}}/public/home_user/order_style/js/checkout.js?20180821" type='text/javascript'></script> -->

<script src='//bizweb.dktcdn.net/assets/themes_support/jquery-2.1.3.min.js?20171025' type='text/javascript'></script>
<script src='//bizweb.dktcdn.net/assets/themes_support/bootstrap.min.js?20171025' type='text/javascript'></script>
<script src='//bizweb.dktcdn.net/assets/themes_support/twine.min.js?20171025' type='text/javascript'></script>
<script src='//bizweb.dktcdn.net/assets/themes_support/validator.min.js?20171025' type='text/javascript'></script>
<script src='//bizweb.dktcdn.net/assets/themes_support/nprogress.js?20171025' type='text/javascript'></script>
<script src='//bizweb.dktcdn.net/assets/themes_support/money-helper.js?20171025' type='text/javascript'></script>

<script src="//bizweb.dktcdn.net/assets/scripts/ua-parser.pack.js?20180611" type='text/javascript'></script>
<script src='//bizweb.dktcdn.net/assets/themes_support/checkout.js?20180821' type='text/javascript'></script>

<script type="text/javascript">
    $(document).ajaxStart(function () {
        NProgress.start();
    });
    $(document).ajaxComplete(function () {
        NProgress.done();
    });

    context = {}

    $(function () {
        Twine.reset(context).bind().refresh();
    });
    
    $(document).ready(function () {
      setTimeout(function(){




      }, 50);

  });
</script>

</body>
</html>