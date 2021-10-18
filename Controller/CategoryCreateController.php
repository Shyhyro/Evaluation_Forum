<?php

namespace Bosqu\EvaluationForum\Controller;

use Bosqu\EvaluationForum\Model\Manager\CategoryManager;
use Bosqu\EvaluationForum\Model\Manager\UserManager;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

require_once "requires.php";

if (isset($_SESSION['id'], $_SESSION['username'], $_SESSION['key']))
{
    $log = new Logger($_SESSION['username']);
    $log->pushHandler(new StreamHandler('../log.txt', Logger::WARNING));

    if(isset($_GET['error'], $_POST['name']) && $_GET['error'] === "0")
    {
        $name = strip_tags(trim($_POST['name']));

        $user = new UserManager();
        $username = $user->searchUser($_SESSION['username'])->getUsername();
        $user = $user->searchUser($_SESSION['username'])->getId();

        $categoryController = new CategoryController();
        $addCategory = $categoryController->addCategory($name);

        if ($addCategory)
        {
            $log->warning($username . ' add a new category.');

            header("location: ../View/Administration.php?action=categoryCreate");
        }
        else
        {
            header("location: ../View/Administration.php?error=errorIsComing");
        }
    }
    else {
        header("location: ../View/Administration.php?error=missingData");
    }
}
else
{
    header("location:../View/index.php");
}