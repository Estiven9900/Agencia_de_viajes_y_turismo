<?php
            session_start();
            if (isset($_SESSION['error_message'])) {
                echo '<p class="error-message">' . $_SESSION['error_message'] . '</p>';
                unset($_SESSION['error_message']);
            }
            ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Traveltura</title>
    <link rel="icon" type="image/png" href="../img/logo.png">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <style>
 /* CSS Document */
/* ---------- FONTAWESOME ---------- */
/* ---------- https://fortawesome.github.com/Font-Awesome/ ---------- */
/* ---------- http://weloveiconfonts.com/ ---------- */
@import url(http://weloveiconfonts.com/api/?family=fontawesome);
/* ---------- ERIC MEYER'S RESET CSS ---------- */
/* ---------- https://meyerweb.com/eric/tools/css/reset/ ---------- */
@import url(https://meyerweb.com/eric/tools/css/reset/reset.css);
/* ---------- FONTAWESOME ---------- */
[class*="fontawesome-"]:before {
  font-family: 'FontAwesome', sans-serif;
}

/* ---------- GENERAL ---------- */
* {
  -moz-box-sizing: border-box;
       box-sizing: border-box;
}
*:before, *:after {
  -moz-box-sizing: border-box;
       box-sizing: border-box;
}

body {
  background: #2c3338;
  color: #606468;
  font: 87.5%/1.5em 'Open Sans', sans-serif;
  margin: 0;
  overflow-y:auto !important;
  overflow-x:hidden !important;
}

a {
  color: #eee;
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}

input {
  border: none;
  font-family: 'Open Sans', Arial, sans-serif;
  font-size: 14px;
  line-height: 1.5em;
  padding: 0;
  -webkit-appearance: none;
}

p {
  line-height: 1.5em;
}

.clearfix {
  *zoom: 1;
}
.clearfix:before, .clearfix:after {
  content: ' ';
  display: table;
}
.clearfix:after {
  clear: both;
}

.container {
  left: 50%;
  position:absolute;
   top: 50%;
  -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
}

/* ---------- LOGIN ---------- */
#login {
  width: 280px;
}

#login form span {
  background-color: #363b41;
  border-radius: 3px 0px 0px 3px;
  color: #606468;
  display: block;
  float: left;
  height: 50px;
  line-height: 50px;
  text-align: center;
  width: 50px;
}

#login form input {
  height: 50px;
}

#login form input[type="text"], input[type="password"] {
  background-color: #3b4148;
  border-radius: 0px 3px 3px 0px;
  color: #606468;
  margin-bottom: 1em;
  padding: 0 16px;
  width: 230px;
}

#login form input[type="submit"] {
  border-radius: 3px;
  -moz-border-radius: 3px;
  -webkit-border-radius: 3px;
  background-color: #ea4c88;
  color: #eee;
  font-weight: bold;
  margin-bottom: 2em;
  text-transform: uppercase;
  width: 280px;
}

#login form input[type="submit"]:hover {
  background-color: #d44179;
}

#login > p {
  text-align: center;
}

#login > p span {
  padding-left: 5px;
}

/*Lets start with the cloud formation rather*/

/*The container will also serve as the SKY*/

*{ margin: 0; padding: 0;}

