<?php
    require 'add/add_category.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="css/bootstrap.min.css" rel="stylesheet"/>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Categories Blog</a>
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
                        <a class="nav-link" href="show_articles.php?category_i=<?=$category->id?>"><?= $category->name; ?></a>
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
                    <label for="exampleFormControlInput1">Category Name</label>
                    <input class="form-control" type="text" placeholder="Category Name" 
                    name="submit_category">
                </div>
                <?=$msg;?>
                <button type="submit" class="btn btn-primary" name="add_category">Add Category</button>
            </form>
            </div>
        </div>
    </body>
</html>

