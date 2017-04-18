
<?php
include("lock.php");
error_reporting(E_ERROR);
//Strona główna dla niezalgownaych użyktowników
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
                        <a href="index.php">Strona główna</a>
                    </li>
                    <li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">League of Legends<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a tabindex="-1" href="cal-noad.php">Kalendarz rozgrywek</a></li>
								<li class="divider"></li>
								<li><a tabindex="-1" href="leagueoflegends_live.html">Na żywo</a></li>
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
								<input type="text" size="15" class="form-control" name="search" value="<?php echo $_GET["search"]; ?>">
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
		<h1 class="page-header">Wyniki wyszukiwania:</h1>
        <div class="no-gutter row">
			<!-- poczatek najnowszych -->
      		<div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
							<div class="row">
								<div class="col-md-12">
                                    <?php
                                    $keyword=$_GET["search"];
                                    if ($keyword != ""){
                                        $i=0;
                                        $terms=explode(" ",$keyword);
                                        $query="SELECT * FROM info WHERE ";

                                        foreach ($terms as $each) {
                                            $i++;
                                            if ($i==1)
                                                $query .="title LIKE '%$each%' OR bodytext LIKE '%$each%'";
                                            else
                                                $query .="OR title LIKE '%$each%' OR bodytext LIKE '%$each%'";
                                        }

                                        $query=mysqli_query($db,$query);
                                        $numrows=mysqli_num_rows($query);
                                        if ($numrows>0){
                                            while ($row=mysqli_fetch_assoc($query)){
                                                $id=$row['id'];
                                                $title=$row['title'];
                                                $bodytext=$row['bodytext'];
												$count=$row['count'];
												function display_entry($title,$bodytext,$id,$count) {
													$entry_display .= <<<ENTRY_DISPLAY
                                                       <h2>$title</h2>
														<div class="latest-wrapping">$bodytext</div>
														 <a href="readmore-user.php?idp=$id&count=$count">... więcej</a>
														  <h6><span class="glyphicon glyphicon-calendar"></span>$created</h6>
														
														<span class="glyphicon glyphicon-pencil"></span>
														<span class="badge">$count</span>
														<hr>
ENTRY_DISPLAY;
												return $entry_display;
												}
												echo display_entry($title,$bodytext,$id,$count);
                                            }
                                        }
                                    else
                                        echo "Brak wyników dla ''$keyword''.";
                                         }
                                    else
                                        echo "Nic nie wyszukałeś.";
				                    ?>
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