<?php

    function Con($query)
    {
        $server = "localhost:3306";
        $username = "programer";
        $password = "milutinjovanovic2003";
        $database = "volont";

        $con = new mysqli($server, $username, $password, $database);

        if($con->connect_error)
        {
            echo "connect error";
        }

        if($result = mysqli_query($con, $query))
        {
            return $result;
        }
        else
        {
            var_dump($con);
        }
    }

?>