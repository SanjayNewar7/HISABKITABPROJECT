<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Layout</title>
    <script src="https://kit.fontawesome.com/3fe8ce8fe8.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="landing.css"> -->
</head>
<body>
    <style>
        /* Reset basic styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    width:100%;
    background-image: url('{{ asset('images/ladingpage.png') }}');
    background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;

}

/* Header styles */
header {
    position: fixed;
    z-index: +1;
    top: 0;
    width: 100%;
    color:#333;
    padding: 20px 20px;
    text-align: center;
    border-bottom: 1px solid white;
    background: rgba( 255, 255, 255, 0.5 );
    box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
    backdrop-filter: blur( 7.5px );
    -webkit-backdrop-filter: blur( 7.5px );
    border-radius: 10px;
}

header h1 {
    margin-bottom: 10px;
}
nav{
    display: flex;
}
header nav img{
    height: 28px;
    width: 28px;
}
header nav ul {
    list-style: none;
    align-content: center;
    padding: 0;
    margin-left: 6rem;
}

header nav ul li {
    display: inline;
    align-content: center;
    margin: 0 10px;
}

header nav ul li a {
    color: #333;
    text-decoration: none;
    transition: 0.5;
}

.log{
    margin-left: 40rem;
}
.started{
    border: 1px solid #333;
    border-radius: 5px;
    padding: 10px 5px;
    transition: 0.5s;
}
header nav ul li:hover a{
    color: #FD8600;
}
/* get started button on nav */
.started:hover{
    border-color: #FD8600;
    background-color: #FFF1E0;
}
.started {
  display: inline-block;
  vertical-align: middle;
  -webkit-transform: perspective(1px) translateZ(0);
  transform: perspective(1px) translateZ(0);
  box-shadow: 0 0 1px rgba(0, 0, 0, 0);
  -webkit-transition-duration: 0.3s;
  transition-duration: 0.3s;
  -webkit-transition-property: box-shadow, transform;
  transition-property: box-shadow, transform;
}
.started:hover, .started:focus, .started:active {
  box-shadow: 0 10px 10px -10px rgba(0, 0, 0, 0.5);
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}


/* container */
 .main{
    display: block;
    margin-top: 8rem;
 }
.container{
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 6rem;
}
.image img{
    height: 500px;
    width: 600px;
}
.text{
    color: #333;
    display: block;
}
.text h5{
    font-size: 35px;
    margin-bottom: 2rem;
}
/* get started button on container */
.start_btn{
    position: relative;
    z-index: 0;
    border: 2px solid #ffffff;
    height: 3.5rem;
    width: 14rem;
    border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #FD8600;
    color: #ffffff;
    font-size: 20px;
    margin-top: 5rem;
    text-decoration: none;
}
.start_btn {
  display: flex;
  justify-content: center;
    align-items: center;
  vertical-align: middle;
  -webkit-transform: perspective(1px) translateZ(0);
  transform: perspective(1px) translateZ(0);
  box-shadow: 0 0 1px rgba(0, 0, 0, 0);
  position: relative;
  -webkit-transition-property: color;
  transition-property: color;
  -webkit-transition-duration: 0.3s;
  transition-duration: 0.3s;
}
.start_btn:before {
  content: "";
  position: absolute;
  z-index: -1;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: #2098D1;
  border-radius: 8px;
  -webkit-transform: scaleX(0);
  transform: scaleX(0);
  -webkit-transform-origin: 0 50%;
  transform-origin: 0 50%;
  -webkit-transition-property: transform;
  transition-property: transform;
  -webkit-transition-duration: 0.3s;
  transition-duration: 0.3s;
  -webkit-transition-timing-function: ease-out;
  transition-timing-function: ease-out;
}
.start_btn:hover, .start_btn:focus, .start_btn:active {
  color: white;
}
.start_btn:hover:before, .start_btn:focus:before, .start_btn:active:before {
  -webkit-transform: scaleX(1);
  transform: scaleX(1);
}
/* serive we provide */
.service_heading{
    text-align: center;
    font-size: 55px;
    color: #FD8600;
    margin-top: 5rem;
}
.service{
    position: relative;
    z-index: -1;
    display: flex;
    justify-content: center;
    align-items: center;
    justify-content: space-evenly;
    margin-top: 2rem;
}
.service div{
    width: 256px;
    height: 208px;
    padding: 10px;
    background: rgba( 255, 255, 255, 0.5 );
    box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
    backdrop-filter: blur( 7.5px );
    -webkit-backdrop-filter: blur( 7.5px );
    border-radius: 10px;
}
.service div img{
    height: 51px;
    width: 51px;
    margin-top: 5px;
    margin-left: 5px;
}
.service div span{
    font-size: 15px;
    font-weight: 900;
}
.service div p{
    text-align: center;
   margin-top: 1rem;
}

