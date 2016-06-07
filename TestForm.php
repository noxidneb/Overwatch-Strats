<head>
<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/overwatchstrats/classes/Class.Main.php');
?>
</head>

<script>

$( document ).ready(function() {
	PopulateSearch("ANY", "ANY", "ANY");
});

function FilterSearch()
{
	var Map = document.getElementById("ddlMap").value;
	var Gamemode = document.getElementById("ddlGamemode").value;
	var Team = document.getElementById("ddlTeam").value;
	
	PopulateSearch(Map, Gamemode, Team);	
}

function PopulateSearch(Map, Gamemode, Team)
{
	$.ajax({ url: 'ajax/SearchCriteria.php',
         data: "Map="+Map+"&Gamemode="+Gamemode+"&Team="+Team,
         type: 'POST',
	 dataType: "HTML",
	 success: function(response) 
	 { 
		$("#SearchCriteria").html(response); 
		
	 }
	});			
}

function SearchForStrats ()
{
	var Map = document.getElementById("ddlMap").value;
	var Gamemode = document.getElementById("ddlGamemode").value;
	var Team = document.getElementById("ddlTeam").value;
	
	$.ajax({ url: 'ajax/SearchResults.php',
         data: "Map="+Map+"&Gamemode="+Gamemode+"&Team="+Team,
         type: 'POST',
	 dataType: "HTML",
	 success: function(response) 
	 { 
		$("#SearchResults").html(response); 
	 }
	});			
}
</script>
<center>
<div id="SearchForm">
<div id="SearchCriteria"><!-- This is populated via the Ajax --></div>
<button onclick="SearchForStrats()">Find a strat</button>
</div>
<div id="SearchResults"><!-- This is populated via the Ajax --></div>
</center>