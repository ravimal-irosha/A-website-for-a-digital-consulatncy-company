<footer>
    <div class="container">
        <p>&copy; 2025 BizBud. All Rights Reserved. | <a href="login.php" style="color: #555; text-decoration: none;">Admin Login</a></p>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // --- Scroll Animation Logic ---
        const animatedElements = document.querySelectorAll('.hero-content, .scroll-animate');

        if (animatedElements.length > 0) {
            if ('IntersectionObserver' in window) {
                const observer = new IntersectionObserver((entries, obs) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('in-view');
                            obs.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.1 }); // Trigger when 10% of the element is visible

                animatedElements.forEach(el => observer.observe(el));
            } else {
                // Fallback for older browsers: show all animations immediately
                animatedElements.forEach(el => el.classList.add('in-view'));
            }
        }

        // --- Hero Background Zoom Effect on Scroll ---
        const heroSection = document.querySelector('.hero-section');
        if (heroSection) {
            window.addEventListener('scroll', function() {
                if (window.scrollY > 5) {
                    heroSection.classList.add('scrolled');
                } else {
                    heroSection.classList.remove('scrolled');
                }
            }, { passive: true });
        }

        // --- Testimonial Slider ---
        $('.testimonial-slider').slick({
            dots: true,
            infinite: true,
            speed: 500,
            slidesToShow: 1,
            adaptiveHeight: true,
            autoplay: true,
            autoplaySpeed: 5000,
            arrows: false
        });

        // --- Mobile Menu ---
        const menuToggle = document.getElementById('mobile-menu-toggle');
        const mainNav = document.getElementById('main-nav');
        const body = document.body;

        if (menuToggle && mainNav) {
            menuToggle.addEventListener('click', function() {
                body.classList.toggle('mobile-menu-open');
            });

            // Close menu when a nav link is clicked
            mainNav.addEventListener('click', function(e) {
                if (e.target.tagName === 'A') {
                    body.classList.remove('mobile-menu-open');
                }
            });
        }
    });
</script>
</body>
</html>
