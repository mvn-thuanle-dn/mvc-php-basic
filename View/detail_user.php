<?php
	require_once dirname(__FILE__, 2) . '/Common/header.php';
	require_once dirname(__FILE__, 2) . '/Model/Model.php';

	$user = new Table($connection);

	//statements
	if (isset($_GET['iduser'])){
		$table_name = 'user';
		$fields = [];
		$conditions = ['id'=>$_GET['iduser']];

		//statements
		$stmt = $user->getAll($table_name, $fields, $conditions);

		$row_detail_user = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo USER . ' ' . $_GET['idblog']; ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo ORGINAL_PATH . CSS; ?>">
</head>
<body>
	<table class="table-blog">
		<caption>
			<h1>USER TABLE <?php echo $_GET['iduser']; ?></h1>
		</caption>
		<thead>
            <tr>
                <th>ID</th>
                <th>FULL NAME</th>
                <th>EMAIL</th>
                <th>RANK</th>
                <th>IS_ACTIVE</th>
                <th>CREATED_AT</th>
                <th>UPDATED_AT</th>
            </tr>
		</thead>
		<tbody>
			<?php
				foreach ($row_detail_user as $value_detail_user) {
			?>
			<tr>
				<td><?php echo $value_detail_user['id'];?></a></td>
				<td><?php echo $value_detail_user['full_name']; ?></td>
				<td><?php echo $value_detail_user['email']; ?></td>
				<td><?php echo $value_detail_user['rank']; ?></td>
				<td><?php echo $value_detail_user['is_active']; ?></td>
				<td><?php echo $value_detail_user['created_at']; ?></td>
				<td><?php echo $value_detail_user['updated_at']; ?></td>
			</tr>
		</tbody>
			<?php
				}
			}
			?>
	</table>
	<div class="edit-blog" style="margin-right: 150px;transform: translate(95%, 95%);">
			<?php $_SESSION['user'] = 'uedit'; ?>
			<a href="<?php echo ORGINAL_PATH . C_USER . "?iduser=" . $_GET['iduser']; ?>" title="edit"><input type="button" name="edit" value="EDIT"></a>
	</div>
	<?php
		require_once dirname(__DIR__) . '/Common/footer.php';
	?>
</body>
</html>
