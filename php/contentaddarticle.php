<?php
require_once 'classes/DB.php';
require_once 'classes/PendingArticleTable.php';
require_once 'classes/Article.php';

$errors = array();
if (isset($_POST['articltTitle']) && $_POST['articltTitle'] !== "") {
    $articltTitle = $_POST["articltTitle"];
}
else {
    header("Location: ../contentaddarticleform.php?noarticletitle=No Article Title");
}

if (isset($_POST['articleContent']) && $_POST['articleContent'] !== "") {
    $articleContent = $_POST["articleContent"];
}
else {
    header("Location: ../contentaddarticleform.php?noarticlecontent=No Article Content");
}

$articleDateCreated = date("d-m-y",time());

if (isset($_POST['articleTags']) && $_POST['articleTags'] !== "") {
    $articleTags = $_POST["articleTags"];
}
else {
    header("Location: ../contentaddarticleform.php?noarticletags=No Article Tags");
}

if (empty($errors)) {
    try {
        ini_set("display_errors", 1);

        $conn = DB::getConnection();

        $table = new ArticleTable($conn);
        $article = new Article(-1, $articltTitle, $articleContent, $articleDateCreated, $articleTags);
        $articleId = $table->insert($article);
        $article->setArticleId($articleId);

        //require "index.php";
        header("Location: ../contentaddarticleform.php?success=Article Added");
    }
    catch (PDOException $e) {
        $conn = null;
        exit("Connection failed: " . $e->getMessage());
    }
}
else {
    header("Location: ../contentaddarticleform.php");
}
?>
