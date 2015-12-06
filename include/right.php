<div class="bodyRight">
	<div class='latestNews'>
    <div class='blockTitle'><a href="all_news.php">Լրահոս</a></div>
    <div class='latestNewsLine scroll-pane imgg'>
<?php 
 $lastnews = mysql_query("SELECT id,title,published, important FROM content ORDER BY published DESC LIMIT 50",$db);
if (!$lastnews){echo "<p>error</p>";
exit(mysql_error());}
if (mysql_num_rows($lastnews) > 0){
$lastnews_row = mysql_fetch_array($lastnews);}
do {
$date = substr($lastnews_row["important"],11,5);
$id=$lastnews_row["id"];
 
 if ($lastnews_row["important"]==1){
printf ("
<div class='oneNewsLine'><span>%s</span>
     <a href='view_post.php?id=%s' class='featured' >%s</a></div>",$date,$id,$lastnews_row["title"]);}
	 else {
	 printf ("
<div class='oneNewsLine'><span>%s</span>
     <a href='view_post.php?id=%s' >%s</a></div>",$date,$id,$lastnews_row["title"]);
	 }
}

while ($lastnews_row = mysql_fetch_array($lastnews));
 ?>
     </div></div>
     
     	<div class='latestNews'>
    <div class='blockTitle'><a href="all_news.php">Ամենադիտվածները</a></div>
    <div class='latestNewsLine scroll-pane imgg' style="height: 356px;">
<?php 
 $lastnews = mysql_query("SELECT id,title,published, important FROM content ORDER BY hits DESC LIMIT 20",$db);
if (!$lastnews){echo "<p>error</p>";
exit(mysql_error());}
if (mysql_num_rows($lastnews) > 0){
$lastnews_row = mysql_fetch_array($lastnews);}
do {
$date = substr($lastnews_row["important"],11,5);
$id=$lastnews_row["id"];

	 printf ("
<div class='oneNewsLine'><span>%s</span>
     <a href='view_post.php?id=%s' >%s</a></div>",$date,$id,$lastnews_row["title"]);
}
while ($lastnews_row = mysql_fetch_array($lastnews));
 ?>
 <div class='oneNewsLine'>
 <?php 
   global $sape;
    echo $sape->return_links();
 ?>
 </div>
     </div></div>
	<div class="blockTitle">Մենք Facebook-ում</div>
<div class="likeBox">
  <iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fwwwnewsroyalcom&width=292&height=258&show_faces=true&colorscheme=light&stream=false&border_color=white&header=false&appId=391329710939582"  scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:292px; height:258px;" allowtransparency="true"></iframe>
</div>	
