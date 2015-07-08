<?php

use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;

function createConnection($params) {
    $config = new Configuration();
    $conn = DriverManager::getConnection($params, $config);
    return $conn;
}

function getAllTopicsFromForum($conn, $tablePrefix, $forumId) {
    $sql = GET_TOPICS_FROM_SOURCE_QUERY;
    $sql = str_replace(TABLE_PREFIX_SYMBOL, $tablePrefix, $sql);
    $stmt = $conn->prepare($sql);
    $stmt->bindValue('forum_id', $forumId);
    $stmt->execute();
    return $stmt->fetchAll();
}
