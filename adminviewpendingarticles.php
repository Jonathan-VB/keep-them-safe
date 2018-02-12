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
    <title>Admin - View Pending Articles</title>
</head>
<body>
    <?php
    include 'navbar.php'
    ?>
    <div class="container">
        <div id="adminarticleslist" class="col-md-offset-1 col-md-10">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date Created</th>
                        <th>Article Title</th>
                    </tr>
                </thead>
                <tbody>  
                    <?php
                    foreach ($articles as $article) {
                        $articleId = $article->getArticleId();
                        $articleDateCreated = $article->getArticleDateCreated() ;
                        $articleTitle = $article->getArticleTitle();

                        echo "<tr>"."<td>".$articleId."</td>"."<td>".$articleDateCreated."</td>"."<td><a href='adminviewpendingarticle.php?id=".$articleId."'>".$articleTitle."</a></td>"."</tr>";
                    }
                    ?>
                </tbody> 
            </table>
        </div>
    </div>
</body>
</html>
