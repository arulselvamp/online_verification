<?php include "server.php";
if(count($errors)>0):
  foreach($errors as $err):
    echo $err."<br/>";
  endforeach;
endif;
 ?>
<html>
<head>
  <title>ADMIN LOGIN</title>
</head>
<body>
	<center><h2>BHARATHIAR UNIVERSITY HOME PAGE</h2></center>
  <h2>ADMIN LOGIN</h2>
  <form method="post" action="">
    <label>Username</label>
    <input type="text" name="name"><br/><br/>
    <label>Password</label>
    <input type="password" name="passw"><br/><br/>
    <input type="submit" name="login">
    <input type="reset" name="reset">
  </form>
  <p>College Wise Certificate Upload <a href="certificate_ver.php">Click here..</a></p>
  <p>Colleges to upload the sanctioned strength degreewise, students
details with fees in excel sheets <a href="import/index.php">Click here</a></P>
<p>Scheduling of verification process collegewise <a href="pdf/generate-user-pdf.php">Click here</a></p>
</body>
</html>
