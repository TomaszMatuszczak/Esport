<?php
//zbiór funkcji dla admina
class simpleCMS {

  var $host;
  var $username;
  var $password;
  var $table;

  public function display_public() {
    $q = "SELECT * FROM info ORDER BY created DESC LIMIT 5";
    $r = mysql_query($q);
	$idp=mysql_num_rows($r)+1;

    if ( $r !== false && mysql_num_rows($r) > 0 ) {
      while ( $a = mysql_fetch_assoc($r) ) {
        $title = stripslashes($a['title']);
        $bodytext = stripslashes($a['bodytext']);
		$created = stripslashes($a['created']);
		$id = stripslashes($a['id']);
		
        $entry_display .= <<<ENTRY_DISPLAY

    <div class="post">
    	<h2>
    	<a href="readmore-ad.php?idp=$id&count=$count">$title</a> 
    	</h2>
	    <p>
	      $bodytext
	    </p>
		<h6>
			$created
		</h6>
		<h6>
		$count
		</h6>
	</div>

ENTRY_DISPLAY;
      }
    } else {
      $entry_display = <<<ENTRY_DISPLAY

    <h2> This Page Is Under Construction </h2>
    <p>
      No entries have been made on this page. 
      Please check back soon, or click the
      link below to add an entry!
    </p>

ENTRY_DISPLAY;
    }
    $entry_display .= <<<ADMIN_OPTION

ADMIN_OPTION;

    return $entry_display;
  }

  public function display_admin() {
    return <<<ADMIN_FORM

    <form action="{$_SERVER['PHP_SELF']}" method="post">
    
      <label for="title">Tytul:</label><br />
      <input name="title" id="title" type="text" maxlength="150" />
      <div class="clear"></div>
     
      <label for="bodytext">Tresc:</label><br />
      <textarea name="bodytext" id="bodytext"></textarea>
      <div class="clear"></div>
      
      <input type="submit" value="Stworz" />
    </form>
    
    <br />
    

ADMIN_FORM;
  }

  public function write($p) {
	  if ( $_POST['id'] )
      $title = mysql_real_escape_string($_POST['id']);
    if ( $_POST['title'] )
      $title = mysql_real_escape_string($_POST['title']);
    if ( $_POST['bodytext'])
      $bodytext = mysql_real_escape_string($_POST['bodytext']);
    if ( $title && $bodytext ) {
		$t=time();
      $created = date("Y-m-d",$t);
      $sql = "INSERT INTO news VALUES('$title','$bodytext','$created')";
      return mysql_query($sql);
    } else {
      return false;
    }
  }

  public function connect() {
    mysql_connect($this->host,$this->username,$this->password) or die("Could not connect. " . mysql_error());
    mysql_select_db($this->table) or die("Could not select database. " . mysql_error());

    return $this->buildDB();
  }

  private function buildDB() {
    $sql = <<<MySQL_QUERY
CREATE TABLE IF NOT EXISTS news (
title		VARCHAR(150),
bodytext	TEXT,
created		VARCHAR(100)
)
MySQL_QUERY;
    return mysql_query($sql);
  }

}
class comments {

  var $host;
  var $username;
  var $password;
  var $table;

  public function display_public() {
    $q = "SELECT * FROM info ORDER BY count DESC LIMIT 3";
    $r = mysql_query($q);

    if ( $r !== false && mysql_num_rows($r) > 0 ) {
      while ( $a = mysql_fetch_assoc($r) ) {
        $title = stripslashes($a['title']);
        $bodytext = stripslashes($a['bodytext']);
		$id = stripslashes($a['id']);
		$created = stripslashes($a['created']);
		$count = stripslashes($a['count']);
        $entry_display .= <<<ENTRY_DISPLAY

    <div class="post">
    	<h5>
    	<a href="readmore-ad.php?idp=$id&count=$count">$title</a> 
    	</h5>
	    <p>
	      $bodytext
	    </p>
		<h6>
			$created
		</h6>
		<h6>
		$count
		</h6>
		</hr>
	</div>

ENTRY_DISPLAY;
      }
    } else {
      $entry_display = <<<ENTRY_DISPLAY

    <h2> This Page Is Under Construction </h2>
    <p>
      No entries have been made on this page. 
      Please check back soon
    </p>

ENTRY_DISPLAY;
    }
  return $entry_display;	
  }

  public function connect() {
    mysql_connect($this->host,$this->username,$this->password) or die("Could not connect. " . mysql_error());
    mysql_select_db($this->table) or die("Could not select database. " . mysql_error());

    return $this->buildDB();
  }

  private function buildDB() {
    $sql = <<<MySQL_QUERY
CREATE TABLE IF NOT EXISTS news (
title		VARCHAR(150),
bodytext	TEXT,
created		VARCHAR(100)
)
MySQL_QUERY;

    return mysql_query($sql);
  }

}

?>