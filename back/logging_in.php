<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Logging in</title>
    </head>
    <body>
        <h1> Logging in... </h1>
        <?php
            include_once("log_reg.php");

            $username = $_POST['username'];
            $password = $_POST['password'];

            $value = Login($username, $password);
            switch($value)
            {
                case "username":
                    header("Location: ../index.php?error_type=log&error_code=username");
                case "password":
                    header("Location: ../index.php?error_type=log&error_code=password");
                default:
                    $_SESSION['id'] = $value;
                    header("Location: ../index.php");
            }
        
        ?>
    </body>
</html>