<?php

use Bosqu\EvaluationForum\Model\Manager\CategoryManager;
use Bosqu\EvaluationForum\Model\Manager\SubjectManager;
use Bosqu\EvaluationForum\Model\Manager\UserManager;

include '../View/Elements/header.php';

$userManager = new UserManager();

$categoryManager = new CategoryManager();
$allCategory = $categoryManager->allCategory();

$subjectManager = new SubjectManager();

foreach ($allCategory as $oneCategory) {
?>
    <section class="section_1">
        <div class="category">
                <a href="../View/all_subjects.php?category=<?=$oneCategory->getId() ?>"><h2><?=$oneCategory->getName() ?></h2></a>
            <div>
                <?php
                if (isset($session))
                {
                    if ($userRole === 1)
                    {
                        ?>
                        <a href="#"><button type="button" class="orange">Modifier</button></a>
                        <a href="#"><button type="button" class="orange">Archiver</button></a>
                        <a href="#"><button type="button" class="red">Supprimer</button></a>
                        <?php
                    }
                ?>
            </div>
                <?php
                    if ($userRole === 1 || $userRole === 2 || $userRole === 3)
                    {
                        ?>
                        <a href="../View/new_post.php"><button type="button" class="newPost green">New Post</button></a>
                        <?php
                    }
                }
            ?>
        </div>
        <div class="subjects">
            <?php
            $allSubjects = $subjectManager->getAllSubjectOfCategory($oneCategory->getId());

            foreach ($allSubjects as $oneSubject)
            {
            ?>
            <div class="subject">
                <h3><a href="../View/one_post.php?sujet=<?=$oneSubject->getId() ?>"><?= $oneSubject->getName() ?></a></h3>
                <div>
                <?php
                    if (isset($session))
                    {
                        if ($userRole === 1 || $userRole === 2 || $user->getId() === $oneSubject->getUserFk() )
                        {
                        ?>
                        <a href="#"><button type="button" class="orange">Modifier</button></a>
                <?php
                        }

                        if ($userRole === 1 || $userRole === 2)
                        {
                        ?>
                            <a href="#"><button type="button" class="orange">Archiver</button></a>
                    <?php
                        }

                        if ($userRole === 1 || $user->getId() === $oneSubject->getUserFk())
                        {
                            ?>
                            <a href="../Controller/SubjectDeleteController.php?error=0&category=<?=$oneCategory->getId()?>&subject=<?=$oneSubject->getId()?>"><button type="button" class="red">Supprimer</button></a>
                            <?php
                        }
                    }
                        ?>
                </div>
                <p><?=$oneSubject->getDescription() ?></p>
                <span>By <?=$userManager->searchUserById($oneSubject->getUserFk())->getUsername() ?></span>
            </div>
                <?php
            }
                ?>
        </div>
    </section>
<?php
}
include '../View/Elements/footer.php';