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
            
            include_once("../back/log_reg.php");

            $username = $_POST['username'];
            $password = $_POST['password'];
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $pic = $_POST['pic'];
            $email = $_POST['email'];
            $description = $_POST['gender'];
            $birth_date = $_POST['birth_date'];

            $value = Login($username, $password);
            if($value == 'username') header("?error_code='username'");
            else if($value == 'password') header("?error_code='password'")
            else
            {
                $_SESSION['id'] = $value;
                header("")
            }
        
        ?>
    </body>
</html>