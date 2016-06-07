<?php
//Database Fields
	//OWG_ID, OWG_DESCRIPTION, OWG_OFFENCE_DEFENCE_FLAG

//Object
class Gamemode
{
	//Attributes
	public $Gamemode_ID = 0;
	public $Gamemode_Description = null;
	public $Gamemode_Offence_Defence_Flag = 0;
	
	//Constructor
	public function Gamemode ($Gamemode_ID = 0, $Gamemode_Description = null, $Gamemode_Offence_Defence_Flag = 0)
	{
		$this->Gamemode_ID = $Gamemode_ID;
		$this->Gamemode_Description = $Gamemode_Description;
		$this->Gamemode_Offence_Defence_Flag = $Gamemode_Offence_Defence_Flag;
	}
	
	//Getters
	public function GetGamemodeID()					{	return $this->Gamemode_ID;	}
	public function GetGamemodeDescription()		{	return $this->Gamemode_Description;	}
	public function GetGamemodeOffenceDefenceFlag()	{	return $this->Gamemode_Offence_Defence_Flag;	}
	
	//Setters
}
	
	
//Data Interface
class DIGamemodes
{
	public function GetAllGamemodes()
	{
		$Query = "SELECT * FROM OW_Game_Mode ORDER BY OWG_DESCRIPTION";
		return $this->ReturnGamemode($Query);
	}
	
	public function GetGamemodesByName($G_ID)
	{
		$Query = "SELECT * FROM OW_Game_Mode WHERE OWG_ID = ".$G_ID;
		return $this->ReturnGamemode($Query);
	}
	
	public function GetGamemodesByMap($M_ID)
	{
		$Query = "SELECT * FROM OW_Game_Mode INNER JOIN OW_Maps ON OWM_OWG_ID = OWG_ID WHERE OWM_ID = ".$M_ID." ORDER BY OWG_DESCRIPTION";
		return $this->ReturnGamemode($Query);
	}
	
	public function GetGamemodesByTeam($T_ID)
	{
		$Query = "SELECT * FROM OW_Game_Mode WHERE OWG_OFFENCE_DEFENCE_FLAG = 1 ORDER BY OWG_DESCRIPTION";
		return $this->ReturnGamemode($Query);
	}
	
	public function ReturnGamemode($Query)
	{
		$DB = new MySql();
		$DB->query($Query);
		$i=0;
		$List = array();				
		while ($row = $DB->fetchObject())
		{
			$List[$i] = new Gamemode( $row->OWG_ID, $row->OWG_DESCRIPTION, $row->OWG_OFFENCE_DEFENCE_FLAG);
			$i++;
		}
		return $List;
	}
}
?>