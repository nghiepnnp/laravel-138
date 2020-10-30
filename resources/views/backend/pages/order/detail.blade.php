@extends('layouts.layoutadmin')
@section('title', 'Quản lý đơn hàng')

@section('content')
@section('session_header')
<link rel="stylesheet" type="text/css" href="{{asset('backend/css/jquery.dataTables.min.css')}}"/>
<script type="text/javascript" src="{{asset('backend/js/jquery.dataTables.min.js')}}"></script>

@endsection
<div class="clearfix py-3">
	<div class="row bg- border ">
		<div class="col-9 h4 text-danger">
			Chi tiết đơn hàng
		</div>
		<div class="col-3">
			<div class="float-right">
				<button type="button" class="btn btn-primary">
					<a href="{{route('order_index')}}" class="text-white">Index</a>
				</button>
				<button type="button" class="btn btn-danger">
					<a href="{{route('order_trash')}}" class="text-white">Đơn đã hủy</a>
				</button>
			</div>
		</div>
	</div>
	
</div>
<div class="clearfix"></div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID Order</th>
      <th scope="col">{{$row->id}}</th>
     
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>Tên sản phẩm</th>
      <td>{{$row->name}}</td>
   
    </tr>
    <tr>
      <th>Giá</th>
      <td></td>
   
    </tr>
    <tr>
      <th>Số lượng</th>
      <td></td>
    </tr>
    <tr>
      <th>Tổng tiền</th>
      <td></td>
    </tr>
    <tr>
      <th>Trạng thái</th>
      <td>Đã hủy</td>
    </tr>

  </tbody>
</table>
@endsection


