<?php
include '../View/Elements/header.php';

$userManager = new UserManager();

$categoryManager = new CategoryManager();
$allCategory = $categoryManager->allCategory();

$subjectManager = new SubjectManager();

foreach ($allCategory as $oneCategory) {
?>
    <section class="section_1">
        <div class="category">
                <a href="../View/all_subjects.php?id=0"><h2><?=$oneCategory->getName() ?></h2></a>
            <div>
                <?php
                if (isset($session) && $userRole === 1)
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
            if (isset($session) && ($userRole === 1||2||3 ))
            {
                ?>
                <a href="../View/new_post.php"><button type="button" class="newPost green">New Post</button></a>
                <?php
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
                <h3><?= $oneSubject->getName() ?></h3>
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