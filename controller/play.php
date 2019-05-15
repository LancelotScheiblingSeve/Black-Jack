<?php
	include "../models/cards.php";
	include "../models/gamer.php";
    include "../www/indew.php";

	if($_SESSION["gamer"]["cards"]==""){
		$position=array_rand($cards);
		$_SESSION["croupier"]["cards"][]=$position;
		$_SESSION["croupier"]["points"]+=$cards[$position];
		$game=array_rand($cards);
		$_SESSION["gamer"]["jeu"][]=$position;
		$_SESSION["gamer"]["points"]+=$cards[$position];
	}
	if(isset($_POST["game"])){
		$game=array_rand($cards);
		$_SESSION["gamer"]["cards"][]=$position;
		if($game=="as"){
			$_SESSION["gamer"]["points"]=test_as($_SESSION["gamer"]["points"]);
		}
		else{
			$_SESSION["gamer"]["points"]+=$cards[$position];
		}
		if($_SESSION["gamer"]["points"]>21)
			echo "<br/>".$_SESSION["gamer"]["points"]." points, vous avez perdu<br/>";
	}
	if(isset($_POST["reste"])){
		while($_SESSION["croupier"]["points"]<17){
			$position=array_rand($cards);
			$_SESSION["croupier"]["cards"][]=$position;
			if($position=="as"){
				$_SESSION["croupier"]["points"]=test_as($_SESSION["croupier"]["points"]);
			}else{
	        	$_SESSION["croupier"]["points"]+=$cards[$position];
			}
			if($_SESSION["croupier"]["points"]>21){
				echo "<br/>".$_SESSION["croupier"]["points"]." points, le croupier a perdu<br/>";
			}
			if($_SESSION["croupier"]["points"]< $_SESSION["gamer"]["points"]){
				echo "<br/>le croupier a perdu<br/>";
			}else{
				echo "<br/>vous avez perdu<br/>";
			}
		}
	}
?>