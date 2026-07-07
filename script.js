document.addEventListener('DOMContentLoaded', function() {
    // Hero Slider
    const slides = document.querySelectorAll('.slide');
    if (slides.length > 0) {
        let currentSlide = 0;
        function nextSlide() {
            slides[currentSlide].classList.remove('active');
            currentSlide = (currentSlide + 1) % slides.length;
            slides[currentSlide].classList.add('active');
        }
        setInterval(nextSlide, 5000);
    }

    // Mobile Menu
    const mobileToggle = document.getElementById('mobile-menu');
    const nav = document.getElementById('nav');
    if (mobileToggle) {
        mobileToggle.addEventListener('click', () => {
            nav.classList.toggle('active');
        });
    }

    // Project Modal Logic
    window.openProject = function(id) {
        const modal = document.getElementById('modal-' + id);
        if(modal) {
            modal.style.display = 'block';
            document.body.style.overflow = 'hidden'; 
        }
    }

    window.closeProject = function(id) {
        const modal = document.getElementById('modal-' + id);
        if(modal) {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
    }

    // Close modal when clicking outside
    window.onclick = function(event) {
        if (event.target.classList.contains('modal')) {
            event.target.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
    }
});