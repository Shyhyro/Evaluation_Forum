<?php

namespace Bosqu\EvaluationForum\Controller;

use Bosqu\EvaluationForum\Model\Manager\CommentaryManager;

require_once "requires.php";

if (isset($_SESSION['id'], $_SESSION['username'], $_SESSION['key'], $_GET['commentary'], $_GET['subject']))
{
    $commentaryId = $_GET['commentary'];
    $subjectId = $_GET['subject'];

    $commentary = new CommentaryManager();
    $changeSubject = $commentary->signalCommentary($commentaryId);

    if ($changeSubject)
    {
        header("location: ../View/one_post.php?sujet=$subjectId&action=commentarySignal");
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