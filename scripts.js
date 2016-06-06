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

function soloStrat(){
    document.getElementById("fade").style.opacity = "1";
    document.getElementById("popup").style.display = "block";
    document.getElementById("fade").style.display = "block";
    
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
        return selectedCharacter = "Genji"
      //  window.alert("Genji")
        break;
    case 1:
        return selectedCharacter = "McCree"
       // window.alert("McCree")
        break;
    case 2:
        return selectedCharacter = "Pharah"
       // window.alert("Pharah")
        break;
    case 3:
        return selectedCharacter = "Reaper"
       // window.alert("Reaper")
        break;
    case 4:
        return selectedCharacter = "Soldier:76"
       // window.alert("Soldier:76")
        break;
    case 5:
        return selectedCharacter = "Tracer"
       // window.alert("Tracer")
        break;
    case 6:
        return selectedCharacter = "Bastion"
       // window.alert("Bastion")
        break;
    case 7:
        return selectedCharacter = "Hanzo"
      //  window.alert("Hanzo")
        break;
    case 8:
        return selectedCharacter = "Junkrat"
       // window.alert("Junkrat")
        break;
    case 9:
        return selectedCharacter = "Mei"
      //  window.alert("Mei")
        break;
    case 10:
        return selectedCharacter = "Torbjorn"
       // window.alert("Torbjorn")
        break;
    case 11:
        return selectedCharacter = "Widowmaker"
       // window.alert("Widowmaker")
        break;
    case 12:
        return selectedCharacter = "D.Va"
       // window.alert("D.Va")
        break;
    case 13:
        return selectedCharacter = "Reinhardt"
       // window.alert("Reinhardt")
        break;
    case 14:
        return selectedCharacter = "Roadhog"
        //window.alert("Roadhog")
        break;
    case 15:
        return selectedCharacter = "Winston"
        //window.alert("Winston")
        break;
    case 16:
        return selectedCharacter = "Zarya"
        //window.alert("Zarya")
        break;
    case 17:
        return selectedCharacter = "Lucio"
        //window.alert("Lucio")
        break;
    case 18:
        return selectedCharacter = "Mercy"
        //window.alert("Mercy")
        break;
    case 19:
        return selectedCharacter = "Symmetra"
        //window.alert("Symmetra")
        break;
    case 20:
        return selectedCharacter = "Zenyatta"
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
            randomCharacterSelect();

            players[i] = selectedCharacter;
            console.log(players[i])
        }
    window.location = "/results.html";
    document.getElementById("results").innerHTML = "Player 1 = " +players[0] +"<br>"+ " Player 2 = "+players[1]
    
    }
    