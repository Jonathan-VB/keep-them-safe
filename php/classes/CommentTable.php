<?php

require_once 'Comment.php';

class CommentTable {

    const TABLE_NAME = "comments";
    const COLUMN_COMMENT_ID = "commentId";
    const COLUMN_COMMENT_TEXT = "commentText";
    const COLUMN_TOPIC_ID = "topicId";

    private $mConnection;

    public function __construct($connection) {
        $this->mConnection = $connection;
    }

    public function __destruct() {
        $this->mConnection = null;
    }

    public function insert($comment) {
        // construct the SQL INSERT statement using named placeholders
        $sql = "INSERT INTO " . CommentTable::TABLE_NAME . "(" .
                CommentTable::COLUMN_COMMENT_TEXT . ", " .
                CommentTable::COLUMN_TOPIC_ID . ") " .
                "VALUES (:commentText, :topicId)";

        // the values for the named placeholders in the SQL INSERT statement
        $params = array(
            'commentText' => $comment->getCommentText(),
            'topicId' => $comment->getTopicId()
        );

        // prepare the statement for execution and execute it
        $stmt = $this->mConnection->prepare($sql);
        $status = $stmt->execute($params);

        // if an error occurred while executing the query then throw an exception
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not save comment: " . $errorInfo[2]);
        }

        // retrieve the id assigned to the inserted table row
        $id = $this->mConnection->lastInsertId(CommentTable::TABLE_NAME);

        // return the id assigned to the inserted table row
        return $id;

    }


    public function delete($commentId) {
        $sql = "DELETE FROM " . CommentTable::TABLE_NAME .
               " WHERE " . CommentTable::COLUMN_COMMENT_ID . " = :commentId";

        $params = array('commentId' => $commentId);

        $stmt = $this->mConnection->prepare($sql);
        $status = $stmt->execute($params);

        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not delete Comment: " . $errorInfo[2]);
        }

        return $stmt->rowCount();
    }


    public function findById($topicId) {
        $sql = "SELECT * FROM " . CommentTable::TABLE_NAME .
               " WHERE " . CommentTable::COLUMN_TOPIC_ID . " = :topicId";

        $params = array('topicId' => $topicId);

        $stmt = $this->mConnection->prepare($sql);
        $status = $stmt->execute($params);

        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve Comment: " . $errorInfo[2]);
        }

        $comments = array();
        $row = $stmt->fetch();
        while($row != null){
            $commentId = $row[CommentTable::COLUMN_COMMENT_ID];
            $commentText = $row[CommentTable::COLUMN_COMMENT_TEXT];
            $topicId = $row[CommentTable::COLUMN_TOPIC_ID];

            $comment = new Comment($commentId ,$commentText, $topicId);
            $comments[$commentId] = $comment;
            $row = $stmt->fetch();
        }

        return $comments;
    }
    
    public function findCommentById($commentId) {
        $sql = "SELECT * FROM " . CommentTable::TABLE_NAME .
               " WHERE " . CommentTable::COLUMN_COMMENT_ID . " = :commentId";

        $params = array('commentId' => $commentId);

        $stmt = $this->mConnection->prepare($sql);
        $status = $stmt->execute($params);

        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve Comment: " . $errorInfo[2]);
        }


        $comment = null;
        if($stmt->rowCount() == 1){
            $row = $stmt->fetch();
            $commentText = $row[CommentTable::COLUMN_COMMENT_TEXT];
            $topicId = $row[CommentTable::COLUMN_TOPIC_ID];

            $comment = new Comment($commentId ,$commentText, $topicId);
        }

        return $comment;
    }

    public function findAll() {
        $sql = "SELECT * FROM " . CommentTable::TABLE_NAME;

        $stmt = $this->mConnection->prepare($sql);
        $status = $stmt->execute();

        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve Comments: " . $errorInfo[2]);
        }

        $comments = array();
        $row = $stmt->fetch();
        while ($row != null) {
            $commentId = $row[CommentTable::COLUMN_COMMENT_ID];
            $commentText = $row[CommentTable::COLUMN_COMMENT_TEXT];
            $topicId = $row[CommentTable::COLUMN_TOPIC_ID];

            $comment = new Comment($commentId, $commentText, $topicId);
            $comments[$commentId] = $comment;

            $row = $stmt->fetch();
        }

        return $comments;
    }


    public function findByTopicId($topicId) {
        $sql = "SELECT * FROM " . CommentTable::TABLE_NAME .
               " WHERE " . CommentTable::COLUMN_TOPIC_ID . " = :topicId";

        $params = array('topicId' => $topicId);
        $stmt = $this->mConnection->prepare($sql);
        $status = $stmt->execute($params);

        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve Comments: " . $errorInfo[2]);
        }

        $comments = array();
        $row = $stmt->fetch();
        while ($row != null) {
            $commentId = $row[CommentTable::COLUMN_COMMENT_ID];
            $commentText = $row[CommentTable::COLUMN_COMMENT_TEXT];
            $topicId = $row[CommentTable::COLUMN_TOPIC_ID];

            $comment = new Comment($topicId, $commentText, $topicId);
            $comments[$commentId] = $comment;

            $row = $stmt->fetch();
        }

        return $comments;
    }
}

?>