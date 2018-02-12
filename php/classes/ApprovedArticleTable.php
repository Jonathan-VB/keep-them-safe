<?php

require_once 'Article.php';

class ArticleTable {

    const TABLE_NAME = "approvedarticles";
    const COLUMN_ARTICLE_ID = "articleId";
    const COLUMN_ARTICLE_TITLE = "articleTitle";
    const COLUMN_ARTICLE_CONTENT = "articleContent";
    const COLUMN_ARTICLE_DATE_CREATED = "articleDateCreated";
    const COLUMN_ARTICLE_TAGS = "articleTags";

    private $mConnection;

    public function __construct($connection) {
        $this->mConnection = $connection;
    }

    public function __destruct() {
        $this->mConnection = null;
    }


    public function insert($article) {
        $sql = "INSERT INTO " . ArticleTable::TABLE_NAME . "(" .
                ArticleTable::COLUMN_ARTICLE_TITLE . ", " .
                ArticleTable::COLUMN_ARTICLE_CONTENT . ", " .
                ArticleTable::COLUMN_ARTICLE_DATE_CREATED . ", " .
                ArticleTable::COLUMN_ARTICLE_TAGS . ")".

                "VALUES (:articleTitle, :articleContent, :articleDateCreated, :articleTags)";

        $params = array(
            'articleTitle' => $article->getArticleTitle(),
            'articleContent' => $article->getArticleContent(),
            'articleDateCreated' => $article->getArticleDateCreated(),
            'articleTags' => $article->getArticleTags()
        );

        $stmt = $this->mConnection->prepare($sql);
        $status = $stmt->execute($params);

        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not save article: " . $errorInfo[2]);
        }

        $articleId = $this->mConnection->lastInsertId(ArticleTable::TABLE_NAME);

