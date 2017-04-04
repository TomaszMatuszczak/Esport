<?php
//strona z logowaniem dla użytkownikow
include("config.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST")
{ 
$myusername=mysqli_real_escape_string($db,$_POST['username']); 
$mypass=mysqli_real_escape_string($db,$_POST['password']);
$mypassword=md5($mypass);
if ($myusername=='admin')
{
$sql="SELECT id FROM admin WHERE username='$myusername' and passcode='$mypassword'";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$active=$row['active'];
$count=mysqli_num_rows($result);
if($count==1)
{
$_SESSION['myusername']="something";
$_SESSION['login_user']=$myusername;

header("location: panel-ad.php");
}
}
else 
{
$sql="SELECT id FROM user WHERE username='$myusername' and passcode='$mypassword'";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$active=$row['active'];
$count=mysqli_num_rows($result);
if($count==1)
{
$_SESSION['myusername']="something";
$_SESSION['login_user']=$myusername;

header("location: index.php");
}
else 
{
$error="Your Login Name or Password is invalid";
}
}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Strona esportowa">
    <meta name="author" content="Stanisław Smyka Tomasz Matuszczak">

    <title>Esports - wszystkie rozgrywki w jednym miejscu.</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>

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
                <a class="navbar-brand" href="#">
                    <img src="images/esports.jpeg" alt="">
                </a>
            </div>
            <!-- nav linki w menu -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index-nolog.php">Strona główna</a>
                    </li>
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
						<form class="search" action="./search.php" method="get">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Szukaj..." name="search">
								<div class="input-group-btn">
									<button class="btn btn-default" type="submit" value="Szukaj">
										<i class="glyphicon glyphicon-search"></i>
									</button>
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
			<h1 class="page-header">Logowanie</h1>
            <div class="col-lg-4">
                <form action="" method="post">
				<div class="form-group">
					<div class="controls">
						<label>Nazwa użytkownika:</label>
						<input type="text" name="username" class="form-control"/>
					</div>
				</div>
				<div class="form-group">
					<div class="controls">
						<label>Hasło</label>
						<input type="password" name="password" class="form-control"/>
					</div>
				</div>
				<button type="submit" class="btn btn-default" value="submit">Wyślij</button>
				<a href="register.php" class="btn btn-info" role="button">Zarejestruj się</a>
            </div> 
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>