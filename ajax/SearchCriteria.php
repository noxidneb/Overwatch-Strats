<?php

	//Ajax we just need to load the basic classes
	require_once($_SERVER['DOCUMENT_ROOT'].'/overwatchstrats/classes/Class.Main-Classes.php');	

	$sMap = $_POST['Map'];
	$sGamemode = $_POST['Gamemode'];
	$sTeam = $_POST['Team'];
	
	$DIMaps = new DIMaps();
	$DIGamemodes = new DIGamemodes();
	$DITeams = new DITeams();
	
	//Filter the results based on what we were passed in
	if ($sMap != "ANY")
	{
		$Maps = $DIMaps->GetMapsByName($sMap);
		$Gamemodes = $DIGamemodes->GetGamemodesByMap($sMap);
		$Teams = $DITeams->GetTeamsByMap($sMap);
	}
	elseif ($sGamemode != "ANY")
	{
		$Gamemodes = $DIGamemodes->GetGamemodesByName($sGamemode);
		$Maps = $DIMaps->GetMapsByGamemode($sGamemode);
		$Teams = $DITeams->GetTeamsByGamemode($sGamemode);
	}
	elseif ($sTeam != "ANY")
	{
		$Teams = $DITeams->GetTeamsByName($sTeam);
		$Gamemodes = $DIGamemodes->GetGamemodesByTeam($sTeam);
		$Maps = $DIMaps->GetMapsByTeam($sTeam);
	}
	else
	{
		$Maps = $DIMaps->GetAllMaps();
		$Gamemodes = $DIGamemodes->GetAllGamemodes();
		$Teams = $DITeams->GetAllTeams();
	}
	
	echo 'Map: ';
	echo '<select id=ddlMap name=ddlMap onchange="FilterSearch()">';
		echo '<option value="ANY">Any</option>';
		foreach ($Maps as $Map)
		{
			if ($sMap == $Map->GetMapID())
				echo '<option value="'.$Map->GetMapID().'" selected>'.$Map->GetMapName().'</option>';
			else
				echo '<option value="'.$Map->GetMapID().'">'.$Map->GetMapName().'</option>';
		}
	echo '</select>';
	
	echo '	Gamemode: ';
	echo '<select id=ddlGamemode name=ddlGamemode onchange="FilterSearch()">';
		echo '<option value="ANY">Any</option>';
		foreach ($Gamemodes as $Gamemode)
		{
			if ($sGamemode == $Gamemode->GetGamemodeID())
				echo '<option value="'.$Gamemode->GetGamemodeID().'" selected>'.$Gamemode->GetGamemodeDescription().'</option>';
			else
				echo '<option value="'.$Gamemode->GetGamemodeID().'">'.$Gamemode->GetGamemodeDescription().'</option>';
		}
	echo '</select>';
	
	echo '	Team: ';
	echo '<select id=ddlTeam name=ddlTeam onchange="FilterSearch()">';
		echo '<option value="ANY">Any</option>';
		foreach ($Teams as $Team)
		{
			if ($sTeam == $Team->GetTeamID())
				echo '<option value="'.$Team->GetTeamID().'" selected>'.$Team->GetTeamName().'</option>';
			else
				echo '<option value="'.$Team->GetTeamID().'">'.$Team->GetTeamName().'</option>';
		}
	echo '</select>';
	echo '<br><br>';
?>