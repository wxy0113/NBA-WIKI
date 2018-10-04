<?php
/**
 * Created by PhpStorm.
 * User: xywang
 * Date: 10/2/18
 * Time: 3:14 PM
 */
require ("auth.php");
require ('connect_db.php');

$oldPlayerName = $_GET['playerName'];

$oldSql = "SELECT * FROM playersInfo WHERE playerName = '$oldPlayerName'";
$oldResult = mysqli_query($conn, $oldSql);
$row = mysqli_fetch_assoc($oldResult);;
if (isset($_POST["submit"])) {
    $playerName = stripslashes(trim($_POST["playerName"]));
    $height = stripslashes(trim($_POST["height"]));
    $weight = stripslashes(trim($_POST["weight"]));
    $birth = stripslashes(trim($_POST["birth"]));
    $college = stripslashes(trim($_POST["college"]));

    $sql = "UPDATE playersInfo 
            SET playerName='$playerName', height='$height', weight='$weight',
                birth='$birth', college='$college'
            WHERE playerName = '$oldPlayerName'";
    $result = mysqli_query($conn, $sql);
    if($result) {
        echo "<script>alert('Added successfully'); history.go(1);</script>";
    } else {
        echo mysqli_error($result);
        //echo "<script>alert('Failed to add data into database'); history.go(-1);</script>";
    }
}
?>

<!doctype html>
<html lang="en">
<head><meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <title>NBA WIKI</title>
    <style>
        body {
            margin-top: 70px;
            font-family: Lato;
        }
        html {
            height: 100%;
        }
        table {
            text-align: center;
            font-size: 18px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <i class="fas fa-basketball-ball"></i>
        </a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" id='aaa'></span>
        </button>
        <div class="collapse navbar-collapse .navbar-inverse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item  active">
                    <a class="nav-link" href="index.php">NBA WIKI</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="players.php">Players</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="teams.php">Teams</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Admin Login <i class="fas fa-user"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout <i class="fas fa-user-slash"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <h1 align="center">Update Player</h1>
    <div class="row">
        <div style="width: 30%; margin: 25px auto;">
            <form action="updateTeam.php" method="POST">
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Player Name" name="playerName" id="playerName" value="<?php echo $row["playerName"]?>" required>
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Height" name="height" id="height" value="<?php echo $row["height"]?>" required>
                </div>
                <div class="form-group">
                    <input class="form-control" type="number" placeholder="Weight" name="weight" id="weight" value="<?php echo $row["weight"]?>" required>
                </div>
                <div class="form-group">
                    <input class="form-control" type="date" placeholder="Birth" name="birth" id="birth" required value="<?php echo $row["birth"]?>" >
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="College" name="college" id="college" required value="<?php echo $row["college"]?>">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-lg btn-primary btn-block" name="submit" value="Update"/>
                </div>
            </form>
            <a href="players.php">Go Back</a>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>