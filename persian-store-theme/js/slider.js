document.addEventListener('DOMContentLoaded', function () {
    const slider = document.querySelector('.homepage-slider');
    if (!slider) {
        return;
    }

    const slides = slider.querySelectorAll('.slide');
    const nextButton = slider.querySelector('.slider-next');
    const prevButton = slider.querySelector('.slider-prev');
    let currentSlide = 0;

    // If no slides or only one slide, hide buttons and stop
    if (!slides.length || slides.length <= 1) {
        if (nextButton) {
            nextButton.style.display = 'none';
        }
        if (prevButton) {
            prevButton.style.display = 'none';
        }
        // If there's exactly one slide, ensure it's active (CSS might already do this)
        if (slides.length === 1 && !slides[0].classList.contains('active-slide')) {
             slides.forEach(s => s.classList.remove('active-slide')); // Clear just in case
             slides[0].classList.add('active-slide');
        }
        return;
    }

    function goToSlide(n) {
        slides[currentSlide].classList.remove('active-slide');
        // slides[currentSlide].style.display = 'none'; // Alternative to class toggling if needed

        currentSlide = (n + slides.length) % slides.length; // Loop behavior

        slides[currentSlide].classList.add('active-slide');
        // slides[currentSlide].style.display = 'flex'; // Alternative
    }

    function nextSlide() {
        goToSlide(currentSlide + 1);
    }

    function prevSlide() {
        goToSlide(currentSlide - 1);
    }

    if (nextButton) {
        nextButton.addEventListener('click', function (e) {
            // e.preventDefault(); // Not strictly necessary for <button> elements
            nextSlide();
        });
    }

    if (prevButton) {
        prevButton.addEventListener('click', function (e) {
            // e.preventDefault(); // Not strictly necessary for <button> elements
            prevSlide();
        });
    }

    // Ensure first slide is active on load and others are not.
    // CSS handles initial display:none for .slide and display:flex for .active-slide
    // This JS ensures the correct slide has the .active-slide class.
    slides.forEach((slide, index) => {
        if (index === 0) {
            slide.classList.add('active-slide');
        } else {
            slide.classList.remove('active-slide');
        }
    });
    currentSlide = 0; // Explicitly set currentSlide to 0

    // Optional: Auto-play (Uncomment to enable)
    /*
    let slideInterval = setInterval(nextSlide, 5000); // Change 5000 to desired interval in ms

    // Pause on hover
    slider.addEventListener('mouseenter', () => {
        clearInterval(slideInterval);
    });

    // Resume on mouse leave
    slider.addEventListener('mouseleave', () => {
        slideInterval = setInterval(nextSlide, 5000);
    });
    */
});
