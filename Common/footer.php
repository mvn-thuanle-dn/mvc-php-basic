<?php
	require_once dirname(__FILE__) . '/header.php';
	require_once dirname(__DIR__) . '/Model/Model.php';

    $allTables = new Table($connection);

    $table_name = 'information_schema.tables';
    $fields = ['table_name'];
    $conditions = ['table_schema'=>'mysql_exercise_basic'];
    //call function getAll get table;
    $stmt = $allTables->getAll($table_name, $fields, $conditions);
    $row_footer = $stmt->fetchAll();
    foreach ($row_footer as $value) {
    	$result[] = $value[0];
    }
?>
<div class="footer">
	<ul>
		<?php 
		foreach($result as $val) {
			switch ($val) {
				case 'user':
					?>
					<li><a href="<?php echo ORGINAL_PATH . V_USER;?>" title="user"><?php echo htmlspecialchars($val);?></a></li>
					<?php
					break;

				case 'blog':
					?>
					<li><a href="<?php echo ORGINAL_PATH . V_BLOG;?>" title="blog"><?php echo htmlspecialchars($val);?></a></li>
					<?php
					break;
				
				default:
				?>
				<li>
				<?php
					echo htmlspecialchars($val);
				?>
				</li>
					<?php
					break;
			}
		}
		?>
	</ul>
</div>
