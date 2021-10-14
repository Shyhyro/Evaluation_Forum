<?php

namespace Bosqu\EvaluationForum\Controller;

use Bosqu\EvaluationForum\Model\Manager\SubjectManager;

require_once "requires.php";

if (isset($_SESSION['id'], $_SESSION['username'], $_SESSION['key'], $_GET['subject']))
{
    $subjectId = $_GET['subject'];

    $subject = new SubjectManager();
    $deleteCommentary = $subject->goodSubject($subjectId);

    if ($deleteCommentary)
    {
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