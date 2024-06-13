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


/*KRASAS*/
window.onload = () => {
    localStorage.getItem(BGcolorIndex);
};

<<<<<<< HEAD
var BGcolors = ["rgb(50,50,50)", "white"];
var BGcolorIndex = localStorage.getItem('BGcolorIndex') !== null ? parseInt(localStorage.getItem('BGcolorIndex')) : 0;
var col = document.getElementById("body");
var lin = document.getElementById("sakums");
var hea = document.getElementById("header");
var par = document.getElementById("parmums");
var colorToggle = document.getElementById('colorToggle');
var pieci = document.getElementById("pieci");

function applyColors(index) {
    if (index === 0) {
        col.style.color = "white";
        lin.style.backgroundImage = "linear-gradient(to bottom, rgb(50,50,50) 30%, var(--main-color) 130%)";
        par.style.backgroundImage = "linear-gradient(to top, rgb(50,50,50) 30%, var(--main-color) 130%)";
        hea.style.backgroundColor = "rgb(50,50,50)";
        col.style.backgroundColor = BGcolors[index];
        //pieci.style.backgroundImage = "linear-gradient(to bottom, var(--main-color) -30%, rgb(50,50,50) 50%, var(--main-color) 130%)";
        colorToggle.checked = false;
    } else {
        col.style.color = "rgb(50,50,50)";
        lin.style.backgroundImage = "linear-gradient(to bottom, #fff 20%, var(--bg) 70%)";
        par.style.backgroundImage = "linear-gradient(to top, var(--bg) 30%, var(--bg) 130%)";
        hea.style.backgroundColor = "white";
        col.style.backgroundColor = BGcolors[index];
        //pieci.style.backgroundImage = "linear-gradient(to bottom, var(--bg) -10%, #fff 50%, var(--bg) 110%)";
        colorToggle.checked = true;
=======
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

        
        
        
>>>>>>> 5ea5b4438d524637238a467d34c0bfad8c5d7bd3
    }
}

function Krasas() {
    BGcolorIndex = (BGcolorIndex + 1) % BGcolors.length;
    applyColors(BGcolorIndex);
    localStorage.setItem('BGcolorIndex', BGcolorIndex);
}

applyColors(BGcolorIndex);

    /*PAGINATION*/
    document.addEventListener('DOMContentLoaded', function () {
      const content = document.querySelector('.adminTable'); 
      const itemsPerPage = 10;
      let currentPage = 0;
      const items = Array.from(content.getElementsByTagName('tr')).slice(1);
    
    function showPage(page) {
      const startIndex = page * itemsPerPage;
      const endIndex = startIndex + itemsPerPage;
      items.forEach((item, index) => {
        item.classList.toggle('hidden', index < startIndex || index >= endIndex);
      });
      updateActiveButtonStates();
    }
    
    function createPageButtons() {
      const totalPages = Math.ceil(items.length / itemsPerPage);
      const paginationContainer = document.createElement('div');
      const paginationDiv = document.body.appendChild(paginationContainer);
      paginationContainer.classList.add('pagination');
    
     
      for (let i = 0; i < totalPages; i++) {
        const pageButton = document.createElement('button');
        pageButton.textContent = i + 1;
        pageButton.addEventListener('click', () => {
          currentPage = i;
          showPage(currentPage);
          updateActiveButtonStates();
        });
    
          content.appendChild(paginationContainer);
          paginationDiv.appendChild(pageButton);
        }
    }
    
    function updateActiveButtonStates() {
      const pageButtons = document.querySelectorAll('.pagination button');
      pageButtons.forEach((button, index) => {
        if (index === currentPage) {
          button.classList.add('active');
        } else {
          button.classList.remove('active');
        }
      });
    }
    
      createPageButtons();
      showPage(currentPage);
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


<<<<<<< HEAD

  /*SLIDESHOWS*/

  let slideIndex = 0;
  const slidesToShow = 3; 
  
  function plusSlides(n) {
    showSlides(slideIndex + n);
=======
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
>>>>>>> 5ea5b4438d524637238a467d34c0bfad8c5d7bd3
  }
  
  function showSlides(n) {
    const slides = document.getElementsByClassName("box2");
    const totalSlides = slides.length;
  
    // Adjust slideIndex to loop forward
    slideIndex = (n + totalSlides) % totalSlides;
    
    // Hide all slides
    for (let i = 0; i < totalSlides; i++) {
      slides[i].style.display = "none";  
    }
  
    // Display the slides that should be visible
    for (let i = 0; i < slidesToShow; i++) {
      const currentIndex = (slideIndex + i) % totalSlides;
      slides[currentIndex].style.display = "block";
    }
  }
  
<<<<<<< HEAD
  showSlides(slideIndex);
  


/*LIKE DISLIKE*/
document.addEventListener('DOMContentLoaded', () => {
  document.addEventListener('click', function(event) {
      const button = event.target.closest('.patik, .nepatik');
      if (!button) return;

      const postId = button.dataset.id;
      const choice = button.classList.contains('patik') ? 'like' : 'dislike';
      const previousChoice = localStorage.getItem(`choice-${postId}`);

      // If the choice is the same as the previous one, do nothing
      if (previousChoice === choice) {
=======
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
>>>>>>> 5ea5b4438d524637238a467d34c0bfad8c5d7bd3
          return;
      }

      fetch('Assets/db.php', {
          method: 'POST',
          headers: {
              'Content-Type': 'application/x-www-form-urlencoded',
          },
<<<<<<< HEAD
          body: `choice=${choice}&postId=${postId}&previousChoice=${previousChoice || ''}`,
      })
      .then(response => response.json())
      .then(data => {
          if (data.likes !== undefined && data.dislikes !== undefined) {
              const likeCountElement = document.querySelector(`.patik[data-id="${postId}"] .count`);
              const dislikeCountElement = document.querySelector(`.nepatik[data-id="${postId}"] .count`);
              if (likeCountElement && dislikeCountElement) {
                  likeCountElement.innerText = `${data.likes} `;
                  dislikeCountElement.innerText = `${data.dislikes} `;
              } else {
                  console.error('Like or dislike count element not found.');
              }

              // Save the new choice in local storage
              localStorage.setItem(`choice-${postId}`, choice);
          } else if (data.error) {
              alert('Error: ' + data.error);
=======
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
>>>>>>> 5ea5b4438d524637238a467d34c0bfad8c5d7bd3
          } else {
              alert('Failed to update the database.');
          }
      })
      .catch(error => {
<<<<<<< HEAD
          console.error('Error:', error);
      });
  });
});


document.addEventListener('DOMContentLoaded', (event) => {
  const filtrsDropdown = document.getElementById('filtrs');

  filtrsDropdown.addEventListener('change', () => {
      const selectedOption = filtrsDropdown.value;
      const url = window.location.href.split('?')[0]; // Get current URL without query params
      window.location.href = `${url}?filtrs=${selectedOption}`; // Redirect with selected filter option
  });
=======
          console.error('Error:', error);  // Error handling
      });
  }
>>>>>>> 5ea5b4438d524637238a467d34c0bfad8c5d7bd3
});
