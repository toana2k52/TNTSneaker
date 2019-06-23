@extends('user.main.')
@section('title','TNTSneaker - Website sneaker hàng đầu về chất lượng')
<!-- Header -->
@section('main-header')
<!-- Content -->
<header class="header">
	<div class="container">
		<div class="row">
			<div class="menu-bar hidden-md hidden-lg">
				<a href="#nav-mobile">
					<i class="fa fa-align-justify"></i>
				</a>
			</div>
			<div class="col-xs-8 col-xs-offset-2 col-sm-2 col-sm-offset-1 col-md-2 col-md-offset-0 col-lg-2">
				<div class="logo">
					<a title="Versus" href="index.html">
						
						<img class="img-responsive" src="{{url('/')}}/public/home_user/image/logo736b.png" alt="Logo Versus">					
						
					</a> 
				</div>
			</div>
			<div class="col-xs-12 col-sm-9 col-md-10 col-lg-10">
				<div class="topbar">
					<div class="control_panel">
						<ul class="list-menu list-unstyled">
							
							<li class="cp-item hidden-xs">
								<a href="callto:18006750">
									<i class="fa fa-phone"></i> Hotline: 1800 6750
								</a>
							</li>
							
							
							<li class="cp-item hidden-xs">
								<a href="dangnhap.php" title="Đăng nhập" class="btn-transition">
									<span>Đăng nhập</span>
								</a>
							</li>
							<li class="cp-item hidden-xs">
								<a href="dangky.php" title="Đăng ký" class="btn-transition">
									<span>Đăng ký</span>
								</a>
							</li>
							
							<li class="header-cart cp-item">
								<div class="top-cart-contain f-right">
									<div class="mini-cart text-xs-center">
										<div class="heading-cart">
											<a href="giohang.php">
												<i class="fa fa-opencart" aria-hidden="true"></i>
												<span class="hidden-xs">Giỏ hàng</span><span class="cartCount count_item_pr" id="cart-total">0</span>
											</a>
										</div>	
										<div class="top-cart-content hidden-sm hidden-xs">
											<ul id="cart-sidebar" class="mini-products-list count_li">
												<li class="list-item">
													<ul></ul>
												</li>
												<li class="action">
													<ul>
														<li class="li-fix-1">
															<div class="top-subtotal">
																Tổng tiền thanh toán: 
																<span class="price"></span>
															</div>
														</li>
														<li class="li-fix-2" style="">
															<div class="actions">
																<a href="giohang.php" class="btn btn-primary">
																	<span>Giỏ hàng</span>
																</a>
																<a href="dathang.php" class="btn btn-checkout btn-gray">
																	<span>Thanh toán</span>
																</a>
															</div>
														</li>
													</ul>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="mainbar">
					<nav class="menu-header hidden-sm hidden-xs">
						<ul id="nav" class="nav">
							
							
							<li class="nav-item active">
								<a class="nav-link nav-link-root" href="index.html" title="Trang chủ">
									Trang chủ
								</a>
							</li>
							
							
							
							<li class="nav-item">
								<a class="nav-link nav-link-root" href="gioithieu.php" title="Giới thiệu">
									Giới thiệu
								</a>
							</li>
							
							
							
							<li class="nav-item">
								<a href="product_all.php" class="nav-link" title="Sản phẩm & Dịch vụ">
									Sản phẩm & Dịch vụ <i class="fa fa-caret-down" data-toggle="dropdown"></i>
								</a>
								<ul class="dropdown-menu sub-dropdown">
									
									
									<li class="nav-item-lv2">
										<a class="nav-link scaleXlr nav-link-root" href="https://versus.bizwebvietnam.net/frontpage" title="Sản phẩm mới">
											<i class="fa fa-angle-right"></i><span>Sản phẩm mới</span>
										</a>
									</li>
									
									
									
									<li class="nav-item-lv2">
										<a class="nav-link scaleXlr nav-link-root" href="https://versus.bizwebvietnam.net/san-pham-khuyen-mai" title="Sản phẩm khuyến mãi">
											<i class="fa fa-angle-right"></i><span>Sản phẩm khuyến mãi</span>
										</a>
									</li>
									
									
									
									<li class="nav-item-lv2">
										<a class="nav-link scaleXlr nav-link-root" href="https://versus.bizwebvietnam.net/san-pham-noi-bat" title="Sản phẩm nổi bật">
											<i class="fa fa-angle-right"></i><span>Sản phẩm nổi bật</span>
										</a>
									</li>
									
									
									
									<li class="dropdown-submenu nav-item-lv2">
										<a class="nav-link scaleXlr nav-link-root" href="https://versus.bizwebvietnam.net/danh-cho-nam" title="Dành cho Nam">
											<i class="fa fa-angle-right"></i><span>Dành cho Nam</span>
										</a>
										<i class="fa fa-caret-right"></i>
										<ul class="dropdown-menu">
											
											<li class="nav-item-lv3">
												<a class="nav-link scaleXlr" href="https://versus.bizwebvietnam.net/giay-nam" title="Giày Nam">
													<span>Giày Nam</span>
												</a>
											</li>						
											
											<li class="nav-item-lv3">
												<a class="nav-link scaleXlr" href="https://versus.bizwebvietnam.net/quan-ao-nam" title="Quần, áo Nam">
													<span>Quần, áo Nam</span>
												</a>
											</li>						
											
											<li class="nav-item-lv3">
												<a class="nav-link scaleXlr" href="https://versus.bizwebvietnam.net/phu-kien-nam" title="Phụ kiện Nam">
													<span>Phụ kiện Nam</span>
												</a>
											</li>						
											
										</ul>                      
									</li>
									
									
									
									<li class="dropdown-submenu nav-item-lv2">
										<a class="nav-link scaleXlr nav-link-root" href="https://versus.bizwebvietnam.net/danh-cho-nu" title="Dành cho Nữ">
											<i class="fa fa-angle-right"></i><span>Dành cho Nữ</span>
										</a>
										<i class="fa fa-caret-right"></i>
										<ul class="dropdown-menu">
											
											<li class="nav-item-lv3">
												<a class="nav-link scaleXlr" href="https://versus.bizwebvietnam.net/giay-nu" title="Giày nữ">
													<span>Giày nữ</span>
												</a>
											</li>						
											
											<li class="nav-item-lv3">
												<a class="nav-link scaleXlr" href="https://versus.bizwebvietnam.net/quan-ao-nu" title="Quần, áo Nữ">
													<span>Quần, áo Nữ</span>
												</a>
											</li>						
											
											<li class="nav-item-lv3">
												<a class="nav-link scaleXlr" href="https://versus.bizwebvietnam.net/phu-kien-nu" title="Phụ kiện Nữ">
													<span>Phụ kiện Nữ</span>
												</a>
											</li>						
											
										</ul>                      
									</li>
									
									
									
									<li class="nav-item-lv2">
										<a class="nav-link scaleXlr nav-link-root" href="https://versus.bizwebvietnam.net/danh-cho-tre-em" title="Dành cho trẻ em">
											<i class="fa fa-angle-right"></i><span>Dành cho trẻ em</span>
										</a>
									</li>
									
									
									
									<li class="dropdown-submenu nav-item-lv2">
										<a class="nav-link scaleXlr nav-link-root" href="https://versus.bizwebvietnam.net/phu-kien-the-thao" title="Phụ kiện thể thao">
											<i class="fa fa-angle-right"></i><span>Phụ kiện thể thao</span>
										</a>
										<i class="fa fa-caret-right"></i>
										<ul class="dropdown-menu">
											
											<li class="nav-item-lv3">
												<a class="nav-link scaleXlr" href="https://versus.bizwebvietnam.net/phu-kien-nu" title="Phụ kiện Nữ">
													<span>Phụ kiện Nữ</span>
												</a>
											</li>						
											
											<li class="nav-item-lv3">
												<a class="nav-link scaleXlr" href="https://versus.bizwebvietnam.net/phu-kien-nam" title="Phụ kiện Nam">
													<span>Phụ kiện Nam</span>
												</a>
											</li>						
											
											<li class="nav-item-lv3">
												<a class="nav-link scaleXlr" href="https://versus.bizwebvietnam.net/dung-cu-ho-tro" title="Dụng cụ hỗ trợ thể thao">
													<span>Dụng cụ hỗ trợ thể thao</span>
												</a>
											</li>						
											
										</ul>                      
									</li>
									
									
									
									<li class="nav-item-lv2">
										<a class="nav-link scaleXlr nav-link-root" href="https://versus.bizwebvietnam.net/tui-the-thao" title="Túi thể thao">
											<i class="fa fa-angle-right"></i><span>Túi thể thao</span>
										</a>
									</li>
									
									
									
									<li class="dropdown-submenu nav-item-lv2">
										<a class="nav-link scaleXlr nav-link-root" href="https://versus.bizwebvietnam.net/thuong-hieu-noi-tieng" title="Thương hiệu">
											<i class="fa fa-angle-right"></i><span>Thương hiệu</span>
										</a>
										<i class="fa fa-caret-right"></i>
										<ul class="dropdown-menu">
											
											<li class="nav-item-lv3">
												<a class="nav-link scaleXlr" href="https://versus.bizwebvietnam.net/nike" title="Nike">
													<span>Nike</span>
												</a>
											</li>						
											
											<li class="nav-item-lv3">
												<a class="nav-link scaleXlr" href="https://versus.bizwebvietnam.net/adidas" title="Adidas">
													<span>Adidas</span>
												</a>
											</li>						
											
											<li class="nav-item-lv3">
												<a class="nav-link scaleXlr" href="https://versus.bizwebvietnam.net/new-balance" title="New Balance">
													<span>New Balance</span>
												</a>
											</li>						
											
											<li class="nav-item-lv3">
												<a class="nav-link scaleXlr" href="https://versus.bizwebvietnam.net/puma" title="Puma">
													<span>Puma</span>
												</a>
											</li>						
											
											<li class="nav-item-lv3">
												<a class="nav-link scaleXlr" href="https://versus.bizwebvietnam.net/thuong-hieu-khac" title="Thương hiệu khác">
													<span>Thương hiệu khác</span>
												</a>
											</li>						
											
										</ul>                      
									</li>
									
									
								</ul>
							</li>
							
							
							
							<li class="nav-item">
								<a href="tintuc.php" class="nav-link" title="Trang tin">
									Trang tin <i class="fa fa-caret-down" data-toggle="dropdown"></i>
								</a>
								<ul class="dropdown-menu sub-dropdown">
									
									
									<li class="dropdown-submenu nav-item-lv2">
										<a class="nav-link scaleXlr nav-link-root" href="https://versus.bizwebvietnam.net/tin-tuc" title="Tin tức">
											<i class="fa fa-angle-right"></i><span>Tin tức</span>
										</a>
										<i class="fa fa-caret-right"></i>
										<ul class="dropdown-menu">
											
											<li class="nav-item-lv3">
												<a class="nav-link scaleXlr" href="https://versus.bizwebvietnam.net/tin-khuyen-mai" title="Tin khuyến mãi">
													<span>Tin khuyến mãi</span>
												</a>
											</li>						
											
											<li class="nav-item-lv3">
												<a class="nav-link scaleXlr" href="https://versus.bizwebvietnam.net/tin-xa-hoi" title="Tin xã hội">
													<span>Tin xã hội</span>
												</a>
											</li>						
											
										</ul>                      
									</li>
									
									
									
									<li class="nav-item-lv2">
										<a class="nav-link scaleXlr nav-link-root" href="https://versus.bizwebvietnam.net/tin-thoi-trang" title="Tin thời trang">
											<i class="fa fa-angle-right"></i><span>Tin thời trang</span>
										</a>
									</li>
									
									
									
									<li class="nav-item-lv2">
										<a class="nav-link scaleXlr nav-link-root" href="https://versus.bizwebvietnam.net/tin-cong-nghe" title="Tin công nghệ">
											<i class="fa fa-angle-right"></i><span>Tin công nghệ</span>
										</a>
									</li>
									
									
									
									<li class="nav-item-lv2">
										<a class="nav-link scaleXlr nav-link-root" href="https://versus.bizwebvietnam.net/tin-the-thao" title="Tin thể thao">
											<i class="fa fa-angle-right"></i><span>Tin thể thao</span>
										</a>
									</li>
									
									
									
									<li class="nav-item-lv2">
										<a class="nav-link scaleXlr nav-link-root" href="https://versus.bizwebvietnam.net/tin-xa-hoi" title="Tin xã hội">
											<i class="fa fa-angle-right"></i><span>Tin xã hội</span>
										</a>
									</li>
									
									
								</ul>
							</li>
							
							
							
							<li class="nav-item">
								<a class="nav-link nav-link-root" href="lienhe.php" title="Liên hệ">
									Liên hệ
								</a>
							</li>
							
							
						</ul>
					</nav>

					<form action="timkiem.php" method="get">
						<div class="input-group">
							<input type="text" class="form-control" maxlength="70" name="query" id="search" placeholder="Nhập từ khóa cần tìm ..." required>
							<button class="btn" type="submit">
								<i class="fa fa-search"></i>
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</header>
@stop()