let currentIndex = 0;

        function renderCarousel1() {
            const carouselContainer = document.getElementById('carousel-container1');
            const prevButton = document.getElementById('prev-button1');
            const nextButton = document.getElementById('next-button1');
            const cardForNoHostedEvents = document.getElementById('cardForNoHostedEvents');
            carouselContainer.innerHTML = '';
            if(databaseData1.length < 4){
                prevButton.style.display = "none";
                nextButton.style.display = "none";
            }
            if(databaseData1.length == 0){
                cardForNoHostedEvents.style.display = "block";
            }
            else{
                for (let i = currentIndex; i < currentIndex + 3; i++) {
                    if (databaseData1[i]) {
                        const row = databaseData1[i];
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
        renderCarousel1();
        const prevButton = document.getElementById('prev-button1');
        const nextButton = document.getElementById('next-button1');

        prevButton.addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex -= 1;
                renderCarousel1();
            }
        });

        nextButton.addEventListener('click', () => {
            if (currentIndex + 1 < databaseData1.length) {
                currentIndex += 1;
                renderCarousel1();
            }
        });