<?php
/**
 * Created by PhpStorm.
 * User: xywang
 * Date: 10/2/18
 * Time: 4:00 PM
 */
require ("auth.php");
require ('connect_db.php');


$teamName = $_GET['teamName'];
if (isset($teamName)) {
    $sql = "DELETE FROM teamsInfo WHERE teamName = '$teamName'";
    $result = mysqli_query($conn, $sql);
    if($result) {
        echo "<script>alert('Delete successfully'); </script>";
        header("Location: teams.php");
    } else {
        echo "<script>alert('Failed to delete, try again!'); history.go(-1);</script>";
    }
}