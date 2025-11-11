<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BizBud - Modern Furniture</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="base.css">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="hero.css">
    <link rel="stylesheet" href="sections.css">
    <link rel="stylesheet" href="about.css">
    <link rel="stylesheet" href="testimonials.css">
    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="responsive.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
</head>
<body>

    <?php include 'header.php'; ?>

    <section id="home" class="hero-section">
        <div class="hero-background"></div>
        <div class="hero-overlay"></div>
        
        <div class="hero-content container">
            <h1>Unlock<br> Your Business Potential</h1>
            <p>Strategic insights and solutions for ambitious brands.</p>
            <a href="appointment.php" class="btn-primary">Book a Consultation</a>
        </div>
    </section>

    <section id="services" class="content-section">
        <div class="container">
            <h2 class="section-title scroll-animate">Our Services</h2>
            <div class="services-grid scroll-animate">
                <div class="service-item">
                    <div class="service-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                    </div>
                    <h3>Interior Design</h3>
                    <p>Expert consultation to create your perfect space.</p>
                </div>
                <div class="service-item">
                    <div class="service-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                    </div>
                    <h3>Custom Orders</h3>
                    <p>Furniture tailored to your exact specifications.</p>
                </div>
                <div class="service-item">
                    <div class="service-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                    </div>
                    <h3>Fast Delivery</h3>
                    <p>White-glove delivery service to your door.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="expertise" class="content-section bg-light">
        <div class="container">
            <h2 class="section-title scroll-animate">Our Expertise</h2>
            <p class="section-subtitle scroll-animate">We have deep experience across a range of dynamic industries.</p>
            <div class="expertise-grid scroll-animate">
                <div class="expertise-item">
                    <div class="expertise-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15A2.25 2.25 0 002.25 6.75v10.5A2.25 2.25 0 004.5 19.5z" />
                        </svg>
                    </div>
                    <h3>Financial Technology (FinTech)</h3>
                    <p>Navigating digital disruption in financial services, from blockchain to digital payments.</p>
                </div>
                <div class="expertise-item">
                    <div class="expertise-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                        </svg>
                    </div>
                    <h3>Software as a Service (SaaS)</h3>
                    <p>Strategies for growth, user acquisition, and retention in the competitive SaaS market.</p>
                </div>
                <div class="expertise-item">
                    <div class="expertise-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>
                    </div>
                    <h3>Healthcare & Life Sciences</h3>
                    <p>Improving patient outcomes and operational efficiency in a complex regulatory landscape.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="content-section about-section">
        <div class="container">
            <div class="about-grid">
                <div class="about-visual scroll-animate" aria-hidden="true">
                    <!-- decorative blob -->
                    <svg class="shape-decor" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                        <defs><linearGradient id="g" x1="0" x2="1"><stop offset="0" stop-color="#a5b4fc"/><stop offset="1" stop-color="#60a5fa"/></linearGradient></defs>
                        <path fill="url(#g)" d="M48.6,-61.8C63.2,-51.3,76.2,-37.4,83.6,-20.8C91.1,-4.1,92.9,15.2,84.4,28.3C75.9,41.4,57.9,48.4,40.2,53.2C22.5,58,5.1,60.6,-11.3,61.2C-27.7,61.7,-44.1,60.1,-55.2,50.6C-66.3,41.1,-72.1,23.7,-72.4,6.5C-72.6,-10.8,-67.3,-27.8,-57,-40C-46.6,-52.2,-31.3,-59.5,-15.2,-66.6C0.8,-73.7,17.6,-80.4,33.9,-73.1C50.2,-65.8,37.2,-72.4,48.6,-61.8Z" transform="translate(100 100)"/>
                    </svg>

                    <!-- sample product image -->
                    <img src="markus-spiske-3Wq2HI5mTaI-unsplash.jpg" alt="Showroom interior image">
                </div>

                <div class="about-content scroll-animate">
                    <h2>About Us</h2>
                    <p class="lead">We craft modern furniture that balances form and function. From concept to delivery, every piece is designed with attention to detail and built to last.</p>

                    <div class="about-features">
                        <div class="feature">
                            <svg viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 21v-7a4 4 0 014-4h10a4 4 0 014 4v7"/>
                                <path d="M7 10V6a5 5 0 0110 0v4"/>
                            </svg>
                            <div>
                                <h4>Premium Materials</h4>
                                <small>Durable & timeless</small>
                            </div>
                        </div>

                        <div class="feature">
                            <svg viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6"/>
                                <path d="M7 10V6a5 5 0 0110 0v4"/>
                            </svg>
                            <div>
                                <h4>Custom Design</h4>
                                <small>Bespoke solutions</small>
                            </div>
                        </div>
                    </div>

                    <div class="about-stats" aria-hidden="true">
                        <div class="stat">
                            <div class="num">12k+</div>
                            <div class="label">Happy Clients</div>
                        </div>
                        <div class="stat">
                            <div class="num">250+</div>
                            <div class="label">Designs Available</div>
                        </div>
                        <div class="stat">
                            <div class="num">5 yrs</div>
                            <div class="label">Average Warranty</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="testimonials" class="content-section bg-light">
        <div class="container">
            <h2 class="section-title">Client Stories</h2>
            <div class="testimonial-slider">
                <div class="testimonial-item">
                    <p class="testimonial-text">"The design team at BizBud transformed our living room into a modern oasis. Their attention to detail and commitment to quality is unmatched. We couldn't be happier with the result!"</p>
                    <div class="testimonial-author">- Alex & Jamie</div>
                </div>
                <div class="testimonial-item">
                    <p class="testimonial-text">"From the initial consultation to the final delivery, the process was seamless. The custom-ordered dining table is a work of art and the centerpiece of our home."</p>
                    <div class="testimonial-author">- Sarah L.</div>
                </div>
                <div class="testimonial-item">
                    <p class="testimonial-text">"Fast, professional, and the furniture is absolutely stunning. The white-glove delivery service was the cherry on top. Highly recommend BizBud for any modern furniture needs."</p>
                    <div class="testimonial-author">- Mark T.</div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="content-section">
        <div class="container">
            <h2 class="section-title scroll-animate">Get In Touch</h2>
            <div class="contact-grid">
                <div class="contact-details scroll-animate">
                    <div class="contact-item">
                        <div class="contact-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        </div>
                        <div>
                            <h4>Our Location</h4>
                            <p>No. 42, Galle Road, Colombo 03, Sri Lanka</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                        </div>
                        <div>
                            <h4>Opening Hours</h4>
                            <p>Open Daily: 10AM - 8PM</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.63A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        </div>
                        <div>
                            <h4>Call Us</h4>
                            <p>+94 11 234 5678</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        </div>
                        <div>
                            <h4>Email Us</h4>
                            <p><a href="mailto:contact@bizbud.com">contact@bizbud.com</a></p>
                        </div>
                    </div>
                </div>
                <div class="map-container scroll-animate">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.989959902535!2d79.8511110147727!3d6.89229419502087!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25bd27364e133%3A0x42c56253c5337526!2s42%20Galle%20Rd%2C%20Colombo%2000300%2C%20Sri%20Lanka!5e0!3m2!1sen!2sus!4v1678886400000!5m2!1sen!2sus" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