#clouds{
	padding: 50px 0;
	background: #c9dbe9;
	background: -webkit-linear-gradient(top, #c9dbe9 0%, #fff 100%);
	background: -linear-gradient(top, #c9dbe9 0%, #fff 100%);
	background: -moz-linear-gradient(top, #c9dbe9 0%, #fff 100%);
}

/*Time to finalise the cloud shape*/
.cloud {
	width: 200px; height: 60px;
	background: #fff;
	
	border-radius: 200px;
	-moz-border-radius: 200px;
	-webkit-border-radius: 200px;
	
	position: relative; 
}

.cloud:before, .cloud:after {
	content: '';
	position: absolute; 
	background: #fff;
	width: 100px; height: 80px;
	position: absolute; top: -15px; left: 10px;
	
	border-radius: 100px;
	-moz-border-radius: 100px;
	-webkit-border-radius: 100px;
	
	-webkit-transform: rotate(30deg);
	transform: rotate(30deg);
	-moz-transform: rotate(30deg);
}

.cloud:after {
	width: 120px; height: 120px;
	top: -55px; left: auto; right: 15px;
}

/*Time to animate*/
.x1 {
	-webkit-animation: moveclouds 15s linear infinite;
	-moz-animation: moveclouds 15s linear infinite;
	-o-animation: moveclouds 15s linear infinite;
}

/*variable speed, opacity, and position of clouds for realistic effect*/
.x2 {
	left: 200px;
	
	-webkit-transform: scale(0.6);
	-moz-transform: scale(0.6);
	transform: scale(0.6);
	opacity: 0.6; /*opacity proportional to the size*/
	
	/*Speed will also be proportional to the size and opacity*/
	/*More the speed. Less the time in 's' = seconds*/
	-webkit-animation: moveclouds 25s linear infinite;
	-moz-animation: moveclouds 25s linear infinite;
	-o-animation: moveclouds 25s linear infinite;
}

.x3 {
	left: -250px; top: -200px;
	
	-webkit-transform: scale(0.8);
	-moz-transform: scale(0.8);
	transform: scale(0.8);
	opacity: 0.8; /*opacity proportional to the size*/
	
	-webkit-animation: moveclouds 20s linear infinite;
	-moz-animation: moveclouds 20s linear infinite;
	-o-animation: moveclouds 20s linear infinite;
}

.x4 {
	left: 470px; top: -250px;
	
	-webkit-transform: scale(0.75);
	-moz-transform: scale(0.75);
	transform: scale(0.75);
	opacity: 0.75; /*opacity proportional to the size*/
	
	-webkit-animation: moveclouds 18s linear infinite;
	-moz-animation: moveclouds 18s linear infinite;
	-o-animation: moveclouds 18s linear infinite;
}

.x5 {
	left: -150px; top: -150px;
	
	-webkit-transform: scale(0.8);
	-moz-transform: scale(0.8);
	transform: scale(0.8);
	opacity: 0.8; /*opacity proportional to the size*/
	
	-webkit-animation: moveclouds 20s linear infinite;
	-moz-animation: moveclouds 20s linear infinite;
	-o-animation: moveclouds 20s linear infinite;
}

@-webkit-keyframes moveclouds {
	0% {margin-left: 1000px;}
	100% {margin-left: -1000px;}
}
@-moz-keyframes moveclouds {
	0% {margin-left: 1000px;}
	100% {margin-left: -1000px;}
}
@-o-keyframes moveclouds {
	0% {margin-left: 1000px;}
	100% {margin-left: -1000px;}
}
.bottom {
	width:100%; margin:0 auto; text-align:center; padding:10px 0; height:100px; position:absolute;
}
.bottom h3 {color:white; font-size:30px; font-weight:bold; margin-top:45px; padding-bottom:45px;}

.blue { color:#09c;}
    </style>
</head>
<body>
  <center>
    <div id="clouds">
        <div class="cloud x1"></div>
        <div class="cloud x2"></div>
        <div class="cloud x3"></div>
        <div class="cloud x4"></div>
        <div class="cloud x5"></div>
    </div>

    <div class="container">
        <div id="login">
          
            <form action="login_handler.php" method="post">
                <fieldset class="clearfix">
                    <p>
                        <span class="fontawesome-user"></span>
                        <input type="text" name="email" placeholder="Correo Electrónico" required>
                    </p>
                    <p>
                        <span class="fontawesome-lock"></span>
                        <input type="password" name="password" placeholder="Contraseña" required>
                    </p>
                    <p>
                        <input type="submit" value="Iniciar Sesión">
                    </p>
                </fieldset>
            </form>
           
        </div> <!-- end login -->
    </div>
    <div class="bottom">
    <p>¿No tienes una cuenta? <a href="register.php" class="blue">Regístrate aquí</a><span class="fontawesome-arrow-right"></span></p>
    <h3>© 2024 Traveltura</h3>
    <p>Explora el mundo con nosotros. Viajes inolvidables, experiencias únicas.</p>
    
</div>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Password Toggle JS -->
</body>
</html>
