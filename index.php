<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="front\css\index1.css">
        <link rel="stylesheet" href="front\css\eventCard.css">
        <title>Document</title>
    </head>
    <body>
        <?php
            echo $_SESSION["pic"];
            echo $_SESSION["error"];
        ?>
        <div id="wrapper">
            <div id = "header">
                <div class="navigation" id="logReg">Uloguj se</div>
            </div>
            <div id = "regularOffers"></div>
            <div id = "search">
                <div id="searchHolder">
                    <input type="button" value="FIlteri" id="filterButton">
                    <input type="search" name="pretragaDogadjaj" id="mainSearch">
                    <input type="button" value="Pretrazi" id="searchButton">
                </div>
            </div>
        </div>
            <div id="login-form">
                <h2>Login</h2>
                <form action="back/logging_in.php" method="post">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                    <br>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                    <br>
                    <input type="submit" value="Login">
                    <p id="goToReg">Nemate nalog?</p>
                </form>
            </div>

            <div id="register-form">
                <h2>Register</h2>
                <form action="back\registering.php" method="POST"  enctype="multipart/form-data">
                    <label for="username">Username:</label>
                    <input type="text" name="username" required>
                    <br>
                    <label for="password">Password:</label>
                    <input type="password" name="password" required>
                    <br>
                    <label for="name"></label>
                    <input type="text" name="name">
                    <input type="text" name="surname">
                    <input type="file" name="pic">
                    <input type="email" name="email">
                    <input type="text" name="description">
                    <input type="radio" name="gender" value="0">
                    <input type="radio" name="gender" value="1">
                    <input type="date" name="birth_date">
                    <br>
                    <input type="submit" value="Register">
                </form>
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

        <script>
            const dugme = document.getElementById("logReg");
            const forma1 = document.getElementById("login-form");
            const forma2 = document.getElementById("register-form");
            const switchToReg = document.getElementById("goToReg")
// const formContainer = document.getElementById("loginRegisterForm");
            dugme.addEventListener("click", function() {
                if (forma1.style.display === "block" || forma2.style.display === "block") {
                        forma1.style.display = "none";
                        forma2.style.display = "none"
                    } else {
                        forma1.style.display = "block";
                    }
            });
            switchToReg.addEventListener("click", function(){
                forma1.style.display = "none";
                forma2.style.display = "block"
            })
        </script>
    </body>
</html>