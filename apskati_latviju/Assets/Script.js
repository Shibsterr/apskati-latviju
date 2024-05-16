var BGcolors = ["rgb(50,50,50)","white"];
var TXTcolors = ["white","rgb(50,50,50)"];
    var BGcolorIndex = 0;
    var TXTcolorIndex = 0;
    function Krasas() {
        var col=document.getElementById("body");
        if( BGcolorIndex>=BGcolors.length ) {
            BGcolorIndex=0;
        }

        if( TXTcolorIndex>=TXTcolors.length ) {
            TXTcolorIndex=0;
        }
        col.style.backgroundColor = BGcolors[BGcolorIndex];
        col.style.color = TXTcolors[TXTcolorIndex];
        BGcolorIndex++;
        TXTcolorIndex++;
    }