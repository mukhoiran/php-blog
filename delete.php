<?php
require_once "core/init.php";

if(!isset($_SESSION['user'])){
  header('Location: index.php');
}

if(isset($_GET['id'])){
  if(delete_data($_GET['id'])){
    header('Location: index.php');
  } else{
    echo 'Failed delete data';
  }
}

?>
