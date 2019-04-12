<?php

function show(){
  global $link;

  $query = "SELECT * FROM blog";
  $result = mysqli_query($link, $query) or die('Failed to show data');
  return $result;
}

function add_data($title, $content, $tag){
  $query = "INSERT INTO blog(title, content, tag) VALUES ('$title', '$content', '$tag')";
  return run($query);
}

function run($query){
  global $link;

  if(mysqli_query($link, $query)) return true;
  else return false;
}
?>
