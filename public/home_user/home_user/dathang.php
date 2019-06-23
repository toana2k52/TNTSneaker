
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class="anyflexbox boxshadow display-table">
<head>
	<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Versus - Thanh toán đơn hàng" />

    <title>Versus - Thanh toán đơn hàng</title>

    
    	<link rel="shortcut icon" href="//bizweb.dktcdn.net/assets/favicon.ico" type="image/x-icon" />
    
    <script src='//bizweb.dktcdn.net/assets/themes_support/jquery-2.1.3.min.js?4' type='text/javascript'></script>
    <link href='//bizweb.dktcdn.net/assets/themes_support/bootstrap.min.css?20171025' rel='stylesheet' type='text/css' />
<link href='//bizweb.dktcdn.net/assets/themes_support/nprogress.css?20171025' rel='stylesheet' type='text/css' />
<link href='//bizweb.dktcdn.net/assets/themes_support/font-awesome.min.css?20171025' rel='stylesheet' type='text/css' />
<link href='//bizweb.dktcdn.net/assets/themes_support/checkout.css?20181105' rel='stylesheet' type='text/css' />


    
    
    
    <script>
var Bizweb = Bizweb || {};
Bizweb.store = 'versus.bizwebvietnam.net';
Bizweb.theme = {"id":623797,"role":"main","name":"Versus v1.0.1"};
Bizweb.template = '';
</script>


	
<script type="text/javascript">if (typeof Bizweb == 'undefined') { Bizweb = {}; }
Bizweb.Checkout = {};
Bizweb.Checkout.token = "b3c05dca8be247a4a0f5b26cb0844477";
Bizweb.Checkout.apiHost = "versus.bizwebvietnam.net";
</script>



</head>

<body class="body--custom-background-color ">
    <div class="banner" data-header="">
        <div class="wrap">
            <div class="shop logo logo--left ">
    
        <h1 class="shop__name">
            <a href="/">
                Versus
            </a>
        </h1>
    
