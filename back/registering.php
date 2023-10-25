<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registering</title>
    </head>
    <body>
        <h1> Registering... </h1>
        <?php
            
            include_once("log_reg.php");

            $username = $_POST['username'];
            $password = $_POST['password'];
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $pic = $_FILES;
            $email = $_POST['email'];
            $description = $_POST['description'];
            $gender =  $_POST['gender'];
            $birth_date = $_POST['birth_date'];

            $value = Register($username, $password, $name, $surname, $pic, $email, $description, $gender, $birth_date);
            
            switch($value)
            {
                case "username":
                    header("Location: ../index.php?error_type=reg&error_code=username");
                case "password":
                    header("Location: ../index.php?error_type=reg&error_code=password");
                case "name":
                    header("Location: ../index.php?error_type=reg&error_code=name");
                case "surname":
                    header("Location: ../index.php?error_type=reg&error_code=surname");
                case "taken":
                    header("Location: ../index.php?error_type=reg&error_code=taken");
                default:
                    $_SESSION['id'] = Login($username, $password);
                    header("Location: ../index.php");
            }

        ?>
    </body>
</html>