<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="front\css\index.css">
        <title>Document</title>
    </head>
    <body>
            <div id="wrapper">
                <div id = "header"></div>
                <div id = "regularOffers"></div>
                <div id = "search">
                    <div id="searchHolder">
                        <input type="button" value="FIlteri" id="filterButton">
                        <input type="search" name="pretragaDogadjaj" id="mainSearch">
                        <input type="button" value="Pretrazi" id="searchButton">
                    </div>
                </div>
                <div id = "offers">
                    <!-- <?php
                    include_once("back/db\-coon.php");
                        include_once("back/display_card.php");

                        $query = "SELECT id FROM 'event';";
                        $events = Con($query);
                        for($i = 0; i < mysqli_num_rows($events); $i++)
                        {
                            $event = mysqli_fetch_assoc($events);
                            echo display_card($event['id']);
                        }
                    ?> -->
                </div>
            </div>    
    </body>
</html>