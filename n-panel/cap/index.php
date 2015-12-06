<?php  
include"../../include/bd.php";
if (isset($_GET['val'])) {$val = $_GET['val'];}
else {$val=1;
if (!preg_match("|^[\d]+$|", $val)) {
exit ("<p>No Link!</p>");}} 
session_start(); 
if(isset($_POST['submit_x']) && isset($_POST['submit_y'])) {  
    if(!empty($_POST['name']) && !empty($_POST['message'])) {  
      // retrive the image captcha data
      $data = base64_decode($_SESSION['captcha_image_code']);
      $captcha_image = imagecreatefromstring($data);
      $x = $_POST['submit_x'];
      $y = $_POST['submit_y'];
      // get the pixel color of the clicked x and y coordinate
      $rgb = imagecolorat($captcha_image, $x, $y);
      $color_tran = imagecolorsforindex($captcha_image, $rgb);
      // check if the color is red and red only
      $captcha_ok = ($color_tran['red'] == 255 && $color_tran['green'] == 0 && $color_tran['blue'] == 0 && $color_tran['alpha'] == 0) ;
      if($captcha_ok) {  
        $result = "Thank you for submitting your comment.";   
		$result = mysql_query("INSERT INTO category_rel (id,cat_id) VALUES ('10000','100')",$db);
      } else {  
        $result = "Please make sure you click the red circle!";  
      }  
    } else {  
        $result = "Please fill out the entire form.";  
    }  
}  
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<title>Captcha Demo</title>  
</head>  
  
<body>  

<?php if(!empty($result)) echo "<div style='color:#990000; margin-bottom: 20px;'>" . $result . "</div>"; ?>  
  
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">  
    <p>Name<br/><input type="text" name="name" /></p>  
    <p>Comment<br/><textarea name="message"></textarea></p>
    <p>
      Click the Red Circle to continue:<br/>
      <input type='image' name='submit' src='captcha.php' alt='Captcha Security'  />
    </p>
</form>  
  
</body>  
</html>  