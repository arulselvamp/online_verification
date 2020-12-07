<?php include "server.php";
if(empty($_SESSION['username']))
{
  header('location:login.php');
}
?>
<html>
<head>
<title>index</title>
</head>
<body>
<center><h1>Welcome to Barathiar University Admin Page</h1></center>
<p align="right">Hello, <?php echo $_SESSION['username']; ?><br/>
<a href="index.php?logout=1">Logout</a></p>
<h3>online system for verification of certificates of UG and PG students admitted in affiliated colleges of a University</h3>
<div class="row">
<form method="post" action="index.php" enctype="multipart/form-data">
              <!-- <h3>Using CSS to style an HTML Form</h3>	-->
				<table id="customers">
				  <tr>					
					<th>College Code and Name</th>
					<th>Verify</th>
					<th>Not Verify</th>
				  </tr>				
					<?php
								$res=mysqli_query($conn,"select cc_name from clg_ver");								
								$i=0;	
								$count=0;
								while($row=mysqli_fetch_array($res))
								{
									$cc_name[$i]=$row["cc_name"];
									$verify=0;									
									?>
				  <tr>	
					<td><?php echo $row["cc_name"]; ?></td>
					<td><input type="radio" name="verify[<?php echo $i; ?>]" value="verified" ><label>Verify</label></td>
					<td><input type="radio" name="verify[<?php echo $i; ?>]" value="not verified"><label>Not Verify</label></td>
				  </tr>
				  <?php							
							$sql = "INSERT INTO clg_status (cc_name,ver_status) VALUES ('$cc_name[$i]','$verify');";
							$run_query=mysqli_query($conn,$sql);
							$i=$i+1;
								}							
								?>
				</table>
				<br/><br/>
				<center><input type="submit" name="clg_verify">&nbsp;&nbsp;<input type="reset" name="reset"></center>
				</form>
            </div>	
<h4>Letter informing scheduling of verification process to a college <a href="pdf/s_verification.php">Click here</a></h4>
<h4>To Generate Online Verification Report College-wise <a href="pdf/report_pdf.php">Click here</a></h4>	
<h4> List of Defects studentwise <a href="pdf/students_defects_pdf.php">Click here</a></h4>	
          </div>

</body>
</html>
