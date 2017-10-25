<?php

include_once $path . '/spiral/wp-config.php';
include_once $path . '/spiral/wp-includes/wp-db.php';
include_once $path . '/spiral/wp-includes/pluggable.php';

global $wpdb;
$group_arr =  $_POST["groups"];
$group_str = "test";
$group_str = implode(', ', $group_arr);
$email_arr = $_POST["emails"];

echo $group_str;
?>