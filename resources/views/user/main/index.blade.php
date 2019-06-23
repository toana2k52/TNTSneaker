@extends('user.main.home')
@section('title','TNTSneaker - Website sneaker hàng đầu về chất lượng')
<!-- Header -->
@section('main-content')
<!-- Content -->
<h1 class="hidden">NTSneaker - Website sneaker hàng đầu về chất lượng</h1>
<section class="zonex-section-slider">
	<div class="section_slider">
		<div class="home-slider owl-carousel owl-theme" data-lg-items='1' data-md-items='1' data-sm-items='1' data-xs-items="1" data-margin='0' data-auto-play="true">

			<div class="item image-item">
				<a href="#" title="TNT Sneaker - Giày thể thao chất lượng số 1" class="clearfix">
					<figure>
						<img class="img-responsive" src="{{url('/')}}/public/home_user/image/slider_1_image736b.png" alt="tieu-de-slide-1">
					</figure>
				</a>	
			</div>

			<div class="item image-item">
				<a href="#" title="TNT Sneaker - Giày thể thao chất lượng số 1" class="clearfix">
					<figure>
						<img class="img-responsive" src="{{url('/')}}/public/home_user/image/slider_2_image736b.png" alt="tieu-de-slide-2">
					</figure>
				</a>	
			</div>
			
			<div class="item image-item">
				<a href="#" title="TNT Sneaker - Giày thể thao chất lượng số 1" class="clearfix">
					<figure>
						<img class="img-responsive" src="{{url('/')}}/public/home_user/image/slider_3_image736b.png" alt="tieu-de-slide-3">
					</figure>
				</a>	
			</div>

		</div>
	</div>
</section>