.security{
    display: flex;
    background-color: #FD8600;
    margin-top: 5rem;
}
.security img{
    width: 500px;
    height: 500px;
}
.security_text{
    margin-right: 5rem;
    display: block;
    justify-content: center;
    align-content: center;
}
.security_text p{
    text-align: end;
    color: #ffffff;
    font-size: 16px;
}
.security_text h3{
    text-align: end;
    color: #ffffff;
    font-size: 36px;
}
.security_text h5{
    text-align: end;
    color: #ffffff;
    font-size: 22px;
}

.about_us_heading{
    margin-top: 3rem;
    font-size: 36px;
    text-align: center;

}
.about_us{
    display: flex;
    margin: 4rem;
}
.about_us img{
    width: 255px;
    height: 255px;
    margin-left: 4rem;
}
/* footer style */
.footer{
    padding-top: 1rem;
    display: flex;
    justify-content: center;
    justify-content: space-around;
    background-color: #FFF9F2;
    border-bottom: 1px dashed #333;
    color: #333;

}
.footer img{
    height: 80px;
    width: 80px;
}
.footer h4{
    font-size: 24px;
    font-weight: 100;
}
.footer h6{
    font-weight: 100;
    text-align: center;
    font-size: 14px;
}
.footer_logo{
    display: flex;
    justify-content: center;
    justify-content: space-around;
    margin-top: 1rem;
}
.footer_logo i{
   font-size: 24px;
}
/* Grow Rotate */
.footer_logo i {
  display: inline-block;
  vertical-align: middle;
  -webkit-transform: perspective(1px) translateZ(0);
  transform: perspective(1px) translateZ(0);
  box-shadow: 0 0 1px rgba(0, 0, 0, 0);
  -webkit-transition-duration: 0.3s;
  transition-duration: 0.3s;
  -webkit-transition-property: transform;
  transition-property: transform;
}
.footer_logo i:hover, .footer_logo i:focus, .footer_logo i:active {
  -webkit-transform: scale(1.1) rotate(4deg);
  transform: scale(1.1) rotate(4deg);
  color: #FD8600;
}
.last_footer{
    text-align: center;
    background-color:#FFF9F2;
}
/* this is animation */
/* Base hidden state for all animations */
.scroll-hidden {
    opacity: 0;
    transform: translateY(50px);
    transition: opacity 1s ease-out, transform 1s ease-out;
}

/* Fade-in animation */
.scroll-fade-in {
    opacity: 1;
    transform: translateY(0);
}

/* Slide-in from the left */
.scroll-slide-left {
    transform: translateX(-100px);
    transition: opacity 1s ease-out, transform 1s ease-out;
}

.scroll-visible-left {
    opacity: 1;
    transform: translateX(0);
}

/* Slide-in from the right */
.scroll-slide-right {
    transform: translateX(100px);
    transition: opacity 1s ease-out, transform 1s ease-out;
}

.scroll-visible-right {
    opacity: 1;
    transform: translateX(0);
}

