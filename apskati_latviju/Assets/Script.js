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
          //bg tums
        if(BGcolorIndex==0){
            col.style.color = "white";
            lin.style.backgroundImage = "linear-gradient(to bottom, rgb(50,50,50) 30% ,var(--main-color) 130%)";
            par.style.backgroundImage = "linear-gradient(to top, rgb(50,50,50) 30% ,var(--main-color) 130%)";
            hea.style.backgroundColor = "rgb(50,50,50)";
            myf.style.backgroundColor = "rgb(50,50,50)";
          

            localStorage.setItem(BGcolorIndex,0);
        }else{
          //bg gais
            col.style.color = "rgb(50,50,50)";
            lin.style.backgroundImage = "linear-gradient(to bottom, #fff 20% ,var(--bg)70%)";
            par.style.backgroundImage = "linear-gradient(to top, var(--bg) 30% ,var(--bg) 130%)";
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


    function rediget(id) {
      const popup = document.querySelector('.editpop');
      const objectIdInput = document.getElementById('objectId');
      const objectNameInput = document.getElementById('objectName');
      const objectDescriptionInput = document.getElementById('objectDescription');
      
      // Set objectId value in the hidden field
      objectIdInput.value = id;
      
      // Fetch object data from the server using AJAX
      fetch('fetch_object_data.php?id=' + id)
          .then(response => response.json())
          .then(data => {
              // Fill the form fields with fetched data
              objectNameInput.value = data.name;
              objectDescriptionInput.value = data.description;
          })
          .catch(error => console.error('Error fetching object data:', error));
      
      // Show the popup
      popup.style.display = 'block';
  }

  function paslept(){
    const popup = document.querySelector('.editpop');
      popup.style.display = 'none';
  }


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

document.addEventListener('DOMContentLoaded', (event) => {
  const likeButtons = document.querySelectorAll('.like-btn');
  const dislikeButtons = document.querySelectorAll('.dislike-btn');

  likeButtons.forEach(button => {
      button.addEventListener('click', () => {
          handleLikeDislike(button, 'like');
      });
  });

  dislikeButtons.forEach(button => {
      button.addEventListener('click', () => {
          handleLikeDislike(button, 'dislike');
      });
  });

  function handleLikeDislike(button, choice) {
      const parent = button.closest('p');
      const postId = parent.getAttribute('data-id');

      // Check local storage to prevent multiple likes/dislikes
      const storedChoice = localStorage.getItem(`choice-${postId}`);
      if (storedChoice) {
          alert('You have already performed this action.');
          return;
      }

      fetch('Assets/db.php', {
          method: 'POST',
          headers: {
              'Content-Type': 'application/x-www-form-urlencoded',
          },
          body: `choice=${choice}&postId=${postId}`,
      })
      .then(response => response.text())
      .then(data => {
          console.log('Response data:', data);  // Debug log
          const [likes, dislikes] = data.split(';');
          if (likes && dislikes) {
              parent.querySelector('.patik').innerText = `${likes} `;
              parent.querySelector('.nepatik').innerText = `${dislikes} `;

              // Save the action in local storage
              localStorage.setItem(`choice-${postId}`, choice);
          } else {
              alert('Failed to update the database.');
          }
      })
      .catch(error => {
          console.error('Error:', error);  // Error handling
      });
  }
});
