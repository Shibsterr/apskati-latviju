<?php
    $page = 'pievienot';
    require "header.php";
    require '../Assets/db.php';
    // if (!isset($_SESSION['lietotajvards_GG69']) || $_SESSION['lietotajvards_GG69']['Status'] !== 'Administrators') {
    //     header("Location: pievienot.php");
    //     exit;
    // }
    $statusOptions = array("Moderators", "Administrators");

    if(isset($_POST['edit'])) {
        $username = mysqli_real_escape_string($savienojums, $_POST['username']);
        $password = mysqli_real_escape_string($savienojums, $_POST['password']);
        $confirmPassword = mysqli_real_escape_string($savienojums, $_POST['confirm_password']);
        $status = mysqli_real_escape_string($savienojums, $_POST['status']);
        $id = $_POST['rediget'];


        if ($password !== $confirmPassword) {
            echo "<div class='notif red'>Paroles nesakrīt!</div>";
        } else {

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $insertUserSQL = 
            "UPDATE celojuma_lietotaji SET Vards = '$username', Parole = '$hashedPassword', Status = '$status' WHERE Lietotaja_ID = $id";
            header("Location: ../Admin/pievienot.php");
            exit();
        }
    }

    

?>

<section class="admin">
    <div class="row">
        <div class="info1 defaultborder">
            <div class="head-info head-color">Rediģēšana:</div>
            <form method="POST" class="add">
                <label for="username">Lietotājvārds:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Parole:</label>
                <input type="password" id="password" name="password" required>

                <label for="confirm_password">Apstipriniet paroli:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>

                <label for="status">Status:</label>
                <select name="status" id="status" required>
                    <option value="" disabled selected>Izvēlieties statusu</option>
                    <?php foreach ($statusOptions as $option): ?>
                        <option value="<?php echo $option; ?>"><?php echo $option; ?></option>
                    <?php endforeach; ?>
                </select>

                <button class="btn" type="submit" name="edit">Rediģēt lietotāju</button>
            </form>
        </div>
    </div>
</section>

<?php require "footer.php"; ?>
