{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')
{{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.master` --}}
@section('title')
Xem phim - Delta
@endsection
{{-- Thay thế nội dung vào Placeholder `custom-css` của view `frontend.layouts.master` --}}
@section('custom-css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" ></script>
<style type="text/css">
    body{
      margin-top: 150px;
        background-color: #C4CCD9;
    }
    .error-main{
      background-color: #fff;
      box-shadow: 0px 10px 10px -10px #5D6572;
    }
    .error-main h1{
      font-weight: bold;
      color: #444444;
      font-size: 100px;
      text-shadow: 2px 4px 5px #6E6E6E;
    }
    .error-main h6{
      color: #42494F;
    }
    .error-main p{
      color: #9897A0;
      font-size: 14px;
    }
</style>
@endsection
{{-- Thay thế nội dung vào Placeholder `main-content` của view `frontend.layouts.master` --}}
@section('main-content')
<div class="container">
        <div class="row text-center">
          <div class="col-lg-6 offset-lg-3 col-sm-6 offset-sm-3 col-12 p-3 error-main">
            <div class="row">
              <div class="col-lg-8 col-12 col-sm-10 offset-lg-2 offset-sm-1">
                <h1 class="m-0">404</h1>
              <h6>Không tìm thấy trang </h6>
                <p>Vui lòng qua lại trang chủ - <a href="{{route('frontend.home')}}">ShopHoaTuoi.com</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
