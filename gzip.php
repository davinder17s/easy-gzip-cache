<?php
$file = $_GET['file'];

$last_modified = strtotime(gmdate('Y-m-d H:i:s'));

$filepath = explode('?', $file);
$file = $filepath[0];
if(!is_file($file)) {
	header('HTTP/1.0 404 Not Found');
	echo 'No file found';
	exit;
}
$last_modified = filemtime($file);
$file_contents = file_get_contents($file);
if($_GET['type'] == 'css') {
	header('content-type: text/css');
} else if($_GET['type'] == 'js') {
	header('content-type: application/javascript');
} else if($_GET['type'] == 'png') {
	header('content-type: image/png');
} else if($_GET['type'] == 'jpg') {
	header('content-type: image/jpeg');
}
header('E-tag:' .md5($file_contents));
header('Last-Modified: '. gmdate('D, d M Y H:i:s \G\M\T', $last_modified));
header('Expires: '. gmdate('D, d M Y H:i:s \G\M\T', $last_modified));
header('Connection: close');
if(!empty($_SERVER['HTTP_IF_MODIFIED_SINCE']) 
	&& $_SERVER['HTTP_IF_MODIFIED_SINCE'] == gmdate('D, d M Y H:i:s \G\M\T', $last_modified)) {
	header("HTTP/1.0 304 Not Modified");
	
	exit;
}
if( strstr($_SERVER['HTTP_USER_AGENT'], 'W3C_Validator')!==false 
	|| strstr($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')===false ){
	
	echo $file_contents;
} else {
	header('Content-Encoding: gzip');

	$output = "\x1f\x8b\x08\x00\x00\x00\x00\x00";
   	$output .= substr(gzcompress($file_contents, 9), 0, -4);
	echo $output;
}