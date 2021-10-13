<?php

namespace Bosqu\EvaluationForum\Controller;

use Bosqu\EvaluationForum\Model\Manager\SubjectManager;

require_once "requires.php";

if (isset($_SESSION['id'], $_SESSION['username'], $_SESSION['key'], $_GET['category'], $_GET['subject']))
{
    $category = $_GET['category'];
    $subjectId = $_GET['subject'];

    $subject = new SubjectManager();
    $deleteSubject = $subject->deleteSubject($subjectId);

    if ($deleteSubject)
    {
        header("location: ../View/all_subjects.php?category=$category");
    }
    else
    {
        header("location: ../View/all_subjects.php?category=$category&error=errorIsComing");
    }
}
else
{
    header("location:../index.php");
}