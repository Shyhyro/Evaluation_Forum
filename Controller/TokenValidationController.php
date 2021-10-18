<?php

namespace Bosqu\EvaluationForum\Controller;

use Bosqu\EvaluationForum\Model\Manager\TokenManager;
use Bosqu\EvaluationForum\Model\Manager\UserManager;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

require_once "requires.php";

if (isset($_GET['token']) )
{
    $token = $_GET['token'];

    $log = new Logger($_SESSION['username']);
    $log->pushHandler(new StreamHandler('../log.txt', Logger::WARNING));

    $user = new UserManager();
    $tokenManager = new TokenManager();

    $tokenSearch = $tokenManager->searchTokenByToken($token);

    $user = $user->statutUser($tokenSearch->getUserFk());

    $deleteToken = $tokenManager->deleteTokenByToken($tokenSearch->getToken());

    if ($user && $deleteToken)
    {
        $log->warning('Validation of token.');
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