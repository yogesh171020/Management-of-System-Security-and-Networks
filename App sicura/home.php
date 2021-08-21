<?php
session_start();

function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}
if (!$_SESSION['user']){
	header('location:index2.php');
}

echo "Ciao " . $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
<head>
  <title>App Sicura</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
p{
 color: red;
 font: georgia;
 text-align:center;
 }
div{
 text-align: right;
}
h1{
  text-align:center;
  color: blue;
}
#textboxid
{
  width:600px;
}
</style>
<body>
  <h1>Bacheca messaggi</h1>
  <?php
  $db = new SQLite3('what.db');
  $results = $db->query('SELECT * FROM bull');
  echo "<ul>";
  $examiner=0;
  while ($row = $results->fetchArray()) {
    $examiner+=1;
    echo  "<h2><li>" .  "$row[1] -- \t $row[2]"  . "</h2>" .  '<form method="GET" action="comment.php"><input type="hidden" name="alpha" value="' . $row[0] . '"> <input type="submit" name="traitor" value="comment"></form>'  ;
  }
  echo "</ul>";
  $examiner=$examiner +1;
  if(ISSET($_GET["poster"])){
    $bullet = $_GET["bullet"];
    $bullet = clean_text($bullet);
    $use= $_SESSION['user'];
    $fight="INSERT INTO bull VALUES( '" . $examiner . "' , '" . $bullet . "' , '" . $use . "' )";
    $left=$db->query($fight);
    header('location: home.php');
  }
  ?>
  <br><br>
  <br><br>
  <br><br>
  <form name="dempsey" method="GET" action="home.php">
    <label>Pubblica un messaggio</label>
    <br>
    <input id="textboxid" type="text" name="bullet" required="required">
    <input type="submit" name="poster" value="Pubblica">
  </form>
  <br><br>
  <br><br>
  <a href="logout.php"><button>Esci</button></a>
</body>
</html>
