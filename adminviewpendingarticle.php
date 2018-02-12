<?php
session_start();
if ($_SESSION['role'] != "Admin") {
    header("Location: noaccess.php");
}
require_once 'php/classes/DB.php';
require_once 'php/classes/PendingArticleTable.php';
require_once 'php/classes/Article.php';

try {
    ini_set("display_errors", 1);

    $articleId = $_REQUEST['id'];

    $conn = DB::getConnection();

    $ArticleTable = new ArticleTable($conn);
    $article = $ArticleTable->findByArticleId($articleId);

    
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
    <title>Admin - Approve Article</title>
</head>
<body>
    <?php
    include 'navbar.php'
    ?>
    <div class="container">
        <div id="adminapprovependingarticle" class="col-md-offset-1 col-md-10">
            <label>Article Title</label></br>
            <?php echo $article->getArticleTitle(); ?></br></br>

            <label>Article Content</label></br>
            <?php echo $article->getArticleContent(); ?></br></br>

            <label>Article Tags</label></br>
            <?php echo $article->getArticleTags(); ?></br></br>

            <label>Article Date Created</label></br>
            <?php echo $article->getArticleDateCreated(); ?></br></br>
            <form action="php/adminapprovearticle.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="articleId" value="<?php if (isset($_POST) && isset($_POST['articleId'])) {echo $_POST['articleId'];} else {echo $article->getarticleId();}?>" />
                <input type="submit" name="submit" class="btn btn-success"  value="Approve Article"/>
            </form></br>
            <form action="php/adminrejectarticle.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="articleId" value="<?php if (isset($_POST) && isset($_POST['articleId'])) {echo $_POST['articleId'];} else {echo $article->getarticleId();}?>" />
                <input type="submit" name="submit" class="btn btn-danger"  value="Reject Article"/>
            </form>
        </div>
    </div>
</body>
</html>

