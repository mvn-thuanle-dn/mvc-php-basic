<?php
require_once dirname(__FILE__, 3) . '/Common/header.php';

if (isset($_SESSION['blog'])) {
    switch (htmlspecialchars($_SESSION['blog'])) {
        case 'blog':
            unset($_SESSION['blog']);
            header('Location: ' . ORGINAL_PATH . V_BLOG);
            break;

        case 'bedit':
            require_once dirname(__FILE__, 3) . '/View/detail_blog.php';
            if (isset($_GET['idblog'])) {
                unset($_SESSION['blog']);
                $table_name = 'category';
                $fields = ['id'];
                $conditions = [];

                $result = $blog->getAll($table_name, $fields, $conditions);
                $result = $result->fetchAll();

                foreach ($result as $category) {
                    $category_id[] = $category;
                }

                $table_name_user = 'user';
                $user_id = $blog->getAll($table_name_user, $fields, $conditions);
                $user_id = $user_id->fetchAll();

                foreach ($user_id as $val_user) {
                    $user_id_list[] = $val_user;
                }

                $_SESSION['row_detail_blog'] = $row_detail_blog;
                $_SESSION['category_id'] = $category_id;
                $_SESSION['user_id'] = $user_id;

                header('Location: ' . ORGINAL_PATH . E_BLOG . "?idblog=" . $_GET['idblog']);
            }
            break;

        default:
            // echo "error route";
            break;
    }
}

if (isset($_POST['update_blog'])) {
    $date = date('Y-m-d H:i:s', time());
    require_once dirname(__FILE__, 3) . '/View/detail_blog.php';
    if (isset($_GET['idblog'])) {
        $table_name = 'blog';
        $fields = ['category_id' => $_POST['category_id_list'], 'user_id'=> $_POST['user_id_list'], 'title' => $_POST['title'], 'is_active' => $_POST['is_active'], 'content' => htmlspecialchars($_POST['content_blog']), 'updated_at' => $date];
        $conditions = ['id' => $_GET['idblog']];

        $result = $blog->updateTable($table_name, $fields, $conditions);

        if ($result) {
            header('Location: ' . ORGINAL_PATH . V_BLOG . "?message=" . $_GET['idblog']);
        }
        echo 'Update BLOG fail';
    }
}
