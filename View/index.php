<?php
include '../View/Elements/header.php';

?>
    <section class="section_1">
        <div class="category">
                <a href="../View/all_subjects.php?id=0"><h2>Category Tittle</h2></a>
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
            <div class="subject">
                <h3>Post Tittle</h3>
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
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad animi blanditiis dignissimos error fugiat fugit hic.
                    In ipsam nesciunt nostrum obcaecati possimus quam qui quo rem repellat suscipit velit! Inventore?
                </p>
                <span>By Username</span>
            </div>
        </div>
    </section>
<?php
include '../View/Elements/footer.php';