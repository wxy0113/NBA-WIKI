<?php
/**
 * Created by PhpStorm.
 * User: xywang
 * Date: 10/2/18
 * Time: 11:36 PM
 */
require ("auth.php");
require ('connect_db.php');


$playerName = $_GET['playerName'];
if (isset($teamName)) {
    $sql = "DELETE FROM playersInfo WHERE playerName = '$playerName'";
    $result = mysqli_query($conn, $sql);
    if($result) {
        echo "<script>alert('Delete successfully'); </script>";
        header("Location: players.php");
    } else {
        echo "<script>alert('Failed to delete, try again!'); history.go(-1);</script>";
    }
}