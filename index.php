<?php
include_once "Class/Student.php";
include_once "Class/StudentsManager.php";
include_once "Class/DBConnect.php";

$studentManager = new StudentsManager();
$list = $studentManager->getAll();
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
<form action="CRUD/insert.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td>Phone</td>
            <td><input type="text" name="phone"></td>
        </tr>
        <tr>
            <td>image</td>
            <td><input type="file" name="image"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Add"></td>
        </tr>
    </table>
</form>
<table border="1">
    <tr>
        <td>STT</td>
        <td>Name</td>
        <td>Phone</td>
        <td>Image</td>
        <td></td>
    </tr>
    <?php foreach ($list as $key => $value): ?>
        <tr>
            <td><?php echo ++$key ?></td>
            <td><?php echo $value->name ?></td>
            <td><?php echo $value->phone ?></td>
            <td><img style="height: 200px;width: 200px" src="Upload/<?php echo $value->image ?>"
                     alt="<?php echo "anh" ?>"></td>
            <td><a href="CRUD/delete.php?id=<?php echo $value->id ?>" onclick="confirm('Are you sure ???')">delete</a>
            <td><a href="CRUD/editForm.php?id=<?php echo $value->id ?>" onclick="confirm('Are you sure ???')">edit</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
