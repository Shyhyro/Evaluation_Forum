<?php

namespace Bosqu\EvaluationForum\Controller;

use Bosqu\EvaluationForum\Model\Manager\UserManager;

require_once "requires.php";

if (isset($_SESSION['id'], $_SESSION['username'], $_SESSION['key'], $_GET['user']))
{
    $userManager = new UserManager();
    $user = $userManager->searchUser($_SESSION['username'])->getRoleFk();

    if ($user === 1)
    {
        $userId = $_GET['user'];

        $deleteUser = $userManager->deleteUser($userId);

        if ($deleteUser)
        {
            header("location: ../View/Administration.php?action=userDelete");
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