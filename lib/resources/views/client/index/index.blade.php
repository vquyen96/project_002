<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>TP Bank</title>
<base href="{{ asset('lib/resources/assets') }}/">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Net Banking Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />

<link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
<!--// bootstrap-css -->
<!-- css -->
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<!--// css -->
<link rel="stylesheet" href="css/owl.carousel.css" type="text/css" media="all">
<link href="css/owl.theme.css" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="css/cm-overlay.css" />
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- font -->
<link href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- //font -->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- animation -->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!-- //animation --> 
<script>
$(document).ready(function() { 
	$("#owl-demo").owlCarousel({
 
		autoPlay: 3000, //Set AutoPlay to 3 seconds
		autoPlay:true,
		items : 3,
		itemsDesktop : [640,5],
		itemsDesktopSmall : [414,4]
 
	});
	
}); 
</script>



<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
	<!-- banner -->
	<div class="banner">
		<!--header-->
		<div class="header">
			<div class="container">		
				<nav class="navbar navbar-default">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<h1><a  href="{{ asset('') }}">
							<img src="images/logo.png">
						</a></h1>
					</div>
					<!--navbar-header-->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right">
							<li><a href="index.html" class="active">Trang chủ</a></li>
							<li><a href="#about" class="scroll">Giới thiệu</a></li>
							<li><a href="#services" class="scroll">Dịch vụ</a></li>
							<li><a href="#blog" class="scroll">Hoạt động cộng đồng</a></li>
							<li><a href="#news" class="scroll">Tin tức</a></li>
							<li><a href="#contact" class="scroll">Liên hệ</a></li>
						</ul>	
						<div class="clearfix"> </div>	
					</div>
				</nav>
			</div>
		</div>
		<!--//header-->
		<div class="w3layouts-banner-info">
			<div class="container">
				<div class="w3layouts-banner-slider">
					<div class="slider">
						<div class="callbacks_container">
							<ul class="rslides callbacks callbacks1" id="slider4">
								<li>
									@if(Auth::check())
									<div class="agileits-banner-info">
										<h3>{{ Auth::user()->fullname }}</h3>
										<div class="btnHomes">
											<a href="{{ asset('user') }}" class="btn_home btn_login">
												Tới trang cá nhân
											</a>
										</div>
									</div>

									@else
									<div class="agileits-banner-info">
										<h3>Đăng ký để nhận nhiều ưu đãi</h3>
										<div class="btnHomes">
											<a href="{{ asset('register') }}" class="btn_home btn_register">
												Đăng ký
											</a>
											<a href="{{ asset('login') }}" class="btn_home btn_login">
												Đăng nhập
											</a>
										</div>
									</div>
									@endif
								</li>
							</ul>
						</div>
						<script src="js/responsiveslides.min.js"></script>
						<script>
							// You can also use "$(window).load(function() {"
							$(function () {
							  // Slideshow 4
							  $("#slider4").responsiveSlides({
								auto: true,
								pager:true,
								nav:false,
								speed: 500,
								namespace: "callbacks",
								before: function () {
								  $('.events').append("<li>before event fired.</li>");
								},
								after: function () {
								  $('.events').append("<li>after event fired.</li>");
								}
							  });
						
							});
						 </script>
						<!--banner Slider starts Here-->
					</div>
				</div>
			</div>
		</div>
		<div class="bounce animated">
			<a href="#welcome" class="scroll">
				<div class="mouse"></div>
			</a>
		</div>
		{{-- <div id="carouselHome" class="carousel slide" data-ride="carousel">
		  <div class="carousel-inner">
		    <div class="carousel-item active">
		      <img class="d-block w-100" src="images/Cho+vay+Thau+chi+sinh+vien_banner.jpg" alt="First slide">
		    </div>
		    <div class="carousel-item">
		      <img class="d-block w-100" src="images/BannerWeb_visa.jpg" alt="Second slide">
		    </div>
		    <div class="carousel-item">
		      <img class="d-block w-100" src="images/Banner-Cat-canh.jpg" alt="Third slide">
		    </div>
		  </div>
		</div> --}}
	</div>
	<!-- //banner -->
	<!-- welcome -->
	<div class="welcome" id="welcome">
		<div class="container">
			<div class="w3-welcome-heading">
				<h2>Chào mừng khách hàng đến với ngân hàng chúng tôi</h2>
			</div>
			<div class="w3l-welcome-info">
				<div class="col-sm-6 welcome-grids">
					<div class="welcome-img">
						<img src="images/4.jpg" class="img-responsive zoom-img" alt="">
					</div>
				</div>
				<div class="col-sm-6 welcome-grids">
					<div class="welcome-img">
						<img src="images/6.jpg" class="img-responsive zoom-img" alt="">
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="w3l-welcome-text">
				<p>Ngân hàng Thương mại Cổ phần Tiên Phong (gọi tắt là “TPBank”) được thành lập từ ngày 05/05/2008. TPBank được kế thừa những thế mạnh về công nghệ hiện đại, kinh nghiệm thị trường cùng tiềm lực tài chính của các cổ đông chiến lược bao gồm:Tập đoàn Vàng bạc Đá quý DOJI, Tập đoàn Công nghệ FPT, Công ty Tài chính quốc tế ( IFC), Tổng công ty Tái bảo hiểm Việt Nam (Vinare) và Tập đoàn Tài chính SBI Ven Holding Pte. Ltd.,Singapore</p>
				<p>Với tuyên ngôn thương hiệu “Vì chúng tôi hiểu bạn”, TPBank mong muốn lấy nền tảng của “sự thấu hiểu” khách hàng để xây dựng phong cách chất lượng dịch vụ ngân hàng hàng đầu. Hiểu để sẻ chia, hiểu để cùng đồng hành với khách hàng, để sáng tạo ra những sản phẩm dịch vụ tốt nhất và phù hợp nhất đem lại những giá trị gia tăng cao nhất cho khách hàng. Đó cũng chính là kim chỉ nam cho sự phát triển bền vững mà TPBank hướng đến.</p>
			</div>
		</div>
	</div>
	<!-- //welcome -->
	<!-- about -->
	<div class="about" id="about">
		<div class="container">
			<div class="w3-welcome-heading">
				<h3>Về chúng tôi</h3>
			</div>
			<div class="w3ls-about-grids">
				<div class="col-md-6 about-right">
					<img src="images/9.jpg" alt="">
				</div>
				<div class="col-md-6 about-left"> 
					<h4>Về TPBank</h4>
					<p>Ngân hàng Thương mại Cổ phần Tiên Phong (gọi tắt là “TPBank”) được thành lập từ ngày 05/05/2008. TPBank được kế thừa những thế mạnh về công nghệ hiện đại, kinh nghiệm thị trường cùng tiềm lực tài chính của các cổ đông chiến lược bao gồm:Tập đoàn Vàng bạc Đá quý DOJI, Tập đoàn Công nghệ FPT, Công ty Tài chính quốc tế ( IFC), Tổng công ty Tái bảo hiểm Việt Nam (Vinare) và Tập đoàn Tài chính SBI Ven Holding Pte. Ltd.,Singapore</p>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //about -->
	<!-- services -->
	<div class="services" id="services">
		<div class="container">
			<div class="w3-welcome-heading">
				<h3>Dịch vụ</h3>
			</div>
			<div class="agileits-services-grids">
				<div class="col-md-8 agileits-services-left">
					<h4>Tổng quan về dịch vụ</h4>
					<div class="agileits-services-text">
						<p>TPBank cung cấp sản phẩm/ dịch vụ tài chính hoàn hảo cho Khách hàng và Đối tác dựa trên nền tảng công nghệ hiện đại, tiên tiến và hiệu quả cao.</p>
						<p>TPBank là tổ chức kinh tế hoạt động minh bạch, an toàn, hiệu quả và bền vững, mang lại lợi ích tốt nhất cho các Cổ đông.</p>
						<p>TPBank tạo điều kiện tối ưu để mỗi Cán bộ Nhân viên có cuộc sống đầy đủ về kinh tế, phát huy năng lực sáng tạo và phát triển sự nghiệp của bản thân.</p>
						<p>TPBank là tổ chức có trách nhiệm xã hội cao, tích cực tham gia các hoạt động cộng đồng với mục tiêu vì CON NGƯỜI và HƯNG THỊNH QUỐC GIA.</p>
					</div>
					<div class="credit-grids">
						<h5>Thẻ tín dụng:</h5>
						<div class="credit-grid-left">
							<div class="credit-grid">
								<img src="images/c2.jpg" alt="" />
								<h6>Visa</h6>
								
							</div>
							<div class="credit-grid">
								<img src="images/c3.jpg" alt="" />
								<h6>MasterCard</h6>
								
							</div>
							<div class="credit-grid">
								<img src="images/c4.jpg" alt="" />
								<h6>MasterCard</h6>
								
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="credit-grids debit-grids">
						<h5>Thẻ ghi nợ:</h5>
						<div class="debit-grids-text">
							<p>Miễn phí rút tiền mặt</p>
							<p>Phí chuyển đổi ngoại tệ thấp nhất thị trường</p>
							<p>Thanh toán trực tuyến an toàn</p>
							<p>Công nghệ chip EMV</p>
						</div>
						<div class="w3-services-grids">
							<div class="col-md-4 w3l-services-grid">
								<div class="w3ls-services-img">
									<i class="fa fa-money" aria-hidden="true"></i>
								</div>
								<div class="agileits-services-info">
									<h4></h4>
								</div>
							</div>
							<div class="col-md-4 w3l-services-grid">
								<div class="w3ls-services-img">
									<i class="fa fa-credit-card" aria-hidden="true"></i>
								</div>
								<div class="agileits-services-info">
									<h4></h4>
								</div>
							</div>
							<div class="col-md-4 w3l-services-grid">
								<div class="w3ls-services-img">
									<i class="fa fa-line-chart" aria-hidden="true"></i>
								</div>
								<div class="agileits-services-info">
									<h4></h4>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
				<div class="col-md-4 agileits-services-right">
					<h4>Tin tức mới nhất</h4>
					<div class="services-two-grids">
						<div class="agileinfo-services-right">
							<img src="images/10.jpg" alt="" />
							<h6></h6>
						</div>
						<!-- date -->
						<div id="design" class="date">
										<div id="cycler">   
											<div class="date-text">
												<a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-arrow-right" aria-hidden="true"></i>
