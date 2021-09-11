<?php
require_once 'CommentManager.php';

$msg_comment_2="";
if (isset($_POST['comment_article']))
{
    if (!isset($_POST['submit_nickname']) || empty($_POST['submit_nickname']) 
    || !isset($_POST['submit_comment']) || empty($_POST['submit_comment']))
    {
        $msg_comment_2 = '<h6 class="float-right text-danger p-2">Fill the two fields !</h6>';
    }

    else 
    {
        $comment_to_be_added = new CommentManager();
        $date = new DateTime();
        $comment_to_be_added->setDate($date->format("Y-m-d H:i:s"))
        ->setAuthor($_POST['submit_nickname'])
        ->setComment($_POST['submit_comment'])
        ->setArticleId($_POST['article_i']);
        if($comment_to_be_added->insertComment() > 0){
            $msg_comment_2 ='<h6 class="float-right text-success p-2">Comment Added !</h6>';
        }
        else{
            $msg_comment_2 = '<h6 class="float-right text-danger p-2">Error !</h6>';
        }
    }
}

?>