</div>
        </div>
    </div>
    <button class="order-summary-toggle" bind-event-click="Bizweb.StoreCheckout.toggleOrderSummary(this)">
        <div class="wrap">
            <h2>
                <label class="control-label">Đơn hàng</label>
                <label class="control-label hidden-small-device">
                    (1 sản phẩm)
                </label>
                <label class="control-label visible-small-device inline">
                    (1)
                </label>
            </h2>
            <a class="underline-none expandable pull-right" href="javascript:void(0)">
                Xem chi tiết
            </a>
        </div>
    </button>
	
	
	
	
	
	
		
	
	<div context="paymentStatus" define='{ paymentStatus: new Bizweb.PaymentStatus(this,{payment_processing:"",payment_provider_id:"",payment_info:{} }) }'>
	
	</div>
	<form method="post" action="" data-toggle="validator" class="content stateful-form formCheckout">
        <div class="wrap" context="checkout" define='{checkout: new Bizweb.StoreCheckout(this,{ token: "b3c05dca8be247a4a0f5b26cb0844477", email: "2k52@gmail.com", totalOrderItemPrice: 1690000.0000, shippingFee: 0, freeShipping: false, requiresShipping: true, existCode: false, code: "", discount: 0, settingLanguage: "vi", moneyFormat: "{{amount_no_decimals_with_comma_separator}}₫", discountLabel: "Miễn phí", districtPolicy: "optional", district: "", province:"", otherAddress: false, shippingId: 0, shippingMethods: [], customerAddressId: 0, reductionCode: "" })}'>
            <div class='sidebar '>
                <div class="sidebar_header">
                    <h2>
                        <label class="control-label">Đơn hàng</label>
                        <label class="control-label">(1 sản phẩm)</label>
                    </h2>
                    <hr class="full_width"/>
                </div>
                <div class="sidebar__content">
                    <div class="order-summary order-summary--product-list order-summary--is-collapsed">
                        <div class="summary-body summary-section summary-product" >
                            <div class="summary-product-list">
                                <table class="product-table">
                                    <tbody>
                                        
                                            <tr class="product product-has-image clearfix">
                                                <td>
                                                    <div class="product-thumbnail">
                                                        <div class="product-thumbnail__wrapper">
                                                            
                                                                <img src='//bizweb.dktcdn.net/thumb/thumb/100/278/638/products/02.jpg?v=1514176254707' class='product-thumbnail__image' />
                                                            
                                                        </div>
                                                        <span class="product-thumbnail__quantity" aria-hidden="true">1</span>
                                                    </div>
                                                </td>
                                                <td class="product-info">
                                                    <span class="product-info-name">
                                                        
                                                        Nike Flex Control - 898459 - 004
                                                    </span>
                                                    
                                                        <span class="product-info-description">
                                                            40 / Xám
                                                        </span>
                                                    
                                                    
                                                </td>
                                                <td class="product-price text-right">
                                                    1.690.000₫
                                                </td>
                                            </tr>
                                        
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
                    <div class="order-summary order-summary--discount">
                        <div class="summary-section">
                            <div class="form-group m0" bind-show="!existCode ||code == null || !code.length">
                                <div class="field__input-btn-wrapper">
                                    <div class="field__input-wrapper">
                                        <input bind="code" name="code" type="text" class="form-control discount_code" placeholder="Nhập mã giảm giá" value="" id="checkout_reduction_code"/>
                                    </div>
                                    <button bind-event-click="reduction_code = false, caculateShippingFee('')" class="btn btn-primary event-voucher-apply" type="button">Áp dụng</button>
                                </div>
                            </div>
                            <div bind-class="{'warning' : existCode && !freeShipping && discount == 0,'success' : existCode && ( freeShipping || discount >0 )}" class="clearfix hide" bind-show="code!= null && code.length && existCode">
                                <div class="pull-left">
                                    <i class="fa fa-check applied-discount-status-success" aria-hidden="true"></i>
									<i class="fa fa-exclamation-triangle applied-discount-status-warning" aria-hidden="true"></i>
                                </div>
                                <div bind="code" class="pull-left applied-discount-code">
                                    
                                </div>
                                <div bind="(discountShipping && freeShipping) ? 'Miễn phí' : money(discount,'{{amount_no_decimals_with_comma_separator}}₫')" class="pull-right">
                                    
                                        0
                                    
                                </div>
                                <input bind-event-click="removeCode('')" class="btn btn-delete" type="button" value="×" name="commit">
                            </div>
                            <div class="error mt10 hide" bind-show="inValidCode">
                                Mã khuyến mãi không hợp lệ
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
                                <span bind="money(totalOrderItemPrice - discount,'{{amount_no_decimals_with_comma_separator}}₫')" class="total-line-subprice pull-right">
                                    1.690.000₫
                                </span>
                            </div>
                            <div class="total-line total-line-shipping clearfix" bind-show="requiresShipping">
                                <span class="total-line-name pull-left">
                                    Phí vận chuyển
                                </span>
                                <span bind="shippingFee >  0 ? money(shippingFee,'{{amount_no_decimals_with_comma_separator}}₫') : ((requiresShipping && shippingMethods.length == 0) ? 'Khu vực này không hỗ trợ vận chuyển': 'Miễn phí')" class="total-line-shipping pull-right"  bind-show="ShippingProvinceId || BillingProvinceId && !otherAddress || (requiresShipping && shippingMethods.length > 0)" >
                                    
                                        Miễn phí
                                    
                                </span>
                            </div>
                            <div class="total-line total-line-total clearfix">
                                <span class="total-line-name pull-left">
                                    Tổng cộng
                                </span>
                                <span bind="money(totalOrderItemPrice + (isNaN(shippingFee) ? 0 : shippingFee) - discount,'{{amount_no_decimals_with_comma_separator}}₫')" class="total-line-price pull-right">
                                    1.690.000₫ 323abc
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group clearfix hidden-sm hidden-xs">
                        <div class="field__input-btn-wrapper mt10">
                            <a class="previous-link" href="/cart">
                                <i class="fa fa-angle-left fa-lg" aria-hidden="true"></i>
                                <span>Quay về giỏ hàng</span>
                            </a>
                            <input class="btn btn-primary btn-checkout" data-loading-text="Đang xử lý" type="button" bind-event-click="paymentCheckout('AIzaSyAjQYbV19v7UMDVk0cDZ54yKh3OP1hQhbk;AIzaSyCLd-YkfOzBXlNGfS_FNLnpolyME1tRAJI;AIzaSyDdvilzaJlb50t2IRC3PrfSb1lNzf6n3pQ')" value="ĐẶT HÀNG" />
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
            <div class="main" role="main">
                <div class="main_header">
                    <div class="shop logo logo--left ">
    
        <h1 class="shop__name">
            <a href="/">
                Versus
            </a>
        </h1>
    
