@extends('admin.master')
@section('title', 'Quản trị')
@section('main')


  <link rel="stylesheet" type="text/css" href="css/home.css">
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="carouselBG">
      <div id="carouselHome" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active" style="background: url('../images/Cho+vay+Thau+chi+sinh+vien_banner.jpg') no-repeat center /cover;">
          </div>
          <div class="carousel-item" style="background: url('../images/BannerWeb_visa.jpg') no-repeat center /cover;">
            
          </div>
          <div class="carousel-item" style="background: url('../images/Banner-Cat-canh.jpg') no-repeat center /cover;">
            
          </div>
        </div>
      </div>
    </div>
    <div class="opaBG">
    </div>
  </div>
@stop

@section('script')

<script src="dist/js/demo.js"></script>

@stop