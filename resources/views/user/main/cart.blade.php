<script>
	Bizweb.updateCartFromForm = function(cart, cart_summary_id, cart_count_id) {
		if ((typeof cart_summary_id) === 'string') {
			var cart_summary = jQuery(cart_summary_id);
			if (cart_summary.length) {
				// Start from scratch.
				cart_summary.empty();
				// Pull it all out.        
				jQuery.each(cart, function(key, value) {
					if (key === 'items') {
						var table = jQuery(cart_summary_id);           
						if (value.length) {   
							jQuery('<ul class="list-item-cart"></ul>').appendTo(table);
							jQuery.each(value, function(i, item) {	
								var src = Bizweb.resizeImage(item.image, 'small');
								if(src == null){
									src = "{{url('/')}}/public/home_user/image/no-image736b.png?1524451884518";
								}
								var buttonQty = "";
								if(item.quantity == '1'){
									buttonQty = 'disabled';
								}else{
									buttonQty = '';
								}
								if (item.variant_title == 'Default Title'){
									var item_variant_title = "";
								} else {
									var item_variant_title = '<p class="hover-cart-variant-title"><span>'+ item.variant_title+ '</span></p>';
								}
								jQuery('<li class="item productid-' + item.variant_id +'">'
									+	'<a class="product-image" href="' + item.url + '" title="' + item.name + '">'
									+		'<img alt="'+  item.name  + '" src="' + src +  '"\>'
									+	'</a>'
									+	'<div class="detail-item">'
									+		'<div class="product-details">'
									+			'<a href="javascript:;" data-id="'+ item.variant_id +'" title="Xóa" class="remove-item-cart fa fa-times-circle">&nbsp;</a>'
									+			'<p class="product-name text3line">'
									+				'<a href="' + item.url + '" title="' + item.name + '">' + item.title + '</a>'
									+			'</p>'
									+			item_variant_title
									+		'</div>'
									+ 		'<div class="product-details-bottom">'
									+			'<span class="price">'
									+				Bizweb.formatMoney(item.price, "{{amount_no_decimals_with_comma_separator}}₫")
									+			'</span>'
									+ 			'<div class="quantity-select">'
									+				'<input class="variantID" type="hidden" name="variantId" value="'+ item.variant_id +'">'
									+				'<button onClick="var result = document.getElementById(\'qty'+ item.variant_id +'\'); var qty'+ item.variant_id +' = result.value; if( !isNaN( qty'+ item.variant_id +' ) &amp;&amp; qty'+ item.variant_id +' &gt; 1 ) result.value--;return false;" class="reduced items-count btn-minus" ' + buttonQty + ' type="button">–</button>'
									+				'<input onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" onChange="validateInput(this);" type="text" maxlength="12" min="1" class="input-text number-sidebar qty'+ item.variant_id +'" id="qty'+ item.variant_id +'" name="Lines" id="updates_'+ item.variant_id +'" size="4" value="'+ item.quantity +'">'
									+				'<button onClick="var result = document.getElementById(\'qty'+ item.variant_id +'\'); var qty'+ item.variant_id +' = result.value; if( !isNaN( qty'+ item.variant_id +' )) result.value++;return false;" class="increase items-count btn-plus" type="button">+</button>'
									+			'</div>'
									+		'</div>'
									+	'</div>'
									+'</li>').appendTo(table.children('.list-item-cart'));
							}); 
							jQuery('<div class="top-subtotal">Thành tiền: <span class="price">' + Bizweb.formatMoney(cart.total_price, "{{amount_no_decimals_with_comma_separator}}₫") + '</span></div>').appendTo(table);
							jQuery('<div class="actions">'
								+	'<a href="/cart" class="btn btn_versus btn-to-cart" title="Tới giỏ hàng">'
								+		'<span>Giỏ hàng</span>'
								+	'</a>'
								+	'<a href="/checkout" class="btn btn_versus btn-checkout" title="Tiến hành thành toán">'
								+		'<span>Thanh toán</span>'
								+	'</a>'
								+'</div>').appendTo(table);
						}
						else {
							jQuery('<div class="no-item"><p>Không có sản phẩm nào trong giỏ hàng.</p></div>').appendTo(table);

						}
					}
				});
			}
		}
		updateCartDesc(cart);
	}

	Bizweb.updateCartPageForm = function(cart, cart_summary_id, cart_count_id) {
		if ((typeof cart_summary_id) === 'string') {
			var cart_summary = jQuery(cart_summary_id);
			if (cart_summary.length) {
				// Start from scratch.
				cart_summary.empty();
				// Pull it all out.        
				jQuery.each(cart, function(key, value) {
					if (key === 'items') {
						var table = jQuery(cart_summary_id);           
						if (value.length) {  

							var pageCart = '<div class="cart page_cart hidden-xs">'
							+					'<form action="/cart" method="post" novalidate class="margin-bottom-0">'
							+						'<div class="bg-scroll">'
							+							'<div class="cart-thead">'
							+								'<div style="width: 17%">Ảnh sản phẩm</div>'
							+								'<div style="width: 33%"><span class="nobr">Tên sản phẩm</span></div>'
							+								'<div style="width: 15%" class="a-center"><span class="nobr">Đơn giá</span></div>'
							+								'<div style="width: 14%" class="a-center">Số lượng</div>'
							+								'<div style="width: 15%" class="a-center">Thành tiền</div>'
							+								'<div style="width: 6%">Xoá</div>'
							+							'</div>'
							+ 							'<div class="cart-tbody">'
							+							'</div>'
							+						'</div>'
							+					'</form>'
							+				'</div>'; 
							var pageCartCheckout = '<div class="cart-collaterals cart_submit row">'
							+							'<div class="totals col-sm-12 col-md-12 col-xs-12">'
							+								'<div class="totals">'
							+									'<div class="inner">'
							+ 										'<table class="table shopping-cart-table-total margin-bottom-0" id="shopping-cart-totals-table">'
							+											'<colgroup>'
							+												'<col><col>'
							+											'</colgroup>'
							+ 											'<tfoot>'
							+												'<tr>'
							+													'<td colspan="20" class="a-right">'
							+														'<span>Tổng tiền</span>'
							+													'</td>'
							+													'<td class="a-right">'
							+														'<strong>'
							+															'<span class="totals_price price">'
							+																Bizweb.formatMoney(cart.total_price, "{{amount_no_decimals_with_comma_separator}}₫")
							+ 															'</span>'
							+														'</strong>'
							+													'</td>'
							+												'</tr>'
							+											'</tfoot>'
							+										'</table>'
							+ 										'<ul class="checkout">'
							+											'<li class="clearfix">'
							+												'<button class="btn btn_versus f-left" title="Tiếp tục mua hàng" type="button" onclick="window.location.href=\'/collections/all\'">'
							+													'<span>Tiếp tục mua hàng</span>'
							+												'</button>'
							+												'<button class="btn btn_versus f-left" title="Xóa đơn hàng" type="button" onclick="window.location.href=\'/cart/clear\'">'
							+													'<span>Xóa đơn hàng</span>'
							+												'</button>'
							+												'<button class="btn btn_versus btn-uppercase f-right" title="Tiến hành đặt hàng" type="button" onclick="window.location.href=\'/checkout\'">'
							+													'<span>Đặt hàng</span>'
							+												'</button>'
							+											'</li>'
							+ 										'</ul>'
							+									'</div>'
							+								'</div>'
							+							'</div>'
							+						'</div>';
							jQuery(pageCart).appendTo(table);
							jQuery.each(value, function(i, item) {
								var buttonQty = "";
								if(item.quantity == '1'){
									buttonQty = 'disabled';
								}else{
									buttonQty = '';
								}
								var link_img1 = Bizweb.resizeImage(item.image, 'small');
								if(link_img1=="null" || link_img1 =='' || link_img1 == null){
									link_img1 = "{{url('/')}}/public/home_user/image/no-image736b.png?1524451884518";
								}
								var pageCartItem = '<div class="item-cart productid-' + item.variant_id +'">'
								+						'<div style="width: 17%" class="image dp-flex">'
								+							'<a class="product-image" title="' + item.name + '" href="' + item.url + '">'
								+								'<img alt="' + item.name + '" src="' + link_img1 +  '">'
								+							'</a>'
								+						'</div>'
								+ 						'<div style="width: 33%;" class="a-center dp-flex">'
								+							'<h3 class="product-name text3line" title="'+ item.title +'">'
								+								'<a href="' + item.url + '">' + item.title + '</a>'
								+							'</h3>'
								+							'<span class="variant-title">' + item.variant_title + '</span>'
								+						'</div>'
								+						'<div style="width: 15%" class="a-center">'
								+							'<span class="item-price">'
								+								'<span class="price">' + Bizweb.formatMoney(item.price, "{{amount_no_decimals_with_comma_separator}}₫") + '</span>'
								+							'</span>'
								+						'</div>'
								+ 						'<div style="width: 14%" class="a-center dp-flex">'
								+							'<div class="input_qty_pr">'
								+								'<input class="variantID" type="hidden" name="variantId" value="'+ item.variant_id +'">'
								+								'<button onClick="var result = document.getElementById(\'qtyItem'+ item.variant_id +'\'); var qtyItem'+ item.variant_id +' = result.value; if( !isNaN( qtyItem'+ item.variant_id +' ) &amp;&amp; qtyItem'+ item.variant_id +' &gt; 1 ) result.value--;return false;" ' + buttonQty + ' class="reduced_pop items-count btn-minus" type="button">–</button>'
								+								'<input onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" onChange="validateInput(this);" type="text" maxlength="12" min="0" class="input-text number-sidebar input_pop input_pop qtyItem'+ item.variant_id +'" id="qtyItem'+ item.variant_id +'" name="Lines" id="updates_'+ item.variant_id +'" size="4" value="'+ item.quantity +'">'
								+								'<button onClick="var result = document.getElementById(\'qtyItem'+ item.variant_id +'\'); var qtyItem'+ item.variant_id +' = result.value; if( !isNaN( qtyItem'+ item.variant_id +' )) result.value++;return false;" class="increase_pop items-count btn-plus" type="button">+</button>'
								+							'</div>'
								+						'</div>'
								+ 						'<div style="width: 15%" class="a-center">'
								+							'<span class="cart-price">'
								+								'<span class="price">'+ Bizweb.formatMoney(item.price * item.quantity, "{{amount_no_decimals_with_comma_separator}}₫") +'</span>'
								+							'</span>'
								+						'</div>'
								+ 						'<div style="width: 6%">'
								+							'<a class="button remove-item remove-item-cart" title="Xóa" href="javascript:;" data-id="'+ item.variant_id +'">'
								+								'<span>'
								+									'<span>Xóa</span>'
								+								'</span>'
								+							'</a>'
								+						'</div>'
								+					'</div>';
								jQuery(pageCartItem).appendTo(table.find('.cart-tbody'));
								if(item.variant_title == 'Default Title'){
									$('.variant-title').hide();
								}
							}); 
							jQuery(pageCartCheckout).appendTo(table.children('.cart'));
						}else {
							jQuery('<p class="hidden-xs-down margin-top-30">Không có sản phẩm nào trong giỏ hàng. Quay lại <a href="/" style="color:#d20a0a;">cửa hàng</a> để tiếp tục mua sắm.</p>').appendTo(table);
							jQuery('.cart_desktop_page').css('min-height', 'auto');
						}
					}
				});
}
}
updateCartDesc(cart);
jQuery('#wait').hide();
}

