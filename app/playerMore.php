<?php
/**
 * Created by PhpStorm.
 * User: xywang
 * Date: 10/1/18
 * Time: 10:32 PM
 */
require ('connect_db.php');

$oldPlayerName = $_GET['playerName'];
//echo $oldPlayerName;
$oldSql = "SELECT * FROM playersInfo WHERE playerName = '$oldPlayerName'";
$oldResult = mysqli_query($conn, $oldSql);
$sql = "SELECT * FROM playersStat WHERE playerName = '$oldPlayerName'";
$result = mysqli_query($conn, $sql);
$oldRow = mysqli_fetch_assoc($oldResult);
$row = mysqli_fetch_assoc($result);
//echo mysqli_num_rows($result);
//echo mysqli_num_rows($oldResult);
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
        #list {
            font-size: 17px;
        }
        span {
            margin-right: 20px;
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
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-10">
                <h1><?php echo $oldRow["playerName"]?></h1>
            </div>
            <div class="col-md-2">
                <button class="btn btn-info btn-md" onclick="goBack()">Go Back</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <h4><b>Bio Info: </b></h4>
            <ul class="list-group list-group-flush" id="list">
                <li class="list-group-item"><b>Height: </b><span></span><?php echo $oldRow["height"] ?> inch</li>
                <li class="list-group-item"><span><b>Weight: </b></span><?php echo $oldRow["weight"] ?> lbs</li>
                <li class="list-group-item"><b>Birth: </b><span></span><?php echo $oldRow["birth"] ?></li>
                <li class="list-group-item"><b>College: </b><span></span><?php echo $oldRow["college"] ?></li>
                <li class="list-group-item"><b>Position: </b><span></span><?php echo $row["position"] ?></li>
                <li class="list-group-item"><b>Team Name: </b><span></span><a type="btn btn-primary" href="teamMore.php?teamName=<?php echo $row["teamName"] ?>"><?php echo $row["teamName"] ?></a></li>
            </ul>
        </div>
        <div class="col-md-4">
            <h4><b>Stats Info: </b></h4>
            <table class="table table-striped table-bordered">
                <tbody>
                <tr>
                    <th>Points Per Game</th>
                    <td><?php echo $row["mp"] ?></td>
                </tr>
                <tr>
                    <th>Field Goals</th>
                    <td><?php echo $row["fg"] ?></td>
                </tr>
                <tr>
                    <th>Percent of Field Goals</th>
                    <td><?php echo $row["fgPer"] ?></td>
                </tr>
                <tr>
                    <th>3 Pointer Goals</th>
                    <td><?php echo $row["3p"] ?></td>
                </tr>
                <tr>
                    <th>Percent of 3P</th>
                    <td><?php echo $row["3pPer"] ?></td>
                </tr>
                <tr>
                    <th>Assists</th>
                    <td><?php echo $row["ast"] ?></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <h4><b>Stats Info: </b></h4>
            <table class="table table-striped table-bordered">
                <tbody>
                <tr>
                    <th>Free Throws</th>
                    <td><?php echo $row["ft"] ?></td>
                </tr>
                <tr>
                    <th>Percent of Free Throws</th>
                    <td><?php echo $row["ftPer"] ?></td>
                </tr>
                <tr>
                    <th>Offensive Rebounds</th>
                    <td><?php echo $row["orb"] ?></td>
                </tr>
                <tr>
                    <th>Defensive Rebounds</th>
                    <td><?php echo $row["drb"] ?></td>
                </tr>
                <tr>
                    <th>Steals</th>
                    <td><?php echo $row["stl"] ?></td>
                </tr>
                <tr>
                    <th>Blocks</th>
                    <td><?php echo $row["blk"] ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="alert alert-warning" role="alert">
        Tip: Blank means no matched data stored, sorry
    </div>
</div>
<script>
    function goBack(){
        window.history.go(-1)
    }
</script>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>