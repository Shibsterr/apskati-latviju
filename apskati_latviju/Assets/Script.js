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



  /*SLIDESHOWS*/

  let slideIndex = 0;
  const slidesToShow = 3; 
  
  function plusSlides(n) {
    showSlides(slideIndex + n);
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
          return;
      }

      fetch('Assets/db.php', {
          method: 'POST',
          headers: {
              'Content-Type': 'application/x-www-form-urlencoded',
          },
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
          } else {
              alert('Failed to update the database.');
          }
      })
      .catch(error => {
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
});
