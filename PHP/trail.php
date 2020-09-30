<?php
session_start();

$id = $_GET['id'];
$_SESSION['updateid'] = $id;

$topicname = $_GET['topicname'];
$_SESSION['updatetopicname'] = $topicname;

$filename = $_GET['filename'];
$_SESSION['updatefilename'] = $filename;

$deadline = $_GET['deadline'];
$_SESSION['updatedeadline'] = $deadline;

$type = $_GET['type'];
$_SESSION['type'] = $type;

$link = $_GET['link'];
$_SESSION['link']=$link;

$token = $_GET['token'];
$_SESSION['materialtoken'] = $token;

header("location:updatematerial.php");

?>