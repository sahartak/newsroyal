<?php 
include"../include/bd.php";
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>newsroyal.com - Admin Panel</title>
	
		<link rel="stylesheet" href="../css/normalize.css">
		<link rel="stylesheet" href="css/admin.css" />
		<script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.8.0.min.js"><\/script>')</script>
	
				<link rel="stylesheet" href="css/editor.css" />
				<script src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
				<script src="js/editor.js"></script>
                <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
			</head>
<body>
	<div id="container">
		<header>
			<div id="header">
				<div id="header-fix">
					<div class="rightBox">
						<div class="searchBox">
							<form method="get">
								<div class="searchArea"><input type="text" name="s" placeholder="օր.` 6534" /></div>
							  <div class="searchButton"><input type="submit" value="Որոնել" /></div>
							</form>
						</div>
					</div>
					<div class='count-of-red'>Չհրապարակված լուրերի քանակը՝ <b>
                  <?php
                    $k=0;
					$newscat = mysql_query("SELECT * FROM content WHERE state=0 ",$db);
if (!$newscat){
echo "Չկան";}

if (mysql_num_rows($newscat) > 0){
$newscat_row = mysql_fetch_array($newscat);

do {
$k++;}
while ($newscat_row = mysql_fetch_array($newscat)); 
if ($k!=0) {
echo "<a href='nopub.php'>$k</a>";}}

?>
</b>:</div>
					<div class="clockLine"></div>
					<div class="logo">
						<a href="index.php">
							<img src="../img/logo.png" width="262px" />						</a>					</div>
				  <div class="clear"></div>
				</div>
			</div>
			<div class="headerShadow"></div>
		</header>
		<div class="centered_content"><br>
        <?php 
		
				
if (isset($_POST['post_title']))    {$post_title = mysql_real_escape_string($_POST['post_title']);} 
if (isset($_POST['editor1']))       {$editor_data = mysql_real_escape_string($_POST['editor1']);} 
if (isset($_POST['video']))       {$video = $_POST['video'];} 
if (isset($_POST['meta']))       {$meta = mysql_real_escape_string($_POST['meta']);}
if (isset($_POST['featured']))       {$featured = $_POST['featured'];}
if (isset($_POST['important']))       {$important = $_POST['important'];}
if (isset($_POST['editors']))       {$editors = $_POST['editors'];}
if (isset($_POST['watermark']))       {$watermark = $_POST['watermark'];}
if (isset($_POST['created']))       {$created = $_POST['created'];}
if (isset($_POST['state']))       {$state = $_POST['state'];}
if (isset($_POST['gallery']))       {$gallery = $_POST['gallery'];}
if ($state==1) {$published=$created;}
else {$published=0;}
$result = mysql_query("INSERT INTO content (title,post,video,metakey,important,created,published,state) VALUES ('$post_title','$editor_data','$video','$meta','$important','$created','$published','$state')",$db);	
	if($result) {echo "<p>Նորությունը հաջողությամբ ավելացվեց</p>";}
	else{echo mysql_error();echo"<p>անհաջող</p>";}
$newscat = mysql_query("SELECT id FROM content order by id desc limit 1",$db);
if (!$newscat){
echo "Չկան";}
if (mysql_num_rows($newscat) > 0){
$newscat_row = mysql_fetch_array($newscat);}
$art=$_POST['category'];
$id=$newscat_row['id'];
$i=0;
while ($i<count($art))
{
$c=$art[$i];
$result = mysql_query("INSERT INTO category_rel (id,cat_id) VALUES ('$id','$c')",$db);
$i++;}
$uploaddir='../upload/';
$apend=$id.'.png';
$uploadfile = "$uploaddir$apend";
if($_FILES['userfile']['size'] !=0 and $_FILES['userfile']['size']<=5000000)
{move_uploaded_file($_FILES['userfile']['tmp_name'],$uploadfile); }
	?>

		<footer>
			<div id="footer_admin">
				<div class="tech">
					<p>Տեխնիկական հարցերով, կայքի կամ ադմինիստրատիվ մասի հետ խնդիրներ ունենալու դեպքում դիմել <a href="http://web.armsolid.ru" title="web.armsolid.ru" target="_blank">webandhost</a></p>
				</div>
			</div>
		</footer>
	</div> 
</body>
</html>