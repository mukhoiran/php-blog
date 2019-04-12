<?php

function show(){
  global $link;

  $query = "SELECT * FROM blog";
  $result = mysqli_query($link, $query) or die('Failed to show data');
  return $result;
}
?>
