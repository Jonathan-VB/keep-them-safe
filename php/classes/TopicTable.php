<?php
require_once 'Topic.php';

class TopicTable {

    const TABLE_NAME = "topics";
    const COLUMN_TOPIC_ID = "topicId";
    const COLUMN_TOPIC_TITLE = "topicTitle";
    const COLUMN_TOPIC_CONTENT = "topicContent";
    const COLUMN_TOPIC_DATE_CREATED = "topicDateCreated";

    private $mConnection;

    public function __construct($connection) {
        $this->mConnection = $connection;
    }

    public function __destruct() {
        $this->mConnection = null;
    }


    public function insert($topic) {
        $sql = "INSERT INTO " . TopicTable::TABLE_NAME . "(" .
                TopicTable::COLUMN_TOPIC_TITLE . ", " .
                TopicTable::COLUMN_TOPIC_CONTENT . ", " .
                TopicTable::COLUMN_TOPIC_DATE_CREATED . ") " .

                "VALUES (:topicTitle, :topicContent, :topicDateCreated)";

        $params = array(
            'topicTitle' => $topic->getTopicTitle(),
            'topicContent' => $topic->getTopicContent(),
            'topicDateCreated' => $topic->getTopicDateCreated()
        );

        $stmt = $this->mConnection->prepare($sql);
        $status = $stmt->execute($params);

        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not save Topic: " . $errorInfo[2]);
        }

        $topicId = $this->mConnection->lastInsertId(TopicTable::TABLE_NAME);

        return $topicId;
    }


    public function delete($topicId) {
        $sql = "DELETE FROM " . TopicTable::TABLE_NAME .
               " WHERE " . TopicTable::COLUMN_TOPIC_ID . " = :topicId";

        $params = array('topicId' => $topicId);

        $stmt = $this->mConnection->prepare($sql);
        $status = $stmt->execute($params);

        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not delete Topic: " . $errorInfo[2]);
        }

        return $stmt->rowCount();
    }


    public function findByTopicId($topicId) {
        $sql = "SELECT * FROM " . TopicTable::TABLE_NAME .
               " WHERE " . TopicTable::COLUMN_TOPIC_ID . " = :topicId";

        $params = array('topicId' => $topicId);

        $stmt = $this->mConnection->prepare($sql);
        $status = $stmt->execute($params);

        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve Topic: " . $errorInfo[2]);
        }

        $topic = null;
        if ($stmt->rowCount() == 1) {
            $row = $stmt->fetch();
            $topicTitle = $row[TopicTable::COLUMN_TOPIC_TITLE];
            $topicContent = $row[TopicTable::COLUMN_TOPIC_CONTENT];
            $topicDateCreated = $row[TopicTable::COLUMN_TOPIC_DATE_CREATED];

            $topic = new Topic($topicId, $topicTitle, $topicContent, $topicDateCreated);
        }

        return $topic;
    }


    public function findAll() {
        $sql = "SELECT * FROM " . TopicTable::TABLE_NAME . " ORDER BY " . TopicTable::COLUMN_TOPIC_ID . " DESC ";

        $stmt = $this->mConnection->prepare($sql);
        $status = $stmt->execute();

        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve Topics: " . $errorInfo[2]);
        }

        $topics = array();
        $row = $stmt->fetch();
        while ($row != null) {
            $topicId = $row[TopicTable::COLUMN_TOPIC_ID];
            $topicTitle = $row[TopicTable::COLUMN_TOPIC_TITLE];
            $topicContent = $row[TopicTable::COLUMN_TOPIC_CONTENT];
            $topicDateCreated = $row[TopicTable::COLUMN_TOPIC_DATE_CREATED];

            $topic = new Topic($topicId, $topicTitle, $topicContent, $topicDateCreated);
            $topics[$topicId] = $topic;

            $row = $stmt->fetch();
        }

        return $topics;
    }

}

?>