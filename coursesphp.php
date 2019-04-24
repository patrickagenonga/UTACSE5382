<?php

$conn=new mysqli("localhost","root","","course_gradebook");
if($conn->connect_error){
    die("Connection failed:".$conn->connect_error);
}
$query="select * from courses";
$result=$conn->query($query);


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
    <center><pre><h1 class="w3-xxxlarge w3-text-black"><b>Courses</b></h1></pre></center>
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

    <div style="clear:both;">&nbsp;</div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">
<h3>Courses Offered</h3><br>
<ul>
    <?php
    
    if($result->num_rows >0 ){
        while($row=$result->fetch_assoc())
			{
				?>
				<li><?php echo $row['Cname']; ?></li>	
					
				<?php
			}}
        else{
            echo "0 result";
        }
    
    $conn ->close();
			?>
    
    
    </ul>
<div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px">
    <footer class="w3-center">
      <p class="w3-right">Powered by <a href="https://www.CourseGradebook.com/home.html" title="CourseGradebook.com" target="_blank" class="w3-hover-opacity">CouresGradebook</a></p>
      
      </footer>
    </div>

</body>
</html>