Bizweb.updateCartPageFormMobile = function(cart, cart_summary_id, cart_count_id) {
	if ((typeof cart_summary_id) === 'string') {
		var cart_summary = jQuery(cart_summary_id);
		if (cart_summary.length) {
				// Start from scratch.
				cart_summary.empty();
				// Pull it all out.        
				jQuery.each(cart, function(key, value) {
					if (key === 'items') {

						var table = jQuery(cart_summary_id);           
						if (value.length) {   
							jQuery('<div class="cart_page_mobile content-product-list"></div>').appendTo(table);
							jQuery.each(value, function(i, item) {
								if( item.image != null){
									var src = Bizweb.resizeImage(item.image, 'small');
								}else{
									var src = "{{url('/')}}/public/home_user/image/no-image736b.png?1524451884518";
								}
								jQuery('<div class="item-product item productid-' + item.variant_id +' ">'
									+		'<div class="item-product-cart-mobile">'
									+			'<a class="product-images1" href="' + item.url + '"  title="' + item.name + '">'
									+				'<img src="' + src +  '" alt="' + item.name + '">'
									+			'</a>'
									+		'</div>'
									+ 		'<div class="title-product-cart-mobile">'
									+			'<h3>'
									+				'<a href="' + item.url + '" title="' + item.name + '">' + item.name + '</a>'
									+			'</h3>'
									+			'<p>Giá: <span>' + Bizweb.formatMoney(item.price, "{{amount_no_decimals_with_comma_separator}}₫") + '</span></p>'
									+		'</div>'
									+ 		'<div class="select-item-qty-mobile">'
									+			'<div class="txt_center">'
									+ 				'<input class="variantID" type="hidden" name="variantId" value="'+ item.variant_id +'">'
									+				'<button onClick="var result = document.getElementById(\'qtyMobile'+ item.variant_id +'\'); var qtyMobile'+ item.variant_id +' = result.value; if( !isNaN( qtyMobile'+ item.variant_id +' ) &amp;&amp; qtyMobile'+ item.variant_id +' &gt; 0 ) result.value--;return false;" class="reduced items-count btn-minus" type="button">–</button>'
									+				'<input onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" onChange="validateInput(this);" type="text" maxlength="12" min="0" class="input-text number-sidebar qtyMobile'+ item.variant_id +'" id="qtyMobile'+ item.variant_id +'" name="Lines" id="updates_'+ item.variant_id +'" size="4" value="'+ item.quantity +'">'
									+				'<button onClick="var result = document.getElementById(\'qtyMobile'+ item.variant_id +'\'); var qtyMobile'+ item.variant_id +' = result.value; if( !isNaN( qtyMobile'+ item.variant_id +' )) result.value++;return false;" class="increase items-count btn-plus" type="button">+</button>'
									+			'</div>'
									+ 			'<a class="button remove-item remove-item-cart" href="javascript:;" data-id="'+ item.variant_id +'">Xoá</a>'
									+		'</div>').appendTo(table.children('.content-product-list'));

							});

							jQuery('<div class="header-cart-price">'
								+		'<div class="title-cart">'
								+			'<h3 class="text-xs-left">Tổng tiền</h3>'
								+			'<a class="text-xs-right totals_price_mobile">' + Bizweb.formatMoney(cart.total_price, "{{amount_no_decimals_with_comma_separator}}₫") + '</a>'
								+		'</div>'
								+ 		'<div class="checkout">'
								+			'<button class="btn-proceed-checkout-mobile btn_versus" title="Tiến hành thanh toán" type="button" onclick="window.location.href=\'/checkout\'">'
								+ 				'<span>Thanh toán</span>'
								+			'</button>'
								+		'</div>'
								+	'</div>').appendTo(table);
						}

					}
				});
			}
		}
		updateCartDesc(cart);
	}

	Bizweb.updateCartPopupForm = function(cart, cart_summary_id, cart_count_id) {
		if ((typeof cart_summary_id) === 'string') {
			var cart_summary = jQuery(cart_summary_id);
			if (cart_summary.length) {
				cart_summary.empty();
				jQuery.each(cart, function(key, value) {
					if (key === 'items') {
						var table = jQuery(cart_summary_id);           
						if (value.length) { 
							jQuery.each(value, function(i, item) {
								var src = Bizweb.resizeImage(item.image, 'small');
								if(src == null){
									src = "{{url('/')}}/public/home_user/image/no-image736b.png?1524451884518";
								}
								var buttonQty = "";
								if(item.quantity == '1'){
									buttonQty = 'disabled';
								}else{
									buttonQty = '';
								}
								if (item.variant_title == 'Default Title'){
									var popup_variant_title = "";
								} else {
									var popup_variant_title = item.variant_title;
								}
								var pageCartItem = '<div class="item-popup productid-' + item.variant_id +'">'
								+						'<div style="width: 140px;" class="text-center">'
								+							'<div class="item-image">'
								+								'<a class="product-image" href="' + item.url + '" title="' + item.name + '">'
								+									'<img alt="'+  item.name  + '" src="' + src +  '"\>'
								+								'</a>'
								+ 							'</div>'
								+						'</div>'
								+						'<div style="width:225px" class="text-left popup-item-name">'
								+							'<div class="item-info">'
								+								'<p class="item-name text3line">'
								+									'<a href="' + item.url + '" title="' + item.name + '">' + item.title + '</a>'
								+								'</p>'
								+ 								'<p class="variant-title-popup">' + popup_variant_title + '</p>'
								+								'<p class="addpass" style="color:#fff;">'+ item.variant_id +'</p>'
								+							'</div>'
								+						'</div>'
								+ 						'<div style="width: 140px" class="text-center">'
								+							'<div class="item-price">'
								+								'<span class="price">' + Bizweb.formatMoney(item.price, "{{amount_no_decimals_with_comma_separator}}₫") + '</span>'
								+	 						'</div>'
								+						'</div>'
								+						'<div style="width: 140px;" class="text-center padding-10">'
								+							'<input class="variantID" type="hidden" name="variantId" value="'+ item.variant_id +'">'
								+							'<button onClick="var result = document.getElementById(\'qtyItem'+ item.variant_id +'\'); var qtyItem'+ item.variant_id +' = result.value; if( !isNaN( qtyItem'+ item.variant_id +' ) &amp;&amp; qtyItem'+ item.variant_id +' &gt; 1 ) result.value--;return false;" ' + buttonQty + ' class="reduced items-count btn-minus" type="button">–</button>'
								+							'<input onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" onChange="validateInput(this);" type="text" maxlength="12" min="1" class="input-text number-sidebar qtyItem'+ item.variant_id +'" id="qtyItem'+ item.variant_id +'" name="Lines" id="updates_'+ item.variant_id +'" size="4" value="'+ item.quantity +'">'
								+							'<button onClick="var result = document.getElementById(\'qtyItem'+ item.variant_id +'\'); var qtyItem'+ item.variant_id +' = result.value; if( !isNaN( qtyItem'+ item.variant_id +' )) result.value++;return false;" class="increase items-count btn-plus" type="button">+</button>'
								+						'</div>'
								+ 						'<div style="width: 150px;" class="text-center">'
								+							'<span class="cart-price">'
								+								'<span class="price">'+ Bizweb.formatMoney(item.price * item.quantity, "{{amount_no_decimals_with_comma_separator}}₫") +'</span>'
								+							'</span>'
								+						'</div>'
								+						'<div style="width: 70px" class="text-center">'
								+ 							'<p class="item-remove">'
								+								'<a href="javascript:;" class="remove-item-cart" title="Xóa" data-id="'+ item.variant_id +'">'
								+									'<i class="fa fa-close"></i>'
								+								'</a>'
								+							'</p>'
								+						'</div>'
								+					'</div>';
								jQuery(pageCartItem).appendTo(table);
								
								$('.link_product').text();
							}); 
						}
					}
				});
			}
		}
		jQuery('.total-price').html(Bizweb.formatMoney(cart.total_price, "{{amount_no_decimals_with_comma_separator}}₫"));
		updateCartDesc(cart);
	}


	function updateCartDesc(data){
		var $cartPrice = Bizweb.formatMoney(data.total_price, "{{amount_no_decimals_with_comma_separator}}₫"),
		$cartMobile = $('#cart_count_mobile'),
		$cartDesktop = $('.count_item_pr'),
		$cartDesktopList = $('.cart-counter-list'),
		$cartPopup = $('.cart-popup-count');

		switch(data.item_count){
			case 0:
			$cartMobile.text('0');
			$cartDesktop.text('0');
			$cartDesktopList.text('0');
			$cartPopup.text('0');

			break;
			case 1:
			$cartMobile.text('1');
			$cartDesktop.text('1');
			$cartDesktopList.text('1');
			$cartPopup.text('1');

			break;
			default:
			$cartMobile.text(data.item_count);
			$cartDesktop.text(data.item_count);
			$cartDesktopList.text(data.item_count);
			$cartPopup.text(data.item_count);

			break;
		}
		$('.top-cart-content .top-subtotal .price, aside.sidebar .block-cart .subtotal .price, .popup-total .total-price').html($cartPrice);
		$('.popup-total .total-price').html($cartPrice);
		$('.shopping-cart-table-total .totals_price').html($cartPrice);
		$('.header-cart-price .totals_price_mobile').html($cartPrice);
		$('.cartCount').html(data.item_count);
	}

	Bizweb.onCartUpdate = function(cart) {
		Bizweb.updateCartFromForm(cart, '.mini-products-list');
		Bizweb.updateCartPopupForm(cart, '#popup-cart-desktop .tbody-popup');
		
	};
	Bizweb.onCartUpdateClick = function(cart, variantId) {
		jQuery.each(cart, function(key, value) {
			if (key === 'items') {    
				jQuery.each(value, function(i, item) {	
					if(item.variant_id == variantId){
						$('.productid-'+variantId).find('.cart-price span.price').html(Bizweb.formatMoney(item.price * item.quantity, "{{amount_no_decimals_with_comma_separator}}₫"));
						$('.productid-'+variantId).find('.items-count').prop("disabled", false);
						$('.productid-'+variantId).find('.number-sidebar').prop("disabled", false);
						$('.productid-'+variantId +' .number-sidebar').val(item.quantity);
						if(item.quantity == '1'){
							$('.productid-'+variantId).find('.items-count.btn-minus').prop("disabled", true);
						}
					}
				}); 
			}
		});
		updateCartDesc(cart);
	}
	Bizweb.onCartRemoveClick = function(cart, variantId) {
		jQuery.each(cart, function(key, value) {
			if (key === 'items') {    
				jQuery.each(value, function(i, item) {	
					if(item.variant_id == variantId){
						$('.productid-'+variantId).remove();
					}
				}); 
			}
		});
		updateCartDesc(cart);
	}
	$(window).ready(function(){
		$.ajax({
			type: 'GET',
			url: '/cart.js',
			async: false,
			cache: false,
			dataType: 'json',
			success: function (cart){
				Bizweb.updateCartFromForm(cart, '.mini-products-list');
				Bizweb.updateCartPopupForm(cart, '#popup-cart-desktop .tbody-popup'); 
				
			}
		});
	});

</script>