TPBank nằm trong nhóm các ngân hàng TMCP có xếp hạng tín nhiệm tốt nhất Việt Nam theo Moody’s</a>
											</div>
											<div class="date-text">
												<a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-arrow-right" aria-hidden="true"></i>
Khách hàng trúng giải may mắn Tuần 5 - Khuyến mãi “Tới LiveBank – Rinh ngay tiền mặt tổng giải thưởng hơn 200 triệu”<span class="blinking"><img src="images/new.png" alt="" /></span></a>
											</div>
											<div class="date-text">
												<a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-arrow-right" aria-hidden="true"></i>
Ngân Hàng Nhà Nước phê chuẩn mức vốn điều lệ mới của TPBank</a>
											</div>
											<div class="date-text">
												<a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-arrow-right" aria-hidden="true"></i>
Khách hàng trúng giải may mắn Tuần 4 - Khuyến mãi “Tới LiveBank - Rinh ngay tiền mặt tổng giải thưởng hơn 200 triệu”<span class="blinking"><img src="images/new.png" alt="" /></span></a>
											</div>
											<div class="date-text">
												<a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-arrow-right" aria-hidden="true"></i>
Khách hàng tại Thái Nguyên trúng giải may mắn Tuần 3 - Khuyến mãi “Tới LiveBank – Rinh ngay tiền mặt tổng giải thưởng hơn 200 triệu”</a>
											</div>
											<div class="date-text">
												<a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-arrow-right" aria-hidden="true"></i>
