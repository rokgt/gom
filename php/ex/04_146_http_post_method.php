<?php
// POST Method
// request할때 데이터를 외부에서 볼수가 없다

print_r($_POST);
$_post["id"];

?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form action="/04_146_http_post_method.php" method="post">
		<fieldset>	
			<label for="id">ID</label>	
			<input type="text" name="id" id="id">
			<br>
			<label for="pw">PW</label>		
			<input type="password" name="pw"id="pw">
			<br>
			<button type="submit">전송</button>
		</fieldset>
	</form>
</body>
</html>