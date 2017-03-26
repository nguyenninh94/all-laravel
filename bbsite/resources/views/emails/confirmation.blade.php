<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Confirm Email</title>
</head>
<body>
	<h1>Thanks for sign up</h1>
	<p>You need to confirm <a href="{{url('/user/sign-up/confirm', $user->token)}}">here</a></p>
</body>
</html>