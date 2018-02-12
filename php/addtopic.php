<?php
require_once 'classes/DB.php';
require_once 'classes/TopicTable.php';
require_once 'classes/Topic.php';


$errors = array();
if (isset($_POST['topicTitle']) && $_POST['topicTitle'] !== "") {
    $topicTitle = $_POST["topicTitle"];
}
else {
    $errors['topicTitle'] = "Name of Course must not be empty!";
}

$errors = array();
if (isset($_POST['topicContent']) && $_POST['topicContent'] !== "") {
    $topicContent = $_POST["topicContent"];
}
else {
    $errors['topicContent'] = "Course Code must not be empty!";
}

$topicDateCreated = date("d-m-y",time());

if (empty($errors)) {
    try {
        ini_set("display_errors", 1);

        $conn = DB::getConnection();

        $table = new TopicTable($conn);
        $topic = new Topic(-1, $topicTitle, $topicContent, $topicDateCreated);
        $topicId = $table->insert($topic);
        $topic->setTopicId($topicId);

        //require "index.php";
        header("Location: ../forum.php");
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
