<?php

namespace Bosqu\EvaluationForum\Controller;

use Bosqu\EvaluationForum\Model\Manager\CommentaryManager;
use Bosqu\EvaluationForum\Model\Manager\UserManager;

require_once "requires.php";

if (isset($_SESSION['id'], $_SESSION['username'], $_SESSION['key'], $_GET['post']))
{
    $post = $_GET['post'];

    if (isset($_GET['error'], $_POST['content'], $_GET['post']) && $_GET['error'] === "0")
    {
        $content = strip_tags(trim($_POST['content']));

        $user = new UserManager();
        $userId = $user->searchUser($_SESSION['username'])->getId();

        $addCommentary = new CommentaryManager();
        $addCommentary = $addCommentary->newCommentary($userId, $post, $content);

        if ($addCommentary)
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
        header("location: ../View/one_post.php?sujet=$post&error=dataMissing");
    }
}
else
{
    header("location:index.php");
}