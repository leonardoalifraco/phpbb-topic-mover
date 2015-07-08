<?php

define ('TABLE_PREFIX_SYMBOL', '##TABLE_PREFIX##');

define('GET_TOPICS_FROM_SOURCE_QUERY', 'SELECT  `topic_id` ,  `forum_id` ,  `icon_id` ,  `topic_attachment` ,  `topic_approved` ,  `topic_reported` ,  `topic_title` ,  `topic_poster` ,  `topic_time` ,  `topic_time_limit` , `topic_views` ,  `topic_replies` ,  `topic_replies_real` ,  `topic_status` ,  `topic_type` ,  `topic_first_post_id` ,  `topic_first_poster_name` ,  `topic_first_poster_colour` , `topic_last_post_id` ,  `topic_last_poster_id` ,  `topic_last_poster_name` ,  `topic_last_poster_colour` ,  `topic_last_post_subject` ,  `topic_last_post_time` ,  `topic_last_view_time` , `topic_moved_id` ,  `topic_bumped` ,  `topic_bumper` ,  `poll_title` ,  `poll_start` ,  `poll_length` ,  `poll_max_options` ,  `poll_last_vote` ,  `poll_vote_change` ,  `topic_url` FROM  `' . TABLE_PREFIX_SYMBOL . 'topics` WHERE forum_id = :forum_id');
