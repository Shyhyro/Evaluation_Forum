<?php

use Bosqu\EvaluationForum\Model\Manager\CategoryManager;
use Bosqu\EvaluationForum\Model\Manager\CommentaryManager;
use Bosqu\EvaluationForum\Model\Manager\SubjectManager;
use Bosqu\EvaluationForum\Model\Manager\UserManager;

include '../View/Elements/header.php';

if (isset($_GET['sujet'])) {
    $categoryManager = new CategoryManager();
    $subjectManager = new SubjectManager();
    $userManager = new UserManager();

    $sujet = $_GET['sujet'];
    $category = $subjectManager->searchSubject($sujet)->getCategoryFk();
    ?>

    <section class="section_1">
        <div class="category">
            <h2><?=$categoryManager->searchCategory($category)->getName() ?></h2>
        </div>
        <div class="subjects">
            <?php

            $Subjects = $subjectManager->getSubjectById($sujet);
?>
                    <h3><?= $Subjects->getName() ?></h3>
                    <div>
                        <?php
                        if (isset($session) && ($userRole === 1||2||3))
                        {
                            ?>
                            <a href="#"><button type="button" class="orange">Modifier</button></a>
                            <?php
                        }

                        if (isset($session) && ($userRole === 1||2))
                        {
                            ?>
                            <a href="#"><button type="button" class="orange">Archiver</button></a>
                            <?php
                        }
                        if (isset($session))
                        {
                            if ($userRole === 1)
                            {
                                ?>
                                <a href="#"><button type="button" class="red">Supprimer</button></a>
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <p><?=$Subjects->getDescription() ?></p>
            <p><?=$Subjects->getContent() ?></p>
                    <span>By <?=$userManager->searchUserById($Subjects->getUserFk())->getUsername() ?></span>
        </div>
    </section>
    <section class="section_1">
        <div class="subjects">
            <?php
            $commentary = new CommentaryManager();
            $allComment = $commentary->getCommentary($sujet);

            foreach ($allComment as $com) {
            ?>
            <div class="subject">
                <div><?=$userManager->searchUserById($com->getUserFk())->getUsername()?></div>
                <div>

                    <?php
                    if (isset($session) && ($userRole === 1||2||3))
                    {
                        ?>
                        <a href="#"><button type="button" class="orange">Modifier</button></a>
                        <?php
                    }
                    if (isset($session))
                    {
                        if ($userRole === 1)
                        {
                            ?>
                            <a href="#"><button type="button" class="red">Supprimer</button></a>
                            <?php
                        }
                    }
                    ?>
                </div>
                <p><?=$com->getContent()?></p>
            </div>
                <?php
            }
                ?>
            <div class="subject">
                <form name="new_commentary" method="post" action="../Controller/CommentaryCreateController.php?error=0&post=<?=$sujet?>" >
                    <h3>Commentaires:</h3>
                    <textarea name="content" maxlength="300" required></textarea>
                    <button class="green" type="submit">Envoyer</button>
                </form>
            </div>
        </div>
    </section>

    <?php

    include '../View/Elements/footer.php';
}
else
{
    header("location:index.php");
}