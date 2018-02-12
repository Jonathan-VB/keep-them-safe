<?php
require_once 'classes/DB.php';
require_once 'classes/PendingArticleTable.php';
require_once 'classes/Article.php';

$errors = array();

$articleId = $_POST["articleId"];

if (empty($errors)) {
    try {
        ini_set("display_errors", 1);

        $conn = DB::getConnection();

        $table = new ArticleTable($conn);
        $article = $table->findByArticleId($articleId);
        if ($article != null) {
            $table->delete($articleId);
            header("Location: ../adminviewpendingarticles.php");
        }
        else {
            $errors['articleId'] = "Article ID not found";
            header("Location: ../adminviewpendingarticles.php");
        }
        
    }
    catch (PDOException $e) {
        $conn = null;
        exit("Connection failed: " . $e->getMessage());
    }
}
else {
    require "../index.php";
}
?>