<?php
error_reporting(E_ERROR);
include('lock.php');

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
						<form class="search">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Szukaj">
								<div class="input-group-btn">
									<button class="btn btn-default" type="submit">
										<i class="glyphicon glyphicon-search"></i>
									</button>
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
		<h1 class="page-header">Wiadomości</h1>
        <div class="no-gutter row">
			<!-- poczatek najnowszych -->
      		<div class="col-md-9">
				<div class="panel">
					<div class="panel-heading" style="background-color:#555">Najnowsze</div> 
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<?php
									
									  include_once('cms.php');
									  $obj = new simpleCMS();

									  /* CHANGE THESE SETTINGS FOR YOUR OWN DATABASE */
									  $obj->host = 'localhost';
									  $obj->username = 'test';
									  $obj->password = 'pass';
									  $obj->table = 'db';
									  $obj->connect();
									
									  if ( $_POST )
										$obj->write($_POST);
									
									  echo $obj->display_public();
									
									?>
									<hr>
								</div>
							</div>
						</div>
               </div><!--/panel-->
      		</div><!--koniec najnowszych-->
      		
      		<!-- poczatek najpopularniejszych-->
      		<div class="col-md-3" id="content">
            	<div class="panel">
					<div class="panel-heading" style="background-color:#111">Najpopularniejsze</div>   
						<div class="panel-body">
							<div class="media">
								<div class="media-body">
									<h5 class="media-heading"><a href="#" target="ext" class="pull-right"><i class="glyphicon glyphicon-share"></i></a> <a href="#"><strong>Mama winner!</strong></a></h5>
									<small>Najstarszy gracz w histori CS:GO wygrywa MVP IEM!</small><br>
									<span class="badge">666</span>
								</div>
							</div>
							<hr>
							<div class="media">
								<div class="media-body">
									<h5 class="media-heading"><a href="#" target="ext" class="pull-right"><i class="glyphicon glyphicon-share"></i></a> <a href="#"><strong>Guczmańskie technologie.</strong></a></h5>
									<small>Niesławny streamer Jarosław "Gucz" Janczewski pokazuje na swoim streamie jak zrobić portal dla graczy.</small><br>
									<span class="badge">77</span>
								</div>
							</div>
							<hr>
							<div class="media">
								<div class="media-body">
									<h5 class="media-heading"><a href="#" target="ext" class="pull-right"><i class="glyphicon glyphicon-share"></i></a> <a href="#"><strong>World Championship Tour 2016 Hearthstone</strong></a></h5>
									<small>Szesnastka najbardziej wytrawnych karciarzy z całego globu walczy o chwałę, część puli nagród wynoszącej milion USD oraz tytuł mistrza nad mistrzami.</small><br>
									<span class="badge">1</span>
								</div>
							</div>
						</div><!--/panel-body-->
                </div><!--/panel-->
            </div><!--koniec najpopularniejszych-->
      	</div> 
  	</div>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>