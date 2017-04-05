<?php
//panel do dodawania postów
include('config.php');
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$idp = $_GET['idp'];
$q = "SELECT id FROM comments";
$res = mysqli_query($db,$q);
$rowsnum = $res->num_rows;
$id=$rowsnum+1;

$title=mysqli_real_escape_string($db,$_POST['title']);
$bodytext =mysqli_real_escape_string($db,$_POST['bodytext']);
$query = "INSERT INTO comments (number, id, user, comment) VALUES('$id','$idp', '$title', '$bodytext')";
$result = mysqli_query($db, $query);
$count = $_GET['count'];
$count= $count+1;
$query2 = "UPDATE info SET count='$count' WHERE id='$idp'";
$results = mysqli_query($db, $query2);
header("location: readmore.php?idp=$idp&count=$count");
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
         <div class="col-md-12">
                <div class="row">
				    <div class="panel">
					   <div class="panel-heading" style="background-color:#555">
                           <?php
                            $iddd = $_GET['idp'];
                            $sql = "SELECT * FROM info Where id='$iddd'";
                            $result =mysqli_query($db,$sql);
                            while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <h3><?php echo $row['title']; ?></h3>
                                <?php
                            }
                            ?>
                        </div> 
						<div class="panel-body">
							
									<?php
										$iddd = $_GET['idp'];									
										$sql = "SELECT * FROM info Where id='$iddd'";
										$result =mysqli_query($db,$sql);
										while($row = mysqli_fetch_assoc($result)) {
											?>
											<p><?php echo $row['bodytext']; ?></p>
											<?php
										}
									 ?>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-heading" style="background-color:#555">Skomentuj</div>
                        <div class="panel-body">
                        <div class="row">
                        <div class="col-lg-4">
                        <form action="" method="post">
				            <div class="form-group">
					           <div class="controls">
						          <label>Użytkownik:</label>
						          <input type="text" name="title" class="form-control"/>
					           </div>
				            </div>
				            <div class="form-group">
					           <label>treść:</label>
					           <div class="controls">
                                   <textarea rows="5" cols="50" name="bodytext" id="bodytext"></textarea>
					           </div>
				            </div>
				            <div class="g-recaptcha" data-sitekey="6Lc-eA4UAAAAAOEEpL0uGoFFbvyCm7ink66POFkx"></div>
				            <button type="submit" class="btn btn-default">Dodaj</button>
                        </form>
                        </div>
                        </div>
                        </div>
                    </div>
                    <div class="panel">
                            <div class="panel-heading" style="background-color:#555">Komentarze</div>
                            <div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<?php 
										$idda = $_GET['idp'];	
										$sql = "SELECT * FROM comments Where id='$idda'";
										$result =mysqli_query($db,$sql);
										while($row = mysqli_fetch_assoc($result)) {
											?>
											<h3>Użytkownik: <?php echo $row['user']; ?></h3>
											<p>Treść: <?php echo $row['comment']; ?></p>
											<hr>
											<?php
										}
									 ?>
									<hr>
								</div>
							</div>
                            </div>
                    </div>
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

