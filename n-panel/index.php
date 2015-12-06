<?php 
include"../include/bd.php";
if (isset($_GET['page'])) {$page = $_GET['page']; }
else {$page=1;}
if (!preg_match("|^[\d]+$|", $page)) {
exit ("<p>Սխալ հղում!</p>");}
if (isset($_GET['s'])) {$s = $_GET['s']; }
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>newsroyal.com - Admin Panel</title>
	
		<link href="../css/normalize.css" rel="stylesheet" type="text/css">
		<link href="css/admin.css" rel="stylesheet" type="text/css" />
		<script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.8.0.min.js"><\/script>')</script>
	
				<link rel="stylesheet" href="css/box.css" />
			</head>
<body>
	<div id="container">
		<header>
			<div id="header">
				<div id="header-fix">
					<div class="rightBox">
						<div class="searchBox">
							<form action="index.php" method="get">
								<div class="searchArea"><input type="text" name="s"  placeholder="օր.` 6534" /></div>
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
						<a href="index.php" >
							<img src="../img/logo.png" width="262px" />						</a>					</div>
				  <div class="clear"></div>
				</div>
			</div>
			<div class="headerShadow"></div>
		</header>
		<div class="centered_content">
		<div class="new_post"><a href="insert.php" >Ավելացնել լուր</a></div>
        <div class="postBox">
	<div class="title">
		<div class="tab tab1">Վերնագիր</div>
		<div class="tab tab2">Հրապ.</div>
		<div class="tab tab3">Հրապ. ամս.</div>
		<div class="tab tab4">Դիտում</div>
		<div class="tab tab4">կիսվել</div>
		<div class="clear"></div>
	</div>
	<div class="table">
		<script type="text/javascript" src="http://yandex.st/share/share.js" charset="utf-8"></script><div class='row odd '>
       
       
       
        <?php 
