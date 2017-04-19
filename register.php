<?php
error_reporting(E_ERROR);
//Google recaptcha
// Recaptcha google library
require_once "recaptchalib.php";

// Sekretny klucz
$secret = "6LcCtRsUAAAAACFi7bCb4g6qDBAedafHC_64nJ43";

// Pusta odpowiedz
$response = null;

// Sprawdzanie sercer keya
$reCaptcha = new ReCaptcha($secret);

//if submitted check response 
if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}

//Rejestrowanie użytkoników
error_reporting(E_ERROR);
include "config-ad.php";

if ($response != null && $response->success) {
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $q = "SELECT id FROM user";
        $res = mysqli_query($db,$q);
        $rowsnum = $res->num_rows;
        $id=$rowsnum+1;

        $username=mysqli_real_escape_string($db,$_POST['username']);
        $pass =mysqli_real_escape_string($db,$_POST['password']);
        $email =mysqli_real_escape_string($db,$_POST['email']);
        $password = md5($pass);
        $query = "INSERT INTO user (id, username, passcode, email) VALUES('$id','$username', '$password', '$email')";
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $query = NULL;
        }	
        $result = mysqli_query($db, $query);

        if($result) {
            function display_error() {
			      $error_display = <<<ENTRY_DISPLAY
				   <div class="container">
                    <div class="alert alert-success alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Stworzono użytkownika!</strong> Możesz się zalogować.
                    </div>
                </div>
ENTRY_DISPLAY;
					return $error_display;	
			}
			echo display_error();
        } 
		else
			{
			function display_error() {
			      $error_display = <<<ENTRY_DISPLAY
				   <div class="container">
                    <div class="alert alert-danger alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Błąd!</strong> Błędny e-mail lub użytkownik o takiej nazwie już istnieje!
                    </div>
                </div>
ENTRY_DISPLAY;
					return $error_display;	
			}
			echo display_error();
        }
    }
} else {
	function display_error() {
			      $error_display = <<<ENTRY_DISPLAY
                  <div class="container">
                    <div class="alert alert-warning alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Uwaga!</strong> Wypełnij captche!
                    </div>
                </div>
                  
ENTRY_DISPLAY;
					return $error_display;	
			}
			echo display_error();
			mysql_error();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Strona esportowa">
    <meta name="author" content="Stanisław Smyka Tomasz Matuszczak">

    <title>Esports - rejestracja.</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

</head>

<body background="images\background2.jpg">

    <!-- nawigacja -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- mobilny wyglad -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index-nolog.php">
                    <img src="images/esports.jpeg" alt="">
                </a>
            </div>
            <!-- nav linki w menu -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">League of Legends<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a tabindex="-1" href="cal-noad.php">Kalendarz rozgrywek</a></li>
								<li class="divider"></li>
								<li><a href="leagueoflegends_live.html" tabindex="-1" href="#">Na żywo</a></li>
								<li class="divider"></li>
								<li><a tabindex="-1" href="http://euw.leagueoflegends.com/" target="blank">Oficjalna strona gry</a></li>
							</ul>
					</li>
                    <li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">Hearthstone<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a tabindex="-1" href="#">Kalendarz rozgrywek</a></li>
								<li class="divider"></li>
								<li><a tabindex="-1" href="#">Na żywo</a></li>
								<li class="divider"></li>
								<li><a tabindex="-1" href="http://eu.battle.net/hearthstone/pl/" target="blank">Oficjalna strona gry</a></li>
							</ul>
					</li>
					<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">CS:GO<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a tabindex="-1" href="#">Kalendarz rozgrywek</a></li>
								<li class="divider"></li>
								<li><a tabindex="-1" href="#">Na żywo</a></li>
								<li class="divider"></li>
								<li><a tabindex="-1" href="blog.counter-strike.net/" target="blank">Oficjalna strona gry</a></li>
							</ul>
					</li>
					<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">Heroes of the Storm<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a tabindex="-1" href="#">Kalendarz rozgrywek</a></li>
								<li class="divider"></li>
								<li><a tabindex="-1" href="#">Na żywo</a></li>
								<li class="divider"></li>
								<li><a tabindex="-1" href="http://eu.battle.net/heroes/pl/" target="blank">Oficjalna strona gry</a></li>
							</ul>
					</li>					
                </ul>
				<ul class="nav navbar-nav navbar-right">
                    <li>
						<form class="navbar-form" action="./search.php" method="get">
							<div class="input-group">
								<input type="text" size="15" class="form-control" name="search">
								<div class="input-group-btn">
									<button class="btn btn-default" type="submit" value="Szukaj">Szukaj</button>
								</div>
							</div>
						</form>
					</li>
					<li class="dropdown">
							<a href="login.php">Zaloguj się</a>
					</li>
				</ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- tresc strony -->
    <div class="container">
        <div class="row">
            <h1 class="page-header">Rejestracja</h1>
            <div class="col-lg-4">
                <form action="" method="post">
				<div class="form-group">
					<div class="controls">
						<label>Nazwa użytkownika:</label>
						<input type="text" name="username" class="form-control" required/>
					</div>
				</div>
				<div class="form-group">
					<div class="controls">
						<label>Hasło:</label>
						<input id="password" type="password" name="password" class="form-control" required/>
					</div>
				</div>
				<div class="form-group">
					<div class="controls">
						<label>E-mail:</label>
						<input type="email" name="email" class="form-control" required/>
					</div>
				</div>
				    <div class="g-recaptcha" data-sitekey="6LcCtRsUAAAAAPJZ3JvQFCBBbhI57YfX3NeYgNrC"></div>
				    <input type="submit" value="Stwórz" class="btn btn-default"/>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Wymagane pola -->
    <script src="js/required.js"></script>
    <!-- Google recaptcha -->
    <script src="https://www.google.com/recaptcha/api.js"></script>

</body>
</html>

