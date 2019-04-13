<?php
require_once "core/init.php";

$admin = $login = false;

if(isset($_SESSION['user'])){
  $login = true;
  if(check_role($_SESSION['user']) == 1){
    $admin = true;
  }
}

$articles = show();
$total = show_count();
$perPage =  perPage();

$pages = ceil($total/$perPage);

if(isset($_GET['search'])){
  $articles = search_result($_GET['search']);
}

require_once "view/header.php";
?>

<form class="" action="" method="get">
  <input type="search" name="search" placeholder="Search title"><br><br>
</form>

<?php while($row = mysqli_fetch_assoc($articles)): ?>
  <div class="each_article">
    <h3> <a href="single.php?id=<?=$row['id']?>"><?=$row['title']?></a></h3>
    <p><?=excerp($row['content'])?></p>
    <p class="time"><?=$row['time']?></p>
    <p class="tag">Tag : <?=$row['tag']?></p>

    <?php if($login): ?>
      <a href="edit.php?id=<?=$row['id']?>">Edit</a>
    <?php endif ?>

    <?php if($admin): ?>
      <a href="delete.php?id=<?=$row['id']?>">Delete</a>
    <?php endif ?>
  </div>
<?php endwhile ?>

<div class="">
  <?php for($i=1; $i<=$pages; $i++){ ?>
    <a href="?page=<?=$i?>"><?=$i?></a>
  <?php } ?>
</div>

<?php
require_once "view/footer.php";
?>
