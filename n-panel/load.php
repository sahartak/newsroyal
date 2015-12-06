<?php 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php 

$uploaddir='img/';
$apend=rand(100,1000).'.jpg';
$uploadfile = "$uploaddir$apend";
if($_FILES['userfile']['size'] !=0 and $_FILES['userfile']['size']<=5000000)
{move_uploaded_file($_FILES['userfile']['tmp_name'],$uploadfile); }

?>
</body>
</html>
