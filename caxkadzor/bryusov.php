<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Բրյուսովի անվան հանգստյան տուն</title>
        <meta name="keyword" content="Հանգիստ Ծաղկաձորում">
		<meta name="description" content="Հանգիստ Ծաղկաձորում բոլորի համար 3 օրվա (3 օր 2 գիշեր) համար վճարելով ԸՆԴԱՄԵՆԸ 16.500 դրամ: Արժեքի մեջ ներառված է տեղափոխում բարձրակարգ ավտոբուսներով, 2, 3 և 4 հոգու համար նախատեսված եվրովերանորոգված հարմարավետ սենյակներ, 3 անգամյա բարձրորակ սնունդ, արշավ Ծաղկաձորում,անվճար Wi-Fi, սեղանի թենիս և բիլիարդ, ամենօրյա դիսկոտեկ, հետաքրքրաշարժ խաղեր:">
        <meta name="viewport" content="width=device-width">
         
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css" >
        <link rel="stylesheet" href="css/jquery.fancybox.css" >
        <link rel="stylesheet" href="css/datePicker.css" >
        <link rel="stylesheet" href="css/jquery.jscrollpane.css" >
        <link rel="stylesheet" href="css/print.css"  media="print">

 		
		
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
	
    <?php include"include/header.php";?>
				<div class="main clearfix">
			<div class="bodyLeft clearfix">
				<article class="articleShow clearfix">
               				<h1 align="center">Բրյուսովի անվան հանգստյան տուն</h1>
					<div class='clearfix'>
						
						<br><div class="fb-like" data-href="http://caxkadzor.newsroyal.com/bryusov.php" data-width="300" data-height="100" data-colorscheme="light" data-layout="button_count" data-action="recommend" data-show-faces="true" data-send="false"></div>
					</div>
                    
     <div class="fotorama" data-width="630" data-height="420"><div class="photoGallery clearfix">
   <?php 
   
   $extension='';
$files_array = array();
$d=$myrow["gallery"];
$dir="bryusov";

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
?>        
										<div class='clearfix'></div>
					<div class="articleTools">
						
						<div class="share" style="float: right">
							<script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
							<div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="none" data-yashareQuickServices="twitter,lj,gplus,vkontakte,surfingbird"></div>
						</div>
						<div class="share"><a href="http://www.facebook.com/sharer.php?u=caxkadzor.newsroyal.com/bryusov.php&t=Հանգիստ Ծաղկաձորում բոլորի համար 3 օրվա (3 օր 2 գիշեր) համար վճարելով ԸՆԴԱՄԵՆԸ 16.500 դրամ:" target="_blank"><img src="img/sharer.png" /></a></div>
				  </div>
                 
				</article>
			</div>
<?php include"include/right.php"; ?>
<?php include"include/footer.php"; ?>
    </body>
</html>