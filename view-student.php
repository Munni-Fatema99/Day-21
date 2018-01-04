<?php
require_once 'vendor/autoload.php';
use App\classes\Student;

$message='';

if (isset($_GET['delete'])){

    $id = $_GET['id'];
   $message = Student::deleteStudentInfo($id);

}


//ata data tolar function
$queryResult = Student::getAllStudentInfo();

//while($student = mysqli_fetch_assoc($queryResult)){
// echo '<pre>';
// print_r($student);
//}
?>

<hr/>
<a href="add-student.php">Add student</a>||
<a href="view-student.php">View student</a>
<h1 style="color: aquamarine"><?php echo $message?></h1>


<table border="1" width="700">
    <tr>
        <th>Student Id</th>
        <th>Student Name</th>
        <th>Student Email</th>
        <th>Student Mobile</th>
        <th>Action</th>

    </tr>

    <?php while($student = mysqli_fetch_assoc($queryResult)){?>

    <tr>
        <td><?php echo  $student['id'];?></td>
<!--        <td contenteditable="true">--><?php //echo  $student['name'];?><!--</td>-->
        <td><?php echo  $student['name'];?></td>
        <td><?php echo  $student['email'];?></td>
        <td><?php echo  $student['mobile'];?></td>
        <td>
            <a href="edit-student.php?id=<?php echo  $student['id'];?>">edit</a>
            <a href="?delete=true&id=<?php echo  $student['id'];?>" onclick="return confirm('Are you sure!!');">delete</a>
        </td>

    </tr>
    <?php }?>
</table>
