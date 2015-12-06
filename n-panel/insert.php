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
		<div class="centered_content"><p> Խմբագրել:<br>
       
<form method="post" action="inserto.php" enctype="multipart/form-data" name="userfile"  >
	<div class="leftBlock">
		<textarea class="post_title" name="post_title" placeholder="Վերնագիր" ></textarea>
		<textarea  name="editor1"></textarea>
        <script type="text/javascript">
		CKEDITOR.replace( 'editor1' );
		</script>
       </p>
       <p>       </p>
		
		
		<textarea class="post_title" name="video" placeholder="Տեսանյութի հղումը youtube.com կայքից, օր.՝ http://www.youtube.com/watch?v=lCHMQBLIFT0&feature=g-all-u"></textarea>
		<textarea class="post_title" name="meta" placeholder="Հանգուցային բառեր"></textarea>
	</div>

	<div class="rightBlock">
    <div class="catBox catBox-category" style="width: 240px;">
     <?php 
	 
	 function checkbox($c,$d) {
$newscatk = mysql_query("SELECT * FROM categories ORDER BY id ",$d);
if (!$newscatk){
echo "<p>Կատեգորիա չկա!</p>";}

if (mysql_num_rows($newscatk) > 0){
$myrow = mysql_fetch_array($newscatk);
echo "<b>$c</b>";
do {
printf("<div class='chBox'>
<label><input type='checkbox'  name='category[]'  value='%s' />%s</label></div>",$myrow["id"],$myrow["title_am"]);
}
while ($myrow = mysql_fetch_array($newscatk));
echo "<hr />";
}
else{ echo "Չկա";}}
checkbox("Լուրեր",$db);
?>
</div>
		
		<div class="catBox imageBox catBox-category">
			<div class="title">նկար</div>
			<input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
			<input name="userfile" type="file" />
		</div>
		<div class="catBox imageBox catBox-category">
		  <div class="chBox"><label><input type="checkbox" name="important"  value="1" />գլխավոր</label></div>
			<div class="clear"></div>
		</div>
		
		<div class="catBox imageBox catBox-category">
			Ստեղծման ամսաթիվ: <input type="text" name="created" 
            value="<?php echo (date("Y-m-d H:i:s")); ?>" />
		</div>

		<div class="catBox imageBox catBox-category">
			Հրապարակման կարգավիճակ: 
			<select name="state">
				<option value="1">հրապարակված</option>
				<option value="0">չհրապարակված</option>
			</select>
		</div>
		
		<div class="langBox">
			<!--<input type="radio" name="language" value="0"  />en-->
			<!--<input type="radio" name="language" value="1" checked />հյ-->
			<!--<input type="radio" name="language" value="2" />ру-->
		</div>
	</div>
	
	<div class="clear"></div>
	<br />
        <input type="submit" value="Պահպանել" />
        </form>		</div>
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