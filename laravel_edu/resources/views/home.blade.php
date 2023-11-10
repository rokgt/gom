<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h1>COME BACK HOME!!!</h1>
	<h2>YOU MUST COME BACK HOME</h2>
	<h3>거칠은 인생속에</h3>
	<h4>나를 완성하겠어~</h4>
	<br><br>
	<form action="/home" method="POST">
		@csrf
		<button type="submit">POST</button>
	</form>
	<br><br>
	<form action="/home" method="POST">
		@csrf
		@method('PUT')
		<button type="submit">PUT</button>
	</form>
	<br><br>
	<form action="/home" method="POST">
		@csrf
		@method('DELETE')
		<button type="submit">DELETE</button>
	</form>
</body>
</html>