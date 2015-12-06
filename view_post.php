<?php 
session_start();
if(!isset($_SESSION['modal'])){
    $modal_open = true;
    $_SESSION['modal'] = true;
}
else{
    $modal_open = false;;
}
include"include/bd.php";
if (isset($_GET['id'])) {$id = $_GET['id']; }
if (!preg_match("|^[\d]+$|", $id)) {
exit ("<p>Սխալ հղում!</p>");}
if (isset($_GET['ka'])) {$ka = $_GET['ka']; 
if (!preg_match("|^[\d]+$|", $ka)) {
exit ("<p>Սխալ հղում!</p>");}}
$result = mysql_query("SELECT *  FROM content WHERE id=$id",$db);
if (!$result) { exit(mysql_error()); }
if (mysql_num_rows($result) > 0)
{$myrow = mysql_fetch_array($result);
if($myrow['gallery']!='') {
$URL="photo.php?id=".$id;
header("Location:$URL");
exit();
}
$metakey=$myrow['metakey'];
$anons=strip_tags($myrow["post"]);
$anons=substr($anons,0,500);
$anons = str_replace("'", "", $anons);
$title=str_replace("'", "", $myrow['title']);
if ($myrow["video"]!=''){
$video_path=$myrow["video"];
 preg_match("/^(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?(?=.*v=((\w|-){11}))(?:\S+)?$/",$video_path,$out);
 $vi=$out[1];
$img="http://newsroyal.com/timthumb.php?src=http://img.youtube.com/vi/".$vi."/0.jpg&w=400&h=300";}
 else {$img="http://newsroyal.com/upload/".$id.".png";}}
else{exit(); } ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        
        <title><?php echo $myrow['title'] ?> |newsroyal.com</title>
        <meta name="keyword" content="<?php echo $metakey ?>">
		<meta name="description" content="<?php echo $title ?> ">
        <meta name="viewport" content="width=device-width">
         
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css" >
         <link rel="stylesheet" href="css/jquery.jscrollpane.css" >
         <link rel="stylesheet" href="css/print.css"  media="print">
<?php $anons=strip_tags($myrow["post"]);
$anons=substr($anons,0,500);
$anons = str_replace("'", "", $anons);
$title=str_replace("'", "", $myrow['title']);
?>
       		<meta property='og:url' content='http://newsroyal.com/view_post.php?id=<?php echo $id;?>' />
        	<meta property='og:type' content='website' />
			<meta property='og:title' content='<?php echo $title; ?>' />
			<meta property='og:description' content='<?php echo $anons;?>' />
			<meta property='og:image' content='<?php echo $img;?>' />
				
<meta property="fb:admins" content="100000671578157" />
        <meta property="fb:app_id" content="404069583055106"/> 

		
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
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=404069583055106";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	<!-- facebook -->
    
    
<div id="shadow"></div>
<div id="window">
    <h3>Հավանեք մեր ֆեյսբուքյան էջերը և ստացեք նորություններ անմիջապես Ձեր էջից</h3>
    <div class="likeBox" style="float: left;">
      <iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fwwwnewsroyalcom&width=292&height=258&show_faces=true&colorscheme=light&stream=false&border_color=white&header=false&appId=391329710939582"  scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:292px; height:258px;" allowtransparency="true"></iframe>
    </div>
     <div class="likeBox" style="float: left;">
      <iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Farmsolid&width=292&height=258&show_faces=true&colorscheme=light&stream=false&border_color=white&header=false&appId=391329710939582"  scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:292px; height:258px;" allowtransparency="true"></iframe>
    </div>
    <a href="http://web.armsolid.ru/web-kayqeri-patrastum/" target="_blank"><div id="webandhost" style="margin-top: 300px;"></div></a>

<div class="close"></div>
</div> 
	
    <?php if ($ka==1)
		 {include"include/header3.php";}
		 else if  ($ka==3) {include"include/header1.php";}
		 else {include"include/header.php";} ?>
				<div class="main clearfix">
			<div class="bodyLeft clearfix">
				<article class="articleShow clearfix">
                <a href="http://web.armsolid.ru" target="_blank"><div id="webandhost"></div></a>
					<h1><?php echo $myrow['title'] ?></h1>
					<div class='clearfix'>
						<?php 