if ($s!='') {
$newscatk = mysql_query("SELECT * FROM content WHERE id='$s' ORDER BY id DESC ",$db);
if (!$newscatk){
echo "<p>Նյութ չկա</p>";exit(mysql_error());}

if (mysql_num_rows($newscatk) > 0){
$newscat_k = mysql_fetch_array($newscatk);
$p=0;
$stat = $page*25-25;
do {$p++;}
while ($newscat_k = mysql_fetch_array($newscatk));}
else{ echo "Նյութեր չկան"; exit(); }

$newscat = mysql_query("SELECT * FROM content WHERE id='$s' ORDER BY id DESC LIMIT $stat,25 ",$db);
if (!$newscat){
echo "<p>error</p>";exit(mysql_error());}

if (mysql_num_rows($newscat) > 0){
$newscat_row = mysql_fetch_array($newscat);
do {
if ($newscat_row["state"]==1 ) 
{$pub="Այո";
$d=$newscat_row["published"];
}
else {$pub="Ոչ";
$d=$newscat_row["created"];
}
printf (" <div class='tab tab1'><a href='../view_post.php?id=%s' target='_blank' >%s</a></div>
        <div class='tab tab2'>%s</div>
        <div class='tab tab3'>%s</div>
        <div class='tab tab4'>%s</div>
        <div class='tab tab2'><a style='color: red;' href='http://www.facebook.com/sharer.php?u=http://newsroyal.com/view_post.php?id=%s&t=%s' target='_blank'>
		<img src='images/sharer.png' /></a></div>
        <div class='tab tab5'><a href='edit.php?id=%s' >խմբագրել</a><a href='delete.php?id=%s' target='_blank' >ջնջել</a></div>
        <div class='clear'></div></div>
    <div class='row even '>",$newscat_row["id"],$newscat_row["title"],$pub,$d,$newscat_row["hits"],$newscat_row["id"],$newscat_row["title"],$newscat_row["id"],$newscat_row["id"]);}
	 
while ($newscat_row = mysql_fetch_array($newscat)); }
else{ echo "sxal"; exit(); } 

if ($page<5 and $page>1) {printf("<div class='pages'><a href='index.php?page=%s' class='next'>&lt;&lt;</a>
<a class='pageLinks activePage'>%s</a>",$page-1,$page);}			   
else if ($page>5) {printf("<div class='pages'><a href='index.php?page=%s&s=%s' class='next'>&lt;&lt;</a>
<a class='pageLinks activePage'>%s</a>",$page-5,$s,$page);}	
else {		    
printf("<div class='pages'><a class='pageLinks activePage'>%s</a>",$page);}
if ($page*25<$p)
{
$stat = $page*25;
$page++;
$k=0;

do {
   printf("<a href='index.php?page=%s&s=%s' class='pageLinks'>%s</a>",$page,$s,$page);
   $page++;
   $stat=$stat+25; 
   $k++;
}
while ($page<($p/25)+1 and $k<4 and $p>25*($page-1) );
if ($stat<$p)
{ printf("<a href='index.php?page=%s&s=%s' class='next'>&gt;&gt;</a>",$page,$s);}	}	
}		
else {
$newscatk = mysql_query("SELECT * FROM content ORDER BY id DESC ",$db);
if (!$newscatk){
echo "<p>Նյութ չկա</p>";exit(mysql_error());}

if (mysql_num_rows($newscatk) > 0){
$newscat_k = mysql_fetch_array($newscatk);
$p=0;
$stat = $page*25-25;
do {$p++;}
while ($newscat_k = mysql_fetch_array($newscatk));}
else{ echo "Նյութեր չկան"; exit(); }

$newscat = mysql_query("SELECT * FROM content ORDER BY id DESC LIMIT $stat,25 ",$db);
if (!$newscat){
echo "<p>error</p>";exit(mysql_error());}

if (mysql_num_rows($newscat) > 0){
$newscat_row = mysql_fetch_array($newscat);
do {
if ($newscat_row["state"]==1 ) 
{$pub="Այո";
$d=$newscat_row["published"];
}
else {$pub="Ոչ";
$d=$newscat_row["created"];
}printf (" <div class='tab tab1'><a href='../view_post.php?id=%s' target='_blank' >%s</a></div>
        <div class='tab tab2'>%s</div>
        <div class='tab tab3'>%s</div>
        <div class='tab tab4'>%s</div>
        <div class='tab tab2'><a style='color: red;' href='http://www.facebook.com/sharer.php?u=http://newsroyal.com/view_post.php?id=%s&t=%s' target='_blank'>
		<img src='images/sharer.png' /></a></div>
        <div class='tab tab5'><a href='edit.php?id=%s'>խմբագրել</a><a href='delete.php?id=%s' target='_blank' >ջնջել</a></div>
        <div class='clear'></div></div>
    <div class='row even '>",$newscat_row["id"],$newscat_row["title"],$pub,$d,$newscat_row["hits"],$newscat_row["id"],$newscat_row["title"],$newscat_row["id"],$newscat_row["id"]);}
	 
while ($newscat_row = mysql_fetch_array($newscat)); }
else{ echo "sxal"; exit(); } 

if ($page<5 and $page>1) {printf("<div class='pages'><a href='index.php?page=%s' class='next'>&lt;&lt;</a>
<a class='pageLinks activePage'>%s</a>",$page-1,$page);}			   
else if ($page>5) {printf("<div class='pages'><a href='index.php?page=%s' class='next'>&lt;&lt;</a>
<a class='pageLinks activePage'>%s</a>",$page-5,$page);}	
else {		    
printf("<div class='pages'><a class='pageLinks activePage'>%s</a>",$page);}
if ($page*25<$p)
{
$stat = $page*25;
$page++;
$k=0;

do {
   printf("<a href='index.php?page=%s' class='pageLinks'>%s</a>",$page,$page);
   $page++;
   $stat=$stat+25; 
   $k++;
}
while ($page<($p/25)+1 and $k<4 and $p>25*($page-1) );
if ($stat<$p)
{ printf("<a href='index.php?page=%s' class='next'>&gt;&gt;</a>",$page);}	}}	?>
       
       
       
       
       
       
        
       
</div>		</div>
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