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
<a href="index.php">HOME</a>
<form method="post" action="certificate_ver.php" enctype="multipart/form-data">
<h1>COLLEGE WISE CERTIFICATE UPLOADS</h1>
<label>College Name</label>
<select name="clg_name">
  <option value="A.G. Arts and Science College for women">A.G. Arts and Science College for women</option>
  <option value="Bharathiar University Arts and Science College">Bharathiar University Arts and Science College</option>
  <option value="CBM College">CBM College</option>
  <option value="Cherrans Arts and Science College">Cherrans Arts and Science College</option>
  <option value="CMS College College of Science and Commerce">CMS College College of Science and Commerce</option>
</select><br/><br/>
<label>10th marksheets(.pdf only):</label>
<input type="file" name="tenth_image"><br/><br/>
<label>12th marksheets(.pdf only):</label>
<input type="file" name="twelth_image"><br/><br/>
<label>UG marksheets(.pdf only in case of PG):</label>
<input type="file" name="ug_image"><br/><br/>
<input type="submit" name="cert_ver">
<input type="reset">
</form>
</body>
</html>
