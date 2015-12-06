<?php 

include"../include/bd.php";
if (isset($_GET['id'])) {$id = $_GET['id'];} 
if (!preg_match("|^[\d]+$|", $id)) {
exit ("<p>No Link!</p>");}
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
					$newscat = mysql_query("SELECT * FROM content WHERE published=0 or published='' or published='0000-00-00 00:00:00'",$db);
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
		error_reporting(E_ALL ^ E_DEPRECATED);
		$newscat = mysql_query("SELECT title FROM content WHERE id=$id",$db);
if (!$newscat){
echo "Չկան";}

if (mysql_num_rows($newscat) > 0){
$newscat_row = mysql_fetch_array($newscat);}
$result = mysql_query ("DELETE FROM content WHERE id='$id'");
$news = mysql_query("SELECT id FROM category_rel WHERE id=$id",$db); 
while ($row = mysql_fetch_array($news))
{$result2 = mysql_query ("DELETE FROM category_rel WHERE id='$id'");}
if ($result == 'true') {echo "<p>Նորությունը ջնջված է!</p>";
$dir="../upload/".$id.".png";
unlink($dir);
}
else {echo "<p>Նորությունը չի ջնջվել!</p>";}
	 
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