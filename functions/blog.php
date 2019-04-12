<?php

function show(){
  global $link;

  $query = "SELECT * FROM blog";
  $result = mysqli_query($link, $query) or die('Failed to show data');
  return $result;
}

function show_per_id($id){
  global $link;

  $query = "SELECT * FROM blog WHERE id = $id";
  $result = mysqli_query($link, $query) or die('Failed to show data');
  return $result;
}

function add_data($title, $content, $tag){
  $query = "INSERT INTO blog(title, content, tag) VALUES ('$title', '$content', '$tag')";
  return run($query);
}

function edit_data($title, $content, $tag, $id){
  $query = "UPDATE blog SET title = '$title', content = '$content', tag = '$tag' WHERE id = $id";
  return run($query);
}

function delete_data($id){
  $query = "DELETE FROM blog WHERE id = $id";
  return run($query);
}

function run($query){
  global $link;

  if(mysqli_query($link, $query)) return true;
  else return false;
}

function excerp($string){
  $string = substr($string, 0, 10);
  return $string."...";
}


?>
