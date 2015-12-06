<?php
include"include/bd.php";
//mysql_query("INSERT INTO `shared_posts` (`post_id`) VALUES (15610)");die;
//mysql_query("INSERT INTO `shared_posts` (`post_id`) VALUES (15636), (15615)");
$query = "SELECT post_id FROM `shared_posts`";
$result = mysql_query("SELECT `id` FROM `content` WHERE `id` NOT IN ($query) ORDER BY `id` DESC LIMIT 1");
if(mysql_num_rows($result)) {
    $posts = array();
    $insert = '';
    while($row = mysql_fetch_assoc($result)){
        $posts[] = $row['id'];
        $insert .= '('.$row['id'].'), ';
    }
    $insert = substr($insert, 0, -2);
    mysql_query("INSERT INTO `shared_posts` (`post_id`) VALUES $insert");
    echo implode(',', $posts);
} else {
    echo 'no data';
}