</div>
                </div>
                <div class="main_content">
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="section" define="{billing_address: {&quot;address1&quot;:&quot;Phú Thọ&quot;,&quot;address2&quot;:null,&quot;city&quot;:&quot;Đắk Lắk&quot;,&quot;company&quot;:null,&quot;country&quot;:&quot;Việt Nam&quot;,&quot;first_name&quot;:null,&quot;last_name&quot;:&quot;adasda&quot;,&quot;name&quot;:&quot;adasda&quot;,&quot;full_name&quot;:&quot;adasda&quot;,&quot;phone&quot;:&quot;056456456&quot;,&quot;phone_number&quot;:&quot;056456456&quot;,&quot;province&quot;:&quot;Đắk Lắk&quot;,&quot;province_code&quot;:null,&quot;district&quot;:&quot;Huyện Krông Búk&quot;,&quot;district_code&quot;:null,&quot;zip&quot;:null,&quot;country_code&quot;:&quot;VN&quot;}}">
                                <div class="section__header">
                                    <div class="layout-flex layout-flex--wrap">
                                        <h2 class="section__title layout-flex__item layout-flex__item--stretch">
                                            <i class="fa fa-id-card-o fa-lg section__title--icon hidden-md hidden-lg" aria-hidden="true"></i>
                                            <label class="control-label">Thông tin mua hàng</label>
                                        </h2>
                                        
                                                <a class="layout-flex__item section__title--link" href="/account/login?returnUrl=/checkout">
                                                    <i class="fa fa-user-circle-o fa-lg" aria-hidden="true"></i>
                                                    Đăng nhập 
                                                </a>
                                        
                                    </div>
                                </div>
                                <div class="section__content">
                                    
                                    
                                        <div class="form-group" bind-class="{'has-error' : invalidEmail}">
                                            <div>
                                                <label class="field__input-wrapper" bind-class="{ 'js-is-filled': email }">
                                                    <span class="field__label" bind-event-click="handleClick(this)">
                                                        Email
                                                    </span>
                                                    <input name="Email" type="email" bind-event-change="changeEmail()" bind-event-focus="handleFocus(this)" bind-event-blur="handleFieldBlur(this)" class="field__input form-control" id="_email" data-error="Vui lòng nhập email đúng định dạng"  required  name="Email"  value=""  pattern="^([a-zA-Z0-9_\-\.\+]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$" bind="email" />
                                                </label>
                                            </div>
                                            <div class="help-block with-errors">
                                            </div>
                                        </div>
                                    
                                    <div class="billing">
                                        <div>
                                            <div class="form-group">
                                                <div class="field__input-wrapper" bind-class="{ 'js-is-filled': billing_address.full_name }">
                                                    <span class="field__label" bind-event-click="handleClick(this)">
                                                        Họ và tên
                                                    </span>
                                                    <input name="BillingAddress.LastName" type="text" bind-event-change="saveAbandoned()" bind-event-focus="handleFocus(this)" bind-event-blur="handleFieldBlur(this)" class="field__input form-control" id="_billing_address_last_name" data-error="Vui lòng nhập họ tên" required bind="billing_address.full_name" />
                                                </div>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            
                                                <div class="form-group">
                                                    <div class="field__input-wrapper" bind-class="{ 'js-is-filled': billing_address.phone }">
                                                        <span class="field__label" bind-event-click="handleClick(this)">
                                                            Số điện thoại
                                                        </span>
                                                        <input name="BillingAddress.Phone" bind-event-change="saveAbandoned()" type="tel" bind-event-focus="handleFocus(this)" bind-event-blur="handleFieldBlur(this)" class="field__input form-control" id="_billing_address_phone"  data-error="Vui lòng nhập số điện thoại" pattern="^([0-9,\+,\-,\(,\),\.]{8,20})$" bind="billing_address.phone"/>
                                                    </div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            
                                            
                                                <div class="form-group">
                                                    <div class="field__input-wrapper" bind-class="{ 'js-is-filled': billing_address.address1 }">
                                                        <span class="field__label" bind-event-click="handleClick(this)">
                                                            Địa chỉ
                                                        </span>
                                                        <input name="BillingAddress.Address1" bind-event-change="saveAbandoned()" type="text" bind-event-focus="handleFocus(this)" bind-event-blur="handleFieldBlur(this)" class="field__input form-control" id="_billing_address_address1"  bind="billing_address.address1" />
                                                    </div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            
                                            
                                                
                                                <div class="form-group">
                                                    <div class="field__input-wrapper field__input-wrapper--select">
                                                        <label class="field__label" for="BillingProvinceId">
                                                            Tỉnh thành
                                                        </label>
                                                        <select class="field__input field__input--select form-control" name="BillingProvinceId" id="billingProvince" required data-error="Bạn chưa chọn tỉnh thành" bind-event-change="billingProviceChange('')" bind="BillingProvinceId">
                                                            <option value=''>--- Chọn tỉnh thành ---</option>
                                                            
	
		<option  value="1">Hà Nội</option>
	
		<option  value="2">TP Hồ Chí Minh</option>
	
		<option  value="3">An Giang</option>
	
		<option  value="4">Bà Rịa-Vũng Tàu</option>
	
		<option  value="5">Bắc Giang</option>
	
		<option  value="6">Bắc Kạn</option>
	
		<option  value="7">Bạc Liêu</option>
	
		<option  value="8">Bắc Ninh</option>
	
		<option  value="9">Bến Tre</option>
	
		<option  value="10">Bình Định</option>
	
		<option  value="11">Bình Dương</option>
	
		<option  value="12">Bình Phước</option>
	
		<option  value="13">Bình Thuận</option>
	
		<option  value="14">Cà Mau</option>
	
		<option  value="15">Cần Thơ</option>
	
		<option  value="16">Cao Bằng</option>
	
		<option  value="17">Đà Nẵng</option>
	
		<option  value="18">Đắk Lắk</option>
	
		<option  value="19">Đắk Nông</option>
	
		<option  value="20">Điện Biên</option>
	
		<option  value="21">Đồng Nai</option>
	
		<option  value="22">Đồng Tháp</option>
	
		<option  value="23">Gia Lai</option>
	
		<option  value="24">Hà Giang</option>
	
		<option  value="25">Hà Nam</option>
	
		<option  value="26">Hà Tĩnh</option>
	
		<option  value="27">Hải Dương</option>
	
		<option  value="28">Hải Phòng</option>
	
		<option  value="29">Hậu Giang</option>
	
		<option  value="30">Hòa Bình</option>
	
		<option  value="31">Hưng Yên</option>
	
		<option  value="32">Khánh Hòa</option>
	
		<option  value="33">Kiên Giang</option>
	
		<option  value="34">Kon Tum</option>
	
		<option  value="35">Lai Châu</option>
	
		<option  value="36">Lâm Đồng</option>
	
		<option  value="37">Lạng Sơn</option>
	
		<option  value="38">Lào Cai</option>
	
		<option  value="39">Long An</option>
	
		<option  value="40">Nam Định</option>
	
		<option  value="41">Nghệ An</option>
	
		<option  value="42">Ninh Bình</option>
	
		<option  value="43">Ninh Thuận</option>
	
		<option  value="44">Phú Thọ</option>
	
		<option  value="45">Phú Yên</option>
	
		<option  value="46">Quảng Bình</option>
	
		<option  value="47">Quảng Nam</option>
	
		<option  value="48">Quảng Ngãi</option>
	
		<option  value="49">Quảng Ninh</option>
	
		<option  value="50">Quảng Trị</option>
	
		<option  value="51">Sóc Trăng</option>
	
		<option  value="52">Sơn La</option>
	
		<option  value="53">Tây Ninh</option>
	
		<option  value="54">Thái Bình</option>
	
		<option  value="55">Thái Nguyên</option>
	
		<option  value="56">Thanh Hóa</option>
	
		<option  value="57">Thừa Thiên Huế</option>
	
		<option  value="58">Tiền Giang</option>
	
		<option  value="59">Trà Vinh</option>
	
		<option  value="60">Tuyên Quang</option>
	
		<option  value="61">Vĩnh Long</option>
	
		<option  value="62">Vĩnh Phúc</option>
	
		<option  value="63">Yên Bái</option>
	

                                                        </select>
                                                    </div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                
                                                    <div bind-show="!otherAddress" class="form-group">
                                                        <div class="field__input-wrapper field__input-wrapper--select">
                                                            <label class="field__label" for="BillingDistrictId">
                                                                Quận huyện
                                                            </label>
                                                            <select class="field__input field__input--select form-control" name="BillingDistrictId" id="billingDistrict"  bind-event-change="billingDistrictChange('')" bind="BillingDistrictId">
                                                                <option value="">--- Chọn quận huyện ---</option>
																
																	
																
                                                            </select>
                                                        </div>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                
                                            
                                            <div bind-show="!otherAddress" class="form-group">
                                                <div class="error hide" bind-show="requiresShipping && loadedShippingMethods && shippingMethods.length == 0  && BillingProvinceId  ">
                                                    <label>Khu vực này không hỗ trợ vận chuyển</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="section pt10">
                                <div class="section__content">
                                    <div class="form-group" bind-show="requiresShipping">
                                        <div class="checkbox-wrapper">
                                            <div class="checkbox__input">
                                                <input class="input-checkbox" type="checkbox"  value="false"  name="otherAddress" id="other_address" bind="otherAddress" bind-event-change="changeOtherAddress(this)">
                                            </div>
                                            <label class="checkbox__label" for="other_address">
                                                Giao hàng đến địa chỉ khác
                                            </label>          
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="section pt10" bind-show="otherAddress">
                                <div class="section__header">
                                    <h2 class="section__title">
                                        <i class="fa fa-id-card-o fa-lg section__title--icon hidden-md hidden-lg" aria-hidden="true"></i>
                                        <label class="control-label">
                                            Thông tin nhận hàng
                                        </label>
                                    </h2>
                                </div>
                                <div class="section__content">
                                    <div bind-show="otherAddress" define="{shipping_address: {&quot;address1&quot;:&quot;Phú Thọ&quot;,&quot;address2&quot;:null,&quot;city&quot;:&quot;Đắk Lắk&quot;,&quot;company&quot;:null,&quot;country&quot;:&quot;Việt Nam&quot;,&quot;first_name&quot;:null,&quot;last_name&quot;:&quot;adasda&quot;,&quot;name&quot;:&quot;adasda&quot;,&quot;full_name&quot;:&quot;adasda&quot;,&quot;phone&quot;:&quot;056456456&quot;,&quot;phone_number&quot;:&quot;056456456&quot;,&quot;province&quot;:&quot;Đắk Lắk&quot;,&quot;province_code&quot;:null,&quot;district&quot;:&quot;Huyện Krông Búk&quot;,&quot;district_code&quot;:null,&quot;zip&quot;:null,&quot;country_code&quot;:&quot;VN&quot;}, shipping_expand:true,show_district:  true ,show_country:  true }" class="shipping  hide ">
                                        <div bind-show="shipping_expand || !otherAddress">
                                            <div class="form-group">
                                                <div class="field__input-wrapper" bind-class="{ 'js-is-filled': shipping_address.full_name }">
                                                    <span class="field__label" bind-event-click="handleClick(this)">
                                                        Họ và tên
                                                    </span>
                                                    <input name="ShippingAddress.LastName" bind-event-change="saveAbandoned()" type="text" bind-event-focus="handleFocus(this)" bind-event-blur="handleFieldBlur(this)" class="field__input form-control" id="_shipping_address_last_name" data-error="Vui lòng nhập họ tên" bind="shipping_address.full_name" />
                                                </div>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            
                                                <div class="form-group">
                                                    <div class="field__input-wrapper" bind-class="{ 'js-is-filled': shipping_address.phone }">
                                                        <span class="field__label" bind-event-click="handleClick(this)">
                                                            Số điện thoại
                                                        </span>
                                                        <input name="ShippingAddress.Phone" bind-event-change="saveAbandoned()" type="tel" bind-event-focus="handleFocus(this)" bind-event-blur="handleFieldBlur(this)" class="field__input form-control" id="_shipping_address_phone"  data-error="Vui lòng nhập số điện thoại" pattern="^([0-9,\+,\-,\(,\),\.]{8,20})$" bind="shipping_address.phone"/>
                                                    </div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            
                                            
                                                <div class="form-group">
                                                    <div class="field__input-wrapper" bind-class="{ 'js-is-filled': shipping_address.address1 }">
                                                        <span class="field__label" bind-event-click="handleClick(this)">
                                                            Địa chỉ
                                                        </span>
                                                        <input name="ShippingAddress.Address1" bind-event-change="saveAbandoned()" type="text" bind-event-focus="handleFocus(this)" bind-event-blur="handleFieldBlur(this)" class="field__input form-control" id="_shipping_address_address1"  bind="shipping_address.address1" />
                                                    </div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            
                                            
                                                
                                                <div class="form-group">
                                                    <div class="field__input-wrapper field__input-wrapper--select">
                                                        <label class="field__label" for="BillingProvinceId">
                                                            Tỉnh thành
                                                        </label>
                                                        <select class="field__input field__input--select form-control" name="ShippingProvinceId" id="shippingProvince" data-error="Bạn chưa chọn tỉnh thành" bind-event-change="shippingProviceChange('')" bind="ShippingProvinceId">
                                                            <option value=''>--- Chọn tỉnh thành ---</option>
                                                            
																
																	<option  value="1">Hà Nội</option>
																
																	<option  value="2">TP Hồ Chí Minh</option>
																
																	<option  value="3">An Giang</option>
																
																	<option  value="4">Bà Rịa-Vũng Tàu</option>
																
																	<option  value="5">Bắc Giang</option>
																
																	<option  value="6">Bắc Kạn</option>
																
																	<option  value="7">Bạc Liêu</option>
																
																	<option  value="8">Bắc Ninh</option>
																
																	<option  value="9">Bến Tre</option>
																
																	<option  value="10">Bình Định</option>
																
																	<option  value="11">Bình Dương</option>
																
																	<option  value="12">Bình Phước</option>
																
																	<option  value="13">Bình Thuận</option>
																
																	<option  value="14">Cà Mau</option>
																
																	<option  value="15">Cần Thơ</option>
																
																	<option  value="16">Cao Bằng</option>
																
																	<option  value="17">Đà Nẵng</option>
																
																	<option  value="18">Đắk Lắk</option>
																
																	<option  value="19">Đắk Nông</option>
																
																	<option  value="20">Điện Biên</option>
																
																	<option  value="21">Đồng Nai</option>
																
																	<option  value="22">Đồng Tháp</option>
																
																	<option  value="23">Gia Lai</option>
																
																	<option  value="24">Hà Giang</option>
																
																	<option  value="25">Hà Nam</option>
																
																	<option  value="26">Hà Tĩnh</option>
																
																	<option  value="27">Hải Dương</option>
																
																	<option  value="28">Hải Phòng</option>
																
																	<option  value="29">Hậu Giang</option>
																
																	<option  value="30">Hòa Bình</option>
																
																	<option  value="31">Hưng Yên</option>
																
																	<option  value="32">Khánh Hòa</option>
																
																	<option  value="33">Kiên Giang</option>
																
																	<option  value="34">Kon Tum</option>
																
																	<option  value="35">Lai Châu</option>
																
																	<option  value="36">Lâm Đồng</option>
																
																	<option  value="37">Lạng Sơn</option>
																
																	<option  value="38">Lào Cai</option>
																
																	<option  value="39">Long An</option>
																
																	<option  value="40">Nam Định</option>
																
																	<option  value="41">Nghệ An</option>
																
																	<option  value="42">Ninh Bình</option>
																
																	<option  value="43">Ninh Thuận</option>
																
																	<option  value="44">Phú Thọ</option>
																
																	<option  value="45">Phú Yên</option>
																
																	<option  value="46">Quảng Bình</option>
																
																	<option  value="47">Quảng Nam</option>
																
																	<option  value="48">Quảng Ngãi</option>
																
																	<option  value="49">Quảng Ninh</option>
																
																	<option  value="50">Quảng Trị</option>
																
																	<option  value="51">Sóc Trăng</option>
																
																	<option  value="52">Sơn La</option>
																
																	<option  value="53">Tây Ninh</option>
																
																	<option  value="54">Thái Bình</option>
																
																	<option  value="55">Thái Nguyên</option>
																
																	<option  value="56">Thanh Hóa</option>
																
																	<option  value="57">Thừa Thiên Huế</option>
																
																	<option  value="58">Tiền Giang</option>
																
																	<option  value="59">Trà Vinh</option>
																
																	<option  value="60">Tuyên Quang</option>
																
																	<option  value="61">Vĩnh Long</option>
																
																	<option  value="62">Vĩnh Phúc</option>
																
																	<option  value="63">Yên Bái</option>
																
															
                                                        </select>
                                                    </div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                
                                                    <div class="form-group">
                                                        <div class="field__input-wrapper field__input-wrapper--select">
                                                            <label class="field__label" for="BillingDistrictId">
                                                                Quận huyện
                                                            </label>
                                                            <select class="field__input field__input--select form-control" name="ShippingDistrictId" id="shippingDistrict"  bind-event-change="shippingDistrictChange('')" bind="ShippingDistrictId">
                                                                <option value="">--- Chọn quận huyện ---</option>
																
																	
																
                                                            </select>
                                                        </div>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                
                                            
                                            <div class="form-group">
                                                <div class="error hide" bind-show="requiresShipping && shippingMethods.length == 0 && ShippingProvinceId ">
                                                    <label>Khu vực này không hỗ trợ vận chuyển</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="section" bind-class="{ 'pt0': otherAddress, 'pt10': !otherAddress}">
                                <div class="section__content">
                                    <div class="form-group m0">
                                        <textarea name="note" bind-event-change="saveAbandoned()" value="" class="field__input form-control m0" placeholder="Ghi chú"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="section shipping-method hide" bind-show="shippingMethods.length > 0">
                                <div class="section__header">
                                    <h2 class="section__title">
                                        <i class="fa fa-truck fa-lg section__title--icon hidden-md hidden-lg" aria-hidden="true"></i>
                                        <label class="control-label">Vận chuyển</label>
                                    </h2>
                                </div>
                                <div class="section__content">
                                    <div class="content-box">
									
                                    </div>
                                </div>
                            </div>
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
        </div> <!-- /radio-wrapper--> 
    </div>
    
        <div class="radio-wrapper content-box__row content-box__row--secondary hide" id="payment-gateway-subfields-284579" bind-show="payment_method_id == 284579">
            <div class="blank-slate">
                <p>cod</p>

                
            </div>
        </div>
    

