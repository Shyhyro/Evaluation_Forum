<?php

namespace Bosqu\EvaluationForum\Controller;

use Bosqu\EvaluationForum\Model\Manager\CommentaryManager;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

require_once "requires.php";

if (isset($_SESSION['id'], $_SESSION['username'], $_SESSION['key'], $_GET['commentary']))
{
    $commentaryId = $_GET['commentary'];

    $log = new Logger($_SESSION['username']);
    $log->pushHandler(new StreamHandler('../log.txt', Logger::WARNING));

    $commentary = new CommentaryManager();
    $deleteCommentary = $commentary->goodCommentary($commentaryId);

    if ($deleteCommentary)
    {
        $log->warning('Accept a commentary.');
        header("location: ../View/Administration.php?action=goodCommentary");
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