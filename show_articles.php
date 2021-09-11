<?php
    require 'add/add_article.php';
    require 'add/add_comment.php';
    require 'update/update_comment.php';
    require 'delete/delete_comment.php';
    require 'delete/delete_article.php';
    require 'update/update_article.php';
    require_once 'ArticleManager.php';

    if(isset($_GET['category_i']))
    {
        $articles = ArticleManager::findArticleByCatId($_GET['category_i']);
        $category_id = $_GET['category_i'];
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="css/bootstrap.min.css" rel="stylesheet"/>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Categories Blog</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                <?php 
                    require_once 'CategoryManager.php';
                    $categories = CategoryManager::findAllCategories();
                    foreach ($categories as $category) 
                {?>
                    <li class="nav-item active">
                        <a class="nav-link" href="show_articles.php?category_i=<?= $category->id ?>"><?= $category->name; ?></a>
                    </li>
                <?php
                }   
                ?>
                </ul>
            </div>
        </nav>
        <div class="row justify-content-md-center" style="margin-top: 5em;">
            <div class="col-4">
            <form action="" method="POST">
                <div class="form-group">
                <label for="exampleFormControlTextarea1">Article Title</label>    
                <input class="form-control" type="text" placeholder="Article Title" 
                    name="submit_article_title" value="<?=$art_title?>">
                    <label for="exampleFormControlTextarea1">Author Name</label>
                    <input class="form-control" type="text" placeholder="Author" 
                    name="submit_article_author" value="<?=$auth_name?>">
                    <input name="article_i" value="<?=$art_id?>" style="display: none;">
                    <input name="category_i" value="<?=$category_id?>" style="display: none;">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"></label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" 
                        name="submit_article_text"><?=$art_text?></textarea>
                    </div>
                </div>
                <?=$msg;?>
                <?=$msg_update;?>
                <?php
                    if(!$active_article_update_btn)
                        {
                ?>
                            <button type="submit" class="btn btn-primary" name="add_article">Add Article</button>
                <?php 
                        }
                    else 
                        {
                ?>
                            <button type="submit" class="btn btn-warning" name="submit_article_update">Update Article</button>
                <?php 
                        }
                        ?>
            </form>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-3"> 
        <div class="card-group">
        <?php 
            foreach ($articles as $article)
            {
        ?>
        <div class="mt-4 col">
            <div class="card border-info mb-3" style="width: 38rem">
                <div class="card-body">
                    <h5 class="card-title"><?= $article->title; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $article->author; ?></h6>
                    <div style="height:150px; overflow-y : auto;">
                        <p class="card-text"><?= $article->article_text;?></p>
                    </div>
                    <div style="height:150px; overflow-y : auto;" class="mt-4">
                    <form action="" method="POST">
                    <button type="submit" class="btn btn-warning" name="update_article">Update Article</button>
                    <button type="submit" class="btn btn-danger" name="delete_article">Delete Article</button>
                    <div class="mt-4"></div>    
                    <div class="form-group">    
                            <input class="form-control" type="text" placeholder="Nickname" name="submit_nickname"
                            value="<?=$nickname?>">
                            <input name="article_i" value="<?=$article->id?>" type="hidden">
                            <input name="comment_i" value="<?=$comment_id?>" type="hidden">
                        <div class="mt-4 form-group">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" 
                        name="submit_comment" placeholder="Comment Here"><?=$the_comment?></textarea>
                        </div>
                        <?php
                            if(!$active_update_btn)
                            {
                        ?>
                        <button type="submit" class="btn btn-secondary" name="comment_article">Comment</button>
                        <?php 
                        }
                        else 
                        {
                        ?>
                        <button type="submit" class="btn btn-warning" name="submit_comment_update">Update Comment</button>
                        <?php 
                        }
                        ?>
                    </div>
                    <?=$msg_comment;?>
                    <?=$msg_comment_2;?>
                    </form>
                    <?php
                    require_once 'CommentManager.php';
                    $comments = CommentManager::findCommentByArticleId($article->id);
                    foreach ($comments as $comment)
                    {
                    ?>
                    <form action="", method="POST">
                    <div class="card border-primary mb-3 card bg-light mb-3">
                        <div class="card-body">
                        <h6 class="card-title"><?= $comment->author; ?></h6>
                        <p class="card-text"><?= $comment->comment_text; ?></p>
                        <input type="hidden", value="<?= $comment->id; ?>" name="comment_id">
                        <input type="hidden", value="<?= $article->id; ?>" name="article_id">
                        <p class="card-text"><small class="text-muted">Posted on <?= $comment->date_; ?></small></p>
                        <button type="submit" class="btn btn-warning btn-sm" name="update_comment">Update Comment</button>
                        <button type="submit" class="btn btn-danger btn-sm" name="delete_comment">Delete Comment</button>
                    </form>
                    </div>
                    </div>
                    <?php
                    }   
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <?php 
            } 
        ?>
        </div>
        </div>
    </body>
</html>