<section class="zonex-section-1">	
	<div class="versus_feature_collections">
		<div class="container">
			<div class="row">
				<div class="module-content">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="owl-theme owl-carousel nav-enable nav-left-right" data-lg-items="2" data-md-items="2" data-sm-items="2" data-xs-items="2" data-xxs-items="2" data-margin="30" data-nav="true" data-auto-play="true">
							<div class="item image-item">
								<figure>
									<picture style="opacity: 0.8;">
										<source media="(min-width: 1200px)" srcset="{{url('/')}}/public/home_user/image/feature_1_image736b.jpg" />
										<source media="(min-width: 541px) and (max-width: 1199px)" srcset="{{url('/')}}/public/home_user/image/feature_1_image736b.jpg" />
										<source media="(min-width: 381px) and (max-width: 540px)" srcset="{{url('/')}}/public/home_user/image/feature_1_image736b.jpg" />
										<source media="(max-width: 380px)" srcset="{{url('/')}}/public/home_user/image/feature_1_image736b.jpg" />
										<img class="img-responsive" src="{{url('/')}}/public/home_user/image/feature_1_image736b.jpg" alt="nu">
									</picture>
									<a href="{{route('user.product-search_category',['slug' => 'sneaker-hot'])}}" title="Sneaker Hot">
										<span>
											Sneaker
										</span>
										<h2>
											HOT
										</h2>
									</a>
								</figure>
							</div>
							
							<div class="item image-item">
								<figure>
									<picture style="opacity: 0.7">
										<source media="(min-width: 1200px)" srcset="{{url('/')}}/public/home_user/image/feature_2_image736b.gif" />
										<source media="(min-width: 541px) and (max-width: 1199px)" srcset="{{url('/')}}/public/home_user/image/feature_2_image736b.gif" />
										<source media="(min-width: 381px) and (max-width: 540px)" srcset="{{url('/')}}/public/home_user/image/feature_2_image736b.gif" />
										<source media="(max-width: 380px)" srcset="{{url('/')}}/public/home_user/image/feature_2_image736b.gif" />
										<img class="img-responsive" src="{{url('/')}}/public/home_user/image/feature_2_image736b.gif" alt="nam">
									</picture>
									<a href="{{route('user.product-search_category',['slug' => 'phan-khuc-cao'])}}" title="Phân khúc cao">
										<span>
											Phân khúc
										</span>
										<h2>
											Cao
										</h2>
									</a>
								</figure>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="zonex-section-2">	
	<div class="versus_recommend_products">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="module-header">
						<h2 class="title-head index-title">
							<a href="{{route('user.product-search_category',['slug' => 'sneaker-hot'])}}" title="Sản phẩm nổi bật">
								<span>
									Sản phẩm nổi bật
								</span>
							</a>
						</h2>
					</div>
					<div class="module-content">
						<div class="owl-carousel owl-theme" data-lg-items="4" data-md-items="4" data-sm-items="3" data-xs-items="2" data-xxs-items="2" data-dot="true" data-margin="0">	
						@foreach($pros_hot as $pro_hot)

							<div class="item">
								<div class="product-box product-grid-item grid-item-outer">
									<div class="product-thumbnail">
										<div class="sale-flash">
											<span>
												NEW
											</span>
										</div>
										<a class="product-image" href="{{route('user.product-detail',['slug'=>$pro_hot->slug,'id'=>$pro_hot->id])}}" title="{{$pro_hot->name}}">
											<picture style="padding: 35px;">
												<source media="(min-width: 1200px)" srcset="{{url('/')}}/resources/views/admin/product/uploads/{{$pro_hot->image_ava}}" />
												<source media="(min-width: 543px) and (max-width: 1199px)" srcset="{{url('/')}}/resources/views/admin/product/uploads/{{$pro_hot->image_ava}}" />
												<source media="(max-width: 542px)" srcset="{{url('/')}}/resources/views/admin/product/uploads/{{$pro_hot->image_ava}}" />
												<img class="img-responsive" src="{{url('/')}}/resources/views/admin/product/uploads/{{$pro_hot->image_ava}}" alt="{{$pro_hot->name}}">
												
											</picture>
										</a>
										<a href="{{route('user.product-detail',['slug'=>$pro_hot->slug,'id'=>$pro_hot->id])}}" class="btn btn_detail">
											<span>Xem chi tiết</span>
										</a>
									</div>

									<div class="product-info">
										
										<div class="col-md-12">
											<div class="product-review rated_star review-grid">
												<div class="bizweb-product-reviews-badge" data-id="9455325"></div>
											</div>
											<h3 class="product-name">
												<a href="{{route('user.product-detail',['slug'=>$pro_hot->slug,'id'=>$pro_hot->id])}}" title="{{$pro_hot->name}}">
													{{$pro_hot->name}}
												</a>
												
											</h3>
											
											<div class="price-box price-loop-style res-item">
												<span class="special-price">
													<span class="price" >~{{number_format($pro_hot->listed_price_sale)}} VND</span>
												</span>
												<span class="old-price">
													<span class="price">
														
														{{number_format($pro_hot->listed_price)}}
														
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