Sẽ có thêm nhiều startup ghi tên trên “bản đồ khởi nghiệp thành công” với sự hỗ trợ của TPBank</a>
											</div>
										</div>
										<script>
										function blinker() {
											$('.blinking').fadeOut(500);
											$('.blinking').fadeIn(500);
										}
										setInterval(blinker, 1000);
										</script>
										<script>
											function cycle($item, $cycler){
												setTimeout(cycle, 2000, $item.next(), $cycler);
												
												$item.slideUp(1000,function(){
													$item.appendTo($cycler).show();        
												});
												}
											cycle($('#cycler div:first'),  $('#cycler'));
										</script>
						</div>
						<!-- //date -->
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //services -->
	<!-- works -->
	<div class="jarallax blog" id="blog">
		<div class="container">
			<div class="w3-welcome-heading">
				<h3>Hoạt động cộng đồng</h3>
			</div>
			<div class="wthree-blog-grids">
				<div class="col-md-6 w3-agileits-blog-grid">
					<div class="col-sm-4 blog-left">
						<h4>24/09</h4>
						<ul>
							<li><a href="#"></a></li>
							<li><li>
							<li></li>
						</ul>
					</div>
					<div class="col-sm-8 blog-right">
						<a href="#" data-toggle="modal" data-target="#myModal">Công đoàn TPBank lập quỹ nhân ái riêng với tên hội Heart's in Hands (HIH) và thường xuyên tổ chức các hoạt động thiện nguyện với sự tham gia của đông đảo CBNV Ngân hàng</a>
						<p>Đồng hành cùng Ngày hội việc làm BUH lần thứ 16 tại TP.Hồ Chí Minh</p>
						<p>Đồng hành cùng chương trình tình nguyện “Nghĩa tình đậm sâu – Địa đầu Tổ quốc” tại Hà Giang</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-6 w3-agileits-blog-grid">
					<div class="col-sm-4 blog-left">
						<h4>09/12</h4>
						<ul>
							<li><a href="#"></a></li>
							<li><li>
							<li></li>
						</ul>
					</div>
					<div class="col-sm-8 blog-right">
						<a href="#" data-toggle="modal" data-target="#myModal">Tài trợ giải Golf HNGA & PING Friendship Golf Tournament 2016</a>
						<p>Đồng hành cùng Hội chợ Việc làm dành cho sinh viên ngành Tài chính Ngân hàng</p>
						<p>Đồng hành cùng giải golf Vô địch Trung - Cao niên Quốc gia 2016</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //works -->
	<!-- news -->
	<div class="news" id="news">
		<div class="container">
			<div class="w3-welcome-heading">
				<h3>Sự kiện</h3>
			</div>
			<div class="w3ls-news-grids">
				<div class="news-right">
					<div class="col-md-4 news-right-grid">
						<div class="agile-news-info">
							<img src="images/n1.jpg" alt=" " class="img-responsive">
							<h4><a href="#" data-toggle="modal" data-target="#myModal">
