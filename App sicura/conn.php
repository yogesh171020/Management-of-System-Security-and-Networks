<?php
$checker=getcwd() .'/what.db';
if(!is_file($checker)){
  file_put_contents($checker, null);
}
$conn = new PDO('sqlite:' . $checker);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query = "CREATE TABLE IF NOT EXISTS member(username TEXT, password TEXT)";
$conn->exec($query);
?>
