<?php
session_start();
require_once 'conn.php';

if(ISSET($_POST['submitter'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

    $query = "INSERT INTO `jack` (username, password) VALUES(:username, :password)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);

    if($stmt->execute()){
      $_SESSION['success'] = "Account creato con successo";
      echo $_SESSION['success'];
  }
}
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
?>
<!DOCTYPE html>
<html>
<head>
  <title>App Insicura</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
body {
 text-align: center;
}
</style>
<body>
  <br><br>
  <h1>APP INSICURA</h1>
  <br><br>
  <h2>REGISTRATI</h2>
  <form name="scar" method="POST" action="sign.php">
    <input type="text" name="username" placeholder="nome utente">
    <br><br>
    <input type="text" name="password" placeholder="password">
    <br><br>
    <input type="submit" value="Sign Up" name="submitter" >
    <br><br>
  </form>
  <a href="index.php">Vai alla pagina di login</a>
</body>
</html>
