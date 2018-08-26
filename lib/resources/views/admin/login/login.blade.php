  <!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập</title>
    <link rel="shortcut icon" href="favicon.ico"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <base href="{{ asset('lib/resources/assets') }}/">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" href="admin/plugins/font-awesome/css/font-awesome.min.css">
    <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/all.css">
    <style type="text/css">
    .da-slide h2 a {
        color: #f4851f;
        text-decoration: none;
}
    </style>
    {{-- <link rel="stylesheet" type="text/css" href="BoosTrap&JQuery/bootstrap3.3.7/bootstrap.min.css"> --}}
</head>
<body>
<?php 
    $username = $password = "";
    if (isset($_POST['ok'])) {
        if ($_POST['username'] == "") {
        $errorUsername = "Vui lòng nhập tên đăng nhập của bạn .";
      }
    if ($_POST['password'] == "") {
        $errorPassword = "Vui lòng nhập mật khẩu của bạn .";
      }  
    }
 ?>
    <div class="menu-top">
        <div class="nav-login">
            <div class="nav-login-left">
                <ul>
                    <li>
                        <a href="{{ asset('') }}"><img src="images/home.png"></a>
                    </li>
                    <li>
                        <a href="{{ asset('') }}" id="linkLanguage" language="en"><img src="images/en-us.png"></a>
                    </li>
                    <li>
                        <div>
                            Dịch vụ khách hàng 24/7: 1900 54 54 13
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-sm-1"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="box-content">
                    <div class="box-support-login">
                        <div id="da-slider" class="da-slider" style="background-position: 900% 0%;">
                            <div class="da-slide da-slide-toleft">
                                <h2><a href="https://tpb.vn/">Hỗ trợ online 24/7 các ngày trong tuần</a>
                                </h2>
                                <div class="ct">
                                    <div class="fix-img-qc">
                                        <a href="https://tpb.vn/"><img src="images/info2.png">
                                        </a>
                                    </div>
                                    <div>
                                        <p style="margin-bottom: 12px">
                                            Trung tâm Dịch vụ khách hàng 24/7 là đơn vị trực thuộc Ngân hàng Tiên Phong (TPBank), hoạt động suốt 24 giờ trong ngày và 7 ngày trong tuần, với các chức năng chính:
                                            <br>
                                            - Giới thiệu, hướng dẫn sử dụng và giải đáp thắc mắc của khách hàng về sản phẩm, dịch vụ của TPBank.
                                            <br>
                                            - Cung cấp các dịch vụ ngân hàng và chăm sóc khách hàng qua điện thoại.
                                            <br>
                                            - Tiếp nhận và giải quyết khiếu nại của khách hàng.
                                            <br>
                                            Trung tâm Dịch vụ khách hàng 24/7 được trang bị hệ thống tổng đài hiện đại, cùng với đội ngũ nhân viên tư vấn năng động, nhiệt tình, được đào tạo chuyên nghiệp về dịch vụ khách hàng, nhằm mục tiêu mang đến khách hàng của TPBank (cá nhân, tổ chức) các tiện ích vượt trội như sau:
                                            <br>
                                            - Phục vụ liên tục 24 giờ trong ngày và 7 ngày trong tuần.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="da-slide da-slide-toleft">
                                <h2>
                                    <a href="{{ asset('') }}">Mở thẻ eCounter miễn phí và cơ hội trúng dành những phần quà giá trị
                                    </a>
                                </h2>
                                <div class="ct">
                                    <div class="fix-img-qc">
                                        <a href="{{ asset('') }}"><img src="images/info3.jpg">
                                        </a>
                                    </div>
                                    <div>
                                        <p style="margin-bottom: 12px">TPBank tiếp tục gia hạn chương trình “Đổi thẻ đa năng – Nhận ngay quà tặng” đến hết 21/3/2015. Theo đó, khách hàng được mở mới hoặc nâng cấp thẻ ATM thành thẻ tiêu dùng đa tiện ích eCounter miễn phí với nhiều ưu đãi và quà tặng hấp dẫn.<br>Chương trình được triển khai tại các chi nhánh của TPBank. Khách hàng không chỉ được miễn phí mở mới hoặc đổi thẻ ATM thành thẻ tiêu dùng đa tiện ích eCounter, mà còn có thêm cơ hội bốc thăm may mắn hàng tháng và cuối chương trình.
                                        Cụ thể, hàng tháng TPBank sẽ tiến hành quay số may mắn với:<br>
                                        ●    01 giải Nhất là iPad mini<br>
                                        ●    01 giải Nhì là Máy giặt  Panasonic 8.5kg<br>
                                        ●    03 giải Ba là Lò vi sóng Electrolux<br>
                                        Để biết thêm thông tin chi tiết về thể lệ chương trình, vui lòng truy cập <a href="{{ asset('') }}">tại đây</a></p>
                                    </div>
                                </div>
                            </div>
                            <nav class="da-dots">
                                <span class="da-dots-current"></span>
                                <span class=""></span><span class=""></span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="full-login col-sm-4" style="float: right; margin-top: 30px;" >
                <div class="logo-login">
                    <div>
                        <a href="{{ asset('') }}"><img src="images/tpbank.gif"></a>
                    </div>
                    <div class="content-login">
                    </div>
                    <div class="box-login">
                        <div class="form-login">
                            <div class="title-dv">Dịch vụ TPB-iB@nking</div>
                            <form method="POST">
                                {{ csrf_field() }}
                                <div class="control-login">
                                    <input type="text" title="" placeholder="Họ tên bạn trên CMND" autocomplete="off" name="login[username]">
                                <span class="error"><?php echo isset($errorUsername) ? $errorUsername : ""; ?></span>   
                                </div>
                                <div class="control-login">
                                    <input type="password" title="" placeholder="Mật khẩu" autocomplete="off" name="login[password]">
                                    <span class="error"><?php echo isset($errorPassword) ? $errorPassword : ""; ?></span>
                                </div>
                                                                                                                  
                                <div class="control-login">
                                    <div style="float:left; width:100%">
                                        <button type="submit" name="" class="btn-dangnhap">Đăng nhập</button>
                                    </div>
                                </div>
                                <div class="login-link">
                                    <p>
                                        <a href="{{ asset('') }}">Quên mật khẩu?
                                        </a>
                                    </p>
                                    <p>
                                        <a target="_blank" href="{{ asset('') }}">Hướng dẫn giao dịch an toàn
                                        </a>
                                    </p>
                                    <p>
                                        <a target="_blank" href="{{ asset('') }}">Câu hỏi thường gặp
                                        </a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
                
    </div>
    {{-- <script type="text/javascript" src="js/myscript.js"></script>
    <script type="text/javascript" src="BoosTrap&JQuery/jquery3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="BoosTrap&JQuery/bootstrap3.3.7/bootstrap.min.js"></script> --}}
</body>
</html>