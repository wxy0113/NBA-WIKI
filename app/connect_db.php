<?php
/**
 * Created by PhpStorm.
 * User: xywang
 * Date: 10/2/18
 * Time: 10:00 AM
 */

$serverName = "us-cdbr-iron-east-01.cleardb.net";
$username = "bf63b18119111a";
$password = "d931dfe7";
$database = "heroku_a0a3fc25aa7ebb9";

$conn = mysqli_connect($serverName, $username, $password, $database);

if(!$conn) {
    die ("Failed to connect db: " . mysqli_connect_error());
}else {
    //echo "Connect successfully";
}
