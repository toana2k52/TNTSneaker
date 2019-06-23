@extends('user.main.home')
@section('title','TNTSneaker - Website sneaker hàng đầu về chất lượng')
<!-- Header -->
@section('main-content')
<!-- Content -->
<section class="bread-crumb">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<ul class="breadcrumb" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">					
					<li class="home">
						<a href="{{route('user')}}" ><span itemprop="title">Trang chủ</span></a>						
					</li>

					
						<li>
							<strong itemprop="title">Giới thiệu</strong>
						</li>
					
				</ul>
			</div>
		</div>
	</div>
</section>
		

	<!-- Content -->
		<section class="page page-template">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="module-header">
					<h1 class="title-head layout-title">
						<span>Giới thiệu</span>
					</h1>
				</div>
				<div class="module-content">
					<div class="content-page fw rte padding-top-15 padding-bottom-15">
						<p>Giới thiệu ...</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="versus_layout_include">	
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
									<img class="img-responsive" src="{{url('/')}}/resources/views/admin/customer/uploads/36324412_591602887887204_389234559411027968_n.jpg" alt="Khách hàng đánh giá " style="border-radius: 50%;">
								</div>
								<div class="feedback_custom">
									Dương Huy Toàn
								</div>
								<div class="feedback_desc">
									C.E.O Gento
								</div>
							</div>
						</div>
					<div class="item">
							<div class="feedback_content">
								Tôi rất băn khoăn mỗi khi muốn tìm cho mình 1 địa điểm tin cậy để có thể tìm thấy những đôi giày theo sở thích của mình, bắt kịp xu hướng thời trang, được chăm sóc và bảo hành tốt. Cho đến khi tôi tới Versus, tôi đã rất yên tâm và thỏa sức mua hàng tại đây.
							</div>
							<div class="feedback_info">
								<div class="feedback_image">
									<img class="img-responsive" src="{{url('/')}}/resources/views/admin/customer/uploads/member_null.png" alt="Khách hàng đánh giá " style="border-radius: 50%;">
								</div>
								<div class="feedback_custom">
									Nguyễn Hoàng Anh
								</div>
								<div class="feedback_desc">
									Giám đốc điều hành VCF
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
@stop()