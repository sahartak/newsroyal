<?php

 include"../include/bd.php";
if (isset($_GET['id'])) {$id = $_GET['id']; 
if (!preg_match("|^[\d]+$|", $id)) {
exit ("<p>Սխալ հղում!</p>");}}
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
		
if (isset($_POST['post_title']))    {$post_title = $_POST['post_title']; 	if ($post_title == '') {unset($post_title);}}
if (isset($_POST['editor1']))       {$editor_data = $_POST['editor1']; 		if ($editor_data == '') {unset($editor_data);}}
if (isset($_POST['video']))       {$video = $_POST['video']; 				if ($video == '') {unset($video);}}
if (isset($_POST['meta']))       {$meta = $_POST['meta']; 					if ($meta == '') {unset($meta);}}
if (isset($_POST['featured']))       {$featured = $_POST['featured'];} else {$featured=0;}		
if (isset($_POST['important']))       {$important = $_POST['important'];} else {$important=0;}
if (isset($_POST['editors']))       {$editors = $_POST['editors'];} else {$editors=0;}
if (isset($_POST['watermark']))       {$watermark = $_POST['watermark'];} else {$watermark=4;}
if (isset($_POST['created']))       {$created = $_POST['created'];			if ($created == '') {unset($created);}}
if (isset($_POST['state']))       {$state = $_POST['state'];				if ($state == '') {unset($state);}}
if (isset($_POST['gallery']))       {$gallery = $_POST['gallery'];}

if ($state==1) {$published=$created;}
else {$published=0;}
function update($v,$cat,$val,$n,$d) {
$result = mysql_query("UPDATE content SET $cat='$val' WHERE id=$n",$d);	
	if($result) { echo "Թարմացվեց <br>";}
	else{echo"<p>$v չթարմվացվեց!</p>";}}
if (isset($post_title)) {update("վերնագիրը","title",$post_title,$id,$db);} 
if (isset($editor_data)) {update("տեքստը","post",$editor_data,$id,$db);}   
if (isset($video)) {update("վիդեոն","video",$video,$id,$db);} 
if (isset($meta)) {update("հանգուցային բառերը","metakey",$meta,$id,$db);}
if (isset($featured)) {update("featured","featured",$featured,$id,$db);} 
if (isset($important)) {update("important","important",$important,$id,$db);} 
if (isset($editors)) {update("editors","editors",$editors,$id,$db);} 
if (isset($editors)) {update("img","img",$watermark,$id,$db);} 
if (isset($created)) {update("created","created",$created,$id,$db);} 
if (isset($state)) {update("state","state",$state,$id,$db);} 	
if (isset($published)) {update("published","published",$published,$id,$db);} 	
{update("gallery","gallery",$gallery,$id,$db);} 	
$art=$_POST['category'];
$i=0;
while ($i<count($art))
{
$c=$art[$i];
$result = mysql_query("SELECT * FROM category_rel WHERE id=$id and cat_id=$c ",$db);
if (mysql_num_rows($result) < 1){
$ins = mysql_query("INSERT INTO category_rel (id,cat_id) VALUES ('$id','$c')",$db);}
$i++;}
$uploaddir='../upload/';
$apend=$id.'.png';
$uploadfile = "$uploaddir$apend";
if($_FILES['userfile']['size'] !=0 and $_FILES['userfile']['size']<=5000000)
{move_uploaded_file($_FILES['userfile']['tmp_name'],$uploadfile); }
 $result = mysql_query("SELECT cat_id FROM category_rel WHERE id=$id",$db);
if (mysql_num_rows($newscat) > 0){
$myrow = mysql_fetch_array($result);
do {
$catid=$myrow['cat_id'];   
$p=0;
$i=0;
while ($i<count($art))
{
$c=$art[$i];
if ($c==$myrow['cat_id']) {$p=1;} 
$i++;
}
if ($p!=1) {$del = mysql_query ("DELETE FROM category_rel WHERE id='$id' and cat_id='$catid'");
}
   }
while ($myrow = mysql_fetch_array($result)); }
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