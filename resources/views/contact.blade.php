<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>contactus</title>
    <script src="https://kit.fontawesome.com/3fe8ce8fe8.js" crossorigin="anonymous"></script>
</head>
<style>
          * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    width:100%;
    background-image: url(image/ladingpage.png);
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
footer{
    margin-top: 4rem;
    width: 100%;
}
.footer{
    display: flex;
    justify-content: center;
    justify-content: space-around;
    background-color: #FFF9F2;
    border-bottom: 1px dashed #333;
    color: #333;
    width: 100%;

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
.contact-container{
    border-bottom: 1px solid white;
    background: rgba( 255, 255, 255, 0.5 );
    box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
    backdrop-filter: blur( 7.5px );
    -webkit-backdrop-filter: blur( 7.5px );
    border-radius: 10px;
    padding: 4rem;
    font-size: 16px;
    margin-top: 7%;
   display: block;
   width: fit-content;
   margin-left: 25%;
}
.contact-container h2{
    text-align: center;
}

#contact-form{
   color: #333;
    width: 540px;
}
label{
    width: 100%;
}
input{
    width: 100%;
}
input{
    width: 100%;
    border: 2px solid whitesmoke;
    height: 50px;
    border-radius: 10px;
    margin: 5px 0;
    background-color: none;
    padding-left: 1rem;
}
#message{
    height: 80px;
}

.btn{
    display: flex;
    justify-content: space-between;

}
.btn a{
    color: #333;
    text-decoration: none;
}
.btn a:hover{
    color: red;
}
.cancle{
   background-color: white;
   color: #333;
   border-radius: 6px;
  border-width: 0;
  box-shadow: rgba(93, 71, 50, 0.1) 0 0 0 1px inset,rgba(93, 77, 50, 0.1) 0 2px 5px 0,rgba(0, 0, 0, .07) 0 1px 1px 0;
  box-sizing: border-box;
  color: #333;
  cursor: pointer;
  font-family: -apple-system,system-ui,"Segoe UI",Roboto,"Helvetica Neue",Ubuntu,sans-serif;
  font-size: 100%;
  height: 44px;
  line-height: 1.15;
  margin: 12px 0 0;
  outline: none;
  overflow: hidden;
  padding: 0 25px;
}
.summit{
  appearance: button;
  backface-visibility: hidden;
  background-color: #ff9925;
  border-radius: 6px;
  border-width: 0;
  box-shadow: rgba(93, 71, 50, 0.1) 0 0 0 1px inset,rgba(93, 77, 50, 0.1) 0 2px 5px 0,rgba(0, 0, 0, .07) 0 1px 1px 0;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  font-family: -apple-system,system-ui,"Segoe UI",Roboto,"Helvetica Neue",Ubuntu,sans-serif;
  font-size: 100%;
  height: 44px;
  line-height: 1.15;
  margin: 12px 0 0;
  outline: none;
  overflow: hidden;
  padding: 0 25px;
  position: relative;
  text-align: center;
  text-transform: none;
  transform: translateZ(0);
  transition: all .2s,box-shadow .08s ease-in;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.summit:disabled {
  cursor: default;
}

.summit:focus {
  box-shadow: rgba(93, 70, 50, 0.1) 0 0 0 1px inset, rgba(93, 76, 50, 0.2) 0 6px 15px 0, rgba(0, 0, 0, .1) 0 2px 2px 0, rgba(50, 151, 211, .3) 0 0 0 4px;
}
.summit:hover{
    background-color:#ff8800;
}
</style>
<body>
    <header>
        <nav>
            <img src="image/logo 1.png" alt="">
            <h2>hisabkitab</h2>
            <ul>
                <li><a href="landing.html">Home</a></li>
                <li><a href="landing.html">About</a></li>
                <li><a href="landing.html">Services</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li class="log"><a href="login.html">login</a></li>
                <li class="started"><a href="signin.html">Get started</a></li>
            </ul>
        </nav>
    </header>
    <div class="contact-container">
        <h2>Contact Us</h2>
        <form id="contact-form">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="username" required>
                <label for="password">email:</label>
                <input type="password" id="password" name="email" placeholder="email" required>
                <label for="business-name">Name of business</label>
                <input type="text" name="business-name" id="business-name" placeholder="business name">
                <label for="number">Phone number</label>
                <input type="text" for="number" id="number" placeholder="+977 98......">
                <label for="pan-num">Message</label>
                <input type="text" for="message" id="message" placeholder="Message">
                <div class="btn"><button class="cancle"> <a href="landing.html">Cancle</a></button>
                <button type="submit" class="summit">summit</button></div>

        </form>
    </div>
    <footer>

        <div class="footer">
            <div>
                <img src="image/logo 1.png" alt="">
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
</body>
</html>
