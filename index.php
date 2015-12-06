<?php 
if (isset($_GET['p'])) {$id = $_GET['p'];
$URL="http://newsroyal.com/view_post.php?id=".$id;
header("Location:$URL");
exit();
}
include"include/bd.php";
if (isset($_GET['rate'])) {$rate = $_GET['rate'];}
else {$rate=30;} 
if (!preg_match("|^[\d]+$|", $rate)) {
exit ("<p>Սխալ հղում!</p>");}
?>
<!DOCTYPE html>
 <head>
        <meta charset="utf-8">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
   
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <title>newsroyal.com | Արքայական նորություններ Ձեզ համար</title>
        <meta name="viewport" content="width=device-width"/>
        <link rel="stylesheet" href="css/normalize.css"/>
        <link rel="stylesheet" href="css/main.css" />
        <link rel="stylesheet" href="css/jquery.jscrollpane.css" />
       
        <link rel="stylesheet" href="css/print.css"  media="print"/>
			<meta property='og:description' content='newsroyal.com-ը ազատ հարթակ է յուրաքանչյուր քաղաքցու համար՝ անկախ տարիքից, սեռից,քաղաքական ու կրոնական կողմնորոշվածությունից: Ձեր օպերատիվ տեղեկատվության աղբյուրը դարձրեք newsroyal.com-ը:' />
		<meta name="keyword" content="newsroyal.com; pressing; լուրեր; լրատվություն;"/>
		<meta name="description" content="newsroyal.com-ը ազատ հարթակ է յուրաքանչյուր քաղաքցու համար՝ անկախ տարիքից, սեռից,քաղաքական ու կրոնական կողմնորոշվածությունից: Ձեր օպերատիվ տեղեկատվության աղբյուրը դարձրեք newsroyal.com-ը:"/>
		<meta name="author" content="WebandHost"/>
     
		<script>
		function showоrHide(r) {
	
    window.location.href='index.php?rate='+r;
  }
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

	   <?php include"include/header.php"; ?>
				<div class="main clearfix">
			<div class="bodyLeft clearfix">
				<div class="mainNewsBox clearfix">
				  <div class='general'>
                    <ul id='generalSL'>
