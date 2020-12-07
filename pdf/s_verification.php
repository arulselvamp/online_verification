<?php 
session_start();
if(empty($_SESSION['username']))
{
  header('location:login.php');
}
$conn=mysqli_connect('localhost','root','','cert_ver'); 
if(isset($_POST['sch_ver']))
{
	$clg_name=$_POST['clg_name'];
	$ver_date=$_POST['ver_date'];
  
    $sql="insert into clg_ver(cc_name,ver_date) values('$clg_name','$ver_date')";
    $run_query=mysqli_query($conn,$sql);
    //$_SESSION['username']=$name;
    $_SESSION['message']="Success";
	//echo $_SESSION['message'];
    //header('location:s_verification.php');
  
}
?>
<html>
<head>
<title></title>
</head>
<body>
<p align="right">Hello, <?php echo $_SESSION['username']; ?><br/>
<a href="/bhar_interv/cert_ver/index.php?logout=1">Logout</a></p>
<a href="/bhar_interv/cert_ver/index.php">HOME</a>
<form method="post" action="s_verification.php" enctype="multipart/form-data">
<h1>COLLEGE WISE VERIFICATION SCHEDULING DATE</h1>
<label>College Code and Name</label>
<input type="text" name="clg_name">
<br/><br/>
<label>Verification Date</label>
<input type="date" name="ver_date"><br/><br/>
<input type="submit" name="sch_ver">
<input type="reset"><br/><br/>
<a href="generate-user-pdf.php">Click here to Generate PDF</a>
</form>
</body>
</html>
