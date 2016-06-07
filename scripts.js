/*var 1 = genji;
var 2 = mccree;
var 3 = pharah;
var 4 = reaper;
var 5 = soldier;
var 6 = tracer;
var 7 = bastion;
var 8 = hanzo;
var 9 = junkrat;
var 10 = mei;
var 11 = torbjorn
var 12 = widowmaker;
var 13 = dva;
var 14 = reinhardt;
var 15 = roadhog;
var 16 = winston;
var 17 = zarya;
var 18 = lucio;
var 19 = mercy;
var 20 = symmetra;
var 21 = zenyatta;*/
var result1 = "none";
var result2 = "none";
var result3 = "none";
var result4 = "none";
var result5 = "none";
var result6 = "none";
var playerNumber = 0;
var selectedCharacter = "";
var players = new Array("player1", "player2", "player3","player4","player5","player6");
var playerImages = new Array ("/images/genji","/images/genji","/images/genji","/images/genji","/images/genji","/images/genji");

function soloStrat(){
    document.getElementById("fade").style.opacity = "1";
    document.getElementById("popup").style.display = "block";
    document.getElementById("fade").style.display = "block";
    window.scrollTo(0,0);
    
}

function closePopup(){

    document.getElementById("fade").style.opacity = "0";
    document.getElementById("popup").style.display = "none";
    document.getElementById("fade").style.display = "none";
}

function randomCharacterSelect(){

    
     var randomCharacter = Math.floor( Math.random() * 20 );
    switch(randomCharacter) {

    case 0:
        return "Genji"
      //  window.alert("Genji")
        break;
    case 1:
        return "McCree"
       // window.alert("McCree")
        break;
    case 2:
        return "Pharah"
       // window.alert("Pharah")
        break;
    case 3:
        return "Reaper"
       // window.alert("Reaper")
        break;
    case 4:
        return "Soldier:76"
       // window.alert("Soldier:76")
        break;
    case 5:
        return "Tracer"
       // window.alert("Tracer")
        break;
    case 6:
        return "Bastion"
       // window.alert("Bastion")
        break;
    case 7:
        return "Hanzo"
      //  window.alert("Hanzo")
        break;
    case 8:
        return "Junkrat"
       // window.alert("Junkrat")
        break;
    case 9:
        return "Mei"
      //  window.alert("Mei")
        break;
    case 10:
        return "Torbjorn"
       // window.alert("Torbjorn")
        break;
    case 11:
        return "Widowmaker"
       // window.alert("Widowmaker")
        break;
    case 12:
        return "D.Va"
       // window.alert("D.Va")
        break;
    case 13:
        return "Reinhardt"
       // window.alert("Reinhardt")
        break;
    case 14:
        return "Roadhog"
        //window.alert("Roadhog")
        break;
    case 15:
        return "Winston"
        //window.alert("Winston")
        break;
    case 16:
        return "Zarya"
        //window.alert("Zarya")
        break;
    case 17:
        return "Lucio"
        //window.alert("Lucio")
        break;
    case 18:
        return "Mercy"
        //window.alert("Mercy")
        break;
    case 19:
        return "Symmetra"
        //window.alert("Symmetra")
        break;
    case 20:
        return "Zenyatta"
       // window.alert("Zenyatta")
        break;
    default:
        window.alert("error")
}


}


function getCharacters(){
    
    var e = document.getElementById("playerdrop");
    var playerNumber = e.options[e.selectedIndex].value;
    var n = playerNumber
        for(i = 0; i < n; i++){
            console.log(i);
            
			players[i] = randomCharacterSelect();
            
			console.log(players[i])
            if(i = playerNumber){
                setTimeout(function(){window.location = "results.html";}, 1000);
             
            }
        }
   
	/*var OutputHTML = "Player 1 = " + players[0];
	for (i=1; i < playerNumber; i++)
	{
		OutputHTML = OutputHTML + "<br>"+ " Player " + (i+1) + " = " + players[i];
	}
    document.getElementById("results").innerHTML = OutputHTML;*/
    
    }
// FUNCTION FOR SETTING THE RESULTS IMAGES ON RESULTS.HTML
function getHeroImage(){
    console.log("running get image");
    console.log(playerNumber);
    console.log(players)
    for(i = 0; i < playerNumber; i++){
        var imageSrc = '<img src"/images/'+players[i]+'.png"';
        document.getElementById("player"+i+"img").innerHTML = imageSrc;
        console.log(imageSrc);    
    }
}
    