<section class="zonex-section-5">	
	<div class="versus_reasons">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 reasons-left">
					<div class="module-header">
						<h2 class="title-head index-title">
							<span>
								TNT Sneaker 
							</span>
						</h2>
					</div>
					<div class="module-content">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="owl-theme owl-carousel" data-lg-items="2" data-md-items="1" data-sm-items="2" data-xs-items="2" data-xxs-items="1" data-auto-play="true" data-margin="30">
								<div class="item">
									<div class="reason_image">
										<img class="img-responsive" src="{{url('/')}}/public/home_user/image/reason_1_image736b.jpg" alt="Mẫu mã đa dạng">
									</div>
									<h4 class="reason_title">
										<span>
											Mẫu mã đa dạng
										</span>
									</h4>
									<div class="reason_desc">
										Đến với NTN Sneaker bạn sẽ được tự do lựa chọn sản phẩm yêu thích với mẫu mã, thương hiệu, size giày đầy đủ, phong phú với giá cả cực kỳ hợp lý cùng chất lượng đặt lên hàng đầu
									</div>
								</div>
								<div class="item">
									<div class="reason_image">
										<img class="img-responsive" src="{{url('/')}}/public/home_user/image/reason_2_image736b.jpg" alt="Bảo hành trọn đời">
									</div>
									<h4 class="reason_title">
										<span>
											Bảo hành lên đến 12 tháng
										</span>
									</h4>
									<div class="reason_desc">
										Đi cùng chất lượng sản phẩm NTN Sneaker còn đem lại cho bạn chế độ bảo hành vàng lên đến 12 tháng cho da, đế và keo sản phẩm để khách hàng có thể tự tin sử dụng
									</div>
								</div>
								<div class="item">
									<div class="reason_image">
										<img class="img-responsive" src="{{url('/')}}/public/home_user/image/reason_3_image736b.jpg" alt="Đổi trả dễ dàng">
									</div>
									<h4 class="reason_title">
										<span>
											Đổi trả dễ dàng
										</span>
									</h4>
									<div class="reason_desc">
										Duy nhất tại TNT Sneaker, chúng tôi đưa ra chính sách tốt nhất, sẵn sàng đổi trả sản phẩm trong vòng 1 tuần, theo hóa đơn mua hàng nếu gặp bất kỳ lỗi nào đến từ nhà sản xuất
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 reasons-right">
					<picture>
						<source media="(min-width: 1200px)" srcset="{{url('/')}}/public/home_user/image/reasons736b.png" />
						<source media="(min-width: 992px) and (max-width: 1199px)" srcset="{{url('/')}}/public/home_user/image/reasons736b.png" />
						<source media="(min-width: 510px) and (max-width: 991px)" srcset="{{url('/')}}/public/home_user/css/reasons736b.png" />
						<source media="(min-width: 320px) and (max-width: 509px)" srcset="{{url('/')}}/public/home_user/image/reasons736b.png" />
						<img class="img-responsive" src="{{url('/')}}/public/home_user/image/reasons736b.png" alt="vi-sao-ban-nen-chon-versus">
					</picture>
				</div>
			</div>
		</div>
	</div>
</section>



