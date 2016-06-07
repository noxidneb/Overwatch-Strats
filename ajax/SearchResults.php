<?php

	//Ajax we just need to load the basic classes
	require_once($_SERVER['DOCUMENT_ROOT'].'/overwatchstrats/classes/Class.Main-Classes.php');	

	$sMap = $_POST['Map'];
	$sGamemode = $_POST['Gamemode'];
	$sTeam = $_POST['Team'];
	
	$DIStrats = new DIStrats();
	$Strat = $DIStrats->GetRandomStrat($sMap, $sGamemode, $sTeam);
	
	if ($Strat == null)
	{
		echo "<h1>Nothing found :(</h1>";
	}
	else 
	{
		$DIHeroes = new DIHeroes();
		echo "<br>";
		echo "<h1>".$Strat->GetStratTitle()."</h1><br>";
		echo "<p>".$Strat->GetStratDescription()."</p><br>";
		
		echo "<table border = 1px>";
		echo "<tr>";
		echo "<td width=75px height=75px bgcolor=#FF0000 >".$DIHeroes->GetHeroByID($Strat->GetStratCharacter1())->GetHeroName()."</td>";
		echo "<td width=75px height=75px bgcolor=#00FF00 >".$DIHeroes->GetHeroByID($Strat->GetStratCharacter2())->GetHeroName()."</td>";
		echo "<td width=75px height=75px bgcolor=#FF0000 >".$DIHeroes->GetHeroByID($Strat->GetStratCharacter3())->GetHeroName()."</td>";
		echo "<td width=75px height=75px bgcolor=#00FF00 >".$DIHeroes->GetHeroByID($Strat->GetStratCharacter4())->GetHeroName()."</td>";
		echo "<td width=75px height=75px bgcolor=#FF0000 >".$DIHeroes->GetHeroByID($Strat->GetStratCharacter5())->GetHeroName()."</td>";
		echo "<td width=75px height=75px bgcolor=#00FF00 >".$DIHeroes->GetHeroByID($Strat->GetStratCharacter6())->GetHeroName()."</td>";
		echo "</tr>";
		echo "</table>";
	}
	
?>

