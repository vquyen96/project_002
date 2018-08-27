var id_user = $('#id_user').text();
var url = $('#currentUrl').text();

function changeImg(input){
    var inputFile = $(this);
    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
    if(input.files && input.files[0]){
      	var reader = new FileReader();
      	//Sự kiện file đã được load vào website
      	reader.onload = function(e){
          //Thay đổi đường dẫn ảnh
          // $('#avatar').attr('src',e.target.result);
         	$(input).next().attr('src',e.target.result);

        }
        reader.readAsDataURL(input.files[0]);
    }
}
$('.cssInput').click(function(){
  $(this).prev().click();
})

$('.bodyItemRightBtn').click(function(){
  $(this).siblings().toggle();
  $(this).hide();
});


$('.navItem').click(function(){
  $(this).siblings().css({'background':'#fff', 'color': '#861fdc'});
  $(this).css({'background':'#861fdc', 'color': '#fff'});
  var index = $(this).index();
  var ml = -index*$('.bodyItem').width();
  $('.bodyLine').css('margin-left', ml);
  history.pushState({}, null, url+'user');
});

$(document).ready(function(){
  
  $(window).on("load", function() {
    $('#loading').fadeOut();
  });
  


  $(document).on('click','.btn_deposit',function(){
    $('.btn_form_deposit').click();
  });
  $(document).on('click','.btn_withdraw',function(){
    $('.btn_form_withdraw').click();
  });
  $(document).on('click','.btnWithDrawQuick',function(){
    var amount = $(this).attr('value');

     $.ajax({
      method: 'POST',
      url: url+'user/get_withdraw',
      data: {
          '_token': $('meta[name="csrf-token"]').attr('content'),
          'id': id_user,
          'amount': amount,
          'messages' : 'Nhanh'
      },
      success: function (resp) {
        

        if (resp != 'erorr') {
          $('input[name="withdraw[amount]"]').val(amount);
          $('textarea[name="withdraw[messages]"]').val('Nhanh');
          $('#modal').find('h5').text('Gửi tiền vào tài khoản');
          $('#modal').find('.modal-body').html(resp);
          $('#modal').find('#btnSubmit').attr('class', 'btn btn-warning btn_withdraw');
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
  });


  $(document).on('click','.btn_transfer',function(){
    $('.btn_form_transfer').click();
  });

  $(document).on('click','.btnCloseIcon',function(){
    $('.alertSuccessMain').css('top', '-100%');
    setTimeout(function(){
      $('.alertSuccess').css('left', '-100%');
    },500);
  });

  $(document).on('click','.btnPrintIcon',function(){
    // var table = document.getElementById('alertSuccess');
    print();
  });




  var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
      sURLVariables = sPageURL.split('&'),
      sParameterName,
      i;

    for (i = 0; i < sURLVariables.length; i++) {
      sParameterName = sURLVariables[i].split('=');

      if (sParameterName[0] === sParam) {
          return sParameterName[1] === undefined ? true : sParameterName[1];
      }
    }
  };
  var from = getUrlParameter('from');
  if (from != null) {
    $('.bodyLine').css('transition', '0s');
    $('.navItem').eq(3).click();
    setTimeout(function(){
      $('.bodyLine').css('transition', '1s');
    },1000);
  }
});



function postDeposit(){
  var amount = $('input[name="deposit[amount]"]').value();
  var messages = $('input[name="deposit[messages]"]').value();
  var id = $('#id_sender').text();
  $.ajax({
      method: 'POST',
      url: url+'user/deposit',
      data: {
          '_token': $('meta[name="csrf-token"]').attr('content'),
          'id': id,
          'amount': amount,
          'messages': messages
      },
      success: function (resp) {
        
      },
      error: function () {
        alert('Error');
      }
    });
}
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
function getWithdraw(){

  $.ajax({
      method: 'POST',
      url: url+'user/get_withdraw',
      data: {
          '_token': $('meta[name="csrf-token"]').attr('content'),
          'id': id_user,
          'amount': $('input[name="withdraw[amount]"]').val(),
          'messages' : $('textarea[name="withdraw[messages]"]').val()
      },
      success: function (resp) {
        console.log(resp);
        if (resp != 'erorr') {
          $('#modal').find('h5').text('Gửi tiền vào tài khoản')
          $('#modal').find('.modal-body').html(resp);
          $('#modal').find('#btnSubmit').attr('class', 'btn btn-warning btn_withdraw');
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
function getTranfer(){
  $.ajax({
      method: 'POST',
      url: url+'user/get_transfer',
      data: {
          '_token': $('meta[name="csrf-token"]').attr('content'),
          'id': id_user,
          'fullname_receiver' : $('input[name="transfer[fullname]"]').val().toUpperCase(),
          'accountnumber_receiver' : $('input[name="transfer[account_number]"]').val(),
          'amount': $('input[name="transfer[amount]"]').val(),
          'messages' : $('textarea[name="transfer[messages]"]').val()
      },
      success: function (resp, status, xhr) {
        console.log(xhr);

        if (resp == 'erorr') {
          alert('Error');
        }
        else if(xhr.status == 201){
          $('#modal').find('h5').text('Lỗi chuyển khoản trong ngân hàng')
          $('#modal').find('.modal-body').html(resp);
          $('#modal').find('#btnSubmit').attr('class', 'btn btn-warning');
        } 
        else{
          $('#modal').find('h5').text('Chuyển khoản trong ngân hàng')
          $('#modal').find('.modal-body').html(resp);
          $('#modal').find('#btnSubmit').attr('class', 'btn btn-warning btn_transfer');
        }
      },
      error: function () {
        alert('Error_server');
      }
    });
  $('#modal').modal();
}

