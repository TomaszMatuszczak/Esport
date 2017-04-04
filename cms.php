<?php
//zbiór funkcji dla użytkownika
class simpleCMS {

  var $host;
  var $username;
  var $password;
  var $table;

  public function display_public() {
    $q = "SELECT * FROM info ORDER BY created DESC LIMIT 3";
    $r = mysql_query($q);

    if ( $r !== false && mysql_num_rows($r) > 0 ) {
      while ( $a = mysql_fetch_assoc($r) ) {
        $title = stripslashes($a['title']);
        $bodytext = stripslashes($a['bodytext']);
		$id = stripslashes($a['id']);
		$created = stripslashes($a['created']);
        $entry_display .= <<<ENTRY_DISPLAY

    <div class="post">
    	<h2>
    	<a href="readmore.php?idp=$id">$title</a> 
    	</h2>
	    <p>
	      $bodytext
	    </p>
		<h6>
			$created
		</h6>
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