<?php
session_start();
$conn=mysqli_connect('localhost','root','','cert_ver');
$username="";
$message="";
$errors=array();

if(isset($_POST['register']))
{
  $name=$_POST["name"];
  $passw=$_POST["passw"];
  $c_passw=$_POST["c_passw"];
  
  if(empty($_POST['name']))
  {
    array_push($errors,"Enter name");
  }
  if(empty($_POST['passw']))
  {
    array_push($errors,"Enter Password");
  }
  if($passw!=$c_passw)
  {
    array_push($errors,"Passwords does not match");
  }
  if(count($errors)==0){
    $sql="insert into reg(name,passw) values('$name','$c_passw')";
    $run_query=mysqli_query($conn,$sql);
    $_SESSION['username']=$name;
    $_SESSION['message']="You are logged in";
    header('location:index.php');
  }
}
if(isset($_POST['login']))
{
  $name=$_POST['name'];
  $password=$_POST['passw'];
  if(empty($_POST['name']))
  {
    array_push($errors,"Enter name");
  }
  if(empty($_POST['passw']))
  {
    array_push($errors,"Enter Password");
  }
  $s_passw=md5($password);
  $sql="select * from reg where name='$name' and passw='$password'";
  $run_query=mysqli_query($conn,$sql);
  if(mysqli_num_rows($run_query)==1)
  {
    $_SESSION['username']=$name;
    $_SESSION['message']="You are logged in";
    header('location:index.php');
  }
  else
  {
    array_push($errors,"Wrong Username/Password");
    header('loction:login.php');
  }
}
if(isset($_GET['logout']))
{
  session_destroy();
  unset($_SESSION['username']);
  header('location:login.php');
}
if(isset($_POST['cert_ver']))
{
	$clg_name=$_POST['clg_name'];
	//the path to store the uploaded image
	$target="images/".basename($_FILES['tenth_image']['name']);
	$target2="images/".basename($_FILES['twelth_image']['name']);
	$target3="images/".basename($_FILES['ug_image']['name']);
	$tenth_image=$_FILES["tenth_image"]["name"];
	$twelth_image=$_FILES["twelth_image"]["name"];
	$ug_image=$_FILES["ug_image"]["name"];
	//Now let's move the uploaded image into the folder: images
	if((move_uploaded_file($_FILES['tenth_image']['tmp_name'],$target))){
	$msg= "Image uploaded successfully";
	}
	else{
		$msg= "There was a problem uploading image";		}
	if((move_uploaded_file($_FILES['twelth_image']['tmp_name'],$target2))){
			$msg= "Image uploaded successfully";
		}
	else{
		$msg= "There was a problem uploading image";		}
	if((move_uploaded_file($_FILES['ug_image']['tmp_name'],$target3))){
			$msg= "Image uploaded successfully";
		}
	else{
		$msg= "There was a problem uploading image";		}
  if(count($errors)==0){
    $sql="insert into certificate_ver(clg_name,tenth_image,twelth_image,ug_image) values('$clg_name','$tenth_image','$twelth_image','$ug_image')";
    $run_query=mysqli_query($conn,$sql);
    //$_SESSION['username']=$name;
    $_SESSION['message']="Success";
	//echo $_SESSION['message'];
    header('location:certificate_ver.php');
  }
}
 ?>
