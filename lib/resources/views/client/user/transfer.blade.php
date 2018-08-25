<table class="table table-striped">
  <tbody>
    <tr>
      <td><span>Số dư trước khi chuyển tiền</span></td>
      <td class="deposit_balance">{{ number_format($acc->balance,0,',','.') }}</td>
    </tr>
    <tr>
      <td><span>Đến tài khoản</span></td>
      <td>{{ $receiver_accountnumber }}</td>
    </tr> 
    <tr>
      <td><span>Tên tài khoản</span></td>
      <td>{{ $receiver_fullname }}</td>
    </tr>  
    <tr>
      <td><span>Số tiền</span></td>
      <td class="deposit_amount">{{ number_format($amount,0,',','.') }} VND</td>
    </tr>
    <tr>
      <td><span>Phí dịch vụ</span></td>
      <td class="deposit_fee">0 VND phí tạm tính</td>
    </tr>
    <tr>
      <td><span>Tổng sô tiền</span></td>
      <td class="deposit_total">{{ number_format($amount,0,',','.') }} VND</td>
    </tr>
    <tr>
      <td><span>Số dư sau khi rút tiền</span></td>
      <td class="deposit_balance_after">{{ number_format($acc->balance-$amount, 0, ',','.') }} VND</td>
    </tr>
    <tr>
      <td><span>Lời nhắn</span></td>
      <td class="deposit_messages">{{ $messages }}</td>
    </tr>   
  </tbody>
         
</table>
