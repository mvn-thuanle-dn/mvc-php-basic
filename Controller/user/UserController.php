<?php
require_once dirname(__FILE__, 3) . '/Common/header.php';

if (isset($_SESSION['user'])) {
    switch (htmlspecialchars($_SESSION['user'])) {
        case 'user':
            unset($_SESSION['user']);
            header('Location: ' . ORGINAL_PATH . V_USER);
            break;

        case 'uedit':
            require_once dirname(__FILE__, 3) . '/View/detail_user.php';
            if (isset($_GET['iduser'])) {
                unset($_SESSION['user']);

                $_SESSION['row_detail_user'] = $row_detail_user;

                header('Location: ' . ORGINAL_PATH . E_USER . "?iduser=" . $_GET['iduser']);
            }
            break;

        default:
            // echo "error route";
            break;
    }
}

if (isset($_POST['update_user'])) {
    $date = date('Y-m-d H:i:s', time());
    require_once dirname(__FILE__, 3) . '/View/detail_user.php';
    if (isset($_GET['iduser'])) {
        $table_name = 'user';
        $fields = ['full_name' => $_POST['full_name'], 'email'=> $_POST['email'], 'rank' => $_POST['rank'], 'is_active' => $_POST['is_active'], 'updated_at' => $date];
        $conditions = ['id' => $_GET['iduser']];

        $result = $user->updateTable($table_name, $fields, $conditions);

        if ($result) {
            header('Location: ' . ORGINAL_PATH . V_USER . "?message=" . $_GET['iduser']);
        }
        echo 'Update USER fail';
    }
}

if (isset($_POST['add_user'])) {
	require_once dirname(__DIR__, 2) . '/Model/Model.php';
	$add = new Table($connection);

	$table_name = 'user';
	$fields = ['full_name' => $_POST['full_name'], 'email' => $_POST['email'], 'rank' => $_POST['rank'], 'is_active' => $_POST['is_active']];
	$result = $add->createTable($table_name, $fields);

	if ($result) {
		header('Location: ' . ORGINAL_PATH . V_USER . '?success');
	}
	echo 'Create USER fail';
}
