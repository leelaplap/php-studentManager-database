<?php
include_once "../Class/Student.php";
include_once "../Class/StudentsManager.php";
include_once "../Class/DBConnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $phone = $_POST["phone"];

    $image=$_FILES["image"]["name"];
    $target = "../Upload/" . basename($image);

    $student = new Student($name,$phone,$target);

    $studentManager = new StudentsManager();
    $studentManager->insert($student);

    move_uploaded_file($_FILES["image"]["tmp_name"],$target);
}

header("Location: ../index.php");
