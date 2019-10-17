<?php
include_once "../Class/Student.php";
include_once "../Class/StudentsManager.php";
include_once "../Class/DBConnect.php";

$id = $_GET["id"];

$studentManager = new StudentsManager();
$student = $studentManager->findStudentById($id);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="edit.php" method="post" enctype="multipart/form-data">
    <table>
        <tr style="display: none">
            <td>ID</td>
            <td><input type="text" name="id" value="<?php echo $student->id ?>"></td>
        </tr>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" value="<?php echo $student->name ?>"></td>
        </tr>
        <tr>
            <td>Phone</td>
            <td><input type="text" name="phone" value="<?php echo $student->phone ?>"></td>
        </tr>
        <tr>
            <td>image</td>
            <td><img src="<?php echo $student->image ?>" alt="anh"><input type="file" name="image"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Update"></td>
        </tr>
    </table>
</form>

</body>
</html>
