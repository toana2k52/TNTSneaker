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
						<strong ><span itemprop="title">Tất cả sản phẩm</span></strong>
					</li>


					
				</ul>
			</div>
		</div>
	</div>
</section>


<!-- Content -->
<section class="collection-template">
	<div class="container">
		<div class="row">
			<section class="main_container col-xs-12 col-sm-12  col-md-9 col-lg-9 col-hg-10 col-md-push-3 col-lg-push-3">
				<div class="main-content collection">
					<div class="collection_header">
						<h1 class="title-head layout-title">
							<span>Tất cả sản phẩm @if($check == 1) - Tìm kiếm theo tên < {{$search_pro}} > @endif </span>
						</h1>
					</div>
					<div class="category-products products">
						<div class="module-header">
							<div class="sortPagiBar">
								<div id="sort-by">
									<!-- <form action="" method="POST" class="form-inline" role="form">
										
										<div class="col-md-10" style="padding: 0;">
											<div class="form-group">
												<select style="padding-left: 1px;">
													<option class="valued" value="default">Mặc định</option>
													<option value="price-asc">Giá tăng dần</option>
													<option value="price-desc">Giá giảm dần</option>
													<option value="alpha-asc">Từ A-Z</option>
													<option value="alpha-desc">Từ Z-A</option>
													<option value="created-asc">Cũ đến mới</option>
													<option value="created-desc">Mới đến cũ</option>
												</select>
											</div>
										</div>
										<div class="col-md-2" style="padding: 0;">
											<button type="submit" class="btn btn-primary" style="padding: 5px;margin-left: 5px;margin-top: 1px;"><i class="fa fa-search" aria-hidden="true"></i>
											</button>
										</div>
									</form> -->
								</div>
							</div>
						</div>
						<div class="module-content">
							
							<section class="products-view products-view-grid">
								<div class="row">
									@if($pro_all == null)
									<div class="text-center">
										<div class="col-md-7 text-right">Không có sản phẩm bạn tìm kiếm!!!</div>
										<div class="col-md-5 text-left"><a href="{{route('user.product-all')}}">Quay lại</a></div>
									</div> 
									@endif
									@foreach($pro_all as $pr_all)
									<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 item" >
										<div class="product-box product-grid-item">
											<div class="product-thumbnail">
												@if($pr_all->listed_price == $pr_all->listed_price_sale)
												@else
												<div class="sale-flash">
													<span>
														Sale
													</span>

												</div>
												@endif
												<a class="product-image" href="{{route('user.product-detail',['slug'=>$pr_all->slug,'id'=>$pr_all->id])}}" title="{{$pr_all->name}}">
													<picture style="padding: 30px">

														<source media="(min-width: 1200px)" srcset="{{url('/')}}/resources/views/admin/product/uploads/{{$pr_all->image_ava}}" />
															<source media="(min-width: 543px) and (max-width: 1199px)" srcset="{{url('/')}}/resources/views/admin/product/uploads/{{$pr_all->image_ava}}" />
																<source media="(min-width: 320px) and (max-width: 542px)" srcset="{{url('/')}}/resources/views/admin/product/uploads/{{$pr_all->image_ava}}" />
																	<img class="img-responsive" src="{{url('/')}}/resources/views/admin/product/uploads/{{$pr_all->image_ava}}" alt="{{$pr_all->name}}">

																</picture>
															</a>
															<a href="{{route('user.product-detail',['slug'=>$pr_all->slug,'id'=>$pr_all->id])}}" class="btn btn_detail">
																<span>Xem chi tiết</span>
															</a>
														</div>

														<div class="product-info">

															<div class="product-review rated_star review-grid">
																<div class="bizweb-product-reviews-badge" data-id="9455325"></div>
															</div>


															<h3 class="product-name">
																<a href="{{route('user.product-detail',['slug'=>$pr_all->slug,'id'=>$pr_all->id])}}" title="{{$pr_all->name}}">
																	{{$pr_all->name}}
																</a>
															</h3>
															<div class="price-box price-loop-style res-item">

																<span class="special-price">
																	<span class="price">~{{$pr_all->listed_price_sale}}</span>
																</span>
																@if($pr_all->listed_price == $pr_all->listed_price_sale)
																@else
																<span class="old-price">
																	<span class="price">

																		{{$pr_all->listed_price}}

																	</span>
																</span>
																@endif
															</div>
														</div>
													</div>
												</div>
												@endforeach		
											</div>
											<div class="clearfix text-right">
												{{$pro_all->appends(request()->only('search_pro'))->links()}}
											</div>
										</section>
										
									</div>
									
								</div>
							</div>
						</section>

						
						<aside class="dqdt-sidebar sidebar left left-content col-xs-12 col-sm-12 col-md-3 col-lg-3 col-md-pull-9 col-lg-pull-9">
							<div class="sidebar-modules">
								<script src='//bizweb.dktcdn.net/100/278/638/themes/623797/assets/search_filter.js?1524451884518' type='text/javascript'></script>
								<script>
									var selectedSortby;
									var tt = 'Thứ tự';
									var selectedViewData = "data";
									var filter = new Bizweb.SearchFilter()

									function toggleFilter(e) {
										_toggleFilter(e);
										renderFilterdItems();
										doSearch(1);
									}
									function _toggleFilterdqdt(e) {
										var $element = $(e);
										var group = 'Khoảng giá';
										var field = 'price_min';
										var operator = 'OR';	 
										var value = $element.attr("data-value");	
										filter.deleteValuedqdt(group, field, value, operator);
										filter.addValue(group, field, value, operator);
										renderFilterdItems();
										doSearch(1);
									}

									function _toggleFilter(e) {
										var $element = $(e);
										var group = $element.attr("data-group");
										var field = $element.attr("data-field");
										var text = $element.attr("data-text");
										var value = $element.attr("value");
										var operator = $element.attr("data-operator");
										var filterItemId = $element.attr("id");

										if (!$element.is(':checked')) {
											filter.deleteValue(group, field, value, operator);
										}
										else{
											filter.addValue(group, field, value, operator);
										}

										$(".catalog_filters li[data-handle='" + filterItemId + "']").toggleClass("active");
									}

									function renderFilterdItems() {
										var $container = $(".filter-container__selected-filter-list ul");
										$container.html("");

										$(".filter-container input[type=checkbox]").each(function(index) {
											if ($(this).is(':checked')) {
												var id = $(this).attr("id");
												var name = $(this).closest("label").text();

												addFilteredItem(name, id);
											}
										});

										if($(".filter-container input[type=checkbox]:checked").length > 0)
											$(".filter-container__selected-filter").show();
										else
											$(".filter-container__selected-filter").hide();
									}
									function addFilteredItem(name, id) {
										var filteredItemTemplate = "<li class='filter-container__selected-filter-item' for='{3}'><a href='javascript:void(0)' onclick=\"{0}\"><i class='fa fa-close'></i> {1}</a></li>";
										filteredItemTemplate = filteredItemTemplate.replace("{0}", "removeFilteredItem('" + id + "')");
										filteredItemTemplate = filteredItemTemplate.replace("{1}", name);
										filteredItemTemplate = filteredItemTemplate.replace("{3}", id);
										var $container = $(".filter-container__selected-filter-list ul");
										$container.append(filteredItemTemplate);
									}
									function removeFilteredItem(id) {
										$(".filter-container #" + id).trigger("click");
									}
									function clearAllFiltered() {
										filter = new Bizweb.SearchFilter();


										$(".filter-container__selected-filter-list ul").html("");
										$(".filter-container input[type=checkbox]").attr('checked', false);
										$(".filter-container__selected-filter").hide();

										doSearch(1);
									}
									function doSearch(page, options) {
										if(!options) options = {};
			   //NProgress.start();
			   $('.aside.aside-mini-products-list.filter').removeClass('active');
			   awe_showPopup('.loading');
			   filter.search({
			   	view: selectedViewData,
			   	page: page,
			   	sortby: selectedSortby,
			   	success: function (html) {
			   		var $html = $(html);
					   // Muốn thay thẻ DIV nào khi filter thì viết như này
					   var $categoryProducts = $($html[0]); 

					   $(".category-products").html($categoryProducts.html());
					   pushCurrentFilterState({sortby: selectedSortby, page: page});
					   awe_hidePopup('.loading');
					   // initQuickView();
					   $('.add_to_cart').click(function(e){
					   	e.preventDefault();
					   	var $this = $(this);						   
					   	var form = $this.parents('form');						   
					   	$.ajax({
					   		type: 'POST',
					   		url: '/cart/add.js',
					   		async: false,
					   		data: form.serialize(),
					   		dataType: 'json',
					   		error: addToCartFail,
					   		beforeSend: function() {  
					   			if(window.theme_load == "icon"){
					   				awe_showLoading('.btn-addToCart');
					   			} else{
					   				awe_showPopup('.loading');
					   			}
					   		},
					   		success: addToCartSuccess,
					   		cache: false
					   	});
					   });
					   $('html, body').animate({
					   	scrollTop: $('.category-products').offset().top
					   }, 0);
					   resortby(selectedSortby);
				   // callbackW();
				   $('.open-filters').removeClass('open');
				   $('.dqdt-sidebar').removeClass('open');
				   // $('.tt span').text(xxx.text());
				   
				   if (window.BPR !== undefined){
				   	return window.BPR.initDomEls(), window.BPR.loadBadges();
				   }
				}
			});		
			}

			function sortby(sort) {			 
				switch(sort) {
					case "price-asc":
					selectedSortby = "price_min:asc";					   
					break;
					case "price-desc":
					selectedSortby = "price_min:desc";
					break;
					case "alpha-asc":
					selectedSortby = "name:asc";
					break;
					case "alpha-desc":
					selectedSortby = "name:desc";
					break;
					case "created-desc":
					selectedSortby = "created_on:desc";
					break;
					case "created-asc":
					selectedSortby = "created_on:asc";
					break;
					default:
					selectedSortby = "";
					break;
				}
				doSearch(1);
			}

			function resortby(sort) {
				switch(sort) {				  
					case "price_min:asc":
					tt = "Giá tăng dần";
					break;
					case "price_min:desc":
					tt = "Giá giảm dần";
					break;
					case "name:asc":
					tt = "Tên A → Z";
					break;
					case "name:desc":
					tt = "Tên Z → A";
					break;
					case "created_on:desc":
					tt = "Mới đến cũ";
					break;
					case "created_on:asc":
					tt = "Cũ đến mới";
					break;
					default:
					tt = "Mặc định";
					break;
				}
				$('.sortPagiBar select .valued').html(tt);
			}


			function _selectSortby(sort) {			 
				resortby(sort);
				switch(sort) {
					case "price-asc":
					selectedSortby = "price_min:asc";
					break;
					case "price-desc":
					selectedSortby = "price_min:desc";
					break;
					case "alpha-asc":
					selectedSortby = "name:asc";
					break;
					case "alpha-desc":
					selectedSortby = "name:desc";
					break;
					case "created-desc":
					selectedSortby = "created_on:desc";
					break;
					case "created-asc":
					selectedSortby = "created_on:asc";
					break;
					default:
					selectedSortby = sort;
					break;
				}
			}

			function toggleCheckbox(id) {
				$(id).click();
			}

			function pushCurrentFilterState(options) {

				if(!options) options = {};
				var url = filter.buildSearchUrl(options);
				var queryString = url.slice(url.indexOf('?'));			  
				if(selectedViewData == 'data_list'){
					queryString = queryString + '&view=list';				 
				}
				else{
					queryString = queryString + '&view=grid';				   
				}

				pushState(queryString);
			}

			function pushState(url) {
				window.history.pushState({
					turbolinks: true,
					url: url
				}, null, url)
			}
			function switchView(view) {			  
				switch(view) {
					case "list":
					selectedViewData = "data_list";					   
					break;
					default:
					selectedViewData = "data";

					break;
				}			   
				var url = window.location.href;
				var page = getParameter(url, "page");
				if(page != '' && page != null){
					doSearch(page);
				}else{
					doSearch(1);
				}
			}

			function selectFilterByCurrentQuery() {
				var isFilter = false;
				var url = window.location.href;
				var queryString = decodeURI(window.location.search);
				var filters = queryString.match(/\(.*?\)/g);

				if(queryString) {
					isFilter = true;
				}

				if(filters && filters.length > 0) {
					filters.forEach(function(item) {
						item = item.replace(/\(\(/g, "(");
						var element = $(".filter-container input[value='" + item + "']");
						element.attr("checked", "checked");
						_toggleFilter(element);
					});

					isFilter = true;
				}

				var sortOrder = getParameter(url, "sortby");
				if(sortOrder) {
					_selectSortby(sortOrder);
				}
				var page = getParameter(url, "page");
				if(isFilter) {
					doSearch(1);
				}
			}

			function getParameter(url, name) {
				name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
				var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
				results = regex.exec(url);
				return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
			}

			$( document ).ready(function() {
				selectFilterByCurrentQuery();
				$('.filter-group .filter-group-title').click(function(e){
					$(this).parent().toggleClass('active');
				});

				$('.filter-mobile').click(function(e){
					$('.aside.aside-mini-products-list.filter').toggleClass('active');
				});

				$('#show-admin-bar').click(function(e){
					$('.aside.aside-mini-products-list.filter').toggleClass('active');
				});

				$('.filter-container__selected-filter-header-title').click(function(e){
					$('.aside.aside-mini-products-list.filter').toggleClass('active');
				});
			});
		</script>





		<div class="sidebar-item sidebar-menu sidebar-collection-menu">
			<div class="module-header">
				<h2 class="title-head sidebar-title">
					<span>Danh mục sản phẩm</span>
				</h2>
			</div>
			<div class="sidebar-menu-content module-content">
				<div class="sidebar-linklists">
					<ul>
						@foreach($cats_all as $cats)
						@if($cats->parent == 0) 
						<li class="sidebar-menu-list collection-sidebar-menu">
							<a class="ajaxLayer" href="{{route('user.product-search_category',['slug' => $cats->slug])}}" title="{{$cats->name}}">
								<span>{{$cats->name}}</span>
								<span class="object_count"></span>
							</a>
							
							<ul style="display: none" class="lv2">
								@if($cats->getChilds) 
								@foreach($cats->getChilds as $child)
								<li>
									<a class="ajaxLayer a_lv2" href="{{route('user.product-search_category',['slug' => $child->slug])}}" title="{{$child->name}}">
										<span>{{$child->name}}</span>
									</a>

								</li>
								@endforeach
								@endif	
							</ul>
						</li>
						@endif	
						@endforeach

						<li class="sidebar-menu-list collection-sidebar-menu">
							<a class="ajaxLayer" href="{{route('user.product-all')}}" title="Thương hiệu">
								<span>Thương hiệu</span>
								<span class="object_count"></span>
							</a>
							
							<ul style="display: none" class="lv2">
								@foreach($brand as $br)
								<li>
									<a class="ajaxLayer a_lv2" href="{{route('user.product-search_brand',['name' => $br->name])}}" title="{{$br->name}}">
										<span>{{$br->name}}</span>
									</a>

								</li>
								@endforeach

							</ul>

						</li>

					</ul>
				</div>
			</div>
		</div>

		<div class="sidebar-item aside-filter">
			<div class="filter-container">	
				<div class="filter-container__selected-filter" style="display: none;">
					<div class="filter-container__selected-filter-header clearfix">
						<span class="filter-container__selected-filter-header-title"><i class="fa fa-arrow-left hidden-sm-up"></i> Bạn chọn</span>
						<a href="javascript:void(0)" onclick="clearAllFiltered()" class="filter-container__clear-all">Bỏ hết <i class="fa fa-angle-right"></i></a>
					</div>
					<div class="filter-container__selected-filter-list">
						<ul></ul>
					</div>
				</div>
			</div>


			<!-- LOC GIA -->



			<link href='//bizweb.dktcdn.net/100/278/638/themes/623797/assets/jquery-ui.min.css?1524451884518' rel='stylesheet' type='text/css' />
			<script src='//bizweb.dktcdn.net/100/278/638/themes/623797/assets/jquery-ui.min.js?1524451884518' type='text/javascript'></script>	

			<aside class="sidebar-item aside-item filter-price">
				<div class="aside-title module-header">
					<h2 class="title-head sidebar-title"><span>Chọn theo giá</span></h2>
				</div>

				<form action="{{route('user.product-search-price')}}" method="POST" class="form-horizontal" role="form">
					<div class="aside-content filter-group module-content">			
						<div class="col-md-5">
							<div class="form-group">
								<input type="mumber" class="form-control" name="min" placeholder="Min">
							</div>
						</div>
						<div class="col-md-2" style="padding-top: 10px;">
							>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								
								<input type="mumber" class="form-control" name="max" placeholder="Max">
							</div>
						</div>
						@csrf
						<button type="submit" class="btn btn_versus" id="filter-value" style="width: 100%;">Lọc</button>
					</div>
				</form>
			</aside>



		</div>



	</div>
</aside>

<div id="open-filters" class="open-filters hidden-lg hidden-md">
	<i class="fa fa-filter"></i>
	<span>Lọc</span>
</div>

</div>
</div>
</section>
@stop()