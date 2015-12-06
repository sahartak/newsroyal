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
		
if (isset($_POST['log1']) and isset($_POST['log2']) and isset($_POST['lpassword']))
{$log1 = $_POST['log1'];$log2 = $_POST['log2'];
  if ($log2 == '') {echo "Դուք Չեք ներմուծել Նոր լոգինը"; exit();}
  if ($log1 == '') {echo "Դուք Չեք ներմուծել Հին լոգինը"; exit();}
  $lpassword = $_POST['lpassword'];	if ($lpassword == '') {echo "Դուք Չեք ներմուծել գաղտնաբառը"; exit();}
$result = mysql_query("SELECT *  FROM userist WHERE user='$log1' AND pass='$lpassword'",$db);
if (!$result) {echo "Լոգինը կամ գաղտնաբառը սխալ են"; exit(); }
if (mysql_num_rows($result) > 0)
{$upd = mysql_query("UPDATE userist SET user='$log2' WHERE user='$log1' AND pass='$lpassword'",$db);	
	if($upd) { echo "Ձեր լոգինը հաջողությամբ փոխվեց : $log2";}
}
else {echo "Լոգինը կամ գաղտնաբառը սխալ են"; exit();}
}
  

		
if (isset($_POST['login']) and isset($_POST['pas1']) and isset($_POST['pas2']))
{$login = $_POST['login'];$pas1 = $_POST['pas1']; $pas2 = $_POST['pas2'];
  if ($login == '') {echo "Դուք Չեք ներմուծել Ձեր լոգինը"; exit();}if ($pas1 == '') {echo "Դուք Չեք ներմուծել Հին գաղտնաբառը"; exit();}
  	if ($pas2 == '') {echo "Դուք Չեք ներմուծել նոր գաղտնաբառը"; exit();}
$result = mysql_query("SELECT *  FROM userist WHERE user='$login' AND pass='$pas1'",$db);
if (!$result) {echo "Լոգինը կամ գաղտնաբառը սխալ են"; exit(); }
if (mysql_num_rows($result) > 0)
{$upd = mysql_query("UPDATE userist SET pass='$pas2' WHERE user='$login' AND pass='$pas1'",$db);	
	if($upd) { echo "Ձեր գաղտնաբառը հաջողությամբ փոխվեց";}
}
else {echo "Լոգինը կամ գաղտնաբառը սխալ են"; exit();}
}
  
  
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