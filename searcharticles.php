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
  $articles = $table->sortByDate();
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
  <title>Search Articles</title>
</head>
<body>
  <?php
  include 'navbar.php'
  ?>
  <div class="container">
    <div id="searcharticlemain" class="col-md-offset-1 col-md-10">
      <div id="articlesearch" class="panel-info">
        <div class="panel-heading"><b>Search Articles</b></div>
        <div class="panel-body">
          <div id="articlesearchform">
            <script type="text/javascript" src="js/jquery.min.js"></script>
            <script type="text/javascript" src="js/searcharticles.js"></script>
            <b>Search articles&nbsp;&nbsp;</b>
            <input id="articlesearchdata" name="articlesearch" type="text"/>&nbsp;
            <input type="submit" name="submit" id="submit" value="Search Articles" onclick="SearchArticles(articlesearchdata.value)"/>
          </div>
          <div id="articlesearchresults">
            <div id="articlesearchresultstitle">
            </br></br><h3>Search Results</h3>
          </div>
          <div id="searchresultdata">

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>

