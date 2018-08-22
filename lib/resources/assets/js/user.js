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
});
