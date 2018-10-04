<?php
/**
 * Created by PhpStorm.
 * User: xywang
 * Date: 10/1/18
 * Time: 10:32 PM
 */
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
    <div class="jumbotron">
        <h1 align="center">Players By Letter</h1>
        <div class="row">
            <div class="col-md-12"><ul class="pagination pagination-md justify-content-center" id="letter1"></ul></div>
            <div class="col-md-12" align="center">
                <a href="addplayer.php">
                    <button class="btn btn-success">Add New Player</button>
                </a>
            </div>
        </div>
    </div>
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">Player Name</th>
            <th scope="col">Birth</th>
            <th scope="col">College</th>
            <th scope="col">Player Stats</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        require ("connect_db.php");
        $letter = $_GET['letter'];

        //if ($letter) {
            $letter = $letter . '%';
            $sql = "SELECT * FROM playersInfo WHERE playerName LIKE '$letter'";
            $result = mysqli_query($conn, $sql);
//            echo mysqli_num_rows($result);
//            echo $letter;
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo '<td>' . $row["playerName"] . '</td><td>'. $row["birth"] .'</td><td>'. $row["college"] .'</td>
                      <td><a class="btn btn-secondary" href="playerMore.php?playerName='.$row["playerName"].'">View More</a></td>
                      <td><a class="btn btn-warning" href="updatePlayer.php?playerName='.$row["playerName"].'">Edit</a>
                          <a class="btn btn-danger" href="deletePlayer.php?playerName='.$row["playerName"].'">Delete</a></td></tr>';
                }
            }
        //}
        ?>
        </tr>
        </tbody>
    </table>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script>
    let html1 = "";
    for (let i = 0; i <= 25; i++) {
        html1 += ("<li class=\"page-item\"><a class=\"page-link\" href=\"players.php?letter=" + String.fromCharCode(65+i) +"\">"+String.fromCharCode(65+i)+"</a></li>");
    }
    document.getElementById("letter1").innerHTML = html1;
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>