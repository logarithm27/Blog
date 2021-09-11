<?php

if(isset($_POST['delete_comment'])){
	require_once 'CommentManager.php';

	$comment_deleted = CommentManager::delete($_POST['comment_id']);
}