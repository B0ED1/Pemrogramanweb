document.addEventListener("DOMContentLoaded", () => {
    const carousels = document.querySelectorAll('.product-section');

    carousels.forEach(section => {
        const track = section.querySelector('.carousel-track');
        const dotsContainer = section.querySelector('.carousel-dots');
        let cards = Array.from(track.children);
        
        cards.forEach((card, index) => {
            card.dataset.index = index;
        });

        dotsContainer.innerHTML = '';
        cards.forEach((_, index) => {
            const dot = document.createElement('span');
            dot.classList.add('dot');
            if (index === 0) dot.classList.add('active');
            dotsContainer.appendChild(dot);
        });
        
        const dots = Array.from(dotsContainer.children);
        const prevBtn = section.querySelector('.prev-arrow');
        const nextBtn = section.querySelector('.next-arrow');
        
        let isMoving = false; 

        const updateDots = () => {
            const activeIndex = track.firstElementChild.dataset.index;
            dots.forEach(dot => dot.classList.remove('active'));
            if(dots[activeIndex]) {
                dots[activeIndex].classList.add('active');
            }
        };

        const moveNext = () => {
            if (isMoving) return;
            isMoving = true;

            const cardWidth = track.firstElementChild.getBoundingClientRect().width;
            const gap = 20;
            const moveAmount = cardWidth + gap;

            track.style.transition = 'transform 0.5s ease-in-out';
            track.style.transform = `translateX(-${moveAmount}px)`;

            setTimeout(() => {
                track.style.transition = 'none';
                track.appendChild(track.firstElementChild);
                track.style.transform = 'translateX(0)';
                updateDots();
                isMoving = false;
            }, 500); 
        };

        const movePrev = () => {
            if (isMoving) return;
            isMoving = true;

            const cardWidth = track.firstElementChild.getBoundingClientRect().width;
            const gap = 20;
            const moveAmount = cardWidth + gap;

            track.style.transition = 'none';
            track.prepend(track.lastElementChild);
            track.style.transform = `translateX(-${moveAmount}px)`;

            track.offsetHeight; 

            track.style.transition = 'transform 0.5s ease-in-out';
            track.style.transform = 'translateX(0)';

            setTimeout(() => {
                updateDots();
                isMoving = false;
            }, 500);
        };

        nextBtn.addEventListener('click', () => {
            moveNext();
            resetAutoSlide();
        });

        prevBtn.addEventListener('click', () => {
            movePrev();
            resetAutoSlide();
        });

        let autoSlideInterval = setInterval(moveNext, 3000);

        const resetAutoSlide = () => {
            clearInterval(autoSlideInterval);
            autoSlideInterval = setInterval(moveNext, 3000);
        };
    });
});