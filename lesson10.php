<?php 
// Я не знал что есть видео для всех задач)) я увидел только в 10 видео))
session_start();

$text = $_POST['text'];


$pdo = new PDO("mysql:host=localhost;dbname=tester;", "root", "");


$sql = "SELECT * FROM level8 WHERE text=:text";


$statement = $pdo->prepare($sql);
$statement->execute(['text' => $text]);
$task = $statement->fetch(PDO::FETCH_ASSOC);

if(!empty($task)) {
  $message = 'Error';
  $_SESSION['danger'] = $message;
  
  header("Location: /phpBegining/task_10.php");
  exit();
}

$message = 'Success';
$_SESSION['success'] = $message;

$sql = "INSERT INTO level8 (text) VALUES (:text)";
$statement = $pdo->prepare($sql);
$statement->execute(['text' => $text]);

header("Location: /phpBegining/task_10.php");