<?php
    class Comment {
        private $commentId;
        private $commentText;
        private $topicId;

        public function __construct($cId, $cT, $tId) {
            $this->commentId = $cId;
            $this->commentText = $cT;
            $this->topicId = $tId;
        }
        public function getCommentId() { return $this->commentId; }
        public function getCommentText() { return $this->commentText; }
        public function getTopicId() { return $this->topicId; }

        public function setCommentId($cId) { $this->commentId = $cId; }
        public function setCommentText($cT) { $this->commentText = $cT; }
    }
?>