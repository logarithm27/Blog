<?php
require_once 'CommentManager.php';

$msg_comment="";
$nickname = "";
$comment_id = "";
$the_comment = "";
$active_update_btn = false;
if (isset($_POST['update_comment']))
{
    $specific_comment = CommentManager::findCommentById($_POST['comment_id']);
    if ($specific_comment != false)
    {
        $specific_comment = $specific_comment[0];
        $nickname = $specific_comment->getAuthor();
        $comment_id =  $specific_comment->getId();
        $the_comment = $specific_comment->getComment();
        $active_update_btn = true;
    }   
}

if (isset($_POST['submit_comment_update']))
        {
            if (!isset($_POST['submit_nickname']) || empty($_POST['submit_nickname']) 
            || !isset($_POST['submit_comment']) || empty($_POST['submit_comment']))
                {
                    $msg_comment = '<h6 class="float-right text-danger p-2">Fill the two fields !</h6>';
                }
                else 
                {
                    $comment_2 = CommentManager::findCommentById($_POST['comment_i']);
                    $comment_2 = $comment_2[0];
                    $date_2 = new DateTime();
                    $comment_2->setDate($date_2->format("Y-m-d H:i:s"))
                    ->setAuthor($_POST['submit_nickname'])
                    ->setComment($_POST['submit_comment'])
                    ->setArticleId($_POST['article_i']);
                    $updated_comment = new CommentManager();
                    if($updated_comment->updateComment($comment_2) > 0){
                        $msg_comment ='<h6 class="float-right text-success p-2">Updated Sccuessfully</h6>';
                    }
                    else{
                        $msg_comment = '<h6 class="float-right text-danger p-2">Error !</h6>';
                    }
                }
            
        }

?>