Cất Cánh Dễ Dàng, Bay Khắp Mọi Nơi Cùng TPBank, Napas Và Vietnam Airlines</a></h4>
							<span>8 tháng 6 năm 2018| 10:00 - 12:00</span>
							<p>Đồng hành cùng Napas và Vietnam Airlines, TPBank gửi tới Quý khách hàng chương trình ưu đãi lớn: “CẤT CÁNH DỄ DÀNG, BAY KHẮP MỌI NƠI”</p>
							<div class="agileinfo-news-button">
								<a href="#" class="hvr-shutter-in-horizontal" data-toggle="modal" data-target="#myModal">More</a>
							</div>
						</div>
					</div>
					<div class="col-md-4 news-right-grid">
						<div class="agile-news-info">
							<img src="images/n2.jpg" alt=" " class="img-responsive">
							<h4><a href="#" data-toggle="modal" data-target="#myModal">
Giảm ngay tới 50% chi tiêu ẩm thực cuối tuần cho chủ thẻ tín dụng TPBank tại các nhà hàng nổi tiếng</a></h4>
							<span>20 tháng 7 năm 2018| 09:00 - 11:00</span>
							<p>Ngày thường vốn đã khá “nhàm chán” và đơn điệu với những việc lặp lại, những thói quen ít thay đổi, những bữa cơm nhà ăn hoài rồi! Hãy "refresh" cuối tuần của bạn bên gia đình và bạn bè</p>
							<div class="agileinfo-news-button">
								<a href="#" class="hvr-shutter-in-horizontal" data-toggle="modal" data-target="#myModal">More</a>
							</div>
						</div>
					</div>
					<div class="col-md-4 news-right-grid">
						<div class="agile-news-info">
							<img src="images/n3.jpg" alt=" " class="img-responsive">
							<h4><a href="#" data-toggle="modal" data-target="#myModal">
