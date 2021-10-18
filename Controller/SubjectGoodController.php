<?php

namespace Bosqu\EvaluationForum\Controller;

use Bosqu\EvaluationForum\Model\Manager\SubjectManager;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

require_once "requires.php";

if (isset($_SESSION['id'], $_SESSION['username'], $_SESSION['key'], $_GET['subject']))
{
    $subjectId = $_GET['subject'];

    $log = new Logger($_SESSION['username']);
    $log->pushHandler(new StreamHandler('../log.txt', Logger::WARNING));

    $subject = new SubjectManager();
    $deleteCommentary = $subject->goodSubject($subjectId);

    if ($deleteCommentary)
    {
        $log->warning('Accept a subject.');
        header("location: ../View/Administration.php?action=goodSubject");
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