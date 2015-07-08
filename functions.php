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

function insertTopicInTargetForum($conn, $tablePrefix, $topic, $targetForumId) {
    $sql = INSERT_TOPIC_IN_TARGET_QUERY;
    $sql = str_replace(TABLE_PREFIX_SYMBOL, $tablePrefix, $sql);
    $stmt = $conn->prepare($sql);
    $stmt->bindValue('forum_id', $targetForumId);
    $stmt->bindValue('icon_id', $topic['icon_id']);
    $stmt->bindValue('topic_attachment', $topic['topic_attachment']);
    $stmt->bindValue('topic_approved', $topic['topic_approved']);
    $stmt->bindValue('topic_reported', $topic['topic_reported']);
    $stmt->bindValue('topic_title', $topic['topic_title']);
    $stmt->bindValue('topic_poster', $topic['topic_poster']);
    $stmt->bindValue('topic_time', $topic['topic_time']);
    $stmt->bindValue('topic_time_limit', $topic['topic_time_limit']);
    $stmt->bindValue('topic_views', $topic['topic_views']);
    $stmt->bindValue('topic_replies', $topic['topic_replies']);
    $stmt->bindValue('topic_replies_real', $topic['topic_replies_real']);
    $stmt->bindValue('topic_status', $topic['topic_status']);
    $stmt->bindValue('topic_type', $topic['topic_type']);
    $stmt->bindValue('topic_first_post_id', 0);
    $stmt->bindValue('topic_first_poster_name', $topic['topic_first_poster_name']);
    $stmt->bindValue('topic_first_poster_colour', $topic['topic_first_poster_colour']);
    $stmt->bindValue('topic_last_post_id', 0);
    $stmt->bindValue('topic_last_poster_id', $topic['topic_last_poster_id']);
    $stmt->bindValue('topic_last_poster_name', $topic['topic_last_poster_name']);
    $stmt->bindValue('topic_last_poster_colour', $topic['topic_last_poster_colour']);
    $stmt->bindValue('topic_last_post_subject', $topic['topic_last_post_subject']);
    $stmt->bindValue('topic_last_post_time', $topic['topic_last_post_time']);
    $stmt->bindValue('topic_last_view_time', $topic['topic_last_view_time']);
    $stmt->bindValue('topic_moved_id', $topic['topic_moved_id']);
    $stmt->bindValue('topic_bumped', $topic['topic_bumped']);
    $stmt->bindValue('topic_bumper', $topic['topic_bumper']);
    $stmt->bindValue('poll_title', $topic['poll_title']);
    $stmt->bindValue('poll_start', $topic['poll_start']);
    $stmt->bindValue('poll_length', $topic['poll_length']);
    $stmt->bindValue('poll_max_options', $topic['poll_max_options']);
    $stmt->bindValue('poll_last_vote', $topic['poll_last_vote']);
    $stmt->bindValue('poll_vote_change', $topic['poll_vote_change']);
    $stmt->bindValue('topic_url', $topic['topic_url']);
    $stmt->execute();
    return $conn->lastInsertId();
}
