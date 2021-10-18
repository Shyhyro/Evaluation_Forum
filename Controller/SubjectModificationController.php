<?php

namespace Bosqu\EvaluationForum\Controller;

use Bosqu\EvaluationForum\Model\Manager\SubjectManager;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

require_once "requires.php";

if (isset($_SESSION['id'], $_SESSION['username'], $_SESSION['key'], $_GET['subject'], $_POST['name'], $_POST['description'], $_POST['content']))
{
    $subjectId = $_GET['subject'];
    $name = strip_tags(trim($_POST['name']));
    $description = strip_tags(trim($_POST['description']));
    $content = strip_tags(trim($_POST['content']));

    $log = new Logger($_SESSION['username']);
    $log->pushHandler(new StreamHandler('../log.txt', Logger::WARNING));

    $subject = new SubjectManager();
    $changeSubject = $subject->updateSubject($subjectId, $name, $description, $content);

    if ($changeSubject)
    {
        $log->warning('Add modification in subject.');
        header("location: ../View/one_post.php?sujet=$subjectId&action=subjectModification");
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