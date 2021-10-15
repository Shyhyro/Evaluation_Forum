<?php

namespace Bosqu\EvaluationForum\Controller;

use Bosqu\EvaluationForum\Model\Manager\TokenManager;
use Bosqu\EvaluationForum\Model\Manager\UserManager;

require_once "requires.php";

if (isset($_GET['token']) )
{
    $token = $_GET['token'];

    $user = new UserManager();
    $tokenManager = new TokenManager();

    $tokenSearch = $tokenManager->searchTokenByToken($token);

    $user = $user->statutUser($tokenSearch->getUserFk());

    $deleteToken = $tokenManager->deleteTokenByToken($tokenSearch->getToken());

    if ($user && $deleteToken)
    {
        header("location:../View/index.php?statut=validate");
    }
    else
    {
        header("location:../View/index.php?error=errorIsComing");
    }

}
else
{
    header("location:../index.php");
}