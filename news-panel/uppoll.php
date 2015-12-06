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
		
if (isset($_POST['ask']))    {$ask = $_POST['ask']; 	if ($ask == '') {unset($ask);}}
if (isset($_POST['p1']))       {$p1 = $_POST['p1']; 		if ($p1 == '') {unset($p1);}}
if (isset($_POST['p2']))       {$p2 = $_POST['p2']; 		if ($p2 == '') {unset($p2);}}
if (isset($_POST['p3']))       {$p3 = $_POST['p3']; 		if ($p3 == '') {unset($p3);}}
function update($tab,$cat,$val,$i,$d) {
$result = mysql_query("UPDATE $tab SET $cat='$val' WHERE id=$i ",$d);	
	if($result) { echo "Թարմացվեց! $val<br>";}
	else{echo"<p>չթարմվացվեց!</p>";}}
$result = mysql_query("UPDATE poll_index SET question='$ask'",$db);	
	if($result) { echo "Թարմացվեց! $ask<br><br>";}
	else{echo"<p>չթարմվացվեց!</p>";}
if (isset($p1)) {update("poll_data","option_text",$p1,"1",$db);}
if (isset($p2)) {update("poll_data","option_text",$p2,"2",$db);} 
if (isset($p3)) {update("poll_data","option_text",$p3,"3",$db);} 

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