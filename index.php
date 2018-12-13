<!DOCTYPE HTML>
<html lang="en_US">
<head>
    <meta charset="UTF-8">
	<title>Student Management System</title>
</head>
<body>
<h3 align="right" style="margin-right:20px;"><a href="login.php">Admin Login</a></h3>
<h1 align="center">Welcome to Student Management System</h1>
<form method="post" action="index.php">
<table style="width:50%;" align="center">
    <tr>
        <td colspan="2" align="center">Student Information</td>
    </tr>
    <tr>
        <td> <align="left">Choose Standard</td>
		<td>
		  <select name="std" required >
		     <option value="1">1st</option>
			 <option value="1">2nd</option>
			 <option value="1">3rd</option>
			 <option value="1">4th</option>
			 <option value="1">5th</option>
			 <option value="1">6th</option>
		</td>
	<tr>
        <td> <align="left">Enter Rollno</td>
		<td><input type="text" name="rollno" required> </td>
    </tr>
	<tr>
	    <td colspan="2" align="center"><input type="submit" name="submit" value="Show Info"></td>
	</tr>	
</table>
</body>
</html>	
<?php
  if(isset($_POST['submit'])) 
 {
	 $standard=$_POST['std'];
	  $rollno=$_POST['rollno'];
	 include('dbcon.php');
	 
	 showdetails($standard,$rollno);
 }
 ?>
 <?php
   function showdetails($standard,$rollno)
   {
      include('dbcon.php');
	  
	  $sql="SELECT * FROM student WHERE rollno='$rollno' AND standard='$standard' ";
	  $run=mysqli_query($con,$sql);
	  
	  if(mysqli_num_rows($run)<1)
	  {
		echo "<script>alert('No Student Found.');</script>";  
	  } 
	  else
	  {
		  echo"my";
		  $data=mysqli_fetch_assoc($run);
		  ?>
		  <table>
		      <tr>
			    <th colspan="3">Student Details</th>
				
			  </tr>
			 <tr>
			     <td rowspan="5"> <img src="dataimg/<?php echo $data['image']; ?>" style="max-height:150px; max-width:120px;" /> </td>
                 <th>Roll No</th>
				<td><?php echo $data['rollno']; ?></td>
			  </tr>			 
			  <tr>
			    <th>Name</th>
				<td><?php echo $data['name']; ?></td>
			  </tr>
			  <tr>
			    <th>Standard</th>
				<td><?php echo $data['standard']; ?></td>
			  </tr>
			  <tr>
			    <th>Parent Contact No</th>
				<td><?php echo $data['pcont']; ?></td>
			  </tr>
			  <tr>
			    <th>city</th>
				<td><?php echo $data['city']; ?></td>
			  </tr>
             </table>
			 <?php
	  }	 
	  
		  
   }
   
?>
