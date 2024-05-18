window.onload = () => {
    localStorage.getItem(BGcolorIndex);
};

/*
let menu = document.querySelector('#menu-bar')
let navbar = document.querySelector('nav')

menu.onclick = () => {
    navbar.classList.toggle('active')
    menu.classList.toggle('fa-times')
}

window.onscroll = () => {
    navbar.classList.remove('active')
    menu.classList.remove('fa-times')
}
*/

var BGcolors = ["rgb(50,50,50)","white"];

    var BGcolorIndex = 0;
    
    function Krasas() {
        var col=document.getElementById("body");
        var lin=document.getElementById("sakums");
        var hea=document.getElementById("header");
        var par=document.getElementById("parmums");
        var myf=document.getElementById("loginBG");

        
        if( BGcolorIndex>=BGcolors.length ) {
            BGcolorIndex=0;
        }

        if(BGcolorIndex==0){
            col.style.color = "white";
            lin.style.backgroundImage = "linear-gradient(to bottom, rgb(50,50,50) 30% ,var(--main-color) 130%)";
            par.style.backgroundImage = "linear-gradient(to top, rgb(50,50,50) 40% ,var(--main-color) 150%)";
            hea.style.backgroundColor = "rgb(50,50,50)";
            myf.style.backgroundColor = "rgb(50,50,50)";

            localStorage.setItem(BGcolorIndex,0);
        }else{
            col.style.color = "rgb(50,50,50)";
            lin.style.backgroundImage = "linear-gradient(to bottom, #fff 20% ,var(--bg)70%)";
            par.style.backgroundImage = "linear-gradient(to top, #fff 20% ,var(--bg)70%)";
            hea.style.backgroundColor = "white";
            myf.style.backgroundColor = "white";

            localStorage.setItem(BGcolorIndex,1);
        }
        col.style.backgroundColor = BGcolors[BGcolorIndex];
       
        BGcolorIndex++;

        
        
        
    }


/*Popularakie SLIDERIS*/
$('.box-container').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1
  });
    

    /*LOGIN*/
    function openForm() {
        document.getElementById("myForm").style.display = "block";
      }
      
      function closeForm() {
        document.getElementById("myForm").style.display = "none";
      }

      if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }




    /*LIETAS KAS JaSALABO
1. Nav bar kad iezoomojas lai strada
2.Jaizveido slick slide prieks POPULARAKIE
3. Reģistrācijas lauka izmeru regulēšana kad zoomojas
4. Krasu nomainas saglabasana uz LocalStorage
    */