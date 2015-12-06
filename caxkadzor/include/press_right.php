<div class="bodyRight">

	<div class="latestNews popularBlog">
		<div class="blockTitle">Ամենադիտված</div>
		
		<div class='latestNewsLine mostPopBlock scroll-pane' id='max-hits-content'>
        <?php 
		$video = mysql_query("SELECT id,title,video,hits FROM content WHERE video not like '' and 
		(month(published) = month(now()) and year(published) = year(now()) or date_format(published, '%Y%m') = date_format(date_add(now(), interval -1 month), '%Y%m')) ORDER BY hits DESC LIMIT 15",$db);
if (!$video)
{echo "<p>error</p>";exit(mysql_error());}
if (mysql_num_rows($video) > 0){
$video_row = mysql_fetch_array($video);
  
do {
$video_path=$video_row["video"];
 preg_match("/^(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?(?=.*v=((\w|-){11}))(?:\S+)?$/",$video_path,$out);
printf ("<div class='oneNewsLine clearfix'><img src='timthumb.php?src=http://img.youtube.com/vi/%s/0.jpg&w=80&h=55'><span>Դիտվել է %s անգամ</span> <a href='view_post.php?id=%s'>%s</a></div>",$out[1],$video_row["hits"],$video_row["id"],$video_row["title"]);
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
	 printf ("<div class='oneNewsLine clearfix'><img src='http://newsroyal.com/upload/%s.png' width='80px' height='45px'><span>%s</span>
     <a href='view_post.php?id=%s' >%s</a></div>",$hayastan_row["id"],$date,$hayastan_row["id"],$hayastan_row["title"]);
	 }
while ($hayastan_row = mysql_fetch_array($hayastan));
}else{echo "<p>error</p>";exit();}

		?>
			</div>	</div>
</div>				<div class="plus18Block">
					<div class="plusHeader">
						<div class="plusLogo"></div>
					</div>
					<div class="latestNews forPlus latestNewsAdd">
						<div class="blockTitle blockTitleAdd"><a href="categoria.php?cat_id=17">PressArt</a></div>
						<div class='latestNewsLine analytical scroll-pane'>
                        
                          <?php 
$pressblog = mysql_query("SELECT * FROM content,category_rel WHERE content.id=category_rel.id AND category_rel.cat_id=17 and content.gallery not like '' ORDER BY published DESC LIMIT 8",$db);
if (!$pressblog){echo "<p>error</p>";exit(mysql_error());}
if (mysql_num_rows($pressblog) > 0){
$pressblog_row = mysql_fetch_array($pressblog);
do {
$date = substr($pressblog_row["published"],11,5);
printf ("<div class='oneNewsLine clearfix'><img src='http://newsroyal.com/upload/%s.png' width='80px' height='55px'><span>%s</span>
 <a href='photo.php?id=%s'>%s</a></div>",$pressblog_row["id"],$date,$pressblog_row["id"],$pressblog_row["title"]);	 }
while ($pressblog_row = mysql_fetch_array($pressblog));
}else{echo "<p>Ֆայլեր չկան</p>";}  ?>
                        
                        
                      </div>					</div>
					<div class="latestNews forPlus latestNewsAdd">
                    
						<div class="blockTitle blockTitleAdd"><a href="categoria.php?cat_id=20">LifeStyle</a></div>
                        <div class='latestNewsLine analytical scroll-pane'>
                        <?php $hayastan = mysql_query("SELECT * FROM content,category_rel WHERE content.id=category_rel.id AND category_rel.cat_id=20 ORDER BY content.published DESC LIMIT 10",$db);
if (!$hayastan)
{echo "<p>error</p>";exit(mysql_error());}
if (mysql_num_rows($hayastan) > 0){
$hayastan_row = mysql_fetch_array($hayastan);
do {
$date = substr($hayastan_row["published"],11,5);
if ($hayastan_row['video']!='') 
{
$video_path=$hayastan_row["video"];
 preg_match("/^(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?(?=.*v=((\w|-){11}))(?:\S+)?$/",$video_path,$out);
printf ("<div class='oneNewsLine clearfix'><img src='timthumb.php?src=http://img.youtube.com/vi/%s/0.jpg&w=80&h=55' ><span>%s</span>
     <a href='view_post.php?id=%s' >%s</a></div>",$out[1],$date,$hayastan_row["id"],$hayastan_row["title"]);
}
else {
	 printf ("<div class='oneNewsLine clearfix'><img src='http://newsroyal.com/upload/%s.png' width='80px' height='45px'><span>%s</span>
     <a href='view_post.php?id=%s' >%s</a></div>",$hayastan_row["id"],$date,$hayastan_row["id"],$hayastan_row["title"]);}
	 }
while ($hayastan_row = mysql_fetch_array($hayastan));
}else{echo "<p>error</p>";exit();}

		?>
                       </div>					</div>
				</div>
			</div>
		</div>
</footer>