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

  $id = $_REQUEST['id'];

  $conn = DB::getConnection();

  $ArticleTable = new ArticleTable($conn);
  $article = $ArticleTable->findByArticleId($id);

  
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
  <title><?php echo $article->getArticleTitle();?></title>
</head>
<body>
  <?php
  include 'navbar.php'
  ?>
  <div class="container">
    <div id="viewarticlemain" >       
      <div id="articletitle" class="col-md-8 col-md-offset-2">
        <h3><?php echo $article->getArticleTitle(); ?></h3>
      </div>
      <div id="articlebody" class="col-md-8 col-md-offset-2"> 
        <p><?php echo $article->getArticleContent(); ?></p>
      </div>
    </div>
  </div>
</body>
</html>