<a href="javascript:void(0)" data-toggle="modal" data-target="#moca-modal" data-backdrop="static" data-keyboard="false" class="trigger-moca-modal" style="display: none;" title="Thanh toán qua Moca">
</a>
<a href="javascript:void(0)" data-toggle="modal" data-target="#qr-error-modal" class="trigger-qr-error-modal" style="display: none;" title="Lỗi thanh toán">
</a>
<a data-toggle="modal" data-target="#zalopay_modal" data-backdrop="static" data-keyboard="false" class="trigger-zalopay-modal" style="display: none;" title="Thanh toán qua ZaloPay">
</a>
<div class="modal fade moca-modal" id="moca-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div>
                <iframe style="border: 0px; width: 100%; height: 100%;" src=""></iframe>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="qr-error-modal" data-width="" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <div class="invalid_order">
                    <p>Giao dịch của bạn chưa đủ hạn mức thanh toán</p>
                    <p>Hạn mức tối thiểu để thanh toán được là <span>1đ</span></p>
                    <p>Vui lòng chọn hình thức thanh toán khác</p>
                </div>
				<div class="custom_error_message"></div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade zalopay_modal" id="zalopay_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div style="display:flex; justify-content: space-around;">
				    <div class="qr-wrapper">
				        <img />
						<div class="qr-timer-container">
						    Thời gian quét mã QR để thanh toán còn <span class="qr-timer" style="color:#4286f6;">300</span> giây
						</div>
				    </div>
					<div class="qr-guide-content">
					    <p><b>Thực hiện theo hướng dẫn sau để thanh toán:</b></p>
						<p>Bước 1: Mở ứng dụng ZaloPay</p>
						<p>Bước 2: Chọn "Thanh Toán" <img src="//bizweb.dktcdn.net/assets/images/barcode-zalo.png" class="zalopay-qr-payment-icon"></img> và quét mã QR code bên cạnh</p>
						<p>Bước 3: Hoàn thành các bước thanh toán theo hướng dẫn trên ứng dụng</p>
					</div>
				</div>
				<div style="justify-content: flex-end;display: flex;"><button type="button" class="btn btn-default" data-dismiss="modal">Hủy thanh toán</button></div>
            </div>
        </div>
    </div>
