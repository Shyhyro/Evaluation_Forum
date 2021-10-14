<?php

namespace Bosqu\EvaluationForum\Controller;

use Bosqu\EvaluationForum\Model\Manager\CommentaryManager;

require_once "requires.php";

if (isset($_SESSION['id'], $_SESSION['username'], $_SESSION['key'], $_GET['commentary']))
{
    $commentaryId = $_GET['commentary'];

    $commentary = new CommentaryManager();
    $deleteCommentary = $commentary->goodCommentary($commentaryId);

    if ($deleteCommentary)
    {
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