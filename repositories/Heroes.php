<?php
//Database fields
//	OW_Heroes
//		OWH_ID
//		OWH_Name

//Object
class Hero
{
	//Attributes
	public $Hero_ID = 0;
	public $Hero_Name = null;
	
	//Constructor
	public function Hero ($Hero_ID = 0, $Hero_Name = null)
	{
		$this->Hero_ID = $Hero_ID;
		$this->Hero_Name = $Hero_Name;
	}
	
	//Getters
	public function GetHeroID()			{	return $this->Hero_ID;	}
	public function GetHeroName()		{	return $this->Hero_Name;	}
	
	//Setters
}

//Data Interface
class DIHeroes
{
	public function GetAllHeroes()
	{
		$Query = "SELECT OW_Heroes.* FROM OW_Heroes ORDER BY OWH_Name";
		return $this->ReturnHeroes($Query);
	}
	
	public function GetHeroByID($H_ID)
	{
		$Query = "SELECT OW_Heroes.* FROM OW_Heroes WHERE OWH_ID = ".$H_ID;
		$Hero = $this->ReturnHeroes($Query);
		return $Hero[0];
	}
		
	public function ReturnHeroes($Query)
	{
		$DB = new MySql();
		$DB->query($Query);
		$i=0;
		$List = array();				
		while ($row = $DB->fetchObject())
		{
			$List[$i] = new Hero( $row->OWH_ID, $row->OWH_NAME);
			$i++;
		}
		return $List;
	}	
}
?>