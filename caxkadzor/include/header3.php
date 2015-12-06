<header>
			<div class="headerTv">
				<div class="realHeader">
					<div class="logo">
						<a href="index.php">
							<img src="img/logo.png"  />
						</a>
					</div>
					<div class="rightHead clearfix">
					  <div class="calendar"></div>      
                     <div class="rss_feed_ico"><a href="rss.xml" target="_blank"></a></div>
						<div class="searchBox clearfix">
							<form action="search.php" method="post">
								<input type="search" class="search" placeholder="որոնում" name="search" size="25" maxlength="40" value="" />
								<input type="submit" name="submit_s" value="" class="ssubmit" />
							</form>
						</div>
						<div class="topHeadlines clearfix">
							<span>Կարևոր գլխագրեր</span>
							<a id="featured-prev" class="topArrLeft" href="#"></a>
							<ul id="featuredSL">
                             <?php 
$general = mysql_query("SELECT id,title,video FROM content WHERE important=1 ORDER BY published DESC LIMIT 5",$db);
if (!$general){
echo "<p>error</p>";exit(mysql_error());}
if (mysql_num_rows($general) > 0){
$general_row = mysql_fetch_array($general);
do {
if ($general_row["video"]!='')
{
$video_path=$general_row["video"];
 preg_match("/^(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?(?=.*v=((\w|-){11}))(?:\S+)?$/",$video_path,$out);
printf ("<div class='topHeadlinesShow'><img src='timthumb.php?src=http://img.youtube.com/vi/%s/0.jpg&w=45&h=30' width='45px' height='30px'>
     <a href='view_post.php?id=%s' >%s</a></div>",$out[1],$general_row["id"],$general_row["title"]);
}

else {
printf ("<div class='topHeadlinesShow'><img src='http://newsroyal.com/upload/%s.png' width='45px' height='30px'>
     <a href='view_post.php?id=%s' >%s</a></div>",$general_row["id"],$general_row["id"],$general_row["title"]);}
	 }
while ($general_row = mysql_fetch_array($general));
}
else{echo "<p>error</p>";exit();}  ?>
				</ul>
							<a id="featured-next" class="topArrRight" href="#"></a>
						</div>
					</div>
				</div>
			</div>
			<div class="menuLine">
				<div class="realMenu">
					<div class="dropDownMenuBox">
						<div class="dropMenu clearfix">
							<div class="dropCat">
								<a href="categoria.php?cat_id=1">Հայաստան</a>
								<a href="categoria.php?cat_id=3">Տնտեսություն</a>
								<a href="categoria.php?cat_id=4">Իրավունք</a>
								<a href="categoria.php?cat_id=5">Հասարակություն</a>
								<a href="categoria.php?cat_id=6">Սպորտ</a>
								<a href="categoria.php?cat_id=15">Այլ</a>							</div>
						</div>
					</div>
					<a href="index.php" >Գլխավոր էջ</a>
				  <div class="menuDivider"></div>
					<a href="#" class='sub-open'>Լուրեր</a>
					<div class="menuDivider"></div>
					<a href="categoria.php?cat_id=7">Քաղաքական</a>
					<div class="menuDivider"></div>
					<a href="categoria.php?cat_id=2">Միջազգային</a>
					<div class="menuDivider"></div>
					<a href="categoria.php?cat_id=8">Վերլուծական</a>
					<div class="menuDivider"></div>
					<a href="press_tv.php">Press TV</a>
					<div class="menuDivider"></div>
					<a href="pressblog.php" >PressBlog</a>
				  <div class="menuDivider"></div>
					<a href="categoria.php?cat_id=10">Մամուլ</a>
					<div class="menuDivider"></div>
					<div class="weatherBox"><div class="weather fbframe fancybox.iframe clearfix" 
                    href="weather/weather.html"></div></div>
					<div class="menuDivider"></div>
					<a href="#" class='rate-open'>Փոխարժեք</a>
					<div class="rateBox">
						<div class="rates">
                        
         <a href='http://time-clock.biz/kursy/amd' id='interchange_link_1382094725'></a>
	
			<span id='rate_echo_kurs_insert_html_1382094725'></span>
			

							<div class="rateTablo-elem">
								<span>1</span><img src="img/icons/dollar.png">
								<span>= <b id='insert_rate_USD_1382094725'>//-//</b></span><img src="img/icons/dram.png"  align="right" >							</div>
							<div class="rateTablo-elem">
								<span>1</span><img src="img/icons/euro.png" >
								<span>= <b id='insert_rate_EUR_1382094725'>//-//</b></span><img src="img/icons/dram.png"  align="right"  >							</div>
							<div class="rateTablo-elem">
								<span>1</span><img src="img/icons/roubl.png" >
								<span>= <b id='insert_rate_RUB_1382094725'>//-//</b></span><img src="img/icons/dram.png"  align="right"  >							</div>
								<script language='JavaScript' src='http://fast.time-clock.biz/script.php?go=get_informer&id=150312'>
</script>
						</div>
					</div>
				</div>
			</div>
	</header>