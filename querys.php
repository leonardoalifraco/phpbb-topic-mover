<?php

define('TABLE_PREFIX_SYMBOL', '##TABLE_PREFIX##');

define('GET_TOPICS_FROM_SOURCE_QUERY', 'SELECT  `topic_id` ,  `forum_id` ,  `icon_id` ,  `topic_attachment` ,  `topic_approved` ,  `topic_reported` ,  `topic_title` ,  `topic_poster` ,  `topic_time` ,  `topic_time_limit` , `topic_views` ,  `topic_replies` ,  `topic_replies_real` ,  `topic_status` ,  `topic_type` ,  `topic_first_post_id` ,  `topic_first_poster_name` ,  `topic_first_poster_colour` , `topic_last_post_id` ,  `topic_last_poster_id` ,  `topic_last_poster_name` ,  `topic_last_poster_colour` ,  `topic_last_post_subject` ,  `topic_last_post_time` ,  `topic_last_view_time` , `topic_moved_id` ,  `topic_bumped` ,  `topic_bumper` ,  `poll_title` ,  `poll_start` ,  `poll_length` ,  `poll_max_options` ,  `poll_last_vote` ,  `poll_vote_change` ,  `topic_url` FROM  `' . TABLE_PREFIX_SYMBOL . 'topics` WHERE `forum_id` = :forum_id');

define('INSERT_TOPIC_IN_TARGET_QUERY', 'INSERT INTO `' . TABLE_PREFIX_SYMBOL . 'topics`(
        `forum_id`, `icon_id`, `topic_attachment`, `topic_approved`,
        `topic_reported`, `topic_title`, `topic_poster`, `topic_time`, `topic_time_limit`,
        `topic_views`, `topic_replies`, `topic_replies_real`, `topic_status`, `topic_type`,
        `topic_first_post_id`, `topic_first_poster_name`, `topic_first_poster_colour`, `topic_last_post_id`, `topic_last_poster_id`,
        `topic_last_poster_name`, `topic_last_poster_colour`, `topic_last_post_subject`, `topic_last_post_time`, `topic_last_view_time`,
        `topic_moved_id`, `topic_bumped`, `topic_bumper`, `poll_title`, `poll_start`,
        `poll_length`, `poll_max_options`, `poll_last_vote`, `poll_vote_change`, `topic_url`)
    VALUES (
        :forum_id, :icon_id, :topic_attachment, :topic_approved,
        :topic_reported, :topic_title, :topic_poster, :topic_time, :topic_time_limit,
        :topic_views, :topic_replies, :topic_replies_real, :topic_status, :topic_type,
        :topic_first_post_id, :topic_first_poster_name, :topic_first_poster_colour, :topic_last_post_id, :topic_last_poster_id,
        :topic_last_poster_name, :topic_last_poster_colour, :topic_last_post_subject, :topic_last_post_time, :topic_last_view_time,
        :topic_moved_id, :topic_bumped, :topic_bumper, :poll_title, :poll_start,
        :poll_length, :poll_max_options, :poll_last_vote, :poll_vote_change, :topic_url)');

define('GET_POSTS_FROM_SOURCE_QUERY', 'SELECT `post_id`, `topic_id`, `forum_id`, `poster_id`, `icon_id`, `poster_ip`, `post_time`, `post_approved`, `post_reported`, `enable_bbcode`, `enable_smilies`, `enable_magic_url`, `enable_sig`, `post_username`, `post_subject`, `post_text`, `post_checksum`, `post_attachment`, `bbcode_bitfield`, `bbcode_uid`, `post_postcount`, `post_edit_time`, `post_edit_reason`, `post_edit_user`, `post_edit_count`, `post_edit_locked` FROM `' . TABLE_PREFIX_SYMBOL . 'posts` WHERE `topic_id` = :topic_id');

define('INSERT_POST_IN_TARGET_QUERY', 'INSERT INTO `' . TABLE_PREFIX_SYMBOL . 'posts`(
        `topic_id`, `forum_id`, `poster_id`, `icon_id`,
        `poster_ip`, `post_time`, `post_approved`, `post_reported`, `enable_bbcode`,
        `enable_smilies`, `enable_magic_url`, `enable_sig`, `post_username`, `post_subject`,
        `post_text`, `post_checksum`, `post_attachment`, `bbcode_bitfield`, `bbcode_uid`,
        `post_postcount`, `post_edit_time`, `post_edit_reason`, `post_edit_user`, `post_edit_count`,
        `post_edit_locked`)
    VALUES (
        :topic_id, :forum_id, :poster_id, :icon_id,
        :poster_ip, :post_time, :post_approved, :post_reported, :enable_bbcode,
        :enable_smilies, :enable_magic_url, :enable_sig, :post_username, :post_subject,
        :post_text, :post_checksum, :post_attachment, :bbcode_bitfield, :bbcode_uid,
        :post_postcount, :post_edit_time, :post_edit_reason, :post_edit_user, :post_edit_count,
        :post_edit_locked)');

define('UPDATE_TOPIC_FIRST_POST_ID_QUERY', 'UPDATE ' . TABLE_PREFIX_SYMBOL . 'topics
    SET 
        topic_first_post_id = :topic_first_post_id
    WHERE topic_id = :topic_id');

define('UPDATE_TOPIC_LAST_POST_ID_QUERY', 'UPDATE ' . TABLE_PREFIX_SYMBOL . 'topics
    SET 
        topic_last_post_id = :topic_last_post_id
    WHERE topic_id = :topic_id');
