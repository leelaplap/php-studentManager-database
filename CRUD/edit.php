<?php
include_once "../Class/Student.php";
include_once "../Class/StudentsManager.php";
include_once "../Class/DBConnect.php";

$id = $_POST["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $image = $_FILES['image']['name'];
    $target = "../upload/" . basename($image);
    $student = new Student($name,$phone,$target);
    $studentManager = new StudentsManager();
    $studentManager->edit($id,$student);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);
}

header("Location: ../index.php");