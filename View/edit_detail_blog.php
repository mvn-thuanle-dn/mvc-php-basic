<?php
require_once dirname(__DIR__) . '/Common/header.php';
?>

<?php
if (isset($_SESSION['row_detail_blog'])) {
    var_dump($_SESSION['row_detail_blog']);
}
die();
foreach ($row_detail_blog as $value_detail_blog) {
    ?>
<td><a><?php echo $value_detail_blog['id']; ?></a></td>
				<td><?php echo $value_detail_blog['category_id']; ?></td>
				<td><?php echo $value_detail_blog['user_id']; ?></td>
				<td><?php echo $value_detail_blog['title']; ?></td>
				<td><?php echo $value_detail_blog['view']; ?></td>
				<td><?php echo $value_detail_blog['is_active']; ?></td>
				<td><?php echo $value_detail_blog['content']; ?></td>
				<td><?php echo $value_detail_blog['created_at']; ?></td>
				<td><?php echo $value_detail_blog['updated_at']; ?></td>
<?php
}
?>

<select name="catergory_id">
	<option value="<?php echo $value['category_id']; ?>"><?php echo $value_detail_blog['category_id']; ?></option>
	<?php
foreach ($category_id as $category) {
    ?>
	<option value="<?php echo $category['id']; ?>"><?php echo $category['id']; ?></option>
	<?php
}
?>
</select>
