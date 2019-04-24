<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "course_gradebook";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
  echo "Connected";
}

?>


<!DOCTYPE html>
<html lang="en">
<title>CourseGradebook</title>
    
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="Styling.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    
<style>
body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
body {font-size:16px;}
.w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
.w3-half img:hover{opacity:1}
</style>
    
<body>
    
<header>
    <center><h1 class="w3-xxxlarge w3-text-black"><b>Registration</b></h1></center>
</header>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-blue w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
  <div class="w3-container">
    <h3 class="w3-padding-64"><b>Welcome to<br>CourseGradebook</b></h3>
  </div>
  <div class="w3-bar-block">
    <a href="home.html" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Home</a> 
    <a href="signup.html" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">SignUp/Register</a> 
    <a href="home.html" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Login</a> 
    <a href="courses.html" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Courses</a> 
    <a href="Sitemap.html" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Sitemap</a> 
    <a href="contact.html" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Contact</a>
  </div>
</nav>



<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">

    <center>
		<form action="signup.php" method="POST" id="f_isf" name="sign_up" onsubmit="return validation()">
		<!--	<h5 align="left">Registration</h5><hr>  -->
			<div class="column" id="isf1">
				<h5 >University ID</h5>
				<input type="text" name="univ_id" value="" placeholder="University ID" >
                <span id="university_id"></span>
			</div>
	  		<div class="column" id="isf2">
	  			<h5> Name</h5>
				<input type="text" name="name" value="" placeholder="Name" >
                <span id="name1"></span>
	  		</div>
	  		<!--<div style="clear:both;">&nbsp;</div>-->
	  		<div class="column" id="isf3">
				<h5>DOB</h5>
				<input type="text" name="dob" value="" placeholder="MM/DD/YYYY" >
                <span id="date_of_birth"></span>
			</div>
	  		<div class="column" id="isf4">
	  			<h5>Email ID</h5>
				<input type="text" name="email" value="" placeholder="Email ID" >
                <span id="emailid"></span>
	  		</div>
	  		<div style="clear:both;">&nbsp;</div>
	  		<div id="isf5">
	  			<h5>Username</h5>
	        	<input type="text" name="user" value="" placeholder="Username" >
                <span id="username"></span>
	        </div>
	        <div id="isf6">
	  			<h5>Password</h5>
				<input type="password" name="password" value="" placeholder="Password" >
                <span id="passwd"></span>
	  		</div>
	  		
	  		<div class="clear">&nbsp;</div>
	  		<div>
	  			<input type="radio" id="role1" name="role" value="student"><strong>Role as a Student</strong>
	  			<input type="radio" id="role2" name="role" value="instructor"><strong>Role as a Faculty</strong>
	  			
	  		</div>
	  		<div class="clear">&nbsp;</div>
	  		<div id="isf9"><input type="submit" name="register" value="Register" class="button" onclick="return validation()">
	  		</div>
	  		
	  		
  		
        </form>
    </center>
    
  <div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px">
    <footer class="w3-center">
      <p class="w3-right">Powered by <a href="https://www.CourseGradebook.com/home.html" title="CourseGradebook.com" target="_blank" class="w3-hover-opacity">CouresGradebook</a></p>
      
      </footer>
    </div>

    <script type="text/javascript">
        
        function validation(){
           
            var a= document.forms["sign_up"]["univ_id"].value;
            var b= document.forms["sign_up"]["name"].value;
            var c= document.forms["sign_up"]["dob"].value;
            var d= document.forms["sign_up"]["email"].value;
            var e= document.forms["sign_up"]["user"].value;
            var f= document.forms["sign_up"]["password"].value;
            
           // var g= document.getElementsById('role1');
           // var h= document.getElementsById('role2');
           var g=document.getElementsByName('role');
            var nameregex = /^[A-Za-z]+$/;
            //var dateregex = /^[0-3]?[0-9]\/[0-3]?[0-9]\/(?:[0-9]{2})?[0-9]{2}$/;
            var dateregex= /^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/;
            var mailregex = /^[A-Za-z0-9]+@[A-Za-z0-9]+$/;
                
            if(a == ""||a==null)
            {
                alert("University Id must not be empty");
                return false;
            }
            
            if(a.length<10)
            {
                alert("University Id must be 10 digits long");
                return false;
            }
            
            if(b == ""||b==null)
            {
                alert("Name must not be empty");
                return false;
            }  

            
            if (!nameregex.test(b)) 
            {
                alert("Name should only consists of alphabets");
                return false;
                
            }
            
             
            if(c == ""||c==null)
            {
                alert("DOB must not be empty");
                return false;
            } 
            
                    
            
             if (!dateregex.test(c)) 
            {
                alert("Date of birth should be in the format MM/DD/YYYY");
                return false;
                
            }
            
            if(d == ""||d==null)
            {
                alert("Email must not be empty");
                return false;
            } 
            
            
             if (!mailregex.test(d)) 
            {
                alert("Email should be in the format example@com");
                return false;
                
            }
            
             
            if(e == ""||e==null)
            {
                alert("Username must not be empty");
                return false;
            } 
            
             
            if(f == ""||f==null)
            {
                alert("Password must not be empty");
                return false;
            } 
            
            
            if ( (g[0].checked == false ) && (g[1].checked == false ) )
            {
                alert ( "Please choose any one role" );
                //document.sign_up.role.focus();
                return false;
            }

            
            
           return true; 
            
        }
        
      
        
    </script>
    

</body>
</html>

<?php

  if(isset($_POST['register'])){

  $r=$_POST['role'];
  var_dump($r);

  if($r=="student")
 { 
  $id=$_POST['univ_id'];
  $n=$_POST['name'];
  $d=$_POST['dob'];
  $e=$_POST['email'];
  $u=$_POST['user'];
  $p=$_POST['password'];
 


$sql="INSERT INTO student(S_id,S_name,DOB,email_id,Username,Password) VALUES ('$id','$n','$d','$e','$u','$p')";
var_dump($sql);

}

else if($r=="instructor")
 { 
  $id2=$_POST['univ_id'];
  $n2=$_POST['name'];
  $d2=$_POST['dob'];
  $e2=$_POST['email'];
  $u2=$_POST['user'];
  $p2=$_POST['password'];
 


$sql="INSERT INTO instructor(I_id,I_name,DOB,Email,Username,Password) VALUES ('$id2','$n2','$d2','$e2','$u2','$p2')";
var_dump($sql);

}
var_dump("came here");
    $result=mysqli_query($conn,$sql);

var_dump($result);
if ($result) {
    echo $success="New record created successfully";
} else {
    echo $failure="Data not inserted".mysqli_error($conn);
}

}

?>
