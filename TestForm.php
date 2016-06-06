<head>
<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/overwatchstrats/classes/Class.Main.php');
?>
</head>
<form>
<?php
	$DIMaps = new DIMaps();
	echo 'Map: ';
	echo '<select id=ddlMap name=ddlMap>';
		echo '<option value="ANY">Any</option>';
		
		$AllMaps = $DIMaps->GetAllMaps();
		foreach ($AllMaps as $Map)
		{
			echo '<option value="'.$Map->GetMapID().'">'.$Map->GetMapName().'</option>';
		}
	echo '</select>';
	echo '<br><br>';
?>
<input type="submit" value="Find a strat" />
<form>