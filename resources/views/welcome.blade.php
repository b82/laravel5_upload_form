<html>
<head>
	<title>Form upload Laravel 5</title>
</head>
<body>

	{!! Form::open(array('url' => '/upload', 'method' => 'POST', 'files' => true)) !!}
		
		{!! Form::text('title') !!}
		{!! Form::text('text') !!}
		{!! Form::file('image') !!}
		{!! Form::submit('Upload') !!}

	{!! Form::close() !!}

	@foreach($posts AS $post)

		<h3>{{ $post->title }}</h3>
		<p>{{ $post->text }}</p>
		<img src="{{ asset('/') .'uploads/'.$post->img }}" alt="">

	@endforeach
	<!--{{ HTML::image('img/picture.jpg', 'a picture', array('class' => 'thumb')) }}-->

</body>
</html>