/* Zoom-in animation */
.scroll-zoom-in {
    transform: scale(0.8);
    transition: opacity 1s ease-out, transform 1s ease-out;
}

.scroll-visible-zoom {
    opacity: 1;
    transform: scale(1);
}
    </style>
    <!-- Header Section -->
    <header>
        <nav>
            <img src="{{ asset('images/logo 1.png') }}" alt="Logo">
            <h2>hisabkitab</h2>
            <ul>
                <li><a href="{{ route('welcome') }}">Home</a></li>


                <li><a href="#about_us">About</a></li>
                <li><a href="#service">Services</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li class="log"><a href="{{ route('login') }}">Login</a></li>

                <li class="started"><a href="{{ route('signup') }}">Get started</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main Content Section -->
  <div class="main">
    <div class="container">
        <div class="text">
            <h5 class="scroll-hidden">Smarter Decisions Start
                with Hisab Kitab !</h5>
            <p class="scroll-hidden">
                Monitor sales, track performance, and optimize operations—
                all from one user-friendly platform.
            </p>
            <a href="signin.html" class="start_btn scroll-hidden scroll-slide-left">Get started</a>
        </div>
        <div class="image scroll-hidden scroll-zoom-in">
            <img src="{{ asset('images/dashboard.png') }}" alt="Dashboard Image">
        </div>
    </div>
