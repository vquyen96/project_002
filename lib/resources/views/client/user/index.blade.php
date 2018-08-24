<!DOCTYPE html>
<html>
<head>
	<title>{{ Auth::user()->fullname }}</title>
	<base href="{{ asset('lib/resources/assets/') }}/">
	<link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/user.css">
	<link rel="stylesheet" type="text/css" href="css/all.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700" rel="stylesheet">

</head>
<body>
<div id="id_user">{{ Auth::user()->id }}</div>
<div id="currentUrl">{{ asset('') }}</div>
<div class="carouselBG">
	<div id="carouselHome" class="carousel slide" data-ride="carousel">
	  <div class="carousel-inner">
	    <div class="carousel-item active" style="background: url('images/Cho+vay+Thau+chi+sinh+vien_banner.jpg') no-repeat center /cover;">
	    </div>
	    <div class="carousel-item" style="background: url('images/BannerWeb_visa.jpg') no-repeat center /cover;">
	      
	    </div>
	    <div class="carousel-item" style="background: url('images/Banner-Cat-canh.jpg') no-repeat center /cover;">
	      
	    </div>
	  </div>
	</div>
</div>
<div class="opaBG">
</div>
<div>
	@include('errors.note')
</div>
@if(Auth::check())
<div class="main">
	<div class="header">
		<div class="headerAva thumbnail" style="background: url('{{ asset('lib/storage/app/avatar/'.Auth::user()->img) }}') no-repeat center /cover"></div>
		<div class="headerName">
			<div class="headerNameMain">
				{{ Auth::user()->fullname }}
			</div>
			
		</div>
	</div> 
	<div class="nav">
		<div class="navItem">
			Tài khoản
		</div>
		<div class="navItem">
			Gửi tiền
		</div>
		<div class="navItem">
			Rút tiền
		</div>
		<div class="navItem">
			Chuyển tiền
		</div>
		<div class="navItem">
			Lịch sử giao dịch
		</div>

	</div>
	<div class="body">
		<div class="bodyLine">
			<div class="bodyItem">
				<div class="bodyItemAva">
                      <input id="img" type="file" name="img" class="cssInput" onchange="changeImg(this)" style="display: none!important;">
                      <img style="cursor: pointer;" id="avatar" class="cssInput thumbnail imageForm" src="{{ asset('lib/storage/app/avatar/'.$acc->img)}}">
				</div>
				<div class="bodyItemMain">
					<div class="bodyItemMainSmail">
						<div class="bodyItemLeft">
							Tên tài khoản
						</div>
						<div class="bodyItemRight">
							<div class="bodyItemRightText">
								{{ $acc->fullname }}
							</div>
							<div class="bodyItemRightInput">
								<input type="text" name="fullname" class="form-control" value="{{ $acc->fullname }}">
							</div>
							<div class="bodyItemRightBtn">
								<i class="fas fa-edit"></i>
							</div>
						</div>
					</div>
					<div class="bodyItemMainSmail">
						<div class="bodyItemLeft">
							Tên đăng nhập
						</div>
						<div class="bodyItemRight">
							<div class="bodyItemRightText">
								{{ $acc->username }}
							</div>
							<div class="bodyItemRightInput">
								<input type="text" name="username" class="form-control" value="{{ $acc->username }}">
							</div>
							<div class="bodyItemRightBtn">
								<i class="fas fa-edit"></i>
							</div>
						</div>
					</div>
					<div class="bodyItemMainSmail">
						<div class="bodyItemLeft">
							Mật khẩu
						</div>
						<div class="bodyItemRight">
							<div class="bodyItemRightText">
								
							</div>
							<div class="bodyItemRightInput">
								<input type="text" name="password" class="form-control" value="">
							</div>
							<div class="bodyItemRightBtn">
								<i class="fas fa-edit"></i>
							</div>
						</div>
					</div>
					<div class="bodyItemMainSmail">
						<div class="bodyItemLeft">
							Email
						</div>
						<div class="bodyItemRight">
							<div class="bodyItemRightText">
								{{ $acc->email }}
							</div>
							<div class="bodyItemRightInput">
								<input type="text" name="email" class="form-control" value="{{ $acc->email }}">
							</div>
							<div class="bodyItemRightBtn">
								<i class="fas fa-edit"></i>
							</div>
						</div>
					</div>
					<div class="bodyItemMainSmail">
						<div class="bodyItemLeft">
							Số tài khoản
						</div>
						<div class="bodyItemRight">
							<div class="bodyItemRightText">
								{{ $acc->account_number }}
							</div>
							{{-- <div class="bodyItemRightInput">
								<input type="text" name="account_number" class="form-control" value="{{ $acc->account_number }}">
							</div>
							<div class="bodyItemRightBtn">
								<i class="fas fa-edit"></i>
							</div> --}}
						</div>
					</div>
					<div class="bodyItemMainSmail">
						<div class="bodyItemLeft">
							Số dư
						</div>
						<div class="bodyItemRight">
							<div class="bodyItemRightText">
								{{ $acc->balance }}
							</div>
							<div class="bodyItemRightInput">
								<input type="text" name="balance" class="form-control" value="{{ $acc->balance }}">
							</div>
							<div class="bodyItemRightBtn">
								<i class="fas fa-edit"></i>
							</div>
						</div>
					</div>
					<div class="bodyItemMainSmail">
						<div class="bodyItemLeft">
							Số chứng minh 
						</div>
						<div class="bodyItemRight">
							<div class="bodyItemRightText">
								{{ $acc->id_number }}
							</div>
							<div class="bodyItemRightInput">
								<input type="text" name="id_number" class="form-control" value="{{ $acc->id_number }}">
							</div>
							<div class="bodyItemRightBtn">
								<i class="fas fa-edit"></i>
							</div>
						</div>
					</div>
					<div class="bodyItemMainSmail">
						<div class="bodyItemLeft">
							Số điện thoại
						</div>
						<div class="bodyItemRight">
							<div class="bodyItemRightText">
								{{ $acc->phone }}
							</div>
							<div class="bodyItemRightInput">
								<input type="text" name="phone" class="form-control" value="{{ $acc->phone }}">
							</div>
							<div class="bodyItemRightBtn">
								<i class="fas fa-edit"></i>
							</div>
						</div>
					</div>
					<div class="bodyItemMainSmail">
						<div class="bodyItemLeft">
							Địa chỉ
						</div>
						<div class="bodyItemRight">
							<div class="bodyItemRightText">
								{{ $acc->address }}
							</div>
							<div class="bodyItemRightInput">
								<input type="text" name="address" class="form-control" value="{{ $acc->address }}">
							</div>
							<div class="bodyItemRightBtn">
								<i class="fas fa-edit"></i>
							</div>
						</div>
					</div>
					<div class="bodyItemMainSmail">
						<div class="bodyItemLeft">
							Ngày sinh
						</div>
						<div class="bodyItemRight">
							<div class="bodyItemRightText">
								{{ $acc->birthday }}
							</div>
							<div class="bodyItemRightInput">
								<input type="text" name="birthday" class="form-control" value="{{ $acc->birthday }}">
							</div>
							<div class="bodyItemRightBtn">
								<i class="fas fa-edit"></i>
							</div>
						</div>
					</div>
					<div class="bodyItemMainSmail">
						<div class="bodyItemLeft">
							Giới tính
						</div>
						<div class="bodyItemRight">
							<div class="bodyItemRightText">
								{{ $acc->gender }}
							</div>
							<div class="bodyItemRightInput">
								<input type="text" name="gender" class="form-control" value="{{ $acc->gender }}">
							</div>
							<div class="bodyItemRightBtn">
								<i class="fas fa-edit"></i>
							</div>
						</div>
					</div>

				</div>
				<div class="bodyItemBtn">
					<button type="submit">Thay đổi</button>
				</div>
			</div>
			<div class="bodyItem">
				<form method="post" action="{{ asset('user/deposit') }}">
				{{ csrf_field() }}
				<div class="bodyItemAva">
                     <h2>Gửi tiền vào tài khoản</h2>
                     <div class="bodyItemAccNum">
                     	Stk: {{ $acc->account_number }}
                     </div>
                     <div class="bodyItemBlance">
                     	Số dư: {{ number_format($acc->balance, 0,',','.') }}
                     </div>
				</div>
				<div class="bodyItemMain">
					<div class="bodyItemMainSmail">
						<div class="bodyItemLeft">
							Số tiền
						</div>
						<div class="bodyItemRight">
							<input type="number" name="deposit[amount]" class="form-control">
						</div>
					</div>
					<div class="bodyItemMainSmail">
						<div class="bodyItemLeft">
							Lời nhắn
						</div>
						<div class="bodyItemRight">
							<textarea name="deposit[messages]" class="form-control" rows="5"></textarea>
						</div>
						<div style="display: none;">
							<input type="submit" name="" class="btn_form_deposit">
						</div>
					</div>
				</div>
				</form>
				<div class="bodyItemBtn">
					<button type="buton" onclick="getDeposit()">Gửi</button>
				</div>
				
			</div>
			<div class="bodyItem">
				<form method="post" action="{{ asset('user/withdraw') }}">
					{{ csrf_field() }}
					<div class="bodyItemAva">
	                     <h2>Rút tiền</h2>
	                     <div class="bodyItemAccNum">
	                     	Stk: {{ $acc->account_number }}
	                     </div>
	                     <div class="bodyItemBlance">
	                     	Số dư: {{ number_format($acc->balance, 0,',','.') }}
	                     </div>
					</div>
					<div class="bodyItemMain">
						<div class="bodyItemMainSmail">
							<div class="bodyItemLeft">
								Số tiền
							</div>
							<div class="bodyItemRight">
								<input type="number" name="withdraw[amount]" class="form-control">
							</div>
						</div>
						<div class="bodyItemMainSmail">
							<div class="bodyItemLeft">
								Lời nhắn
							</div>
							<div class="bodyItemRight">
								<textarea name="withdraw[messages]" class="form-control" rows="5"></textarea>
							</div>
							<div style="display: none;">
								<input type="submit" name="" class="btn_form_withdraw">
							</div>
						</div>
					</div>
					</form>
					<div class="bodyItemBtn">
						<button type="button" onclick="getWithdraw()">Rút</button>
					</div>
				
				
			</div>
			<div class="bodyItem">
				<form method="post" action="{{ asset('user/transfer') }}">
					{{ csrf_field() }}
					<div class="bodyItemAva">
	                     <h2>Chuyển tiền</h2>
	                     <div class="bodyItemAccNum">
	                     	Stk: {{ $acc->account_number }}
	                     </div>
	                     <div class="bodyItemBlance">
	                     	Số dư: {{ number_format($acc->balance, 0,',','.') }}
	                     </div>
					</div>
					<div class="bodyItemMain">
						<div class="bodyItemMainSmail">
							<div class="bodyItemLeft">
								Số tiền
							</div>
							<div class="bodyItemRight">
								<input type="number" name="transfer[amount]" class="form-control">
							</div>
						</div>
						<div class="bodyItemMainSmail">
							<div class="bodyItemLeft">
								Tên người nhận
							</div>
							<div class="bodyItemRight">
								<input type="text" name="transfer[fullname]" class="form-control">
							</div>
						</div>
						<div class="bodyItemMainSmail">
							<div class="bodyItemLeft">
								Stk người nhận
							</div>
							<div class="bodyItemRight">
								<input type="number" name="transfer[account_number]" class="form-control">
							</div>
						</div>
						<div class="bodyItemMainSmail">
							<div class="bodyItemLeft">
								Lời nhắn
							</div>
							<div class="bodyItemRight">
								<textarea name="transfer[messages]" class="form-control" rows="5"></textarea>
							</div>
							<div style="display: none;">
								<input type="submit" name="" class="btn_form_transfer">
							</div>
						</div>
					</div>
				</form>
					<div class="bodyItemBtn">
						<button type="button" onclick="getTranfer()">Gửi</button>
					</div>
				
					
			</div>
			<div class="bodyItem">
				<div class="bodyItemAva">
                     <h2>Lịch sử giao dịch</h2>
                     <div class="bodyItemAccNum">
                     	Stk: {{ $acc->account_number }}
                     </div>
                     <div class="bodyItemBlance">
                     	Số dư: {{ number_format($acc->balance, 0,',','.') }}
                     </div>
				</div>
				<div class="bodyItemMain">
					<table class="table table-hover">
						<tr>
							<th>Thời gian</th>
							<th>Số tiền giao dịch</th>
							<th>Nội Dung</th>
						</tr>
						@foreach($history as $item)
						<tr>
							
							<td>{{ $item->created_at }}</td>
							<td>{{ $item->type == 2 || $item->receiver_id != Auth::user()->id ? '-'.number_format($item->amount) : '+'.number_format($item->amount) }}</td>
							<td>{{ $item->messages }}</td>
							
						</tr>
						@endforeach
					</table>
				</div>
				
			</div>
		</div>
			
	</div>
</div>


<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Gửi tiền vào tài khoản</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{-- Content get by API --}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
        <button type="button" class="btn btn-warning" id="btnSubmit">Xác nhận</button>
      </div>
    </div>
  </div>
</div>
@endif


<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/user.js"></script>
</body>
</html>