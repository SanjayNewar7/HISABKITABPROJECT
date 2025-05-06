<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
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
    background-image: url('{{ asset('images/ladingpage.png') }}');
    background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
  display: flex;
  justify-content: center;
  align-items: center;

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
.login-container{
    border-bottom: 1px solid white;
    background: rgba( 255, 255, 255, 0.5 );
    box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
    backdrop-filter: blur( 7.5px );
    -webkit-backdrop-filter: blur( 7.5px );
    border-radius: 10px;
    padding: 4rem;
    font-size: 16px;
}
label{
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
.forget-password {
    text-align: right;
}
.signin{
    text-align: center;
    font-size: 12px;
}
.forget-password a , .signin a{
    font-size: 12px;
    text-decoration: none;
    color: #333;}
    .signin{
        margin-top: 1rem;
    }
button {
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
  width: 100%;
}
.error-message {
    color: red; /* Set the text color to red */
    font-size: 0.9em; /* Adjust the font size if needed */
    margin-top: 5px; /* Add some space above the error message */
}

button:disabled {
  cursor: default;
}

button:focus {
  box-shadow: rgba(93, 70, 50, 0.1) 0 0 0 1px inset, rgba(93, 76, 50, 0.2) 0 6px 15px 0, rgba(0, 0, 0, .1) 0 2px 2px 0, rgba(50, 151, 211, .3) 0 0 0 4px;
}
button:hover{
    background-color:#ff8800;
}
.forget-password a:hover{

    color: blue;

}
.signin a:hover{
    color: blue;
}
.password-container {
    position: relative; /* Position relative for the icon */
    width: 100%;
}

.password-container input {
    width: calc(100% - 30px); /* Adjust width to leave space for the icon */
}

.toggle-password {
    position: absolute;
    right: 10px; /* Position the icon */
    top: 50%;
    transform: translateY(-50%); /* Center the icon vertically */
    cursor: pointer;
    font-size: 1.2em; /* Adjust icon size */
    color: #333; /* Icon color */
}
/* Existing styles remain unchanged... */

/* Password Container styles */
.password-container {
    position: relative; /* Position relative for the icon */
    width: 100%;
}

.password-container input {
    width: 100%; /* Full width */
    border: 2px solid whitesmoke; /* Ensure it matches the existing input styles */
    height: 50px; /* Ensure the height is consistent with other inputs */
    border-radius: 10px; /* Match existing border radius */
    padding-left: 1rem; /* Left padding for input text */
    padding-right: 40px; /* Add right padding to avoid text overlap with the icon */
}

/* Toggle password visibility icon */
.toggle-password {
    position: absolute;
    right: 10px; /* Position the icon */
    top: 50%;
    transform: translateY(-50%); /* Center the icon vertically */
    cursor: pointer;
    font-size: 1.2em; /* Adjust icon size */
    color: #333; /* Icon color */
    pointer-events: none; /* Prevent pointer events on the icon itself */
}

.password-container .toggle-password {
    pointer-events: auto; /* Allow pointer events for the icon */
}


    </style>
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
    <div class="login-container">
    <h2>Login to your account</h2>
    <form action="{{ route('login.store') }}" method="post" id="loginForm">
        @csrf

        <!-- Username Input -->
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" placeholder="Enter your username" required>

        <!-- Password Input with Show/Hide Icon -->
        <label for="password">Password:</label>
        <div class="password-container">
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
            <span class="toggle-password" onclick="togglePassword()">
                <i class="eye-icon">👁️</i>
            </span>
        </div>


        <!-- Error Handling -->
        @if ($errors->has('username'))
            <div class="error-message">{{ $errors->first('username') }}</div>
        @endif

        <div class="forget-password">
            <a href="#">Forgot password?</a>
        </div>

        <button type="submit">Login</button>

        <div class="signin">
            Don't have an account? <a href="{{ route('signup') }}">Sign up</a>
        </div>
    </form>
</div>


</body>
<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const toggleIcon = document.querySelector('.eye-icon');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.textContent = '🙈'; // Change icon to "open eye"
        } else {
            passwordInput.type = 'password';
            toggleIcon.textContent = '👁️'; // Change icon back to "closed eye"
        }
    }
    </script>

</html>
