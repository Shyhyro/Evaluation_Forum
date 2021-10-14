<?php

namespace Bosqu\EvaluationForum\Controller;

use Bosqu\EvaluationForum\Model\Manager\SubjectManager;

require_once "requires.php";

if (isset($_SESSION['id'], $_SESSION['username'], $_SESSION['key'], $_GET['subject'], $_POST['name'], $_POST['description'], $_POST['content']))
{
    $subjectId = $_GET['subject'];
    $name = strip_tags(trim($_POST['name']));
    $description = strip_tags(trim($_POST['description']));
    $content = strip_tags(trim($_POST['content']));

    $subject = new SubjectManager();
    $changeSubject = $subject->updateSubject($subjectId, $name, $description, $content);

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