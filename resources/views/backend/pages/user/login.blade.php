
<form action="{{route('postlogin')}}" method="POST">

	@csrf

	<input type="text" name="user">
	<input type="pass" name="pass">
	<input type="submit">





</form>

