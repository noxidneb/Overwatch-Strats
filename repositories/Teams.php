<?php
//Database fields
//	OW_Teams
//		OWT_ID
//		OWT_Name

//Object
class Team
{
	//Attributes
	public $Team_ID = 0;
	public $Team_Name = null;
	
	//Constructor
	public function Team ($Team_ID = 0, $Team_Name = null)
	{
		$this->Team_ID = $Team_ID;
		$this->Team_Name = $Team_Name;
	}
	
	//Getters
	public function GetTeamID()			{	return $this->Team_ID;	}
	public function GetTeamName()		{	return $this->Team_Name;	}
	
	//Setters
}

//Data Interface
class DITeams
{
	public function GetAllTeams()
	{
		$Query = "SELECT OW_Teams.* FROM OW_Teams ORDER BY OWT_Name";
		return $this->ReturnTeams($Query);
	}
	
	public function GetTeamsByName($T_ID)
	{
		$Query = "SELECT OW_Teams.* FROM OW_Teams WHERE OWT_ID = ".$T_ID;
		return $this->ReturnTeams($Query);
	}
	
	public function GetTeamsByGamemode($G_ID)
	{
		$Query = "SELECT OW_Teams.* FROM OW_Teams INNER JOIN OW_Game_Mode ON OWG_ID = ".$G_ID." AND OWG_OFFENCE_DEFENCE_FLAG = 1 ORDER BY OWT_Name";
		return $this->ReturnTeams($Query);
	}
	
	public function GetTeamsByMap($M_ID)
	{
		$Query = "SELECT OW_Teams.* FROM OW_Teams INNER JOIN OW_Game_Mode ON OWG_OFFENCE_DEFENCE_FLAG = 1 INNER JOIN OW_Maps ON OWM_OWG_ID = OWG_ID AND OWM_ID = ".$M_ID." ORDER BY OWT_Name";
		return $this->ReturnTeams($Query);		
	}
	
	public function ReturnTeams($Query)
	{
		$DB = new MySql();
		$DB->query($Query);
		$i=0;
		$List = array();				
		while ($row = $DB->fetchObject())
		{
			$List[$i] = new Team( $row->OWT_ID, $row->OWT_NAME);
			$i++;
		}
		return $List;
	}	
}
?>