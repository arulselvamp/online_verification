<?php include "server.php";
if(count($errors)>0):
  foreach($errors as $err):
    echo $err."<br/>";
  endforeach;
endif;
?>
<html>
<head>
<title></title>
</head>
<body>
<form method="post" action="register.php" enctype="multipart/form-data">
<label>Name:</label>
<input type="text" name="name"><br/><br/>
<label>password</label>
<input type="password" name="passw"><br/><br/>
<label>Confirm Password</label>
<input type="password" name="c_passw"><br/><br/>

<input type="submit" name="register">
<input type="reset">
</form>
</body>
</html>
