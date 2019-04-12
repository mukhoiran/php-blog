<?php

function check_data($user, $pass){
  global $link;
  $user = escape($user);
  $pass = escape($pass);

  $query = "SELECT * FROM users WHERE username = '$user' and password ='$pass'";
  if($result = mysqli_query($link, $query)){
    if(mysqli_num_rows($result) != 0) return true;
    else return false;
  }
}

?>
