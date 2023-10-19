<?php

    include_once("db_con.php");

    function ProfilePicPath($user_id)
    {
        $query = "SELECT pic FROM user WHERE user.id LIKE $user_id";
        $result = mysqli_fetch_assoc(Con($query));
        $code = $result[pic];

        if($code == 0) return "\pic\profile\user/" . hash('sha256', $user_id) . ".jpg";

        switch($code)
        {
            case 1:
                return "\pic\profile\sterling.png";
            case 2:
                return "\pic\profile\lana.jpg";
        }
    }

?>