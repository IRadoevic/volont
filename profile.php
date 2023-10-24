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

        <div id="header">
            <p class="subtitle">Moj profil</p>
        </div>
        <div id="basicInfo">
            <div id="picture"></div>
            <div id="myInfo">
                <div id="myUserName">
                    <p>@username</p>
                    <button id="buttonEdit">Uredi profil</button>
                </div>
                <div id="myName">mojeIme</div>
                <div id="mySurname">mojePrezime</div>
                <div id="myDescription">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia architecto quam eius optio animi explicabo reprehenderit minima consectetur culpa facilis. Architecto</div>
            </div>
        </div>
        <div id="rest">
            <div id="hosIfNE" class="subtitle">
                <p>Moji dogadjaji</p>
                
            <?php
                include_once("back/display_card.php");

                $query = 'SELECT * FROM `event`;';
                $events = Con($query);
                $data = array();
                for($i = 0; $i < mysqli_num_rows($events); $i++)
                {
                    $event = mysqli_fetch_assoc($events);
                    $data[] = array(
                        'name' => $event['name'],
                        'description' => $event['description'],
                        'start_datetime' => $event['start_datetime'],
                        'finish_datetime' => $event['finish_datetime']
                    );
                    echo "<script>var databaseData = " . json_encode($data) . ";</script>";
                    //echo DisplayEventCard($event['id']);
                    
                }
            ?>
            <div id="templateCarousel">
                <div id="carousel-container"></div>
                <div id="previous"><button id="prev-button">Previous</button></div>
                <div id="next"><button id="next-button">Next</button></div>
            </div>
            </div>
        </div>
    </div>
    <script>
        let currentIndex = 0; // Track the current index

        function renderCarousel() {
            const carouselContainer = document.getElementById('carousel-container');
            carouselContainer.innerHTML = ''; // Clear existing content

            for (let i = currentIndex; i < currentIndex + 3; i++) {
                if (databaseData[i]) { // Ensure there is data to display
                    const row = databaseData[i];
                    const template = `
                    <div class='container'>
                    <div class='image'>
                        <img src='pic/image.png'>
                    </div>
                    <div class='overlay'>
                        <p>${row.name}</p>
                        <p>${row.description}</p>
                        <p>${row.start_datetime}</p>
                        <p>${row.finish_datetime}</p>
                    </div>
                </div>
                `;
                    carouselContainer.innerHTML += template;
                }
            }
        }
        renderCarousel();
        const prevButton = document.getElementById('prev-button');
        const nextButton = document.getElementById('next-button');

        prevButton.addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex -= 1;
                renderCarousel();
            }
        });

        nextButton.addEventListener('click', () => {
            if (currentIndex + 1 < databaseData.length) {
                currentIndex += 1;
                renderCarousel();
            }
        });
    </script>
</body>
</html>