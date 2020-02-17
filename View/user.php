<?php
    require_once dirname(__FILE__, 2) . '/Common/header.php';
    require_once dirname(__FILE__, 2) . '/Model/Model.php';

    $user = new Table($connection);

    $table_name = 'user';
    $fields = [];
    $conditions = [];

    //statements
    $stmt = $user->getAll($table_name, $fields, $conditions);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo USER; ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo ORGINAL_PATH . CSS; ?>">
</head>
<body>
    <?php
        $route = $_SERVER['QUERY_STRING'];
        if($route == 'success') {
            $success = 'Add user successfull';
            echo $success;
        }
    ?>
    <a href="add_user.php"><input type="button" name="Create" value="Create" ></a>
    <table>
        <caption>
            <h1>USER TABLE</h1>
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
                $row_user = $stmt->fetchAll();
                foreach ($row_user as $value) {
            ?>
            <tr>
                <td><a href="detail_user.php?iduser=<?php echo $value['id']; ?>" title="detail-user"><?php echo $value['id'];?></a></td>
                <td><?php echo $value['full_name']; ?></td>
                <td><?php echo $value['email']; ?></td>
                <td><?php echo $value['rank']; ?></td>
                <td><?php echo $value['is_active']; ?></td>
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
