<?php
//Database fields
//	OW_Strats (
// 		OWS_ID	
// 		OWS_Title 
// 		OWS_Description 
// 		OWS_OWM_ID 
// 		OWS_OWG_ID 
// 		OWS_OWT_ID 
// 		OWS_CHARACTER_1 
// 		OWS_CHARACTER_2 
// 		OWS_CHARACTER_3 
// 		OWS_CHARACTER_4 
// 		OWS_CHARACTER_5 
// 		OWS_CHARACTER_6 

//Object
class Strat
{
	//Attributes
	public $Strat_ID = 0;
	public $Strat_Title = null;
	public $Strat_Descripton = null;
	public $Strat_Map_ID = 0;
	public $Strat_Gamemode_ID = 0;
	public $Strat_Team_ID = 0;
	public $Strat_Character_1 = 0;
	public $Strat_Character_2 = 0;
	public $Strat_Character_3 = 0;
	public $Strat_Character_4 = 0;
	public $Strat_Character_5 = 0;
	public $Strat_Character_6 = 0;
	
	//Constructor
	public function Strat ($Strat_ID = 0, $Strat_Title = null, $Strat_Descripton = null, $Strat_Map_ID = 0, $Strat_Gamemode_ID = 0, $Strat_Team_ID = 0, $Strat_Character_1 = 0, $Strat_Character_2 = 0, $Strat_Character_3 = 0, $Strat_Character_4 = 0, $Strat_Character_5 = 0, $Strat_Character_6 = 0)
	{
		$this->Strat_ID = $Strat_ID;
		$this->Strat_Title = $Strat_Title;
		$this->Strat_Descripton = $Strat_Descripton;
		$this->Strat_Map_ID = $Strat_Map_ID;
		$this->Strat_Gamemode_ID = $Strat_Gamemode_ID;
		$this->Strat_Team_ID = $Strat_Team_ID;
		$this->Strat_Character_1 = $Strat_Character_1;
		$this->Strat_Character_2 = $Strat_Character_2;
		$this->Strat_Character_3 = $Strat_Character_3;
		$this->Strat_Character_4 = $Strat_Character_4;
		$this->Strat_Character_5 = $Strat_Character_5;
		$this->Strat_Character_6 = $Strat_Character_6;
	}
	
	//Getters
	public function GetStratID()				{	return $this->Strat_ID;	}
	public function GetStratTitle()				{	return $this->Strat_Title; }
	public function GetStratDescription()		{	return $this->Strat_Descripton; }
	public function GetStratMapID()				{	return $this->Strat_Map_ID; }
	public function GetStratGamemodeID()		{	return $this->Strat_Gamemode_ID; }
	public function GetStratTeamID()			{	return $this->Strat_Team_ID; }
	public function GetStratCharacter1()		{	return $this->Strat_Character_1; }
	public function GetStratCharacter2()		{	return $this->Strat_Character_2; }
	public function GetStratCharacter3()		{	return $this->Strat_Character_3; }
	public function GetStratCharacter4()		{	return $this->Strat_Character_4; }
	public function GetStratCharacter5()		{	return $this->Strat_Character_5; }
	public function GetStratCharacter6()		{	return $this->Strat_Character_6; }
	
	//Setters
}

//Data Interface
class DIStrats
{
	public function GetRandomStrat($M_ID, $G_ID, $T_ID)
	{
		$Query = "SELECT OW_Strats.* FROM OW_Strats WHERE OWS_ID > 0";
		
		if ($M_ID != "ANY") $Query .= " AND OWS_OWM_ID = ".$M_ID; 
		if ($G_ID != "ANY") $Query .= " AND OWS_OWG_ID = ".$G_ID;
		if ($T_ID != "ANY") $Query .= " AND OWS_OWT_ID = ".$T_ID;
		
		$Results = $this->ReturnStrats($Query);
		
		if (COUNT($Results) < 1)
			return null;
		else if (COUNT($Results) == 1)
			return $Results[0];
		else 
			return $Results[rand(0,COUNT($Results)-1)];
		
		
	}
	
	public function ReturnStrats($Query)
	{
		$DB = new MySql();
		$DB->query($Query);
		$i=0;
		$List = array();				
		while ($row = $DB->fetchObject())
		{
			$List[$i] = new Strat($row->OWS_ID,$row->OWS_TITLE,$row->OWS_DESCRIPTION,$row->OWS_OWM_ID, $row->OWS_OWG_ID, $row->OWS_OWT_ID, $row->OWS_CHARACTER_1, $row->OWS_CHARACTER_2, $row->OWS_CHARACTER_3, $row->OWS_CHARACTER_4, $row->OWS_CHARACTER_5, $row->OWS_CHARACTER_6);
			$i++;
		}
		return $List;
	}	
}
?>