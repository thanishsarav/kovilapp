<?php
global $db_host, $db_name, $db_user, $db_pass, $con,$path;


$db_host = 'localhost';
$db_name = 'career_kovil';
$db_user = 'career_kovil';
$db_pass = 'Kovil123';  
//$con = mysqli_connect($db_host, $db_user, $db_pass);



$tbl_users = 'users';
$tbl_family = 'family';
$tbl_child = 'child';
$tbl_event = 'event';
$tbl_matrimony = 'matrimony';
$tbl_kattam = 'kattam';
$tbl_attachments = 'attachments';
$tbl_book = 'book';
$tbl_receipt = 'receipt';
$tbl_labels = 'labels';
$tbl_donetion = 'donetion';
$tbl_donetion1 = 'donetion_1';

$path = "http://" . $_SERVER['SERVER_NAME'] . "/kovilapp";
$base_dir = $_SERVER['DOCUMENT_ROOT'] . "/kovilapp" ;

?>