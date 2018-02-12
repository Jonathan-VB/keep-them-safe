<?php
    class Topic {
        private $topicId;
        private $topicTitle;
        private $topicContent;
        private $topicDateCreated;

        public function __construct($tId, $tT, $tC, $tDC){
            $this->topicId = $tId;
            $this->topicTitle = $tT;
            $this->topicContent = $tC;
            $this->topicDateCreated = $tDC;
        }

        public function getTopicId() { return $this->topicId; }
        public function getTopicTitle() { return $this->topicTitle; }
        public function getTopicContent() { return $this->topicContent; }
        public function getTopicDateCreated() { return $this->topicDateCreated; }
        
        public function setTopicId($tId) { $this->topicId = $tId; }
        public function setTopicTitle($tT) { $this->topicTitle = $tT; }
        public function setTopicContent($tC) { $this->topicContent = $tC; }
        public function setTopicDateCreated($tDC) { $this->topicDateCreated = $tDC; }
    }
?>