</div>

                                    </div>
                                </div>
                            </div>
                            <div class="section hidden-md hidden-lg">
                                <div class="form-group clearfix m0">
                                    <input class="btn btn-primary btn-checkout" data-loading-text="Đang xử lý" type="button" bind-event-click="paymentCheckout('AIzaSyAjQYbV19v7UMDVk0cDZ54yKh3OP1hQhbk;AIzaSyCLd-YkfOzBXlNGfS_FNLnpolyME1tRAJI;AIzaSyDdvilzaJlb50t2IRC3PrfSb1lNzf6n3pQ')" value="ĐẶT HÀNG" />
                                </div>
                                <div class="text-center mt20">
                                    <a class="previous-link" href="/cart">
                                        <i class="fa fa-angle-left fa-lg" aria-hidden="true"></i>
                                        <span>Quay về giỏ hàng</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="main_footer footer unprint">
    
    
    
    <div class="mt10"></div>
</div>
<div class="modal fade" id="refund-policy" data-width="" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Chính sách hoàn trả</h4>
            </div>
            <div class="modal-body">
                <pre></pre>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="privacy-policy" data-width="" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Chính sách bảo mật</h4>
            </div>
            <div class="modal-body">
                <pre></pre>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="terms-of-service" data-width="" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Điều khoản sử dụng</h4>
            </div>
            <div class="modal-body">
                <pre></pre>
            </div>
        </div>
    </div>
</div>
            </div>
        </div>
	</form>

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
		
		
			
				
				$("select[name='BillingDistrictId']").trigger("change");
				
			
		
		}, 50);
		
    });
</script>
	
</body>
</html>