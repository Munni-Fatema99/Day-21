<?php
/**
 * Created by PhpStorm.
 * User: Web App Develop-PHP
 * Date: 1/2/2018
 * Time: 10:55 AM
 */

namespace App\classes;


class Student
{

    //Day-21
//    protected $link;
//    function  __construct()
//    {
//        $hostName = 'localhost';
//        $userName = 'root';
//        $password = '';
//        $dbName = 'bitm';
//        $this->link = mysqli_connect($hostName,$userName,$password,$dbName);
//    }

private function dbConnection(){

    $hostName = 'localhost';
    $userName = 'root';
    $password = '';
    $dbName = 'bitm';
    $link = mysqli_connect($hostName,$userName,$password,$dbName);
    return $link;


}


    public function saveStudentInfo($data){
//        echo '<pre>';
//        print_r($data);

//      $link = mysqli_connect('localhost','root','', 'bitm');
//      echo '<pre>';
//      print_r($link);

        $sql = "INSERT INTO students (name, email, mobile) VALUES ('$data[name]', '$data[email]', '$data[mobile]')";

        if(mysqli_query(Student::dbConnection(), $sql)){
//            echo  "Student info save successfully";

            $message = "Student info save successfully";
            return $message;

        }else{
            die('Query problem'.mysqli_error(Student::dbConnection()));
        }


    }

    public  function getAllStudentInfo(){

//        $link = mysqli_connect('localhost','root','', 'bitm');
        $sql = "SELECT * FROM students";
        if (mysqli_query(Student::dbConnection(), $sql)){
            $queryResult = mysqli_query(Student::dbConnection(), $sql);
//            echo '<pre>';
//            print_r($queryResult);

            return $queryResult;
        }else{
            die('Query problem'.mysqli_error(Student::dbConnection()));
        }
    }


    //Day-21
    public function getStudentInfoById($id){

        $sql = "SELECT * FROM students WHERE id = '$id' ";
        if (mysqli_query(Student::dbConnection(), $sql)){
            $queryResult = mysqli_query(Student::dbConnection(), $sql);
            return $queryResult;

        }else{
            die('Query problem'.mysqli_error(Student::dbConnection()));
        }

    }

    public function updateStudentInfo ($data){

        $sql = "UPDATE students SET name = '$data[name]', email = '$data[email]', mobile = '$data[mobile]' WHERE id='$data[id]' ";
        if (mysqli_query(Student::dbConnection(), $sql)){
            header('Location: view-student.php');
        }else{
            die('Query problem'.mysqli_error(Student::dbConnection()));
        }

    }


    public function deleteStudentInfo($id){

        $sql = "DELETE FROM students WHERE id = '$id' ";
        if (mysqli_query(Student::dbConnection(), $sql)){
            $message = "Student info delete successfully";
            return $message;
        }else{
            die('Query problem'.mysqli_error(Student::dbConnection()));
        }

    }

}