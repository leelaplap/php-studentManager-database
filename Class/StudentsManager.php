<?php
include_once "Student.php";
include_once "DBConnect.php";

class StudentsManager
{
    public $conn;

    public function __construct()
    {
        $db = new DBConnect();
        $this->conn = $db->connect();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM students";
        $stmt = $this->conn->query($sql);
        $result = $stmt->fetchAll();
        $students = [];
        foreach ($result as $value) {
            $student = new Student($value["name"], $value["phone"], $value["image"]);
            $student->id = $value["id"];
            array_push($students, $student);
        }

        return $students;
    }

    public function insert($student)
    {
        $sql = "INSERT INTO students(name,phone,image) VALUES (:name,:phone,:image)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":name", $student->name);
        $stmt->bindParam(":phone", $student->phone);
        $stmt->bindParam(":image", $student->image);
        $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM students WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }

    public function findStudentById($id)
    {
        $sql = "SELECT name,phone,image FROM students where id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $result= $stmt->fetch();
        $student = new Student($result["name"],$result["phone"],$result["image"]);
        return $student;
    }

    public function edit($id, $object)
    {
        $sql = "UPDATE students SET name=:name,phone=:phone,image=:image WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":name", $object->name);
        $stmt->bindParam(":phone", $object->phone);
        $stmt->bindParam(":image", $object->image);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
}