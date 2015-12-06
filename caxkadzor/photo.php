<?php include"include/bd.php";
if (isset($_GET['id'])) {$id = $_GET['id']; }
if (!preg_match("|^[\d]+$|", $id)) {
exit ("<p>Սխալ հղում!</p>");}?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <?php $result = mysql_query("SELECT *  FROM content WHERE id=$id",$db);
if (!$result) { exit(mysql_error()); }
if (mysql_num_rows($result) > 0)
{$myrow = mysql_fetch_array($result);
$metakey=$myrow['metakey'];
 }
else{exit(); } ?>
        <title><?php echo $myrow['title'] ?> |newsroyal.com</title>
        <meta name="keyword" content="<?php echo $metakey ?>">
		<meta name="description" content="newsroyal.com-ը ազատ հարթակ է յուրաքանչյուր քաղաքցու համար՝ անկախ տարիքից, սեռից,քաղաքական ու կրոնական կողմնորոշվածությունից: Ձեր օպերատիվ տեղեկատվության աղբյուրը դարձրեք newsroyal.com-ը:">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css" >
        <link rel="stylesheet" href="css/jquery.fancybox.css" >
        <link rel="stylesheet" href="css/datePicker.css" >
        <link rel="stylesheet" href="css/jquery.jscrollpane.css" >
        <link rel="stylesheet" href="css/print.css"  media="print">

        
        
			<?php 
$img="http://newsroyal.com/upload/".$id.".png";			
$anons=strip_tags($myrow["post"]);
$anons=substr($anons,0,500);
$anons = str_replace("'", "", $anons);
$title=str_replace("'", "", $myrow['title']);
?>
       		<meta property='og:url' content='http://newsroyal.com/photo.php?id=<?php echo $id;?>' />
        	<meta property='og:type' content='website' />
			<meta property='og:title' content='<?php echo $title; ?>' />
			<meta property='og:description' content='<?php echo $anons;?>' />
			<meta property='og:image' content='<?php echo $img;?>' />

				
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
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
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
				<article class="articleShow clearfix">
					<h1><?php echo $myrow['title'] ;?></h1>
					<div class='clearfix'>
						<div class="articleDate"><?php echo $myrow['published'] ;?></div>
						<br><div class="fb-like" data-href="http://newsroyal.com/?p=<?php echo $id ?>" data-width="300" data-height="100" data-colorscheme="light" data-layout="button_count" data-action="recommend" data-show-faces="true" data-send="false"></div>
					</div>
							<br />
                            
                   <div class="fotorama" data-width="630" data-height="420"><div class="photoGallery clearfix">
   <?php 
   
   $extension='';
$files_array = array();
$d=$myrow["gallery"];
$dir="upload/photos/".$d;

$dir_handle = @opendir($dir) or die("Նկարներ Չկան");
while ($file = readdir($dir_handle))
{	
	if($file{0}=='.') continue;
	/* end() выводит последний элемент массива сгенерированного функцией explode(): */
	$extension = strtolower(end(explode('.',$file)));
	if($extension == 'jpg' or $extension == 'gif' or $extension == 'png') {$files_array[]=$file;}
	}
/* Сортируем файлы в алфавитном порядке */
sort($files_array,SORT_STRING);
$file_downloads=array();
foreach($files_array as $key=>$val){
	printf("<div class='imgPrev'><a rel='gallery1' class='fp' href='%s/%s'>
 <img src='%s/%s' /></a></div>",$dir,$val,$dir,$val);}
echo "</div></div>".$myrow["post"];   
$hit = $myrow['hits'] + 1;		
$update = mysql_query("UPDATE content SET hits='$hit' WHERE id=$id",$db);
?>                
					<div class='clearfix'></div>
					<div class="articleTools">
						<div class="print"><a href="javascript:window.print()"><img src="img/print.png" /></a></div>
					  <div class="view">Դիտվել է <span><?php echo $myrow['hits'] ?></span> անգամ</div>
						<div class="share" style="float: right">
							<script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
							<div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="none" data-yashareQuickServices="twitter,lj,gplus,vkontakte,surfingbird"></div>
						</div>
						<div class="share"><a href="http://www.facebook.com/sharer.php?u=newsroyal.com/view_post.php?id=<?php echo $id ?>&t=<?php echo $myrow['title']?>" target="_blank"><img src="img/sharer.png" /></a></div>
				  </div>
					<div class='fb-commetns'>
						<fb:comments href="http://newsroyal.com/?p=1800" width="630" num_posts="2"></fb:comments>
					</div>
				</article>
				<div class="byTags">
									</div>
			</div>

<?php include"include/right.php"; ?>
<?php include"include/footer.php"; ?>
    </body>
</html>