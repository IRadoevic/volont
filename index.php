<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="front\css\index1.css">
        <title>Document</title>
    </head>
    <body>
        <div id="wrapper">
            <div id = "header"></div>
            <div id = "regularOffers"></div>
            <div id = "search">
                <div id="searchHolder">
                    <input type="button" value="FIlteri" id="filterButton">
                    <input type="search" name="pretragaDogadjaj" id="mainSearch">
                    <input type="button" value="Pretrazi" id="searchButton">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="login-form">
                <h2>Login</h2>
                <form action="login.php" method="post">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                    <br>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                    <br>
                    <input type="submit" value="Login">
                </form>
            </div>

            <div class="register-form">
                <h2>Register</h2>
                <form action="register.php" method="post">
                    <label for="new-username">New Username:</label>
                    <input type="text" id="new-username" name="new-username" required>
                    <br>
                    <label for="new-password">New Password:</label>
                    <input type="password" id="new-password" name="new-password" required>
                    <br>
                    <label for="confirm-password">Confirm Password:</label>
                    <input type="password" id="confirm-password" name="confirm-password" required>
                    <br>
                    <input type="submit" value="Register">
                </form>
            </div>
        </div>
        <div id = "offers">
            <?php
                include_once("back/display_card.php");

                $query = 'SELECT id FROM `event`;';
                $events = Con($query);
                for($i = 0; $i < mysqli_num_rows($events); $i++)
                {
                    $event = mysqli_fetch_assoc($events);
                    echo DisplayEventCard($event['id']);
                }
            ?>
        </div>
    </body>
</html>