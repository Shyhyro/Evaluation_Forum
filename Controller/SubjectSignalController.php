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
    $changeSubject = $subject->badSubject($subjectId);

    if ($changeSubject)
    {
        $log->warning('Report a subject.');
        header("location: ../View/one_post.php?sujet=$subjectId&action=subjectSignal");
    }
    else
    {
        header("location: ../View/one_post.php?sujet=$subjectId&error=errorIsComing");
    }
}
else
{
    header("location:../index.php");
}