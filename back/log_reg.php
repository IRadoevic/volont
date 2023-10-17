<?php

    include_once("db_con.php");

    function Login($username, $password)
    {
        $query = "SELECT id, username, password FROM user WHERE user.username LIKE $username;";
        $user = mysqli_fetch_assoc(Con($query));

        if(!isset($user)) return "username";

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        if($user["password"] != $hashed_password) return "password";

        return $user["id"];
    }

    function Register($username, $password, $name, $surname, $pic, $email, $description, $gender, $birth_date)
    {
        if(!isset($username)) return "username";
        if(!isset($password)) return "password";
        if(!isset($name)) return "name";
        if(!isset($surname)) return "surname";

        $query = "SELECT id FROM user WHERE user.username LIKE $username;";
        $same_user = mysqli_fetch_assoc(Con($query));
        if(!isset($same_user)) return "taken";

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $register_datetime = date("Y-M-D h:m:s");
        $query = "INSERT INTO `user`(`username`, `password`, `name`, `surname`, `pic`, `email`, `description`, `gender`, `birth_date`, `register_datetime`) VALUES ('$username','$password','$name','$surname',$pic,'$email','$description',$gender,$birth_date,$register_datetime)";
    }

?>