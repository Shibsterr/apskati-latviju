var BGcolors = ["rgb(50,50,50)","white"];

    var BGcolorIndex = 0;
    
    function Krasas() {
        var col=document.getElementById("body");
        var lin=document.getElementById("sakums");
        var hea=document.getElementById("header");
        var par=document.getElementById("parmums");
        if( BGcolorIndex>=BGcolors.length ) {
            BGcolorIndex=0;
        }

        if(BGcolorIndex==0){
            col.style.color = "white";
            lin.style.backgroundImage = "linear-gradient(to bottom, rgb(50,50,50) 30% ,var(--main-color) 130%)";
            par.style.backgroundImage = "linear-gradient(to top, rgb(50,50,50) 40% ,var(--main-color) 150%)";
            hea.style.backgroundColor = "rgb(50,50,50)";
        }else{
            col.style.color = "rgb(50,50,50)";
            lin.style.backgroundImage = "linear-gradient(to bottom, #fff 20% ,var(--bg)70%)";
            par.style.backgroundImage = "linear-gradient(to top, #fff 20% ,var(--bg)70%)";
            hea.style.backgroundColor = "white";
        }
        col.style.backgroundColor = BGcolors[BGcolorIndex];
       
        BGcolorIndex++;
        
    }