        return $articleId;
    }


    public function delete($articleId) {
        $sql = "DELETE FROM " . ArticleTable::TABLE_NAME .
               " WHERE " . ArticleTable::COLUMN_ARTICLE_ID . " = :articleId";

        $params = array('articleId' => $articleId);

        $stmt = $this->mConnection->prepare($sql);
        $status = $stmt->execute($params);

        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not delete Article: " . $errorInfo[2]);
        }

        return $stmt->rowCount();
    }


     public function update($article) {
        // construct the SQL UPDATE statement with named placeholders for the book details
        $sql = "UPDATE " . ArticleTable::TABLE_NAME . " SET " .
                    ArticleTable::COLUMN_ARTICLE_TITLE . " = :articleTitle, " .
                    ArticleTable::COLUMN_ARTICLE_CONTENT . " = :articleContent, " .
                    ArticleTable::COLUMN_ARTICLE_DATE_CREATED. " = :articleDateCreated " .
                    ArticleTable::COLUMN_ARTICLE_TAGS. " = :articleTags " .
                "WHERE " . ArticleTable::COLUMN_ARTICLE_ID . " = :articleId";

        // the values for the named placeholders in the SQL UPDATE statement
        $params = array(
            'articleId' => $article->getArticleId(),
            'articleTitle' => $article->getArticleTitle(),
            'articleContent' => $article->getArticleContent(),
            'articleDateCreated' => $article->getArticleDateCreated(),
            'articleTags' => $article->getArticleTags()
        );

        // prepare the statement for execution and execute it
        $stmt = $this->mConnection->prepare($sql);
        $status = $stmt->execute($params);

        // if an error occurred while executing the query then throw an exception
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not update article: " . $errorInfo[2]);
        }

        // return the number of rows updated by the SQL UPDATE statement
        return $stmt->rowCount();
    }


    public function findByArticleId($articleId) {
        $sql = "SELECT * FROM " . ArticleTable::TABLE_NAME .
               " WHERE " . ArticleTable::COLUMN_ARTICLE_ID . " = :articleId";

        $params = array('articleId' => $articleId);

        $stmt = $this->mConnection->prepare($sql);
        $status = $stmt->execute($params);

        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve article: " . $errorInfo[2]);
        }

        $article = null;
        if ($stmt->rowCount() == 1) {
            $row = $stmt->fetch();
            $articleTitle = $row[ArticleTable::COLUMN_ARTICLE_TITLE];
            $articleContent = $row[ArticleTable::COLUMN_ARTICLE_CONTENT];
            $articleDateCreated = $row[ArticleTable::COLUMN_ARTICLE_DATE_CREATED];
            $articleTags = $row[ArticleTable::COLUMN_ARTICLE_TAGS];

            $article = new Article($articleId, $articleTitle, $articleContent, $articleDateCreated, $articleTags);
        }

        return $article;
    }


    public function findAll() {
        $sql = "SELECT * FROM " . ArticleTable::TABLE_NAME;

        $stmt = $this->mConnection->prepare($sql);
        $status = $stmt->execute();

        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve article: " . $errorInfo[2]);
        }

        $articles = array();
        $row = $stmt->fetch();
        while ($row != null) {
            $articleId = $row[ArticleTable::COLUMN_ARTICLE_ID];
            $articleTitle = $row[ArticleTable::COLUMN_ARTICLE_TITLE];
            $articleContent = $row[ArticleTable::COLUMN_ARTICLE_CONTENT];
            $articleDateCreated = $row[ArticleTable::COLUMN_ARTICLE_DATE_CREATED];
            $articleTags = $row[ArticleTable::COLUMN_ARTICLE_TAGS];

            $article = new Article($articleId, $articleTitle, $articleContent, $articleDateCreated, $articleTags);
            $articles[$articleId] = $article;

            $row = $stmt->fetch();
        }

        return $articles;
    }

    public function findAllFacebook() {
        $sql = "SELECT * FROM `approvedarticles` WHERE `articleTags` LIKE '%facebook%' OR `articleTitle` LIKE '%facebook%' ORDER BY `articleId` DESC";

        $stmt = $this->mConnection->prepare($sql);
        $status = $stmt->execute();

        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve article: " . $errorInfo[2]);
        }

        $articles = array();
        $row = $stmt->fetch();
        while ($row != null) {
            $articleId = $row[ArticleTable::COLUMN_ARTICLE_ID];
            $articleTitle = $row[ArticleTable::COLUMN_ARTICLE_TITLE];
            $articleContent = $row[ArticleTable::COLUMN_ARTICLE_CONTENT];
            $articleDateCreated = $row[ArticleTable::COLUMN_ARTICLE_DATE_CREATED];
            $articleTags = $row[ArticleTable::COLUMN_ARTICLE_TAGS];

            $article = new Article($articleId, $articleTitle, $articleContent, $articleDateCreated, $articleTags);
            $articles[$articleId] = $article;

            $row = $stmt->fetch();
        }

        return $articles;
    }

    public function findAllYouTube() {
        $sql = "SELECT * FROM `approvedarticles` WHERE `articleTags` LIKE '%youtube%' OR `articleTitle` LIKE '%youtube%' ORDER BY `articleId` DESC";

        $stmt = $this->mConnection->prepare($sql);
        $status = $stmt->execute();

        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve article: " . $errorInfo[2]);
        }

        $articles = array();
        $row = $stmt->fetch();
        while ($row != null) {
            $articleId = $row[ArticleTable::COLUMN_ARTICLE_ID];
            $articleTitle = $row[ArticleTable::COLUMN_ARTICLE_TITLE];
            $articleContent = $row[ArticleTable::COLUMN_ARTICLE_CONTENT];
            $articleDateCreated = $row[ArticleTable::COLUMN_ARTICLE_DATE_CREATED];
            $articleTags = $row[ArticleTable::COLUMN_ARTICLE_TAGS];

            $article = new Article($articleId, $articleTitle, $articleContent, $articleDateCreated, $articleTags);
            $articles[$articleId] = $article;

            $row = $stmt->fetch();
        }

        return $articles;
    }

    public function findAllTwitter() {
        $sql = "SELECT * FROM `approvedarticles` WHERE `articleTags` LIKE '%twitter%' OR `articleTitle` LIKE '%twitter%' ORDER BY `articleId` DESC";

        $stmt = $this->mConnection->prepare($sql);
        $status = $stmt->execute();

        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve article: " . $errorInfo[2]);
        }

        $articles = array();
        $row = $stmt->fetch();
        while ($row != null) {
            $articleId = $row[ArticleTable::COLUMN_ARTICLE_ID];
            $articleTitle = $row[ArticleTable::COLUMN_ARTICLE_TITLE];
            $articleContent = $row[ArticleTable::COLUMN_ARTICLE_CONTENT];
            $articleDateCreated = $row[ArticleTable::COLUMN_ARTICLE_DATE_CREATED];
            $articleTags = $row[ArticleTable::COLUMN_ARTICLE_TAGS];

            $article = new Article($articleId, $articleTitle, $articleContent, $articleDateCreated, $articleTags);
            $articles[$articleId] = $article;

            $row = $stmt->fetch();
        }

        return $articles;
    }

    public function sortByDate() {
        $sql = "SELECT * FROM " . ArticleTable::TABLE_NAME . " ORDER BY " . ArticleTable::COLUMN_ARTICLE_ID . " DESC ";

        $stmt = $this->mConnection->prepare($sql);
        $status = $stmt->execute();

        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve article: " . $errorInfo[2]);
        }

        $articles = array();
        $row = $stmt->fetch();
        while ($row != null) {
            $articleId = $row[ArticleTable::COLUMN_ARTICLE_ID];
            $articleTitle = $row[ArticleTable::COLUMN_ARTICLE_TITLE];
            $articleContent = $row[ArticleTable::COLUMN_ARTICLE_CONTENT];
            $articleDateCreated = $row[ArticleTable::COLUMN_ARTICLE_DATE_CREATED];
            $articleTags = $row[ArticleTable::COLUMN_ARTICLE_TAGS];

            $article = new Article($articleId, $articleTitle, $articleContent, $articleDateCreated, $articleTags);
            $articles[$articleId] = $article;

            $row = $stmt->fetch();
        }

        return $articles;
    }

}

?>