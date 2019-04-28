<!DOCTYPE HTML>
<html>
<title>CourseGradebook</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
body {font-size:16px;}
.w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
.w3-half img:hover{opacity:1}
</style>
<head>
	<link rel = "stylesheet" href = "Professor.css">
</head>
<body>
	<nav class="w3-sidebar w3-blue w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
  <div class="w3-container">
    <h3 class="w3-padding-64"><b>Welcome to<br>CourseGradebook</b></h3>
  </div>
  <div class="w3-bar-block">
      <a href="ProfessorPage.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Courses</a> 
    <a href="UserProfilePage.html" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">User Profile</a> 
    <a href="index.html" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Logout</a> 
  	</div>
	</nav>
	<div class="w3-main" style="margin-left:340px;margin-right:40px">
	<div class="w3-container" id="contact" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-black"><b>Courses</b></h1>
    <p> Please select one of the courses below.</p>
    <form method="GET" name = "courses" action = "ViewGradesPage.php">
      <div class="w3-section">
       <input type = "submit" name = "courseid" class = "w3-button w3-block w3-padding-large w3-blue w3-margin-bottom" value = "CSE 5382-001 SECURE PROGRAMMING">
      </div>
    </form>
    <form method = "GET" action = "ViewGradesPage.php">
      <div class="w3-section">
        <input type = "submit" name = "courseid" class = "w3-button w3-block w3-padding-large w3-blue w3-margin-bottom" value = "CSE 5382-002 SECURE PROGRAMMING">
      </div>
    </form>
    <form method = "GET" action = "ViewGradesPage.php">
      <div class="w3-section">
        <input type = "submit" name = "courseid" class = "w3-button w3-block w3-padding-large w3-blue w3-margin-bottom" value ="CSE 5321-005 SOFTWARE TESTING">
      </div>
    </form>
    <form method = "GET" action = "ViewGradesPage.php">
      <div class="w3-section">
        <input type = "submit" name = "courseid" class = "w3-button w3-block w3-padding-large w3-blue w3-margin-bottom" value ="CSE 5324-003 SOFTWARE ENGINEERING">
      </div>
    </form>
    <form method = "GET" action = "ViewGradesPage.php">
      <div class="w3-section">
      <input type = "submit" name = "courseid"  class = "w3-button w3-block w3-padding-large w3-blue w3-margin-bottom"value ="CSE 6324-001 ADVANCED TOPICS IN SOFTWARE ENGINEERING">
      </div>
    </form>
    </div>  
  </div>
	<div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px"><p class="w3-right">Powered by <a href="https://www.CourseGradebook.com/home.html" title="CourseGradebook.com" target="_blank" class="w3-hover-opacity">CouresGradebook</a></p></div>
</body>
</html>