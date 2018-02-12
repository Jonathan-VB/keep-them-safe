<?php
session_start();
if (isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
    if ($role !== "Admin" &&  $role !== "Content") {
     header("Location: noaccess.php");
 }
}
elseif (!isset($role)) {
    header("Location: noaccess.php");
}
require_once 'php/classes/DB.php';
require_once 'php/classes/PendingArticleTable.php';
require_once 'php/classes/Article.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include 'header.php';
    ?>
    <title>Create New Article</title>
    <script type="text/javascript">
    tinymce.init({mode : "exact",
        elements : "textarea1",
        theme_advanced_toolbar_location : "top",
        theme_advanced_statusbar_location : "bottom",
        plugins: "media link image emoticons table textcolor wordcount example fullscreen advlist hr preview lists fullpage",
        image_advtab: true,
        tools: "inserttable",
        browser_spellcheck : true,
        spellchecker_language: 'sv_SE',
        valid_styles : {'*' : 'color,font-size,font-weight,font-style,text-decoration'},
        theme_advanced_resizing : true});
    </script>
</head>
<body>
    <?php
    include 'navbar.php'
    ?>
    <div class="container">
        <div id="contentsubmit">
            <div id="contentaddarticleform" class="col-md-offset-2 col-md-8">
                <h3>Create New Article</h3></br>
                <p class="warning"><p></br></br>
                    <form action="php/contentaddarticle.php" method="post">
                        <label>Article Header/Title</label></br>
                        <input type="text" name="articltTitle" class="form-control" value="<?php if (isset($_POST) && isset($_POST['articltTitle'])) { echo $_POST['articltTitle'];}?>"/>
                        <span class="error"><?php if (isset($_GET['noarticletitle'])) {echo $_GET['noarticletitle'];} ?></span></br></br>
                        
                        <label>Article Header/Title</label>  </br> 
                        <textarea id="textarea1" type="text" name="articleContent" class="form-control" rows="20" value="<?php if (isset($_POST) && isset($_POST['articleContent'])) { echo $_POST['articleContent'];}?>"/></textarea>
                        <span class="error"><?php if (isset($_GET['noarticlecontent'])) {echo $_GET['noarticlecontent'];} ?></span></br></br>
                        
                        <label>Article Tags (Use keywords that users will be able to search)</label></br>  
                        <textarea  type="text" name="articleTags" class="form-control" rows="3" placeholder="Seperate tags by using spaces eg: facebook video notifications how to turn off" value="<?php if (isset($_POST) && isset($_POST['articleTags'])) {echo $_POST['articleTags'];}?>"/></textarea>
                        <span class="error"><?php if (isset($_GET['noarticletags'])) {echo $_GET['noarticletags'];} ?></span></br></br>
                        <input type="submit" class="btn btn-success" value="Create Article"/>&nbsp;<span class="success"><?php if (isset($_GET['success'])) {echo $_GET['success'];} ?></span>
                    </form>
                </div>
            </div>
        </div>
    </body>
    </html>

