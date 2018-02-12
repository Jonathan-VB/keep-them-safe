<?php
    class Article {
        private $articleId;
        private $articleTitle;
        private $articleContent;
        private $articleDateCreated;
        private $articleTags;

        public function __construct($aId, $aT, $aC, $aDC, $aTgs) {
            $this->articleId = $aId;
            $this->articleTitle = $aT;
            $this->articleContent = $aC;
            $this->articleDateCreated = $aDC;
            $this->articleTags = $aTgs;
        }

        public function getArticleId() { return $this->articleId; }
        public function getArticleTitle() { return $this->articleTitle; }
        public function getArticleContent() { return $this->articleContent; }
        public function getArticleDateCreated() { return $this->articleDateCreated; }
        public function getArticleTags() { return $this->articleTags; }
        
        public function setArticleId($aId) { $this->articleId = $aId; }
        public function setArticleTitle($aT) { $this->articleTitle = $aT; }
        public function setArticleContent($aC) { $this->articleContent = $aC; }
        public function setArticleDateCreated($aDC) { $this->articleDateCreated = $aDC; }
        public function setArticleTags($aTgs) { $this->articleTags = $aTgs; }
    }
?>