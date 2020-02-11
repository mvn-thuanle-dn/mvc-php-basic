<?php
require_once dirname(__FILE__, 3) . '/Common/header.php';
require_once dirname(__FILE__, 3) . '/View/detail_blog.php';

switch (isset($_SESSION['blog'])) {
    case 'blog':
        unset($_SESSION['blog']);
        header('Location: ' . ORGINAL_PATH . V_BLOG);
        break;

    case 'bedit':
        unset($_SESSION['bedit']);

        $table_name = 'category';
        $fields = ['id'];
        $conditions = [];

        $result = $blog->getAll($table_name, $fields, $conditions);
        $result = $result->fetchAll();

        foreach ($result as $category) {
            if ($category != $value_detail_blog['category_id']) {
                $category_id[] = $category;
            }
        }
        $_SESSION['row_detail_blog'] = $row_detail_blog;
        $_SESSION['category_id'] = $category_id;
        header('Location: ' . ORGINAL_PATH . E_BLOG);
        break;

    default:
        echo "error route";
        break;
}