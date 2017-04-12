<?php
//usuwanie komentrzy
include('lock-ad.php');
$query = "DELETE FROM comments WHERE number={$_GET['number']} LIMIT 1";
$idp = $_GET['idp'];
$count = $_GET['count'];
mysqli_query ($db,$query);
$count= $count-1;
$query2 = "UPDATE info SET count='$count' WHERE id='$idp'";
$results = mysqli_query($db, $query2);

header("location: readmore-ad.php?idp=$idp&count=$count");
?>