$hr="http://newsroyal.com/view_post.php?id=".$id
 ?>
                        <div class="articleDate">Հրապարակվել է` <?php echo $myrow['published'] ?></div>
						<br><div class="fb-like" data-href="<?php echo $hr?>" data-width="300" data-height="100" data-colorscheme="light" data-layout="button_count" data-action="recommend" data-show-faces="true" data-send="false"></div>
					</div>
                    
    <?php  if ($myrow['video']!="") {
        $video_path=$myrow["video"];
 preg_match("/^(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?(?=.*v=((\w|-){11}))(?:\S+)?$/",$video_path,$out);
        $vid=$out[1]; 
        //echo "<br /> <object width='640' height='480'><param name='movie' value='//www.youtube.com/v/$vid?version=3&amp;hl=ru_RU&modestbranding=1&egm=0&fs=0'></param><param name='allowFullScreen' value='true'></param><param name='allowscriptaccess' value='always'></param><embed src='//www.youtube.com/v/$vid?version=3&amp;hl=ru_RU&modestbranding=1&egm=0&fs=0' type='application/x-shockwave-flash' width='640' height='480' allowscriptaccess='always' allowfullscreen='true'></embed></object> <br />";
        echo '<br /><div style="text-align:center;"><iframe width="560" height="315" src="https://www.youtube.com/embed/'.$vid.'" frameborder="0" allowfullscreen></iframe></div>';
        }
		 else if ($myrow['img']==5) {echo "<img src='watermark/watermark.php?image=../upload/".$id.".png' width='300' align='left'/> ";}
		 else { echo "<img src='upload/".$myrow['id'].".png' class='news-image' title='$title' alt='$title' />";}
		echo $myrow['post']; 
$hit = $myrow['hits'] + 1;		
$update = mysql_query("UPDATE content SET hits='$hit' WHERE id=$id",$db);		
		?>	<br>

<p><a href="http://pinch3.ru/" target="_blank"><img src="img/govazd.jpg" alt="pinch3" title="pinch3" /></a></p>
<p><a href="http://armsolid.ru" target="_blank"><img src="img/armsolid.jpg" alt="armsolid" title="armsolid" /></a></p>
<p><a href="http://huncultc.ru" target="_blank"><img src="img/huncultc.jpg" alt="huncultc" title="huncultc" /></a></p>
        				
				  <div class='clearfix'></div>
					<div class="articleTools">
						<div class="print"><a href="javascript:window.print()"><img src="img/print.png" /></a></div>
					  <div class="view">Դիտվել է <span><?php echo $myrow['hits'] ?></span> անգամ</div>
						<div class="share" style="float: right">
							<script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
							<div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="none" data-yashareQuickServices="twitter,lj,gplus,vkontakte,surfingbird"></div>
						</div>
						<div class="share"><a href="http://www.facebook.com/sharer.php?u=newsroyal.com/view_post.php?id=<?php echo $id?>&t=<?php echo $myrow['title']?>" target="_blank"><img src="img/sharer.png" /></a></div>
				  </div>
                  <?php 
                 
$hr="http://newsroyal.com/view_post.php?id=".$id; 
 ?>
					<div class='fb-commetns'>
						<fb:comments href="<?php echo $hr ?>" width="630" num_posts="2"></fb:comments>
                         
					</div>
                   
				</article>
				<div class="byTags">
										
						<div class="suggestion">
							<div>
                            <?php 
$newscat = mysql_query("SELECT id,title,published,post,video FROM content WHERE MATCH(metakey) AGAINST('$metakey')  ORDER BY published DESC LIMIT 10 ",$db);
if (!$newscat){
echo "<p>error</p>";exit(mysql_error());}

if (mysql_num_rows($newscat) > 0){
$newscat_row = mysql_fetch_array($newscat);
do {
$anons=strip_tags($newscat_row["post"]);
if ($newscat_row["video"]!='')
{
$video_path=$newscat_row["video"];
 preg_match("/^(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?(?=.*v=((\w|-){11}))(?:\S+)?$/",$video_path,$out);
  printf ("<div class='cat-block-container clearfix'>
	 <div class='cat-block-top clearfix'>
	 <img src='timthumb.php?src=http://img.youtube.com/vi/%s/0.jpg&w=125&h=75' width='125px' height='75px'>
	 <div class='cat-block-date'>%s</div>
	 <div class='cat-block-top-right'>
	 <div><a href='view_post.php?id=%s' >%s</a></div>
	 <span>%s</span></div></div></div>",$out[1],substr($newscat_row["published"],0,16),$newscat_row["id"],$newscat_row["title"],substr($anons,0,500));
}
else{
	 printf ("<div class='cat-block-container clearfix'>
	 <div class='cat-block-top clearfix'>
	 <img src='http://newsroyal.com/upload/%s.png' width='125px' height='75px'>
	 <div class='cat-block-date'>%s</div>
	 <div class='cat-block-top-right'>
	 <div><a href='view_post.php?id=%s' >%s</a></div>
	 <span>%s</span></div></div></div>",$newscat_row["id"],substr($newscat_row["published"],0,16),$newscat_row["id"],$newscat_row["title"],substr($anons,0,500));}}
while ($newscat_row = mysql_fetch_array($newscat)); }
					
							?>
                            
                         </div>
						</div>
									</div>
			</div>
<?php include"include/right.php"; ?>
<?php include"include/footer.php"; ?>
<?php if($modal_open && false):?>
<?php 
$r = rand(1,2);
switch($r){
    case 1:
        $url = 'http://armsolid.ru';
    break;
    case 2:
        $url = 'http://pinch3.ru?lang=arm';
    break;
    case 3:
        $url = 'http://huncultc.ru/';
    break;
}

?>
<script type="text/javascript">
    $('.close').click(function(){
        
        window.open("<?php echo $url;?>");
    })
</script>
<?php endif;?>
    </body>
</html>