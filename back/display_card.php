<?php
    include_once("db_con.php");

    function DisplayEventCard($event_id)
    {
        $query = "SELECT * FROM 'event' WHERE event.id LIKE $event_id";
        $event = mysqli_fetch_assoc(Con($query));
        $html = '<div class="container">
                    <div class="image">
                        <img src="pic/image.png">
                    </div>
                    <div class="overlay">
                        <p>'.$event['name'].'</p>
                        <p>'.$event['description'].'</p>
                        <p>'.$event['start_datetime'].'</p>
                        <p>'.$event['finish_datetime'].'</p>
                    </div>
                </div>';
        return $html;
    }

?>