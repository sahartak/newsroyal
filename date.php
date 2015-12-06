<?php include"include/bd.php";
if (isset($_GET['date'])) {$date = $_GET['date'];
if (empty($date) or strlen($date) < 4)
{die ("<p>Որոնումը չի պարունակում անհրաժեշտ քանակությամբ տեղեկություն</p>");}
$date = trim($date);
$date = stripslashes($date);
$date = htmlspecialchars($date);

$date_begin = $date;
$date++;
$date_end = $date;

$date_begin = $date_begin."-01";
$date_end = $date_end."-01";
}
else 
{exit("<p>Որունումը դատարկ է </p>");}

if (isset($_GET['page'])) {$page = $_GET['page']; }
else {$page=1;}
if (!preg_match("|^[\d]+$|", $page)) {
exit ("<p>Սխալ հղում!</p>");}
 ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
   
        <title><?php echo $date ?> ամսաթվով նորություններ|newsroyal.com</title>
        <meta name="keyword" content="<?php echo $date ?>">
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
                 
				<h3>Նորություններ <?php echo $date?> ամսաթվով </h3>
                <?php 
$newscatk = mysql_query("SELECT id FROM content WHERE published>'$date_begin' AND published<'$date_end' ORDER BY published DESC  ",$db);
if (!$newscatk){
echo "<p>error</p>";exit(mysql_error());}

if (mysql_num_rows($newscatk) > 0){
$newscat_k = mysql_fetch_array($newscatk);
$p=0;
$stat = $page*25-25;
do {$p++;}
while ($newscat_k = mysql_fetch_array($newscatk));}

else{ echo "$date ամսաթվով նորություններ չկան "; exit(); }

$newscat = mysql_query("SELECT id,title,published,post FROM content WHERE published>'$date_begin' AND published<'$date_end' ORDER BY published DESC LIMIT $stat,25 ",$db);
if (!$newscat){
echo "<p>error</p>";exit(mysql_error());}

if (mysql_num_rows($newscat) > 0){
$newscat_row = mysql_fetch_array($newscat);
do {
$anons=strip_tags($newscat_row["post"]);
	 printf ("<div class='cat-block-container clearfix'>
	 <div class='cat-block-top clearfix'>
	 <img src='http://newsroyal.com/upload/%s.png' width='125px' height='75px'>
	 <div class='cat-block-date'>%s</div>
	 <div class='cat-block-top-right'>
	 <div><a href='view_post.php?id=%s' >%s</a></div>
	 <span>%s</span></div></div></div>",$newscat_row["id"],substr($newscat_row["published"],0,16),$newscat_row["id"],$newscat_row["title"],substr($anons,0,500));}
while ($newscat_row = mysql_fetch_array($newscat)); }
else{ echo "Այս ամսաթվով չկա նորություն"; exit(); } ?>
				
                
               
               <?php
if ($page<5 and $page>1) {printf("<div class='pages'><a href='date.php?date=%s&page=%s' class='next'>&lt;&lt;</a>
<a class='pageLinks activePage'>%s</a>",$date,$page-1,$page);}			   
else if ($page>5) {printf("<div class='pages'><a href='date.php?date=%s&page=%s' class='next'>&lt;&lt;</a>
<a class='pageLinks activePage'>%s</a>",$date,$page-5,$page);}	
else {		    
printf("<div class='pages'><a class='pageLinks activePage'>%s</a>",$page);}
if ($page*25<$p)
{
$stat = $page*25;
$page++;
$k=0;

do {
   printf("<a href='date.php?date=%s&page=%s' class='pageLinks'>%s</a>",$date,$page,$page);
   $page++;
   $stat=$stat+25; 
   $k++;
}
while ($page<($p/25)+1 and $k<4 and $p>25*($page-1) );
if ($stat<$p)
{ printf("<a href='date.php?date=%s&page=%s' class='next'>&gt;&gt;</a>",$date,$page);}	}	   
			 echo "</div></div>";  
include"include/right.php"; 
include"include/footer.php"; ?>
    </body>
</html>