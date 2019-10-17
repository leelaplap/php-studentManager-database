<?php
include_once "../Class/Student.php";
include_once "../Class/StudentsManager.php";
include_once "../Class/DBConnect.php";

$id = $_GET["id"];

$studentManager = new StudentsManager();
$studentManager->delete($id);

header("location: ../index.php");