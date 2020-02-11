<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <form action="" method="POST" accept-charset="utf-8">
    <label for="full_name">Full Name:</label><br/>
    <input type="text" name="full_name" value="<?php echo $dataID['full_name']; ?>"/><br/>
    <label for="email">Email:</label><br/>
    <input type="text" name="email" value="<?php echo $dataID['email']; ?>"/><br/>
    <label for="rank">Rank:</label><br/>
    <input type="text" name="rank" value="<?php echo $dataID['rank']; ?>"/><br/>
    <label for="is_active">Is_active:</label><br/>
    <input type="text" name="is_active" value="<?php echo $dataID['is_active']; ?>"/><br/>
    <label for="created_at">Create_at:</label><br/>
    <input type="text" name="created_at" value="<?php echo $dataID['created_at']; ?>"/><br/>
    <input type="submit" name="update-user" value="Submit" />
  </form>
</body>
</html>
