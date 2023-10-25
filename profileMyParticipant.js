let currentIndex = 0;

        function renderCarousel2() {
            const carouselContainer = document.getElementById('carousel-container2');
            const prevButton = document.getElementById('prev-button2');
            const nextButton = document.getElementById('next-button2');
            const cardForNoHostedEvents = document.getElementById('cardForNoHostedEvents');
            carouselContainer.innerHTML = '';
            if(databaseData2.length < 4){
                prevButton.style.display = "none";
                nextButton.style.display = "none";
            }
            if(databaseData2.length == 0){
                cardForNoHostedEvents.style.display = "block";
            }
            else{
                for (let i = currentIndex; i < currentIndex + 3; i++) {
                    if (databaseData2[i]) {
                        const row = databaseData2[i];
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
        }
        renderCarousel2();
        const prevButton = document.getElementById('prev-button2');
        const nextButton = document.getElementById('next-button2');

        prevButton.addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex -= 1;
                renderCarousel2();
            }
        });

        nextButton.addEventListener('click', () => {
            if (currentIndex + 1 < databaseData2.length) {
                currentIndex += 1;
                renderCarousel2();
            }
        });