<?php
//panel do dodawania postów
error_reporting(E_ERROR);
include('lock-ad.php');
include('functions.php');
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$idp = $_GET['idp'];
$title= $login_session;
$bodytext =mysqli_real_escape_string($db,$_POST['bodytext']);
$t=time();
$t = date("Y-m-d",$t);
$created =  mysqli_real_escape_string($db,$t);
$ip = getUserIp();
$query = "INSERT INTO comments (id, user, comment, created, ip) VALUES('$idp', '$title', '$bodytext', '$created','$ip')";
$result = mysqli_query($db, $query);
$count = $_GET['count'];
$count= $count+1;
$query2 = "UPDATE info SET count='$count' WHERE id='$idp'";
$results = mysqli_query($db, $query2);
header("location: readmore-ad.php?idp=$idp&count=$count");

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
                        <a href="index-ad.php">Strona główna</a>
                    </li>
                    <li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">League of Legends<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a tabindex="-1" href="cal.php">Kalendarz rozgrywek</a></li>
								<li class="divider"></li>
								<li><a href="leagueoflegends_live-ad.php" tabindex="-1" href="#">Na żywo</a></li>
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
						<form class="navbar-form" action="./search-ad.php" method="get">
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
								<li><a tabindex="-1" a href="panel-ad.php">Opcje</a></li>
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
                                            <h6><span class="glyphicon glyphicon-calendar"></span><?php echo $row['created']; ?></h6>
											<?php
										}
									 ?>
                        </div>
                    </div>
                    <div class="well">
                    <h4>Zostaw komentarz</h4>
                        <form role="form" class="clearfix" method="post">
                            <div class="col-md-12 form-group">
                                <label class="sr-only" for="email">Komentarz</label>
                                <textarea class="form-control" name="bodytext" id="bodytext" placeholder="Komentarz"></textarea>
                            </div>
 
                            <div class="col-md-12 form-group text-right">
                                <button type="submit" class="btn btn-default">Dodaj</button>
                            </div>
 
                        </form>
                    </div>
					<?php 
						$idda = $_GET['idp'];
						$counta = $_GET['count'];							
						$sql = "SELECT * FROM comments Where id='$idda'";
						$result =mysqli_query($db,$sql);
                    ?>
                    <ul id="comments" class="comments">
						<?php
                        while($row = mysqli_fetch_assoc($result)) {
							?>
                        <li class="list-group-item">
                            <div class="clearfix">
                                <h4 class="pull-left"><?php echo $row['user']; ?></h4>
                                    <p class="pull-right">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                        <?php echo $row['created']; ?>
                                    </p>
                            </div>
                            <form action='deletecomment.php' method="get">
								    <input type="hidden" name="number" value="<?php echo $row['number']; ?>">
								    <input type="hidden" name="idp" value="<?php echo $idda?>">
								    <input type="hidden" name="count" value="<?php echo $counta ?>">
                                    <button type="submit" class="pull-right btn btn-danger btn-sm" name="submit">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                            </form>
                            <p>
                                <em><?php echo $row['comment']; ?></em>
                            </p>
                            <p><samp><?php echo $row['ip']; ?></samp></p>    
                        </li>
				            <?php
				        }
                    ?>
                    </ul>
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