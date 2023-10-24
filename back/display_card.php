<?php
    include_once("db_con.php");

    function DisplayEventCard($event_id)
    {
<<<<<<< HEAD
        /*$query = "SELECT * FROM 'event' WHERE event.id LIKE $event_id";
=======
        $query = "SELECT * FROM `event` WHERE event.id LIKE $event_id;";
>>>>>>> 94f9ad68ff2a47f3dde5a5db9a7c42a6700ff79a
        $event = mysqli_fetch_assoc(Con($query));
        $html = "<div class='container'>
                    <div class='image'>
                        <img src='pic/image.png'>
                    </div>
                    <div class='overlay'>
                        <p>".$event['name']."</p>
                        <p>".$event['description']."</p>
                        <p>".$event['start_datetime']."</p>
                        <p>".$event['finish_datetime']."</p>
                    </div>
<<<<<<< HEAD
                </div>';
        return $html;*/
        return 1;
=======
                </div>";
        return $html;
>>>>>>> 94f9ad68ff2a47f3dde5a5db9a7c42a6700ff79a
    }

?>