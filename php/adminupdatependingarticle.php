<?php
require_once 'classes/DB.php';
require_once 'classes/PendingArticleTable.php';
require_once 'classes/Article.php';

$errors = array();

$articleId = $_POST["articleId"];


if (isset($_POST['articleTitle']) && $_POST['articleTitle'] !== "") {
    $articleTitle = $_POST["articleTitle"];
}
else {
    $errors['articleTitle'] = "Article Title must not be blank";
}

if (isset($_POST['articleContent']) && $_POST['articleContent'] !== "") {
    $articleContent = $_POST["articleContent"];
}
else {
    $errors['articleContent'] = "Article body must not be blank";
}

if (isset($_POST['articleTags']) && $_POST['articleTags'] !== "") {
    $articleTags = $_POST["articleTags"];
}
else {
    $errors['articleTags'] = "Article body must not be blank";
}

$articleDateCreated = $_POST["articleDateCreated"];


if (empty($errors)) {
    try {
        ini_set("display_errors", 1);

        $conn = DB::getConnection();

        $table = new ArticleTable($conn);
        $article = new Article($articleId, $articleTitle, $articleContent, $articleDateCreated, $articleTags);
        $table->update($article);
        
        header("Location: ../adminviewpendingarticles.php");
    }
    catch (PDOException $e) {
        $conn = null;
        exit("Connection failed: " . $e->getMessage());
    }
}
else {
    require "update_article_form.php";
}
?>
