<?php

 include"../include/bd.php";
if (isset($_GET['val'])) {$val = $_GET['val'];}
else {$val=1;
if (!preg_match("|^[\d]+$|", $val)) {
exit ("<p>No Link!</p>");}} 
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
        <div class="centered_content" >
		<form action="uppoll.php" method="post" name="poll" target="_blank">
       <?php 
	   function update($tab,$cat,$val,$i,$d) {
$result = mysql_query("UPDATE $tab SET $cat='$val' WHERE id=$i ",$d);	
	if($result) { echo "Թարմացվեց! $val<br>";}
	else{echo"<p>չթարմվացվեց!</p>";}}
	   if ($val==0) {
update("poll_data","votes",0,"1",$db);
update("poll_data","votes",0,"2",$db);
update("poll_data","votes",0,"3",$db);
}

$newscat = mysql_query("SELECT question FROM poll_index",$db);
if (!$newscat){
echo "Չկան";}
if (mysql_num_rows($newscat) > 0){
$newscat_row = mysql_fetch_array($newscat);}
			
		 ?>
            <p><a href="poll.php?val=0">Հարցումը բերել զրոյական դիրքի</a></p>
           <label><p><strong>Հարցը</strong><br><textarea name="ask"  class="post_title"><?php echo $newscat_row['question']; ?></textarea></p></label>
        <?php  $newscat = mysql_query("SELECT id,option_text,votes FROM poll_data",$db);
if (!$newscat){
echo "Չկան";}
if (mysql_num_rows($newscat) > 0){
$newscat_row = mysql_fetch_array($newscat);
do {
printf("<p><label><strong>Տարբերակ %s : Քվեարկվել է %s անգամ</strong><br><textarea name='p%s' class='post_title' >%s</textarea></label></p>",$newscat_row["id"],$newscat_row["votes"],$newscat_row["id"],$newscat_row["option_text"]);
}
while ($newscat_row = mysql_fetch_array($newscat));} ?>
<input name="ok" type="submit" value="Հաստատել">
          </form>
             </div>
<footer>
			<div id="footer_admin">
				<div class="tech"><?php echo $c ?>
					<p>Տեխնիկական հարցերով, կայքի կամ ադմինիստրատիվ մասի հետ խնդիրներ ունենալու դեպքում դիմել <a href="http://web.armsolid.ru" title="web.armsolid.ru" target="_blank">webandhost</a></p>
				</div>
			</div>
		</footer>
	</div> 
</body>
</html>