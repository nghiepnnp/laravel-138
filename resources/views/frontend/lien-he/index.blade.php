@extends('layouts.layoutsite')
@section('title','Kinh doanh máy ảnh')
@section('content')

<div class="container">
	
	@includeIf('frontend.message')

	<section class="mb-4">
		<h2 class="h1-responsive font-weight-bold my-4">Liên hệ</h2><hr>
		<h4 class="h4-responsive font-weight-bold mt-4">Thông tin liên hệ</h4>
		<p class="w-responsive mb-5">Quý khách vui lòng điền thông tin theo mẫu form dưới đây để liên hệ với chúng tôi:</p>

		<div class="row">
			<div class="col-md-9 mb-md-0 mb-5">
				<form id="contact-form" name="" action="{{route('contact_insert')}}" method="POST">
					@csrf
					
					<div class="row">
						<div class="col-md-6">
							<div class="md-form mb-0">
								<label for="name" class="">Họ và tên</label>
								<input type="text"  name="name" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="md-form mb-0">
								<label for="name" class="">Địa chỉ</label>
								<input type="text"  name="address" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="md-form mb-0">
								<label for="email" class="">Email</label>
								<input type="email"  name="email" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="md-form mb-0">
								<label for="email" class="">Số điện thoại</label>
								<input type="text"  name="phone" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="md-form">
								<label for="message">Nội dung</label>
								<textarea type="text" name="message" rows="2" class="form-control md-textarea"></textarea>
							</div>
						</div>
					</div>

					<div class="text-center text-md-left"><br>
						<input type="submit" class="btn btn-primary text-light" value="Gửi">
					</div>
				</form>
			</div>
			<div class="col-md-3 text-center">
				<ul class="list-unstyled mb-0">
					<li><i class="fas fa-map-marker-alt fa-2x"></i>
						<p>208 Nguyễn Hữu Cảnh, phường 22, quận Bình Thạnh, <TP class=""></TP>HCM</p>
					</li>
					<li><i class="fas fa-phone mt-4 fa-2x"></i>
						<p>08 345 5 1945</p>
					</li>
					<li><i class="fas fa-envelope mt-4 fa-2x"></i>
						<p>sales@landmark81.net</p>
					</li>
				</ul>
			</div>
		</div>
	</section>

	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4660.777294580997!2d106.71786047311569!3d10.793617997657378!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529a18fa325fd%3A0x25f815f86c6d39c1!2sVincom+Center+Landmark+81!5e0!3m2!1svi!2s!4v1558987430811!5m2!1svi!2s" width="1100" height="650" frameborder="0" style="border:0" allowfullscreen></iframe>

</div>
</div>

@endsection