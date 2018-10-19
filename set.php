<?php
if(!isset($_POST['miasto']))
{
    header('location: stronaglowna.html');
}
session_start();
$_SESSION['miasto'] = $_POST['miasto'];
header('location: index.php');
?>