@extends('admin.master')

@section('title', 'Nộp tiền')
@section('main')
	
<div class="content-wrapper">
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Nộp tiền vào tài khoản</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ asset('admin') }}">Trang chủ</a></li>
              <li class="breadcrumb-item active">Nộp tiền</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-9 col-sm-12">
			      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Nộp tiền</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form role="form" method="post" enctype="multipart/form-data">
                <div class="card-body">
                	<div class="form-group">
	                    <label>Số tài khoản</label>
	                    <input type="number" class="form-control" placeholder="Số tài khoản" name="deposit[account_number]" required required>
	                </div>
	                <div class="form-group">
	                    <label>Tên tài khoản</label>
	                    <input type="text" class="form-control" placeholder="VD: NGUYEN VAN A" name="deposit[fullname]" value="{{isset($item)? $item->fullname : ''}}">
	                </div>
	                <div class="form-group">
	                    <label>Người gửi</label>
	                    <input type="text" class="form-control" placeholder="VD: NGUYEN VAN B" name="deposit[sender_fullname]" value="{{isset($item)? $item->email : ''}}"> 
	                </div>
	                <div class="form-group">
	                    <label>Địa chỉ</label>
	                    <input type="text" class="form-control" placeholder="VD: Hà Nội" name="deposit[address]">
	                </div>
	                <div class="form-group">
	                    <label>Nội dung</label>
	                    <textarea class="form-control" name="deposit[messages]" rows="5"></textarea>
	                </div>
                  <div class="form-group">
                      <label>Số tiền</label>
                      <input type="number" class="form-control" name="deposit[amount]" >
                  </div>                    
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  {{-- <button type="button" class="btn btn-success">Nộp tiền</button> --}}
                  <input type="submit" class="btn btn-primary" value="Nộp tiền" >
                  {{csrf_field()}}
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
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


@stop
@section('script')
  <script type="text/javascript">
    var id_user = $('#id_user').text();
    var url = $('#currentUrl').text();
    $(document).ready(function(){
      $('button').click(function(){
        getDeposit();
      });
    });
    function getDeposit(){

      $.ajax({
          method: 'POST',
          url: url+'user/get_deposit',
          data: {
              '_token': $('meta[name="csrf-token"]').attr('content'),
              'id': id_user,
              'amount': $('input[name="deposit[amount]"]').val(),
              'messages' : $('textarea[name="deposit[messages]"]').val()
          },
          success: function (resp) {
            console.log(resp);
            if (resp != 'erorr') {
              $('#modal').find('h5').text('Gửi tiền vào tài khoản')
              $('#modal').find('.modal-body').html(resp);
              $('#modal').find('#btnSubmit').attr('class', 'btn btn-warning btn_deposit');
            }
            else{
              alert('Error');
            }
          },
          error: function () {
            alert('Error_server');
          }
        });
      $('#modal').modal();
    }
  </script>
@stop