<section class="zonex-section-6">	
	<div class="versus_news">
		<div class="container">
			<div class="row">
				<div class="module-header">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<h2 class="title-head index-title">
							<a href="https://versus.bizwebvietnam.net/tin-tuc" title="Tin tức">
								<span>
									Tin tức
								</span>
							</a>
						</h2>
					</div>
				</div>
				<div class="module-content">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						
						<div class="owl-theme owl-carousel" data-lg-items="3" data-md-items="3" data-sm-items="2" data-xs-items="2" data-xxs-items="1" data-dot="true" data-margin="30" data-auto-play="true">
							
							<div class="item">
								<div class="article-thumbnail image-item large-article">
									<figure>
										<a href="https://versus.bizwebvietnam.net/10-sai-lam-de-mac-phai-khi-bat-dau-tap-yoga" title="10 sai lầm khi đi giày thể thao dễ dàng mắc phải">
											<picture>
												
												<source media="(max-width: 319px)" srcset="{{url('/')}}/public/home_user/image/yoga-00b9aa.png?v=1512921546107" />
												<img src="{{url('/')}}/public/home_user/image/yoga-00b9aa.png?v=1512921546107" alt="10 sai lầm khi đi giày thể thao dễ dàng mắc phải" class="img-responsive">
												
											</picture>
										</a>
										<div class="time-stamp">
											<div class="date">
												10
											</div>
											<div class="month">
												12/2018
											</div>
										</div>
									</figure>
								</div>
								<div class="article-info">
									<h3 class="article-title">
										<a href="https://versus.bizwebvietnam.net/10-sai-lam-de-mac-phai-khi-bat-dau-tap-yoga" title="10 sai lầm khi đi giày thể thao dễ dàng mắc phải">
											<span>10 sai lầm khi đi giày thể thao dễ dàng mắc phải</span>
										</a>
									</h3>
								</div>
							</div>
							
							<div class="item">
								<div class="article-thumbnail image-item large-article">
									<figure>
										<a href="https://versus.bizwebvietnam.net/mac-gi-bay-gio-phan-3-chon-ao-nguc-the-thao-phu-hop-voi-cac-chi-em" title="Vì sao nên chọn cho mình những sản phẩm giày tập chạy đến từ Nike Runing">
											<picture>
												
												<source media="(max-width: 319px)" srcset="{{url('/')}}/public/home_user/image/mac-gi-bay-gio-002c58.png?v=1512920994553" />
												<img src="{{url('/')}}/public/home_user/image/mac-gi-bay-gio-002c58.png?v=1512920994553" alt="Vì sao nên chọn cho mình những sản phẩm giày tập chạy đến từ Nike Runing" class="img-responsive">
												
											</picture>
										</a>
										<div class="time-stamp">
											<div class="date">
												12
											</div>
											<div class="month">
												12/2018
											</div>
										</div>
									</figure>
								</div>
								<div class="article-info">
									<h3 class="article-title">
										<a href="https://versus.bizwebvietnam.net/mac-gi-bay-gio-phan-3-chon-ao-nguc-the-thao-phu-hop-voi-cac-chi-em" title="Vì sao nên chọn cho mình những sản phẩm giày tập chạy đến từ Nike Runing">
											<span>Vì sao nên chọn cho mình những sản phẩm giày tập chạy đến từ Nike Runing</span>
										</a>
									</h3>
								</div>
							</div>
							
							<div class="item">
								<div class="article-thumbnail image-item large-article">
									<figure>
										<a href="https://versus.bizwebvietnam.net/6-tac-hai-khon-luong-neu-ban-khong-thay-do-sau-khi-tap-luyen" title="Bảo quản, vệ sinh giày đúng cách?">
											<picture>
												
												<source media="(max-width: 319px)" srcset="{{url('/')}}/public/home_user/image/6-tac-hai-00b957.png?v=1512921013603" />
												<img src="{{url('/')}}/public/home_user/image/6-tac-hai-00b957.png?v=1512921013603" alt="6-tac-hai-khon-luong-neu-ban-khong-thay-do-sau-khi-tap-luyen" class="img-responsive">
												
											</picture>
										</a>
										<div class="time-stamp">
											<div class="date">
												19
											</div>
											<div class="month">
												12/2018
											</div>
										</div>
									</figure>
								</div>
								<div class="article-info">
									<h3 class="article-title">
										<a href="https://versus.bizwebvietnam.net/6-tac-hai-khon-luong-neu-ban-khong-thay-do-sau-khi-tap-luyen" title="Bảo quản, vệ sinh giày đúng cách?">
											<span>Bảo quản, vệ sinh giày đúng cách?</span>
										</a>
									</h3>
								</div>
							</div>
							
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>



