<!DOCTYPE html>
<html>
<head>
	<title>Đăng ký</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">


	<base href="{{ asset('lib/resources/assets/') }}/">
	<link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/register.css">
	<style type="text/css">
		body {
		  -webkit-user-select: none;
		     -moz-user-select: -moz-none;
		      -ms-user-select: none;
		          user-select: none;
		}
		.superButton{
			position: absolute;
			width: 200px;
    		height: 200px;
    		display: none;
		}
		.superButtonTitle{
			position: absolute;
			font-weight: bold;
			font-size: 20px;
			color: #fff;
			text-align: center;
			top: -50px;
			left: 0;
			width: 100%;
		}
		.superButtonMain{
			position: absolute;
			height: 200px;
			width: 200px;
			background: #0006;
			z-index: 3;
			top: 0px;
			left: 0px;
			/*transform: rotate(45deg);*/
			border-radius: 50%;
			overflow: hidden;
		}
		.superButtonItem{
			position: absolute;
			height: 100px;
			width: 100px;
			opacity: 0.5;
			background: #000;
			
			cursor: pointer;
		}
		.superButtonItem i{
			font-size: 30px;
			display: block;
		}
		.superButtonItem:hover{
			opacity: 1;
		}	
		.superButtonItemMain{
			color: #fff;
			position: absolute;
			padding: 20px;

		}
		.superButtonItem.top{
			top: 0;
			left: 0;
			
		}
		.superButtonItem.top .superButtonItemMain{
			bottom: 0;
			right: 0;
			text-align: right
		}

		.superButtonItem.right{
			top: 0;
			right: 0;
			
		}
		.superButtonItem.right .superButtonItemMain{
			bottom: 0;
			left: 0;
			text-align: left;
		}
		.superButtonItem.bottom{
			bottom: 0;
			right: 0;
			
		}
		.superButtonItem.bottom .superButtonItemMain{
			top: 0;
			left: 0;
			text-align: left;
		}
		.superButtonItem.left{
			bottom: 0;
			left: 0;
			
		}
		.superButtonItem.left .superButtonItemMain{
			top: 0;
			right: 0;
			text-align: right;
		}
		.superButtonDis{
			position: absolute;
			width: 40px;
			height: 40px;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			background: #FF9800;
			border-radius: 50%;
		}



	</style>
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

	
<div class="superButton">
	<div class="superButtonTitle">
		Thao tác nhanh
	</div>
	<div class="superButtonMain">
		<div class="superButtonItem top">
			<div class="superButtonItemMain">
				{{-- Gửi tiền --}}
				<i class="fas fa-hand-holding-usd"></i>
			</div>
		</div>
		<div class="superButtonItem right">
			<div class="superButtonItemMain">
				{{-- Rút Tiền --}}
				<i class="fas fa-external-link-alt"></i>
			</div>
		</div>
		<div class="superButtonItem bottom">
			<div class="superButtonItemMain">
				<i class="fas fa-paper-plane"></i>
				{{-- Chuyển tiền --}}
			</div>
		</div>
		<div class="superButtonItem left">
			<div class="superButtonItemMain">
				<i class="fas fa-piggy-bank"></i>
				{{-- Gửi tiết kiệm --}}
			</div>
		</div>
		<div class="superButtonDis">
			
		</div>
	</div>
		
	
</div>


<!-- Modal -->
<div class="modal fade" id="depost" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Gửi Tiền</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ asset('quick/deposit') }}">
        	{{ csrf_field() }}
        	<div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <span class="input-group-text" id="basic-addon3">Số tiền</span>
			  </div>
			  <input type="text" name="amount" class="form-control" id="basic-url" aria-describedby="basic-addon3">
			</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="withdraw" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Rút Tiền</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ asset('quick/withdraw') }}">
        	{{ csrf_field() }}
        	<div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <span class="input-group-text" id="basic-addon3">Số tiền</span>
			  </div>
			  <input type="text" name="amount" class="form-control" id="basic-url" aria-describedby="basic-addon3">
			</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="tranfer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Chuyển Tiền</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="depost">
        	<div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <span class="input-group-text" id="basic-addon3">Số tiền</span>
			  </div>
			  <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
			</div>
			<div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <span class="input-group-text" id="basic-addon3">Số tài khoản nhận</span>
			  </div>
			  <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
			</div>
			<div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <span class="input-group-text" id="basic-addon3">Tên người nhận</span>
			  </div>
			  <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
			</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript">
	var pX = 0;
	var pY = 0;
	// $( document ).on( "mousemove", function( event ) {
	// 	$( document ).on( "mousedown", function( event ) {
	// 		console.log("pageX: " + event.pageX + ", pageY: " + event.pageY );
	// 		$('.superButton').css({'display': 'block', 'top': event.pageY-100, 'left': event.pageX-100});
	// 		pX = event.pageX;
	// 		pY = event.pageY;
	// 	});
	// 	if (Math.abs( pX - event.pageX ) < 100 && Math.abs( pY - event.pageY ) < 100) {
	// 		$('.superButton').css({'display': 'block'});
	// 	}
	// 	else{
	// 		pX = -999;
	// 		pY = -999;
	// 		$('.superButton').css({'display': 'none', 'top': 0, 'left': 0});
	// 	}
		
	//   	// $( "#log" ).text( "pageX: " + event.pageX + ", pageY: " + event.pageY );
	// });
	// var timeoutId = 0;

	$(document).on('mousedown', function() {

	    // console.log("pageX: " + event.pageX + ", pageY: " + event.pageY );
	    
	    
		$('.superButton').css({'display': 'block', 'top': event.pageY-100, 'left': event.pageX-100});
		pX = event.pageX;
		pY = event.pageY;
		$( document ).on( "mousemove", function( event ) {
			if (event.pageX < pX && event.pageY < pY) {
				// console.log(event.pageX +'-'+ pX++);
				$('.superButtonTitle').text('Gửi tiền');
			}
			else if(event.pageX > pX && event.pageY < pY){
				$('.superButtonTitle').text('Rút tiền');
			}
			else if(event.pageX > pX && event.pageY > pY){
				$('.superButtonTitle').text('Chuyển tiền');
			}
			else if(event.pageX < pX && event.pageY > pY){
				$('.superButtonTitle').text('Gửi tiết kiệm');
			}
			pXs = event.pageX;
			pYs = event.pageY;
			
		});
	}).on('mouseup mouseleave', function() {
		range = 10;
		if (pXs < pX-range && pYs < pY-range) {
			$('.modal').modal('hide');
			console.log('Gửi');
			$('#depost').modal();
		}
		else if(pXs > pX+range && pYs < pY-range){
			$('.modal').modal('hide');
			console.log('Rút');
			$('#withdraw').modal();
		}
		else if(pXs > pX+range && pYs > pY+range){
			$('.modal').modal('hide');
			console.log('Chuyển');
			$('#tranfer').modal();
		}
		else if(pXs < pX-range && pYs > pY+range){
			console.log('Tiết kiệm');
			// ('#').modal();
		}
	    pX = -999;
		pY = -999;
		$('.superButton').css({'display': 'none', 'top': 0, 'left': 0});
	});

	

</script>
</body>
</html>