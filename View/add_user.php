<?php
	require_once dirname(__DIR__) . '/Common/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php echo AUSER;?></title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<form action="<?php echo ORGINAL_PATH . C_USER; ?>" method="POST" accept-charset="utf-8">
		<label for="full_name">FULL NAME: </label>
		<input type="text" name="full_name" value=""><br/>
		<label for="email">EMAIL: </label>
		<input type="text" name="email" value=""><br/>
		<label for="rank">RANK: </label>
		<input type="text" name="rank" value=""><br/>
		<label for="is_active">IS ACTIVE: </label>
		<input type="number" name="is_active" value="0" min="0" max="1"><br/>
		<label for="created_at">CREATED AT: </label>
		<input type="text" name="created_at" value="CURRENT DATETIME" disabled><br/>
		<label for="updated_at">UPDATED AT: </label>
		<input type="text" name="updated_at" value="CURRENT DATETIME" disabled><br/>
		<input type="submit" name="add_user" value="Add USER">
	</form>
</body>
</html>
