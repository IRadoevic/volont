<?php
    session_start();
    include_once("db_con.php");

    function Login($username, $password)
    {
        $query = "SELECT id, username, `password` FROM user WHERE user.username LIKE '$username';";
        $user = mysqli_fetch_assoc(Con($query));

        if(!isset($user)) return "username";

        $hashed_password = hash('sha256', $password);
        if($user["password"] != $hashed_password) return "password";

        return $user["id"];
    }

    function Register($username, $password, $name, $surname, $pic, $email, $description, $gender, $birth_date)
    {
        if(!isset($username)) return "username";
        if(!isset($password)) return "password";
        if(!isset($name)) return "name";
        if(!isset($surname)) return "surname";

        $query = "SELECT id FROM user WHERE user.username LIKE '$username';";
        $same_user = mysqli_fetch_assoc(Con($query));
        if(isset($same_user)) return "taken";

        $hashed_password = hash('sha256', $password);

        $register_datetime = date("Y-m-d h:m:s");

        $_SESSION['pic'] = +is_uploaded_file($pic['tmp_name']);
        
        if(!isset($pic)) $pic = $gender + 1;
        else{
            $location = "../pic/profile/user/$username.jpg";
            if(move_uploaded_file($pic['tmp_name'], $location))
                $pic = 0;
        }

        $query = "INSERT INTO `user` (`username`, `password`, `name`, `surname`, `pic`, `email`, `description`, `gender`, `birth_date`, `register_datetime`) VALUES ('$username','$hashed_password','$name','$surname','$pic ','$email','$description','$gender','$birth_date','$register_datetime');";
            Con($query);
    }

    function ChangeProfile($user_id, $value, $code)
    {
        $query = "UPDATE user SET `$code` = $value WHERE user.id = $user_id";
        Con($query);
    }

?>