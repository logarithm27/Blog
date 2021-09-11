<?php

require_once 'CategoryManager.php';

$msg="";
if (isset($_POST['add_category']))
{
    if (!isset($_POST['submit_category']) || empty($_POST['submit_category']) )
    {
        $msg = '<h6 class="float-right text-danger p-2">Category is empty!</h6>';
    }

    else 
    {
        $category = new CategoryManager();
        $category->setName($_POST['submit_category']);
        if ($category->insert_category() > 0)
            {
                $msg = '<h6 class="float-right text-success p-2">Category added.</h6>';
            }
        else 
            {
                $msg = '<h6 class="float-right text-danger p-2">Error Encountered !</h6>';
            }
    }
}




?>