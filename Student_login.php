<?php
error_reporting(0);
session_start();
$servername="localhost";
$username="root";
$password="";
$data="course_gradebook";
$last_id=0;
$error="";
$num_rows=0;
$conn=new mysqli($servername, $username, $password,$data);

if($conn->connect_error){
    die("Connection failed" .$conn->connect_error);
}

echo "connected";
if(isset($_POST['submit'])){

    $email=$_POST['email'];
    echo($_POST['email']);
//    $role=$_POST['role'];
//    echo($_POST['role']);
    $pass=$_POST['pass'];
    echo($_POST['pass']);
}
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form
    echo "Post";
    $myusername = mysqli_real_escape_string($conn,$_POST['username']);
    $mypassword = mysqli_real_escape_string($conn,$_POST['password']);


    $sql = "SELECT student_id FROM student WHERE email = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($conn,$sql);

    if ($result=mysqli_query($conn,$sql))
    {
        // Return the number of rows in result set
        $rowcount=mysqli_num_rows($result);
        //printf("Result set has %d rows.\n",$rowcount);
        if($rowcount==1){
            header('Location: student.html');
        }
        else{
            header('Location: Student_login.html');
        }
        // Free result set
        mysqli_free_result($result);
    }

}
?>
