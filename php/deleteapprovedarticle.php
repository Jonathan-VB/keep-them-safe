<?php
require_once 'php/classes/DB.php';
require_once 'php/classes/ArticleTable.php';
require_once 'php/classes/Article.php';

$errors = array();

if (isset($_GET["articleId"]) && $_GET["articleId"] !== "") {
    $articleId = $_GET["articleId"];
}
else {
    $errors['articleId'] = "Id is required";
}

if (empty($errors)) {
    try {
        ini_set("display_errors", 1);

        $conn = DB::getConnection();

        $table = new ArticleTable($conn);
        $article = $table->findByArticleId($articleId);
        if ($article != null) {
            $table->delete($articleId);
            header("Location: index.php");
        }
        else {
            $errors['articleId'] = "Article ID not found";
            require "index.php";
        }
        
    }
    catch (PDOException $e) {
        $conn = null;
        exit("Connection failed: " . $e->getMessage());
    }
}
else {
    require "index.php";
}
?>