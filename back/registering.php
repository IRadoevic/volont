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
            
            include_once("../back/log_reg.php");

            $username = $_POST['username'];
            $password = $_POST['password'];
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $pic = $_POST['pic'];
            $email = $_POST['email'];
            $description = $_POST['description'];
            $gender = $_POST['gender'];
            $birth_date = $_POST['birth_date'];

            $value = Register($username, $password, $name, $surname, $pic, $email, $description, $gender, $birth_date)
            
            if(is_string($value)) header("?error_code='$value'");
            else
            {
                $_SESSION['id'] = Login($username, $password);
                header("");
            }

        ?>
    </body>
</html>