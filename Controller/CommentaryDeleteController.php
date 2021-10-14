<?php

namespace Bosqu\EvaluationForum\Controller;

use Bosqu\EvaluationForum\Model\Manager\CommentaryManager;

require_once "requires.php";

if (isset($_SESSION['id'], $_SESSION['username'], $_SESSION['key'], $_GET['post'], $_GET['commentary']))
{
    $post = $_GET['post'];
    $commentaryId = $_GET['commentary'];

    $commentary = new CommentaryManager();
    $deleteCommentary = $commentary->deleteCommentary($commentaryId);

    if ($deleteCommentary)
    {
        header("location: ../View/one_post.php?sujet=$post");
    }
    else
    {
        header("location: ../View/one_post.php?sujet=$post&error=errorIsComing");
    }
}
else
{
    header("location:../index.php");
}