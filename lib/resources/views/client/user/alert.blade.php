{{-- {{ dd(Session::all()) }} --}}
@if(Session::has('amount'))

<div class="alertSuccessMain">
  <div class="btnClose">
    <div class="btnCloseHeader">
      Thành công
    </div>
    <div class="btnCloseIcon">
      <i class="far fa-times-circle"></i>
    </div>
  </div>
  <table class="table table-striped" id="alertSuccess">
    <tbody>
      <tr>
        <td><span>Số dư trước khi {{ Session::has('re_fullname') ? 'chuyển' : 'rút' }} tiền</span></td>
        <td class="deposit_balance">{{ number_format(Session::pull('sender_balance_before'),0,',','.') }}</td>
      </tr>
      @if(Session::has('re_fullname'))
      <tr>
        <td><span>Đến tài khoản</span></td>
        <td>{{ Session::pull('re_fullname') }}</td>
      </tr> 
      <tr>
        <td><span>Tên tài khoản</span></td>
        <td>{{ Session::pull('re_account_number') }}</td>
      </tr> 
      @endif 
      <tr>
        <td><span>Số tiền</span></td>
        <td class="deposit_amount">{{ number_format(Session::pull('amount'),0,',','.') }} VND</td>
      </tr>
      <tr>
        <td><span>Phí dịch vụ</span></td>
        <td class="deposit_fee">0 VND phí tạm tính</td>
      </tr>
      <tr>
        <td><span>Tổng sô tiền</span></td>
        <td class="deposit_total">{{ number_format(Session::pull('amount'),0,',','.') }} VND</td>
      </tr>
      <tr>
        <td><span>Số dư sau khi {{ Session::has('re_fullname') ? 'chuyển' : 'rút' }} tiền</span></td>
        <td class="deposit_balance_after">{{ number_format(Session::pull('sender_balance_after'), 0, ',','.') }} VND</td>
      </tr>
      <tr>
        <td><span>Lời nhắn</span></td>
        <td class="deposit_messages">{{ Session::pull('messages') }}</td>
      </tr> 
      <tr>
        <td><span>Thời gian</span></td>
        <td class="deposit_messages">{{ Session::pull('created_at') }}</td>
      </tr>   
    </tbody>
           
  </table>
  <div class="btnPrint">
    <div class="btnPrintIcon btn btn-outline-primary">
      <i class="fas fa-print"></i>
    </div>
  </div>
</div>
  
@endif
