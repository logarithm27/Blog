<?php

if(isset($_POST['delete_article'])){
	require_once 'ArticleManager.php';
	$article_deleted = ArticleManager::delete($_POST['article_i']);
}