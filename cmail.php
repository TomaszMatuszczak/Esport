<?php
include("lock.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{ 
$pass=mysqli_real_escape_string($db,$_POST['pass']);
$pass=md5($pass);

$sql="SELECT id FROM user WHERE username='$login_session' and passcode='$pass'";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$count=mysqli_num_rows($result);
if($count==1)
{
$newemail=mysqli_real_escape_string($db,$_POST['newemail']);;
$query = "UPDATE user SET email='$newemail' WHERE username='$login_session'";
     if (!filter_var($newemail, FILTER_VALIDATE_EMAIL)) {
            $query = NULL;
	$error= <<<ENTRY_DISPLAY
	   <div class="container">
           <div class="alert alert-danger alert-dismissable fade in">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                 <strong>Błąd!</strong> Błędne E-mail
                  </div>
                </div>
ENTRY_DISPLAY;
echo $error;
			}
			else
			{
			$result = mysqli_query($db, $query);
			header("location: panel.php");
			}	
	}
else 
{
$error= <<<ENTRY_DISPLAY
	   <div class="container">
           <div class="alert alert-danger alert-dismissable fade in">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                 <strong>Błąd!</strong> Błędne hasło
                  </div>
                </div>
ENTRY_DISPLAY;
echo $error;
}
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

    <title>Esports - zmiana e-mail.</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

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
                <a class="navbar-brand" href="index.php">
                    <img src="images/esports.jpeg" alt="">
                </a>
            </div>
            <!-- nav linki w menu -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">League of Legends<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a tabindex="-1" href="cal-user.php">Kalendarz rozgrywek</a></li>
								<li class="divider"></li>
								<li><a href="leagueoflegends_live.php" tabindex="-1" href="#">Na żywo</a></li>
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
						<form class="navbar-form" action="./searchuser.php" method="get">
							<div class="input-group">
								<input type="text" size="15" class="form-control" name="search">
								<div class="input-group-btn">
									<button class="btn btn-default" type="submit" value="Szukaj">Szukaj</button>
								</div>
							</div>
						</form>
					</li>
					<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><?php echo $login_session; ?><b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a tabindex="-1" a href="panel.php">Opcje</a></li>
								<li class="divider"></li>
								<li><a tabindex="-1" a href="logout.php">Wyloguj</a></li>
							</ul>
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
			<h1 class="page-header">Zmień adres e-mail</h1>
            <div class="col-lg-4">
                <form action="" method="post">
				<div class="form-group">
					<div class="controls">
						<label>Podaj hasło:</label>
						<input type="password" name="pass" class="form-control"/>
					</div>
				</div>
				<div class="form-group">
					<div class="controls">
						<label>Podaj nowy e-mail:</label>
						<input type="email" name="newemail" class="form-control"/>
					</div>
				</div>
				<button type="submit" class="btn btn-default" value="submit">Wyślij</button>
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

</body>

</html>