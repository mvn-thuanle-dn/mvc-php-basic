<?php
	require_once dirname(__DIR__) . '/Common/header.php';
	if (isset($_SESSION['row_detail_user'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php echo UUSER;?></title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<form action="<?php echo ORGINAL_PATH . C_USER . '?iduser=' . $_SESSION['row_detail_user'][0]['id']; ?>" method="POST" accept-charset="utf-8">
		<?php
			foreach ($_SESSION['row_detail_user'] as $value_detail_user) {
		?>
		<label for="id">ID: </label>
		<input type="text" name="id" value="<?php echo $value_detail_user['id']; ?>" disabled><br>
		<label for="full_name">FULL NAME: </label>
		<input type="text" name="full_name" value="<?php echo $value_detail_user['full_name']; ?>"><br/>
		<label for="email">EMAIL: </label>
		<input type="text" name="email" value="<?php echo $value_detail_user['email']; ?>"><br/>
		<label for="rank">RANK: </label>
		<input type="text" name="rank" value="<?php echo $value_detail_user['rank']; ?>"><br/>
		<label for="is_active">IS ACTIVE: </label>
		<input type="number" name="is_active" value="<?php echo $value_detail_user['is_active']; ?>" min="0" max="1"><br/>
		<label for="created_at">CREATED AT: </label>
		<input type="text" name="created_at" value="<?php echo $value_detail_user['created_at']; ?>" disabled><br/>
		<label for="updated_at">UPDATED AT: </label>
		<input type="text" name="updated_at" value="<?php echo $value_detail_user['updated_at']; ?>" disabled><br/>
		<input type="submit" name="update_user" value="Update this user">
		<?php
			}
			unset($_SESSION['row_detail_user']);
		}
		?>
	</form>
</body>
</html>
