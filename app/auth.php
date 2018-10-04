<?php
/**
 * Created by PhpStorm.
 * User: xywang
 * Date: 10/2/18
 * Time: 9:58 AM
 */
function isLoggedIn()
{
    if (!isset($_SESSION)) {
        session_start();
    }

    return isset($_SESSION['username']);
}

if (!isLoggedIn()) {
    echo "Please Login in as Administrator first ";
    header("Location: login.php");
    exit();
}

