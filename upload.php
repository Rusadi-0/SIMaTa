<?php

// new filename
date_default_timezone_set('Asia/Kuala_Lumpur');
$filename = time() . '.jpg';

$url = '';
if( move_uploaded_file($_FILES['webcam']['tmp_name'],'img/'.$filename) ){
	// $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . '/upload/' . $filename;
	$url = $filename;
}

// Return image url
echo $url;

// unlink("./img/".$url);