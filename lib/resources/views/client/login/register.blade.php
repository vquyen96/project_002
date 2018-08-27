<!DOCTYPE html>
<html>
<head>
	<title>Đăng ký</title>
	<base href="{{ asset('lib/resources/assets/') }}/">
	<link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/register.css">
</head>
<body>
<div class="carouselBG">
	<div id="carouselHome" class="carousel slide" data-ride="carousel">
	  {{-- <ol class="carousel-indicators">
	    <li data-target="#carouselHome" data-slide-to="0" class="active"></li>
	    <li data-target="#carouselHome" data-slide-to="1"></li>
	    <li data-target="#carouselHome" data-slide-to="2"></li>
	  </ol> --}}
	  <div class="carousel-inner">
	    <div class="carousel-item active" style="background: url('images/Cho+vay+Thau+chi+sinh+vien_banner.jpg') no-repeat center /cover;">
	      
	    </div>
	    <div class="carousel-item" style="background: url('images/BannerWeb_visa.jpg') no-repeat center /cover;">
	      
	    </div>
	    <div class="carousel-item" style="background: url('images/Banner-Cat-canh.jpg') no-repeat center /cover;">
	      
	    </div>
	  </div>
	  {{-- <a class="carousel-control-prev" href="#carouselHome" role="button" data-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="carousel-control-next" href="#carouselHome" role="button" data-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a> --}}
	</div>
</div>
<div class="opaBG">
</div>
<div class="alert">
	@include('errors.note')
</div>
<div class="main">
	<div class="logo">
		<a href="{{ asset('') }}">
			<img src="images/logo.png">
		</a>
		
	</div>
	<h2>Trải nghiệm đột phá với Ngân hàng số </h2><h2> chỉ trong vòng 2 phút</h2>
	<p>Đơn giản bằng cách điền thông tin bên dưới để Bộ phận Chăm sóc khách hàng của chúng tôi có thể liên hệ với bạn đặt lịch hẹn nhận thẻ và cafe miễn phí tại TP Coffe Hangout.</p>
	<p><i>Quản lý tài chính an toàn, toàn diện hơn với tài khoản thanh toán, tiết kiệm và thẻ ATM (thẻ Debit). Dễ dàng rút tiền miễn phí tại hơn 16.000 ATM toàn quốc, truy cập vào sổ tiết kiệm, các khoản đầu tư, Mastercard và nhiều hơn thế..</i></p>
	<div class="mainForm">
		<form method="post">
			{{ csrf_field() }}
			<div class="form_group">
			    <label>Tên đăng nhập</label>
			    <div> 
			    	<input type="text" class="form-control" name="acc[username]" placeholder="Không dấu và khoảng trăng, (Vd: honganh1999)" required>
			    </div>
			</div>
			<div class="form_group">
			    <label>Mật khẩu đăng nhập</label>
			    <div> 
			    	<input type="password" class="form-control" name="acc[password]" placeholder="Trên 8 kí tự" required>
			    </div>
			</div>
			<div class="form_group">
			    <label>Nhập lại mật khẩu</label>
			    <div> 
			    	<input type="password" class="form-control" name="acc[password]" placeholder="Trên 8 kí tự" required>
			    </div>
			</div>
			<div class="form_group">
			    <label>Họ tên bạn trên CMND</label>
			    <div> 
			    	<input type="text" class="form-control" name="acc[fullname]" placeholder="Không dấu, (Vd: Nguyen Van A)" required>
			    </div>
			</div>
			<div class="form_group">
			    <label>Địa chỉ email</label>
			    <div>
			    	<input type="text" class="form-control" name="acc[email]" placeholder="(Vd: abc@mail.com)" required>
			    </div>
			</div>
			<div class="form_group">
			    <label>Số điện thoại di động</label>
			    <div>
			    	<input type="text" class="form-control" name="acc[phone]" placeholder="(Ví dụ: 0901234567)" required>
			    </div>
			</div>
			<div class="form_group">
			    <label>Ngày sinh</label>
			    <div>
			    	{{-- <input type="text" class="form-control" name="acc['name']" placeholder="(Vd: 18/01/1995)"> --}}
			    	<input type="date" name="acc[birthday]" required value="{{isset($item)? $item->birthday : ''}}" min="1000-01-01" max="3000-12-31" class="form-control" placeholder="(Vd: 18/01/1995)">
			    </div>
			</div>
			<div class="form_group">
			    <label>Số CMND/Thẻ căn cước công dân</label>
			    <div>
			    	<input type="text" class="form-control" name="acc[id_number]" placeholder="(Vd: 021234567)" required>
			    </div>
			</div>
			<div class="form_group">
				<input type="submit" name="sbm" value="Hoàn tất đăng ký" class="btn btn-default">
			</div>
		</form>
	</div>
</div>
	


<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/master.js"></script>
</body>
</html>