</div>

       <!-- <-----serive we provide---->
        <div class="service_heading " id="service">service we provide</div>
        <div class="service">

            <div class="total  scroll-hidden">
                <img src="{{ asset('images/7479646_questionnaire_survey_checklist_list_clipboard_icon 1.png') }}" alt=""><span>Total Orders</span>
                <p>Monitor the number of orders placed
                    in real-time and stay on top of daily
                    operations.</p>

            </div>
            <div class="sales scroll-hidden">
                <img src="{{ asset('images/5027854_analytics_business_chart_graph_statistics_icon 1.png') }}" alt="">
            <span>Sales Progress</span>
            <p>Compare current sales with past records to understand growth
            patterns and business performance over time.</p>
        </div>
            <div class="peakhour scroll-hidden">
                <img src="{{ asset ('images/2530808_alarm_clock_deadline_general_office_icon (1) 1.png') }}" alt="">
                <span>Peak Hours</span>
                <p>Know the busiest times of day so you
                    can manage staffing and inventory
                    more effectively.</p>
            </div>
            <div class="topselling scroll-hidden ">
                <img src="{{ asset ('images/10934659_top_brand_quality_product_shopping_icon 1.png') }}" alt="">
                <span>Top Selling Items</span>
                <p>Identify your best-performing items and focus on promoting what
                    works.</p>
            </div>

        </div>
        <div class="security">
            <img src="{{ asset('images/331815476_7a1c2c3a-48b0-4190-aea9-4ae1534fa7dd-removebg-preview 1.png') }}" class="scroll-hidden scroll-slide-left">
            <div class="security_text scroll-hidden scroll-slide-right" >
                <h3>Security and Reliability</h3>
                <h5>Safe, Secure, and Reliable</h5>
                <p>We take data security seriously. Hisab Kitab uses robust security measures, including
                    SSL encryption and role-based access control (RBAC), to ensure your business data
                    is always secure. Only authorized personnel can access critical features and data.</p>
            </div>
        </div>
        <h4 class="about_us_heading scroll-hidden scroll-fade-in"> about us</h4>
        <div class="about_us" id="about_us">
           <p class="scroll-hidden">At Hisab Kitab, we are dedicated to empowering small businesses by providing them with an easy-to-use,
            web-based analytics platform that simplifies the management of daily operations. Born out of the challenges
            that cafes, restaurants, and other small-scale businesses face in manual tracking, our mission is to help
            business owners make smarter, data-driven decisions.
            We understand that small businesses often struggle to keep track of their orders, monitor peak hours, and
            identify top-selling products efficiently. That’s why we created Hisab Kitab—to deliver a solution that not only
            saves time but also enhances business performance by providing real-time insights and powerful analytics.
            Our platform is built with the goal of transforming how businesses operate. With features like total order tracking,
            sales progress monitoring, and admin-level control, Hisab Kitab allows businesses to take control of their data,
            optimize operations, and focus on what matters most—growth and customer satisfaction.
            We’re passionate about helping businesses succeed. Whether you’re a cafe owner or running a small restaurant,
            Hisab Kitab is here to simplify your journey and provide the tools you need to thrive in today’s competitive landscape.
        </p>
        <img src="{{ asset('images/logo 1.png') }}" class=" scroll-hidden scroll-slide-right">


        </div>
    </div>
    <!-- Footer Section -->
    <footer>

        <div class="footer">
            <div>
                <img src="{{ asset('images/logo 1.png') }}" alt="logo of hisab kitab">
                <h6>Bharatpur-04, Chitwan</h6>
            </div>
            <div>
                <h4>CONTACT US</h4>
                <h6>9817262424,<br>
                    9817262424 <br>
                    Hisabkitabinfo@gmail.com
                </h6>
            </div>
            <div>
                <h4>FOLLOW US ON</h4>
                <div class="footer_logo">
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-x-twitter"></i>
                <i class="fa-brands fa-linkedin"></i>
                </div>
            </div>


        </div>
      <div class="last_footer">Hisabkitab © 2023 All Rights Reserved</div>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Select all elements that need to animate on scroll
            const scrollElements = document.querySelectorAll('.scroll-hidden');

            // Function to check if an element is in the viewport
            const elementInView = (el, percentageScroll = 1) => {
                const elementTop = el.getBoundingClientRect().top;
                const elementBottom = el.getBoundingClientRect().bottom;
                return (
                    elementTop <= (window.innerHeight || document.documentElement.clientHeight) * percentageScroll &&
                    elementBottom >= 0
                );
            };

            // Function to check if an element is out of the viewport
            const elementOutOfView = (el) => {
                const elementTop = el.getBoundingClientRect().top;
                const elementBottom = el.getBoundingClientRect().bottom;
                return (
                    elementBottom < 0 || elementTop > (window.innerHeight || document.documentElement.clientHeight)
                );
            };

            // Add the 'scroll-visible' class based on different animations
            const displayScrollElement = (element) => {
                if (element.classList.contains('scroll-slide-left')) {
                    element.classList.add('scroll-visible-left');
                } else if (element.classList.contains('scroll-slide-right')) {
                    element.classList.add('scroll-visible-right');
                } else if (element.classList.contains('scroll-zoom-in')) {
                    element.classList.add('scroll-visible-zoom');
                } else {
                    // Default fade-in animation
                    element.classList.add('scroll-fade-in');
                }
            };

            // Remove the 'scroll-visible' class when elements are out of view
            const hideScrollElement = (element) => {
                if (element.classList.contains('scroll-slide-left')) {
                    element.classList.remove('scroll-visible-left');
                } else if (element.classList.contains('scroll-slide-right')) {
                    element.classList.remove('scroll-visible-right');
                } else if (element.classList.contains('scroll-zoom-in')) {
                    element.classList.remove('scroll-visible-zoom');
                } else {
                    // Default fade-out
                    element.classList.remove('scroll-fade-in');
                }
            };

            // Function to handle scrolling and animating elements
            const handleScrollAnimation = () => {
                scrollElements.forEach((el) => {
                    if (elementInView(el, 0.9)) {
                        displayScrollElement(el);
                    } else if (elementOutOfView(el)) {
                        hideScrollElement(el); // Revert to hidden state if out of view
                    }
                });
            };

            // Listen for scroll events
            window.addEventListener('scroll', () => {
                handleScrollAnimation();
            });

            // Initial check on page load
            handleScrollAnimation();
        });
    </script>
</body>
</html>
