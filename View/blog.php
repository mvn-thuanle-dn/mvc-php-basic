<?php
	require_once dirname(__FILE__, 2) . '/Common/header.php';
	require_once dirname(__FILE__, 2) . '/Model/Model.php';

	$blog = new Table($connection);

	$table_name = 'blog';
	$fields = [];
	$conditions = [];

	//statements
	$stmt = $blog->getAll($table_name, $fields, $conditions);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo BLOG; ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo ORGINAL_PATH . CSS; ?>">
</head>
<body>
	<table>
		<caption>
			<h1>BLOG TABLE</h1>
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
				$row_blog = $stmt->fetchAll();
				foreach ($row_blog as $value) {
			?>
			<tr>
				<td><a href="detail_blog.php?idblog=<?php echo $value['id']; ?>" title="detail-blog"><?php echo $value['id'];?></a></td>
				<td><?php echo $value['category_id']; ?></td>
				<td><?php echo $value['user_id']; ?></td>
				<td><?php echo $value['title']; ?></td>
				<td><?php echo $value['view']; ?></td>
				<td><?php echo $value['is_active']; ?></td>
				<td><?php echo $value['content']; ?></td>
				<td><?php echo $value['created_at']; ?></td>
				<td><?php echo $value['updated_at']; ?></td>
			</tr>
			<?php
				}
			?>
		</tbody>
	</table>
	<?php
		require_once dirname(__DIR__) . '/Common/footer.php';
	?>
</body>
</html>
