<?php include"include/bd.php";
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
   
        <title>Բոլոր լուրերը |newsroyal.com</title>
        <meta name="keyword" content="">
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
		<?php include"include/header3.php"; ?>
				<div class="mainForBlog">
			<div class="main clearfix"  style="background-color:whitesmoke;">
				<div class="bodyLeft clearfix">
					
       <?php 
	     	   function connect($c,$d)
	   {
	   $result = mysql_query("SELECT id,title_am  FROM categories WHERE id=$c",$d);
if (!$result) { exit(mysql_error()); }
if (mysql_num_rows($result) > 0)
{$myrow = mysql_fetch_array($result); }
else{exit(); }
printf("<div class='bodyLeft_tv'><div class='tv_title'><a href='categoria.php?cat_id=%s'>%s</a></div>",$myrow["id"],$myrow["title_am"]);
	   
	   $newscat = mysql_query("SELECT * FROM content,category_rel WHERE content.id=category_rel.id AND
				category_rel.cat_id=$c AND content.video not like '' ORDER BY content.published DESC LIMIT 10 ",$d);
if (!$newscat){
echo "<p>error</p>";exit(mysql_error());}

if (mysql_num_rows($newscat) > 0){
$newscat_row = mysql_fetch_array($newscat);
do {
$video_path=$newscat_row["video"];
 preg_match("/^(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?(?=.*v=((\w|-){11}))(?:\S+)?$/",$video_path,$out);
        printf ("<div class='tv_cont_box'><a href='view_post.php?id=%s&ka=1'>
          <img src='timthumb.php?src=http://img.youtube.com/vi/%s/0.jpg&w=116&h=83' width='116' height='83' ><div class='tv_box_ttl'>%s</div></a></div>",$newscat_row["id"],$out[1],$newscat_row["title"]);}
while ($newscat_row = mysql_fetch_array($newscat)); 
echo "</div>";}
else { echo "sxal"; exit(); }

}
	 
	   connect(22,$db);connect(23,$db);connect(24,$db);connect(27,$db);   
?>
				  
					
				</div>
				<div class="bodyRight">

	<div class="latestNews popularBlog">
		<div class="blockTitle">Ամենադիտված</div>
		
		<div class='latestNewsLine mostPopBlock scroll-pane' id='max-hits-content'>
        <?php 
		$video = mysql_query("SELECT * FROM content,category_rel WHERE (content.id=category_rel.id) AND
				(category_rel.cat_id='22' || category_rel.cat_id='23' || category_rel.cat_id='24' || category_rel.cat_id='27') AND (content.video not like '') AND 
				(month(content.published) = month(now()) and year(content.published) = year(now()) or date_format(content.published, '%Y%m') = date_format(date_add(now(), interval -1 month), '%Y%m')) ORDER BY content.hits DESC LIMIT 10",$db);
if (!$video)
{echo "<p>error</p>";exit(mysql_error());}
if (mysql_num_rows($video) > 0){
$video_row = mysql_fetch_array($video);
  
do {
$video_path=$video_row["video"];
 preg_match("/^(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?(?=.*v=((\w|-){11}))(?:\S+)?$/",$video_path,$out);
printf ("<div class='oneNewsLine clearfix'><img src='timthumb.php?src=http://img.youtube.com/vi/%s/0.jpg&w=80&h=55'><span>Դիտվել է %s անգամ</span> <a href='view_post.php?id=%s&ka=1'>%s</a></div>",$out[1],$video_row["hits"],$video_row["id"],$video_row["title"]);
	 }
while ($video_row = mysql_fetch_array($video));
}
else{echo "<p>error</p>";exit();}
echo "</div></div>
<div class='latestNews' style='margin-top:10px;'>
		<div class='blockTitle'><a href='categoria.php?cat_id=16'>PressFace</a></div>
		<div class='latestNewsLine analytical scroll-pane'>";


$hayastan = mysql_query("SELECT * FROM content,category_rel WHERE content.id=category_rel.id AND category_rel.cat_id=16 ORDER BY content.published DESC LIMIT 20",$db);
if (!$hayastan)
{echo "<p>error</p>";exit(mysql_error());}
if (mysql_num_rows($hayastan) > 0){
$hayastan_row = mysql_fetch_array($hayastan);
do {
$date = substr($hayastan_row["published"],11,5);
	 printf ("<div class='oneNewsLine clearfix'><span>%s</span>
     <a href='view_post.php?id=%s&ka=1' >%s</a></div>",$date,$hayastan_row["id"],$hayastan_row["title"]);
	 }
while ($hayastan_row = mysql_fetch_array($hayastan));
}else{echo "<p>error</p>";exit();}

		?>
		</div>	</div>
</div>				
			</div>
		</div>
<footer>
			<div class="copy">
				<img src="img/logo.png" />
				2013 © Բոլոր իրավունքները պաշտպանված են: 
				newsroyal.com կայքի նյութերի օգտագործումն առանց ակտիվ հղման հետապնդվում է օրենքով: 
				Հրապարակման հեղինակի կարծիքը ոչ միշտ է համընկնում խմբագրության կարծիքի հետ: 
				Գովազդների բովանդակության համար պատասխանատվությունը գովազդատուներինն է:				</div>
			<div class="mail_wrapper" style="margin-top: 0px;">
				<!-- Circle.Am: DO NOT MODIFY THIS CODE: Start -->
				<script type="text/javascript">(function() {document.write(unescape("%3Cscript src='http://www.circle.am/service/circlecode.php?sid=8517&bid=66' type='text/javascript'%3E%3C/script%3E"));})();</script>
				<noscript><div><a href="http://www.circle.am/?w=8517"  target="_blank"><img src="http://www.circle.am/service/?sid=8517&bid=66" alt='Circle.Am: Rating and Statistics for Armenian Web Resources' /></a></div></noscript>
				<!-- Circle.Am: End -->
				<div style="margin-top:40px">
					<span>Email:</span> <a href="mailto:info@newsroyal.com">info@newsroyal.com</a>				</div>
			</div>
</footer>

        <script src="js/jquery.min.js" tppabs="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="jquery-1.8.0.min.js"/*tpa=http://www.newsroyal.com/js/vendor/jquery-1.8.0.min.js*/><\/script>')</script>
		<script src="js/date.js" tppabs="http://www.newsroyal.com/js/date.js"></script>
		<script src="js/jwplayer.js" tppabs="http://www.newsroyal.com/js/jwplayer.js"></script>
		<script src="js/plugins.js-v0.03" tppabs="http://www.newsroyal.com/js/plugins.js?v0.03"></script>
        <script src="js/main.js-v0.10" tppabs="http://www.newsroyal.com/js/main.js"></script>
        <script src="js/poll.js" tppabs="http://www.newsroyal.com/js/poll.js"></script>
        <script type="text/javascript">
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-37620278-1']);
		  _gaq.push(['_trackPageview']);

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www/') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
		</script>
    </body>
</html>