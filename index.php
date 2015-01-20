<html>
<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" href="img/favicon.ico" >

        <title>NBA</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
</head>
<body>
	<div id="logo" class="text-center">
		<h1>NBA Player Stat Search</h1>
	</div>
	<form action="#" method="get">
		<div class="form-group">
            <input type="text" id="player-name" name="name" class="form-control"
                           placeholder="Search for a player..." autofocus/>
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
	</form>
</body>
</html>

<?php
	require_once('player.php');

	if (isset($_GET['name'])) {
		$name = $_REQUEST['name'];
		$searchName = "'%".$name."%'";

		try {
			$conn = new PDO('mysql:host=info344.cm5wpx2yyi3i.us-west-2.rds.amazonaws.com;dbname=info344', 'info344user', '007malts');
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

			// SQL query
			$stmt = $conn->prepare("SELECT * FROM info344.Players WHERE playerName LIKE $searchName");
			$stmt->execute(array());

			// Get array containing all of the result rows
			$result = $stmt->fetchAll();

			// If one or more rows were returned...
			if (count($result)) {
				foreach($result as $row) {
					$tempPlayer = new player($row);
					createPlayerCard($tempPlayer);
				}
			} else {
				echo "No players were found with that name.";
			}

			while($row = $stmt->fetch(PDO::FETCH_OBJ)) {
				print_r($row);
			}

		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
	}

	function createPlayerCard($player) {
		echo "<section class = playerCard>";
		echo "<table class=table>";
		echo "<thead>";
		echo "<tr>";
		echo "<th>Name</th>";
		echo "<th>GP</th>"; 
		echo "<th>FGP</th>";
		echo "<th>TPP</th>";
		echo "<th>FTP</th>";
		echo "<th>PPG</th>";
		echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
		echo "<tr>";
		echo "<td>".$player->getPlayerName()."</td>";
		echo "<td>".$player->getPlayerGP()."</td>";
		echo "<td>".$player->getPlayerFGP()."</td>";
		echo "<td>".$player->getPlayerTPP()."</td>";
		echo "<td>".$player->getPlayerFTP()."</td>";
		echo "<td>".$player->getPlayerPPG()."</td>";
		echo "</tr>";
		echo "</table>";
		echo "</section>";
	}
?>