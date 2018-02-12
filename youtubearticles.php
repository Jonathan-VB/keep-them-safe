<?php
session_start();
if (isset($_SESSION['role'])) {
  $role = $_SESSION['role'];
  if ($role !== "Admin" &&  $role !== "Content" && $role !== "User") {
   header("Location: noaccess.php");
 }
}
elseif (!isset($role)) {
  header("Location: noaccess.php");
}
require_once 'php/classes/DB.php';
require_once 'php/classes/ApprovedArticleTable.php';
require_once 'php/classes/Article.php';

try {
  ini_set("display_errors", 1);

  $conn = DB::getConnection();
  $table = new ArticleTable($conn);
  $articles = $table->findAllYouTube();
}

catch (PDOException $e) {
  $conn = null;
  exit("Connection failed: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  include 'header.php';
  ?>
  <title>YouTube Articles</title>
</head>
<body>
  <?php
  include 'navbar.php'
  ?>
  <div class="container">
    <div id="articlemain" class="col-md-offset-2 col-md-8">
      <div id="articlelist" class="panel-info">
        <div class="panel-heading"><b>YouTube Articles</b></div>
        <div class="panel-body">
          <?php
          foreach ($articles as $article) {
            echo '<div class="caption"><h4>'.'<a href = "viewarticle.php?id='.$article->getArticleId().'">'.$article->getArticleTitle().'</a></h4></div>';
            echo substr($article->getArticleContent(), 0,400).'.....'.'</br></br></br>';
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

