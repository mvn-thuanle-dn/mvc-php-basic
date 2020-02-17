<?php
    require_once dirname(__FILE__) . '/Common/header.php';
    require_once dirname(__FILE__) . '/Model/Model.php';

    $allTables = new Table($connection);

    $table_name = 'information_schema.tables';
    $fields = ['table_name'];
    $conditions = ['table_schema'=>'mysql_exercise_basic'];
    //call function getAll get table;
    $stmt = $allTables->getAll($table_name, $fields, $conditions);

    if (isset($_GET['page'])) {
        $page = trim($_GET['page']);
    }
    
    switch ($page) {
        case 'blog':
            $_SESSION['blog'] = 'blog';
            header ('Location: ' . LOCAL_PATH . C_BLOG);
            break;
        case 'user':
            echo 'dont config'; die();
            break;

        default:
            if (isset($page)) {
                echo 'You don\'t have permission to access with this route';
            }
            break;
    }

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo INDEX; ?></title>
  <link rel="stylesheet" href="">
</head>
<body>
    <table>
        <caption>Menu</caption>
        <thead>
            <tr>
                <th>STT</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            $id = 1;
            $row = $stmt->fetchAll();
            if ($row) {
                foreach ($row as $value) :
                    $result[] = $value[0];
                endforeach;

                foreach ($result as $val) :
        ?>
            <tr>
                <td><?php echo htmlspecialchars($id); $id++; ?></td>
                <td>
                    <?php
                        switch (htmlspecialchars($val)) {
                            case 'user':
                                ?>
                                <a href="<?php echo ORGINAL_PATH . C_USER;?>" title="user"><?php echo htmlspecialchars($val); $_SESSION['user'] = 'user';?></a>
                                <?php
                                break;
                            case 'blog':
                                ?>
                                <a href="<?php echo ORGINAL_PATH . C_BLOG;?>" title="blog"><?php echo htmlspecialchars($val); $_SESSION['blog'] = 'blog';?></a>
                                <?php
                                break;
                            default:
                                echo htmlspecialchars($val);
                                break;
                        }
                    ?>
                </td>
            </tr>
    <?php    endforeach;
        } else {
            echo 'Cant get data from ' . $table_name; die();
        }
    ?>
        </tbody>
    </table>
</body>
</html>
