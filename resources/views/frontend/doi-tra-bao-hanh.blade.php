@extends('layouts.layoutsite')
@section('title','Giới thiệu')
@section('content')
<section class="container border py-5">

	@php

	echo "$gt->content";
	echo "Nội dung cập nhật ngày ".$gt->updated_at;
	@endphp

</section>
@endsection