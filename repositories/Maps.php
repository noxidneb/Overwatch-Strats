<?php
//Object
class Map
{
	//Attributes
	public $Map_ID = 0;
	public $Map_Name = null;
	public $Map_Gamemode_ID = 0;
	
	//Constructor
	public function Map ($Map_ID = 0, $Map_Name = null, $Map_Gamemode_ID = 0)
	{
		$this->Map_ID = $Map_ID;
		$this->Map_Name = $Map_Name;
		$this->Map_Gamemode_ID = $Map_Gamemode_ID;
	}
	
	//Getters
	public function GetMapID()			{	return $this->Map_ID;	}
	public function GetMapName()		{	return $this->Map_Name;	}
	public function GetMapGamemodeID()	{	return $this->Map_Gamemode_ID;	}
	
	//Setters
}

//Data Interface
class DIMaps
{
	public function GetAllMaps()
	{
		$Query = "SELECT * FROM OW_Maps ORDER BY OWM_MAP_NAME";
		return $this->ReturnMaps($Query);
	}
	
	public function GetMapsByName($M_ID)
	{
		$Query = "SELECT * FROM OW_Maps WHERE OWM_ID = ".$M_ID." ORDER BY OWM_MAP_NAME";
		return $this->ReturnMaps($Query);	
	}
	
	public function GetMapsByGamemode($G_ID)
	{
		
		$Query = "SELECT * FROM OW_Maps WHERE OWM_OWG_ID = ".$G_ID." ORDER BY OWM_MAP_NAME";
		return $this->ReturnMaps($Query);
	}
	
	public function GetMapsByTeam($T_ID)
	{
		$Query = "SELECT owm.* FROM OW_Maps owm INNER JOIN OW_Game_Mode ON OWM_OWG_ID = OWG_ID WHERE OWG_OFFENCE_DEFENCE_FLAG = 1 ORDER BY OWM_MAP_NAME";
		return $this->ReturnMaps($Query);		
	}
	
	public function ReturnMaps($Query)
	{
		$DB = new MySql();
		$DB->query($Query);
		$i=0;
		$List = array();				
		while ($row = $DB->fetchObject())
		{
			$List[$i] = new Map( $row->OWM_ID, $row->OWM_MAP_NAME, $row->OWM_OWG_ID);
			$i++;
		}
		return $List;
	}	
}
?>