<?php

namespace Bosqu\EvaluationForum\Controller;

use Bosqu\EvaluationForum\Model\Manager\SubjectManager;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

require_once "requires.php";

if (isset($_SESSION['id'], $_SESSION['username'], $_SESSION['key'], $_GET['category'], $_GET['subject']))
{
    $category = $_GET['category'];
    $subjectId = $_GET['subject'];

    $log = new Logger($_SESSION['username']);
    $log->pushHandler(new StreamHandler('../log.txt', Logger::WARNING));

    $subject = new SubjectManager();
    $deleteSubject = $subject->deleteSubject($subjectId);

    if ($deleteSubject)
    {
        $log->warning('Delete a subjects.');
        header("location: ../View/all_subjects.php?category=$category&action=subjectDelete");
    }
    else
    {
        header("location: ../View/all_subjects.php?category=$category&error=errorIsComing");
    }
}
else if (isset($_SESSION['id'], $_SESSION['username'], $_SESSION['key'], $_GET['subject']))
{
    $subjectId = $_GET['subject'];

    $log = new Logger($_SESSION['username']);
    $log->pushHandler(new StreamHandler('../log.txt', Logger::WARNING));

    $subject = new SubjectManager();
    $deleteSubject = $subject->deleteSubject($subjectId);

    if ($deleteSubject)
    {
        $log->warning('Delete a subject.');
        header("location: ../View/Administration.php?action=subjectDelete");
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