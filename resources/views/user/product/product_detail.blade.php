@extends('user.main.home')
@section('title','Tất cả sản phẩm')
<!-- Header -->
@section('main-content')
<!-- Breadcrumb -->
<section class="bread-crumb">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<ul class="breadcrumb" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">					
					<li class="home">
						<a href="{{route('user')}}" ><span itemprop="title">Trang chủ</span></a>						
					</li>

					<li>
						<a itemprop="url" href="/nike">
							<span itemprop="title">{{$pros->prod_cat->name}}</span>
						</a>
					</li>

					<li>
						<strong><span itemprop="title">{{$pros->name}}</span></strong>
						<li>


						</ul>
					</div>
				</div>
			</div>
		</section>
		<section class="product-template product" itemscope itemtype="http://schema.org/Product">
			<meta itemprop="url" content="{{route('user.product-detail',['slug'=>$pros->slug,'size'=>$pros_detail->size,'color'=>$pros_detail->color])}}">
			<meta itemprop="image" content="{{url('/')}}/resources/views/admin/product/uploads/{{$pros_detail->image}}">
			<meta itemprop="description" content="{{$pros->name}}">

			<div class="container">
				<div class="row">
					<div class="details-product">
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 product-images images-pro">
							<div class="row">

								<div class="col-lg-2 col-md-3 col-sm-2 col-xs-3 thumb-images">
									<div id="gallery_01">
										<ul class="slides">
											@foreach($pros_image as $pro_image)
											<li class="item">

												<a class="dp-flex" href="{{url('/')}}/resources/views/admin/product/uploads/{{$pro_image->image}}" class="large_image_url checkurl" data-rel="prettyPhoto[product-gallery]">
													<img src="{{url('/')}}/resources/views/admin/product/uploads/{{$pro_image->image}}" alt="{{$pros->name}}" class="img-responsive img_02"/>
												</a>

											</li>
											@endforeach
										</ul>
									</div>
								</div>


								<div class="col-xs-9 col-sm-10 col-md-9 col-lg-10 large-image">
									<a href="{{url('/')}}/resources/views/admin/product/uploads/{{$pros_detail->image}}" class="large_image_url checkurl" data-rel="prettyPhoto[product-gallery]">

										<img id="img_01" class="img-responsive" alt="{{$pros->name}}" src="{{url('/')}}/resources/views/admin/product/uploads/{{$pros_detail->image}}" data-zoom-image="{{url('/')}}/resources/views/admin/product/uploads/{{$pros_detail->image}}"/>

									</a>
								</div>
							</div>
						</div>

						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 details-pro">
							<h1 class="title-head product-name" itemprop="name">
								{{$pros->name}}
							</h1>


							<div class="product-review rated_star">
								<div class="bizweb-product-reviews-badge" data-id="9455325"></div>
							</div>




							<div class="price-box price-box-product" itemscope itemtype="http://schema.org/Offer">



								<span class="special-price">
									<span class="price" itemprop="price">{{number_format($pros_detail->price_sale)}} VND</span>
									<meta itemprop="priceCurrency" content="VND">
								</span>
								<span class="old-price">
									<span class="price" itemprop="priceSpecification">

										{{number_format($pros_detail->price)}} VND

									</span>
									<meta itemprop="priceCurrency" content="VND">
								</span>



							</div>


							<div class="vat_enable ">
								* <em>Giá chưa bao gồm VAT</em>
							</div>



							<ul class="product-info">

								<li class="product_sku">
									<span>Mã SP: </span><strong itemprop="sku">{{$pros->id}}</strong>
								</li>


								<li class="product-inventory" itemscope itemtype="http://schema.org/ItemAvailability">
									@if($pros_detail->status == 0)
									<span>Tình trạng: </span><strong itemprop="supersededBy">Còn hàng</strong><em></em>
									@endif

									@if($pros_detail->status == 1)
									<span>Tình trạng: </span><strong itemprop="supersededBy">Hết hàng</strong><em></em>
									@endif
								</li>


								<li class="product-type">
									<span>Loại: </span><strong itemprop="model">{{$pros->prod_cat->name}}</strong>
								</li>


								<li class="product-vendor" itemprop="brand" itemscope itemtype="http://schema.org/Organization">
									<span>Hãng: </span><strong itemprop="name">{{$pros->prod_brand->name}}</strong>
								</li>

							</ul>

							@if(Auth::guard('customer')->check())
							<form enctype="multipart/form-data" id="add-to-cart-form" action="{{route('user.cart_add_post',['customer_id'=>Auth::guard('customer')->user()->id,'product_detail_id'=>$pros_detail->id,'quantity'=>1,'product_id'=>$pros->id])}}" method="post" class="form-inline">
								@else
								<form enctype="multipart/form-data" id="add-to-cart-form" action="{{route('user.post-add-to-cart_user',['id' => $pros_detail->product_id])}}" method="post" class="form-inline">
									@endif
									<div class=" swatch-size swatch clearfix" data-option-index="0">
										<div class="header">
											<span class="swatch-title">
												Kích thước : 
											</span>
											<div class="swatch-content">

												<span data-toggle="modal" data-target="#size_chart" class="size_chart_title">Hướng dẫn chọn size</span>
												<div class="modal fade" id="size_chart" tabindex="-1" role="dialog" aria-labelledby="size_chart_title">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
																<h4 class="modal-title" id="size_chart_title">
																	Hướng dẫn chọn size
																</h4>
															</div>
															<div class="modal-body">
																<a href="//bizweb.dktcdn.net/100/278/638/themes/704696/assets/size_chart.png?1547735708033">
																	<img src="//bizweb.dktcdn.net/100/278/638/themes/704696/assets/size_chart.png?1547735708033" alt="huong-dan-chon-size" class="img_responsive"/>
																</a>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn_versus" data-dismiss="modal">Đóng</button>
															</div>
														</div>
													</div>
												</div>

												<!-- MUST NOT DELETE -->
												<script>
													$('.size_chart_title').on('click', function(e){});
												</script>

											</div>
											<script>
												/* Last Element in row check */
												function checkLastValueItem() {
													var lastElement = false;
													$(".product-detail-info li").each(function() {
														if (lastElement && lastElement.offset().top != $(this).offset().top) {
															$(lastElement).addClass("last_value_item");
														} else {
															$(lastElement).removeClass("last_value_item");
														}
														lastElement = $(this);
													}).last().addClass("lastElement");
												} window.checkLastValueItem = checkLastValueItem;

												$(document).ready(function(){
													checkLastValueItem();
													$(window).on('resize', function(){
														checkLastValueItem();
													});
												});
											</script>
										</div>
										<div class="data-value-group">
											<div data-value="35" class="swatch-element 35 available">



												<input id="swatch-0-35" type="radio" name="size" value="35" @if($pros_detail->size == 35) checked @endif />

												<label for="swatch-0-35">
													35
													<img class="crossed-out img-responsive" src="//bizweb.dktcdn.net/100/278/638/themes/704696/assets/soldout.png?1547735708033" alt="het-hang"/>
												</label>

											</div>


											<script>
												jQuery('.swatch[data-option-index="0"] .35').removeClass('soldout').addClass('available').find(':radio').removeAttr('disabled');
											</script>







											<div data-value="36" class="swatch-element 36 available">



												<input id="swatch-0-36" type="radio" name="size" value="36" @if($pros_detail->size == 36) checked @endif />

												<label for="swatch-0-36">
													36
													<img class="crossed-out img-responsive" src="//bizweb.dktcdn.net/100/278/638/themes/704696/assets/soldout.png?1547735708033" alt="het-hang"/>
												</label>

											</div>


											<script>
												jQuery('.swatch[data-option-index="0"] .36').removeClass('soldout').addClass('available').find(':radio').removeAttr('disabled');
											</script>







											<div data-value="37" class="swatch-element 37 available">



												<input id="swatch-0-37" type="radio" name="size" value="37" @if($pros_detail->size == 37) checked @endif />

												<label for="swatch-0-37">
													37
													<img class="crossed-out img-responsive" src="//bizweb.dktcdn.net/100/278/638/themes/704696/assets/soldout.png?1547735708033" alt="het-hang"/>
												</label>

											</div>


											<script>
												jQuery('.swatch[data-option-index="0"] .37').removeClass('soldout').addClass('available').find(':radio').removeAttr('disabled');
											</script>







											<div data-value="38" class="swatch-element 38 available">



												<input id="swatch-0-38" type="radio" name="size" value="38" @if($pros_detail->size == 38) checked @endif />

												<label for="swatch-0-38">
													38
													<img class="crossed-out img-responsive" src="//bizweb.dktcdn.net/100/278/638/themes/704696/assets/soldout.png?1547735708033" alt="het-hang"/>
												</label>

											</div>


											<script>
												jQuery('.swatch[data-option-index="0"] .38').removeClass('soldout').addClass('available').find(':radio').removeAttr('disabled');
											</script>







											<div data-value="39" class="swatch-element 39 available">



												<input id="swatch-0-39" type="radio" name="size" value="39" @if($pros_detail->size == 39) checked @endif />

												<label for="swatch-0-39">
													39
													<img class="crossed-out img-responsive" src="//bizweb.dktcdn.net/100/278/638/themes/704696/assets/soldout.png?1547735708033" alt="het-hang"/>
												</label>

											</div>


											<script>
												jQuery('.swatch[data-option-index="0"] .39').removeClass('soldout').addClass('available').find(':radio').removeAttr('disabled');
											</script>







											<div data-value="40" class="swatch-element 40 available">



												<input id="swatch-0-40" type="radio" name="size" value="40" @if($pros_detail->size == 40) checked @endif />

												<label for="swatch-0-40">
													40
													<img class="crossed-out img-responsive" src="//bizweb.dktcdn.net/100/278/638/themes/704696/assets/soldout.png?1547735708033" alt="het-hang"/>
												</label>

											</div>


											<script>
												jQuery('.swatch[data-option-index="0"] .40').removeClass('soldout').addClass('available').find(':radio').removeAttr('disabled');
											</script>







											<div data-value="41" class="swatch-element 41 available">



												<input id="swatch-0-41" type="radio" name="size" value="41" @if($pros_detail->size == 41) checked @endif />

												<label for="swatch-0-41">
													41
													<img class="crossed-out img-responsive" src="//bizweb.dktcdn.net/100/278/638/themes/704696/assets/soldout.png?1547735708033" alt="het-hang"/>
												</label>

											</div>


											<script>
												jQuery('.swatch[data-option-index="0"] .41').removeClass('soldout').addClass('available').find(':radio').removeAttr('disabled');
											</script>







											<div data-value="42" class="swatch-element 42 available">



												<input id="swatch-0-42" type="radio" name="size" value="42" @if($pros_detail->size == 42) checked @endif />

												<label for="swatch-0-42">
													42
													<img class="crossed-out img-responsive" src="//bizweb.dktcdn.net/100/278/638/themes/704696/assets/soldout.png?1547735708033" alt="het-hang"/>
												</label>

											</div>


											<script>
												jQuery('.swatch[data-option-index="0"] .42').removeClass('soldout').addClass('available').find(':radio').removeAttr('disabled');
											</script>







											<div data-value="43" class="swatch-element 43 available">



												<input id="swatch-0-43" type="radio" name="size" value="43" @if($pros_detail->size == 43) checked @endif />

												<label for="swatch-0-43">
													43
													<img class="crossed-out img-responsive" src="//bizweb.dktcdn.net/100/278/638/themes/704696/assets/soldout.png?1547735708033" alt="het-hang"/>
												</label>

											</div>


											<script>
												jQuery('.swatch[data-option-index="0"] .43').removeClass('soldout').addClass('available').find(':radio').removeAttr('disabled');
											</script>


											<div data-value="44" class="swatch-element 44 available">



												<input id="swatch-0-44" type="radio" name="size" value="44" @if($pros_detail->size == 44) checked @endif />

												<label for="swatch-0-44">
													44
													<img class="crossed-out img-responsive" src="//bizweb.dktcdn.net/100/278/638/themes/704696/assets/soldout.png?1547735708033" alt="het-hang"/>
												</label>

											</div>


											<script>
												jQuery('.swatch[data-option-index="0"] .44').removeClass('soldout').addClass('available').find(':radio').removeAttr('disabled');
											</script>
										</div>
									</div>
									<div class="quantity_contact">
										<div class="form-group product_quantity" >
											<label class="form-control-label">
												Số lượng : 
											</label>
											<button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty > 1 ) result.value--;return false;" class="reduced btn btn-ipnb" type="button">-</button>
											<input type="text" class="form-control text-xs-center qty" title="Số lượng" value="1" maxlength="3" id="qty" name="quantity" onkeyup="valid(this,'numbers')" onblur="valid(this,'numbers')">
											<button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase btn btn-ipnb" type="button">+</button>
										</div>


										<div class="form-inline">
											<label class="form-control-label">
												Màu:
											</label>
											<select name="color" class="form-control">
												<option value="{{$pros_detail->color}}">{{$pros_detail->color}}</option>
											</select>
										</div>

									</div>
									<div class="button_actions">
										@csrf
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
										<button type="submit" class="btn btn_versus" title="Mua hàng">
											<span style="font-size: 14px;">THÊM VÀO GIỎ HÀNG</span>
										</button>

									</div>
								</form>

								<div class="social-sharing">





									<div class="social-media" data-permalink="{{$pros->name}}">
										<label>Chia sẻ : </label>
										<div class="sharing-item">

											<a target="_blank" href="//www.facebook.com/sharer.php?u=https://versus.bizwebvietnam.net/nike-air-zoom-pegasus-34-880555-006" class="share-facebook txt-facebook hv-bg-facebook" title="Chia sẻ lên Facebook">
												<i class="fa fa-facebook"></i>
											</a>



											<a target="_blank" href="//twitter.com/share?text=nike-air-zoom-pegasus-34-880555-006&amp;url=https://versus.bizwebvietnam.net/nike-air-zoom-pegasus-34-880555-006" class="share-twitter txt-twitter hv-bg-twitter" title="Chia sẻ lên Twitter">
												<i class="fa fa-twitter"></i>
											</a>



											<a target="_blank" href="//plus.google.com/share?url=https://versus.bizwebvietnam.net/nike-air-zoom-pegasus-34-880555-006" class="share-google txt-google-plus hv-bg-google-plus" title="+1 lên Google Plus">
												<i class="fa fa-google-plus"></i>
											</a>

										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>


				<div class="product-overview-tab">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-hg-12">
								<div class="fw">
									<div class="product-tab e-tabs">
										<ul class="tabs tabs-title clearfix">	




											<li class="tab-link" data-tab="product_tab_1">
												<h5 class="module-tab-title trans_scale">
													<span>Mô tả</span>
												</h5>
											</li>




											<li class="tab-link" data-tab="product_tab_2">
												<h5 class="module-tab-title trans_scale">
													<span>Hướng dẫn</span>
												</h5>
											</li>




											<li class="tab-link" data-tab="product_tab_3">
												<h5 class="module-tab-title trans_scale">
													<span>Chính sách</span>
												</h5>
											</li>





											<li class="tab-link" data-tab="product_tab_5">
												<h5 class="module-tab-title trans_scale">
													<span>Đánh giá</span>
												</h5>
											</li>

										</ul>


										<div id="product_tab_1" class="tab-content">
											<div class="rte">
												<p><span style="color:#c0392b;"><strong>{{$pros->name}}</strong></span><br />
													<strong{{$pros_detail->content}}.&nbsp;</strong></p>
													<p style="text-align: center;"><img data-thumb="original" original-height="750" original-width="750" src="{{url('/')}}/resources/views/admin/product/uploads/{{$pro_image->image}}" /></p>
													<p>{{$pros->name}} là...</p>						
												</div>	
											</div>	











											<div id="product_tab_2" class="tab-content">

												Nội dung hướng dẫn tùy chỉnh

											</div>










											<div id="product_tab_3" class="tab-content">

												Nội dung chính sách tùy chỉnh

											</div>

											<div id="product_tab_4" class="tab-content">
												<div class="rte">
													<div id="bizweb-product-reviews" class="bizweb-product-reviews" data-id="9455325">

													</div>
												</div>
											</div>	

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="recent_products">
						<div class="container">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-hg-12">
									<div class="module-header">
										<h2 class="title-head index-title">
											<a href="">
												<span>Sản phẩm liên quan</span>
											</a>
										</h2>
									</div>
									<div class="module-content">
										<div class="owl-carousel owl-theme" data-lg-items="4" data-md-items="4" data-sm-items="3" data-xs-items="2" data-xxs-items="2" data-dot="true" data-margin="0">	
										@foreach($pros_lq as $pr_lq)
											<div class="item">
												<div class="product-box product-grid-item grid-item-outer">
													<div class="product-thumbnail">
														<a class="product-image" href="{{route('user.product-detail',['slug'=>$pr_lq->slug,'id'=>$pr_lq->id])}}" title="{{$pr_lq->name}}">
															<picture style="padding: 35px;">
																<source media="(min-width: 1200px)" srcset="{{url('/')}}/resources/views/admin/product/uploads/{{$pr_lq->image_ava}}" />
																<source media="(min-width: 543px) and (max-width: 1199px)" srcset="{{url('/')}}/resources/views/admin/product/uploads/{{$pr_lq->image_ava}}" />
																<source media="(max-width: 542px)" srcset="{{url('/')}}/resources/views/admin/product/uploads/{{$pr_lq->image_ava}}" />
																<img class="img-responsive" src="{{url('/')}}/resources/views/admin/product/uploads/{{$pr_lq->image_ava}}" alt="{{$pr_lq->name}}">
																
															</picture>
														</a>
														<a href="{{route('user.product-detail',['slug'=>$pr_lq->slug,'id'=>$pr_lq->id])}}" class="btn btn_detail">
															<span>Xem chi tiết</span>
														</a>
													</div>

													<div class="product-info">
														
														<div class="col-md-12">
															<div class="product-review rated_star review-grid">
																<div class="bizweb-product-reviews-badge" data-id="9455325"></div>
															</div>
															<h3 class="product-name">
																<a href="{{route('user.product-detail',['slug'=>$pr_lq->slug,'id'=>$pr_lq->id])}}" title="{{$pr_lq->name}}">
																	{{$pr_lq->name}}
																</a>
																
															</h3>
															
															<div class="price-box price-loop-style res-item">
																<span class="special-price">
																	<span class="price" >~{{number_format($pr_lq->listed_price_sale)}} VND</span>
																</span>
																<span class="old-price">
																	<span class="price">
																		
																		{{number_format($pr_lq->listed_price)}} VND
																		
																	</span>
																</span>
															</div>
														</div>
													</div>
												</div>
											</div>
											@endforeach
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</section>
				@stop()