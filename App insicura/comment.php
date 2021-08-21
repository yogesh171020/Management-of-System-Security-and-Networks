<?php
session_start();
if (!$_SESSION['user']){
  header('location:index.php');
}
$db = new SQLite3('what.db');
if(ISSET($_GET["traitor"])){
  $fbi=$_GET['alpha'];
  $filer = fopen("honda.txt" ,"w") or die("unable to open");
  fwrite($filer, $fbi);
  fclose($filer);
  $_SESSION["lamp"]=$fbi;
  $res = $db->query('SELECT * FROM bull WHERE bid="' . $fbi .'"');
  while ($row = $res->fetchArray()) {
    echo "<h1>'" . $row[1] . "':-  " . $row[2] . "</h1>" ;
  }

  echo "<br><br><br><br>";
  $zulu = $db->query('SELECT * FROM comments WHERE bid="' . $fbi .'"');
  while ($row = $zulu->fetchArray()) {
    echo "<p><i>" . $row[0] . "</i>" . "==>\t" . "$row[1]</i></p>" ;
  }
}
if(ISSET($_GET["stick"])){
  $comment = $_GET["comment"];
  $usera= $_SESSION["user"];
  $cid=fopen("honda.txt","r");
  $nsa = fread($cid,filesize("honda.txt"));
  fclose($cid);
  $ter="comment.php?alpha=" . $nsa . "&traitor=comment";

  $fighter="INSERT INTO comments VALUES( '" . $usera . "' , '" . $comment . "' , " . $nsa . " )";
  $lefta=$db->query($fighter);
  header('location:'.$ter);
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>App Insicura</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
h1{
  text-align:center;
}
i{
  color: blue;
}
div{
  text-align: right;
}
#texter
{
  width:900px;
}
</style>
<body>
  <form method="GET" action="comment.php">
    <br><br>
    <input id="texter" type="text" name="comment" placeholder="Inserisci il commento" required="required">
    <input type="submit" name="stick" value="Commenta">
  </form>
  <?php
  echo "Stai inserendo il tuo commento come " . $_SESSION['user'];
  ?>
</body>
</html>
