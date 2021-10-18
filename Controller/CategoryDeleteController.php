<?php

namespace Bosqu\EvaluationForum\Controller;

use Bosqu\EvaluationForum\Model\Manager\CategoryManager;
use Bosqu\EvaluationForum\Model\Manager\UserManager;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

require_once "requires.php";

if (isset($_SESSION['id'], $_SESSION['username'], $_SESSION['key'], $_GET['category']))
{
    $log = new Logger($_SESSION['username']);
    $log->pushHandler(new StreamHandler('../log.txt', Logger::WARNING));

    $userManager = new UserManager();
    $user = $userManager->searchUser($_SESSION['username'])->getRoleFk();

    if ($user === 1)
    {
        $categoryId = $_GET['category'];

        $categoryController = new CategoryController();
        $deleteCategory = $categoryController->removeCategory($categoryId);

        if ($deleteCategory)
        {
            $log->warning($_SESSION['username'] . ' delete a category.');
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