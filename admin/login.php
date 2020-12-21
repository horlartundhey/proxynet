<?php
//include config
require_once('../includes/config.php');


//check if already logged in
if( $user->is_logged_in() ){ header('Location: index.php'); } 
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Every DAY Chapters, read a book everyday" />
    <meta name="author" content="FREEHTML5.CO" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>


    <link rel="stylesheet" href="../admin/assets/css/bootstrap.css">
    <link rel="stylesheet" href="../admin/assets/css/font-awesome.css">
    <!-- Modernizr JS -->
    <script src="js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <script src="js/prefixfree.min.js"></script>
    <style>
        @media (min-width: 768px) {
            .container {
                width: 99%; } }
        @media (min-width: 992px) {
            .container {
                width: 99%; } }
        @media (min-width: 1200px) {
            .container {
                width: 99%; } }

        @import url(https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic);
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-font-smoothing: antialiased;
            -moz-font-smoothing: antialiased;
            -o-font-smoothing: antialiased;
            font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
        }

        body {
            font-family: "Roboto", Helvetica, Arial, sans-serif;
            font-weight: 100;
            font-size: 12px;
            line-height: 30px;
            color: #777;
            background: #4CAF50;
            background-image: url(assets/img/register.jpg);
            background-repeat:no-repeat;
            background-size: cover;
            overflow: hidden;
        }

        .container {
            max-width: 400px;
            width: 100%;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        #contact input[type="text"],
        #contact input[type="email"],
        #contact input[type="password"],
        #contact input[type="tel"],
        #contact input[type="url"],
        #contact select,
        #contact button[type="submit"] {
            font: 400 12px/16px "Roboto", Helvetica, Arial, sans-serif;
        }

        #contact {
            background: #F9F9F9;
            padding: 25px;
            margin: 85px 0;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }

        #contact h3 {
            display: block;
            font-size: 24px;
            font-weight: 300;
            margin-bottom: 10px;
        }

        #contact h4 {
            margin: 5px 0 15px;
            display: block;
            font-size: 13px;
            font-weight: 400;
        }

        fieldset {
            border: medium none !important;
            margin: 0 0 10px;
            min-width: 100%;
            padding: 0;
            width: 100%;
        }

        #contact input[type="text"],
        #contact input[type="email"],
        #contact input[type="tel"],
        #contact input[type="password"],
        #contact select {
            width: 100%;
            border: 1px solid #ccc;
            background: #FFF;
            margin: 0 0 5px;
            padding: 10px;
            color:#000;
        }

        #contact input[type="text"]:hover,
        #contact input[type="email"]:hover,
        #contact input[type="tel"]:hover,
        #contact input[type="url"]:hover,
        #contact textarea:hover {
            -webkit-transition: border-color 0.3s ease-in-out;
            -moz-transition: border-color 0.3s ease-in-out;
            transition: border-color 0.3s ease-in-out;
            border: 1px solid #aaa;
        }

        #contact textarea {
            height: 100px;
            max-width: 100%;
            resize: none;
        }

        #contact button[type="submit"] {
            cursor: pointer;
            width: 100%;
            border: none;
            background: #4CAF50;
            color: #FFF;
            margin: 0 0 5px;
            padding: 10px;
            font-size: 15px;
        }

        #contact button[type="submit"]:hover {
            background: #43A047;
            -webkit-transition: background 0.3s ease-in-out;
            -moz-transition: background 0.3s ease-in-out;
            transition: background-color 0.3s ease-in-out;
        }

        #contact button[type="submit"]:active {
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
        }

        .copyright {
            text-align: center;
        }

        #contact input:focus,
        #contact textarea:focus {
            outline: 0;
            border: 1px solid #aaa;
        }

        ::-webkit-input-placeholder {
            color: #888;
        }

        :-moz-placeholder {
            color: #888;
        }

        ::-moz-placeholder {
            color: #888;
        }

        :-ms-input-placeholder {
            color: #888;
        }
    </style>
</head>

<body>
<div class="grad"></div>
<br>
<div class="container">
    <form id="contact" action="#" method="post">
        <h3>Everyday Chapter</h3>
        <h4>Login to your account.<i class="fa fa-lock "></i></h4>
        <fieldset>
            <input placeholder="Your Email Address" type="text" name="username" tabindex="1" autofocus required >
        </fieldset>
        <fieldset>
            <input placeholder="Your Password" type="password" name="password" tabindex="2" required >
        </fieldset>
        <fieldset>
            <button name="submit" type="submit" id="contact-submit" data-submit="...login">Login</button>
        </fieldset>
        <p class="copyright">&copy;2018 Every Day Chapter. All Rights Reserved.</p>
    </form>
</div>
<div id="login">

	<?php

	//process login form if submitted
	if(isset($_POST['submit'])){

		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		
		if($user->login($username,$password)){ 

			//logged in return to index page
			header('Location: index.php');
			exit;
		

		} else {
			$message = '<p class="error">Wrong username or password</p>';
		}

	}//end if submit

	if(isset($message)){ echo $message; }
	?>

</div>
</body>
<script src="../admin/assets/js/jquery-1.10.2.js"></script>
<!-- jQuery Easing -->
<script src="../admin/assets/js/bootstrap.min.js"></script>
<!-- Bootstrap -->
<script src="../admin/assets/js/custom.js"></script>
</html>
