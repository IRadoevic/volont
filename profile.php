<?php
    session_start();
    include_once("back/display_card.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="front\css\profile.css">
    <link rel="stylesheet" href="front\css\eventCard.css">
    
    <title>Moj profil</title>
</head>
<body>
    <div id="wrapper">

        <?php
            $query = 'SELECT * FROM `user` WHERE id = '.$_SESSION['id'].';';
            $user = mysqli_fetch_assoc(Con($query));
            if($user['pic'] == 0)
                if($user['gender'])
                    $pic = 'pic/profile/sterling.png';
                else
                    $pic = 'pic/profile/lana.png';
            else
                $pic = 'pic/profile/user/'.$user['username'].'.jpg';
            
                echo '<div id="header">
            <p class="subtitle">Moj profil</p>
        </div>
        <div id="basicInfo">
            <div id="picture" style = "background-image: url(\''.$pic.'\')"></div>
            <div id="myInfo">
                <div id="myUserName">
                    <p>@'.$user['username'].'</p>
                    <button id="buttonEdit">Uredi profil</button>
                </div>
                <div id="myName">'.$user['name'].'</div>
                <div id="mySurname">'.$user['surname'].'</div>
                <div id="myDescription">'.$user['description'].'</div>
            </div>
        </div>';

        ?>
        
        <div id="rest">
            <div id="host" class="subtitle">
                <p>Moji dogadjaji</p>
                
                <?php

                    $data = array();
                    $query = 'SELECT * FROM `event` LEFT JOIN event_coorganiser ON event_coorganiser.event_id = `event`.id WHERE `event`.organiser_id = '.$_SESSION['id'].' OR event_coorganiser.coorganiser_id = '.$_SESSION['id'].';';
                    //$query = 'SELECT * FROM `event`;';
                    $events = Con($query);
                    echo "<script>let databaseData1 = [];</script>";
                    for($i = 0; $i < mysqli_num_rows($events); $i++)
                    {
                        $event = mysqli_fetch_assoc($events);
                        $data[] = array(
                            'name' => $event['name'],
                            'description' => $event['description'],
                            'start_datetime' => $event['start_datetime'],
                            'finish_datetime' => $event['finish_datetime']
                        );
                        echo "<script>databaseData1 = " . json_encode($data) . ";</script>";
                        //echo DisplayEventCard($event['id']);
                    }
                    
                ?>
                <div id="cardForNoHostedEvents">Zelite li da organizujete svoj dogadjaj?</div>
                    <div id="templateCarousel1">
                        <div id="carousel-container1"></div>
                        <div id="previous1"><button id="prev-button1">Previous</button></div>
                        <div id="next1"><button id="next-button1">Next</button></div>
                    </div>
                </div>
            </div>


            <div id="participant" class="subtitle">
                <p>Dogadjaji na kojim ucestvujem</p>
                
                <?php
                    include_once("back/display_card.php");

                    $data = array();
                    $query = 'SELECT * FROM `event` INNER JOIN volunteering ON event.id = volunteering.event_id WHERE volunteering.volunter_id = '.$_SESSION['id'].';';
                    $events = Con($query);
                    echo "<script>let databaseData2 = [];</script>";
                    for($i = 0; $i < mysqli_num_rows($events); $i++)
                    {
                        $event = mysqli_fetch_assoc($events);
                        $data[] = array(
                            'name' => $event['name'],
                            'description' => $event['description'],
                            'start_datetime' => $event['start_datetime'],
                            'finish_datetime' => $event['finish_datetime']
                        );
                        echo "<script>databaseData2 = " . json_encode($data) . ";</script>";
                        //echo DisplayEventCard($event['id']);
                    }
                    
                ?>
                <div id="cardForNoParticipatedEvents">Zelite li da ucestvujete u nekom dogadjaju?</div>
                    <div id="templateCarousel2">
                        <div id="carousel-container2"></div>
                        <div id="previous2"><button id="prev-button2">Previous</button></div>
                        <div id="next2"><button id="next-button2">Next</button></div>
                    </div>
                </div>
            </div>
        </div>
    <script src="profileMyHost.js"></script>
    <script src="profileMyParticipant.js"></script>
</body>
</html>