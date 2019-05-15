<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Black Jack</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<header></header>
		<h1>Black Jack</h1>
		<?php
			include "../models/cards.php";
			include "../models/gamer.php";
			include "../controller/play.php";
        ?>
        <form method="POST">
			<?php
				$value = 0;
				$_SESSION["croupier"]["cards"] = $position;
				$valcr = $value;
				for ($i = 0;  $valcr <= 17; $i++){
					echo $value." , "; 
					$i <= $valcr;
				}
			?>
			<p>
				Point du croupier :<?php echo $_SESSION["croupier"]['points']; ?>
			</p>
			<p>
				<br>Votre score :
				<?php
					$_SESSION["gamer"]["cards"] = $position;
					$valga = $value;
					for ($i = 0; $valga <= 21; $i++){
						echo $value." , "; 
						$i <= $valga;
					}
				?>
			</p>
			
			<input type="submit" name="carte" value= "carte" />
			<input type="submit" name="reste" value= "reste" />
			<input type="submit" name="start" value= "Nouvelle Partie" />
		</form>
		<?php
			function test($total){
				if($total+11>21){
					return $total+=1;
				}
				elseif($total<21){
					return $total+=11;
				}
			}
		?>
		<footer></footer>
	</body>
</html>