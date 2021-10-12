<?php
include '../View/Elements/header.php';

if (isset($_GET['category'])) {
    $categoryManager = new CategoryManager();
?>

    <section class="section_1">
        <div class="category">
            <h2><?=$categoryManager->searchCategory($_GET['category'])->getName() ?></h2>
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
                $oneCategory = $_GET['category'];
                $subjectManager = new SubjectManager();
                $userManager = new UserManager();

                $allSubjects = $subjectManager->getAllSubjectOfCategory($oneCategory);

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
else
{
    header("location:index.php");
}