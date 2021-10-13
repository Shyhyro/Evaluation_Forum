<?php
include '../View/Elements/header.php';

if (isset($_SESSION['id'], $_SESSION['username'], $_SESSION['key']))
{
    header("location:index.php");
}
else {

?>

<section class="section_1">
    <div class="category">
        <h2>Register</h2>
    </div>
    <form id="register" name="Register" action="../Controller/UserCreateController.php?error=0" method="post">

        <label for="register_Username">Username:</label>
        <input id="register_Username" type="text" name="username" required>

        <label for="register_Password">Password:</label>
        <input id="register_Password" type="password" name="password" required>

        <label for="register_Password_Check">Repeat your Password:</label>
        <input id="register_Password_Check" type="password" name="passwordCheck" required>

        <label for="register_Email">Email:</label>
        <input id="register_Email" type="email" name="email" required>

        <label for="register_Email_Check">Repeat your Email:</label>
        <input id="register_Email_Check" type="email" name="emailCheck" required>

        <button type="submit">Create my account</button>
    </form>
</section>

<?php
    include '../View/Elements/footer.php';
}