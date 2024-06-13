<?php
        require "Assets/db.php";
        session_start();
        if (isset($_POST['autorizacija'])) {
            $_SESSION['lietotajvards_GG69'] = $_POST['lietotajvards'];
            
        }
?>

<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apskati Latviju</title>
    <link rel="stylesheet" href="Assets/Style.css">
    <link rel="shortcut icon" href="Images/Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

<header id="header">
        <a href="./index.php" class="logo"><img src="Images/Logo.png" alt=""></img>Apskati Latviju</a>
        <div id="laba">
        <nav>
            <a href="index.php" class="<?php echo($page == 'sakums' ? 'current' : ''); ?>">Sākumlapa</a>
            <a href="aktualitates.php"class="<?php echo($page == 'aktualitates' ? 'current' : ''); ?>">Aktualitātes</a>
            <a href="jaunumi.php" class="<?php echo($page == 'jaunumi' ? 'current' : ''); ?>">Jaunākie ceļojumi</a>
            <a href="celojumi.php" class="<?php echo($page == 'piedavatie' ? 'current' : ''); ?>">Piedāvātie ceļojumi</a>
            <a href="parmums.php" class="<?php echo($page == 'par' ? 'current' : ''); ?>">Par mums</a>
            <?php
            if(isset($_SESSION['lietotajvards_GG69'])){        
                // echo "<a href='iestatijumi.php'>Iestatījumi</a>";
                echo "<a href='Admin/index.php'>Admin panelis</a>";
            }
            ?>
        </nav>
        <div id="menubar" class="fas fa-bars"></div>


    <body id='body'>
    <label class="switch">
  <input type="checkbox">
  <span class="slider" id="colorToggle" onclick="Krasas();"></span>
</label>
<?php 
if (!$_SESSION['lietotajvards_GG69']) {
    
?>

<button class="open-button" onclick="openForm()"><i class="fas fa-sign-in" id="login"></i></button>

<!-- The form -->
<div class="form-popup" id="myForm">
  <form method="POST" class="form-container" id="loginBG">

  <button type="button" class="cancel" id="Atcelt" onclick="closeForm()"><i class="fas fa-x" id="X"></i></button>

    <h1 style="color:black;">Pieslēgties</h1>

    <label for="lietotajvards"><b style="color:black;">Lietotājvārds</b></label>
    <input type="text" placeholder="Ievadiet lietotajvardu" name="lietotajvards" required>

    <label for="parole"><b style="color:black;">Parole</b></label>
    <input type="password" placeholder="Ievadiet paroli" name="parole" required>

    <button type="submit" class="btn" name="autorizacija">Gatavs</button>
  
  </form>
</div>

    <?php
        }
    ?>

    </div>
<<<<<<< HEAD
    <div class="editpop-overlay" style="display: none;"></div>
        <div class="editpop" style="display: none;">
            <form action="Assets/db.php" method="POST" class="form-container" id="editForm">
                <input type="hidden" id="objectId" name="objectId">
                <div>
                    <label for="objectName" style="color: black; font-weight: bold; font-size: 1.5rem;">Nosaukums:</label>
                    <input type="text" id="objectName" name="objectName">
                </div>
                <div>
                    <label for="objectDescription" style="color: black; font-weight: bold; font-size: 1.5rem;">Apraksts:</label>
                    <textarea id="objectDescription" name="objectDescription"></textarea>
                </div>
                <div>
                    <label for="objectLink" style="color: black; font-weight: bold; font-size: 1.5rem;">Attēla saite:</label>
                    <input type="text" id="objectLink" name="objectLink">
                </div>
                <button type="submit" class="btnpopup">Saglabāt</button>
                <button type="button" class="closePopup" onclick="paslept()">Atcelt</button>
            </form>
        </div>

    </header>

    <script>
    function rediget(id) {
      const popupOverlay = document.querySelector('.editpop-overlay');
      const popup = document.querySelector('.editpop');
      const objectIdInput = document.getElementById('objectId');
      const objectNameInput = document.getElementById('objectName');
      const objectDescriptionInput = document.getElementById('objectDescription');
      const objectLinkInput = document.getElementById('objectLink');

        // Set the ID of the object to be edited
        objectIdInput.value = id;

        // Fetch item details based on ID using AJAX fetch
        fetch(`Assets/db.php?id=${id}`)
            .then(response => response.json())
            .then(data => {
                // Populate form fields with fetched data
                objectNameInput.value = data.Nosaukums;
                objectDescriptionInput.value = data.Apraksts;
                objectLinkInput.value = data.Attels_URL;
            })
            .catch(error => {
                console.error('Error fetching data:', error);
                // Handle error gracefully
            });

        // Display the popup
        popup.style.display = 'block';
        popupOverlay.style.display = 'block';
    }

    // Function to hide the popup
    function paslept() {
      const popupOverlay = document.querySelector('.editpop-overlay');
      const popup = document.querySelector('.editpop');
      popup.style.display = 'none';
      popupOverlay.style.display = 'none';
    }

    // Function to log admin actions
    function logAdminAction(username, action) {
        fetch('Assets/log.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `username=${username}&action=${action}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log('Action logged successfully:', action);
                } else {
                    console.error('Error logging action:', data.error);
                }
            })
            .catch(error => {
                console.error('Error logging action:', error);
            })
          }
    // Optional: Handle form submission
    document.getElementById('editForm').addEventListener('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

        // AJAX request to update data
        fetch('Assets/db.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams(new FormData(this))
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                  // Show alert for success
                  alert('Data updated successfully!');

                  // Refresh page after half a second
                  setTimeout(() => {
                      location.reload();
                  }, 500); // 500 milliseconds (half a second)
                } else {
                  alert('Error updating data: ' + data.error);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });

    
</script>

=======
    <div class="editpop" style="display: none;">
    <form action="POST" class="form-container" id="editBG">
          <input type="hidden" id="objectId">
              <div>
                  <label for="objectName">Name:</label>
                  <input type="text" id="objectName" name="name">
              </div>
              <div>
                  <label for="objectDescription">Description:</label>
                  <textarea id="objectDescription" name="description"></textarea>
              </div>
              <button type="submit">Save</button>
              <button type="button" id="closePopup" onclick="paslept()">Cancel</button>
    </form>
  </div>
>>>>>>> 5ea5b4438d524637238a467d34c0bfad8c5d7bd3


</header>