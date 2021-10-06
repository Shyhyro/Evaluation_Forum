<?php
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Forum</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Styles -->
    <link rel="stylesheet" href="../View/Styles/common.css">
</head>

<body>
<div id="bodyDiv">

    <header>
        <div id="header_Tittle">
            <h1>Forum</h1>
        </div>
        <div id="header_logIn_Logout">
            <form id="header_Login" name="Log-in">
                <label>
                    <input type="text" placeholder="Username" name="username" required>
                    <input type="password" placeholder="Password" name="password" required>
                    <button type="submit">Log-In</button>
                    <button type="button">Register</button>
                </label>
            </form>
            <form id="header_Register" name="Register">
                <label for="register_Username">Username:</label>
                <input id="register_Username" type="text" name="username" required>

                <label for="register_Password">Password:</label>
                <input id="register_Password" type="password" name="password" required>

                <label for="register_Password_Check">Repeat your Password:</label>
                <input id="register_Password_Check" type="password" name="passwordCheck" required>

                <label for="register_Email">Email:</label>
                <input id="register_Email" type="email" name="email" required>

                <label for="register_Email_Check">Repeat your Email:</label>
                <input id="register_Email_Check" type="email" name="email" required>
            </form>
            <div id="header_Logout">
                <p>Hello Username!</p>
                <button type="button">Log-out</button>
            </div>
        </div>
    </header>

    <div>
        <section>
            <div>
                <h2>Category Tittle</h2>
                <button type="button">New Post</button>
            </div>
            <div>
                <div>
                    <h3>Post Tittle</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad animi blanditiis dignissimos error fugiat fugit hic.
                        In ipsam nesciunt nostrum obcaecati possimus quam qui quo rem repellat suscipit velit! Inventore?
                    </p>
                </div>
                <div>
                    <h3>Post Tittle</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad animi blanditiis dignissimos error fugiat fugit hic.
                        In ipsam nesciunt nostrum obcaecati possimus quam qui quo rem repellat suscipit velit! Inventore?
                    </p>
                </div>
            </div>
        </section>
        <section>
            <div>
                <h2>Category Tittle</h2>
                <button type="button">New Post</button>
            </div>
            <div>
                <div>
                    <h3>Post Tittle</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad animi blanditiis dignissimos error fugiat fugit hic.
                        In ipsam nesciunt nostrum obcaecati possimus quam qui quo rem repellat suscipit velit! Inventore?
                    </p>
                </div>
                <div>
                    <h3>Post Tittle</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad animi blanditiis dignissimos error fugiat fugit hic.
                        In ipsam nesciunt nostrum obcaecati possimus quam qui quo rem repellat suscipit velit! Inventore?
                    </p>
                </div>
            </div>
        </section>
    </div>

    <footer>
        <p>This website is made with heart by Timon the cat!</p>
    </footer>

</div>
</body>

</html>