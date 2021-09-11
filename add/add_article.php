<?php

require_once 'ArticleManager.php';

$msg="";
if (isset($_POST['add_article']))
{
    if (!isset($_POST['submit_article_title']) || empty($_POST['submit_article_title'])
    || !isset($_POST['submit_article_author']) || empty($_POST['submit_article_author'])
    || !isset($_POST['submit_article_text']) || empty($_POST['submit_article_text'])
    )
    {
        $msg = '<h6 class="float-right text-danger p-2">You must fill all required fields</h6>';
    }

    else 
    {
        $article = new ArticleManager();
        $article->setCategoryId($_POST['category_i'])
        ->setAuthor($_POST['submit_article_author'])
        ->setArticleText($_POST['submit_article_text'])
        ->setArticleTitle($_POST['submit_article_title']);
        if ($article->insertArticle() > 0)
            {
                $msg = '<h6 class="float-right text-success p-2">Article added.</h6>';
            }
        else 
            {
                $msg = '<h6 class="float-right text-danger p-2">Error Encountered !</h6>';
            }
    }
}

?>