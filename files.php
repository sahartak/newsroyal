<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php 
$extension='';
$files_array = array();
$d="upload/photos/111";
$dir_handle = @opendir($d) or die("There is an error with your file directory!");
while ($file = readdir($dir_handle))
{	/* Пропускаем системные файлы: */
	if($file{0}=='.') continue;
	/* end() выводит последний элемент массива сгенерированного функцией explode(): */
	$extension = strtolower(end(explode('.',$file)));
	/* Пропускаем php файлы: */
	if($extension == 'php') continue;
	$files_array[]=$file;
}
/* Сортируем файлы в алфавитном порядке */
sort($files_array,SORT_STRING);
$file_downloads=array();
foreach($files_array as $key=>$val)
{
	echo '<li>'.$val.'</li>';
}
?>
</body>
</html>
