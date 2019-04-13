<?php
require_once "core/init.php";

if(isset($_SESSION['user'])){
  header('Location: index.php');
}

$error = '';

if(isset($_POST['submit'])){
  $user = $_POST['username'];
  $pass = $_POST['password'];

  if(!empty(trim($user)) && !empty(trim($pass))){
    if(register_check($user)){
      if(register_data($user, $pass)){
        $_SESSION['user'] = $user;
        header('Location: index.php');
      }else{
        $error = 'Error happen when Register';
      }
    }else{
      $error = 'Username already exist';
    }
  }else{
    $error = 'Username and password cannot Empty!';
  }
}

require_once "view/header.php";

?>

<form class="" action="" method="post">
  <label for="username">Username</label><br>
  <input type="text" name="username" value=""><br><br>

  <label for="password">Password</label><br>
  <input type="password" name="password" value=""><br><br>

  <div id="error"><?=$error?></div>

  <input type="submit" name="submit" value="Register">
</form>

<?php
require_once "view/footer.php";

?>
