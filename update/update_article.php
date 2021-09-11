<?php
require_once 'ArticleManager.php';

$art_title="";
$auth_name = "";
$art_id = "";
$art_text = "";
$active_article_update_btn = false;
$msg_update ="";
if (isset($_POST['update_article']))
{
    $specific_article = ArticleManager::findById($_POST['article_i']);
    if ($specific_article != false)
    {
        $specific_article = $specific_article[0];
        $auth_name = $specific_article->getAuthor();
        $art_id =  $specific_article->getId();
        $art_title = $specific_article->getTitle();
        $art_text = $specific_article->getArticleText();
        $active_article_update_btn = true;
    }   
}

if (isset($_POST['submit_article_update']))
        {
            if (!isset($_POST['submit_article_title']) || empty($_POST['submit_article_title']) 
            || !isset($_POST['submit_article_author']) || empty($_POST['submit_article_author'])
            || !isset($_POST['submit_article_text']) || empty($_POST['submit_article_text']))
                {
                    $msg_update = '<h6 class="float-right text-danger p-2">Fill all fields !</h6>';
                }
                else 
                {
                    $article_to_be_updated = ArticleManager::findById($_POST['article_i']);
                    $article_to_be_updated = $article_to_be_updated[0];
                    $article_to_be_updated
                    ->setAuthor($_POST['submit_article_author'])
                    ->setArticleText($_POST['submit_article_text'])
                    ->setArticleTitle($_POST['submit_article_title']);
                    $updated_article = new ArticleManager();
                    if($updated_article->updateArticle($article_to_be_updated) > 0){
                        $msg_update ='<h6 class="float-right text-success p-2">Article Updated Sccuessfully</h6>';
                    }
                    else{
                        $msg_update = '<h6 class="float-right text-danger p-2">Error !</h6>';
                    }
                }
            
        }

?>