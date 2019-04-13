<?php
$login = false;
if(isset($_SESSION['user'])){
  $login = true;
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Blog</title>
    <link rel="stylesheet" href="view/style.css">
  </head>
  <body>

    <h1>The Simple Blogs</h1>

    <div id="menu">
      <a href="index.php">Home</a>

      <?php if($login): ?>
        <a href="add.php">Add Article</a>
        <a href="logout.php">Logout</a>
      <?php else: ?>
        <a href="login.php">Login</a>
      <?php endif ?>
    </div>
