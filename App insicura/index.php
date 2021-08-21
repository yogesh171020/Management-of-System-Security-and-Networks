<?php
session_start();
if(ISSET($_GET['stone'])){
  $wow = $_GET['wow'];
  echo "Ciao, " . $wow . " sei il benvenuto!";
}
$db = new SQLite3('what.db');
if(ISSET($_GET['submitter'])){
  $username = $_GET['username'];
  $password = $_GET['password'];
  $abc='SELECT * FROM jack WHERE username = "' . $username . '" AND password = "' . $password . '"';
  $results = $db->query($abc);
  if ($results==true){
    while ($row = $results->fetchArray()) {
      $fizer=strval($row[0]);
      $cent = strlen($fizer);
      if($row[1]){
        $_SESSION['user'] = $username;
        header('location:home.php');
      }
    }
    echo "<p>L'utente non esiste!</p>";
  }
  else{
    echo "Error";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>App Insicura</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script language="javascript">
  function wow(){
    window.location.href="index.php";
  }
</script>
</head>
<style>
p{
  color: red;
  font: georgia;
  text-align:center;
}
body {
  text-align: center;
}
</style>
<body>
  <br><br>
  <h1>APP INSICURA</h1>
  <br><br>
  <h2>ACCEDI</h2>
  <form name="scar" method="GET" action="index.php">
    <input type="text" name="username" placeholder="nome utente" required="required">
    <br><br>
    <input type="text" name="password" placeholder="password" required="required">
    <br><br>
    <input type="submit" value="Login" name="submitter" >
    <br><br>
  </form>
  <a href="sign.php">Registrati</a>
  <br><br>
  <a href="try.html">Vai a un nuovo sito web</a>
  <br><br>
  <br><br>
  <form name="dunno" method="GET" action="index.php">
    <label>Inserisci il tuo nome per ricevere un messaggio di benvenuto</label>
    <br><br>
    <input type="text" name="wow">
    <input type="submit" name="stone" value="Vai">
  </form>
</body>
</html>
