@extends('user.main.home')
@section('title','TNTSneaker - Website sneaker hàng đầu về chất lượng')
<!-- Header -->
@section('main-content')
<!-- Content -->
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
							<strong itemprop="title">Liên hệ</strong>
						</li>
					
				</ul>
			</div>
		</div>
	</div>
</section>
	
<div class="page page-template">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-md-push-6 col-lg-push-6">
				<div class="module-header">
					<h1 class="title-head layout-title">
						<span>Liên hệ</span>
					</h1>
				</div>
				<div class="module-content">
					<div class="contact-details">
						<div class="contact_address">
							<i class="fa fa-map-marker"></i>
							<span>Hồ Triều Khúc, Triều Khúc, Q.Thanh Xuân, Hà Nội</span>
						</div>
						

						
						<div class="contact_phone">
							<i class="fa fa-phone"></i>
							<span>
								<a href="callto:18006750">	
									0354859494
								</a>
							</span>
						</div>
						

						
						<div class="contact_email">
							<i class="fa fa-envelope"></i>
							<span>
								<a href="mailto:zonexxxteam@gmail.com">							
									huytoana2k52@gmail.com
								</a>
							</span>
						</div>
						

						
						<div class="contact_info">
							<i class="fa fa-info"></i>
							<span>08:00 - 21:00 (tất cả các ngày trong tuần)</span>
						</div>
						
					</div>
					<div class="contact_form">
							<form accept-charset='UTF-8' action='https://versus.bizwebvietnam.net/contact' id='contact' method='post'>
								<input name='FormType' type='hidden' value='contact' />
								<input name='utf8' type='hidden' value='true' />
								<div class="wrapper">
									<div class="module-header">
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
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

			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-md-pull-6 col-lg-pull-6">
				<div class="ggmap" id="ggmap">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29799.750946922504!2d105.79962675185618!3d20.99388500508839!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acc377cc470d%3A0xee56d1b2fe24d667!2zSOG7kyBUcmnhu4F1IEtow7pj!5e0!3m2!1svi!2s!4v1547564176165" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>
</div>

@stop()