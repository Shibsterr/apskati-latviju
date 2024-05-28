let menu = document.querySelector('#menubar')
let navbar = document.querySelector('nav')

menu.onclick = () => {
    navbar.classList.toggle('active')
    menu.classList.toggle('fa-times')
}

window.onscroll = () => {
    navbar.classList.remove('active')
    menu.classList.remove('fa-times')
}



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
          //bg light
        if(BGcolorIndex==0){
            col.style.color = "white";
            lin.style.backgroundImage = "linear-gradient(to bottom, rgb(50,50,50) 30% ,var(--main-color) 130%)";
            par.style.backgroundImage = "linear-gradient(to top, rgb(50,50,50) 40% ,var(--main-color) 150%)";
            hea.style.backgroundColor = "rgb(50,50,50)";
            myf.style.backgroundColor = "rgb(50,50,50)";

            localStorage.setItem(BGcolorIndex,0);
        }else{
          //bg tums
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




    // LIKE DISLIKES
  //   document.addEventListener('DOMContentLoaded', () => {
  //     const likeBtns = document.querySelectorAll('.like-btn');
  //     const dislikeBtns = document.querySelectorAll('.dislike-btn');
  
  //     likeBtns.forEach(btn => {
  //         btn.addEventListener('click', () => handleLikeDislike(btn, 'like'));
  //     });
  
  //     dislikeBtns.forEach(btn => {
  //         btn.addEventListener('click', () => handleLikeDislike(btn, 'dislike'));
  //     });
  
  //     function handleLikeDislike(button, type) {
  //         const postId = button.parentElement.getAttribute('data-id');
  //         const storedChoice = localStorage.getItem(`choice_${postId}`);
  
  //         if (storedChoice !== type) {
  //             localStorage.setItem(`choice_${postId}`, type);
  //             updateDatabase(postId, type);
  //         }
  //     }
  
  //     function updateDatabase(postId, type) {
  //         const xhr = new XMLHttpRequest();
  //         xhr.open('POST', 'Assets/db.php', true);
  //         xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  //         xhr.onreadystatechange = function() {
  //             if (xhr.readyState === 4 && xhr.status === 200) {
  //                 const response = xhr.responseText.split(';');
  //                 if (response.length === 2) {
  //                     const likes = response[0];
  //                     const dislikes = response[1];
  //                     document.querySelector(`.patik[data-id='${postId}']`).innerHTML = `${likes} <i class='fas fa-thumbs-up like-btn'></i>`;
  //                     document.querySelector(`.nepatik[data-id='${postId}']`).innerHTML = `${dislikes} <i class='fas fa-thumbs-down dislike-btn'></i>`;
  //                 } else {
  //                     console.error('Error:', xhr.responseText);
  //                 }
  //             }
  //         };
  //         xhr.send(`postId=${postId}&choice=${type}`);
  //     }
  // });
  
  
  
    //--------------------------------------------------------------



/*
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("box2");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slides[slideIndex-1].style.display = "block";  
}
*/
  


let slideIndex = 0;
const slidesToShow = 3; 

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("box2");
  console.log("n = "+n);
  

  if (n > slides.length) {
    slideIndex = 0;
    n = 1;
  }
  if (n >= slides.length) {
    //console.log("slideindex n>=length"+slideIndex);
    //console.log("slideindex n>=length"+n);
    slideIndex = 0;
    n = 1;
  }
  // 0 < n <= slides.length
  if (n < 0) {
    slideIndex = slides.length - slidesToShow
    console.log("slideindex n<0"+slideIndex);
  }
  
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }


//*nakamais slide kad spiez > pogu
  for (i = 0; i < slidesToShow; i++) {
    if (slides[slideIndex + i]) {
      slides[slideIndex + i].style.display = "block";
      //console.log("slideindex "+slideIndex);
      //ieprieksejais slide kad spiez > pogu
    }else if(i > slidesToShow){
      console.log("i variable: "+i);
      slides[slideIndex - i].style.display = "block";   
      //console.log("Slide index pēc slides[slideindex +1] else zars"+slideIndex);
    }
  }

  
}


showSlides(slideIndex);



/*
let slideIndex = 0;
const slidesToShow = 3;

function plusSlides(n) {
  slideIndex += n;
  showSlides(slideIndex);
}

function showSlides(n) {
  let slides = document.getElementsByClassName("box2");
  let totalSlides = slides.length;


  if (n >= totalSlides) {
    slideIndex = 0;
  } else if (n < 0) {
    slideIndex = totalSlides - slidesToShow;
    if (slideIndex < 0) slideIndex = 0;
  }

  
  for (let i = 0; i < totalSlides; i++) {
    slides[i].style.display = "none";
  }

  
  for (let i = 0; i < slidesToShow; i++) {
    let index = (slideIndex + totalSlides - slidesToShow + i) % totalSlides;
    slides[index].style.display = "block";
  }
}

showSlides(slideIndex);
*/
// let slideIndex = 0;
// const slidesToShow = 3;

// function plusSlides(n) {
//   slideIndex += n;
//   showSlides(slideIndex);
// }

// function showSlides(n) {
//   let slides = document.getElementsByClassName("box2");
//   let totalSlides = slides.length;

//   // Adjust the slide index for looping
//   if (n >= totalSlides) {
//     slideIndex = 0;
//   } else if (n < 0) {
//     slideIndex = totalSlides - slidesToShow;
//   }

//   // Hide all slides
//   for (let i = 0; i < totalSlides; i++) {
//     slides[i].style.display = "none";
//   }

//   // Show the correct number of slides
//   for (let i = 0; i < slidesToShow; i++) {
//     let slideToShowIndex = (slideIndex + i) % totalSlides;
//     slides[slideToShowIndex].style.display = "block";
   
//   }

//   // Handle special case when slides wrap around the end
//   if (slideIndex + slidesToShow > totalSlides) {
//     let overlap = (slideIndex + slidesToShow) % totalSlides;
//     for (let i = 0; i < overlap; i++) {
//       slides[i].style.display = "block";
//     }
//   }
// }

// // Initial call to display the slides
// showSlides(slideIndex);

// var slideIndex = 1;
// showSlides(slideIndex);

// function plusSlides(n) {
//     showSlides(slideIndex += n);
// }

// function showSlides(n) {
//     var i;
//     var slides = document.getElementsByClassName("slide");
//     var dots = document.getElementsByClassName("ppg");
//     if (n > slides.length) { slideIndex = 1 }
//     if (n < 1) { slideIndex = slides.length }
//     for (i = 0; i < slides.length; i++) {
//         slides[i].style.display = "none";
//     }
//     for (i = 0; i < dots.length; i++) {
//         dots[i].className = dots[i].className.replace(" active", "");
//     }
//     slides[slideIndex - 1].style.display = "block";
//     dots[slideIndex - 1].className += " active";
// }