<section class="zonex-section-7">	
	<div class="versus_hotsale">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="module-header">
						<h2 class="title-head index-title">
							<a href="{{route('user.product-sale')}}" title="Hot Sale">
								<span>
									Hot Sale
								</span>
							</a>
						</h2>
					</div>
					<div class="module-content">
						
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-md-push-3 col-lg-6 col-lg-push-3">
								<div class="item product-box large_hotsale image-item">
									<div class="product-thumbnail">
										
										
										<div class="sale-flash">
											
											<span>
												Sale
											</span>
											
										</div>
												<figure style="padding: 30px;">
													<a href="{{route('user.product-detail',['slug'=>$pros_1->slug,'id'=>$pros_1->id])}}" title="{{$pros_1->name}}">
														<picture>
															
															<source media="(min-width: 1200px)" srcset="{{url('/')}}/resources/views/admin/product/uploads/{{$pros_1->image_ava}}" />
															<source media="(max-width: 1199px)" srcset="{{url('/')}}/resources/views/admin/product/uploads/{{$pros_1->image_ava}}" />
															<img class="img-responsive" src="{{url('/')}}/resources/views/admin/product/uploads/{{$pros_1->image_ava}}" alt="{{$pros_1->name}}">
															
														</picture>
													</a>
												</figure>
												<a href="{{route('user.product-detail',['slug'=>$pros_1->slug,'id'=>$pros_1->id])}}" class="btn btn_detail">
													<span>Xem chi tiết</span>
												</a>
										
									</div>
									<div class="product-info">
										
										<div class="col-md-12">
											<div class="product-review rated_star review-grid">
												<div class="bizweb-product-reviews-badge" data-id="9455325"></div>
											</div>
											<h3 class="product-name">
												<a href="{{route('user.product-detail',['slug'=>$pros_1->slug,'id'=>$pros_1->id])}}" title="{{$pros_1->name}}">
													{{$pros_1->name}}
												</a>
												
											</h3>
											
											<div class="price-box price-loop-style res-item">
												
												
												
												<span class="special-price">
													<span class="price">~{{number_format($pros_1->listed_price_sale)}} VND</span>
												</span>
												<span class="old-price">
													<span class="price">
														
														{{number_format($pros_1->listed_price)}}
														
													</span>
												</span>
											</div>
										</div>
									</div>
								</div>
								
							</div>

							<div class="col-xs-12 col-sm-6 col-md-3 col-md-pull-6 col-lg-3 col-lg-pull-6 left-hotsale">
								<div class="item product-box small_hotsale image-item">
									<div class="product-thumbnail">
										
										
										<div class="sale-flash">
											
											<span>
												Sale
											</span>
											
										</div>
										
										
										<figure style="padding: 30px;">
											<a href="{{route('user.product-detail',['slug'=>$pros_2->slug,'id'=>$pros_2->id])}}" title="{{$pros_2->name}}">
												<picture >
													
													<source media="(min-width: 1200px)" srcset="{{url('/')}}/resources/views/admin/product/uploads/{{$pros_2->image_ava}}" />
													<source media="(min-width: 992px) and (max-width: 1199px)" srcset="{{url('/')}}/resources/views/admin/product/uploads/{{$pros_2->image_ava}}" />
													<source media="(max-width: 991px)" srcset="{{url('/')}}/resources/views/admin/product/uploads/{{$pros_2->image_ava}}" />
													<img class="img-responsive" src="{{url('/')}}/resources/views/admin/product/uploads/{{$pros_2->image_ava}}" alt="{{$pros_2->name}}">
													
												</picture>
											</a>
										</figure>
										<a href="{{route('user.product-detail',['slug'=>$pros_2->slug,'id'=>$pros_2->id])}}" class="btn btn_detail">
											<span>Xem chi tiết</span>
										</a>
									</div>
									<div class="product-info">
										
										<div class="col-md-12">
											<div class="product-review rated_star review-grid">
												<div class="bizweb-product-reviews-badge" data-id="9455325"></div>
											</div>
											<h3 class="product-name">
												<a href="{{route('user.product-detail',['slug'=>$pros_2->slug,'id'=>$pros_2->id])}}" title="{{$pros_2->name}}">
													{{$pros_2->name}}
												</a>
												
											</h3>
											
											<div class="price-box price-loop-style res-item">
												
												
												
												<span class="special-price">
													<span class="price">~{{number_format($pros_2->listed_price_sale)}} VND</span>
												</span>
												<span class="old-price">
													<span class="price">
														
														{{number_format($pros_2->listed_price)}}
														
													</span>
												</span>
											</div>
										</div>
									</div>
								</div>

								<div class="item product-box small_hotsale image-item">
									<div class="product-thumbnail">
										
										
										<div class="sale-flash">
											
											<span>
												Sale
											</span>
											
										</div>
										
										
										<figure style="padding: 30px;">
											<a href="{{route('user.product-detail',['slug'=>$pros_3->slug,'id'=>$pros_3->id])}}" title="{{$pros_3->image_name}}">
												<picture >
													
													<source media="(min-width: 1200px)" srcset="{{url('/')}}/resources/views/admin/product/uploads/{{$pros_3->image_ava}}" />
													<source media="(min-width: 992px) and (max-width: 1199px)" srcset="{{url('/')}}/resources/views/admin/product/uploads/{{$pros_3->image_ava}}" />
													<source media="(max-width: 991px)" srcset="{{url('/')}}/resources/views/admin/product/uploads/{{$pros_3->image_ava}}" />
													<img class="img-responsive" src="{{url('/')}}/resources/views/admin/product/uploads/{{$pros_3->image_ava}}" alt="{{$pros_3->image_name}}">
													
												</picture>
											</a>
										</figure>
										<a href="{{route('user.product-detail',['slug'=>$pros_3->slug,'id'=>$pros_3->id])}}" class="btn btn_detail">
											<span>Xem chi tiết</span>
										</a>
									</div>
									<div class="product-info">
										
										<div class="col-md-12">
											<div class="product-review rated_star review-grid">
												<div class="bizweb-product-reviews-badge" data-id="9455325"></div>
											</div>
											<h3 class="product-name">
												<a href="{{route('user.product-detail',['slug'=>$pros_3->slug,'id'=>$pros_3->id])}}" title="{{$pros_3->name}}">
													{{$pros_3->name}}
												</a>
												
											</h3>
											
											<div class="price-box price-loop-style res-item">
												
												
												
												<span class="special-price">
													<span class="price">~{{number_format($pros_3->listed_price_sale)}} VND</span>
												</span>
												<span class="old-price">
													<span class="price">
														
														{{number_format($pros_3->listed_price)}}
														
													</span>
												</span>
											</div>
										</div>
									</div>
								</div>
								
							</div>

							<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 right-hotsale">

								<div class="item product-box small_hotsale image-item">
									<div class="product-thumbnail">
										
										
										<div class="sale-flash">
											
											<span>
												Sale
											</span>
											
										</div>
										
										
										<figure style="padding: 30px;">
											<a href="{{route('user.product-detail',['slug'=>$pros_4->slug,'id'=>$pros_4->id])}}" title="Nike Flex Trainer 7 Reflect - 921705 - 400">
												<picture>
													
													<source media="(min-width: 1200px)" srcset="{{url('/')}}/resources/views/admin/product/uploads/{{$pros_4->image_ava}}" />
													<source media="(min-width: 992px) and (max-width: 1199px)" srcset="{{url('/')}}/resources/views/admin/product/uploads/{{$pros_4->image_ava}}" />
													<source media="(max-width: 991px)" srcset="{{url('/')}}/resources/views/admin/product/uploads/{{$pros_4->image_ava}}" />
													<img class="img-responsive" src="{{url('/')}}/resources/views/admin/product/uploads/{{$pros_4->image_ava}}" alt="nike-flex-trainer-7-reflect-921705-400">
													
												</picture>
											</a>
										</figure>
										<a href="{{route('user.product-detail',['slug'=>$pros_4->slug,'id'=>$pros_4->id])}}" class="btn btn_detail">
											<span>Xem chi tiết</span>
										</a>
									</div>
									<div class="product-info">
										
										<div class="col-md-12">
											<div class="product-review rated_star review-grid">
												<div class="bizweb-product-reviews-badge" data-id="9455325"></div>
											</div>
											<h3 class="product-name">
												<a href="{{route('user.product-detail',['slug'=>$pros_4->slug,'id'=>$pros_4->id])}}" title="{{$pros_4->name}}">
													{{$pros_4->name}}
												</a>
												
											</h3>
											
											<div class="price-box price-loop-style res-item">
												
												
												
												<span class="special-price">
													<span class="price">~{{number_format($pros_4->listed_price_sale)}} VND</span>
												</span>
												<span class="old-price">
													<span class="price">
														
														{{number_format($pros_4->listed_price)}}
														
													</span>
												</span>
											</div>
										</div>
									</div>
								</div>

								<div class="item product-box small_hotsale image-item">
									<div class="product-thumbnail">
										
										
										<div class="sale-flash">
											
											<span>
												Sale
											</span>
											
										</div>
										
										
										<figure style="padding: 30px;">
											<a href="{{route('user.product-detail',['slug'=>$pros_5->slug,'id'=>$pros_5->id])}}" title="{{$pros_5->image_ava}}">
												<picture>
													
													<source media="(min-width: 1200px)" srcset="{{url('/')}}/resources/views/admin/product/uploads/{{$pros_5->image_ava}}" />
													<source media="(min-width: 992px) and (max-width: 1199px)" srcset="{{url('/')}}/resources/views/admin/product/uploads/{{$pros_5->image_ava}}" />
													<source media="(max-width: 991px)" srcset="{{url('/')}}/resources/views/admin/product/uploads/{{$pros_5->image_ava}}" />
													<img class="img-responsive" src="{{url('/')}}/resources/views/admin/product/uploads/{{$pros_5->image_ava}}" alt="{{$pros_5->image_ava}}">
													
												</picture>
											</a>
										</figure>
										<a href="{{route('user.product-detail',['slug'=>$pros_5->slug,'id'=>$pros_5->id])}}" class="btn btn_detail">
											<span>Xem chi tiết</span>
										</a>
									</div>
									<div class="product-info">
										
										<div class="col-md-12">
											<div class="product-review rated_star review-grid">
												<div class="bizweb-product-reviews-badge" data-id="9455325"></div>
											</div>
											<h3 class="product-name">
												<a href="{{route('user.product-detail',['slug'=>$pros_5->slug,'id'=>$pros_5->id])}}" title="{{$pros_5->name}}">
													{{$pros_5->name}}
												</a>
												
											</h3>
											
											<div class="price-box price-loop-style res-item">
												
												
												
												<span class="special-price">
													<span class="price">~{{number_format($pros_5->listed_price_sale)}} VND</span>
												</span>
												<span class="old-price">
													<span class="price">
														
														{{number_format($pros_5->listed_price)}}
														
													</span>
												</span>
											</div>
										</div>
									</div>
								</div>
								
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>