<?php 
$general = mysql_query("SELECT * FROM content,category_rel WHERE content.id=category_rel.id AND content.important=1 ORDER BY published DESC LIMIT 7",$db);
if (!$general){
echo "<p>error</p>";exit(mysql_error());}
if (mysql_num_rows($general) > 0){
$general_row = mysql_fetch_array($general);
do {
if ($general_row["video"]!='')
{
$video_path=$general_row["video"];
 preg_match("/^(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?(?=.*v=((\w|-){11}))(?:\S+)?$/",$video_path,$out);
printf ("
<div class='gen-item'><img src='timthumb.php?src=http://img.youtube.com/vi/%s/0.jpg&w=650&h=300' width='650px' height='300px'>
     <a href='view_post.php?id=%s' >%s</a></div>",$out[1],$general_row["id"],$general_row["title"]);
}
else {printf ("
<div class='gen-item'><img src='http://newsroyal.com/timthumb.php?src=http://newsroyal.com/upload/%s.png&w=650&h=300' width='650px' height='300px'>
     <a href='view_post.php?id=%s' >%s</a></div>",$general_row["id"],$general_row["id"],$general_row["title"]);}
	 }
while ($general_row = mysql_fetch_array($general));
}
else{echo "<p>error</p>";exit();}  ?>
 </ul><div class='clearfix'></div><a id='gen-prev' class='genbut mainArrLeft' href='#'></a><a id='gen-next' class='genbut mainArrRight' href='#'></a></div>				</div>
<div class="bodyLeftLeft clearfix">				
		<div class="latestNews">
				<div class="blockTitle"><a href="categoria.php?cat_id=1" >Քաղաքական</a></div>
	            <div class='latestNewsLine analytical scroll-pane'>
                        
                         <?php 
$hayastan = mysql_query("SELECT * FROM content,category_rel WHERE content.id=category_rel.id AND category_rel.cat_id=1 ORDER BY content.published DESC LIMIT 20",$db);
if (!$hayastan)
{echo "<p>error</p>";exit(mysql_error());}
if (mysql_num_rows($hayastan) > 0){
$hayastan_row = mysql_fetch_array($hayastan);
do {
$date = substr($hayastan_row["published"],11,5);
	 printf ("<div class='oneNewsLine clearfix'><img src='upload/%s.png' width='80px' height='55px'><span>%s</span>
     <a href='view_post.php?id=%s' >%s</a></div>",$hayastan_row["id"],$date,$hayastan_row["id"],$hayastan_row["title"]);
	 }
while ($hayastan_row = mysql_fetch_array($hayastan));
}else{echo "<p>error</p>";exit();}  ?>
	                  
                      </div>
	  </div>			
					
					
	<div class="latestNews">
						<div class="blockTitle"><a href="categoria.php?cat_id=2" >Մշակույթ</a></div>
	                    <div class='latestNewsLine analytical scroll-pane'>
                        
                         <?php 
$hayastan = mysql_query("SELECT * FROM content,category_rel WHERE content.id=category_rel.id AND category_rel.cat_id=2 ORDER BY content.published DESC LIMIT 20",$db);
if (!$hayastan)
{echo "<p>error</p>";exit(mysql_error());}
if (mysql_num_rows($hayastan) > 0){
$hayastan_row = mysql_fetch_array($hayastan);
do {
$date = substr($hayastan_row["published"],11,5);
	 printf ("<div class='oneNewsLine clearfix'><img src='http://newsroyal.com/upload/%s.png' width='80px' height='55px'><span>%s</span>
     <a href='view_post.php?id=%s' >%s</a></div>",$hayastan_row["id"],$date,$hayastan_row["id"],$hayastan_row["title"]);
	 }
while ($hayastan_row = mysql_fetch_array($hayastan));
}else{echo "<p>error</p>";exit();}  ?>
	                  
                      </div>
	  </div>
  </div>
  
  









				<div class="bodyLeftRight clearfix">
					<div class="latestNews">
					<div class="blockTitle"><a href="categoria.php?cat_id=6" >Միջազգային</a></div>
	                    <div class='latestNewsLine analytical scroll-pane'>
                        
                         <?php 
$hayastan = mysql_query("SELECT * FROM content,category_rel WHERE content.id=category_rel.id AND category_rel.cat_id=6 ORDER BY content.published DESC LIMIT 20",$db);
if (!$hayastan)
{echo "<p>error</p>";exit(mysql_error());}
if (mysql_num_rows($hayastan) > 0){
$hayastan_row = mysql_fetch_array($hayastan);
do {
$date = substr($hayastan_row["published"],11,5);
	 printf ("<div class='oneNewsLine clearfix'><img src='http://newsroyal.com/upload/%s.png' width='80px' height='55px'><span>%s</span>
     <a href='view_post.php?id=%s' >%s</a></div>",$hayastan_row["id"],$date,$hayastan_row["id"],$hayastan_row["title"]);
	 }
while ($hayastan_row = mysql_fetch_array($hayastan));
}else{echo "<p>error</p>";exit();}  ?>
	                  
                      </div>
	  </div>
                    <div class="latestNews">
						<div class="blockTitle"><a href="categoria.php?cat_id=4" >Սպորտ</a></div>
	                    <div class='latestNewsLine analytical scroll-pane'>
                        
                         <?php 
$hayastan = mysql_query("SELECT * FROM content,category_rel WHERE content.id=category_rel.id AND category_rel.cat_id=4 ORDER BY content.published DESC LIMIT 20",$db);
if (!$hayastan)
{echo "<p>error</p>";exit(mysql_error());}
if (mysql_num_rows($hayastan) > 0){
$hayastan_row = mysql_fetch_array($hayastan);
do {
$date = substr($hayastan_row["published"],11,5);
	 printf ("<div class='oneNewsLine clearfix'><img src='http://newsroyal.com/upload/%s.png' width='80px' height='55px'><span>%s</span>
     <a href='view_post.php?id=%s' >%s</a></div>",$hayastan_row["id"],$date,$hayastan_row["id"],$hayastan_row["title"]);
	 }
while ($hayastan_row = mysql_fetch_array($hayastan));
}else{echo "<p>error</p>";exit();}  ?>
	                  
                      </div>
	  </div>
</div>

				<div class="catBlock">
					<div class="catBlockHeader"><span>Գովազդ</span></div>
                    <script type="text/javascript" src="http://fialet.com/g_ads/3899/6130"></script>
                    <a href="http://pinch3.ru/" target="_blank"><img src="img/govazd.jpg" /></a>				
                </div>
			</div>
			
			
            
<?php 
include"include/right.php";
include"include/footer.php"; ?>
	
    </body>
</html>