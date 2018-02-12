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

    $articleId = $_REQUEST['articleId'];
    
    $conn = DB::getConnection();

    $table = new ArticleTable($conn);
    $article= $table->findByArticleId($articleId);
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
    <title>Admin - Edit Article</title>
</head>
<body>
    <?php
    include 'navbar.php'
    ?>
    <div class="container">
      <div id="indexmain">
        <form action="php/adminupdatependingarticle.php" method="post">
            <input type="hidden" name="articleId" value="<?php
            if (isset($_POST) && isset($_POST['articleId'])) {
                echo $_POST['articleId'];
            }
            else {
                echo $article->getarticleId();
            }
            ?>" />
            <table>
                <tr>
                    <td>Article Title</td>
                    <td>
                        <input type="text" name="articleTitle" value="<?php
                        if (isset($_POST) && isset($_POST['articleTitle'])) {
                            echo $_POST['articleTitle'];
                        }
                        else {
                            echo $article->getArticleTitle();
                        }
                        ?>" />
                        <?php 
                        if (isset($errors) && isset($errors['articleTitle'])) {
                            echo "<span>" . $errors['articleTitle'] . "</span>";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Article Content</td>
                    <td>
                        <textarea name="articleContent"><?php
                        if (isset($_POST) && isset($_POST['articleContent'])) {
                            echo $_POST['articleContent'];
                        }
                        else {
                            echo $article->getArticleContent();
                        }
                        ?></textarea>
                        <?php 
                        if (isset($errors) && isset($errors['articleContent'])) {
                            echo "<span>" . $errors['articleContent'] . "</span>";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Article Tags - Seperate with spaces</td>
                    <td>
                        <textarea name="articleTags"><?php
                        if (isset($_POST) && isset($_POST['articleTags'])) {
                            echo $_POST['articleTags'];
                        }
                        else {
                            echo $article->getArticleTags();
                        }
                        ?></textarea>
                        <?php 
                        if (isset($errors) && isset($errors['articleTags'])) {
                            echo "<span>" . $errors['articleTags'] . "</span>";
                        }
                        ?>
                    </td>
                </tr>
            </table>
            <input type="hidden" name="articleDateCreated" value="<?php
            if (isset($_POST) && isset($_POST['articleDateCreated'])) {
                echo $_POST['articleDateCreated'];
            }
            else {
                echo $article->getarticleDateCreated();
            }
            ?>" />
            <p><input type="submit" value="Update Article" /></p>
        </form>
    </div>
</div>
</body>
</html>
