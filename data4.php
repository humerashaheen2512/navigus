<?php
ini_set("display_errors",1);
$username="o1qm1dx7spekawdo";
$pass="gefy467mhssdhsag";

$pdo=new PDO("mysql:host=jsk3f4rbvp8ayd7w.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=y10j80f55bqwaug9", $username, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::FETCH_ASSOC, PDO::FETCH_OBJ);
session_start();
?>
