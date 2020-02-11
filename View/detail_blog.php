<?php
	require_once dirname(__FILE__, 2) . '/Common/header.php';
	require_once dirname(__FILE__, 2) . '/Model/Model.php';

	$blog = new Table($connection);

	//statements
	if (isset($_GET['idblog'])){
		$table_name = 'blog';
		$fields = [];
		$conditions = ['id'=>$_GET['idblog']];

		//statements
		$stmt = $blog->getAll($table_name, $fields, $conditions);

		$row_detail_blog = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo BLOG . " " . $_GET['idblog']; ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo ORGINAL_PATH . CSS; ?>">
</head>
<body>
	<table class="table-blog">
		<caption>
			<h1>BLOG TABLE <?php echo $_GET['idblog']; ?></h1>
		</caption>
		<thead>
			<tr>
				<th>ID</th>
				<th>CATEGORY_ID</th>
				<th>USER_ID</th>
				<th>TITLE</th>
				<th>VIEW</th>
				<th>IS_ACTIVE</th>
				<th>CONTENT</th>
				<th>CREATED_AT</th>
				<th>UPDATED_AT</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach ($row_detail_blog as $value_detail_blog) {
			?>
			<tr>
				<td><?php echo $value_detail_blog['id'];?></a></td>
				<td><?php echo $value_detail_blog['category_id']; ?></td>
				<td><?php echo $value_detail_blog['user_id']; ?></td>
				<td><?php echo $value_detail_blog['title']; ?></td>
				<td><?php echo $value_detail_blog['view']; ?></td>
				<td><?php echo $value_detail_blog['is_active']; ?></td>
				<td><?php echo $value_detail_blog['content']; ?></td>
				<td><?php echo $value_detail_blog['created_at']; ?></td>
				<td><?php echo $value_detail_blog['updated_at']; ?></td>
			</tr>
		</tbody>
			<?php
				}
			}
			?>
	</table>
	<div class="edit-blog" style="margin-right: 150px;transform: translate(95%, 95%);">
			<a href="<?php echo ORGINAL_PATH . C_BLOG . "?idblog=" . $_GET['idblog']; $_SESSION['bedit'] = 'bedit'; ?>" title="edit"><input type="button" name="edit" value="EDIT"></a>
	</div>
	<?php
		require_once dirname(__DIR__) . '/Common/footer.php';
	?>
</body>
</html>
