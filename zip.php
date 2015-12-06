<?php
set_time_limit(0);
//папка в которой будет размещен архив
$archive_dir = "backups/";
//папка с исходными файлами
$src_dir = "upload/";
 
//создание zip архива
$zip = new ZipArchive();
//имя файла архива
$fileName = $archive_dir."mybackup_".date('j_m_Y_h_i_s').".zip";
if ($zip->open($fileName, ZIPARCHIVE::CREATE) !== true) {
    fwrite(STDERR, "Error while creating archive file");
    exit(1);
}
 
//добавляем файлы в архив все файлы из папки src_dir
$dirHandle = opendir($src_dir);
while (false !== ($file = readdir($dirHandle))) {
    $zip->addFile($src_dir.$file, $file);
}
//закрываем архив
$zip->close();
 
fwrite(STDOUT, "Archive created\n");
 
exit(0);