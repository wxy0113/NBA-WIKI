<?php
/**
 * Created by PhpStorm.
 * User: xywang
 * Date: 10/3/18
 * Time: 9:42 AM
 */
if (isset($_POST["submit"])) {
    echo $_POST["date"];
}
?>

<!DOCTYTPE html>
<html>
<head>

</head>
<body>
<form action="test.php" method="post">
    <input type="date" id="date" name="date">
    <button type="submit" name="submit">Submit</button>
</form>


</body>
</html>
