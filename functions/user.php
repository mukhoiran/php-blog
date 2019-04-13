<?php

function check_data($user, $pass){
  global $link;
  $user = escape($user);
  $pass = escape($pass);

  //hash
  $pass = md5($pass);

  $query = "SELECT * FROM users WHERE username = '$user' and password ='$pass'";
  if($result = mysqli_query($link, $query)){
    if(mysqli_num_rows($result) != 0) return true;
    else return false;
  }
}

function check_role($user){
  global $link;
  $user = escape($user);

  $query = "SELECT role FROM users WHERE username = '$user'";
  if($result = mysqli_query($link, $query)){
    while($row = mysqli_fetch_assoc($result)){
      $role = $row['role'];
    }

    return $role;
  }
}

function register_data($user, $pass){
  $user = escape($user);
  $pass = escape($pass);

  //hash
  $pass = md5($pass);

  $query = "INSERT INTO users(username, password) VALUES ('$user', '$pass')";
  return run($query);
}

function register_check($user){
  global $link;
  $user = escape($user);

  $query = "SELECT * FROM users WHERE username = '$user'";
  if($result = mysqli_query($link, $query)){
    if(mysqli_num_rows($result) == 0) return true;
    else return false;
  }
}

?>
