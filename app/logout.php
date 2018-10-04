<?php
/**
 * Created by PhpStorm.
 * User: xywang
 * Date: 10/2/18
 * Time: 9:30 PM
 */
session_start();
// Destroying All Sessions
if(session_destroy())
{
// Redirecting To Home Page
    header("Location: index.php");
}