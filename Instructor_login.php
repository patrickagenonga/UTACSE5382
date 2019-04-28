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
//if(isset($_POST['submit'])) {

    $email=$_POST['username'];
    echo($_POST['username']);
//    $role=$_POST['role'];
//    echo($_POST['role']);
    $pass=$_POST['password'];
    echo($_POST['password']);

    // username and password sent from form
    echo "Post";
    $myusername = mysqli_real_escape_string($conn,$_POST['username']);
    $mypassword = mysqli_real_escape_string($conn,$_POST['password']);


    $sql = "SELECT I_id FROM instructor WHERE Email = '$myusername' and Password = '$mypassword'"; //prepared statement
    $result = mysqli_query($conn,$sql);
    echo "query created";
    if ($result=mysqli_query($conn,$sql))
    {
        echo "query executed";
        // Return the number of rows in result set
        $rowcount=mysqli_num_rows($result);
        //printf("Result set has %d rows.\n",$rowcount);
        if($rowcount==1){
            echo "if";
            header('Location: Student_login.html');
        }
        else{
            echo "else";
            header('Location: Instructor_login.html');
        }
        // Free result set
        mysqli_free_result($result);
//    }

}
?>
