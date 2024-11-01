<?php
$filename_numbers = md5(rand(0,100) . rand(0,100) . rand(0,100) . rand(0,100) . rand(0,100) . rand(0,100) . rand(0,100) . rand(0,100) . rand(0,100) . rand(0,100));
$filename = "/" . $filename_numbers . ".tar.gz";
$fh = fopen(get_option('alex_file_backup_filename'), 'w') or die("can't open file, are you sure I have permission to open the file?");
fclose($fh);
unlink(get_option('alex_file_backup_filename'));
update_option('alex_file_backup_filename', WP_CONTENT_DIR . '/alex-file-backups/' . $filename);
update_option('alex_file_backup_urlpath', get_bloginfo('wpurl') . '/wp-content' . '/alex-file-backups' . $filename);


$backupfile = WP_CONTENT_DIR . '/alex-file-backups/' . $filename;

	if(get_option("alex_file_backup_whattouse")=="exec"){
exec("tar -zcvf " . $backupfile . " " . WP_CONTENT_DIR . "");
		}
			if(get_option("alex_file_backup_whattouse")=="passthru"){
passthru("tar -zcvf " . $backupfile . " " . WP_CONTENT_DIR . "");
		}
			if(get_option("alex_file_backup_whattouse")=="system"){
system("tar -zcvf " . $backupfile . " " . WP_CONTENT_DIR . "");
		}
echo "The backup was completed sucessfully!<br />";
?>