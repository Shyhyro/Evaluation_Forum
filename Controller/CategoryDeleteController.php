<?php

namespace Bosqu\EvaluationForum\Controller;

use Bosqu\EvaluationForum\Model\Manager\CategoryManager;
use Bosqu\EvaluationForum\Model\Manager\UserManager;

require_once "requires.php";

if (isset($_SESSION['id'], $_SESSION['username'], $_SESSION['key'], $_GET['category']))
{
    $userManager = new UserManager();
    $user = $userManager->searchUser($_SESSION['username'])->getRoleFk();

    if ($user === 1)
    {
        $categoryId = $_GET['category'];

        $category = new CategoryManager();
        $deleteCategory = $category->deleteCategory($categoryId);

        if ($deleteCategory)
        {
            header("location: ../View/Administration.php?action=categoryDelete");
        }
        else
        {
            header("location: ../View/Administration.php?error=errorIsComing");
        }
    }
    else
    {
        header("location:../index.php");
    }
}
else
{
    header("location:../index.php");
}