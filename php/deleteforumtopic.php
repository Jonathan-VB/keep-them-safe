<?php
require_once 'classes/DB.php';
require_once 'classes/TopicTable.php';
require_once 'classes/Topic.php';

$topicId = $_POST["topicId"];

    try {
        ini_set("display_errors", 1);

        $conn = DB::getConnection();

        $table = new TopicTable($conn);
        $topic = $table->findByTopicId($topicId);
        if ($topic != null) {
            $table->delete($topicId);
            header("Location: ../adminforum.php");
        }
        else {
            $errors['topicId'] = "Topic ID not found";
            require "index.php";
        }
        
    }
    catch (PDOException $e) {
        $conn = null;
        exit("Connection failed: " . $e->getMessage());
    }
?>