<section class="zonex-section-8">	
	<div class="versus_feedback">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="module-header">
						<h2 class="title-head index-title">
							<span>
								Khách hàng đánh giá
							</span>
						</h2>
					</div>
					<div class="module-content">
						<div class="owl-theme owl-carousel" data-lg-items="2" data-md-items="2" data-sm-items="1" data-xs-items="1" data-xxs-items="1" data-margin="30" data-auto-play="true">

							
							<div class="item">
								<div class="feedback_content">
									Tôi rất băn khoăn mỗi khi muốn tìm cho mình 1 địa điểm tin cậy để có thể tìm thấy những đôi giày theo sở thích của mình, bắt kịp xu hướng thời trang, được chăm sóc và bảo hành tốt. Cho đến khi tôi tới Versus, tôi đã rất yên tâm và thỏa sức mua hàng tại đây.
								</div>
								<div class="feedback_info">
									<div class="feedback_image">
										<img class="img-responsive" src="{{url('/')}}/public/home_user/image/feedback_1_image736b.png" alt="Khách hàng đánh giá ">
									</div>
									<div class="feedback_custom">
										Dương Huy Toàn
									</div>
									<div class="feedback_desc">
										huytoana***@gmail.com
									</div>
								</div>
							</div>

							
							<div class="item">
								<div class="feedback_content">
									Chất lượng phục vụ, sản phẩm tại TNT rất tốt, sử dụng dễ chịu, giá thành hợp lý. Tuy nhiên thời gian giao hàng cần cải thiện hơn nữa để dịch vụ trở nên hoàn hảo.
								</div>
								<div class="feedback_info">
									<div class="feedback_image">
										<img class="img-responsive" src="{{url('/')}}/public/home_user/image/feedback_2_image736b.png" alt="Khách hàng đánh giá ">
									</div>
									<div class="feedback_custom">
										Nguyễn Công Tuyến
									</div>
									<div class="feedback_desc">
										congtuye***@gmail.com
									</div>
								</div>
							</div>

							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="zonex-section-9">	
	<div class="versus_partners">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="module-header">
						<h2 class="title-head index-title">
							<span>
								Đối tác của chúng tôi
							</span>
						</h2>
					</div>
					<div class="module-content">
						<div class="owl-theme owl-carousel" data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="1" data-xxs-items="1" data-auto-play="true" data-margin="30">

							<div class="item">
								<div class="partner_image">
									<img class="img-responsive" src="{{url('/')}}/public/home_user/image/partner_1_image736b.png" alt="Nike">
								</div>
								
								<h3 class="partner_title">
									<span>
										Nike
									</span>
								</h3>
								<div class="partner_desc">
									Là nhà cung cấp giày, quần áo thể thao và dụng cụ thể thao thương mại công cộng lớn, hàng đầu thế giới, có trụ sở tại Hoa Kỳ.
								</div>
								
							</div>

							<div class="item">
								<div class="partner_image">
									<img class="img-responsive" src="{{url('/')}}/public/home_user/image/partner_2_image736b.png" alt="New Balance">
								</div>
								
								<h3 class="partner_title">
									<span>
										New Balance
									</span>
								</h3>
								<div class="partner_desc">
									Được thành lập vào năm 1906 với tên 'New Balance Arch Support Company', là một trong những nhà sản xuất giày dép thể thao lớn.
								</div>
								
							</div>

							<div class="item">
								<div class="partner_image">
									<img class="img-responsive" src="{{url('/')}}/public/home_user/image/partner_3_image736b.png" alt="Adidas">
								</div>
								
								<h3 class="partner_title">
									<span>
										Adidas
									</span>
								</h3>
								<div class="partner_desc">
									Là một nhà sản xuất giày thể thao của Đức, một thành viên của Adidas Group, là nhà sản xuất dụng cụ thể thao và giày thể thao lớn thứ hai trên thế giới.
								</div>
								
							</div>

							<div class="item">
								<div class="partner_image">
									<img class="img-responsive" src="{{url('/')}}/public/home_user/image/partner_4_image736b.png" alt="Puma">
								</div>
								
								<h3 class="partner_title">
									<span>
										Puma
									</span>
								</h3>
								<div class="partner_desc">
									Là một công ty đa quốc gia lớn của Đức chuyên sản xuất giày và các dụng cụ thể thao khác, sản xuất giày đá bóng và bảo trợ cho nhiều cầu thủ
								</div>
								
							</div>
							
							<div class="item">
								<div class="partner_image">
									<img class="img-responsive" src="{{url('/')}}/public/home_user/image/partner_1_image736b.png" alt="Nike">
								</div>
								
								<h3 class="partner_title">
									<span>
										Rick Owen
									</span>
								</h3>
								<div class="partner_desc">
									Là nhà cung cấp giày, quần áo thể thao và dụng cụ thể thao thương mại công cộng lớn, hàng đầu thế giới, có trụ sở tại Hoa Kỳ.
								</div>
								
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="zonex-section-10">	
	<div class="versus_contact">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-md-offset-6 col-lg-offset-6">
					<div class="item">
						<div class="contact_form">
							<form accept-charset='UTF-8' action='https://versus.bizwebvietnam.net/contact' id='contact' method='post'>
								<input name='FormType' type='hidden' value='contact' />
								<input name='utf8' type='hidden' value='true' />
								<div class="wrapper">
									<div class="module-header">
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<h2 class="title-head index-title">
													<span>
														Liên hệ với chúng tôi
													</span>
												</h2>
												<div class="index_contact_desc">
													Nếu bạn chưa hài lòng về bất cứ điều gì về sản phẩm hay dịch vụ của TNT Sneaker chúng tôi xin hay góp ý, điều đó giúp chúng tôi phát triển, đưa những dịch vụ trở nên hoàn hảo hướng tới khách hàng.
												</div>
											</div>
										</div>
									</div>
									<div class="module-content">
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<div class="form-group">
													<input type="text" name="contact[Name]" class="input-control form-control" autocomplete="off" value="" placeholder="Họ và Tên" required>
												</div>
											</div>
											<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
												<div class="form-group">
													
													<input type="text" name="contact[Email]" class="input-control form-control" autocomplete="off" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,63}$" value="" placeholder="Email" required>
												</div>
											</div>
											<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
												<div class="form-group">
													<input type="text" name="contact[Phone]" class="input-control form-control" autocomplete="off" minlength="8" maxlength="11" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" onChange="validateInput(this);" value="" placeholder="Số điện thoại" required>
												</div>
											</div>
											<div class="col-xs-12 12 col-md-12 col-lg-12">
												<div class="form-group">
													<textarea class="form-control input-control" id="comment" name="contact[Body]" rows="2" maxlength="500" minlength="5" placeholder="Nội dung" required></textarea>
												</div>
											</div>
											<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<div class="form-group btn_action">
													<button class="btn btn_versus">Gửi thông tin</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@stop()