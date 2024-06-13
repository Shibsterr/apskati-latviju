<?php
session_start(); // Start session to access session variables

    $serveris = "localhost";
    $lietotajvards = "grobina1_kudums";
    $parole = "HTUU!mbSt";
    $db_nosaukums = "grobina1_kudums";

    $savienojums = mysqli_connect($serveris,$lietotajvards,$parole,$db_nosaukums);

    // if(!$savienojums){
    //     die("Pieslēgties datu bāzej neizdevās! ".mysqli_connect_error());
    // }else{
    //     echo "Savienojums veiksmīgi izveidots";
    // }

    // Ielogošanas sistēma

if(isset($_POST['autorizacija'])){
        if (!session_id()) 

        $username = mysqli_real_escape_string($savienojums, $_POST['lietotajvards']);
        $password = mysqli_real_escape_string($savienojums, $_POST['parole']);

        $sql_teikums = "SELECT * FROM celojuma_lietotaji WHERE Vards = '$username'";
        $result = mysqli_query($savienojums, $sql_teikums);

        if(mysqli_num_rows($result) == 1) {
            while($user = mysqli_fetch_array($result)) {
                if(password_verify($password, $user['Parole'])) {
                    session_start();
                    $_SESSION['lietotajvards_GG69'] = $user['Vards'];
                    header("Location: ./Admin/index.php");
                } else if(!password_verify($password, $user['Parole'])){
                    $errors = "Nepareizs lietotājvārds vai parole! parole";
                }
            }
        } else {
            $errors = "Nepareizs lietotājvārds vai parole! vispar";
            header("Location: ./index.php");
        }
}

// Handle like/dislike AJAX requests
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['choice']) && isset($_POST['postId'])) {
    header('Content-Type: application/json');

    $choice = $_POST['choice'];
    $postId = (int) $_POST['postId'];
    $previousChoice = isset($_POST['previousChoice']) ? $_POST['previousChoice'] : '';

    if ($savienojums->connect_error) {
        echo json_encode(['error' => 'Connection failed: ' . $savienojums->connect_error]);
        exit();
    }

    // Begin transaction
    $savienojums->begin_transaction();

    try {
        // Update the database based on the previous choice
        if ($previousChoice === 'like') {
            $savienojums->query("UPDATE celojuma_celojums SET Patik = Patik - 1 WHERE ID = $postId");
        } elseif ($previousChoice === 'dislike') {
            $savienojums->query("UPDATE celojuma_celojums SET Nepatik = Nepatik - 1 WHERE ID = $postId");
        }

        // Update the new choice
        if ($choice === 'like') {
            $savienojums->query("UPDATE celojuma_celojums SET Patik = Patik + 1 WHERE ID = $postId");
        } elseif ($choice === 'dislike') {
            $savienojums->query("UPDATE celojuma_celojums SET Nepatik = Nepatik + 1 WHERE ID = $postId");
        }

        // Commit transaction
        $savienojums->commit();

        // Get the updated counts
        $result = $savienojums->query("SELECT Patik AS likes, Nepatik AS dislikes FROM celojuma_celojums WHERE ID = $postId");
        $row = $result->fetch_assoc();

        echo json_encode([
            'likes' => $row['likes'],
            'dislikes' => $row['dislikes']
        ]);
    } catch (Exception $e) {
        // Rollback transaction on error
        $savienojums->rollback();
        echo json_encode(['error' => 'Transaction failed: ' . $e->getMessage()]);
    } finally {
        $savienojums->close();
    }

    exit();
}

    //datu dzēšana
if(isset($_POST['delete'])){
        $id = $_POST["delete"];
        $sql_teikums = "DELETE FROM celojuma_lietotaji WHERE Lietotaja_ID = $id";
       
        mysqli_query($savienojums,$sql_teikums);   
        
        echo "<div class='notifs'>Lietotājs veiskmīgi izdzēst!</div>";
        header("Location: ../Admin/index.php");
        exit();
}


// Handle fetching data by ID
if (isset($_GET['id'])) {
    // Sanitize input (ensure it's numeric)
    $id = mysqli_real_escape_string($savienojums, $_GET['id']);

    // Ensure $id is numeric
    if (!is_numeric($id)) {
        echo json_encode(['error' => 'Invalid ID format']);
        exit;
    }

    // Perform query to fetch data based on ID (assuming ID is primary key)
    $query = "SELECT * FROM celojuma_celojums WHERE ID = $id";
    $result = mysqli_query($savienojums, $query);

    if ($result) {
        // Check if a row is found
        if (mysqli_num_rows($result) == 1) {
            $data = mysqli_fetch_assoc($result);
            header('Content-Type: application/json');
            echo json_encode($data);
            exit;
        } else {
            echo json_encode(['error' => 'No matching ID found']);
            exit;
        }
    } else {
        // Handle query execution error
        echo json_encode(['error' => mysqli_error($savienojums)]);
        exit;
    }
}

// Check if form data is submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure the necessary fields are present
    if (isset($_POST['objectId'], $_POST['objectName'], $_POST['objectDescription'], $_POST['objectLink'])) {
        // Sanitize and validate inputs (you might want to do more validation as needed)
        $id = $_POST['objectId'];
        $name = mysqli_real_escape_string($savienojums, $_POST['objectName']);
        $description = mysqli_real_escape_string($savienojums, $_POST['objectDescription']);
        $link = mysqli_real_escape_string($savienojums, $_POST['objectLink']);

        // Update query
        $query = "UPDATE celojuma_celojums SET Nosaukums = '$name', Apraksts = '$description', Attels_URL = '$link' WHERE ID = $id";

        // Execute the query
        if (mysqli_query($savienojums, $query)) {
           $adminUser = $_SESSION['lietotajvards_GG69'];
           $actionDate = date('Y-m-d H:i:s'); // Get current date and time in MySQL datetime format
           $actionDescription = "Edited item with ID $id"; // Customize description as needed
           $logSql = "INSERT INTO celojuma_vesture (Vārds,Datums,Apraksts) VALUES ('$adminUser', '$actionDate', '$actionDescription')";

            if (mysqli_query($savienojums, $logSql)) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['error' => 'Error logging action: ' . mysqli_error($savienojums)]);
            }
        } else {
            echo json_encode(['error' => 'Error updating data: ' . mysqli_error($savienojums)]);
        }
    } else {
        echo json_encode(['error' => 'Missing required fields']);
    }
}


?>