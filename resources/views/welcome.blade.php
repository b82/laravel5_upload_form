<html>
<head>
	<title>Form upload Laravel 5</title>
</head>
<body>

	{!! Form::open(array('url' => '/upload', 'method' => 'POST', 'files' => true)) !!}
		
		{!! Form::file('image') !!}
		{!! Form::submit('Upload') !!}

	{!! Form::close() !!}

	<img src="{{ asset('/') .'uploads/'.$img }}" alt="">
	<!--{{ HTML::image('img/picture.jpg', 'a picture', array('class' => 'thumb')) }}-->

</body>
</html>