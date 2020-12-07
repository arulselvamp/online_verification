<?php
$con=mysqli_connect("localhost","root","","inter_test");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

	$name=$_POST["name"];
  $passw=$_POST["passw"];
  $age=$_POST["age"];
  $s_passw=md5($passw);
  $course=$_POST["course"];
  $gender=$_POST["gender"];
  $skill=$_POST["skill"];
  $s2="";
  foreach($skill as $s)
  {
    $s2.=$s.",";
  }
  $dob=$_POST["dob"];
  $email=$_POST["email"];
  //the path to store the uploaded image
		$target="images/".basename($_FILES['image']['name']);
  $image=$_FILES["image"]["name"];
  //Now let's move the uploaded image into the folder: images
			if((move_uploaded_file($_FILES['image']['tmp_name'],$target))){
				$msg= "Image uploaded successfully";
			}
			else{
				$msg= "There was a problem uploading image";		}
  $message=$_POST["message"];

$sql="insert into reg(name,passw,age,course,gender,skill,dob,email,image,message) values('$name','$s_passw','$age','$course','$gender','$s2','$dob','$email','$image','$message')";
$run_query=mysqli_query($con,$sql);
if($run_query){
	echo "registered success";
}
else
{
	echo "not registered";
}


?>
