<?php
	require_once dirname(__DIR__) . '/Common/header.php';
	if (isset($_SESSION['row_detail_blog']) && isset($_SESSION['category_id'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php echo UBLOG;?></title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<form action="<?php echo ORGINAL_PATH . C_BLOG . '?idblog=' . $_SESSION['row_detail_blog'][0]['id']; ?>" method="POST" accept-charset="utf-8">
		<?php
			foreach ($_SESSION['row_detail_blog'] as $value_detail_blog) {
		?>
		<label for="full_name">ID: </label>
		<input type="text" name="id" value="<?php echo $value_detail_blog['id']; ?>" disabled><br/>
		<label for="user_id">USER ID: </label>
		<select name="user_id_list">
			<option value="<?php echo $value_detail_blog['user_id']; ?>" selected><?php echo $value_detail_blog['user_id']; ?></option>
			<?php
				foreach ($_SESSION['user_id'] as $val_user_list) {
					if ($val_user_list['id'] != $value_detail_blog['user_id']) {
			?>
			<option value="<?php echo $val_user_list['id']; ?>"><?php echo $val_user_list['id']; ?></option>
			<?php
					}
				}
			?>
		</select><br>
		<label for="category_id">CATEGORY ID: </label>
		<select name="category_id_list">
			<option value="<?php echo $value_detail_blog['category_id']; ?>" selected><?php echo $value_detail_blog['category_id']; ?></option>
			<?php
				foreach ($_SESSION['category_id'] as $category) {
					if ($category['id'] != $value_detail_blog['category_id']) {
			?>
			<option value="<?php echo $category['id']; ?>"><?php echo $category['id']; ?></option>
			<?php
					}
				}
			?>
		</select><br>
		<label for="title">TITLE: </label>
		<input type="text" name="title" value="<?php echo $value_detail_blog['title']; ?>"><br/>
		<label for="view">VIEW: </label>
		<input type="text" name="view" value="<?php echo $value_detail_blog['view']; ?>"><br/>
		<label for="is_active">IS ACTIVE: </label>
		<input type="number" name="is_active" value="<?php echo $value_detail_blog['is_active']; ?>" min="0" max="1"><br/>
		<label for="content">CONTENT: </label>
		<textarea id="content_blog" name="content_blog" rows="5" cols="50"><?php echo $value_detail_blog['content']; ?></textarea><br>
		<label for="created_at">CREATED AT: </label>
		<input type="text" name="created_at" value="<?php echo $value_detail_blog['created_at']; ?>" disabled><br/>
		<label for="updated_at">UPDATED AT: </label>
		<input type="text" name="updated_at" value="<?php echo $value_detail_blog['updated_at']; ?>" disabled><br/>
		<input type="submit" name="update_blog" value="Update this blog">
		<?php
			}
			unset($_SESSION['row_detail_blog']);
			unset($_SESSION['category_id']);
			unset($_SESSION['user_id']);
		}
		?>
	</form>
<!-- <?php
		// if (isset($_POST['update_blog'])) {
		// 	var_dump("==================== <br>");
		// 	var_dump($_POST['category_id_list']) ;
		// 	var_dump($_POST['user_id_list']) ;
		// }
	?> -->
</body>
</html>
