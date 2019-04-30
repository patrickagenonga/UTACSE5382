<?php

$first_name = filter_input(INPUT_POST, 'first_name');
$last_name = filter_input(INPUT_POST, 'last_name');
$office_address = filter_input(INPUT_POST, 'office_address');
$office_hours = filter_input(INPUT_POST, 'office_hours');
$email = filter_input(INPUT_POST, 'email');
$passWord = filter_input(INPUT_POST, 'passWord');

/* PASSWORD VALIDATION:
------------------------
1. Password must have at least 8 characters
2. Password must have a minimum of 1 uppercase character
3. Password must have a minimum of 1 digit (number)
4. Password must contains some lower cases characters 
*/
//$pattern = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/'; 

//if(preg_match($pattern, passWord)){
//$passWord = filter_input(INPUT_POST, 'passWord');
//}else{
//    echo "Enter a strong password";
//}


if(!empty($first_name) || !empty($last_name) || !empty($office_address) || !empty($office_hours) || !empty($email) || !empty($passWord)){
    
    error_reporting(0);
    session_start();
    $servername="localhost:8080";
    $username="root";
    $password="";
    $data="course_gradebook";
   // $last_id=0;
    $error="";
    $num_rows=0;
    $conn=new mysqli($servername, $username, $password,$data);

    if($conn->connect_error){
        die("Connection failed" .$conn->connect_error);
    }else{
        $sql = "INSERT INTO instructor(first_name, last_name, office_address, office_hours, email, password) 
        values ('$first_name', '$last_name', '$office_address', '$office_hours', '$email', '$passWord')"; // Check what are been inserted to make sure they match what are in the database.

        if($conn->query($sql)){
        echo "Profile is updated successfully";
        }
    else{
            echo "Error: ". $sql ."<br>". $conn->error;
        }
        $conn->close();
    }

}else{
    echo "All fields are required.";
    die();
}

?>