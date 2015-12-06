<?php 
include"include/bd.php";
if (isset($_GET['val'])) {$val = $_GET['val'];}
else {$val=1;
if (!preg_match("|^[\d]+$|", $val)) {
exit ("<p>No Link!</p>");}} 
session_start(); 
if(isset($_POST['submit_x']) && isset($_POST['submit_y'])) {  
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
        $result = "Շնորհակալություն Ձեր տեղեկության համար: ";   
if (isset($_POST['name']))    {$name = $_POST['name'];}
if (isset($_POST['video']))   {$video = $_POST['video'];} 
if (isset($_POST['email']))   {$email = $_POST['email'];}
if (isset($_POST['title']))   {$title = $_POST['title'];}
if (isset($_POST['post']))    {$post = $_POST['post'];}  
$post =  $post."<br><br>".$name."<br><br>".$email;
		$ins = mysql_query("INSERT INTO content (title,post,video) VALUES ('$title','$post','$video')",$db);
      } else {  
        $result = "Համոզվեք, որ սեղմում եք կարմիր շրջանակը:";  
      }  
} 
 ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        
        <title>Ձեր տեղեկատվությունը մեր կայքում |newsroyal.com</title>
        <meta name="keyword" content="Ձեր տեղեկատվությունը մեր կայքում">
		<meta name="description" content="newsroyal.com-ը ազատ հարթակ է յուրաքանչյուր քաղաքցու համար՝ անկախ տարիքից, սեռից,քաղաքական ու կրոնական կողմնորոշվածությունից: Ձեր օպերատիվ տեղեկատվության աղբյուրը դարձրեք newsroyal.com-ը:">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css" >
        <link rel="stylesheet" href="css/jquery.fancybox.css" >
        <link rel="stylesheet" href="css/datePicker.css" >
        <link rel="stylesheet" href="css/jquery.jscrollpane.css" >
        <link rel="stylesheet" href="css/print.css"  media="print">
			<meta property='og:title' content='newsroyal.com | Լրատվություն' />
			<meta property='og:description' content='' />
			<meta property='og:image' content='img/logo.png&w=300&h=300' />
		<meta property="fb:admins" content="100000671578157" />
		<meta name="author" content="webandhost">
		<script>
			var htmDIR = "/",
				DBL = "1";
		</script>
    </head>
    <body>
    <!-- facebook -->
    <div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "all.js#xfbml=1"/*tpa=http://connect.facebook.net/en_US/all.js#xfbml=1*/;
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>	
	<!-- facebook -->
	<!-- alert popup -->
		<div style="display: none;">
			<div id="popupBox">
					<div class="popUpContent">
						<big><b>Հարգելի այցելուներ</b></big>
						<br />
						<br />
						Տեղեկացնում ենք Ձեզ, որ newsroyal.com կայքի խմբագրությունը արձակուրդում է և կվերադառնա 2 շաբաթվա ընթացքում:
						Հայցում ենք Ձեր ներողամտությունը անհարմարությունների համար:
						<br />
						<br />
						Հարգանքներով՝ newsroyal.com խմբագրություն
						<br />
						22-Հունիս-2013
					</div>
				<div id="popupClose">Անցնել կայք</div>
			</div>
		</div>
	<!-- alert popup -->
    		<?php include"include/header.php"; ?>
				<div class="main clearfix">
			<div class="bodyLeft clearfix">
				<article class="articleShow clearfix">
					<h1>Ձեր տեղեկատվությունը մեր կայքում</h1>
                    <p>Հարգելի newsroyal.com-ի ընթերցող, դուք կարող եք ձեր տեղեկատվությունը կամ տեսանյութի հղումը տեղադրել մեր կայք էջում` եթե ձեր հղումները կհամապատասխանեն կայքում առկա բաժինների ուղղվածությանը:</p>
<p>Տրամադրվող տեղեկատվության գաղտնիությունը Օգտատիրոջ անձնական տվյալների գաղտնիությունը պահպանվելու է կայքի ադմինիստրացիայի կողմից:</p>
				  <div class='clearfix'></div>
                
				</article>
			<?php if(!empty($result)) echo "<div style='color:#990000; margin-bottom: 20px;'>" . $result . "</div>"; ?>  
  
  
<form action="<?php echo $_SERVER['eadmin/cap/PHP_SELF']; ?>" method="post" enctype="multipart/form-data">  
<input type='text' name='name' placeholder='Անուն' class='inp-default' value="" />
<input type='text' name='video' placeholder='Հղում Youtube -ից' class='inp-default' value="" />
						<input type='email' name='email' placeholder='Էլ. հասցե' class='inp-default' value="" />
						<input type='text' name='title' required='required' placeholder='Վերնագիր *' class='inp-default' value="" /><br>
						<textarea required='required' name='post' cols="84" rows="15" placeholder='Գրեք ձեր տեղեկությունը այստեղ: *' style='border-radius:5px;'></textarea><br>
                        <p>*-ով նշված դաշտերը պարտադիր են:</p>
    <p>
      Հաստատելու համար սեղմեք կարմիր շրջանակը:<br/>
      <input type='image' name='submit' src='captcha.php' alt='Captcha Security'  style="margin-left:20px;" />
    </p>
</form>  
			</div>
<?php include"include/right.php"; ?>
<?php include"include/footer.php"; ?>
    </body>
</html>