<?php

namespace Bosqu\EvaluationForum\Controller;

use Bosqu\EvaluationForum\Model\Manager\CommentaryManager;
use Bosqu\EvaluationForum\Model\Manager\UserManager;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

require_once "requires.php";

if (isset($_SESSION['id'], $_SESSION['username'], $_SESSION['key'], $_GET['post']))
{
    $post = $_GET['post'];
    $log = new Logger($_SESSION['username']);
    $log->pushHandler(new StreamHandler('../log.txt', Logger::WARNING));

    if (isset($_GET['error'], $_POST['content'], $_GET['post']) && $_GET['error'] === "0")
    {
        $content = strip_tags(trim($_POST['content']));

        $user = new UserManager();
        $userId = $user->searchUser($_SESSION['username'])->getId();

        $addCommentary = new CommentaryManager();
        $addCommentary = $addCommentary->newCommentary($userId, $post, $content);

        if ($addCommentary)
        {
            $log->warning('Create a new commentary.');
            header("location: ../View/one_post.php?sujet=$post&action=commentaryCreate");
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