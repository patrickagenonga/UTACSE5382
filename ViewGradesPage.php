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
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel = "stylesheet" href = "Professor.css">
	<script src = "jquery-3.4.0.min.js"></script>
	<script src = "Professor.js"></script>
</head>
<body>
	<nav class="w3-sidebar w3-blue w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
  <div class="w3-container">
    <h3 class="w3-padding-64"><b>Welcome to<br>CourseGradebook</b></h3>
  </div>
  <div class="w3-bar-block">
      <a href="ViewGradesPage.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">View/Edit Grades</a> 
    <a href="ProfessorPage.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Courses</a> 
    <a href="UserProfilePage.html" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">User Profile</a> 
    <a href="index.html" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Logout</a> 
  	</div>
	</nav>
	<div class="w3-main" style="margin-left:340px;margin-right:40px">
		<div class="w3-container" id="contact" style="margin-top:75px">
    	<h1 class="w3-xxxlarge w3-text-black"><b>
    	<?php
    		if(isset($_GET['courseid'])){
    			$course = $_GET['courseid'];	
    		} 
    		else if(isset($_POST['cid'])){
    			$course = $_POST['cid'];
    		}
    		echo $course;
    	?>
    	</b></h1>
		<table id = stud-table>
			<thead>
				<tr>
					<th> Student ID </th>
					<th> Student Name </th>
					<th> Student Grade </th>
				</tr>
			</thead>
			<tbody>
				<?php
					$server = "localhost";
					$username = "root";
					$password = "";
					$dbname = "coursegrade";
					$courseKey = substr($course, 0, 13);
					//echo $cid;
					$conn = mysqli_connect($server, $username, $password, $dbname);
					if(!$conn){
						die("connection failed:".mysqli_connect_error());
					}
					//echo "Connection Successfull";
					//$sql = "SELECT * FROM student where C_id = '$courseKey' ORDER BY S_id";
					$sql = "SELECT * FROM (SELECT S.S_id,S.S_name,E.Grades,E.C_id FROM student S,enrollment E,courses C WHERE S.S_id = E.S_id and C.Cid = E.C_id) T where T.C_id = '$courseKey' ORDER BY T.S_id";
					$result = mysqli_query($conn, $sql);
					$rowcount = mysqli_num_rows($result);
					if (!$result) {
 					   trigger_error('Invalid query: ' . $conn->error);
					}
					else if($result->num_rows > 0){
						while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
							echo "<tr><td>".$row['S_id']."</td><td>".$row['S_name']."</td><td>".$row['Grades']."</td><td><span onclick = 'openEditGrade(this)'><i class='far fa-edit' id = 'edit-button'></i></span> </td></tr>";
						}	
					}
				?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan = "3"> <b> Total No. of Students</b></td>
					<td> <b> <?php echo $rowcount;?> </b></td>
				</tr>
			</tfoot>
		</table>
		<div id = "edit-grade" class ="change-grade">
			<div class ="grade">
				<div class = "change-grade-header">
					<span class ="close" onclick = "closeEditGrade()">&times;</span>
					<h1>Change Grade</h1>
				</div><!--this closes chnage-grade-header-->
				<div class ="change-grade-body">
					<form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method = "POST" name = "gradeform">
     					<div class="w3-section">
        					<label> Student ID</label>
        					<input class="w3-input w3-border" type="text" name="id" value ="1001747486" readonly id = "sid">
      					</div>
						<div class="w3-section">
        					<label> Student Name</label>
        					<input class="w3-input w3-border" type="text" name="Name" value = "Clark Kent" readonly id = "name">
      					</div>
      					<input type = "hidden"  name = "cid" value = "<?php echo $course; ?>">
						<div class="w3-section">
        					<label align="left">Grade</label>
							<select id = "grade" name = "grades">
  								<option value = "A">A</option>
  								<option value = "B">B</option>
  								<option value = "C">C</option>
  								<option value = "D">D</option>
  								<option value = "F">F</option>
							</select>
      					</div>
				</div><!--this closes change-grade-body-->
				<div class = "change-grade-footer">
					<div class = "buttons">
						<button id = "save-grade" type = "submit" name = "submitbut" class = "w3-button w3-block w3-padding-large w3-blue w3-margin-bottom" > Save</button>
						<button id = "close" onclick = "closeEditGrade()" class = "w3-button w3-block w3-padding-large w3-blue w3-margin-bottom" > Cancel </button>
					</div><!--this closes buttons-->
				</div><!--this closes change-grade-footer-->
			</form>
			<?php
      					if($_SERVER["REQUEST_METHOD"] == "POST"){
      						if(isset($_POST['submitbut'])){
      							$grade = $_POST['grades'];
								$id = $_POST['id'];
								$update = "UPDATE enrollment set Grades = '$grade' where S_id = '$id'";
								if(mysqli_query($conn, $update)){
									echo "<script> alert('Grade Updated'); </script>";
									echo("<meta http-equiv='refresh' content='1;url=ViewGradesPage.php?courseid=$course'>"); //Refresh by HTTP META
									//header('Location: ./ViewGradesPage.php?courseid=$course');
								}
								else{
									echo "<script> alert('Grade not Updated'); </script>";
									echo "Error updating record: " . mysqli_error($conn);
								}

      						}
						}
						mysqli_close($conn);
					?>
			</div><!--this closes grade-->
		</div><!--this closes edit-grade-->
	</div><!--this closes middle-->
</div>
	<div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px"><p class="w3-right">Powered by <a href="https://www.CourseGradebook.com/home.html" title="CourseGradebook.com" target="_blank" class="w3-hover-opacity">CouresGradebook</a></p></div>
</body>
</html>