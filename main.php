<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/config.php';
require __DIR__ . '/functions.php';
require __DIR__ . '/querys.php';

$connSource = createConnection($config['source']['connection']);
$connTarget = createConnection($config['target']['connection']);

$forumsToMove = [
    [ 'origin_forum_id' => 15, 'target_forum_id' => 59 ], // anticonceptivos
    [ 'origin_forum_id' => 16, 'target_forum_id' => 60 ], // ginecología
    [ 'origin_forum_id' => 4, 'target_forum_id' => 61 ], // dietas, como bajar de peso
    [ 'origin_forum_id' => 14, 'target_forum_id' => 62 ], // cirugia estética me animo
];

foreach ($forumsToMove as $forumToMove) {

    $topicsFromSourceForum = getAllTopicsFromForum($connSource, 
        $config['source']['table_prefix'],
        $forumToMove['origin_forum_id']);

    foreach ($topicsFromSourceForum as $topicFromSourceForum) {

        // insert the topic on the target database
        $insertedTopicId = insertTopicInTargetForum($connTarget,
            $config['target']['table_prefix'],
            $topicFromSourceForum,
            $forumToMove['target_forum_id']);

        // retrieve the topic's post from the source database
        $postsFromSourceTopic = getAllPostsFromTopic($connSource,
            $config['source']['table_prefix'],
            $topicFromSourceForum['topic_id']);

        // foreach post on the source database
        foreach ($postsFromSourceTopic as $postFromSourceTopic) {

            // insert the post on the target database associated with the new inserted topic
            insertPostInTargetTopic($connTarget,
                $config['target']['table_prefix'],
                $postFromSourceTopic,
                $insertedTopicId);

            
        }
    }
}