TẶNG 100% PHÍ CHUYỂN TIỀN LẦN ĐẦU, CƠ HỘI TRÚNG NGAY MACBOOK CHO MỖI GIAO DỊCH</a></h4>
							<span>17 tháng 8 năm 2018| 12:00 - 02:00</span>
							<p>Từ ngày 01/07/2018 đến hết ngày 31/10/2018, TPBank triển khai chương trình ưu đãi cho khách hàng khi đăng ký và thực hiện giao dịch Chuyển tiền du học</p>
							<div class="agileinfo-news-button">
								<a href="#" class="hvr-shutter-in-horizontal" data-toggle="modal" data-target="#myModal">More</a>
							</div>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<!-- modal -->
				<div class="modal about-modal fade" id="myModal" tabindex="-1" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header"> 
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
								<h4 class="modal-title"><span>Banking</span></h4>
							</div> 
							<div class="modal-body">
								<div class="agileits-w3layouts-info">
									<img src="images/g2.jpg" alt="" />
									<p></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			<!-- //modal --> 
		</div>
	</div>
	<!-- //news -->
	<!-- feedback -->
	<div class="jarallax feedback">
		<div class="container">
			<div class="w3-welcome-heading">
				<h3>Phản hồi của khách hàng</h3>
			</div>
			<div class="agileits-feedback-grids">
				<div id="owl-demo" class="owl-carousel owl-theme">
					<div class="item">
						<div class="feedback-info">
							<div class="feedback-top">
								<p> Chất lượng phục vụ của các bạn rất tốt, tôi cảm thấy rất hài lòng và cẩm thấy yên tâm. </p>
							</div>
							<div class="feedback-grids">
								<div class="feedback-img">
									<img src="images/hoa1.jpg" alt="" />
								</div>
								<div class="feedback-img-info">
									<h5>Minh Hòa</h5>
									<p>Hà Nội</p>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>	
					</div>
					<div class="item">
						<div class="feedback-info">
							<div class="feedback-top">
								<p> Chất lượng phục vụ của các bạn rất tốt, tôi cảm thấy rất hài lòng và cẩm thấy yên tâm. </p>
							</div>
							<div class="feedback-grids">
								<div class="feedback-img">
									<img src="images/tanh1.jpg" alt="" />
								</div>
								<div class="feedback-img-info">
									<h5>Tuấn Anh</h5>
									<p>Hà Nội</p>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>	
					</div>
					<div class="item">
						<div class="feedback-info">
							<div class="feedback-top">
								<p> Chất lượng phục vụ của các bạn rất tốt, tôi cảm thấy rất hài lòng và cẩm thấy yên tâm. </p>
							</div>
							<div class="feedback-grids">
								<div class="feedback-img">
									<img src="images/f2.jpg" alt="" />
								</div>
								<div class="feedback-img-info">
									<h5>Duy Anh</h5>
									<p>Hà Nội</p>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>	
					</div>
					<div class="item">
						<div class="feedback-info">
							<div class="feedback-top">
								<p> Chất lượng phục vụ của các bạn rất tốt, tôi cảm thấy rất hài lòng và cẩm thấy yên tâm. </p>
							</div>
							<div class="feedback-grids">
								<div class="feedback-img">
									<img src="images/ngoc1.jpg" alt="" />
								</div>
								<div class="feedback-img-info">
									<h5>Minh Ngọc</h5>
									<p>Hà Nội</p>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>	
					</div>
					<div class="item">
						<div class="feedback-info">
							<div class="feedback-top">
								<p> Chất lượng phục vụ của các bạn rất tốt, tôi cảm thấy rất hài lòng và cẩm thấy yên tâm. </p>
							</div>
							<div class="feedback-grids">
								<div class="feedback-img">
									<img src="images/dung1.jpg" alt="" />
								</div>
								<div class="feedback-img-info">
									<h5>Mạnh Dũng</h5>
									<p>Hà Nội</p>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>	
					</div>
					<div class="item">
						<div class="feedback-info">
							<div class="feedback-top">
								<p> Chất lượng phục vụ của các bạn rất tốt, tôi cảm thấy rất hài lòng và cẩm thấy yên tâm. </p>
							</div>
							<div class="feedback-grids">
								<div class="feedback-img">
									<img src="images/nam1.jpg" alt="" />
								</div>
								<div class="feedback-img-info">
									<h5>Phương Nam</h5>
									<p>Hà Nội</p>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //feedback -->
	
	<!-- contact -->
	<div class="contact" id="contact">
		<div class="container">
			<div class="w3-welcome-heading">
				<h3>Liên hệ với chúng tôi</h3>
			</div>
			<div class="agile-contact-grids">
				<div class="col-md-7 contact-form">
					<form action="#" method="post">
						<input type="text" name="First Name" placeholder="First Name" required="">
						<input type="text" class="email" name="Last Name" placeholder="Last Name" required="">
						<input type="email" class="email" name="Email" placeholder="Email" required="">
						<textarea name="Message" placeholder="Message" required=""></textarea>
						<input type="submit" value="SUBMIT">
					</form>
				</div>
				<div class="col-md-5 agileits-w3layouts-address">
					<div class="agileits-w3layouts-address-top">
						<h5>Liên lạc</h5>
						<ul>
							<li>+84 015 894 468</li>
							<li>+84 458 965 321</li>
						</ul>
					</div>
					<div class="agileits-w3layouts-address-top">
						<h5>Địa chỉ</h5>
						<ul>
							<li>Số 8A, Tôn Thất Thuyết, Nam Từ Liêm, Mỹ Đình, Hà Nội</li>
						</ul>
					</div>
					<div class="agileits-w3layouts-address-top">
						<h5>Email</h5>
						<ul>
							<li><a href="mailto:info@example.com"> tpbank@gmail.com</a></li>
						</ul>
					</div>
				</div>
				<div class="clearfix"> </div>	
			</div>
		</div>
	</div>
	<!-- //contact -->
	<!-- footer -->
	<div class="jarallax footer">
		<div class="container">
			<div class="footer-logo">
				<h3><a href="index.html"><span>TPBank</span></a></h3>
			</div>
			<div class="agileinfo-social-grids">
				<h4>We are social</h4>
				<div class="border"></div>
				<ul>
					<li><a href="#"><i class="fa fa-facebook"></i></a></li>
					<li><a href="#"><i class="fa fa-twitter"></i></a></li>
					<li><a href="#"><i class="fa fa-rss"></i></a></li>
					<li><a href="#"><i class="fa fa-vk"></i></a></li>
				</ul>
			</div>
			<div class="copyright">
				<p>© 2017 TPBank. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
			</div>
		</div>
	</div>
	<!-- //copyright -->
	<script src="js/jarallax.js"></script>
	<script src="js/SmoothScroll.min.js"></script>
	<script type="text/javascript">
		/* init Jarallax */
		$('.jarallax').jarallax({
			speed: 0.5,
			imgWidth: 1366,
			imgHeight: 768
		})
	</script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
<script src="js/owl.carousel.js"></script>  
</body>	
</html>