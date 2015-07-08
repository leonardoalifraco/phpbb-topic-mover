<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/config.php';
require __DIR__ . '/functions.php';
require __DIR__ . '/querys.php';

$connOrigin = createConnection($config['source']['connection']);
$connTarget = createConnection($config['target']['connection']);

$forumsToMove = [
    [ 'origin_forum_id' => 15, 'target_forum_id' => 59 ], // anticonceptivos
    [ 'origin_forum_id' => 16, 'target_forum_id' => 60 ], // ginecología
    [ 'origin_forum_id' => 4, 'target_forum_id' => 61 ], // dietas, como bajar de peso
    [ 'origin_forum_id' => 14, 'target_forum_id' => 62 ], // cirugia estética me animo
];

foreach ($forumsToMove as $forumToMove) {

    $topicsFromForum = getAllTopicsFromForum($connOrigin, 
        $config['source']['table_prefix'],
        $forumToMove['origin_forum_id']);

    echo $forumToMove['origin_forum_id'] . ' has ' . count($topicsFromForum) . ' topics.' . PHP_EOL;

    // 1) Obtener todos los topics y bajarlos a un array
    // 2) Topic por topic, 
}


