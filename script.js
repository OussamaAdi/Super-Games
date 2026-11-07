

var annoTitle1 = "Anno 1800";
var annoTitle2 = "PIONEERS OF A NEW DAWN";
var annoTitle3 = "Lead the Industrial Revolution in Anno 1800!";
var annoInfo1 = "The path you choose will define your world. Are you an innovator or an exploiter? A conqueror or a liberator?How the world remembers your name is up to you.";
var annoInfo2 = "In Anno 1800, players will take charge of their own fortune as they navigate the rapidly evolving technological landscape and malicious political arena of the 19th century.";

var battleTitle1 = "Battlefront II";
var battleTitle2 = "HEROES ARE BORN ON THE BATTLEFRONT";
var battleTitle3 = "A new hero, a story untold";
var battleInfo1 = "Put your mastery of the blaster, lightsaber, and the Force to the test online and offline in STAR WARS Battlefront II";
var battleInfo2 = "Embark on an endless Star Wars™ journey from the best-selling Star Wars™ video game franchise of all time. Experience rich multiplayer battlegrounds across all three eras - prequel, classic and new trilogy.";

var doomTitle1 = "DOOM";
var doomTitle2 = "RIP AND TEAR!";
var doomTitle3 = "The Only Thing they Fear... Is You.";
var doomInfo1 = "Hell’s armies have invaded Earth. Become the Slayer in an epic single-player campaign to conquer demons across dimensions and stop the final destruction of humanity.";
var doomInfo2 = "Armed with a shoulder-mounted flamethrower, retractable wrist-mounted blade, upgraded guns and mods, and abilities, you're faster, stronger, and more versatile than ever.";

var ghostTitle1 = "Ghost";
var ghostTitle2 = "BE A SAMURAI";
var ghostTitle3 = "Forge a New Path as the Ghost";
var ghostInfo1 = "In War-Torn Tsushima, Ancient Beauty Endures: In this open-world action adventure, you’ll roam vast countrysides and expansive terrain to encounter rich characters, and discover ancient landmarks.";
var ghostInfo2 = "The Rise of the Ghost: In his quest to reclaim Tsushima, Jin must seek support from old friends and new unlikely allies. He must break away from tradition.";


var gold1 = "rgb(209,190,125)";
var gold2 = "rgb(175, 152, 108)";
var white = "rgb(255,155,255)";
var blue = "rgb(34, 137, 255)";
var blue1 = "rgb(20, 120, 255)";
var orange = "rgb(211, 139, 31)";
var red = "rgb(156,33,29)";



var link1 = "anno.php";
var link2 = "starwarsB.php";
var link3 = "doom.php";
var link4 = "ghost.php";



function topFunction() {
    document.documentElement.scrollTop = 0;
}
function myFunction(imgs) {
    // Get the expanded image
    var expandImg = document.getElementById("expandedImg");
    // Use the same src in the expanded image as the image being clicked on from the grid
    expandImg.src = imgs.src;
    // Use the value of the alt attribute of the clickable image as text inside the expanded image
    imgText.innerHTML = imgs.alt;
}
function changeText(title1, title2, title3, info1, info2, imgs, color1, color2, color3, link) {
    var titl1 = title1;
    var titl2 = title2;
    var titl3 = title3;
    var inf1 = info1;
    var inf2 = info2;
    document.getElementById("title1").innerHTML = titl1;
    document.getElementById("title2").innerHTML = titl2;
    document.getElementById("title3").innerHTML = titl3;
    document.getElementById("info1").innerHTML = inf1;
    document.getElementById("info2").innerHTML = inf2;
    document.getElementById("link").href= link;

    
    document.getElementById("title1").style.color = color1;
    document.getElementById("title2").style.color = color2;
    document.getElementById("title3").style.color = color3;



    // Get the expanded image
    var expandImg = document.getElementById("expandedImg");
    // Use the same src in the expanded image as the image being clicked on from the grid
    expandImg.src = imgs.src;
    // Use the value of the alt attribute of the clickable image as text inside the expanded image
    imgText.innerHTML = imgs.alt;
}
function goBack() {
    window.history.back();
}
