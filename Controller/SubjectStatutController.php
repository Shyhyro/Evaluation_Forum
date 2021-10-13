<?php

namespace Bosqu\EvaluationForum\Controller;

use Bosqu\EvaluationForum\Model\Manager\SubjectManager;

require_once "requires.php";

if (isset($_SESSION['id'], $_SESSION['username'], $_SESSION['key'], $_GET['subject']))
{
    $subjectId = $_GET['subject'];

    $subject = new SubjectManager();
    $changeSubject = $subject->changeStatutSubject(2, $subjectId);

    if ($changeSubject)
    {
        header("location: ../View/one_post.php?sujet=$subjectId");
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