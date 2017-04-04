<?php
//panel do dodawania postów
error_reporting(E_ERROR);
include('lock-ad.php');
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$idp = $_GET['idp'];
echo $idp;
$q = "SELECT id FROM comments";
$res = mysqli_query($db,$q);
$rowsnum = $res->num_rows;
$id=$rowsnum+1;

$title=mysqli_real_escape_string($db,$_POST['title']);
$bodytext =mysqli_real_escape_string($db,$_POST['bodytext']);
$created =  mysqli_real_escape_string($db,$t);
$query = "INSERT INTO comments (number, id, user, comment) VALUES('$id','$idp', '$title', '$bodytext')";
$result = mysqli_query($db, $query);

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
								<li><a tabindex="-1" href="cal.php">Kalendarz rozgrywek</a></li>
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
      		<div class="col-md-10">
				<div class="panel">
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<?php
										$iddd = $_GET['idp'];									
										$sql = "SELECT * FROM info Where id='$iddd'";
										$result =mysqli_query($db,$sql);
										while($row = mysqli_fetch_assoc($result)) {
											?>
											<h2><?php echo $row['title']; ?></h2>
											<p><?php echo $row['bodytext']; ?></p>
											<?php
										}
									 ?>
									<hr>
								</div>
							</div>
						</div>
						<p></p>
    <div class="container">
        <div class="row">
            <h1 class="page-header">Dodanie nowego </h1>
            <div class="col-lg-4">
                <form action="" method="post">
				<div class="form-group">
					<div class="controls">
						<label>tytul:</label>
						<input type="text" name="title" class="form-control"/>
					</div>
				</div>
				<div class="form-group">
					<label>tresc:</label>
					<div class="controls">
						<textarea name="bodytext" id="bodytext"></textarea>
					</div>
				</div>
				<div class="g-recaptcha" data-sitekey="6Lc-eA4UAAAAAOEEpL0uGoFFbvyCm7ink66POFkx"></div>
				<button type="submit" class="btn btn-default">Dodaj</button>
            </div>
        </div>
    </div>
							<p></p>
<div class="col-md-10">
				<div class="panel">
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<?php 
										$idda = $_GET['idp'];	
										$sql = "SELECT * FROM comments Where id='$idda'";
										$result =mysqli_query($db,$sql);
										while($row = mysqli_fetch_assoc($result)) {
											?>
											<h2><?php echo $row['user']; ?></h2>
											<p><?php echo $row['comment']; ?></p>
											<?php
										}
									 ?>
									<hr>
								</div>
							</div>
						</div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	<!-- bootstrap hover menu -->
	<script src="js/bootstrap-hover-dropdown.min.js"></script>

</body>
</html>

