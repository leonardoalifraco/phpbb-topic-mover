<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/init.php';
require __DIR__.'/config.php';
require __DIR__.'/functions.php';
require __DIR__.'/querys.php';

$connSource = createConnection($config['source']['connection']);
$connTarget = createConnection($config['target']['connection']);

$forumsToMove = array(
    array('origin_forum_id' => 15, 'target_forum_id' => 59), // anticonceptivos
    array('origin_forum_id' => 16, 'target_forum_id' => 60), // ginecología
    array('origin_forum_id' => 4, 'target_forum_id' => 61), // dietas, como bajar de peso
    array('origin_forum_id' => 14, 'target_forum_id' => 62), // cirugia estética me animo
);

foreach ($forumsToMove as $forumToMove) {
    $topicsFromSourceForum = getAllTopicsFromForum(
        $connSource,
        $config['source']['table_prefix'],
        $forumToMove['origin_forum_id']
    );

    foreach ($topicsFromSourceForum as $topicFromSourceForum) {
        // insert the topic on the target database
        $insertedTopicId = insertTopicInTargetForum(
            $connTarget,
            $config['target']['table_prefix'],
            $topicFromSourceForum,
            $forumToMove['target_forum_id']
        );

        // retrieve the topic's post from the source database
        $postsFromSourceTopic = getAllPostsFromTopic(
            $connSource,
            $config['source']['table_prefix'],
            $topicFromSourceForum['topic_id']
        );

        $log->addDebug('Topic '.$topicFromSourceForum['topic_id']
            .' of source forum '.$forumToMove['origin_forum_id']
            .' inserted with id '.$insertedTopicId
            .' on target forum '.$forumToMove['target_forum_id'].'.');

        // foreach post on the source database
        foreach ($postsFromSourceTopic as $postFromSourceTopic) {
            // insert the post on the target database associated with the new inserted topic
            $insertedPostId = insertPostInTargetTopic(
                $connTarget,
                $config['target']['table_prefix'],
                $postFromSourceTopic,
                $insertedTopicId,
                $forumToMove['target_forum_id']
            );

            $log->addDebug('Post '.$postFromSourceTopic['post_id']
                .' from topic '.$topicFromSourceForum['topic_id']
                .' of source forum '.$forumToMove['origin_forum_id']
                .' inserted with id '.$insertedPostId
                .' on topic '.$insertedTopicId
                .' from target forum '.$forumToMove['target_forum_id'].'.');

            // update topic_first_post_id
            if ($postFromSourceTopic['post_id'] == $topicFromSourceForum['topic_first_post_id']) {
                updateTopicFirstPostId(
                    $connTarget,
                    $config['target']['table_prefix'],
                    $insertedTopicId,
                    $insertedPostId
                );
            }

            // update topic_last_post_id
            if ($postFromSourceTopic['post_id'] == $topicFromSourceForum['topic_last_post_id']) {
                updateTopicLastPostId(
                    $connTarget,
                    $config['target']['table_prefix'],
                    $insertedTopicId,
                    $insertedPostId
                );
            }
        }
    }
}
